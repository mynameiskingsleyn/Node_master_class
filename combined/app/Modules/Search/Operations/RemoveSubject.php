<?php

declare(strict_types=1);

namespace App\Modules\Search\Operations;

class RemoveSubject extends BaseOperation
{
    protected $method = 'InsiderThreatRemove';

    protected $rootRequest = 'Subject';

    protected $rootResponse = '';

    protected $options = [];
}
