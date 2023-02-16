<?php

namespace App\Modules\Search\Type\Subject\DOB;

use Rebing\GraphQL\Support\Type as GraphQLType;

class DOBType extends GraphQLType
{
    protected $attributes = [
        'name' => 'DOB',
        'description' => 'Date of Birth',
    ];

    public function fields(): array
    {
        return [
            'Day' => Fields\DayField::class,
            'Month' => Fields\MonthField::class,
            'Year' => Fields\YearField::class,
        ];
    }
}
