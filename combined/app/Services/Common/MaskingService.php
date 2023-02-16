<?php

namespace App\Services\Common;

use App\Services\Common\MaskingRules;
use LNWebAPI2\Framework\Security\Masking;

class MaskingService
{
    const MASK = '*****';
    const PASSWORD = 'password';
    const SSN = 'ssn';
    const DOB = 'dob';
    const SUBJECT_ID = 'SubjectId';
    const OPTIONS = 'Options';
    const BILLING_CODE = 'BillingCode';

    const RESPONSE_MASKING = [
        self::PASSWORD,
        self::SSN,
        self::DOB,
    ];

    const LOG_REQUEST_BLACKLIST = [
        self::PASSWORD,
        self::SSN,
        self::DOB,
        self::OPTIONS,
    ];

    /**
     * Masks and prepares the parameters sent back in the response
     * @param array $parameters
     * @return array
     */
    public function sanitizeRespParams(array $parameters): array
    {
        $sanitized = [];
        foreach ($parameters as $name => $val) {
            if (is_array($val)) {
                $val = $this->sanitizeRespParams($val);
            }
            $sanitized[$name] = (!is_numeric($name) && in_array($name, self::RESPONSE_MASKING)) ? self::MASK : $val;
        }
        return $sanitized;
    }

    /**
     * Masks and prepares the parameters for requests that will be written into the logs
     * @param array $parameters
     * @return array
     */
    public function sanitizeReqParams(array $parameters): array
    {
        $sanitized = [];
        foreach ($parameters as $name => $val) {
            if (!in_array($name, self::LOG_REQUEST_BLACKLIST)) {
                $value = '';
                if (is_array($val)) {
                    $value = $this->sanitizeReqParams($val);
                } else {
                    $value = $this->maskValue($name, $val);
                }
                $sanitized[$name] = $value;
            }
        }
        return $sanitized;
    }

    /**
     * Masks a field value based on the nature of the field
     * @param string $name
     * @param string $val
     * @return string
     */
    protected function maskValue(string $name, string $val): string
    {
        $masked = $val;
        switch ($name) {
            case self::PASSWORD:
                $masked = Masking::password($val);
                break;
            case self::SSN:
                $masked = Masking::ssn($val);
                break;
            case self::BILLING_CODE:
                $end = strlen($val);
                $start = $end - 5;
                $masked = Masking::simple($val, self::MASK, $start, $end);
                break;
            case self::SUBJECT_ID:
                $end = strlen($val) - 9;
                $masked = Masking::simple($val, self::MASK, 9, 14);
                break;
        }
        return $masked;
    }
}
