<?php
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
                <td> <a href="'.$t['pic'].'"> <i class="fa fa-picture-o"></i></a>  <i class="fa fa-pencil"></i> <i class="fa fa-trash"></i> </td>
            </tr>
        ';
    }

?>