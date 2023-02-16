<?php

namespace App\Http\Requests;

class CloudflareRequest implements IValidatedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'appId'     => 'bail|required',
            'clientId'  => 'bail|required',
            'source'    => 'bail|required|in:dr,pr',
            'status'    => 'required|in:0,1',
        ];
    }
}
