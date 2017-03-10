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

        $html = "
        $label
        <p class=\"control\">
            <span class=\"select\">
                $select
            </span>
        </p>
        ";

        return $html;
    }
}