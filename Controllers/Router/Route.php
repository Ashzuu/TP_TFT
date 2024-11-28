<?php

declare(strict_types=1);

namespace Controllers\Router;
use \Exception;

abstract class Route
{

    public function __construct()
    {

    }
    public function action($params = [], $method = 'GET')
    {
        $ret = null;
        if ($method === 'POST') {
            $ret = $this->post($params);
        }
        elseif ($method === 'GET'){
            $ret = $this->get($params);
        }
        return $ret;
    }

    protected function getParam(array $array, string $paramName, bool $empty = true)
    {
        if (isset($array[$paramName])) {
            if (!$empty && empty($array[$paramName])) {
                throw new Exception("Paramètre '$paramName' vide");
            }
            return $array[$paramName];
        } else {
            throw new Exception("Paramètre '$paramName' absent");
        }
    }

    abstract public function get($params = []);

    abstract public function post($params = []);
}
