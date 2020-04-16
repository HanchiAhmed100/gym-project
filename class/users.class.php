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
        public function load_one_user($id){
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id ");
            $stmt -> bindParam(':id',$id);            
            $stmt ->execute();
            return $stmt;
        }
        public function load_one_user_info($id){
            $stmt = $this->conn->prepare("SELECT * FROM users JOIN paiment ON users.id = paiment.client_id WHERE user.id = :id");
            $stmt -> bindParam(':id',$id);            
            $stmt ->execute();
            return $stmt;
        }

        public function add_user($fullname,$email,$sexe,$age,$mypassword){
            $active = 1;
            $mydate = date("Y-m-d ");
            $token = bin2hex(openssl_random_pseudo_bytes(64));
            if($sexe == "Male"){
                $picture = "./public/male.jpg";
            }else{
                $picture = "./public/female.jpg" ;
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
        public function delete_user($id){
            $stmt = $this->conn->prepare("UPDATE users set active = 0 WHERE id = :id ");
            $stmt -> bindParam(':id',$id);            
            $stmt ->execute();
        }
        public function add_paiment($c_id,$month,$offer){
            $stmt = $this->conn->prepare ("INSERT INTO paiment (client_id,month,offer) VALUES (:c_id,:month,:offer)");
            $stmt -> bindParam(':c_id',$c_id);
            $stmt -> bindParam(':month',$month);
            $stmt -> bindParam(':offer',$offer); 
            $stmt ->execute();
 
        } 
    }
	 
?>