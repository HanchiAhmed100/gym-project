<?php 
    include_once '../class/users.class.php';

	$id = $_GET['id'];
    $type = $_GET['type'];

    $users = new users();	
    $users->delete_user($id,$type)

?>