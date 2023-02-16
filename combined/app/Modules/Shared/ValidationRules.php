<?php

namespace App\Modules\Shared;

class ValidationRules
{
    public const ALLOWED_MIN_LETTERS = 'a-zA-Z';
    public const ALLOWED_FULL_LETTERS = '\pLl{Latin}\pLu{Latin}\pNl{Latin}';
    public const ALLOWED_NUMBERS = '0-9';
    public const ALLOWED_CHARS = ' #\.\'\-';

    /**
     * Returns rules for username ie: (some_column_name, some-column-name, some.column.name)
     *
     * @return string Regex for username
     */
    public static function userName(): string
    {
        $name = self::ALLOWED_MIN_LETTERS . self::ALLOWED_NUMBERS;
        return sprintf('regex:/^[%s]+((\.(-\.)*-?|-(\._)*\.?|_(\._)*\.?)[%s]+)*$/', $name, $name);
    }

    /**
     * Returns rules for column names ie: (some_column_name)
     *
     * @return string Regex for column names
     */
    public static function columnName(): string
    {
        return sprintf('regex:/^[%s]+([_]?[%s]+)+$/', self::ALLOWED_MIN_LETTERS, self::ALLOWED_MIN_LETTERS);
    }

    /**
     * Returns rules for date_range ie: (custom, two-weeks, etc...)
     *
     * @return string Regex for date range
     */
    public static function dateRangeName(): string
    {
        return sprintf(
            'regex:/^[%s%s]+([-]?[%s%s]+)+$/',
            self::ALLOWED_MIN_LETTERS,
            self::ALLOWED_NUMBERS,
            self::ALLOWED_MIN_LETTERS,
            self::ALLOWED_NUMBERS
        );
    }

    /**
     * Returns rules for city ie: (words with spaces)
     *
     * @return string Regex for city names
     */
    public static function city(): string
    {
        return sprintf(
            'regex:/^[%s \.\-]*$/',
            self::ALLOWED_MIN_LETTERS
        );
    }

    /**
     * Returns rules for state
     *
     * @return string Regex for state abbreviations
     */
    public static function state(): string
    {
        $states = 'ak|al|ar|as|az|ca|co|ct|dc|de|fl|fm|ga|gu|hi|ia|id|il|in|ks|ky|la|' .
                  'ma|md|me|mh|mi|mn|mo|mp|ms|mt|nc|nd|ne|nh|nj|nm|nv|ny|oh|ok|or|pa|' .
                  'pr|pw|ri|sc|sd|tn|tx|ut|va|vi|vt|wa|wi|wv|wy|' .
                  'AK|AL|AR|AS|AZ|CA|CO|CT|DC|DE|FL|FM|GA|GU|HI|IA|ID|IL|IN|KS|KY|LA|' .
                  'MA|MD|ME|MH|MI|MN|MO|MP|MS|MT|NC|ND|NE|NH|NJ|NM|NV|NY|OH|OK|OR|PA|' .
                  'PR|PW|RI|SC|SD|TN|TX|UT|VA|VI|VT|WA|WI|WV|WY';
        return 'regex:/^(' . $states . ')*$/';
    }

    /**
     * Returns rules for first_name, middle_name, last_name ie: (First Name)
     *
     * @return string Regex for first_name, middle_name, last_name
     */
    public static function alphaWithSpaces(): string
    {
        $name_regex = self::ALLOWED_FULL_LETTERS . self::ALLOWED_NUMBERS . self::ALLOWED_CHARS;
        return sprintf('regex:/^([%s]+[\'\-]?[%s]*){1}$/u', $name_regex, $name_regex);
    }

    /**
     * Returns rules for first_name, middle_name, last_name ie: (First Name)
     *
     * @return string Regex for first_name, middle_name, last_name
     */
    public static function address(): string
    {
        $allowed_chars = ',#\.\'\- ';
        $name_regex = self::ALLOWED_FULL_LETTERS . self::ALLOWED_NUMBERS . $allowed_chars;
        return sprintf('regex:/^([%s]+[\'\-]?[%s]*){1}$/u', $name_regex, $name_regex);
    }
}
