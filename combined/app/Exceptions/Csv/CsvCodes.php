<?php

namespace App\Exceptions\Csv;

use LNWebAPI2\Framework\Responses\ResponseCodes;
use App\Exceptions\Common\CodeMessageTrait;

class CsvCodes extends ResponseCodes
{
    use CodeMessageTrait;

    public const FILE_PATH_MISSING = 'FILE_PATH_MISSING';
    public const FILE_NAME_MISSING = 'FILE_NAME_MISSING';
    public const CONFIG_MISSING = 'CONFIG_MISSING';
    public const FILE_NOT_FOUND = 'FILE_NOT_FOUND';
    public const MISSING_FILE_COLUMN_CONFIG = 'MISSING_FILE_COLUMN_CONFIG';
    public const MISSING_COLUMN_FIELD_CONFIG = 'MISSING_COLUMN_FIELD_CONFIG';
    public const MISSING_FIELD_VALIDATION_CONFIG = 'MISSING_FIELD_VALIDATION_CONFIG';
    public const FILE_COULUMN_NAME_CONFLICT = 'FILE_COULUMN_NAME_CONFLICT';
    public const QUERY_ERROR = 'QUERY_ERROR';
    public const FILE_UPLOAD_FAILED = 'FILE_UPLOAD_FAILED';
    public const FILE_CONTENT_ERROR = 'FILE_CONTENT_ERROR';
    public const FILE_VALIDATION_ERROR = 'FILE_VALIDATION_ERROR';

    protected static $messages = [
        self::FILE_PATH_MISSING => 'The CSV file path configuration is missing. ',
        self::CONFIG_MISSING => 'Model csv configuration missing. ',
        self::FILE_NOT_FOUND => 'Csv file not found.',
        self::MISSING_FILE_COLUMN_CONFIG => 'File columns configuration not found.',
        self::FILE_COULUMN_NAME_CONFLICT => 'File columns name do not match configuration',
        self::FILE_NAME_MISSING => 'File Name is not configured or is missing',
        self::MISSING_COLUMN_FIELD_CONFIG => 'Missing columns to field mapping configuration',
        self::QUERY_ERROR => 'There was an error querying the database.' .
        ' Please try again. If the problem persists, please contact customer support.',
        self::FILE_UPLOAD_FAILED => 'File upload failed, Unable to upload file',
        self::FILE_CONTENT_ERROR => 'File contains invalid data',
        self::MISSING_FIELD_VALIDATION_CONFIG => 'Missing Fields validation configuration',
        self::FILE_VALIDATION_ERROR => 'File contains invalid data.',
    ];
}
