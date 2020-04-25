<?php 
    include_once '../class/users.class.php';
	$fullname = stripslashes(strip_tags($_POST['fullname']));
    $email = stripslashes(strip_tags($_POST['email']));
    $msg = stripslashes(strip_tags($_POST['msg']));
    $users = new users();	
    $users->add_contact_msg($fullname,$email,$msg);	
?>