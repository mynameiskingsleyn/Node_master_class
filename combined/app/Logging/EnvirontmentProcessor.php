<?php

namespace App\Logging;

use Monolog\Processor\ProcessorInterface;

class EnvirontmentProcessor implements ProcessorInterface
{
    /**
     * {@inheritDoc}
     */
    public function __invoke(array $record): array
    {
        if (!function_exists('env')) {
            return $record;
        }

        $record['extra']['environment'] = env('APP_ENV');
        return $record;
    }
}
