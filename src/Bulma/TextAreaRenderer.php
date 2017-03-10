<?php

namespace Stuartmccord\FormBuilder\Bulma;

class TextAreaRenderer extends BaseRenderer
{
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