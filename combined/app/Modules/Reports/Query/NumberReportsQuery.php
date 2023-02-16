<?php

namespace App\Modules\Reports\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Query;
use App\Services\Report\ReportsService;
use App\Modules\Shared\Traits\Authorize;
use Closure;

class NumberReportsQuery extends Query
{
    use Authorize;

    private $reportsService;

    protected $attributes = [
        'name' => 'numReports',
        'description' => 'Number of reports not viewed'
    ];

    public function __construct(ReportsService $reportsService)
    {
        $this->reportsService = $reportsService;
    }

    public function type(): Type
    {
        return Type::int();
    }

    public function args(): array
    {
        return [];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        return $this->reportsService->numberReports();
    }
}
