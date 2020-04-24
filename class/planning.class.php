<?php
	include_once 'connexion.class.php';
 	class planning{
 	 	
	  	public function __construct(){
 	 		$db = new connexion;
          	$connect = $db->connect();
          	$this->conn = $connect;
        }

        public function Get_planning(){
            $stmt = $this->conn->prepare("SELECT * FROM planning  where gym = 1 ORDER BY ind");
            $stmt ->execute();
            return $stmt;
        }
        public function Get_gym2_planning(){
            $stmt = $this->conn->prepare("SELECT * FROM planning  where gym = 2 ORDER BY ind");
            $stmt ->execute();
            return $stmt;
        }
        public function Set_planning($hour,$day,$gym,$class){
            if( $day == "Monday"){
                $index = 1;
            }
            if( $day == "Tuesday"){
                $index = 2;
            }
            if( $day == "Wednesday"){
                $index = 3;
            }
            if( $day == "Thursday"){
                $index = 4;
            }
            if( $day == "Friday"){
                $index = 5;
            }
            if( $day == "Saturday"){
                $index = 6;
            }
            if( $day == "Sunday"){
                $index = 7;
            }

            $stmt = $this->conn->prepare("SELECT * FROM planning WHERE day=:day and gym=:gym");
            $stmt -> bindParam(':day',$day);
            $stmt -> bindParam(':gym',$gym);
            $stmt -> execute();
            if($stmt -> rowCount() === 1){
                $query = $this->conn->prepare("UPDATE planning SET `".$hour."`= :class WHERE day = :day AND gym = :gym "); 
                $query -> bindParam(':class',$class);
                $query -> bindParam(':day',$day);
                $query -> bindParam(':gym',$gym);
                $query -> execute();
            }else{
                $query = $this->conn->prepare("INSERT INTO planning (`".$hour."`,day,gym,ind) VALUES (:class,:day,:gym,:index)"); 
                $query -> bindParam(':class',$class);
                $query -> bindParam(':day',$day);
                $query -> bindParam(':gym',$gym);
                $query -> bindParam(':index',$index);
                $query -> execute();
            }
        }

    }
	 
?>