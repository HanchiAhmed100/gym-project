<?php 
    include_once '../class/planning.class.php';

    $class = stripslashes(strip_tags($_POST['class']));
	$day = stripslashes(strip_tags($_POST['day']));
    $hour = stripslashes(strip_tags($_POST['hour']));
    $gym = stripslashes(strip_tags($_POST['gym']));
    $planning = new planning();	
    $planning->Set_planning($hour,$day,$gym,$class);	

?>