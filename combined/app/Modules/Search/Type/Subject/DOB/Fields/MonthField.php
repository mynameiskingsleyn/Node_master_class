<?php

namespace App\Modules\Search\Type\Subject\DOB\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class MonthField extends Field
{
    protected $attributes = [
        'name' => 'Month',
        'description'   => 'Month',
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

    protected function resolve($value)
    {
        if ($value) {
            $month = (string) $value->Month ?? null;
            if (is_string($month) && strlen($month) === 1) {
                $month = '0' . $month;
            }
            return $month;
        }
        return $value->Month ?? null;
    }
}
