<?php

namespace Stuartmccord\FormBuilder\Bulma;

class TextRenderer
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
        $textInput = $this->builder->text($this->parameters->name, $this->parameters->value, ['class' => 'input']);

        $html = "
        $label
        <p class=\"control\">
            $textInput
        </p>
        ";

        return $html;
    }
}