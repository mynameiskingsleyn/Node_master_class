<?php

namespace App\Modules\Shared\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\App;
use App\Services\User\AccountService;

trait CheckGcId
{
    /**
     * Scope a query to only include users of a given type.
     *
     * @param  Builder  $query
     * @param  mixed  $type
     * @return Builder
     */
    public function scopeCheckGcId($query, $prefix = null)
    {
        $field = ($prefix ? $prefix . '.' : '') . 'gc_id';
        $gcid_check_excluded = config('app.gcid_check_excluded');

        if (in_array(App::make(AccountService::class)->activeModule(), $gcid_check_excluded) === false) {
            $gc_id = App::make(AccountService::class)->gcId();
            $query->where($field, $gc_id);
        }

        return $query;
    }
}
