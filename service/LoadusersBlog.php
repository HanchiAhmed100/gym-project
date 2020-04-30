<?php
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    }
    include_once '../class/blog.class.php';

    $blog = new blog();	
    $myblog = $blog->load_users_blog();
    echo '<p class="h4 light center">Articles Added by Users !</p>';
    while ($b = $myblog->fetch()) {
        echo'
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="row ligtern light">
                    <div class="col-5 min-height center " id="galimg'.$b['id'].'">
                    <span class="'.$b['pic'].'" id="galspan'.$b['id'].'"></span>
                    </div>
                    <div class="col-7" id="my-height">
                        <div class="row">
                            <div class="col-2"> <img src="'.$b['picture'].'" class="round-profile"/></div>
                            <div class="col-10">
                                    <br />
                                <p class="h5 secondary-color">'.$b['fullname'].' </p>
                                <p class="muted-color">'.$b['created_at'].'</p>
                            </div>
                            <div class="col-12">
                                <p class="h4 primary-color">'.$b['title'].'</p>
                                <p>'.$b['description'].'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>

        ';
    }
?>