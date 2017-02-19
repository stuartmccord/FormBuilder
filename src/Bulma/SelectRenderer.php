<?php

namespace Stuartmccord\FormBuilder\Bulma;

class SelectRenderer
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
        $label = '<label class="label">'.$this->parameters->label.'</label>';
        $select = $this->builder->select(
            $this->parameters->name,
            $this->parameters->options,
            $this->parameters->value,
            ['placeholder' => $this->parameters->placeholder]
        );

        $html = "
        $label
        <p class=\"control\">
            <span class=\"select\">
                $select
            </span>
        </p>
        ";

        return $html;
    }
}