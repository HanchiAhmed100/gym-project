<?php 
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    }
    include_once '../class/users.class.php';
	$fullname = stripslashes(strip_tags($_POST['fullname']));
    $email = stripslashes(strip_tags($_POST['email']));
    $sexe = stripslashes(strip_tags($_POST['sexe']));
    $age = stripslashes(strip_tags($_POST['age']));
    $sexe = stripslashes(strip_tags($_POST['sexe']));
    $password = stripslashes(strip_tags($_POST['password']));
    $users = new users();	
    $hashMDP = $users->passwordhash($password);	
    $users->add_user($fullname,$email,$sexe,$age,$hashMDP);	

?>
