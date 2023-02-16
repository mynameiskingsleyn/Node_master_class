<?php

namespace App\Modules\Shared\Traits;

trait ResponseHelperTrait
{
    /**
     * Check for "Individual not found" message from ESP
     * @param string $espDesc
     * @return bool
     */
    protected function cantFindIndividual(string $espDesc): bool
    {
        return stristr($espDesc, 'Individual not found') !== false;
    }
}
