<?php

namespace App\Console\Commands\Templates;

use Rebing\GraphQL\Support\InputType;

class TypeTestTemplate extends TestTemplate
{
    public function composeStub()
    {

        $class = $this->class_path;
        $obj = $this->createClassObject($class);

        $fields = $obj->getFields();
        $fields_asserts = '';

        foreach ($fields as $field => $val) {
            $fields_asserts .= "\$this->assertArrayHasKey('$field', \$fields);\n\t\t\t\t";
        }

        $class_object = $obj instanceof InputType ? 'InputObjectType' : 'ObjectType';

        return <<<STUB
        <?php

        declare(strict_types=1);

        namespace Tests\\{$this->class_namespace};

        use Closure;
        use Tests\TestCase;
        use GraphQL\Type\Definition\ObjectType;
        use GraphQL\Type\Definition\Type;
        use {$this->class_path};

        class {$this->class_name}Test extends TestCase
        {

            private \$type;

            protected function setUp(): void
            {
                parent::setUp();
                \$this->type = new {$this->class_name}();
            }

            /**
             * Test getFields.
             * \@test
             */
            public function get_fields(): void
            {
                \$fields = \$this->type->getFields();

                $fields_asserts
            }

            /**
             * Test get attributes.
             * \@test
             */
            public function get_attributes(): void
            {
                \$attributes = \$this->type->getAttributes();

                \$this->assertArrayHasKey('name', \$attributes);
                \$this->assertArrayHasKey('description', \$attributes);
                \$this->assertArrayHasKey('fields', \$attributes);
                \$this->assertInstanceOf(Closure::class, \$attributes['fields']);
                \$this->assertIsArray(\$attributes['fields']());
            }

            /**
             * Test get attributes fields closure.
             * \@test
             */
            public function get_attributes_fields(): void
            {
                \$type = \$this->getMockBuilder({$this->class_name}::class)
                            ->setMethods(['getFields'])
                            ->getMock();

                \$type->expects(\$this->once())
                    ->method('getFields');

                \$attributes = \$type->getAttributes();
                \$attributes['fields']();
            }

            /**
             * Test to array.
             * \@test
             */
            public function to_array(): void
            {
                \$array = \$this->type->toArray();

                \$this->assertIsArray(\$array);

                \$attributes = \$this->type->getAttributes();
                \$this->assertEquals(\$attributes, \$array);
            }

            /**
             * Test to type.
             * \@test
             */
            public function to_type(): void
            {
                \$objectType = \$this->type->toType();

                \$this->assertInstanceOf({$class_object}::class, \$objectType);

                \$this->assertEquals(\$objectType->name, \$this->type->name);

                \$fields = \$objectType->getFields();
                $fields_asserts
            }
        }
        STUB;
    }

    public function __toString()
    {
        return $this->composeStub();
    }
}
