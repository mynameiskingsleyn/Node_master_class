<?php

namespace App\Modules\Shared\Traits;

trait SanitizeInput
{
    /**
     * Prepare/sanitize input to be used in ESP operations
     * @return input value
     */
    public static function sanitize($input)
    {
        return is_string($input) ? \addslashes(trim($input)) : $input;
    }
}
