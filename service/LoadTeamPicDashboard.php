<?php
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    }
    include_once '../class/team.class.php';
    $team = new team();	
    $team = $team->load_Coach();
    echo'    <br />
    <table class="margin mytable h5  ">
    <tr class="full-widht">
        <td>FULL NAME</td>
        <td> Speciality </td>
        <td> ACTIONS </td>
    </tr>';
    while ($t = $team->fetch()) {
        echo'                                        

            <tr>
                <td> '.$t['fullname'].' </td>
                <td> '.$t['speciality'].' </td>
                <td> <a href="'.$t['pic'].'"> <i class="fa fa-picture-o"></i></a>  <i class="fa fa-pencil" onClick="Update('.$t['id'].',\''.$t['fullname'].'\',\''.$t['speciality'].'\')"></i> <i class="fa fa-trash" OnClick="DeleteCoach('.$t['id'].')"></i> </td>
            </tr>
        ';
    }

?>