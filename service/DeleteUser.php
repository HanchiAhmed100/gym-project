<?php 
    include_once '../class/users.class.php';

	$id = $_GET['id'];

    $users = new users();	
    $users->delete_user($id)

?>