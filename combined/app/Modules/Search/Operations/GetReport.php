<?php

declare(strict_types=1);

namespace App\Modules\Search\Operations;

class GetReport extends BaseOperation
{
    protected $method = 'InsiderThreatGetReport';

    protected $rootRequest = 'ReportId';

    protected $rootResponse = '';

    protected $options = [];
}
