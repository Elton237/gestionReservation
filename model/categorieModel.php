<?php

require_once 'connexion.php';
class categorieModel{
    private $db;
    public function __construct(){
        $this->db = Database::getConnexion();
    }

    public function getCategories() {
        $query = "SELECT * FROM categorie";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retourner toutes les catégories
    }

    public function addcategorie($nomCategorie, $montant, $nombreLit, $nombreToillete){
        $stmt = $this->db->prepare("INSERT INTO categorie (nomCategorie, montant, nombreLit, nombreToillete) 
        VALUES (:nomCategorie, :montant, :nombreLit, :nombreToillete)");
        $stmt->bindParam(':nomCategorie', $nomCategorie);
        $stmt->bindParam(':montant', $montant);
        $stmt->bindParam(':nombreLit', $nombreLit);
        $stmt->bindParam(':nombreToillete', $nombreToillete);
        $resultat = $stmt->execute();
        return $resultat;
    }

    public function supprimercategorie($id){
        $sql = $this->db->prepare("DELETE FROM categorie WHERE idCategorie = :id");
        $sql -> bindParam(':id', $id);
        $resultat = $sql->execute();
        return $resultat;
    }

    //fonction qui permet de modifier un etudiant
    public function modifierCategorie($idCategorie , $nomCategorie, $montant , $nombreLit , $nombreToillete){
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