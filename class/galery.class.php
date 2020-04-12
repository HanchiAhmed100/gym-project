<?php
	include_once 'connnexion.class.php';
 	class galery{

	  	public function __construct(){
 	 		$db = new connnexion;
          	$connect = $db->connect();
          	$this->conn = $connect;
          }

 	}
?>