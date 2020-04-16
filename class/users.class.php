<?php
	include_once 'connexion.class.php';
 	class users{
 	 	
	  	public function __construct(){
 	 		$db = new connexion;
          	$connect = $db->connect();
          	$this->conn = $connect;
        }

        public function load_users(){
            $stmt = $this->conn->prepare("SELECT id, fullname, sexe, age, created_at FROM users WHERE active = 1 order by created_at DESC");
            $stmt ->execute();
            return $stmt;
        }

        public function add_user($fullname,$email,$sexe,$age,$mypassword){
            $active = 1;
            $mydate = date("Y-m-d ");
            $token = bin2hex(openssl_random_pseudo_bytes(64));
            if($sexe == "Male"){
                $picture = "/public/male.jpg";
            }else{
                $picture = "/public/female.jpg" ;
            }
            $stmt = $this->conn->prepare ("INSERT INTO users (fullname,username,password,email,sexe,age,picture,active,created_at,token) VALUES (:fullname,:username,:mypassword,:email,:sexe,:age,:picture,:active,:created_at,:token)");
            $stmt -> bindParam(':fullname',$fullname);
            $stmt -> bindParam(':username',$fullname);
            $stmt -> bindParam(':mypassword',$mypassword);
            $stmt -> bindParam(':email',$email);
            $stmt -> bindParam(':sexe',$sexe);
            $stmt -> bindParam(':age',$age);
            $stmt -> bindParam(':picture',$picture);
            $stmt -> bindParam(':created_at',$mydate);
            $stmt -> bindParam(':active',$active);            
            $stmt -> bindParam(':token',$token);
            $stmt -> execute();
        }
        public function passwordhash($motdepasse){
            $motdepasse = md5($motdepasse);
            return $motdepasse;
        } 
    }
	 
?>