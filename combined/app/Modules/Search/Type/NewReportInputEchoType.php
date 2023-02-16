<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class NewReportInputEchoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'NewReportInputEcho',
        'description' => 'Input needed to enroll a subject'
    ];

    public function fields(): array
    {
        return [
            'PubRecReportId' => [
                'name' => 'PubRecReportId',
                'type' => Type::int(),
            ],
            'PubRecNonFCRAReportId' => [
                'name' => 'PubRecNonFCRAReportId',
                'type' => Type::int(),
                'resolve' => function ($data) {
                    if (isset($data->PubRecReportExId)) {
                        return $data->PubRecReportExId;
                    }
                    return null;
                }
            ],
            'CreditReportId' => [
                'name' => 'CreditReportId',
                'type' => Type::int(),
            ],
            'SubjectId' => [
                'name' => 'SubjectId',
                'type' => Type::string(),
            ],
            'Lexid' => [
                'name' => 'Lexid',
                'type' => Type::string(),
            ],
            'LastName' => [
                'name' => 'LastName',
                'type' => Type::string(),
            ]
        ];
    }
}
