<?php

namespace App\Modules\Shared\Rules;

use App\Services\ACL\AclService;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\App;

class AllowAgencyID implements Rule
{
    private $aclService;

    public function __construct()
    {
        $this->aclService = App::make(AclService::class);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return empty($value) ||
                $this->aclService->showAgencySubjectId() ||
                (empty($value) && !$this->aclService->showAgencySubjectId());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute attribute is not allowed.';
    }
}
