<?php

namespace App\Modules\Export\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PdfOutputType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PdfOutput',
        'description' => 'PDF output type',
    ];

    public function fields(): array
    {
        return [
            'report' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return $value['report'];
                }
            ],
            'filename' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return $value['file_name'];
                }
            ],
        ];
    }
}
