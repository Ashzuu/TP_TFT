<?php

declare(strict_types=1);

namespace Controllers\Router\Route;

use Controllers\Router\Route;

class RouteIndex extends Route
{
    private $controller;

    public function __construct($controller)
    {
        parent::__construct();
        $this->controller = $controller;
    }

    public function get($params = [])
    {
        $this->controller->index();
    }

    public function post($params = [])
    {
        $this->controller->index();
    }
}
