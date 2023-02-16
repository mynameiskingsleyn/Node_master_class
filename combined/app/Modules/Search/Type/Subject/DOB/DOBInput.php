<?php

namespace App\Modules\Search\Type\Subject\DOB;

use Rebing\GraphQL\Support\InputType;

class DOBInput extends InputType
{
    protected $attributes = [
        'name' => 'DOBInput',
        'description' => 'Date of Birth',
    ];

    public function fields(): array
    {
        return [
            'day' => Fields\DayField::class,
            'month' => Fields\MonthField::class,
            'year' => Fields\YearField::class,
        ];
    }
}
