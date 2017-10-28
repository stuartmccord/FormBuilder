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
            ['class' => $this->getInputClass("checkbox")],
            false
        );

        $error = $this->haserror() ? "<p class=\"help is-danger\">" . $this->parameters->error . "</p>" : '';

        $html = '
            <p class="control">
                ' . $label . '
            </p>
            '.$error;

        return $html;
    }
}