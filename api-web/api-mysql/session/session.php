<?php
    // mengaktifkan session php
    session_start();
    
    // menghubungkan dengan koneksi
    include_once '../config/database.php';
    include_once '../objects/user.php';
 
// instantiate database and user object
    $database = new Database();
    $db = $database->getConnection();
    
    if( isset($_POST['username']) || isset($_POST['password']) ){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // menyeleksi data admin dengan username dan password yang sesuai
        $user = new User($db);

        $result = $user->getAllData();
        $num = $result->rowCount();

        if($num > 0){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            header("location: /admin.php");
        }else{
            header("location: /ui-admin/login.php");
        }
    }else{
        header("location: /ui-admin/login.php?message=noisset");
    }
?>