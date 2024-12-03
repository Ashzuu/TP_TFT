<?php

declare(strict_types=1);

namespace Controllers\Router\Routes;

use Controllers\Router\Route;

class RouteSearch extends Route
{
    private $controller;

    public function __construct($controller)
    {
        parent::__construct();
        $this->controller = $controller;
    }

    public function get($params = [])
    {
        $this->controller->displaySearch();
    }

    public function post($params = [])
    {
        $this->controller->displaySearch();
    }
}
