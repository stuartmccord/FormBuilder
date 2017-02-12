<?php

namespace Stuartmccord\FormBuilder\Bulma;

class Renderer
{
    protected $builder;

    public function get($builder, $parameters)
    {
        if ($parameters->type == 'text') {
            return new TextRenderer($builder, $parameters);
        }
    }
}