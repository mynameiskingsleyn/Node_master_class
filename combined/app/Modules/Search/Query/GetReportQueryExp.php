<?php

namespace App\Modules\Search\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\Authorize;
use App\Services\Report\ReportsService;
use App\Services\Report\ReportTypesConstant;
use App\Modules\Search\Operations\GetReport;
use App\Modules\Search\Operations\GetSubject;
use App\Services\ACL\AclService;
use Illuminate\Support\Facades\App;
use App\Services\ACL\AuthorizeReportTrait as AuthorizeReport;
use Closure;

class GetReportQueryExp extends GetReportQuery
{
    use Authorize;
    use AuthorizeReport;

    /**
     * @var GetReport
     */
    private $report;

    /**
     * @var GetSubject
     */
    private $subject;

    /**
     * @var ReportsService
     */
    private $reportsService;

    /**
     * @var AclService
     */
    private $aclService;

    protected $attributes = [
        'name' => 'getReportExp',
        'description' => 'Return available report(s)'
    ];


    public function type(): Type
    {
        return GraphQL::type('InsiderReportUnion');
    }
}
