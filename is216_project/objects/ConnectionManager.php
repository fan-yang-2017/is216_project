<?php
    class ConnectionManager {
        public function getConnection() {   
            $servername = "us-cdbr-east-02.cleardb.com";
            $username = "bb1426d54f2b72";
            $password = "8d86cbac";
            $dbname = "heroku_29de17d9730b345";
            $port = "3306";
            
            // Create connection
            $pdo = new PDO("mysql:host=$servername; dbname=$dbname; port=$port", $username, $password); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;  
        }
    }
?>