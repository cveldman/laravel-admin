<?php

namespace Veldman\Admin\View\Components\Sidebar;

use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Item extends Component
{
    public $href;
    public $icon;
    public $policy;

    public function __construct($href = '#', $icon = null, $policy = null)
    {
        $this->href = $href;
        $this->icon = $icon;
        $this->policy = $policy;
    }

    public function isCurrent()
    {
        return Request::is(parse_url($this->href, PHP_URL_PATH) != '/admin'
            ? [substr(parse_url($this->href, PHP_URL_PATH), 1), substr(parse_url($this->href, PHP_URL_PATH), 1) . '/*']
            : substr(parse_url($this->href, PHP_URL_PATH), 1));
    }

    public function render()
    {
        return view('admin::components.sidebar.item');
    }
}
