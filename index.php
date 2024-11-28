<?php
require_once(__DIR__ . '/Vendor/Plates/src/Engine.php');
require_once(__DIR__ . '/Helpers/Psr4AutoloaderClass.php');

$autoLoader = new \Helpers\Psr4AutoloaderClass();
$autoLoader->register();
$autoLoader->addNamespace('\Helpers', __DIR__.'/Helpers');
$autoLoader->addNamespace("\League\Plates", __DIR__."/Vendor/Plates/src");
$autoLoader->addNamespace('Controllers', __DIR__.'/Controllers');
$autoLoader->addNamespace("\Models",__DIR__."/Models");
$autoLoader->addNamespace('\Config', __DIR__ . '/Config');
$autoLoader->addNamespace('\Controllers\Router', __DIR__ . '/Controllers/Router');

$templates = new \League\Plates\Engine(__DIR__.'/Views');

$router = new \Controllers\Router\Router($templates);
$router->routing($_GET,$_POST);