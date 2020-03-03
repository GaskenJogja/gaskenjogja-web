<?php

include_once '../config/database.php';
include_once '../objects/user.php';
 
// instantiate database and user object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$user = new User($db);

$result = $user->getAllData();
$num = $result->rowCount();

$user_arr=array();
// check if more than 0 record found
if($num>0){
 
    // user array
    $user_arr["records"]=array();
    // $user_arr["row"]= $num;
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $user_item = array(
            "id_user" => $id_user,
            "nemail" => $email,
            "password" => $password,
            "nama" => $nama,
            "saldo" => $saldo,
        );
 
        array_push($user_arr["records"], $user_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show user data in json format
    echo json_encode($user_arr["records"]);
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