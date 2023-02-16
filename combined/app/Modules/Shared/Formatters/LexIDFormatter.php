<?php

namespace App\Modules\Shared\Formatters;

class LexIDFormatter extends BaseFormatter
{
    public static function format($value = null)
    {
        if (is_null($value)) {
            $value = self::$rawValue;
        }
        if ($value && (string) $value === '-1') {
            return (string) $value;
        }
        return $value ? str_pad((string) $value, 12, '0', STR_PAD_LEFT) : null;
    }
}
