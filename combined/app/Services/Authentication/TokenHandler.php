<?php

namespace App\Services\Authentication;

use LNWebAPI2\Plugins\WebTokenAuth\JWT\JWTHandler;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Token;
use Lcobucci\JWT\ValidationData;
use LNWebAPI2\Plugins\WebTokenAuth\Services\Util;
use LNWebAPI2\Plugins\MoLog\Log;
use LNWebAPI2\Framework\Security\Encrypt;
use LNWebAPI2\Framework\Providers\Interfaces\IMbsProvider;

class TokenHandler extends JWTHandler
{
    /**
     * Generate a JWT token
     * @param string $uid
     * @param array $setting
     * @return Token
     */
    public function generateWithRange(string $uid, array $setting, IMbsProvider $mbsProvider, string $gcId, array $whitelist)
    {
        $currentTime = time();
        $ipRanges = $this->getMbsIpRanges($mbsProvider, $gcId, $whitelist);
        $formattedRanges = $this->getFormattedIps($ipRanges);
        $hashedRanges = Encrypt::instance()->encrypt($formattedRanges);
        return (new Builder())->setIssuer($this->hashClaim('issuer', $setting['iss']))
            ->setAudience($this->hashClaim('audience', $_SERVER['HTTP_HOST']))
            ->setSubject($this->hashClaim('subject', Util::getUserAgent() . '::' . $formattedRanges))
            ->setId($this->hashClaim('id', strval($currentTime)), true)
            ->setIssuedAt($currentTime)
            ->setNotBefore($currentTime + intval($setting['nbf']))
            ->setExpiration($currentTime + intval($setting['exp']))
            ->withClaim('uid', $uid)
            ->withClaim('xtr', $hashedRanges)
            ->sign(new Sha256(), $this->getKey($setting))
            ->getToken();
    }

    /**
     * Validate token
     * @param Token $token
     * @param array $setting
     * @return bool
     */
    public function validate(Token $token, array $setting): bool
    {
        $hashedRanges = $token->getClaim('xtr');
        $formattedRanges = Encrypt::instance()->decrypt($hashedRanges);
        // Validate token
        $data = new ValidationData();
        $data->setIssuer($this->hashClaim('issuer', $setting['iss']));
        $data->setAudience($this->hashClaim('audience', $_SERVER['HTTP_HOST']));
        $data->setSubject($this->hashClaim('subject', Util::getUserAgent() . '::' . $formattedRanges));
        $data->setId($this->hashClaim('id', $token->getClaim('iat')), true);
        return ($token->validate($data) && $token->verify(new Sha256(), $this->getKey($setting, false)));
    }

    /**
     * Validate Client IP with IP ranges in the token
     * @param Token $token
     * @param array $setting
     * @return bool
     */
    public function validateIpRange(Token $token, array $setting): bool
    {
        $hashedRanges = $token->getClaim('xtr');
        $formattedRanges = Encrypt::instance()->decrypt($hashedRanges);
        // Check Client Ip is authorized
        if (!$this->validateIpInRange($formattedRanges)) {
            return false;
        }
        return true;
    }

    /**
     * Creates a string hash for a claim value
     * @param string $claim
     * @param string $value
     * @return string
     */
    private function hashClaim(string $claim, string $value): string
    {
        return md5($claim . '::' . $value);
    }

    /**
     * Fetch the IP ranges from MBS DB
     * @param IMbsProvider $mbsProvider
     * @param string $gcId
     * @param array $whitelist
     * @return array
     */
    private function getMbsIpRanges(IMbsProvider $mbsProvider, string $gcId, array $whitelist): array
    {
        return array_merge($mbsProvider->getCompanyIpRange($gcId), $whitelist);
    }

    /**
     * Formats the IP ranges into a string ie: "xxxxxxxx-xxxxxxxx,xxxxxxxx-xxxxxxxx,xxxxxxxx-xxxxxxxx"
     * @param array $ipRanges
     * @return string
     */
    private function getFormattedIps(array $ipRanges): string
    {
        $ranges = '';
        foreach ($ipRanges as $range) {
            if (isset($range['ip1num'], $range['ip2num'])) {
                $ranges .= $range['ip1num'] . '-' . $range['ip2num'] . ',';
            }
        }
        $ranges = trim($ranges, ',');
        return $ranges;
    }

    /**
     * Validates if the Client IP is inside the IP ranges in the Token
     * @param string $userRanges
     * @return bool
     */
    private function validateIpInRange(string $userRanges): bool
    {
        $inRange = false;
        $ipRanges = $this->getListIpRanges($userRanges);
        $userIp = ip2long(Util::getClientIp());
        foreach ($ipRanges as $range) {
            if ($userIp >= (int) $range['ip1num'] && $userIp <= (int) $range['ip2num']) {
                $inRange = true;
                break;
            }
        }
        return $inRange;
    }

    /**
     * Formats a string of IP ranges (xxxxxxxx-xxxxxxxx...) into an array of IPs
     * @param string $userRanges
     * @return array
     */
    private function getListIpRanges(string $userRanges): array
    {
        $ranges = [];
        if (!empty($userRanges)) {
            $formattedRanges = explode(',', $userRanges);
            if (is_array($formattedRanges)) {
                $ranges = array_map(function ($range) {
                    $ips = explode('-', $range);
                    return [
                        'ip1num' => $ips[0],
                        'ip2num' => $ips[1]
                    ];
                }, $formattedRanges);
            }
        }
        return $ranges;
    }
}
