<?php

namespace App\Modules\Reports\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Services\Report\ReportsService;
use App\Modules\Shared\Traits\Authorize;
use App\Modules\Shared\ValidationRules;
use Closure;

class ReportHistoryQuery extends Query
{
    use Authorize;

    private $reportsService;

    protected $attributes = [
        'name' => 'history',
        'description' => 'Search reports based in PII criteria'
    ];

    public function __construct(ReportsService $reportsService)
    {
        $this->reportsService = $reportsService;
    }

    public function type(): Type
    {
        return GraphQL::paginate('ReportHistory');
    }

    public function args(): array
    {
        return [
            'unique_id' => [
                'name' => 'unique_id',
                'type' => Type::string(),
                'rules' => ['required', 'alpha_num'],
            ],
            'limit' => [
                'name' => 'limit',
                'type' => Type::int(),
                'rules' => ['numeric'],
            ],
            'page' => [
                'name' => 'page',
                'type' => Type::int(),
                'rules' => ['numeric'],
            ],
            'sortBy' => [
                'name' => 'sortBy',
                'type' => Type::string(),
                'rules' => [ValidationRules::columnName()],
            ],
            'sortDir' => [
                'name' => 'sortDir',
                'type' => Type::string(),
                'rules' => ['nullable', 'alpha'],
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        return $this->reportsService->history($args);
    }
}
