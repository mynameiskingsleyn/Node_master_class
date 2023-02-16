<?php

namespace App\Modules\Search\Type\Subject;

use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;

class InputEchoResultType extends GraphQLType
{
    protected $attributes = [
        'name' => 'InputEchoResult',
        'description' => 'Input Echo Result'
    ];

    public function fields(): array
    {
        return [
            'result' => [
                'type'          => GraphQL::type('SubjectReportInfo'),
                'description'   => 'Resultset of the operation',
                'resolve'       => function ($data) {
                    return $data->InputEcho ?? $data;
                },
            ],
            'InsiderReport' => [
                'type' =>  GraphQL::type('InsiderReportRunReport'),
                'description' =>  'Returned Report from run report',
                'resolve' =>  function ($data) {
                    if ($data && isset($data->InsiderReport)) {
                        return $data->InsiderReport;
                    }
                }
            ],
            'status' => [
                'type'          => Type::boolean(),
                'description'   => 'Status of the resultset',
                'resolve'       => function ($data) {
                    if ($data && isset($data->Status) && isset($data->Status->Success)) {
                        return (bool) $data->Status->Success;
                    }

                    return null;
                },
            ],
            'description' => [
                'type'          => Type::string(),
                'description'   => 'Description of the resultset',
                'resolve'       => function ($data) {
                    if ($data && isset($data->Status) && isset($data->Status->Description)) {
                        return $data->Status->Description;
                    }

                    return null;
                },
            ],
        ];
    }
}
