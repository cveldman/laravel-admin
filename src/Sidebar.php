<?php

namespace Veldman\Admin;

class Sidebar
{
    public $items = [];

    public function route($route, $name) {
        $this->items[$route] = $name;

        return $this;
    }

}