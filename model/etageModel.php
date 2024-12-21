<?php

require_once 'connexion.php';
class etageModel{
    private $db;
    public function __construct(){
        $this->db = Database::getConnexion();
    }

    public function getEtages() {
        $query = "SELECT * FROM etage";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourner tous les étages
    }
}