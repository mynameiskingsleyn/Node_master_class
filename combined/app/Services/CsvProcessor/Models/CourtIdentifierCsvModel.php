<?php

namespace App\Services\CsvProcessor\Models;

class CourtIdentifierCsvModel extends CsvModel
{
    protected $table = 'court_identifiers';
    protected $connection = 'mysql';

    public function getAutoFillFields(): array
    {
        $stDate = date('YmdHi');
        $rawFileName = $this->getFileName();
        $pattern = '/.csv/i';
        $fileName = preg_replace($pattern, '', $rawFileName) . $stDate;
        return ['status' => 1, 'file_name' => $fileName];
    }
    /**
    * Clears table by updating records status.
    */
    public function clearTable(): void
    {
        $this->where(['status' => 1])
            ->update(['status' => 0]);
    }
    /**
    * Cleans table by deleting records
    */
    public function cleanTable(): void
    {
        $this->where(['status' => 0])
            ->delete();
    }
}
