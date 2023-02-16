<?php

namespace App\Modules\Search\Type\InputRecord\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use GraphQL\Type\Definition\ResolveInfo;
use DateTime;
use Closure;

class DateofBirthField extends Field
{
    public const DATE_OF_BIRTH_FORMAT = 'Y/m/d';

    protected $attributes = [
        'name' => 'DOB',
        'description'   => 'Date of Birth of consumer',
    ];

    public function type(): Type
    {
        return Type::string();
    }

    public function args(): array
    {
        return [
        ];
    }

    protected function resolve($root, $array, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $dob = new DateTime(\data_get($root, 'DOB'));
        return date_format($dob, self::DATE_OF_BIRTH_FORMAT);
    }
}
