<?php

namespace Veldman\Admin\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $columns;

    public function __construct($columns = null)
    {
        $this->columns = $columns;
    }

    public function render()
    {
        return view('admin::components.table');
    }
}
