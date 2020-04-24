<?php
	include_once 'connexion.class.php';
	class gallery{
 	 	
		public function __construct(){
			$db = new connexion;
			$connect = $db->connect();
			$this->conn = $connect;
		}
		public function add_gallery($title,$description,$pic){
			$stmt = $this->conn->prepare ("INSERT INTO gallery (title,description,pic) VALUES (:title,:description,:pic)");
			$stmt -> bindParam(':title',$title);
			$stmt -> bindParam(':description',$description);
			$stmt -> bindParam(':pic',$pic); 
			$stmt ->execute();
		} 
		public function load_gallery(){
            	$stmt = $this->conn->prepare ("SELECT * FROM gallery");
			$stmt ->execute();
			return $stmt;
		} 
		public function update_gallery($id,$title,$description,$pic){
			$stmt = $this->conn->prepare ("UPDATE gallery SET title = :title , description = :description , pic = :pic WHERE id = :id ");
			$stmt -> bindParam(':id',$id);
			$stmt -> bindParam(':title',$title);
			$stmt -> bindParam(':description',$description);
			$stmt -> bindParam(':pic',$pic); 
			$stmt ->execute();
		}
		public function delete_gallery($id){
			$stmt = $this->conn->prepare ("DELETE FROM gallery WHERE id = :id");
			$stmt -> bindParam(':id',$id);
			$stmt ->execute();
		}
	}
?>