<?php

declare(strict_types=1);

namespace Controllers\Router\Route;

use Controllers\Router\Route;

class RouteAddOrigin extends Route
{
    private $controller;

    public function __construct($controller)
    {
        parent::__construct();
        $this->controller = $controller;
    }

    public function get($params = [])
    {
        $this->controller->displayAddOrigin();
    }

    public function post($params = [])
    {
        $this->controller->displayAddOrigin();
    }
}
