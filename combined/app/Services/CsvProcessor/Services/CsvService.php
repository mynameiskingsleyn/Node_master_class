<?php

namespace App\Services\CsvProcessor\Services;

use App\Services\CsvProcessor\Services\CsvProcessingService;
use App\Services\CsvProcessor\Models\CsvModel;

class CsvService
{
    /**
    * @var CsvProcessingService
    */
    public $csvProcessor;


    public function __construct()
    {
        $this->csvProcessor = new CsvProcessingService();
    }

    public function extractData(CsvModel $model, string $fileName = null): array
    {
        $this->csvProcessor->init($model, $fileName);
        $batches = $this->csvProcessor->readCsv();
        $this->csvProcessor->removeFile();
        return $batches;
    }

    private function insertData(array $batches): void
    {
        foreach ($batches as $batch) {
            $this->csvProcessor->insertData($batch);
        }
    }

    private function clearTable(): void
    {
        $this->csvProcessor->clearTable();
    }

    public function processCsv(CsvModel $model = null, string $fileName = null, string $originalName = null)
    {
        $result = [
          'file_name' => $fileName,
          'number_of_records' => 0
        ];

        $model->setFileName($originalName);
        $batches = $this->extractData($model, $fileName);
        if ($batches && count($batches)) {
            $tableCleared = $this->clearTable();
            $this->insertData($batches);
            $numberForRecords = $this->getNumOfRecords();
            $result['file_name'] = $fileName ?? $this->getFileName();
            $result['number_of_records'] = $this->getNumOfRecords();
            $result['status'] = 'Success';
        }
        return $result;
    }

    public function getNumOfRecords()
    {
        return $this->csvProcessor->numberOfRecords;
    }

    public function getFileName()
    {
        return $this->csvProcessor->fileName;
    }

    public function uploadFile($file, $saveAs = null)
    {
        $fileUploaded = $this->csvProcessor->uploadFile($file, $saveAs);
        return $fileUploaded;
    }
}
