<?php

namespace App\Modules\Shared\Type;

use GraphQL\Error\Error;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Utils\Utils;

class URIType extends CustomScalarType
{
    /**
     * Name of the type
     *
     * @var string
     */
    public $name = 'URI';

    /**
     * URI (Uniform Resource Identifier)
     *
     * @var string
     */
    public $description = 'A URI is a string of characters that unambiguously identifies a particular resource.';

    /**
     * Parses an externally provided value (query variable) to use as an input
     *
     * @param  mixed $value
     * @return mixed
     */
    public function parseValue($value)
    {
        if ($value && !filter_var($value, FILTER_VALIDATE_URL)) {
            throw new Error('Cannot represent following value as URI: ' . Utils::printSafeJson($value));
        }

        return $value;
    }

    /**
     * Parses an externally provided literal value (hardcoded in GraphQL query) to use as an input.
     *
     * @param  \GraphQL\Language\AST\Node $valueNode
     * @param  array|null                 $variables
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
        if (!filter_var($valueNode->value, FILTER_VALIDATE_URL)) {
            throw new Error('Not a valid URL', [$valueNode]);
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
