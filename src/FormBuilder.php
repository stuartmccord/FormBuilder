<?php

namespace Stuartmccord\FormBuilder;

class FormBuilder
{
    public $value = null;
    public $label = null;
    public $help = null;
    public $placeholder = null;
    public $checked = null;
    public $options = null;
    public $name = null;
    public $type = null;
    public $error = null;
    protected $builder;
    protected $renderer;

    public function __construct(\Collective\Html\FormBuilder $builder, $renderer)
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

    public function radio($name = null)
    {
        $this->type = 'radio';
        $this->name = $name ?: $this->name;

        return $this;
    }

    public function textarea($name = null)
    {
        $this->type = 'textarea';
        $this->name = $name ?: $this->name;

        return $this;
    }

    public function checkbox($name = null)
    {
        $this->type = 'checkbox';
        $this->name = $name ?: $this->name;

        return $this;
    }

    public function select($name = null)
    {
        $this->type = 'select';
        $this->name = $name ?: $this->name;

        return $this;
    }

    public function options(Array $options = null)
    {
        $this->options = $options;

        return $this;
    }

    public function checked($checked = true)
    {
        $this->checked = $checked ? 'checked' : '';

        return $this;
    }

    public function error($text)
    {
        $this->error = $text;

        return $this;
    }

    public function get()
    {
        $renderer = $this->renderer;

        return $renderer->get($this->builder, $this)->render();
    }

    public function __toString()
    {
        return $this->get();
    }
}
