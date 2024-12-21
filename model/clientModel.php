<?php

    require_once 'connexion.php';
    class clientModel{
        private $db;
        public function __construct(){
            $this->db = Database::getConnexion();
        }

        //fonction pour ajouter un client
        public function addClient($nom, $prenom, $email, $numero,$matricule){
            $sql = $this->db->prepare("INSERT INTO client(nomClient,prenomClient,emailClient,numeroClient,matriculeClient)
            VALUES(:nom,:prenom,:email,:numero,:matricule)");
            $sql->bindParam(':nom',$nom);
            $sql->bindParam(':prenom',$prenom);
            $sql->bindParam(':email',$email);
            $sql->bindParam(':numero',$numero);
            $sql->bindParam(':matricule',$matricule);
            $resultat = $sql->execute();

            return $resultat;
            $idClient =$pdo->lastInsertId();
            $_SESSION['id']=$idClient;
        }

        //fontin qui supprime un client
        public function deleteClient($id){
            $sql = $this->db->prepare("UPDATE client SET supClient=1 WHERE idClient = :id");
            $sql->bindParam(':id',$id);
            $resultat = $sql->execute();
        }

        //fonction qui modifie un client
        public function updateClient($id, $nom, $prenom, $email, $numero){
            $sql = $this->db->prepare("UPDATE client SET nomClient=:nom, prenomClient=:prenom, emailClient=:email, numeroClient=:numero WHERE idClient = :id");
            $sql->bindParam(':nom',$nom);
            $sql->bindParam(':prenom',$prenom);
            $sql->bindParam(':email',$email);
            $sql->bindParam(':numero',$numero);
            $sql->bindParam(':id',$id);
            $resultat = $sql->execute();

            return $resultat;
        }

        //function qui verifie le client
        function verifie($email, $matricule){
            $sql = $this->db->prepare("SELECT * FROM client WHERE emailClient = :email AND matriculeClient = :matricule");
            $sql-> bindParam(':email', $email);
            $sql->bindParam(':matricule', $matricule);
            $sql->execute();
            $user = $sql->fetch();

            if($user){
                return $user;
            }
            return false;   
        }

        function logout() {
            session_start();
            $_SESSION= array();

            if(session_id() != '' || isset($_COOKIE['session_name()'])){
                setcookie(session_name(), '', time()-2592000, '/');
            }
            session_destroy();
            header('location: index.php');
            exit();
        }

        //fonction qui permet de modifier un etudiant
        public function modifierClient($idClient , $nomClient, $prenomClient , $emailClient , $numeroClient, $matriculeClient){
            $sql = $this->db->prepare("UPDATE client SET `nomClient`=:nom,`prenomClient`=:prenom,`emailClient`=:email,`numeroClient`=:numero, matriculeClient= :matricule WHERE idClient = :id");
            $sql -> bindParam(':id',$idClient);
            $sql -> bindParam(':nom',$nomClient);
            $sql -> bindParam(':prenom',$prenomClient);
            $sql->bindParam(':email',$emailClient);
            $sql -> bindParam(':numero',$numeroClient);
            $sql -> bindParam(':matricule',$matriculeClient);
            $sql->execute();
            $resultat = $sql;

            return $resultat;
        }

        public function getUnClient($id){
            $sql = $this->db->prepare("SELECT * FROM client WHERE idClient = :id");
            $sql-> bindParam(':id', $id);
            $sql->execute();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

        public function countClients() {
            $stmt = $this->db->query("SELECT COUNT(*) FROM client");
            return $stmt->fetchColumn();
        }

        
    }