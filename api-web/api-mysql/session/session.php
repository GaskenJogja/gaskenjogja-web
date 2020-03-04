<?php
    // mengaktifkan session php
    session_start();
    
    // menghubungkan dengan koneksi
    include_once '../config/database.php';
    include_once '../objects/admin.php';
 
// instantiate database and user object
    $database = new Database();
    $db = $database->getConnection();
    // $username = $_POST['username'];
    
    if( isset($_POST['username']) || isset($_POST['password']) ){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // menyeleksi data admin dengan username dan password yang sesuai
        $admin = new Admin($db);

        $result = $admin->adminSession($username, $password);
        $num = $result->rowCount();

        if($num > 0){
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            header("location: ../../../ui-admin/index.php");
        }else{
            header("location: ../../../ui-admin/login.php");
        }
    }else{
        header("location: ../../../ui-admin/login.php?message=noisset");
    }
?>