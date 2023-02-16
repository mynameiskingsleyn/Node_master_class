<?php

namespace App\Modules\Search\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\Authorize;
use App\Modules\Shared\ValidationRules;
use App\Modules\Search\Operations\GetSubject;
use Closure;

class GetSubjectQuery extends Query
{
    use Authorize;

    private $subject;

    protected $attributes = [
        'name' => 'getSubject',
        'description' => 'Get monitored individual PII'
    ];

    public function __construct(GetSubject $subject)
    {
        $this->subject = $subject;
    }

    public function type(): Type
    {
        return GraphQL::type('SubjectResult');
    }

    public function args(): array
    {
        return [
            'SubjectId' => [
                'name' => 'SubjectId',
                'type' => Type::string(),
                'rules' => ['required', 'alpha_num'],
            ],
            'Lexid' => [
                'name' => 'Lexid',
                'type' => Type::float(),
                'rules' => ['required', 'numeric'],
            ],
            'LastName' => [
                'name' => 'LastName',
                'type' => Type::string(),
                'rules' => ['required', ValidationRules::alphaWithSpaces()]
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        return $this->subject->submit($args);
    }
}
