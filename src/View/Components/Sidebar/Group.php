<?php

namespace Veldman\Admin\View\Components\Sidebar;

use Illuminate\View\Component;

class Group extends Component
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('admin::components.sidebar.group');
    }
}
