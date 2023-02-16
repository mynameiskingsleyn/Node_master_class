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

class ReportsQuery extends Query
{
    use Authorize;

    private $reportsService;

    protected $attributes = [
        'name' => 'reports',
        'description' => 'Get the list of reports available requested by the logged user'
    ];

    public function __construct(ReportsService $reportsService)
    {
        $this->reportsService = $reportsService;
    }

    public function type(): Type
    {
        return GraphQL::paginate('Report');
    }

    public function args(): array
    {
        return [
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
            'filters' => [
                'name' => 'filters',
                'type' => GraphQL::Type('SearchFilters')
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        return $this->reportsService->reports($args);
    }
}
