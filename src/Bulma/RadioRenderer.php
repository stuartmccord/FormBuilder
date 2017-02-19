<?php

namespace Stuartmccord\FormBuilder\Bulma;

class RadioRenderer
{
    protected $builder;
    protected $parameters;

    public function __construct($builder, $parameters)
    {
        $this->builder = $builder;
        $this->parameters = $parameters;
    }

    public function render()
    {
        $radio = $this->builder->radio(
            $this->parameters->name,
            $this->parameters->value,
            $this->parameters->checked
        );
        $html = '<label class="radio">'
            .$radio
            .$this->parameters->label
            .'</label>';

        return $html;
    }
}