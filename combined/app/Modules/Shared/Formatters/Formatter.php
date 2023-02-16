<?php

namespace App\Modules\Shared\Formatters;

interface Formatter
{
    /**
     * Formats a value into a specific representation according to a specific format.
     */
    public static function format($value = null);
}
