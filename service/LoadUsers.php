<?php
    include_once '../class/users.class.php';
    $type = $_GET['type'];
    $users = new users();	
    $user = $users->load_users($type);
    echo'    
    <table class="margin mytable h5">
    <tr>
        <td>FULL NAME</td>
        <td> SEXE </td>
        <td> AGE </td>
        <td> MEMBER SINCE </td>
        <td> ACTIONS </td>
    </tr>';
    while ($u = $user->fetch()) {
        echo'                                        
            <tr>
                <td><a href="client.html?id='.$u['id'].'&name='.$u['fullname'].'" class="links"> '.$u['fullname'].'</a> </td>
                <td> '.$u['sexe'].' </td>
                <td> '.$u['age'].' </td>
                <td> '.$u['created_at'].' </td>
                <td> <i class="fa fa-trash" onclick="deleteUser('.$u['id'].',\' '.$u['fullname'].' \' ,\''.$type.'\' )"></i> &nbsp &nbsp <a href="client.html?id='.$u['id'].'&name='.$u['fullname'].' "><i class="fa fa-pencil"> </i></a></td>
            </tr>
        ';
    }
    echo'</table> ';
?>