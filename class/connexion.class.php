<?php 
class connexion{
	private $host = 'localhost';
	private $database = 'gym';
	private $name = 'root';
	private $dbpassword = '';
	public $dbb;

	public function connect(){
		$this->dbb = null;
		try {   
			$this->dbb = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->name,$this->dbpassword);  
			$this->dbb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		}catch(Exception $e) { 
			die('Erreur : '.$e->getMessage());   
		}
		return $this->dbb;
	}
}
?>