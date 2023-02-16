<?php

namespace App\Exceptions;

use Rebing\GraphQL\GraphQL as GraphQLHandler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Exception;
use App\Exceptions\Common\BaseGQLException;
use Illuminate\Support\Facades\App;

class GQLHandler extends GraphQLHandler
{
    /**
     * @param  Error[]  $errors
     * @param  callable  $formatter
     * @return Error[]
     */
    public static function handleErrors(array $gqlErrors, callable $formatter): array
    {
        $errors = [];
        $handler = App::make(ExceptionHandler::class);

        foreach ($gqlErrors as $error) {
            // Try to unwrap exception
            $error = $error->getPrevious() ?: $error;
            $errors[] = $error;
            $handler->report($error);
        }

        return array_map($formatter, $errors);
    }
}
