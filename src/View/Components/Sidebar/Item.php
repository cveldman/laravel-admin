<?php

namespace Veldman\Admin\View\Components\Sidebar;

use Illuminate\View\Component;

class Item extends Component
{
    public $icon;
    public $policy;

    public function __construct($icon = null, $policy = null)
    {
        $this->icon = $icon;
        $this->policy = $policy;
    }

    public function render()
    {
        return view('admin::components.sidebar.item');
    }
}
