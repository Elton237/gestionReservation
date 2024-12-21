<?php

require_once './model/etageModel.php';

class etageController{
    private $etageModel;

    public function __construct(){
        $this->db = Database::getConnexion();
        $this->etageModel = new etageModel();
    }

    function afficheretage(){
        $etages = $this->etageModel->getEtages();
        require_once "views/nouvellechambre.php";
    }
}