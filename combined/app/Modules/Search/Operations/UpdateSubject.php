<?php

declare(strict_types=1);

namespace App\Modules\Search\Operations;

class UpdateSubject extends BaseOperation
{
    protected $method = 'InsiderThreatUpdate';

    protected $rootRequest = 'Subject';

    protected $rootResponse = '';

    protected $options = [];
}
