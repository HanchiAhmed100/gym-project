<?php 
class connexion{
	private $host = 'localhost';
	private $database = 'gym';
	private $name = 'root';
	private $dbpassword = '';
	public $dbb;

	public function connect(){
		$this->bdd = null;
		try {   
			$this->bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->name,$this->dbpassword);  
			$this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		}catch(Exception $e) { 
			die('Erreur : '.$e->getMessage());   
		}
		return $this->bdd;
	}
}
?>