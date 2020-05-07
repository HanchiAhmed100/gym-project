<?php
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    } 
    include_once '../class/blog.class.php';
	$id = $_GET['id'];
    $blog = new blog();	
    $blog->delete_article($id);

?>