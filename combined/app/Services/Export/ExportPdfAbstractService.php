<?php

namespace App\Services\Export;

use Illuminate\Http\Request;
use HeadlessChromium\Page;
use HeadlessChromium\BrowserFactory;
use HeadlessChromium\PageUtils\PagePdf;
use HeadlessChromium\Communication\Message;
use HeadlessChromium\Exception\OperationTimedOut;
use HeadlessChromium\Exception\NavigationExpired;
use App\Services\Report\ReportTypesConstant;
use Carbon\Carbon;
use App\Exceptions\Report\ReportCodes;
use App\Exceptions\Report\ReportException;
use LNWebAPI2\Plugins\MoLog\Log;

abstract class ExportPdfAbstractService
{
    public const BROWSER_HEADLESS = ['google-chrome', 'chromium-browser', 'chromium'];
    public const HEADER_IP = 'headless-ip';

    protected function getBrowserFactory()
    {
        $browser = config('app.browser_headless');
        if (in_array($browser, self::BROWSER_HEADLESS)) {
            return new BrowserFactory($browser);
        } else {
            throw new \Exception('Browser not allowed');
        }
    }

    /**
     * Get custom flags for PDF export.
     * Set proxy based on environment
     * @return array custom flags values
     */
    protected function getCustomFlags(): array
    {
        $customFlags = [
            '--disable-features=VizDisplayCompositor',
            '--disable-gpu',
        ];
        $proxy = config('app.proxy.url');
        if ($proxy) {
            $customFlags[] = "--proxy-server=$proxy";
        }
        $bypass = config('app.proxy.bypass');
        if ($bypass) {
            $customFlags[] = "--proxy-bypass-list=$bypass";
        }
        return $customFlags;
    }

    protected function getPdf(Request $request, $script, $pdfPath): string
    {
        $host = $request->header('origin');
        $userAgent = $request->header('User-Agent');
        $browserFactory = $this->getBrowserFactory();

        // starts headless chrome
        $browserOptions = [
            'sendSyncDefaultTimeout' => config('app.export_timeout'),
            'userAgent' => $userAgent,
            'noSandbox' => true,
            'ignoreCertificateErrors' => true,
            'customFlags' => $this->getCustomFlags()
        ];
        if (in_array(env('APP_ENV'), ['local', 'dev', 'testing'])) {
            $browserOptions['debugLogger'] = app('Psr\Log\LoggerInterface');
        }
        $browser = $browserFactory->createBrowser($browserOptions);
        $browser->setPagePreScript($script);
        $page = $browser->createPage();

        $page->getSession()->sendMessage(new Message(
            'Network.setExtraHTTPHeaders',
            ['headers' => [self::HEADER_IP => $request->ip()]]
        ));

        try {
            $navigation = $page->navigate($host . $pdfPath);
            $navigation->waitForNavigation(Page::NETWORK_IDLE);
        } catch (OperationTimedOut $ex) {
            Log::error(__METHOD__ . ' - ' . ReportCodes::EXPORT_CHROME_OP_TIMEOUT
                . '- ' . ReportCodes::message(ReportCodes::EXPORT_CHROME_OP_TIMEOUT));
            throw new ReportException(
                ReportCodes::EXPORT_ERROR,
                ReportCodes::message(ReportCodes::EXPORT_CHROME_OP_TIMEOUT)
            );
        } catch (NavigationExpired $ex) {
            Log::error(__METHOD__ . ' - ' . ReportCodes::EXPORT_CHROME_NAV_EXPIRED
                . '- ' . ReportCodes::message(ReportCodes::EXPORT_CHROME_NAV_EXPIRED));
            throw new ReportException(
                ReportCodes::EXPORT_ERROR,
                ReportCodes::message(ReportCodes::EXPORT_CHROME_NAV_EXPIRED)
            );
        }

        $options = [
            'landscape' => false, // default to false
            'printBackground' => true, // default to false
            'displayHeaderFooter' => true, // default to false
            'headerTemplate' => PdfCommon::HEADER_TEMPLATE,
            'footerTemplate' => PdfCommon::FOOTER_TEMPLATE,
            'preferCSSPageSize' => false, // default to false ( reads parameters directly from @page )
            'marginTop' => 0.1, // defaults to ~0.4 (must be float, value in inches)
            'marginBottom' => 0.4, // defaults to ~0.4 (must be float, value in inches)
            'marginLeft' => 0.1, // defaults to ~0.4 (must be float, value in inches)
            'marginRight' => 0.1, // defaults to ~0.4 (must be float, value in inches),
            'paperWidth' => 8.5,
            'paperHeight' => 11.69,

        ];

        $pdf = $page->pdf($options);
        $pdfString = $this->getPdfString($pdf);

        $browser->close();
        return $pdfString;
    }

    /**
     * Returns the date formatted for the exported filename.
     *
     * @param string $reportDate
     * @return string date
     */
    protected function getDateFormated(string $reportDate): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $reportDate)->format('m-d-Y');
    }

    /**
     * Gets the report's name based on the type to generate the exported file name
     *
     * @param string $type
     * @return string report name
     */
    protected function getReportName(string $type): string
    {
        switch (strtoupper($type)) {
            case ReportTypesConstant::PUBLIC_RECORD:
                return 'PublicRecord';
                break;
            case ReportTypesConstant::NONFCRA_PUBLIC_RECORD:
                return 'NonFCRAPublicRecord';
                break;
            case ReportTypesConstant::CREDIT_REPORT:
                return 'CreditReport';
                break;
            case ReportTypesConstant::COMPLETE_REPORT:
                return 'CombinedReport';
                break;
            default:
                return 'InsiderThreat';
                break;
        }
    }

    /**
     * Get string representation of the PDF
     *
     * @param PagePdf $pdf
     * @param int $timeout
     * @throws ReportException
     * @return string PDF representation
     */
    private function getPdfString(PagePdf $pdf, $timeout = null): string
    {
        if (!$timeout) {
            $timeout = config('app.export_timeout');
        }
        $response = $pdf->getResponseReader()->waitForResponse($timeout);
        if (!$response->isSuccessful()) {
            throw new ReportException(ReportCodes::EXPORT_ERROR, $response->getErrorMessage());
        }
        return $response->getResultData('data');
    }
}
