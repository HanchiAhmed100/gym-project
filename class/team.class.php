<?php
	include_once 'connexion.class.php';
	class team{
 	 	
		public function __construct(){
			$db = new connexion;
			$connect = $db->connect();
			$this->conn = $connect;
		}
		public function add_team($name,$spe,$pic){
			$stmt = $this->conn->prepare ("INSERT INTO team (fullname,speciality,pic) VALUES (:name,:spe,:pic)");
			$stmt -> bindParam(':name',$name);
			$stmt -> bindParam(':spe',$spe);
			$stmt -> bindParam(':pic',$pic); 
			$stmt ->execute();
		} 
		public function load_Coach(){
            	$stmt = $this->conn->prepare ("SELECT * FROM TEAM");
			$stmt ->execute();
			return $stmt;
		} 
		public function update_team($id,$name,$spe,$pic){
			$stmt = $this->conn->prepare ("UPDATE team SET fullname = :name , speciality = :spe , pic = :pic WHERE id = :id ");
			$stmt -> bindParam(':id',$id);
			$stmt -> bindParam(':name',$name);
			$stmt -> bindParam(':spe',$spe);
			$stmt -> bindParam(':pic',$pic); 
			$stmt ->execute();
		}
		public function delete_Coach($id){
			$stmt = $this->conn->prepare ("DELETE FROM team WHERE id = :id");
			$stmt -> bindParam(':id',$id);
			$stmt ->execute();
		}
	}
?>