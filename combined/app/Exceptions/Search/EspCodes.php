<?php

namespace App\Exceptions\Search;

use App\Exceptions\Common\CodeMessageTrait;

class EspCodes
{
    use CodeMessageTrait;

    const ESP_ERROR = 'ESP_ERROR';
    const ESP_DEFAULT_MISSING = 'ESP_DEFAULT_MISSING';
    const ESP_CONFIG_MISSING = 'ESP_CONFIG_MISSING';
    const ESP_VERSION_MISSING = 'ESP_VERSION_MISSING';
    const ERROR_OCCURED = 'An error has caused this search to fail. Please try again. If the error persists, please contact customer support.';

    protected static $messages = [
        self::ESP_ERROR => self::ERROR_OCCURED,
        self::ESP_DEFAULT_MISSING => self::ERROR_OCCURED,
        self::ESP_CONFIG_MISSING => self::ERROR_OCCURED,
        self::ESP_VERSION_MISSING => self::ERROR_OCCURED,
    ];
}
