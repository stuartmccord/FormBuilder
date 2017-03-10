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