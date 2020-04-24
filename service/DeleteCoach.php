<?php
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    } 
    include_once '../class/team.class.php';
	$id = $_GET['id'];
    $team = new team();	
    $team->delete_Coach($id);

?>