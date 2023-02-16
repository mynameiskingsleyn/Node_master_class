<?php

namespace App\Console\Commands\Templates;

abstract class TestTemplate
{
    protected $class_name;
    protected $class_path;
    protected $class_namespace;

    public function __construct(string $class)
    {
        $this->class_name = class_basename($class);
        $this->class_path = $class;
        $this->class_namespace = substr($class, 0, strrpos($class, '\\'));
    }

    public function createClassObject(string $class)
    {
        $objs = $this->getConstrutParams($class);
        return $this->createObject($class, $objs);
    }

    public function createObject($class, $params)
    {
        if ($params) {
            //  create with PARAMS
            return new $class(...$params);
        } else {
            return new $class();
        }
    }
    public function getConstrutParams(string $class)
    {
        $objs = [];
        if ($this->constructHasParams($class)) {
            $ref = new \ReflectionClass($class);
            $c = $ref->getConstructor();
            foreach ($c->getParameters() as $p) {
                $refClass = $p->getClass();
                if ($refClass) {
                    $objs[] = $this->createClassObject($refClass->name);
                } else {
                    $objs[] = '$' . $p->name;
                }
            }
        }
        return $objs;
    }

    public function constructHasParams(string $class)
    {
        $hasParams = false;
        $params = [];
        $ref = new \ReflectionClass($class);
        $c = $ref->getConstructor();
        if ($c) {
            if ($c->getParameters()) {
                return true;
            }
        }
        return false;
    }
}
