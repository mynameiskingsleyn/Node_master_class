<?php

namespace App\Modules\Reports\Type;

use Rebing\GraphQL\Support\EnumType;
use App\Services\Report\ReportTypesConstant;

class ReportTypesEnum extends EnumType
{
    protected $attributes = [
        'name'        => 'ReportTypesEnum',
        'description' => 'Report types',
        'values'      => [
            ReportTypesConstant::PUBLIC_RECORD => [
                'value'       => ReportTypesConstant::PUBLIC_RECORD,
                'description' => 'Public Record',
            ],
            ReportTypesConstant::CREDIT_REPORT => [
                'value'       => ReportTypesConstant::CREDIT_REPORT,
                'description' => 'Credit Report',
            ],
            ReportTypesConstant::NONFCRA_PUBLIC_RECORD => [
                'value'       => ReportTypesConstant::NONFCRA_PUBLIC_RECORD,
                'description' => 'Non-FCRA Public Record',
            ],
            ReportTypesConstant::COMPLETE_REPORT => [
                'value'       => ReportTypesConstant::COMPLETE_REPORT,
                'description' => 'Combined Report',
            ],
        ],
    ];
}
