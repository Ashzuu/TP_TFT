<?php

namespace Controllers\Router\Routes;

use Controllers\Router\Route;

class RouteDeleteUnit extends Route
{

    private $controller;

    public function __construct($controller)
    {
        parent::__construct();
        $this->controller = $controller;
    }

    public function get($params = [])
    {
        $this->controller->deletUnit();
    }

    public function post($params = [])
    {
        $this->controller->deletUnit();
    }
}