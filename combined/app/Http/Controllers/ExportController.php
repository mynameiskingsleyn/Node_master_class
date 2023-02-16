<?php

namespace App\Http\Controllers;

use App\Services\User\AccountService;
use App\Http\Formatters\JsonResponse;
use Illuminate\Http\Request;
use App\Services\Export\ExportPdfService;
use App\Http\Requests\ExportRequest;
use App\Services\ACL\AclService;
use App\Exceptions\ErrorCodes;
use LNWebAPI2\Framework\Providers\ProviderResponseCodes;
use Illuminate\Support\Facades\App;
use App\Exceptions\Authorization\AuthorizationException;
use App\Exceptions\Authorization\AuthorizationCodes;
use Exception;

class ExportController extends Controller
{
    /**
     * @var JsonResponse
     */
    protected $jsonResponse;

    /**
     * @var ExportPdfService
     */
    private $pdfService;

    public function __construct(JsonResponse $jsonResponse, ExportPdfService $exportPdfService)
    {
        $this->jsonResponse = $jsonResponse;
        $this->pdfService = $exportPdfService;
    }

    /**
     * Hacky and quick way to expose an API to batch from web app don't ask me why
     * @param Request $request
     */
    public function exportPdf(Request $request)
    {
        $this->validateRequest($request, ExportRequest::rules());
        $credentials = [
            ExportRequest::paramUserName() => $request->input(ExportRequest::paramUserName()),
            ExportRequest::paramPassword() => $request->input(ExportRequest::paramPassword()),
        ];
        // Authenticate the user and set the correct request header so token validation succeed
        $result = App::make(AccountService::class)->login($credentials, true);
        $token = (string) $result->getData();
        App::make(AclService::class)->setDefaultToken($token);
        // Check user has permission to access report type
        if (in_array(strtoupper($request->input('type')), App::make(AclService::class)->allowedReports())) {
            // Export the report
            $report = $this->pdfService->report(array_merge($request->all(), ['token' => $token]));
            return $this->jsonResponse->success($request, $report);
        } else {
            throw new AuthorizationException(
                AuthorizationCodes::ACTION_NOT_ALLOWED,
                AuthorizationCodes::message(AuthorizationCodes::ACTION_NOT_ALLOWED)
            );
        }
    }
}
