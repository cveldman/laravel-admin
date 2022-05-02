<?php

namespace Veldman\Admin\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    public $type;
    public $name;
    public $options;

    public function __construct($type = 'text', $name, $options)
    {
        $this->type = $type;
        $this->name = $name;
        $this->options = $options;
    }

    public function render()
    {
        return view('admin::components.select');
    }
}
