<?php

declare(strict_types=1);

namespace App\Modules\Search\Operations;

class RunReport extends BaseOperation
{
    protected $method = 'InsiderThreatRunReport';

    protected $rootRequest = 'ReportBy';

    protected $rootResponse = '';

    protected $options = [];

    public function prepareRequest($parameters)
    {
        $parameters = parent::prepareRequest($parameters);

        return $parameters;
    }
}
