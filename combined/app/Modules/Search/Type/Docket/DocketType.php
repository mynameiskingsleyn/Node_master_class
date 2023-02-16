<?php

namespace App\Modules\Search\Type\Docket;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class DocketType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Docket',
        'description' => 'Docket',
    ];

    public function fields(): array
    {
        return [
            'DocketText' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'PacerEnteredDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'FiledDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'AttachmentURL' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'EntryNumber' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'DocketEntryId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'DRCategoryEventId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'EnteredDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'EventDescription' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'EventCategory' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'PacerCaseId' => [
                'type' => Type::string(),
                'description' => '',
            ],

        ];
    }
}
