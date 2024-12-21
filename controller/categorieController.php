<?php

require_once './model/categorieModel.php';

class categorieController{
    private $categorieModel;

    public function __construct(){
        $this->db = Database::getConnexion();
        $this->categorieModel = new categorieModel();
    }

    function afficherCategorie(){
        $categories = $this->categorieModel->getCategories();
        require_once "views/nouvellechambre.php";
    }

    function ajouterCategorie($donnee){
        $this->categorieModel->addcategorie($donnee['nomCategorie'], $donnee['montant'], $donnee['nombreLit'], $donnee['nombreToillete']);
        echo "<script>alert('Categorie ajoutée avec succès');</script>";
        header('Location: index.php?action=listecategorie');
    }

    function afficherFormulaireAjout(){
        require_once "views/categorie.php";
    }

    public function listeCategorie(){
        $sql = $this->db->prepare("SELECT * FROM categorie");
        $sql->execute();
        $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }

    public function afficherCategoriepersonnel(){
        $categories = $this->listeCategorie();
        
        require_once 'views/listecategorie.php';
    }

    public function deletecategorie($idEtudiant){
        $this->categorieModel->supprimercategorie($idEtudiant);
        header('location: index.php?action=listecategorie');
    }

    public function afficherUneCategorie($id){
        $categories = $this->categorieModel->getUneCategorie($id);
        require_once './views/updatecategorie.php';
    }

    //controller pour modifier une categorie
    public function updateCategorie($donnee){
        $this->categorieModel->modifierCategorie($donnee['idCategorie'], $donnee['nomCategorie'], $donnee['montant'], $donnee['nombreLit'], $donnee['nombreToillete']);
        header('location: index.php?action=listecategorie');
    }
}