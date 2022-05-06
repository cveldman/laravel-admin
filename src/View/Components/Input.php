<?php

namespace Veldman\Admin\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $value;

    public function __construct($name, $type = 'text', $value = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = old($name, $value);
    }

    public function render()
    {
        return view('admin::components.input');
    }
}
