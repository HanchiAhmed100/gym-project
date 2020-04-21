<?php 
    include_once '../class/team.class.php';
	$id = $_GET['id'];
    $team = new team();	
    $team->delete_Coach($id);

?>