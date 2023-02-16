<?php

namespace App\Services\CsvProcessor\Models;

use Illuminate\Database\Eloquent\Model;

abstract class CsvModel extends Model
{
    public $timestamps = false;
    public $currentUser = null;
    protected $fileName = null;

    public function __construct()
    {
    }
    public function getTableName(): string
    {
        return $this->table;
    }

    public function getFileColumns(): array
    {
        $configName = $this->getTableName();
        if ($this->fileColumns) {
            return $this->fileColumns;
        } elseif (config('csv.model.' . $configName . '.csvFields.file_columns')) {
            return config('csv.model.' . $configName . '.csvFields.file_columns');
        }
        return [];
    }

    public function getColumnsToFieldsMapping(): array
    {
        $configName = $this->getTableName();
        if ($this->columnsToFieldsMapping) {
            return $this->columnsToFieldsMapping;
        } elseif (config('csv.model.' . $configName . '.csvFields.columns_to_fields_mapping')) {
            return config('csv.model.' . $configName . '.csvFields.columns_to_fields_mapping');
        }
        return [];
    }

    public function getFieldValidation(): array
    {
        $configName = $this->getTableName();
        if ($this->fieldValidation) {
            return $this->fieldsValidation;
        } elseif (config('csv.model.' . $configName . '.csvFields.columns_regs_validation')) {
            return config('csv.model.' . $configName . '.csvFields.columns_regs_validation');
        }
        return [];
    }

    public function getCsvSeparator(): string
    {
        if ($this->csvSeparator) {
            return $this->csvSeparator;
        }
        return config('csv.csv_separator');
    }

    public function getFileName(): string
    {
        // $configName = $this->getTableName();
        // return config('csv.model.' . $configName . '.file_name') ?? '';
        return $this->fileName;
    }

    public function setFileName($name): void
    {
        $this->fileName = $name;
    }


    abstract public function getAutoFillFields(): array; // should return an associative array ['field' => value]
    abstract public function clearTable(): void;
    abstract public function cleanTable(): void;
}
