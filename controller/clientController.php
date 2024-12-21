<?php

    require_once './model/clientModel.php';

    class ClientController{
        private $clientModel;

        public function __construct(){
            $this->db = Database::getConnexion();
            $this->clientModel = new ClientModel();
        }

        //controlleur pour l'ajout d'un client
        public function addClient($donnee){
            $this->clientModel->addClient($donnee['nom'], $donnee['prenom'], $donnee['email'], $donnee['telephone'],$donnee['matriculeClient']);
            header('Location: index.php?action=connexionClient');
        }

        //controlleur pour verifier un utilisateur dans la bd
        public function verifieClient($email, $matricule){
            $user = $this->clientModel->verifie($email, $matricule);
            //$user = $this->personnelModel->verifie($email, $matricule);
            if ($user) {
                    session_start();
                    $_SESSION['email'] = $user['emailClient'];
                    $_SESSION['id'] = $user['idClient'];
                    header('location: index.php?action=accueilClient');
            }else{
                echo '<script>alert("erreur de connexion");</script>';
                header('location: index.php?action=connexionClient');
            } 
            //header('location: index.php?action=accueilClient');
        }

        public function afficherFormulaireConnexion(){
            require_once "views/connexionClient.php";
        }

        public function afficherSite(){
            require_once "./views/site.php";
        }

        public function afficherFormulaireInscription(){
            require_once "./views/inscription.php";
        }

        public function logout() {
            $this->clientModel->logout();
            //header('Location:../views/connexion.php');
            header('location: index.php');
        }

        public function afficherInfoCient($id){
            $clients = $this->clientModel->getUnClient($id);
            require_once './views/modifierClient.php';
        }

        public function updateClient($donnee){
            $this->clientModel->modifierClient($donnee['idClient'], $donnee['nomClient'], $donnee['prenomClient'], $donnee['emailClient'], $donnee['numeroClient'], $donnee['matriculeClient']);
            header('location: index.php?action=accueilClient');
        }

        
    }