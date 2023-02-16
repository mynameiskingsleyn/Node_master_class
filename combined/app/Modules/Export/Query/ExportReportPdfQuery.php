<?php

namespace App\Modules\Export\Query;

use Rebing\GraphQL\Support\Query;
use App\Modules\Shared\Traits\Authorize;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use App\Services\Export\ExportPdfService;
use Closure;
use App\Services\Report\ReportTypesConstant;
use Illuminate\Validation\Rule;

class ExportReportPdfQuery extends Query
{
    use Authorize;

    /**
     * @var ExportPdfService
     */
    private $pdfService;

    protected $attributes = [
        'name' => 'exportReportPdf',
        'description' => 'Export a report to PDF'
    ];

    public function __construct(ExportPdfService $exportPdfService)
    {
        $this->pdfService = $exportPdfService;
    }

    public function type(): Type
    {
        return GraphQL::type('PdfOutput');
    }

    public function args(): array
    {
        return [
            'type' => [
                'name' => 'type',
                'type' => Type::string(),
                'rules' => [
                    'required',
                    'alpha',
                    Rule::in([
                        ReportTypesConstant::PUBLIC_RECORD,
                        ReportTypesConstant::CREDIT_REPORT,
                        ReportTypesConstant::NONFCRA_PUBLIC_RECORD,
                        ReportTypesConstant::COMPLETE_REPORT,
                    ])]
            ],
            'lexid' => [
                'name' => 'lexid',
                'type' => Type::float(),
                'rules' => ['required', 'numeric']
            ],
            'report_date' => [
                'name' => 'report_date',
                'type' => Type::string(),
                'rules' => ['required', 'date']
            ],
            'unique_id' => [
                'name' => 'unique_id',
                'type' => Type::string(),
                'rules' => ['required', 'alpha_num']
            ],
            'history_id' => [
                'name' => 'history_id',
                'type' => Type::float(),
                'rules' => ['required', 'numeric']
            ],
            'prQuery' => [
                'name' => 'prQuery',
                'type' => Type::string(),
                'rules' => ['alpha_num']
            ],
            'prFormat' => [
                'name' => 'prFormat',
                'type' => Type::string(),
                'rules' => ['alpha_num']
            ]


        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        ini_set('memory_limit', '512M');
        $result = [];
        $result['report'] = $this->pdfService->report($args);
        $result['file_name'] = $this->pdfService->getPdfName($args);
        return $result;
    }
}
