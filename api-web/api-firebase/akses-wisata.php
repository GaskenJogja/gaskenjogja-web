<?php

require_once 'User.php';

$user = new User();

// $data = array(
//     "10" => "tes"
// );

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_wisata = $_POST["id_wisata"];
    $key = $_POST["key"];

    if($id_wisata == '' || $key == ''){

    }
    else if($key == "gaskenjogja-wisata"){
        $data = $user->insert([$id_wisata => "buka"], 'akses-wisata');

        echo json_encode(array("message" => $data));
    }
}
else{
    echo json_encode(array("message" => false));
}




