<?php

namespace App\Console\Commands\Templates;

class MutationTestTemplate extends TestTemplate
{
    public function composeStub()
    {
        // TODO - add template content
        return null;
    }

    public function __toString()
    {
        return $this->composeStub();
    }
}
