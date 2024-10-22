<?php
require_once "helpers\Psr4.AutoloaderClass.php";
use Helpers\Psr4AutoloaderClass;

$autoLoader = new Psr4AutoloaderClass();
$autoLoader->register();
$autoLoader->addNamespace('\Helpers', '/Helpers');