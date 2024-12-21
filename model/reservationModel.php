<?php
    require_once('connexion.php');
    require_once './PHPMailer-master/PHPMailer-master/src/PHPMailer.php'; 
    require_once './PHPMailer-master/PHPMailer-master/src/SMTP.php'; 
    require_once './PHPMailer-master/PHPMailer-master/src/Exception.php'; 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    //require 'vendor/autoload.php';
    class reservationModel{
        public $db;
        public function __construct(){
            $this->db = Database::getConnexion();
        }

        //fonction pour ajouter une reservation
        function addReservation($date,$dateFin, $status, $nombre, $idClient, $idChambre){
            $sql = $this->db->prepare("INSERT INTO reservation(dateReservation,dateFin, statutReservation,nombreChambre, idClient, idChambre)
            VALUES(:dateReservation,:dateFin,:statutReservation,:nombreChambre,:idClient,:idChambre)");
            $sql->bindParam(':dateReservation',$date);
            $sql->bindParam(':dateFin',$dateFin);
            $sql->bindParam(':statutReservation',$status);
            $sql->bindParam(':nombreChambre',$nombre);
            $sql->bindParam(':idClient',$idClient);
            $sql->bindParam(':idChambre',$idChambre);
            
            $resultat = $sql->execute();
            return $resultat;
        }

        //fonction pour valider une reservation
        function validerReservation($idReservation){
            $sql= $this->db->prepare("UPDATE reservation SET statutReservation = 'Valider' WHERE idReservation = :idReservation");
            $sql->bindParam(':idReservation',$idReservation);
            //$sql->bindParam(':statutReservation',$statut);

            $resultat = $sql->execute();
            return $resultat;
        }


        //fonction qui creer un utilisateur et stocke sa reservation
        public function createUser($email, $nom, $prenom, $matricule, $numero) {

            $lastDotPosition = substr(strrchr($email, "@"), 1);
            $atPosition = strpos($email, '@');
            $localPart = substr($email, 0, $atPosition);
            $cleanedEmail = str_replace('.', '', $localPart);
            $newmail = $cleanedEmail .'@'. $lastDotPosition;
            $sql1 = "SELECT idClient FROM client WHERE emailClient = '$newmail'";
            $user = $this->db->query($sql1);
            if($user->rowCount()  > 0) {
                $row = $user->fetch(PDO::FETCH_ASSOC);
                return $row['idClient'];
            }else{
                $lastDotPosition = substr(strrchr($email, "@"), 1);
                $atPosition = strpos($email, '@');
                $localPart = substr($email, 0, $atPosition);
                $cleanedEmail = str_replace('.', '', $localPart);
                $cleanedEmail = $cleanedEmail .'@'. $lastDotPosition;
                //list($prenom , $nom) = explode('.', explode('@', $email)['0']);
                $sql = "INSERT INTO client (nomClient, prenomClient, emailClient, numeroClient, matriculeClient) VALUES (:nomClient, :prenomClient, :emailClient, :numeroClient, :matriculeClient)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([
                    ':nomClient' => $nom,
                    ':prenomClient' => $prenom,
                    ':emailClient' => $cleanedEmail,
                    ':numeroClient' => $numero,
                    ':matriculeClient' => $matricule,
                ]);
                
                $this->sendWelcomeEmail($cleanedEmail, $nom, $prenom , $matricule);
                return $this->db->lastInsertId();
            }    
        }

        //fonction qui envoie le mail a l'utilisateur
        public function sendWelcomeEmail($email, $nom, $prenom, $matricule) {
            $mail = new PHPMailer(true);
        
            try {
                // Utiliser Sendmail
                $mail->isSMTP();                                      // Configurer pour utiliser SMTP
                $mail->Host = 'smtp.gmail.com';                       // Spécifier le serveur SMTP
                $mail->SMTPAuth = true;                               // Activer l'authentification SMTP
                $mail->Username = 'seriesetcinephile@gmail.com';     // Votre adresse e-mail
                $mail->Password = 'bonsoirdinol123@';               // Votre mot de passe
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Activer le chiffrement TLS
                $mail->Port = 587;                                    // Port TCP

        
                // Destinataires
                $mail->setFrom('eltonpagning@gmail.com', 'Hotelier');
                $mail->addAddress($email, "$prenom $nom ");
        
                // Contenu de l'e-mail
                $mail->isHTML(true);
                $mail->Subject = 'Bienvenue!';
                $mail->Body    = "Bonjour $prenom $nom,<br><br>Bienvenue dans notre système de réservation!<br>Voici vos identifiants :<br>E-mail : $email<br> :mot de passe : $matricule<br>";
        
                // Envoi de l'e-mail
                $mail->send();
                echo 'Message envoyé';
            } catch (Exception $e) {
                echo "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    
        // Insérer une réservation
        public function createReservation($dateReservation, $dateFin, $statutReservation, $idClient, $idChambre) {
            $sql = "INSERT INTO reservation (dateReservation, dateFin, statutReservation, idClient, idChambre) VALUES (:dateReservation, :dateFin, :statutReservation, :idClient, :idChambre)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':dateReservation' => $dateReservation,
                ':dateFin' => $dateFin,
                ':statutReservation' => $statutReservation,
                ':idClient' => $idClient,
                ':idChambre' => $idChambre,
            ]);
        }

        public function countReservations() {
            $stmt = $this->db->query("SELECT COUNT(*) FROM reservation WHERE supReservation = 0");
            return $stmt->fetchColumn();
        }

        public function supprimereservation($id){
            $sql = $this->db->prepare("UPDATE reservation SET supReservation = 1 WHERE idReservation = :id");
            $sql -> bindParam(':id', $id);
            $resultat = $sql->execute();
            return $resultat;
        }

        
    }