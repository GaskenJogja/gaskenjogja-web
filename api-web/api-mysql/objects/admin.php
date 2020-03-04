<?php
class Admin{
 
    // database connection and table name
    private $conn;
    private $table_name = "admin";

    public $id_admin;
    public $username;
    public $password;
    public $nama_admin;
 

    public function __construct($db){
        $this->conn = $db;
    }

    public function adminSession($username, $password){
        $query = "SELECT id_admin FROM admin where username = '$username' and password = '$password'";

        $result = $this->conn->prepare($query);

        $result->execute();

        return $result;
    }
}
?>