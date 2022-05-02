<?php

namespace Veldman\Admin\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;

    public function __construct($type = 'text', $name)
    {
        $this->type = $type;
        $this->name = $name;
    }

    public function render()
    {
        return view('admin::components.input');
    }
}
