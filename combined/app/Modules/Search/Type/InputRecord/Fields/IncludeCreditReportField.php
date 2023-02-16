<?php

namespace App\Modules\Search\Type\InputRecord\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class IncludeCreditReportField extends Field
{
    protected $attributes = [
        'name' => 'include_credit_report',
        'description'   => '',
        'deprecationReason' => 'Field renamed, use IncludeCreditReport instead.'
    ];

    public function type(): Type
    {
        return Type::string();
    }

    public function args(): array
    {
        return [
        ];
    }
}
