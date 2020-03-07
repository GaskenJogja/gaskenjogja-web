<?php

include_once '../config/database.php';
include_once '../objects/wisata.php';
 
// instantiate database and wisata object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$wisata = new Wisata($db);

$result = $wisata->getAllData();
$num = $result->rowCount();

$wisata_arr=array();
// check if more than 0 record found
if($num>0){
 
    // wisata array
    $wisata_arr["records"]=array();
    // $wisata_arr["row"]= $num;
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $wisata_item = array(
            "id_wisata" => $id_wisata,
            "nama_wisata" => $nama_wisata,
            "alamat" => $alamat,
            "Qrcode" => $QRcode,
            "harga" => $harga,
            "gambar" => base64_encode($gambar),
            "lat" => $lat,
            "lon" => $lon,
            "jam_buka" => $jam_buka,
            "jam_tutup" => $jam_tutup

        );
 
        array_push($wisata_arr["records"], $wisata_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show wisata data in json format
    echo json_encode($wisata_arr["records"]);
}
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No products found.")
    );
}

?>