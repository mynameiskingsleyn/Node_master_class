<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ContactPointType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ContactPoint',
        'description' => 'ContactPoint',
    ];

    public function fields(): array
    {
        return [
            'Type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Value' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Phones' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $contacts = is_array($value) && isset($value['Type']) ? [$value] : [];
                    $phones = [];
                    foreach ($contacts as $contact) {
                        if (isset($contact['Type']) && $contact['Type'] === 'Phone') {
                            $phones[] = $contact['Value'] ?? '';
                        }
                    }
                    return implode(',', $phones);
                }
            ]
        ];
    }
}
