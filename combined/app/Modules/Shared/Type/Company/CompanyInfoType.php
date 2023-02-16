<?php

namespace App\Modules\Shared\Type\Company;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CompanyInfoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CompanyInfoType',
        'description' => 'Company information'
    ];

    public function fields(): array
    {
        return [
            "gcId" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "productId" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "companyId" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "name" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "url" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "status" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "billType" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "billTerm" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "billTermsAdjustment" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "billingAuthorityStatus" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "parentGcId" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "resellerParentGcId" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "adlDbid" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "poVoucherNumber" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "billingId" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "dunningStatus" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "primaryMarketCode" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "secondaryMarketCode" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "industryCode1" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "industryCode2" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "complianceClass" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "CompanyType" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "isFcra" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "invoiceEmailFlag" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "invoiceNotificationFormatFlag" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "internalType" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "dateAdded" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "userAdded" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "dateChanged" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "userChanged" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "securityLocked" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "description" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "companyType" => [
                "type" => Type::string(),
                "description" => "",
            ],
        ];
    }
}
