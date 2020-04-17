<?php
	include_once 'connexion.class.php';
 	class planning{
 	 	
	  	public function __construct(){
 	 		$db = new connexion;
          	$connect = $db->connect();
          	$this->conn = $connect;
        }

        public function Get_planning(){
            $stmt = $this->conn->prepare("SELECT * FROM planning ORDER BY day");
            $stmt ->execute();
            return $stmt;
        }

    }
	 
?>