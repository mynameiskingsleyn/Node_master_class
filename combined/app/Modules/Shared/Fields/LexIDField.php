<?php

namespace App\Modules\Shared\Fields;

use App\Modules\Shared\Formatters\LexIDFormatter;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use GraphQL\Type\Definition\ResolveInfo;
use Closure;

class LexIDField extends Field
{
    protected $attributes = [
        'description'   => 'Individual LexID',
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

    protected function getProperty(): string
    {
        return $this->attributes['alias'] ?? $this->attributes['name'];
    }

    protected function resolve($root, $array, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $lexid = $root->{$this->getProperty()} ?? null;
        return LexIDFormatter::format($lexid);
    }
}
