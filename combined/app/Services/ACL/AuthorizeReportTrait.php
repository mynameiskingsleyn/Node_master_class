<?php

namespace App\Services\ACL;

use Illuminate\Support\Facades\App;
use App\Services\ACL\AclService;
use App\Exceptions\Authorization\AuthorizationException;
use App\Exceptions\Authorization\AuthorizationCodes;
use App\Services\Report\ReportTypesConstant;

trait AuthorizeReportTrait
{
    /**
     * Checks if the user has access to the requested report type
     *
     * @param $params [type, id, historyId]
     * @throws AuthorizationException
     */
    public function authorizeReport(array $params)
    {
        $type = strtoupper($params['type']);
        if (
            $type !== ReportTypesConstant::COMPLETE_REPORT
            && !in_array($type, App::make(AclService::class)->allowedReports())
        ) {
            throw new AuthorizationException(
                AuthorizationCodes::ACTION_NOT_ALLOWED,
                AuthorizationCodes::message(AuthorizationCodes::ACTION_NOT_ALLOWED)
            );
        }
    }
}
