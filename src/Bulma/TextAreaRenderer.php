<?php

namespace Stuartmccord\FormBuilder\Bulma;

class TextAreaRenderer extends BaseRenderer
{
    public function render()
    {
        $label = $this->builder->label(
            $this->parameters->name,
            $this->parameters->label,
            ['class' => "label"]
        );

        $textAreaInput = $this->builder->textarea($this->parameters->name, $this->parameters->value,
            [
                'class' => $this->getInputClass('textarea'),
                'placeholder' => $this->parameters->placeholder
            ]
        );

        $error = $this->hasError() ? "<p class=\"help is-danger\">".$this->parameters->error."</p>" : '';

        $html = "
            $label
            <p class=\"control\">
                $textAreaInput
            </p>
            $error
        ";

        return $html;
    }
}