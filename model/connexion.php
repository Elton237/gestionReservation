<?php

    class Database{
        private static $instance = null;
        private $connection;

        //parametre de connexion a la base de donnee
        private $host = 'localhost';
        private $dbname ="reservationChambre";
        private $username = "root";
        private $password = "";

        private function __construct(){
            try{
                $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e){
                echo "Connection failed: ". $e->getMessage();
            }
        }

        public static function getConnexion(){
            if(self::$instance == null){
                self::$instance = new Database();
    
            }
            return self::$instance->connection;
        }
    }