<?php
namespace Controllers;

use League\Plates\Engine;

class MainController 
{
    private Engine $templates;

    public function __construct() {
        $this->templates = new Engine('Views');
    }

    public function index(): void {
        $dao = new UnitDAO();
        $allUnits = $dao->getAll();
        echo $this->templates->render('home', ['tftSetName' => 'Remix Rumble','listUnit' => $allUnits]);
    }
}