<?php

namespace App\Services\CsvProcessor\Services;

use App\Services\CsvProcessor\Models\CsvModel;
//use App\Services\FileManager\Traits\StorageTrait;
use App\Exceptions\Csv\CsvException;
use Illuminate\Database\QueryException;
use App\Exceptions\Csv\CsvCodes;
use LNWebAPI2\Plugins\MoLog\Log;
use App\Logging\Writer;
use App\Services\FileManager\FileManagerService;
use App\Services\ACL\AclService;
use App\Services\User\AccountService;
use Illuminate\Support\Facades\App;

class CsvProcessingService
{
    /**
    * @var boolean
    */
    public $headerRead;

    /**
    * @var string
    */
    public $filePath;

    /**
    * @var string
    */
    public $storagePath;

    /**
    * @var int
    */
    public $batchSize;

    /**
    * @var int
    */
    public $numberOfBatch;

    /**
    * @var int
    */
    public $numberOfRecords;

    /**
    * @var string
    */
    public $fileName;

    /**
    * @var CsvModel
    */
    public $model;

    /**
    * @var string
    */
    public $csvSeparator;

    /**
    * @var array
    */
    public $columnsPositionMapping;

    /**
    * @var array
    */
    public $columsToFieldMapping;

    /**
    * @var FileManagerService
    */
    public $fileManagerService;

    /**
    * @var string
    */
    public $disk;

    /**
    * @var array
    */
    public $batches;

    /**
    * @var array
    */
    public $fieldsValidation;

    public $currentUser;

    public function __construct()
    {
         $this->fileManagerService = new FileManagerService();
         $this->fileManagerService->setDisk(config('csv.disk'));
    }

    public function init(CsvModel $model, string $fileName = null): void
    {
        $this->model = $model;
        $this->batchSize = config('csv.batch_size');
        $this->disk = config('csv.disk');
        if ($fileName) {
            $this->fileName = $fileName;
        }
        if (!$this->fileName) {
            if ($model->getFileName()) {
                $this->fileName = $model->getFileName();
            } else {
                $message = CsvCodes::message(CsvCodes::FILE_NAME_MISSING);
                throw new CsvException(CsvCodes::FILE_NAME_MISSING, $message);
            }
        }
        if (!$this->fileManagerService->getDisk()) {
            $this->fileManagerService->setDisk($this->disk);
        }

        $this->fileManagerService->setFileName($this->fileName);
        $this->csvSeparator = $model->getCsvSeparator();
        $this->filePath = $this->fileManagerService->getFileFullPath();
        $this->storagePath = $this->fileManagerService->getStoragePath();
        $this->headerRead = false;
        $this->numberOfBatch = 0;
        $this->numberOfRecords = 0;
        $this->fieldsValidation = $this->model->getFieldValidation();
    }

    public function mapHeaders(): void
    {
        if ($this->filePath) {
            $fileHandle = fopen($this->filePath, 'r');
            $counter = 0;
            while (!feof($fileHandle) && $counter < 1) {
                $line = fgetcsv($fileHandle, 2024, $this->csvSeparator);
                $counter++;
            }
            fclose($fileHandle);
            $this->mapFieldsToFile($line);
        } else {
            $message = CsvCodes::message(CsvCodes::FILE_PATH_MISSING);
            throw new CsvException(CsvCodes::FILE_PATH_MISSING, $message);
        }
    }

    protected function mapFieldsToFile($line)
    {
        $fileColumns = $this->model->getFileColumns();
        if (empty($fileColumns) === false) {
            foreach ($line as $key => $value) {
                if (in_array($value, $fileColumns)) {
                    $this->columnsPositionMapping[$value] = $key;
                }
            }
            $fullyMapped = true;
            foreach ($fileColumns as $column) {
                if (!array_key_exists($column, $this->columnsPositionMapping)) {
                    $fullyMapped = false;
                    break;
                }
            }
            if (!$fullyMapped) {
                $message = CsvCodes::message(CsvCodes::FILE_COULUMN_NAME_CONFLICT);
                throw new CsvException(CsvCodes::FILE_COULUMN_NAME_CONFLICT, $message);
            }
        } else {
            $message = CsvCodes::message(CsvCodes::MISSING_FILE_COLUMN_CONFIG);
            throw new CsvException(CsvCodes::MISSING_FILE_COLUMN_CONFIG, $message);
        }
    }

