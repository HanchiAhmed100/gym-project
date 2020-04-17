<?php
    include_once '../class/planning.class.php';
    
    $planning = new planning();	
    $plan = $planning->Get_planning();

    echo'    
    <table class="margin mytable h5">
    <tr>
        <td><span>&times;</span></td>
        <td> 08:00 - 10:00 </td>
        <td> 10:00 - 12:00 </td>
        <td> 12:00 - 14:00 </td>
        <td> 14:00 - 16:00 </td>
        <td> 16:00 - 18:00  </td>
        <td> 18:00 - 20:00 </td>
    </tr>   ';
    while ($p = $plan->fetch()) {
        echo'                                        

        <tr>
            <td> '.$p['day'].' </td>
            <td> '.$p['hour_08'].'</td>
            <td> '.$p['hour_10'].' </td>
            <td> '.$p['hour_12'].' </td>
            <td> '.$p['hour_14'].' </td>
            <td> '.$p['hour_16'].' </td>
            <td> '.$p['hour_18'].'  </td>
        </tr>
        ';
    }
    echo'</table> ';
?>

