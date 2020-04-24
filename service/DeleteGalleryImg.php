<?php
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    } 
    include_once '../class/gallery.class.php';

	$id = $_GET['id'];
    $gallery = new gallery();	
    $gallery->delete_gallery($id);

?>