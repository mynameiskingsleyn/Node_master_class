<?php

namespace App\Modules\Search\Operations;

use LNWebAPI2\Framework\Responses\IResult;

interface IEspMethod
{
    public function submit(): IResult;
}
