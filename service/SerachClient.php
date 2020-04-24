<?php
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    }
    include_once '../class/users.class.php';
    $name = $_GET['name'];
    $users = new users();	
    $user = $users->Search_users($name);
    echo '<br />';
    if($user->rowCount() != 0)
    while ($u = $user->fetch()) {
        echo'<div class="ligtern padding"><a class="h5 links text primary-color" href="client.html?id='.$u['id'].'&name='.$u['fullname'].'"> Name : '.$u['fullname'].' <br />Age : '.$u['age'].'</a> </div> <br />';
    }else{
        echo'<p class="h5"> User not found !</p>';
    }
?>