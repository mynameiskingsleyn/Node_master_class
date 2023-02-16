<?php

namespace App\Modules\Shared\Type;

use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ScalarType;
use GraphQL\Error\Error;
use GraphQL\Language\AST\StringValueNode;
use GraphQL\Type\Definition\Type;
use GraphQL\Language\AST\Node;

class CustomScalarType extends ScalarType
{
    /**
     * Serializes an internal value to include in a response.
     *
     * @param string $value
     * @return string
     */
    public function serialize($value)
    {
        return $value;
    }

    public function toType(): Type
    {
        return $this->getInstance();
    }

    /**
     * Parses an externally provided value (query variable) to use as an input
     * @param mixed $value
     * @return mixed
     */
    public function parseValue($value)
    {
        return $value;
    }

    /**
     * Parses an externally provided literal value (hardcoded in GraphQL query) to use as an input.
     * @param \GraphQL\Language\AST\Node $valueNode
     * @param array|null $variables
     * @return string
     * @throws Error
     */
    public function parseLiteral(Node $valueNode, ?array $variables = null)
    {
        if (!$valueNode instanceof StringValueNode) {
            throw new Error('Query error: Can only parse strings got: ' . $valueNode->kind, [$valueNode]);
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
