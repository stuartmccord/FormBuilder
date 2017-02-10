<?php

namespace Stuartmccord\FormBuilder;

class BulmaFormBuilder
{
    protected $builder;

    public function __construct(\Collective\Html\FormBuilder $builder)
    {
        $this->builder = $builder;
    }
}