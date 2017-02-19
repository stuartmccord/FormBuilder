<?php

namespace Stuartmccord\FormBuilder\Bulma;

class CheckboxRenderer
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
        $checkbox = $this->builder->checkbox(
            $this->parameters->name,
            $this->parameters->value,
            $this->parameters->checked
        );

        $html = '
            <p class="control">
                <label class="checkbox">'.$checkbox.$this->parameters->label.'</label>
            </p>
        ';

        return $html;
    }
}