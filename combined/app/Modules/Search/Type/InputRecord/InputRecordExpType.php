<?php

namespace App\Modules\Search\Type\InputRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;

class InputRecordExpType extends GraphQLType
{
    protected $attributes = [
        'name' => 'InputRecordExp',
        'description' => 'InputRecord',
    ];

    public function fields(): array
    {
        return [
            'FirstName' => Fields\FirstNameField::class,
            'MiddleName' => Fields\MiddleNameField::class,
            'LastName' => Fields\LastNameField::class,
            'SuffixName' => Fields\NameSuffixField::class,
            'SSN' => Fields\SocialSecurityNumberField::class,
            'DOB' => Fields\DateofBirthField::class,
            'Address' => Fields\ConsumerAddressField::class,
            'City' => Fields\CityField::class,
            'State' => Fields\StateField::class,
            'Zip' => Fields\ZipCodeField::class,
            'LexID' => Fields\LexIDField::class,
            'include_credit_report' => Fields\IncludeCreditReportField::class,
            ];
    }
}
