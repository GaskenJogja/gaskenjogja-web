<?php
class Wisata{
 
    // database connection and table name
    private $conn;
    private $table_name = "wisata";
 
    // object properties
    public $id_wisata;
    public $nama_wisata;
    public $alamat;
    public $QRcode;
    public $harga;
    public $gambar;
    public $lat;
    public $lon;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function getAllData(){
        $query = "SELECT * FROM wisata";

        $result = $this->conn->prepare($query);

        $result->execute();

        return $result;
    }

    public function getJumlah(){
        $query = "SELECT id_wisata FROM wisata";

        $result = $this->conn->prepare($query);

        $result->execute();

        return $result;
    }
}
?>