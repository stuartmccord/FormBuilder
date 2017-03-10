<?php

namespace Stuartmccord\FormBuilder\Bulma;

class RadioRenderer extends BaseRenderer
{
    public function render()
    {
        $radio = $this->builder->radio(
            $this->parameters->name,
            $this->parameters->value,
            $this->parameters->checked
        );
        $html = '<label class="radio">'
            .$radio
            .$this->parameters->label
            .'</label>';

        return $html;
    }
}