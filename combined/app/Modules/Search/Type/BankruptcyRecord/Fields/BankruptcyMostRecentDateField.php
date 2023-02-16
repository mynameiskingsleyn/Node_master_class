<?php

namespace App\Modules\Search\Type\BankruptcyRecord\Fields;

use App\Services\Common\DateService;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;
use GraphQL\Type\Definition\ResolveInfo;
use Closure;

class BankruptcyMostRecentDateField extends Field
{
    private $dateService;

    public function __construct(DateService $dateService)
    {
        $this->dateService = $dateService;
    }

    protected $attributes = [
        'name' => 'bkt_most_recent_date',
        'description'   => 'Most recent date',
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
        $dates = array_filter([
            $this->dateService->parseDate((string) \data_get($root, 'bkt_ver_date')),
            $this->dateService->parseDate((string) \data_get($root, 'bkt_orig_filing_date')),
            $this->dateService->parseDate((string) \data_get($root, 'bkt_court_date_filed')),
            $this->dateService->parseDate((string) \data_get($root, 'bkt_orig_closing_date')),
            $this->dateService->parseDate((string) \data_get($root, 'bkt_disposed_date')),
        ]);

        return count($dates) > 0 ? max($dates) : null;
    }
}
