<?php

declare(strict_types=1);

namespace App\Modules\Search\Operations;

class RequestNewReport extends BaseOperation
{
    protected $method = 'InsiderThreatRequestNewReport';

    protected $rootRequest = '';

    protected $rootResponse = '';

    protected $options = [];

    protected $blueprint = [
        'Subject' => [
            'Name' => [
                'Full' => '',
                'First' => '',
                'Middle' => '',
                'Last' => '',
                'Suffix' => '',
                'Prefix' => '',
            ],
            'Address' => [
                'StreetNumber' => '',
                'StreetPreDirection' => '',
                'StreetName' => '',
                'StreetSuffix' => '',
                'StreetPostDirection' => '',
                'UnitDesignation' => '',
                'UnitNumber' => '',
                'StreetAddress1' => '',
                'StreetAddress2' => '',
                'City' => '',
                'State' => '',
                'Zip5' => '',
                'Zip4' => '',
                'County' => '',
                'PostalCode' => '',
                'StateCityZip' => '',
                'Latitude' => '',
                'Longitude' => '',
            ],
            'DOB' => [
                'Year' => '',
                'Month' => '',
                'Day' => '',
            ],
            'SSN' => '',
            'AgencySubjectId' => ''
        ],
    ];

    public function getOptions()
    {
        return $this->options;
    }
}
