<?php 
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    }
    include_once '../class/login.class.php';

	$fullname = stripslashes(strip_tags($_POST['fullname']));
    $email = stripslashes(strip_tags($_POST['email']));
    $password = stripslashes(strip_tags($_POST['password']));

    $login = new login();	
    $hashMDP = $login->passwordhash($password);	
    $login->add_admin($fullname,$email,$hashMDP);	

?>