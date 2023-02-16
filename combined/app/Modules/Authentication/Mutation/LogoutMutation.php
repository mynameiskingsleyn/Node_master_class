<?php

namespace App\Modules\Authentication\Mutation;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Modules\Shared\Traits\Authorize;
use GraphQL\Type\Definition\ResolveInfo;
use App\Services\User\AccountService;
use Illuminate\Support\Facades\App;
use Closure;

class LogoutMutation extends Mutation
{
    use Authorize;

    protected $attributes = [
        'name' => 'logout',
        'description' => 'Terminate the current session',
    ];

    public function type(): Type
    {
        return Type::string();
    }

    public function args(): array
    {
        return [];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $result = App::make(AccountService::class)->logout();
        return (string) $result->getData();
    }
}
