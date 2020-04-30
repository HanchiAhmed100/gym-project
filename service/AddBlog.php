<?php 
    session_start();
    if(empty($_SESSION['token']) || empty($_SESSION['id'])){
        exit("Session Expired");
    }
    include_once '../class/blog.class.php';
    if(empty($_SESSION['type'])){
        $type = 1;
        $state = 0;
    }else{
        $type = 0;
        $state = 1;
    }
    $title = stripslashes(strip_tags($_POST['title']));
    $description = stripslashes(strip_tags($_POST['description']));
    $user_id = $_SESSION['id'];
    if($_FILES["fileToUpload"]["size"] == 0){
        $pic = "./public/blog/blog.jpg";
        $blog = new blog();	
        $blog->add_artice_without_pic($user_id,$title,$description,$state,$type);	
    
    }else{        
        $target_dir = "../public/blog/";
        $target_file = $target_dir . $title . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG and PNG files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file )) {
                echo "The image of ". $title ." has been uploaded.";
                $blog = new blog();	
                $blog->add_artice_with_pic($user_id,$title,$description,$state,$type,"./public/blog/". $title . basename($_FILES["fileToUpload"]["name"]));	
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

?>