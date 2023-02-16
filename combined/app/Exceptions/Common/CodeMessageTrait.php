<?php

namespace App\Exceptions\Common;

trait CodeMessageTrait
{
    /**
     * Returns the message for the given code
     * @param string $code
     * @return string
     */
    public static function message(string $code): string
    {
        if (isset(self::$messages)) {
            if (in_array($code, array_keys(self::$messages))) {
                return self::$messages[$code];
            }
        }
        return '';
    }
}
