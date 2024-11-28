<?php

namespace Controllers\Router\Route;


use Controllers\Router\Route;

class RouteEditUnit extends Route
{

    private $controller;

    public function __construct($controller)
    {
        parent::__construct();
        $this->controller = $controller;
    }

    public function get($params = [])
    {
        $this->controller->displayAddUnit($params);
    }

    public function post($params = [])
    {
        $this->controller->displayAddUnit($params);
    }
}