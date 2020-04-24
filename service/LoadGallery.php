<?php
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    }
    include_once '../class/gallery.class.php';
    $gallery = new gallery();	
    $gal = $gallery->load_gallery();

    while ($g = $gal->fetch()) {
        $str = $g['pic'];
        echo'

            <div class="col-4 height border no-margin " id="galimg'.$g['id'].'" onclick="ShowGalImg(\''.$g['pic'].'\')">
                <span class="'. $str.'" id="galspan'.$g['id'].'"></span>
                <div class="hov height">
                    <div class="show-on-hover">
                        <div class="padding-large mid">
                            <div class="padding-xlarge light center">

                                <p class="h4">'.$g['title'].'</p>
                                <p class="h5">'.$g['description'].'</p>
                                <div class="padding">
                                    <a class="inc">
                                        <i class="fa fa-picture-o fa-2x links"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        ';
    }

?>