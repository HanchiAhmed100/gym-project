
<?php
    include_once '../class/team.class.php';
    $team = new team();	
    $team = $team->load_Coach();
    $count = $team -> rowCount();

    if( $count%3 == 0){
        $class = "col-4";
    }
    else{
        $class = "col-6";
    }
    echo'<div class="row">';
    while ($t = $team->fetch()) {
        $str = $t['pic'];
        echo'
            <div class="'.$class.' height border no-margin " id="galimg'.$t['id'].'">
                <span class="'. $str.'" id="galspan'.$t['id'].'"></span>
                <div class="hov-black height">
                    <div class="show-on-hover">
                        <div class="padding-large mid">
                            <div class="padding-large light center">
                                <p class="h4">'.$t['fullname'].'</p>
                                <p class="h5">'.$t['speciality'].'</p>
                                <div class="padding">
                                    <a class="inc">
                                        <i class="fa fa-picture-o fa-2x links padding-left-right"  onclick="ShowCoachImg(\''.$t['pic'].'\')"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
    echo '</div>'

?>

