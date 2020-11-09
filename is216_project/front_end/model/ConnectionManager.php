<?php
class ConnectionManager {
    public function getConnection() {        
        $dsn  = "mysql:host=localhost;dbname=users";
        return new PDO($dsn, "root", "root");  
    }
}
?>