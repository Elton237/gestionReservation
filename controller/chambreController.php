<?php

    require_once './model/chambreModel.php';
    require_once './model/etageModel.php';
    require_once './model/categorieModel.php';
    

    class chambreController{
        private $chambreModel;
        private $etageModel;
        private $categorieModel;

        public function __construct(){
            $this->db = Database::getConnexion();
            $this->chambreModel = new ChambreModel();
            $this->etageModel = new etageModel();
            $this->categorieModel = new categorieModel();
        }
        

        //fonction pour ajouter une nouvelle chambre
        function addchambre(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $numeroChambre = $_POST['numeroChambre'];

                $image = $_FILES['imageChambre'];
                $dossierDestination = 'assets/img/';
                $nomFichier = basename($image['name']);
                $destination = $dossierDestination.$nomFichier;
                
                $idCategorie = $_POST['idCategorie'];
                $idEtage = $_POST['idEtage'];

                if(move_uploaded_file($image['tmp_name'], $destination)){
                    $this->chambreModel->addChambre($numeroChambre, $destination, $idCategorie, $idEtage);
                }
            }
            header('location: index.php?action=listechambrepersonnel');
        }

        //afficher le formulaire d'ajout
        public function afficherFormulaireChambre(){
            $rtages = $this->etageModel->getEtages();
            $categories = $this->categorieModel->getCategories();
            //$etages = $this->etageModel->getEtages();
            require_once "views/nouvellechambre.php";
        }

        public function listeChambre(){
            $dateactuel = date("Y-m-d H:i:s");
            $sql = $this->db->prepare("SELECT chambre.*, categorie.nomCategorie, categorie.montant ,categorie.nombreLit,
            categorie.nombreToillete FROM chambre
            JOIN categorie ON chambre.idCategorie = categorie.idCategorie 
            LEFT JOIN reservation ON chambre.idChambre = reservation.idChambre WHERE reservation.idChambre IS NULL OR reservation.dateFin < :dateactuel");
            $sql->bindParam(':dateactuel', $dateactuel);
            $sql->execute();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

        public function listeChambrepersonnel(){
            $sql = $this->db->prepare("SELECT chambre.*, categorie.nomCategorie, categorie.montant ,categorie.nombreLit,
            categorie.nombreToillete FROM chambre
            JOIN categorie ON chambre.idCategorie = categorie.idCategorie");
            $sql->execute();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

    
        //controlleur qui affiche la liste des chambres
        public function afficherChambre(){
            $chambres = $this->listeChambre();
            
            require_once "./views/site.php";
        }

        public function afficherChambrePersonnel(){
            $chambres = $this->listeChambrepersonnel();
            
            require_once 'views/listechambre.php';
        }

        public function afficherChambreSite(){
            $chambresliste = $this->listeChambre();
            require_once "views/index.php";
        }

        public function deletechambre($idEtudiant){
            $this->chambreModel->supprimerchambre($idEtudiant);
            header('location: index.php?action=listechambrepersonnel');
        }

    }