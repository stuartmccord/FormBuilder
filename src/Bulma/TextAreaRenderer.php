<?php

namespace Stuartmccord\FormBuilder\Bulma;

class TextAreaRenderer
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
        $textAreaInput = $this->builder->textarea($this->parameters->name, $this->parameters->value,
            [
                'class' => 'textarea',
                'placeholder' => $this->parameters->placeholder
            ]
        );

        $html = "
            $label
            <p class=\"control\">
                $textAreaInput
            </p>
        ";

        return $html;
    }
}