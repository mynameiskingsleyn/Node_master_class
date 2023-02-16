<?php

namespace App\Modules\Search\Type\Subject\DOB\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class YearField extends Field
{
    protected $attributes = [
        'name' => 'Year',
        'description'   => 'Year',
    ];

    public function type(): Type
    {
        return Type::int();
    }

    public function args(): array
    {
        return [
        ];
    }

    protected function rules(array $args = []): array
    {
        return ['numeric'];
    }
}
