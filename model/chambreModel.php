<?php

    require_once 'connexion.php';
    class chambreModel{
        private $db;
        public function __construct(){
            $this->db = Database::getConnexion();
        }

        //fonction pour ajouter une nouvelle chambre
        public function addChambre($numeroChambre, $destination, $idCategorie, $idEtage){
            $sql = $this->db->prepare("INSERT INTO chambre( `numeroChambre`, `imageChambre`, `idCategorie`, `idEtage`)VALUES
            (:numeroChambre, :imageChambre, :idCategorie, :idEtage)");
             $sql->bindParam(':numeroChambre',$numeroChambre);
             $sql->bindParam(':imageChambre',$destination);
             $sql->bindParam(':idCategorie',$idCategorie);
             $sql->bindParam(':idEtage',$idEtage);
            $resultat = $sql->execute();
        }

        public function supprimerchambre($id){
            $sql = $this->db->prepare("DELETE FROM chambre WHERE idChambre = :id");
            $sql -> bindParam(':id', $id);
            $resultat = $sql->execute();
            return $resultat;
        }

        public function countChambres() {
            $stmt = $this->db->query("SELECT COUNT(*) FROM chambre");
            return $stmt->fetchColumn();
        }

        //fonction qui permet de modifier un etudiant
    public function modifierChambre($idChambre , $numeroChambre, $ca , $nombreLit , $nombreToillete){
        $sql = $this->db->prepare("UPDATE categorie SET `nomCategorie`=:nom,`montant`=:montant,`nombreLit`=:nombreLit,`nombreToillete`=:nombreToillete WHERE idCategorie = :id");
        $sql -> bindParam(':id',$idCategorie);
        $sql -> bindParam(':nom',$nomCategorie);
        $sql -> bindParam(':montant',$montant);
        $sql->bindParam(':nombreLit',$nombreLit);
        $sql -> bindParam(':nombreToillete',$nombreToillete);
        $sql->execute();
        $resultat = $sql;

        return $resultat;
    }

    //fonction qui retourne un etudiant par son id
    public function getUneCategorie($id){
        $sql = $this->db->prepare("SELECT * FROM categorie WHERE idCategorie = :id");
        $sql-> bindParam(':id', $id);
        $sql->execute();
        $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
    }