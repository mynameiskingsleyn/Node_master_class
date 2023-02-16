<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use data_get;

class CreditFileType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CreditFile',
        'description' => 'CreditFile',
    ];

    public function fields(): array
    {
        return [
            'FileID' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $fileID = data_get($value, 'CreditFileID');
                    return $fileID && is_array($fileID) ? null : ($fileID ?? null);
                }
            ],
            'SourceType' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $sourceType = data_get($value, 'CreditRepositorySourceType');
                    return $sourceType && is_array($sourceType) ? ($sourceType[0] ?? null) : ($sourceType ?? null);
                }
            ],
            'Borrower' => [
                'type' => GraphQL::type('Borrower'),
                'description' => '',
                'resolve' => function ($value) {
                    return data_get($value, 'BORROWER');
                }
            ],
            'UnparsedAddresses' => [
                'type' => Type::listOf(Type::string()),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get(
                        $value,
                        'BORROWER.UnparsedAddress.value',
                        data_get($value, 'BORROWER.UnparsedAddress', [])
                    );

                    return is_string($data) ? [$data] : $data;
                }
            ],
            'Addresses' => [
                'type' => Type::listOf(Type::string()),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get(
                        $value,
                        'BORROWER.UnparsedAddress.value',
                        data_get($value, 'BORROWER.UnparsedAddress', [])
                    );

                    return is_string($data) ? [$data] : $data;
                }
            ],
            'UnparsedEmployment' => [
                'type' => Type::listOf(Type::string()),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get(
                        $value,
                        'BORROWER.UnparsedEmployment.value',
                        data_get($value, 'BORROWER.UnparsedEmployment', [])
                    );

                    return is_string($data) ? [$data] : $data;
                }
            ],
        ];
    }
}
