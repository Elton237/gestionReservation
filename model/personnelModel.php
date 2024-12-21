<?php

    require_once 'connexion.php';
    class personnelModel{
        private $db;
        public function __construct(){
            $this->db = Database::getConnexion();
        }

        //fonction pour ajouter un client
        // public function addPersonnel($nom, $prenom, $email){
        //     $sql = $this->db->prepare("INSERT INTO client(nomPersonnel,prenomPersonnel,emailPersonnel)
        //     VALUES(:nom,:prenom,:email)");
        //     $sql->bindParam(':nom',$nom);
        //     $sql->bindParam(':prenom',$prenom);
        //     $sql->bindParam(':email',$email);
        //     $resultat = $sql->execute();

        //     return $resultat;
        // }

        //function qui verifie le personnel
        function verifie($email, $matricule){
            $sql = $this->db->prepare("SELECT * FROM personnel WHERE emailPersonnel = :email AND matriculePersonnel = :matricule");
            $sql-> bindParam(':email', $email);
            $sql->bindParam(':matricule', $matricule);
            $sql->execute();
            $user = $sql->fetch();

            if($user){
                return $user;
            }
            return false;
            //verifier si l'utilisateur existe
                
        }

        //fonction qui deconnecte un personnel
        function logout() {
            //session_start();
            //$_SESSION= array();
            if($_SESSION['id']){
                unset($_SESSION['id']);
                session_destroy();
                header('location: index.php?action=connexion');
                exit();
            }
        }
    }