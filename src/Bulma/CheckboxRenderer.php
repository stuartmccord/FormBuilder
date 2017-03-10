<?php

namespace Stuartmccord\FormBuilder\Bulma;

class CheckboxRenderer extends BaseRenderer
{
    public function render()
    {
        $checkbox = $this->builder->checkbox(
            $this->parameters->name,
            $this->parameters->value,
            $this->parameters->checked
        );
        $checkbox .= $this->parameters->label;

        $label = $this->builder->label(
            $this->parameters->name,
            $checkbox,
            ['class' => "checkbox"],
            false
        );

        $html = '
            <p class="control">
                '.$label.'
            </p>
        ';

        return $html;
    }
}