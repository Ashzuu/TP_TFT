<?php

declare(strict_types=1);

namespace Controllers\Router;

use Controllers\MainController;
use Controllers\UnitController;
use Controllers\Router\Routes\RouteAddOrigin;
use Controllers\Router\Routes\RouteAddUnit;
use Controllers\Router\Routes\RouteDeleteUnit;
use Controllers\Router\Routes\RouteEditUnit;
use Controllers\Router\Routes\RouteIndex;
use Controllers\Router\Routes\RouteSearch;
use Exception;

class Router
{
    // Attributs
    private $routes = [];  
    private $ctrlList = [];   
    private $actionKey;      

    private $templates;        

    public function __construct($template, $name_of_action_key = 'action')
    {
        $this->actionKey = $name_of_action_key;
        $this->templates = $template;
        $this->createControllerList();
        $this->createRouteList();
    }

    private function createControllerList()
    {
        $this->ctrlList = [
            'main' => new MainController($this->templates),
            'unit' => new UnitController($this->templates),
        ];
    }

    private function createRouteList()
    {
        $this->routes = [
            'index' => new RouteIndex($this->ctrlList['main']),
            'add-unit' => new RouteAddUnit($this->ctrlList['unit']),
            'search' => new RouteSearch($this->ctrlList['main']),
            'add-origin' => new RouteAddOrigin($this->ctrlList['unit']),
            'del-unit' => new RouteDeleteUnit($this->ctrlList['unit']),
            'edit-unit' => new RouteEditUnit($this->ctrlList['unit']),
        ];
    }

    public function routing($get, $post)
    {
        if (isset($get[$this->actionKey])) {
            $routeKey = $get[$this->actionKey];

            if (isset($this->routes[$routeKey])) {
                $method = !empty($post) ? 'POST' : 'GET';
                $this->routes[$routeKey]->action($get, $method);
            } else {
                throw new Exception("Route '$routeKey' non trouvée.");
            }
        } else {
            $this->routes['index']->action($get, 'GET');
        }
    }
}