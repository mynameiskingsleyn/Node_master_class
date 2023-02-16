<?php

namespace App\Http\Requests;

class LoginRequest implements IAuthenticationRequest, IValidatedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            self::USER_NAME => 'required',
            self::PASSWORD => 'required'
        ];
    }
}
