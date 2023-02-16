<?php

namespace App\Http\Requests;

class RequestsRegex
{
    public static $addressRegex = '/^[a-zA-Zá-úÁ-ÚñÑ0-9\s\-\'\.\#]+$/';
    public static $zipCodeRegex = '/^\d{5}(?:[-\s]\d{4})?$/';
    public static $nameRegex = '/^[a-zA-Zá-úÁ-ÚñÑ\s\-\'\.]+$/';
    public static $simpleStringRegex = '/^[a-zA-Zá-úÁ-ÚñÑ0-9\s\-\'\.\,\&\/\#\@]+$/';
    public static $currencyRegex = '/^\$?(\d{0,3}(\,\d{3})*|(\d+))(\.\d{0,2})?$/';
    public static $digitsOnlyRegex = '/^[0-9]+$/';
    public static $ipAddressRegex = '/^(\d{1,3})\.((\d{1,3}\.((\d{1,3}\.(\d{1,3}|(xxx)))|xxx\.xxx))|(xxx\.xxx\.xxx))$/';
    public static $macAddressRegex = '/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/';
    public static $phoneRegex = '/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/';
    public static $ssnRegex = '/^\d{3}[-]?\d{2}[-]?\d{4}$/';
}
