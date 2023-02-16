<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\App;
use App\Services\User\AccountService;

class GcIdScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $gcid_check_excluded = config('app.gcid_check_excluded');

        if (in_array(App::make(AccountService::class)->activeModule(), $gcid_check_excluded) === false) {
            $gc_id = App::make(AccountService::class)->gcId();
            $builder->where('gc_id', $gc_id);
        }
    }
}
