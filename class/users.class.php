<?php
	include_once 'connexion.class.php';
 	class users{
 	 	
	  	public function __construct(){
 	 		$db = new connexion;
          	$connect = $db->connect();
          	$this->conn = $connect;
        }

        public function load_users($type){
            if($type == 'active'){
                $active = 1;
            }else{
                $active = 0;
            }
            $stmt = $this->conn->prepare("SELECT id, fullname, sexe, age, created_at FROM users WHERE active = :active order by created_at DESC");
            $stmt -> bindParam(':active',$active);            
            $stmt ->execute();
            return $stmt;
        }
        public function load_one_user($id){
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id ");
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
        public function delete_user($id,$type){
            if($type == 'active'){
                $active = 1;
            }else{
                $active = 0;
            }
            $stmt = $this->conn->prepare("UPDATE users set active = :active WHERE id = :id ");
            $stmt -> bindParam(':id',$id);            
            $stmt -> bindParam(':active',$active);            
            $stmt ->execute();
        }
        public function add_paiment($c_id,$month,$offer){
            $p_date = date("Y-m-d ");
            $stmt = $this->conn->prepare ("INSERT INTO paiment (client_id,month,offer,p_date) VALUES (:c_id,:month,:offer,:p_date)");
            $stmt -> bindParam(':c_id',$c_id);
            $stmt -> bindParam(':month',$month);
            $stmt -> bindParam(':offer',$offer); 
            $stmt -> bindParam(':p_date',$p_date); 
            $stmt ->execute();
        } 
        public function load_user_paiments($id){
            $stmt = $this->conn->prepare("SELECT * FROM paiment WHERE client_id = :id");
            $stmt -> bindParam(':id',$id);            
            $stmt ->execute();
            return $stmt;
        }
    }
	 
?>