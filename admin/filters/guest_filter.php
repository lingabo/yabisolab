<?php 
	if (isset($_SESSION['account']) && isset($_SESSION['username'])){
		header('Location:index.php?account='.$_SESSION['account']);
		exit();	
	}
?>