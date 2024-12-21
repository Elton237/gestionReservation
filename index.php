<?php

    require_once 'controller/clientController.php';
    require_once 'controller/personnelController.php';
    require_once 'controller/reservationController.php';
    require_once 'controller/chambreController.php';
    require_once 'controller/categorieController.php';
    require_once 'controller/etageController.php';

    $controller = new personnelController();
    $controller2 = new clientController();
    $controller3 = new chambreController();
    $controller4 = new reservationController();
    $controller5 = new categorieController();

    $action = isset($_GET['action']) ? $_GET['action'] : null;
    switch ($action) {
        case 'connexion':
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = isset($_POST['email']) ? $_POST['email'] : null;
                $matricule = isset($_POST['matricule']) ? $_POST['matricule'] : null;
                if($email && $matricule){
                    $controller->verifie($email, $matricule);
                }
            }else{
                $controller->afficherFormulaire();
            }
            break;
            
        case 'deconnexionpersonnel' :
            $controller->logout();  
            break;
            
        case 'connexionClient' :
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //verifier si l'utilisateur existe
                $email = isset($_POST['email']) ? $_POST['email'] : null;
                $matricule = isset($_POST['matricule']) ? $_POST['matricule'] : null;
                if($email && $matricule){
                    $controller2->verifieClient($email, $matricule);
                }
            }else{
                //afficher le formulaire de connexion
                $controller2->afficherFormulaireConnexion();
            }
            break;

        case 'ajoutreservation' :
            $controller1 = new reservationController();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //$controller1->addreservation($_POST);
                $email = $_POST['emailClient'];
                $idChambre = $_POST['idChambre'];
                $dateReservation = $_POST['dateReservation'];
                $dateFin = $_POST['dateFin'];
                $statutReservation = $_POST['statutReservation'];
                $controller1->createUserAndReservation($email, $dateReservation, $dateFin, $idChambre,$statutReservation);
            }else{
                $controller1->afficherFormulaireAjout();
            }
            break;
           
        case 'accueil':
            $controller1 = new reservationController();
            $controller1->afficherReservation();
            break;    

        case 'nouveauclient' :    
            $controller2 = new clientController();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $controller2->addClient($_POST);
            }else{
                $controller2->afficherFormulaireInscription();
            }
            break;
        case 'ajoutchambre' :
            $controller3 = new chambreController();
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $controller3->addchambre(); 
            }else{
                
                $controller3->afficherFormulaireChambre();
            }
            break;

        case 'listechambrepersonnel' :
            $controller3 = new chambreController();
            $controller3->afficherChambrePersonnel();
            break;
        
        case 'reservation' :
            $controller4->afficherFormulaireReservation();
            break;

        case 'creereservation' :
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $controller4->addreservationClient($_POST);
            }
            break;
        case 'deconnexionClient' :
            $controller2->logout();
            break;

        case 'accueilClient' :
            $controller2 = new chambreController();
            $controller2->afficherChambre();   
            break; 

        case 'reservationNonClient' :
            $idc = $_GET['id'];
            $controller4->reserver();
            break;

        case 'validerreservation' :
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            if($id){
                //appel du controlleur qui supprimer l'etudiant
                $controller4->valider($id);
            }
            
            break; 
        case 'suppressionChambre' :
            $id = isset($_GET['id']) ? $_GET['id'] : null ;
            if($id){
                //appel du controlleur qui supprimer la chambre
                $controller3->deletechambre($id);
            } 
            
        case 'ajoutercategorie' :
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $controller5->ajouterCategorie($_POST);
            }else{
                $controller5->afficherFormulaireAjout();
            }
            
            break;

        case 'listecategorie' :
            $controller5->afficherCategoriepersonnel();
            break;  
            
        case 'suppressionCategorie' :
            $id = isset($_GET['id'])? $_GET['id'] : null ;
            if($id){
                //appel du controlleur qui supprimer la categorie
                $controller5->deletecategorie($id);
            } 
            break; 
            
        case 'categorieAModifier' :
            $id = isset($_GET['id'])? $_GET['id'] : null ;
            if($id){
                $controller5->afficherUneCategorie($id);
            }    
            break;
        case 'modifierCategorie':
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $controller5->updateCategorie($_POST);
            }
            break; 

        case 'reservationClient' :
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            if($id){
                $controller4->afficherReservationClient($id);
            }
            break;

        case 'modifierClient':
            $id = isset($_GET['id']) ? $_GET['id'] : null;
            if($id){
                $controller2->afficherInfoCient($id);
            } 
            break; 
        case 'modifier' :
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $controller2->updateClient($_POST);
            }  
            
        case 'deletereservation' :
            $id = isset($_GET['id']) ? $_GET['id'] : null;   
            if($id){
                $controller4->deletereservation($id);
            } 
            break;
        default :
            $controller3->afficherChambreSite();
            //header('location: views/index.php');
        break;        

    }