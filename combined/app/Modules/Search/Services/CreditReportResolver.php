<?php

namespace App\Modules\Search\Services;

use RecursiveIteratorIterator;
use DOMDocument;

class CreditReportResolver
{
    protected $report;

    public function getReport($xmlSource)
    {
        $xml = new DOMDocument();
        $xml->loadXML($xmlSource);
        return $this->parseReport($xml);
    }

    public function parseReport($xmlSource)
    {
        $iterator = new XmlTransformer($xmlSource->childNodes);

        $recursive_iterator = new RecursiveIteratorIterator(
            $iterator,
            RecursiveIteratorIterator::CHILD_FIRST
        );

        $result = [];
        $childResult = [];
        $parents = [];

        foreach ($recursive_iterator as $index => $node) {
            if ($node->nodeType === XML_ELEMENT_NODE) {
                //$depth = $recursive_iterator->getDepth();
                $parent = $node->parentNode;

                $node_child = [];
                $node_name = preg_replace('/^_/', '', $node->nodeName);
                //$node_child['name'] = $node_name;
                $node_child['value'] = strip_tags(trim($node->textContent));

                if ($node->hasAttributes()) {
                    foreach ($node->attributes as $attr) {
                        $attr_name = preg_replace('/^_/', '', $attr->name);
                        $node_child['attributes'][$attr_name] = $attr->value;
                    }
                }

                if (
                    in_array($node_name, [
                    'DATA_VERSION',
                    'CREDIT_LIABILITY',
                    'CREDIT_FILE',
                    'LATE_COUNT',
                    'PAYMENT_PATTERN',
                    'CREDIT_TRADE_REFERENCE',
                    'CREDITOR',
                    'CREDIT_COMMENT',
                    'CURRENT_RATING',
                    'CREDIT_REPOSITORY',
                    'CREDIT_INQUIRY',
                    'RESIDENCE',
                    'EMPLOYER',
                    'ALIAS',
                    'BORROWER',
                    'CREDIT_PUBLIC_RECORD',
                    'PUBLIC_RECORD_SCORE',
                    'CREDIT_CONSUMER_REFERRAL',
                    'KEY',
                    'CONTACT_DETAIL',
                    'CONTACT_POINT',
                    'Text',
                    'UnparsedAddress',
                    'UnparsedEmployment'
                    ])
                ) {
                    if ($node_name === 'PAYMENT_PATTERN') {
                        if ($parent->nodeName !== 'UNMERGED_LIABILITY' && $parent->hasAttributes()) {
                            $childValue = [ $parent->attributes->getNamedItem('CreditTradeReferenceID')->nodeValue => [ $node_name => $node_child['attributes'] ] ];
                            $nodeParents = $this->getParent($node, $parents);
                            $childResult = $this->makeChildArray($nodeParents, $childValue);
                        }
                    } elseif ($node_name === 'LATE_COUNT') {
                        if ($parent->nodeName !== 'UNMERGED_LIABILITY' && $parent->hasAttributes()) {
                            $childValue = [ $parent->attributes->getNamedItem('CreditTradeReferenceID')->nodeValue => [ $node_name => $node_child['attributes'] ] ];
                        }
                    } elseif ($node_name === 'Text' && $parent->nodeName === 'CREDIT_COMMENT') {
                            $tradeReference = $parent->parentNode->attributes->getNamedItem('CreditTradeReferenceID');
                        if ($tradeReference) {
                            $childValue = [ $tradeReference->nodeValue => [ 'CREDIT_COMMENT' => $node_child['value'] ?? null ] ];
                        }
                    } elseif ($node_name === 'CURRENT_RATING') {
                        if ($parent->nodeName !== 'UNMERGED_LIABILITY' && $parent->hasAttributes()) {
                            $childValue = [ $parent->attributes->getNamedItem('CreditTradeReferenceID')->nodeValue => [ $node_name => $node_child['attributes'] ] ];
                        }
                    } elseif ($node_name === 'CREDIT_REPOSITORY' && $parent->nodeName === 'CREDIT_LIABILITY') {
                        if ($parent->nodeName !== 'UNMERGED_LIABILITY' && $parent->hasAttributes()) {
                            $childValue = [ $parent->attributes->getNamedItem('CreditTradeReferenceID')->nodeValue => [ $node_name => $node_child['attributes'] ] ];
                        }
                    } elseif ($node_name === 'CREDIT_REPOSITORY' && $parent->nodeName === 'CREDIT_INQUIRY' && $parent->hasAttributes()) {
                        $childValue = [ $parent->attributes->getNamedItem('CreditInquiryID')->nodeValue => [ $node_name => $node_child['attributes'] ] ];
                    } elseif ($node_name === 'CREDIT_REPOSITORY' && $parent->nodeName === 'CREDIT_TRADE_REFERENCE' && $parent->hasAttributes()) {
                        $childValue = [ $parent->attributes->getNamedItem('CreditTradeReferenceID')->nodeValue => [ $node_name => $node_child['attributes'] ] ];
                    } elseif ($node_name === 'CREDIT_INQUIRY' && $node->hasAttributes()) {
                        $childValue = [ $node_name => [ $node->attributes->getNamedItem('CreditInquiryID')->nodeValue => $node_child['attributes'] ] ];
                    } elseif ($node_name === 'CREDIT_TRADE_REFERENCE' && $node->hasAttributes()) {
                        $childValue = [ $node->attributes->getNamedItem('CreditTradeReferenceID')->nodeValue => [ 'CREDITOR' => $node_child['attributes'] ] ];
                    } elseif ($node_name === 'CREDIT_LIABILITY' && $node->hasAttributes()) {
                        $childValue = [ $node_name => [ $node->attributes->getNamedItem('CreditTradeReferenceID')->nodeValue => $node_child['attributes'] ] ];
                    } elseif ($node_name === 'CREDIT_FILE') {
                        $childValue = [ 'CREDIT_FILE' => [ $node->attributes->getNamedItem('CreditFileID')->nodeValue => $node_child['attributes'] ] ];
                    } elseif ($node_name === 'CREDIT_PUBLIC_RECORD' && $node->hasAttributes()) {
                        $childValue = [ $node_name => [ $node->attributes->getNamedItem('CreditPublicRecordID')->nodeValue => $node_child['attributes'] ] ];
                    } elseif ($node_name === 'CREDIT_REPOSITORY' && $parent->nodeName === 'CREDIT_PUBLIC_RECORD' && $parent->hasAttributes()) {
                        $childValue = [ $parent->attributes->getNamedItem('CreditPublicRecordID')->nodeValue => [ $node_name => $node_child['attributes'] ] ];
                    } elseif ($node_name === 'PUBLIC_RECORD_SCORE' && $parent->nodeName === 'CREDIT_PUBLIC_RECORD' && $parent->hasAttributes()) {
                        $childValue = [ $parent->attributes->getNamedItem('CreditPublicRecordID')->nodeValue => [ $node_name => $node_child['attributes'] ?? null ] ];
                    } elseif ($node_name === 'CREDITOR' && $parent->hasAttributes()) {
                        $childValue = [ $parent->attributes->getNamedItem('CreditTradeReferenceID')->nodeValue => [ $node_name => $node_child['attributes'] ?? null ] ];
                    } elseif (
                        $node_name === 'CONTACT_POINT' && $parent->nodeName === 'CONTACT_DETAIL' && $node->hasAttributes()
                            && $parent->parentNode && $parent->parentNode->nodeName === 'CREDIT_TRADE_REFERENCE'
                    ) {
                        $childValue = [ $parent->parentNode->attributes->getNamedItem('CreditTradeReferenceID')->nodeValue => [ $node_name => $node_child['attributes'] ?? null ] ];
                    } elseif (
                        ($node_name === 'ALIAS' || $node_name === 'RESIDENCE' || $node_name === 'EMPLOYER' || $node_name === 'UnparsedAddress' || $node_name === 'UnparsedEmployment') &&
                        ($parent->nodeName === '_BORROWER' || $parent->nodeName === 'BORROWER') &&
                        $parent->parentNode && $parent->parentNode->nodeName === 'CREDIT_FILE'
                    ) {
                            $childValue = [ $parent->parentNode->attributes->getNamedItem('CreditFileID')->nodeValue => ['BORROWER' => [ $node_name => [ $node_child['attributes'] ?? $node->nodeValue ] ] ] ];
                    } elseif (
                        $node_name === 'BORROWER' && $parent->nodeName === 'CREDIT_FILE' && $node->hasAttributes()
                    ) {
                            $childValue = [ $parent->attributes->getNamedItem('CreditFileID')->nodeValue => ['BORROWER' => $node_child['attributes'] ] ];
                    } else {
                        $childValue = [ $node_name => [ $node_child ] ];
                    }
                } else {
                    $childValue = [ $node_name => $node_child ];
                }

                if ($node_name == 'CREDIT_TRADE_REFERENCE') {
                    $nodeParents = [
                        "#document",
                        "RESPONSE_GROUP",
                        "RESPONSE",
                        "RESPONSE_DATA",
                        "CREDIT_RESPONSE",
                        "CREDIT_LIABILITY"
                    ];
                } elseif (
                    $node_name === 'CONTACT_POINT' && $parent->nodeName === 'CONTACT_DETAIL' && $node->hasAttributes()
                    && $parent->parentNode && $parent->parentNode->nodeName === 'CREDIT_TRADE_REFERENCE'
                ) {
                    $nodeParents = [
                        "#document",
                        "RESPONSE_GROUP",
                        "RESPONSE",
                        "RESPONSE_DATA",
                        "CREDIT_RESPONSE",
                        "CREDIT_LIABILITY"
                    ];
                } elseif (
                    $node_name === 'Text' && $parent->nodeName === 'CREDIT_COMMENT' &&
                    $parent->parentNode && $parent->parentNode->nodeName === 'CREDIT_LIABILITY'
                ) {
                    $nodeParents = [
                        "#document",
                        "RESPONSE_GROUP",
                        "RESPONSE",
                        "RESPONSE_DATA",
                        "CREDIT_RESPONSE",
                        "CREDIT_LIABILITY",
                    ];
                } elseif (
                    ($node_name === 'ALIAS' || $node_name === 'RESIDENCE' || $node_name === 'EMPLOYER' || $node_name === 'UnparsedAddress' || $node_name === 'UnparsedEmployment') &&
                    ($parent->nodeName === '_BORROWER' || $parent->nodeName === 'BORROWER') &&
                    $parent->parentNode && $parent->parentNode->nodeName === 'CREDIT_FILE'
                ) {
                    $nodeParents = [
                        "#document",
                        "RESPONSE_GROUP",
                        "RESPONSE",
                        "RESPONSE_DATA",
                        "CREDIT_RESPONSE",
                        "CREDIT_FILE",
                    ];
                } elseif (
                    ($node_name === 'ALIAS' || $node_name === 'RESIDENCE' || $node_name === 'EMPLOYER' || $node_name === 'UnparsedAddress' || $node_name === 'UnparsedEmployment') &&
                    ($parent->nodeName === '_BORROWER' || $parent->nodeName === 'BORROWER') &&
                    $parent->parentNode && $parent->parentNode->nodeName === 'CREDIT_FILE'
                ) {
                    $nodeParents = [
                        "#document",
                        "RESPONSE_GROUP",
                        "RESPONSE",
                        "RESPONSE_DATA",
                        "CREDIT_RESPONSE",
                        "CREDIT_FILE",
                    ];
                } else {
                    $nodeParents = $this->getParent($node, $parents);
                }

                $childResult = $this->makeChildArray($nodeParents, $childValue);

                $result = array_merge_recursive($result, $childResult);
            }
        }
        return $result;
    }

    public function getParent($node, $parents = [])
    {
        $parent = empty($node->parentNode) ? 0 : $node->parentNode;
        if ($parent) {
            array_unshift($parents, preg_replace('/^_/', '', $parent->nodeName));
            return $this->getParent($parent, $parents);
        }
        return $parents;
    }

    public function makeChildArray($keys, $value)
    {
        $var = [];
        $index = array_shift($keys);

        if (!isset($keys[0])) {
            $var[$index] = $value;
        } else {
            $var[$index] = $this->makeChildArray($keys, $value);
        }

        return $var;
    }
}
