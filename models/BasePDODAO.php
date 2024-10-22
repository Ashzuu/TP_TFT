<?php
require_once(__DIR__ . '/../Config/Config.php');
use Config\Config;

abstract class BasePDODAO{
    private $pdo;

    public function __construct(){
        $this->pdo = new PDO('mysql:host='.Config::get("dsn").';dbname='.Config::get("name"), Config::get("user"), Config::get("password"));
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}