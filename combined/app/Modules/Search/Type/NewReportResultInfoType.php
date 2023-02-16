<?php

namespace App\Modules\Search\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

class NewReportResultInfoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'NewReportResultInfo',
        'description' => 'New Report Info Result'
    ];

    public function fields(): array
    {
        return [
            'subjectInfo' => [
                'type' => GraphQL::type('NewReportInputEcho'),
                'description' => '',
                'resolve' => function ($data) {
                    if ($data && isset($data->InputEcho)) {
                        return $data->InputEcho;
                    }
                    return null;
                }
            ],
            'InsiderReport' => [
                'type' =>  GraphQL::type('InsiderReportExp'),
                'description' =>  'Returned Report',
                'resolve' =>  function ($data) {
                    if ($data && isset($data->InsiderReport)) {
                        return $data->InsiderReport;
                    }
                }
            ],
            'status' => [
                'type' => Type::boolean(),
                'description' => 'Status of the resultset',
                'resolve' => function ($data) {
                    if ($data && isset($data->Status) && isset($data->Status->Success)) {
                        return (bool) $data->Status->Success;
                    }

                    return null;
                },
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'Description of the resultset',
                'resolve' => function ($data) {
                    if ($data && isset($data->Status) && isset($data->Status->Description)) {
                        return $data->Status->Description;
                    }

                    return null;
                },
            ]
        ];
    }
}
