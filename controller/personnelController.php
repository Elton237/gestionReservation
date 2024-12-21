<?php
    //session_start();
    require_once './model/personnelModel.php';

    class personnelController{
        private $personnelModel;

        public function __construct(){
            $this->db = Database::getConnexion();
            $this->personnelModel = new personnelModel();
        }

        //controlleur pour verifier un utilisateur dans la bd
        public function verifie($email, $matricule){
            $user = $this->personnelModel->verifie($email, $matricule);
            if ($user) {
                    session_start();
                    $_SESSION['email'] = $user['emailPersonnel'];
                    header('location: index.php?action=accueil');
            }else{
                    echo 'erreur de connexion';
            }   
            //require_once 'index.php?action=accueil';
            //header('location: index.php?action=accueil');
        }

        //controlleur qui deconnecte un personnel
        public function logout() {
            $this->personnelModel->logout();
            //header('Location:../views/connexion.php');
            header('location: index.php?action=connexion');
        }

        public function afficherAccueil(){
            require_once "views/dashboard.php";
        }

        public function afficherFormulaire(){
            require_once "views/connexion.php";
        }
        


        // public function addClient($nom, $prenom, $email, $telephone){
        //     $this->clientModel->addClient($donnee['nom'], $donnee['prenom'], $donnee['email'], $donnee['telephone']);
        //     header('Location:../index.php');
        // }
    }