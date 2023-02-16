<?php

namespace App\Modules\Reports\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Services\Report\ReportsService;
use App\Modules\Shared\Traits\Authorize;
use Closure;

class AgencyNotesQuery extends Query
{
    use Authorize;

    private $reportsService;

    protected $attributes = [
        'name' => 'agencyNotes',
        'description' => 'Get the list of agency notes for individual reports.'
    ];

    public function __construct(ReportsService $reportsService)
    {
        $this->reportsService = $reportsService;
    }

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('AgencyNotes'));
    }

    public function args(): array
    {
        return [
            'reports' => [
                'name' => 'reports',
                'type' => Type::listOf(Type::int()),
                'rules' => ['required', 'array']
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $reports = array_filter($args['reports'], function ($value) {
            return $value > 0;
        });
        return $this->reportsService->agencyNotes($reports);
    }
}
