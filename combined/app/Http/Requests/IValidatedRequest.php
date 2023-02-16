<?php

namespace App\Http\Requests;

interface IValidatedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules();
}
