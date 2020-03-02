<?php

require_once 'User.php';

$user = new User();

// $data = array(
//     "10" => "tes"
// );

echo json_encode($user->getAll("users"));

// if(true){

//     var_dump($user->insert([
//         $data
//     ], "users"));

// }else{
//     var_dump($user->insert([
//         "3" => "coy"
//     ], "users"));
// }


