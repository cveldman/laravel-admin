<?php

namespace Veldman\Admin;

class Sidebar
{
    public $items = [];

    public function route($route, $name, $icon = null) {
        $this->items[$route] = [
            'name' => $name,
            'icon' => $icon
        ];

        return $this;
    }

}