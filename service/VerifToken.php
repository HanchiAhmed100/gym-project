<?php
    session_start();
    include_once '../class/login.class.php';
    $token = stripslashes(strip_tags($_POST['token']));
    $id = stripslashes(strip_tags($_POST['id'])) ;
    if(!empty($_SESSION['token'])){
        if( $_SESSION['token'] == $token && $_SESSION['id'] == $id ){
            $login = new login();	
            $result = $login->verif_token($token,$id);	
            if($result -> rowCount() === 1){
                echo 'verif';
            }else{
                echo 'erreur';
            }
        }else{
            echo 'erreur';
        }
    }else{
        echo 'erreur';
    }
?>