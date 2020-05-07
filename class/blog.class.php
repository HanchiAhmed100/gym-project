<?php
	include_once 'connexion.class.php';
	class blog{
 	 	
		public function __construct(){
			$db = new connexion;
			$connect = $db->connect();
			$this->conn = $connect;
		}
		public function add_artice_with_pic($user_id,$title,$description,$state,$type,$pic){
            $stmt = $this->conn->prepare ("INSERT INTO blog (user_id,title,description,pic,state,type) VALUES (:user_id,:title,:description,:pic,:state,:type)");
            $stmt -> bindParam(':user_id',$user_id);
            $stmt -> bindParam(':title',$title);
			$stmt -> bindParam(':description',$description);
            $stmt -> bindParam(':pic',$pic); 
            $stmt -> bindParam(':state',$state);
            $stmt -> bindParam(':type',$type);
			$stmt ->execute();
        } 
        public function add_artice_without_pic($user_id,$title,$description,$state,$type){
            $pic = "./public/blog/blog.jpg";
            $stmt = $this->conn->prepare ("INSERT INTO blog (user_id,title,description,pic,state,type) VALUES (:user_id,:title,:description,:pic,:state,:type)");
            $stmt -> bindParam(':user_id',$user_id);
            $stmt -> bindParam(':title',$title);
			$stmt -> bindParam(':description',$description);
            $stmt -> bindParam(':pic',$pic); 
            $stmt -> bindParam(':state',$state);
            $stmt -> bindParam(':type',$type);
			$stmt -> execute();
		} 

        public function load_admin_blog(){
            $stmt = $this->conn->prepare ("SELECT blog.* , admin.fullname FROM blog join admin ON blog.user_id = admin.id WHERE blog.state = 1 AND blog.type = 0 ORDER BY blog.created_at");
            $stmt ->execute();
            return $stmt;
        } 
        public function load_users_blog(){
            $stmt = $this->conn->prepare ("SELECT blog.* ,users.fullname,users.picture FROM blog join users ON blog.user_id = users.id WHERE blog.state = 1 AND blog.type = 1 ORDER BY blog.created_at");
            $stmt ->execute();
            return $stmt;
        } 
        public function load_One_user_blog($user_id){
            $stmt = $this->conn->prepare ("SELECT * FROM blog WHERE user_id = :user_id ORDER BY created_at");
            $stmt -> bindParam(':user_id',$user_id);
            $stmt ->execute();
            return $stmt;
        } 
		public function update_article($id,$user_id,$title,$description,$pic){
			$stmt = $this->conn->prepare ("UPDATE blog SET title = :title , $description = :description , $pic = :pic WHERE id = :id ");
            $stmt -> bindParam(':id',$id);
            $stmt -> bindParam(':title',$title);
            $stmt -> bindParam(':description',$description);
            $stmt -> bindParam(':pic',$pic); 
			$stmt ->execute();
        }
        public function update_article_state($id){
			$stmt = $this->conn->prepare ("UPDATE blog SET state = 1 WHERE id = :id ");
            $stmt -> bindParam(':id',$id);
			$stmt ->execute();
		}
		public function delete_article($id){
			$stmt = $this->conn->prepare ("DELETE FROM blog WHERE id = :id");
			$stmt -> bindParam(':id',$id);
			$stmt ->execute();
		}
	}
?>