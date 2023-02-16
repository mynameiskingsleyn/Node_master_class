<?php

namespace App\Services\Verification;

use DB;
use stdClass;
use Carbon\Carbon;
use App\Services\ACL\AclService;
use App\Services\User\AccountService;
use App\Services\Common\DateService;
use App\Services\Common\ConnectionService;
use App\Services\Common\ConnectionServiceTrait;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use App\Services\Report\ReportTypesConstant;
use App\Services\Report\ReportStatusConstant;
use Illuminate\Database\QueryException;
use LNWebAPI2\Plugins\MoLog\Log;
use Illuminate\Support\Facades\App;
use App\Logging\Writer;
use App\Models\Portfolio;
use App\Models\Report;
use App\Models\ReportWatcher;
use App\Services\CsvProcessor\Models\CourtIdentifierCsvModel;
use App\Services\CsvProcessor\Services\CsvService;
use App\Exceptions\Verification\VerificationException;
use App\Exceptions\Verification\VerificationCodes;

class VerificationService
{
    use ConnectionServiceTrait;

    protected const DEFAULT_LIMIT = 15;

    protected const DEFAULT_SORTING = 'start_date';

    protected const FILE_TYPES = ['text/csv'];

    protected const FILE_MAX_NAME = 54;

    protected const FILE_REG_VALIDATION = '/^([a-zA-Z0-9 \.-_]{5,40})$/';

    /**
     * @var ConnectionService
     */
    protected $connectionService;

    /**
     * @var CsvService
     */
    protected $csvService;

    public function __construct(ConnectionService $connectionService, CsvService $csvService)
    {
        $this->connectionService = $connectionService;
        $this->csvService = $csvService;
        $this->csvModel = new CourtIdentifierCsvModel();
    }

    public function uploadFile($file, $saveAs = null)
    {
      // get file original name
        if ($this->validFile($file)) {
            $fileName = $file->getClientOriginalName();
            $fileUploaded = $this->csvService->uploadFile($file, $saveAs);
            if ($fileUploaded['uploaded']) {
                return $this->processFile($fileUploaded, $fileName);
            } else {
                $message = VerificationCodes::message(VerificationCodes::FILE_ERROR);
                Writer::queryError(__METHOD__, $message);
                throw new VerificationException(VerificationCodes::FILE_ERROR, $message);
            }
        } else {
            $message = VerificationCodes::message(VerificationCodes::INVALID_FILE);
            Writer::queryError(__METHOD__, $message);
            throw new VerificationException(VerificationCodes::INVALID_FILE, $message);
        }
    }

    public function processFile($fileUploaded, $fileName)
    {
         $result = $this->csvService->processCsv($this->csvModel, $fileUploaded['savedAs'] ?? null, $fileName);
         $report = new stdClass();
        if ($result['status'] == "Success") {
             $report->file_name = $fileName;
             $report->number_of_records = $result['number_of_records'];
        } else {
             $message = VerificationCodes::message(VerificationCodes::FILE_ERROR);
             Writer::queryError(__METHOD__, $message);
             throw new VerificationException(VerificationCodes::FILE_ERROR, $message);
        }

         return $report;
    }

    public function validFile($file)
    {
        $isValid = true;
        $fileName = $file->getClientOriginalName();
        $fileType = $file->getClientmimeType();
        if (!in_array($fileType, self::FILE_TYPES)) {
            $isValid = false;
        }
        if (!preg_match(self::FILE_REG_VALIDATION, $fileName)) {
            $isValid = false;
        }
        return $isValid;
    }
}
