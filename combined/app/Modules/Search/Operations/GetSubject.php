<?php

declare(strict_types=1);

namespace App\Modules\Search\Operations;

class GetSubject extends BaseOperation
{
    protected $method = 'InsiderThreatGetSubject';

    protected $rootRequest = 'Subject';

    protected $rootResponse = '';

    protected $options = [];
}
