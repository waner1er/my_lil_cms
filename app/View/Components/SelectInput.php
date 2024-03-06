<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectInput extends Component
{
    public $elements;
    public $name;

    public function __construct($elements, $name)
    {
        $this->elements = $elements;
        $this->name = $name;
    }

    public function render()
    {
        return view('components.select-input');
    }
}