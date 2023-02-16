<?php

namespace App\Services\Export;

use Illuminate\Http\Request;
use App\Services\User\AccountService;
use Illuminate\Support\Facades\App;

class ExportPdfService extends ExportPdfAbstractService
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function report(array $parameters)
    {
        $type = strtolower($parameters['type']);
        $uniqueId = $parameters['unique_id'];
        $historyId = $parameters['history_id'] ?? null;
        $jwtToken = $parameters['token'] ?? null;
        $prQuery = $parameters['prQuery'] ?? null;
        $prFormat = $parameters['prFormat'] ?? null;
        $pdfPath = $this->getReportRoute($type);
        $token = App::make(AccountService::class)->validateToken($jwtToken);
        $account = App::make(AccountService::class)->getAccount($jwtToken);
        $accountEncoded = json_encode($account, JSON_HEX_APOS);
        $ip = $this->request->ip();

        $script = "
            sessionStorage.setItem('AuthToken', '$token');
            sessionStorage.setItem('AuthIdentity', '$accountEncoded');
            sessionStorage.setItem('type', '$type');
            sessionStorage.setItem('uniqueId', '$uniqueId');
            sessionStorage.setItem('historyId', '$historyId');
            sessionStorage.setItem('prQuery', '$prQuery');
            sessionStorage.setItem('prFormat', '$prFormat');
            sessionStorage.setItem('ip', '$ip');
        ";
        return $this->getPdf($this->request, $script, $pdfPath);
    }

    /**
     * Returns the PDF file name
     * @param $uniqueId unique id for the report
     * @return string file name
     */
    public function getPdfName($parameters): string
    {
        return $this->getReportName($parameters['type']) . '_'
            . $this->getDateFormated($parameters['report_date'])
            . '_' . $parameters['lexid'] . '.pdf';
    }

    /**
     * Gets the route for report export
     *
     * @param string $type Report type
     * @return string application route
     */
    protected function getReportRoute(string $type): string
    {
        return '/#/export/report/' . $type;
    }
}
