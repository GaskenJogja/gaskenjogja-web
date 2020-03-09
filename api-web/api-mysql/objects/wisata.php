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
    public $jam_buka;
    public $jam_tutup;
 
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

    public function deleteWisata($id_wisata){
        $query = "DELETE FROM wisata where id_wisata = $id_wisata";

        $result = $this->conn->prepare($query);

        $result->execute();

        return $result;
    }

    public function updateWisata($id_wisata, $nama_wisata, $alamat, $QRcode, $harga, $lat, $lon, $jam_buka, $jam_tutup){
        $query = "UPDATE wisata 
            SET nama_wisata = $nama_wisata,
                alamat = $alamat,
                QRcode = $QRcode,
                harga = $harga,
                lat = $lat,
                lot = $lon,
                jam_buka = $jam_buka,
                jam_tutup = $jam_tutup
            WHERE id_wisata = $id_wisata";
        
        $result = $this->conn->prepare($query);

        $result->execute();

        return $result;
    }

    public function insertData($nama_wisata, $alamat, $gambar, $QRcode, $harga, $lat, $lon, $jam_buka, $jam_tutup){
        $query = "INSERT INTO wisata VALUES(NULL, $nama_wisata, $alamat, $gambar, $QRcode, $harga, $lat, $lon, $jam_buka, $jam_tutup)";

        $result = $this->conn->prepare($query);

        $result->execute();

        return $result;
    }
}
?>