<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Services\Report\ReportsService;
use App\Services\Report\ReportTypesConstant;

class NonFCRAPublicRecordReportType extends GraphQLType
{
    private $reportsService;

    public function __construct(ReportsService $reportsService)
    {
        $this->reportsService = $reportsService;
    }

    protected $attributes = [
        'name' => 'PublicRecordNonFCRAReport',
        'description' => 'Public Record Report',
    ];

    public function fields(): array
    {
        return [
            'ReportDate' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value, $args) {
                    return $this->reportsService->getReportDate($value, ReportTypesConstant::NONFCRA_PUBLIC_RECORD);
                }
            ],
            'ReportStatus' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value, $args) {
                    return $value->ReportRef->nr_status ?? null;
                }
            ],
            'TransactionID' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'Notes' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'InputRecord' => [
                'type' => GraphQL::type('InputRecord'),
                'description' => ''
            ],
            'BankruptcyRecords' => [
                'type' => GraphQL::type('BankruptcyRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->BankruptcyRecords ?? null;
                }
            ],
            'JudgmentAndLienRecords' => [
                'type' => GraphQL::type('JudgmentAndLienRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->JudgmentAndLienRecords ?? null;
                }
            ],
            'ForeclosureRecords' => [
                'type' => GraphQL::type('ForeclosureRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->ForeclosureRecords ?? null;
                }
            ],
            'CriminalRecords' => [
                'type' => GraphQL::type('CriminalRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->CriminalRecords ?? null;
                }
            ],
            'SexOffenderRecords' => [
                'type' => GraphQL::type('SexOffenderRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->SexOffenderRecords ?? null;
                }
            ],
            'PropertyRecords' => [
                'type' => GraphQL::type('PropertyRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->PropertyRecords ?? null;
                }
            ],
            'ProfessionalLicenseRecords' => [
                'type' => GraphQL::type('ProfessionalLicenseRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->ProfessionalLicenseRecords ?? null;
                }
            ],
            'WatercraftRecords' => [
                'type' => GraphQL::type('WatercraftRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->WatercraftRecords ?? null;
                }
            ],
            'EmailAddressRecords' => [
                'type' => GraphQL::type('EmailAddressRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->EmailAddressRecords ?? null;
                }
            ],
            'PhoneRecords' => [
                'type' => GraphQL::type('PhoneRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->PhoneRecords ?? null;
                }
            ],
            'PeopleAtWorkRecords' => [
                'type' => GraphQL::type('PeopleAtWorkRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->PeopleAtWorkRecords ?? null;
                }
            ],
            'MotorVehicleRecords' => [
                'type' => GraphQL::type('MotorVehicleRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->MotorVehicleRecords ?? null;
                }
            ],
            'AircraftRecords' => [
                'type' => GraphQL::type('AircraftRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->AircraftRecords ?? null;
                }
            ],
            'AssociateRecords' => [
                'type' => GraphQL::type('AssociateRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->AssociateRecords ?? null;
                }
            ],
            'NeighborRecords' => [
                'type' => GraphQL::type('NeighborRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->NeighborRecords ?? null;
                }
            ],
            'UtilityRecords' => [
                'type' => GraphQL::type('UtilityRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->UtilityRecords ?? null;
                }
            ],
            'PilotRecords' => [
                'type' => GraphQL::type('PilotRecords'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->PilotRecords ?? null;
                }
            ],
            'AlertList' => [
                'type' => GraphQL::type('AlertList'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->AlertList ?? null;
                }
            ],
        ];
    }
}
