<?php

namespace App\Modules\Shared\Traits;

trait ValidationRules
{
    /**
     * Returns rules for username ie: (some_column_name, some-column-name, some.column.name)
     * @return string Regex for username
     */
    public static function userName(): string
    {
        return 'regex:/^[a-zA-Z0-9]+((\.(-\.)*-?|-(\._)*\.?|_(\._)*\.?)[a-zA-Z0-9]+)*$/';
    }

    /**
     * Returns rules for column names ie: (some_column_name)
     * @return string Regex for column names
     */
    public static function columnName(): string
    {
        return 'regex:/^[a-zA-Z]+([_]?[a-zA-Z]+)+$/';
    }

    /**
     * Returns rules for date_range ie: (custom, two-weeks, etc...)
     * @return string Regex for date range
     */
    public static function dateRangeName(): string
    {
        return 'regex:/^[a-zA-Z0-9]+([-]?[a-zA-Z0-9]+)+$/';
    }

    /**
     * Returns rules for city ie: (words with spaces)
     * @return string Regex for city names
     */
    public static function city(): string
    {
        return 'regex:/^[a-zA-Z \.]*$/';
    }

    /**
     * Returns rules for street address ie: (words and numbers with spaces)
     * @return string Regex for street address
     */
    public static function streetAddress(): string
    {
        return 'regex:/^[a-zA-Zá-úÁ-ÚñÑ0-9\s\-\'\.\#]+$/';
    }

    /**
     * Returns rules for first_name, middle_name, last_name ie: (First Name)
     * @return string Regex for first_name, middle_name, last_name
     */
    public static function alphaWithSpaces(): string
    {
        return 'regex:/^([a-zA-Z ]+[\'\-]?[a-zA-Z ]*){1}$/';
    }
}
