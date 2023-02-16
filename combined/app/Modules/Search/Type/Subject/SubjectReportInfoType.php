<?php

namespace App\Modules\Search\Type\Subject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SubjectReportInfoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'SubjectReportInfo',
        'description' => 'Info needed to identify returned report of an individual'
    ];

    public function fields(): array
    {
        return [
            'PubRecReportId' => [
              'name' => 'PubRecReportId',
              'type' => Type::float(),
            ],
            'CreditReportId' => [
              'name' => 'CreditReportId',
              'type' => Type::float(),
            ],
            'SubjectId' => [
                'name' => 'SubjectId',
                'type' => Type::string(),
            ],
            'Lexid' => [
                'name' => 'Lexid',
                'type' => Type::float(),
            ],
            'LastName' => [
                'name' => 'LastName',
                'type' => Type::string(),
            ],
        ];
    }
}
