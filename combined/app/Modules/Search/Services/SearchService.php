<?php

namespace App\Modules\Search\Services;

use LNWebAPI2\Framework\Services\Modules\Factories\SearchService as LnSearchService;
use LNWebAPI2\Framework\Services\Modules\Factories\AuthService;
use LNWebAPI2\Plugins\WebTokenAuth\Services\Util;

/**
* Service Search
*
* @package     App\Modules\Search\Service
*/
class SearchService extends BaseSearchService
{
    public function __construct(LnSearchService $searchWebService, AuthService $authService)
    {
        $this->searchService = $searchWebService->getService();
        $this->authService   = $authService->getService();

        $this->configKeyDefaultEsp = 'DefaultESP';

        parent::__construct();
    }

    // parse response here...
    public function response($result)
    {
        return $result;
    }

    public function prepare(array $parameters): array
    {
        // add authenticated user
        $user = $this->authService->identity()->getData()->getUser();

        $username = $user->getUserInfo()->getUserName();
        $isTester = $user->getNvp('test_user');

        $parameters['User']['BillingCode'] = strstr($username, '@', true);
        $parameters['User']['IP'] = Util::getClientIp();

        if ((string) $isTester === '1') {
            $parameters['Options']['IsTest'] = 1;
        }

        // FCRA Purpose
        $parameters['Options']['FCRAPurpose'] = config('Search.WsInsiderThreatFCRA.fcra_purpose');

        return $parameters;
    }
}
