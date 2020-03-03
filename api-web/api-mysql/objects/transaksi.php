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
}
?>