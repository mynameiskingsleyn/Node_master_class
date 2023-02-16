<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Shared\Traits\CheckGcId;

abstract class BaseModel extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
    }
}
