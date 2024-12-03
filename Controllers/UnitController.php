<?php
declare(strict_types=1);

namespace Controllers;

use League\Plates\Engine;
use UnitDAO;

class UnitController
{
    private Engine $templates;
    private UnitDAO $dao;
    public function __construct(Engine $template) 
    {
        $this->templates = $template;
        $this->dao = new UnitDAO();
    }

    public function displayAddUnit() : void
    {
        echo $this->templates->render('add-unit');
    }

    public function displayAddOrigin($params = null)
    {
        echo $this->templates->render('add-origin');
    }

    public function deletUnit()
    {
        echo $this->templates->render('home',
            [
            'tftSetName' => 'TFT',
            'resGetAll' => null,
            'resGetByID' => null,
            'reGetByIdDontExist' => null,
            'message' => 'Unité supprimée'
        ]);
    }


}