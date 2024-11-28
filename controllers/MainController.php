<?php
namespace Controllers;

require_once 'Models/UnitDAO.php';

use League\Plates\Engine;
use UnitDAO;

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