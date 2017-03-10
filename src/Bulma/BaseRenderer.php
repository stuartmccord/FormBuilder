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
}