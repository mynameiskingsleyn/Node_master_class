<?php

namespace App\Modules\Shared\Traits;

trait TypeHelperTrait
{
    /**
     * Resolve an array type
     * @param object $value
     * @param string $name
     * @return array
     */
    public function resolveArray($value, $name): array
    {
        $valueArray = [];
        if (property_exists($value, $name)) {
            if (is_array($value->$name)) {
                $valueArray = $value->$name;
            } else {
                $valueArray[] = $value->$name;
            }
        }
        return $valueArray;
    }
}
