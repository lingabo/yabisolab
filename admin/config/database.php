<?php 

	require_once 'config.php';
	try{

		$bd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);

		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $e){	
	    die('Erreur:' .$e->getMessage());
	}
?>
