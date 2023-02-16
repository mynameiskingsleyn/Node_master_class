<?php

namespace App\Modules\Search\Type\InputRecord\Fields;

use App\Modules\Shared\Formatters\LexIDFormatter;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use GraphQL\Type\Definition\ResolveInfo;
use Closure;

class LexIDField extends Field
{
    protected $attributes = [
        'name' => 'LexID',
        'description'   => 'Consumer LexID derived from submitted PII',
    ];

    public function type(): Type
    {
        return Type::float();
    }

    public function args(): array
    {
        return [
        ];
    }

    protected function resolve($root, $array, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $lexid = $root->LexID ?? null;
        return LexIDFormatter::format($lexid);
    }
}
