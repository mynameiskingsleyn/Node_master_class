<?php

namespace App\Modules\Authentication\Mutation;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\Authorize;
use GraphQL\Type\Definition\ResolveInfo;
use App\Services\User\AccountService;
use Illuminate\Support\Facades\App;
use Closure;

class RenewTokenMutation extends Mutation
{
    use Authorize;

    protected $attributes = [
        'name' => 'renew',
        'description' => 'Renews the authentication token'
    ];

    public function type(): Type
    {
        return GraphQL::type('JwtTokenType');
    }

    public function args(): array
    {
        return [];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $result = App::make(AccountService::class)->renew();
        $token = $result->getData();

        return ['jwt' => ((string) $token), 'timestamp' => time()];
    }
}
