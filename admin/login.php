<?php 
	session_start();
	#require 'filters/guest_filter.php';
	require 'includes/function.php';
	require 'classe/login.classe.php';
	$title = 'Connexion';

	if(isset($_POST['kota'])){
		if(not_empty(['username','password'])){
			$errors = [];
			e(trim(extract($_POST)));

			$connexion = new login($username,$password);
			$connect = $connexion->connect();
			if($connect){
				redirect('index.php?account='.$_SESSION['account']);
			}else{
				$errors[] = "Mot de passe incorrect";
			} 

		}else{
			$errors[] = "Veuillez remplir tous les champs!";
			save_input_data();
		}

	}else{
		clear_input_data();
	}
?>
<!DOCTYPE html>
<html>
	<?php include_once("navigation/header.php"); ?>
<body>
	<?php include_once("navigation/header.php"); ?>
	<?php include_once("view/login.view.php"); ?>
</body>
	<?php include_once("footer.php"); ?>
</html>
