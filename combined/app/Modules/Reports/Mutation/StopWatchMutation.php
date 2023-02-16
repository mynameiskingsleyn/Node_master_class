<?php

namespace App\Modules\Reports\Mutation;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Modules\Shared\Traits\Authorize;
use App\Services\Report\ReportsService;
use Closure;

class StopWatchMutation extends Mutation
{
    use Authorize;

    protected $reportsService;

    protected $attributes = [
        'name' => 'stopWatch',
        'description' => 'End monitoring the specific subject'
    ];

    public function __construct(ReportsService $reportsService)
    {
        $this->reportsService = $reportsService;
    }

    public function type(): Type
    {
        return Type::string();
    }

    public function args(): array
    {
        return [
            'record_id' => [
                'type' => Type::int(),
                'rules' => ['required', 'numeric'],
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        return $this->reportsService->stopWatching($args['record_id']);
    }
}
