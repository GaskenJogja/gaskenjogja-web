<?php

include_once '../config/database.php';
include_once '../objects/wisata.php';

// instantiate database and wisata object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$wisata = new Wisata($db);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $crud = $_POST["crud"];
    $id_wisata = $_POST["id_wisata"];
     $nama_wisata = $_POST["nama_wisata"];
     $alamat = $_POST["alamat"];
     $QRcode = $_POST["QRcode"];
     $harga = $_POST["harga"];
     $lat = $_POST["lat"];
     $lon = $_POST["lon"];
     $jam_buka = $_POST["jam_buka"];
     $jam_tutup = $_POST["jam_tutup"];

    if($crud == "insert"){
        
    }
    else if($crud == "update"){
        
        if($id_wisata == "" || $nama_wisata == "" || $alamat == "" || $QRcode == "" || $harga == "" || $lat == "" || $lon == "" || $jam_buka == "" || $jam_tutup == ""){
            
        }
        else{
            $wisata->updateWisata($id_wisata, $nama_wisata, $alamat, $QRcode, $harga, $lat, $lon, $jam_buka, $jam_tutup);
            echo "berhasil update";
        }
        // header("Location : ../../../ui-admin/data-tables/data-wisata.php");
        
    }
    else if($crud == "delete"){
        

        if($id_wisata != ""){

            $wisata->deleteWisata($id_wisata);
            // header("Location : ../../../ui-admin/data-tables/data-wisata.php");
            echo "berhasil menghapus data";

        }
        else{
            echo "parameter kosong";
        }
    }
    else{

    }

}
