<?php

namespace Veldman\Admin\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $type;
    public $name;
    public $options;
    public $value;

    public function __construct($type = 'text', $name, $options, $value = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = old($name, $value);
        $this->options = $options;
    }

    public function render()
    {
        return view('admin::components.select');
    }
}
