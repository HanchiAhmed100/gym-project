<?php
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    }
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
    $info = $users->load_user_paiments($id);

    if($info->rowCount() != 0){
        echo'     
        <hr \><br \>
        <p class="h5">Paiments :</p>                        
        <table class="margin mytable h5">
        <tr>
            <td> MONTH </td>
            <td> OFFER </td>
            <td> PAIMENT DATE </td>
            <td> ACTIONS</td>

        </tr>';
        while ($i = $info->fetch()) {

            echo'                                        
                <tr>
                    <td> '.$i['month'].' </td>
                    <td> '.$i['offer'].' </td>
                    <td> '.$i['p_date'].' </td>

                    <td> <i class="fa fa-trash" ></i> &nbsp &nbsp <i class="fa fa-pencil"> </i></td>
                </tr>
            ';
        }
        echo'</table> ';
    }else{
        echo ' <hr \><br \> <p class="h5">No paiment yet ! </p>';
    }

?>
