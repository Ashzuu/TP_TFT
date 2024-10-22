<?php
require_once('Vendor\Plates\src\Engine.php');
require_once('Helpers\Psr4AutoloaderClass.php');

use Controllers\MainController;
use Helpers\Psr4AutoloaderClass;

$autoLoader = new Psr4AutoloaderClass();
$autoLoader->register();
$autoLoader->addNamespace('\Helpers', '/Helpers');
$autoLoader->addNamespace("\League\Plates", "/Vendor/Plates/src");
$autoLoader->addNamespace('Controllers', '/Controllers');


$controller = new MainController();
$controller->index();