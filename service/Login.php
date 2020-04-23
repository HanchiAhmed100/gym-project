<?php 
    include_once '../class/login.class.php';

	$email = stripslashes(strip_tags($_POST['mail']));
    $password = stripslashes(strip_tags($_POST['password']));

    $login = new login();	
    $hashMDP = $login->passwordhash($password);	
    $result = $login->Check_login($email,$hashMDP);	
    if($result -> rowCount() === 1){
        while( $r = $result->fetch()){
            session_start();
            $_SESSION['id'] = $r['id'];
            $_SESSION['fullname'] = $r['fullname'];
            $_SESSION['email'] = $r['email'];
            $_SESSION['token'] = $r['token'];
            $_SESSION['type'] = $r['type'];
            header('location:../auth/setlocalstorage.html?id='.$r['id'].'&token='.$r['token'].'&name='.$r['fullname'].'&type='.$r['type'].'');
        }

    }else{
        header('location:../login.html');
    }

?>