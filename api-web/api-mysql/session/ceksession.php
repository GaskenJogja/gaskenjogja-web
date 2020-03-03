<?php 
	session_start();
	if(!isset($_SESSION['status'])){
		header("location: /ui-admin/login.php?pesan=belum_login");
	}
?>