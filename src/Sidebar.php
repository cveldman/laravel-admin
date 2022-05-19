<?php

namespace Veldman\Admin;

class Sidebar
{
    public $items = [];

    public function route($route, $name, $icon = null, $policy = null) {
        $this->items[$route] = [
            'name' => $name,
            'icon' => $icon,
            'policy' => $policy
        ];



        return $this;
    }

}