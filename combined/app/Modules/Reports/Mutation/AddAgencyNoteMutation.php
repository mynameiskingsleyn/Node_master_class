<?php

namespace App\Modules\Reports\Mutation;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Modules\Shared\Traits\Authorize;
use App\Services\Report\ReportsService;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Services\ACL\AclService;
use Closure;

class AddAgencyNoteMutation extends Mutation
{
    use Authorize;

    protected $reportsService;
    private $aclService;

    protected $attributes = [
        'name' => 'addAgencyNote',
        'description' => 'Add an agency note to specific report'
    ];

    public function __construct(
        ReportsService $reportsService,
        AclService $aclService
    ) {
        $this->reportsService = $reportsService;
        $this->aclService = $aclService;
    }

    public function type(): Type
    {
        return Type::string();
    }

    public function args(): array
    {
        return [
            'notes' => [
                'type' => Type::string(),
                'rules' => ['required', 'string'],
            ],
            'report_id' => [
                'type' => Type::int(),
                'rules' => ['required', 'numeric'],
            ],
            'type' => [
                'type' => GraphQL::type('ReportTypesEnum'),
                'rules' => ['required', 'alpha'],
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        if (!$this->aclService->disabledCreditNotes()) {
            return $this->reportsService->addAgencyNote($args['notes'], $args['report_id'], $args['type']);
        }
        return null;
    }
}
