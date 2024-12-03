<?php

declare(strict_types=1);

namespace Controllers\Router;

use Exception;

class Router
{
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
            'main' => new \Controllers\MainController($this->templates),
            'unit' => new \Controllers\UnitController($this->templates),
        ];
    }

    private function createRouteList()
    {
        $this->routes = [
            'index' => new \Controllers\Router\Routes\RouteIndex($this->ctrlList['main']),
            'add-unit' => new \Controllers\Router\Routes\RouteAddUnit($this->ctrlList['unit']),
            'search' => new \Controllers\Router\Routes\RouteSearch($this->ctrlList['main']),
            'add-origin' => new \Controllers\Router\Routes\RouteAddOrigin($this->ctrlList['unit']),
            'del-unit' => new \Controllers\Router\Routes\RouteDeleteUnit($this->ctrlList['unit']),
            'edit-unit' => new \Controllers\Router\Routes\RouteEditUnit($this->ctrlList['unit'])
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