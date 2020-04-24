<?php
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    } 
    include_once '../class/users.class.php';

	$id = $_GET['id'];
    $type = $_GET['type'];
    $users = new users();	
    $users->delete_user($id,$type);

?>