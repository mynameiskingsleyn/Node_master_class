<?php

namespace App\Modules\Shared\Type;

use GraphQL\Error\Error;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Utils\Utils;

class EmailType extends CustomScalarType
{
    /**
     * Name of the type
     *
     * @var string
     */
    public $name = 'Email';

    /**
     * Description of the type
     *
     * @var string
     */
    public $description = 'Electronic mail';

    /**
     * Parses an externally provided value (query variable) to use as an input
     *
     * @param mixed $value
     * @return mixed
     */
    public function parseValue($value)
    {
        if ($value && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new Error("Cannot represent following value as email: " . Utils::printSafeJson($value));
        }
        return $value;
    }

    /**
     * Parses an externally provided literal value (hardcoded in GraphQL query) to use as an input.
     *
     * E.g.
     * {
     *   user(email: "user@example.com")
     * }
     *
     * @param \GraphQL\Language\AST\Node $valueNode
     * @param array|null $variables
     * @return string
     * @throws Error
     */
    public function parseLiteral($valueNode, ?array $variables = null)
    {
        // Note: throwing GraphQL\Error\Error vs \UnexpectedValueException to benefit from GraphQL
        // error location in query:
        if (!$valueNode instanceof StringValueNode) {
            throw new Error('Query error: Can only parse strings got: ' . $valueNode->kind, [$valueNode]);
        }
        if (!filter_var($valueNode->value, FILTER_VALIDATE_EMAIL)) {
            throw new Error("Not a valid email", [$valueNode]);
        }
        return $valueNode->value;
    }

    public static function getInstance()
    {
        static $inst = null;
        if ($inst === null) {
            $inst = new self();
        }
        return $inst;
    }
}
