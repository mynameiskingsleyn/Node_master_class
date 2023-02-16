<?php

namespace App\Modules\Search\Type\InputRecord\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class IncludeCreditReportExpField extends Field
{
    protected $attributes = [
        'name' => 'IncludeCreditReportExp',
        'description'   => '',
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
