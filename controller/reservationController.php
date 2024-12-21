<?php

    require_once './model/reservationModel.php';
    require_once './model/clientModel.php';
    require_once './model/chambreModel.php';
    session_start();

    class ReservationController{
        private $reservationModel;
        private $clientModel;
        private $chambreModel;

        function __construct(){
            $this->db = Database::getConnexion();
            $this->reservationModel = new ReservationModel();
            $this->clientModel = new clientModel();
            $this->chambreModel = new chambreModel();
        }

        //fonction qui ajoute une reservation
        public function addreservation($donnee){
            $this->reservationModel->addReservation($donnee['dateReservation'],$donnee['dateFin'], $donnee['statutReservation'], $donnee['nombreChambre'], $donnee['idClient'], $donnee['idChambre']);
            header('Location: index.php?action=accueil');
        }

        public function listeChambre(){
            $dateactuel = date("Y-m-d");
            $sql = $this->db->prepare("SELECT chambre.*, categorie.nomCategorie, categorie.montant ,categorie.nombreLit,
            categorie.nombreToillete FROM chambre
            JOIN categorie ON chambre.idCategorie = categorie.idCategorie 
            LEFT JOIN reservation ON chambre.idChambre = reservation.idChambre WHERE reservation.idChambre IS NULL OR reservation.dateFin < :dateactuel ");
            $sql->bindParam(':dateactuel', $dateactuel);
            $sql->execute();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

        //afficher le formulaire d'ajout
        public function afficherFormulaireAjout(){
            $chambres = $this->listeChambre();
            
            require_once "views/ajoutreservation.php";
        }


        //fonction qui retourne la liste des reservations
        public function listeReservation(){
        $sql = $this->db->prepare("SELECT reservation.* ,SUM(DATEDIFF(reservation.dateFin, reservation.dateReservation) * categorie.montant) AS montantApayer, chambre.numeroChambre , client.nomClient FROM reservation
        JOIN client ON client.idClient = reservation.idClient 
        JOIN chambre ON chambre.idChambre = reservation.idChambre
        JOIN categorie ON categorie.idCategorie = chambre.idCategorie 
        WHERE supReservation = 0
        GROUP BY  
            reservation.idReservation, 
            chambre.numeroChambre, 
            client.nomClient, 
            categorie.idCategorie");
        $sql->execute();
        $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
        }

        public function listeReservationClient($id){
            $sql = $this->db->prepare("SELECT 
            SUM(categorie.montant) AS montantTotal,
            SUM(DATEDIFF(reservation.dateFin, reservation.dateReservation) * categorie.montant) AS montantApayer, 
            reservation.*, 
            chambre.numeroChambre, 
            client.nomClient,
            categorie.* 
            FROM 
            reservation
            JOIN 
            client ON client.idClient = reservation.idClient 
            JOIN 
            chambre ON chambre.idChambre = reservation.idChambre 
            JOIN 
            categorie ON categorie.idCategorie = chambre.idCategorie 
            WHERE 
            client.idClient = :id AND  supReservation = 0
            GROUP BY  
            reservation.idReservation, 
            chambre.numeroChambre, 
            client.nomClient, 
            categorie.idCategorie");
            $sql->bindParam(':id', $id);
            $sql->execute();
            $resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }

           

        //controlleur qui affiche la liste des reservations
        public function afficherReservation(){
            //$res = $this->getClient();
            $reservationsCount = $this->reservationModel->countReservations();
            $clientsCount = $this->clientModel->countClients();
            $chambresCount = $this->chambreModel->countChambres();
            $reservations = $this->listeReservation();
        require_once "./views/dashboard.php";
        }

        public function afficherReservationClient($id){
            $reservations = $this->listeReservationClient($id);
            require_once './views/reservationClient.php';
        }

        //fonction qui verifie si un utilisateur est connecter aveant de reserver la chambre
        public function reserver(){
            if(!($_SESSION['id'])){
                header('location: index.php?action=connexionClient');
                exit();
            }else{
                //header('location: index.php?action=reserver');
                exit();
            }
        }

        public function afficherFormulaireReservation(){
            require_once 'views/reservation.php';
        }

        public function addreservationClient($donnee){
            $this->reservationModel->addReservation($donnee['dateReservation'],$donnee['dateFin'], $donnee['statutReservation'], $donnee['nombreChambre'], $donnee['idClient'], $donnee['idChambre']);
            echo "<script>alert('reservation effectuer avec succes');</script>";
            header('Location: index.php?action=accueilClient');
        }

        public function valider($id){
            $this->reservationModel->validerReservation($id);
            header('location:index.php?action=accueil');
        }

        

        public function createUserAndReservation($email, $dateReservation, $dateFin, $idChambre,$statutReservation) {
            
            try {
                // Extraire le nom et le prénom de l'adresse e-mail
                list($prenom, $nom) = explode('.', explode('@', $email)[0]);

                
    
                // Définir le sexe et le numéro par défaut
                $matricule = 123456789; // Valeur par défaut
                $numero = 0000000000; // Numéro par défaut
    
                // Début de la transaction
                $this->reservationModel->db->beginTransaction();
    
                // Créer un utilisateur
                $idClient = $this->reservationModel->createUser($email, $nom, $prenom, $matricule, $numero);
    
                // Créer une réservation
                $this->reservationModel->createReservation($dateReservation, $dateFin, $statutReservation, $idClient, $idChambre);
    
                // Commit de la transaction
                $this->reservationModel->db->commit();
    
                header('location: index.php?action=accueil');
                
            } catch (Exception $e) {
                $this->reservationModel->db->rollBack();
                return "Erreur lors de la création : " . $e->getMessage();
            }
            
        }

        public function deletereservation($idEtudiant){
            $this->reservationModel->supprimereservation($idEtudiant);
            header('location: index.php?action=accueil');
        }
    }