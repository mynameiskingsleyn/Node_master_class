<?php

namespace App\Modules\Search\Type\Subject\DOB\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class DayField extends Field
{
    protected $attributes = [
        'name' => 'Day',
        'description'   => 'Day',
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
            $day = (string) $value->Day ?? null;
            if (is_string($day) && strlen($day) === 1) {
                $day = '0' . $day;
            }
            return $day;
        }
        return $value->Day ?? null;
    }
}
