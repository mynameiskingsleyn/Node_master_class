<?php

namespace App\Modules\Authentication\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Field as Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\Authorize;
use Closure;
use App\Services\User\AccountService;
use Illuminate\Support\Facades\App;

class AccountQuery extends Query
{
    use Authorize;

    protected $attributes = [
        'name' => 'account',
        'description' => 'Get current account information'
    ];

    public function __construct()
    {
    }

    public function type(): Type
    {
        return GraphQL::type('IdentityType');
    }

    public function args(): array
    {
        return [];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $account = App::make(AccountService::class)->getAccount();
        $encoded = json_encode($account);
        $decoded = json_decode($encoded);
        return $decoded;
    }
}
