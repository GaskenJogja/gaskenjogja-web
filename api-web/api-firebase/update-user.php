<?php

require_once 'User.php';

$user = new User();

// $data = array(
//     "10" => "tes"
// );

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id_user = $_POST["id_user"];
    $lat = $_POST["lat"];
    $lon = $_POST["lon"];

    if($id_user == '' || $lat == '' || $lon == ''){

    }
    else{
        $data = $user->insert([$id_user => array(
            "lat" => $lat,
            "lon" => $lon
        )], 'users-location');

        echo json_encode(array("message" => $data));
    }
}
else{
    echo json_encode(array("message" => false));
}




