<?php

namespace App\Modules\Search\Services;

use ArrayIterator;
use RecursiveIterator;
use DOMNodeList;

class XmlTransformer extends ArrayIterator implements RecursiveIterator
{
    public function __construct(DOMNodeList $node_list)
    {
        $nodes = [];

        foreach ($node_list as $node) {
            $nodes[] = $node;
        }

        parent::__construct($nodes);
    }

    public function getChildren()
    {
        $node = $this->current();
        return new self($node->childNodes);
    }

    public function hasChildren()
    {
        $node = $this->current();
        return $node->hasChildNodes();
    }
}
