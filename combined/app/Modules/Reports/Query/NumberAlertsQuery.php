<?php

namespace App\Modules\Reports\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;
use App\Services\Report\ReportsService;
use App\Modules\Shared\Traits\Authorize;
use Closure;

class NumberAlertsQuery extends Query
{
    use Authorize;

    private $reportsService;

    protected $attributes = [
        'name' => 'numAlerts',
        'description' => 'Number of alerts for reports not viewed'
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
        return $this->reportsService->numAlerts();
    }
}
