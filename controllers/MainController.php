<?php
namespace Controllers;

require_once 'Models/UnitDAO.php';

use League\Plates\Engine;
use UnitDAO;

class MainController 
{
    private Engine $templates;
    private UnitDAO $dao;

    public function __construct($templates) {
        $this->templates = $templates;
        $this->dao = new UnitDAO();
    }

    public function index(): void {
        $allUnits = $this->dao->getAll();
        echo $this->templates->render('home', ['tftSetName' => 'Remix Rumble','listUnit' => $allUnits]);
    }
}