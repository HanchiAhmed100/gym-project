
<?php
    include_once '../class/gallery.class.php';
    $gallery = new gallery();	
    $gal = $gallery->load_gallery();
    $count = $gal -> rowCount();
     
    if( $count%3 == 0){
        $class = "col-4";
    }
    else{
        $class = "col-6";
    }

    while ($g = $gal->fetch()) {
        $str = $g['pic'];
        echo'
            <div class="'.$class.' height border no-margin " id="galimg'.$g['id'].'">
                <span class="'. $str.'" id="galspan'.$g['id'].'"></span>
                <div class="hov-black height">
                    <div class="show-on-hover">
                        <div class="padding-large mid">
                            <div class="padding-large light center">
                                <p class="h4">'.$g['title'].'</p>
                                <p class="h5">'.$g['description'].'</p>
                                <div class="padding">
                                    <a class="inc">
                                        <i class="fa fa-picture-o fa-2x links padding-left-right"  onclick="ShowGalImg(\''.$g['pic'].'\')"></i>
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

