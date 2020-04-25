<?php
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    }
    include_once '../class/users.class.php';

    $users = new users();	
    $user = $users->Load_Contact_msg();
    $total = $user -> rowCount();
    echo '<div class="col-12"> <div class="padding line ligtern light center"> <p class="h5">You have <span class="primary-color">'.$total.'</span> messages</p><br /><div id="Msg"></div></div></div>';
    while ($u = $user->fetch()) {
        echo'
            <div class="col-12">
                <div class="padding-large line ligtern light">
                    <span class="right links" onclick="DeleteContactMsg('.$u['id'].',\''.$u['fullname'].'\')"><i class="fa fa-close"></i></span>
                    <p class="h5 line"> <span class="secondary-color"> FullName : </span> '.$u['fullname'].' </p>
                    <p class="h5 line"><span class="secondary-color">  Email : </span>  '.$u['email'].' </p>
                    <hr /><br />
                    <p class="h5"><span class="secondary-color">  Message : </span>  '.$u['message'].' </p>
                    <br /> <hr />
                    <p class="h5 right"><span class="secondary-color">  Date : </span>  '.$u['date'].' </p>
                </div>
            </div>
        ';
    }
?>