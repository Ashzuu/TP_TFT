<?php
namespace Controllers;

use League\Plates\Engine;

class MainController 
{
    private Engine $templates;

    public function __construct() {
        // Initialisation du moteur de templates Plates
        $this->templates = new Engine('Views');
    }

    public function index(): void {
        // Générer la vue 'home' avec un nom de set TFT
        echo $this->templates->render('home', ['tftSetName' => 'Remix Rumble']);
    }
}