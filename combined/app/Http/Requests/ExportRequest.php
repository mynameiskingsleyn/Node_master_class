<?php

namespace App\Http\Requests;

class ExportRequest implements IValidatedRequest
{
    public const USERNAME = 'userName';
    public const PASSWORD = 'password';
    public const TYPE = 'type';
    public const UNIQUE_ID = 'unique_id';
    public const HISTORY_ID = 'history_id';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            self::USERNAME => 'bail|required',
            self::PASSWORD => 'bail|required',
            self::TYPE => 'bail|required|alpha',
            self::UNIQUE_ID => 'required|alpha_num',
            self::HISTORY_ID => 'nullable|alpha_num',
        ];
    }

    public static function paramUserName(): string
    {
        return self::USERNAME;
    }

    public static function paramPassword(): string
    {
        return self::PASSWORD;
    }
}
