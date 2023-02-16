<?php

namespace App\Exceptions\Common\Formatters;

use App\Exceptions\Common\Formatters\ErrorFormatter;
use Exception;
use App\Exceptions\Common\BaseGQLException;
use Rebing\GraphQL\Error\ValidationError;
use GraphQL\Error\Error as GraphQLError;
use App\Exceptions\Common\Validations\ValidationCodes;
use App\Exceptions\Common\CommonCodes;

class GQLErrorFormatter extends ErrorFormatter
{
    /**
     * Method used to format all GraphQL exceptions thrown from the app
     * @param Exception $ex
     * @return array
     */
    public static function formatError(Exception $ex): array
    {
        switch (true) {
            case $ex instanceof BaseGQLException:
                return self::format($ex->getApiCode(), $ex->getMessage(), $ex->getData());
            case $ex instanceof ValidationError:
                return self::formatValidation(ValidationCodes::INVALID_INPUT, $ex->getValidatorMessages()->all());
            default:
                return self::defaultFormat(CommonCodes::UNKNOWN_ERROR, $ex->getMessage());
        }
    }
}
