<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "user";
 
    // object properties
    public $id_user;
    public $email;
    public $password;
    public $nama;
    public $saldo;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function getAllData(){
        $query = "SELECT * FROM user";

        $result = $this->conn->prepare($query);

        $result->execute();

        return $result;
    }

    public function getJumlah(){
        $query = "SELECT id_user FROM user";

        $result = $this->conn->prepare($query);

        $result->execute();

        return $result;
    }

    public function userSession($username, $password){
        $query = "SELECT id_user FROM user where username = $username and password = $password";

        $result = $this->conn->prepare($query);

        $result->execute();

        return $result;
    }

    
}
?>