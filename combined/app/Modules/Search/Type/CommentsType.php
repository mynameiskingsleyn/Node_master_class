<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class CommentsType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'Comments',
        'description' => 'Comments',
    ];

    public function fields(): array
    {
        return [
            'Comment' => [
                'type' => Type::listOf(GraphQL::type('Comment')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'Comment');
                }
            ],
        ];
    }
}
