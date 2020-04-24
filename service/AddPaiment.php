<?php 
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    }
    include_once '../class/users.class.php';
	$fullname = stripslashes(strip_tags($_POST['fullname']));
    $id = stripslashes(strip_tags($_POST['id']));
    $month = stripslashes(strip_tags($_POST['month']));
    $offer = stripslashes(strip_tags($_POST['offer']));
    $users = new users();	
    $users->add_paiment($id,$month,$offer);	

?>