    public function readCSV(): array
    {
        $this->mapHeaders();
        $fileHandle = fopen($this->filePath, 'r');
        $lineOfText = [];
        $records = [];
        $batches = [];
        $recordsRead = 0;

        if ($fileHandle !== false) {
            while (!feof($fileHandle)) {
                if ($this->headerRead) {
                    $lineOfText = fgetcsv($fileHandle, 1024, $this->csvSeparator);
                    $value = $this->prepareRecord($lineOfText, $recordsRead);
                    if (empty($value) === false) {
                        $records[] = $value;
                        $recordsRead++;
                    }
                    if (count($records) >= $this->batchSize) {
                        $batches[] = $records;
                        $records = [];
                    }
                } else {
                    $header = fgetcsv($fileHandle, 1024, $this->csvSeparator);
                    $this->headerRead = true;
                }
            }
            fclose($fileHandle);
            $this->numberOfRecords = $recordsRead;

            if (count($records)) {
                $batches[] = $records;
            }
        } else {
            $message = CsvCodes::message(CsvCodes::FILE_NOT_FOUND);
            throw new CsvException(CsvCodes::FILE_NOT_FOUND, $message);
        }
        return $batches;
    }

    public function prepareRecord($line, $lineNumber): array
    {
         $currentLine = $lineNumber + 2;
         $preparedRecord = [];
         $colToFieldMap = $this->model->getColumnsToFieldsMapping();
        if (empty($colToFieldMap) === true) {
            $message = CsvCodes::message(CsvCodes::MISSING_COLUMN_FIELD_CONFIG);
            throw new CsvException(CsvCodes::MISSING_COLUMN_FIELD_CONFIG, $message);
        }
        if (is_array($line) && empty($line) === false) {
            foreach ($this->columnsPositionMapping as $field => $pos) {
                $item = trim($line[$pos]) ?? null;
                if ($this->validateField($item, $field)) {
                    $preparedRecord[$colToFieldMap[$field]] = $item;
                } else {
                    $message = CsvCodes::message(CsvCodes::FILE_VALIDATION_ERROR);
                    throw new CsvException(CsvCodes::FILE_VALIDATION_ERROR, $message .
                    ' Check file close to line  #' . $currentLine . ' column (' . $field . ')');
                }
            }
            $this->modifyRecord($preparedRecord);
        }
         return $preparedRecord;
    }

    protected function validateField($entry, $fieldName)
    {
        if (!$this->fieldsValidation) {
            $message = CsvCodes::message(CsvCodes::MISSING_FIELD_VALIDATION_CONFIG);
            throw new CsvException(CsvCodes::MISSING_FIELD_VALIDATION_CONFIG, $message);
        }
        if (preg_match($this->fieldsValidation[$fieldName], $entry)) {
            return true;
        }
        return false;
    }

    protected function modifyRecord(&$record): void
    {
        $fields = $this->model->getAutoFillFields();
        if (empty($fields) === false) {
            foreach ($fields as $key => $value) {
                $record[$key] = $value;
            }
        }
        if (method_exists($this->model, 'modifyRecord')) {
            $this->model->modifyRecord($record);
        }
    }

    public function clearTable(): bool
    {
        try {
            $this->model->clearTable();
            return true;
        } catch (QueryException $e) {
            $message = CsvCodes::message(CsvCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new CsvException(CsvCodes::QUERY_ERROR, $message);
        }
    }

    public function insertData($batch)
    {
        try {
            $this->model->insert($batch);
        } catch (QueryException $e) {
            $message = CsvCodes::message(CsvCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new CsvException(CsvCodes::QUERY_ERROR, $message);
        }
    }

    public function uploadFile($file, $saveAs = null): array
    {
        $fileName = $this->saveFile($file, $saveAs);
        if ($fileName) {
            $this->fileName = $fileName;
            return [ 'uploaded' => true, 'message' => 'File Uploaded', 'savedAs' => $fileName];
        }
        $message = CsvCodes::message(CsvCodes::FILE_UPLOAD_FAILED);
        Writer::queryError(__METHOD__, $message);
        return ['uploaded' => false, 'message' => $message];
    }

    public function removeFile()
    {
        $this->fileManagerService->removeFile($this->fileName);
    }

    public function saveFile($file, $saveAs = null)
    {
        return $this->fileManagerService->saveFile($file, $saveAs);
    }
}
