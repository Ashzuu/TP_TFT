<?php
require_once(__DIR__ . '/../Config/Config.php');
use Config\Config;

abstract class BasePDODAO
{
    private $pdo;

    protected function execRequest($sql, $params = null): PDOStatement|false {
        $this->getDB();
        
        
        if($params == null)
        {
            $result = $this->pdo->query($sql);
        }
        else
        {
            $result = $this->pdo->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }

    private function getDB() : PDO 
    {
        if($this->pdo == null)
        {
            $this->pdo = new PDO('mysql:host='.Config::get("dsn").';dbname='.Config::get("name"), Config::get("user"), Config::get("pass"));
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }
}