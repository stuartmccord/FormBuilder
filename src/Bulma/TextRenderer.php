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
            ['class' => $this->getInputClass('input'), 'placeholder' => $this->parameters->placeholder]
        );

        $error = $this->hasError() ? "<p class=\"help is-danger\">".$this->parameters->error."</p>" : '';

        $html = "
        $label
        <p class=\"control\">
            $textInput
        </p>
        $error
        ";

        return $html;
    }
}