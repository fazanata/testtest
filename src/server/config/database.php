<?php

class Database {

    // укажите свои учетные данные базы данных 
    private $host = "localhost";
    private $db_name = "ce74911_wiki";
    private $username = "ce74911_wiki";
    private $password = "yN1S1ZEJ";
    public $conn;

    // получаем соединение с БД 
    public function getConnection(){

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8", $this->username, $this->password);
            $this->conn->exec("set names utf8_general_ci");
        } catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

?>