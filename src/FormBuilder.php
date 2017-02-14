<?php

namespace Stuartmccord\FormBuilder;

class FormBuilder
{
    public $value = null;
    public $label = null;
    public $help = null;
    public $placeholder = null;
    protected $builder;
    protected $renderer;

    public function __construct($builder, $renderer)
    {
        $this->builder = $builder;
        $this->renderer = $renderer;
    }

    public function label($label)
    {
        $this->label = $label;

        return $this;
    }

    public function help($help)
    {
        $this->help = $help;

        return $this;
    }

    public function value($value)
    {
        $this->value = $value;

        return $this;
    }

    public function placeholder($placeholder)
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    public function text($name = null)
    {
        $this->type = 'text';
        $this->name = $name ?: $this->name;

        return $this;
    }

    public function textarea($name = null)
    {
        $this->type = 'textarea';
        $this->name = $name ?: $this->name;

        return $this;
    }

    public function test()
    {
        $renderer = $this->renderer;

        return $renderer->get($this->builder, $this)->render();
    }

    public function __toString()
    {
        return $this->test();
    }
}