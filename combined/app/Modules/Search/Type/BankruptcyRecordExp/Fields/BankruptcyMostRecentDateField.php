<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp\Fields;

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
        'name' => 'MostRecentDate',
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
            $this->dateService->parseDate($this->resolveDate(\data_get($root, 'FilingDate') ?? null)),
            $this->dateService->parseDate($this->resolveDate(\data_get($root, 'OriginalFilingDate') ?? null)),
            $this->dateService->parseDate($this->resolveDate(\data_get($root, 'ReopenDate') ?? null)),
            $this->dateService->parseDate($this->resolveDate(\data_get($root, 'ClosedDate') ?? null)),
            $this->dateService->parseDate($this->resolveDate(\data_get($root, 'ClaimsDeadline') ?? null)),
            $this->dateService->parseDate($this->resolveDate(\data_get($root, 'ComplaintDeadline') ?? null)),
            $this->dateService->parseDate($this->resolveDate(\data_get($root, 'DischargeDate') ?? null)),
        ]);

        return count($dates) > 0 ? max($dates) : null;
    }

    protected function resolveDate($dataItem): string
    {
        if (is_string($dataItem) || $dataItem === null) {
            return (string)$dataItem;
        }
        $dateString = '';
        $year = $dataItem->Year ?? '';
        $month = $dataItem->Month ?? '';
        $day = $dataItem->Day ?? '';
        if ($year && $month && $day) {
            $dateString = $year . '/' . $month . '/' . $day;
        } elseif ($year && $month) {
            $dateString = $month . '/' . $year;
        }
        return $dateString;
    }
}
