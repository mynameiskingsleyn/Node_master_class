<?php

namespace App\Modules\Search\Type\Comment;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CommentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Comment',
        'description' => 'Comment',
    ];

    public function fields(): array
    {
        return [
            'Description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FilingDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
        ];
    }
}
