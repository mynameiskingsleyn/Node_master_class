<?php

namespace App\Http\Requests;

class SearchRequest implements IValidatedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return array_merge(
            self::baseRules(),
            self::nameRules(),
            self::addressRules(),
            self::driversLicenseRules(),
            self::dobRules(),
            self::mailingAddressRules()
        );
    }

    public static function messages()
    {
        return [
            'Name.*.regex' => 'All name fields must only contain valid characters',
            'Address.*' => 'One of the address fields is invalid.',
            'MailingAddress.*' => 'Invalid mailing address.',
            'DOB.*' => 'Invalid D.O.B.',
            'SSN.*' => 'Invalid SSN.',
            'Phone10.*' => 'Invalid Phone Number.',
            'UniqueId.*' => 'Invalid lex id.',
            'EmailAddress.*' => 'Invalid email address.',
            'DriversLicenseState.*' => 'Invalid Drivers license state.',
            'DriversLicenseNumber.*' => 'Invalid drivers license number.',
            'IpAddress.*' => 'Invalid IP Address.',
            'MACAddress.*' => 'Invalid MAC Address.',
        ];
    }

    public static function baseRules()
    {
        return [
            'SSN' => ['regex:' . RequestsRegex::$ssnRegex],
            'Phone10' => ['regex:' . RequestsRegex::$phoneRegex],
            'UniqueId' => ['numeric'],
            'EmailAddress' => ['regex:' . RequestsRegex::$simpleStringRegex],
            'IpAddress' => ['regex:' . RequestsRegex::$ipAddressRegex],
            'MACAddress' => ['regex:' . RequestsRegex::$macAddressRegex],
        ];
    }

    public static function nameRules()
    {
        return [
            'Name' => 'array',
            'Name.Full' => ['regex:' . RequestsRegex::$nameRegex],
            'Name.First' => ['regex:' . RequestsRegex::$nameRegex],
            'Name.Last' => ['regex:' . RequestsRegex::$nameRegex],
            'Name.Suffix' => ['regex:' . RequestsRegex::$nameRegex],
            'Name.Prefix' => ['regex:' . RequestsRegex::$nameRegex],
        ];
    }

    public static function addressRules()
    {
        return [
            'Address' => 'array',
            'Address.StreetAddress1' => ['regex:' . RequestsRegex::$addressRegex],
            'Address.City' => ['regex:' . RequestsRegex::$addressRegex],
            'Address.State' => ['regex:' . RequestsRegex::$addressRegex],
            'Address.Zip5' => ['numeric'],
        ];
    }

    public static function dobRules()
    {
        return [
            'DOB' => 'array',
            'DOB.Year' => ['numeric'],
            'DOB.Month' => ['numeric'],
            'DOB.Day' => ['numeric'],
        ];
    }

    public static function driversLicenseRules()
    {
        return [
            'DriversLicense' => 'array',
            'DriversLicense.DriversLicenseState' => ['alpha'],
            'DriversLicense.DriversLicenseNumber' => ['alpha_num'],
        ];
    }

    public static function mailingAddressRules()
    {
        return [
            'MailingAddress' => 'array',
            'MailingAddress.StreetAddress1' => ['regex:' . RequestsRegex::$addressRegex],
            'MailingAddress.City' => ['regex:' . RequestsRegex::$addressRegex],
            'MailingAddress.State' => ['regex:' . RequestsRegex::$addressRegex],
            'MailingAddress.Zip5' => ['regex:' . RequestsRegex::$zipCodeRegex],
        ];
    }
}
