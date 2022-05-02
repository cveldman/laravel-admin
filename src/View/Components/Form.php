<?php

namespace Veldman\Admin\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    public $method;

    public function __construct($action = null, $method = 'get')
    {
        $this->action = $action;
        $this->method = $method;
    }

    public function render()
    {
        return view('admin::components.form');
    }
}
