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
            <div class="col-4 height border no-margin " id="galimg'.$g['id'].'">
                <span class="'. $str.'" id="galspan'.$g['id'].'"></span>
                <div class="hov height">
                    <div class="show-on-hover">
                        <div class="padding-large mid">
                            <div class="padding-large light center">
                                <p class="h4">'.$g['title'].'</p>
                                <p class="h5">'.$g['description'].'</p>
                                <div class="padding">
                                    <a class="inc">
                                        <i class="fa fa-trash-o fa-2x links padding-left-right"  onclick="DeleteGalImg('.$g['id'].')"></i>
                                        <i class="fa fa-picture-o fa-2x links padding-left-right"  onclick="ShowGalImg(\''.$g['pic'].'\')"></i>
                                        <i class="fa fa-pencil fa-2x links padding-left-right"  onclick="UpdateGalImg('.$g['id'].',\''.$g['title'].'\',\''.$g['description'].'\')"></i>
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