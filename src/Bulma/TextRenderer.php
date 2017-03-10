<?php

namespace Stuartmccord\FormBuilder\Bulma;

class TextRenderer extends BaseRenderer
{
    public function render()
    {
        $label = $this->builder->label(
            $this->parameters->name,
            $this->parameters->label,
            ['class' => "label"]
        );

        $textInput = $this->builder->text(
            $this->parameters->name,
            $this->parameters->value,
            ['class' => 'input', 'placeholder' => $this->parameters->placeholder]
        );

        $html = "
        $label
        <p class=\"control\">
            $textInput
        </p>
        ";

        return $html;
    }
}