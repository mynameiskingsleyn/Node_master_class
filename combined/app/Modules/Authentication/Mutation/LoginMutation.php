<?php

namespace App\Modules\Authentication\Mutation;

use App\Services\User\AccountService;
use Illuminate\Support\Facades\App;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use Closure;

class LoginMutation extends Mutation
{
    /**
     * @var
     */
    protected $attributes = [
        'name' => 'login',
        'description' => 'Authenticate the user in the application'
    ];

    public function type(): Type
    {
        return GraphQL::type('JwtTokenType');
    }

    public function args(): array
    {
        return [
            'input' => [
                'type' => GraphQL::type('LoginInput')
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $result = App::make(AccountService::class)->login($args['input']);
        $token = $result->getData();

        return ['jwt' => ((string) $token)];
    }
}
