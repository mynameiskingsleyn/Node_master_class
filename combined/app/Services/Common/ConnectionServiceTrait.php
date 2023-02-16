<?php

namespace App\Services\Common;

trait ConnectionServiceTrait
{
    protected function getConnection(): string
    {
        return $this->connectionService->portfolioConnection();
    }
}
