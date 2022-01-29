<?php 
	if (!isset($_SESSION['account']) && !isset($_SESSION['username'])){
		header('Location:login.php');
		exit();	
	}
?>