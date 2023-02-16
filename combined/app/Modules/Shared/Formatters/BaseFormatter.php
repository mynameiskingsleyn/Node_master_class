<?php

namespace App\Modules\Shared\Formatters;

abstract class BaseFormatter implements Formatter
{
    protected static $rawValue = null;

    public function __construct($value = null)
    {
        self::$rawValue = $value;
    }

    public static function getRawValue()
    {
        return self::$rawValue;
    }

    /**
     * Formats a value into a specific representation according to a specific format.
     */
    abstract public static function format($value = null);
}
