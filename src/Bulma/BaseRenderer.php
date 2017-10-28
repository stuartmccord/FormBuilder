<?php

namespace Stuartmccord\FormBuilder\Bulma;

class BaseRenderer
{
    protected $builder;
    protected $parameters;

    public function __construct($builder, $parameters)
    {
        $this->builder = $builder;
        $this->parameters = $parameters;
    }

    public function getInputClass($baseClass)
    {
        if ($this->hasError()) {
            $baseClass .= ' is-danger';
        }

        return $baseClass;
    }

    public function hasError()
    {
        return !empty($this->parameters->error);
    }
}