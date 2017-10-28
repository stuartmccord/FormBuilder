<?php

namespace Stuartmccord\FormBuilder\Bulma;

class SelectRenderer extends BaseRenderer
{
    public function render()
    {
        $label = $this->builder->label(
            $this->parameters->name,
            $this->parameters->label,
            ['class' => "label"]
        );

        $select = $this->builder->select(
            $this->parameters->name,
            $this->parameters->options,
            $this->parameters->value,
            ['placeholder' => $this->parameters->placeholder]
        );

        $error = $this->hasError() ? "<p class=\"help is-danger\">".$this->parameters->error."</p>" : '';
        $class = $this->getInputClass('control');

        $html = "
        $label
        <p class=\"$class\">
            <span class=\"select\">
                $select
            </span>
        </p>
        $error
        ";

        return $html;
    }
}