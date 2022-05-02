<?php

namespace Veldman\Admin\View\Components;

use Illuminate\View\Component;

class Label extends Component
{
    public $for;

    public function __construct($for)
    {
        $this->for = $for;
    }

    public function render()
    {
        return view('admin::components.label');
    }
}
