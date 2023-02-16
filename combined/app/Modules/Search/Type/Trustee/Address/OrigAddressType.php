<?php

namespace App\Modules\Search\Type\Trustee\Address;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class OrigAddressType extends GraphQLType
{
    protected $attributes = [
        'name' => 'OrigAddress',
        'description' => 'Origin Address of the Trustee',
    ];

    public function fields(): array
    {
        return [
            'OrigAddress' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'OrigCity' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'OrigState' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'OrigZIP' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'OrigZIP4' => [
                "type" => Type::string(),
                "description" => "",
            ],
        ];
    }
}
