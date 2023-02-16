<?php

namespace App\Modules\Search\Type\Unions;

use App\Modules\Search\Type\PublicRecordReportExpType;
use App\Modules\Search\Type\PublicRecordReportType;
use Rebing\GraphQL\Support\UnionType;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Services\Report\ReportsFormat;

class InsiderReportUnionType extends UnionType
{
    protected $attributes = [
      'name' => 'InsiderReportUnion',
      'description' => 'Union for InsiderReport and InsiderReportExp'
    ];

    public function types(): array
    {
        return [
          GraphQL::type('InsiderReport'),
          GraphQL::type('InsiderReportExp'),
        ];
    }

    public function resolveType($value)
    {
        if (isset($value->PublicRecordReportFormat) && $value->PublicRecordReportFormat === ReportsFormat::PREX) {
            return GraphQL::type('InsiderReportExp');
        } else {
            return GraphQL::type('InsiderReport');
        }
    }
}
