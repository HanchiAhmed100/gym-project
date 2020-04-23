<?php
	include_once 'connexion.class.php';
	class login{
 	 	
	  	public function __construct(){
 	 		$db = new connexion;
          	$connect = $db->connect();
          	$this->conn = $connect;
		}
		public function passwordhash($motdepasse){
            $motdepasse = md5($motdepasse);
            return $motdepasse;
		}
		public function add_admin($fullname,$email,$password){
			$token = bin2hex(openssl_random_pseudo_bytes(64));
			$type = 1;
            $stmt = $this->conn->prepare ("INSERT INTO admin (fullname,email,password,type,token) VALUES (:fullname,:email,:password,:type,:token)");
            $stmt -> bindParam(':fullname',$fullname);
            $stmt -> bindParam(':email',$email);
			$stmt -> bindParam(':password',$password);
			$stmt -> bindParam(':type',$type);
			$stmt -> bindParam(':token',$token);
            $stmt -> execute();
        }
		public function Check_login($mail,$password){
			$check = $this->conn->prepare("SELECT * FROM admin WHERE email =:mail AND password = :password");
			$check -> bindParam(':mail',$mail);
			$check -> bindParam(':password',$password);
			$check -> execute();
			return $check;
		}
		public function verif_token($token,$id){
			$check = $this->conn->prepare("SELECT * FROM admin WHERE token =:token AND id = :id");
			$check -> bindParam(':id',$id);
			$check -> bindParam(':token',$token);
			$check -> execute();
			return $check;
		}
		 
	}
?>