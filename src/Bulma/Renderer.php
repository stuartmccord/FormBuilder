<?php

namespace Stuartmccord\FormBuilder\Bulma;

class Renderer
{
    protected $builder;

    public function get($builder, $parameters)
    {
        if ($parameters->type == 'text') {
            return new TextRenderer($builder, $parameters);
        } elseif ($parameters->type == 'textarea') {
            return new TextAreaRenderer($builder, $parameters);
        } elseif ($parameters->type == 'radio') {
            return new RadioRenderer($builder, $parameters);
        } elseif ($parameters->type == 'checkbox') {
            return new CheckboxRenderer($builder, $parameters);
        } elseif ($parameters->type == 'select') {
            return new SelectRenderer($builder, $parameters);
        }
    }
}