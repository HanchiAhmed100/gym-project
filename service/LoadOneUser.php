<?php
    include_once '../class/users.class.php';
    
    $id = $_GET['id'];
    $users = new users();	
    $user = $users->load_one_user($id);

    while ($u = $user->fetch()) {
        $x = ($u['created_at'] === 1) ? " No " : "Yes";
        echo'                                        
            <div class="row h5"> 
                <div class="col-3"> <img class="small-img" src="'.$u['picture'].'" /></div>
                <div class="col-9">
                    <p id="client-name"> Full Name : '.$u['fullname'].' </p>
                    <p> Email : '.$u['email'].' </p>
                    <p> Sexe : '.$u['sexe'].' </p>
                    <p> Age : '.$u['age'].' </p>
                    <p> Member since : '.$u['created_at'].' </p>
                    <p> Active : '.$x.' </p>
                </div>
            </div>
        ';
    }
    echo '
        <hr \><br \>
        Paiments
    ';


?>
