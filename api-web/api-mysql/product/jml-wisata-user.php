<?php

include_once '../config/database.php';
include_once '../objects/user.php';
include_once '../objects/wisata.php';
 
// instantiate database and user object
$database = new Database();
$db = $database->getConnection();
 
if($_SERVER["REQUEST_METHOD"] == 'GET'){

    $user = new User($db);

    $result = $user->getJumlah();
    $num = $result->rowCount();
    
    $arr=array();
    $arr["total_user"] = $num;
    
    $wisata = new Wisata($db);
    
    $result = $wisata->getJumlah();
    $num = $result->rowCount();
    
    $arr["total_wisata"] = $num;
    
    echo json_encode($arr);
}
else{
    echo json_encode(array('message' => false));
}
// initialize object


