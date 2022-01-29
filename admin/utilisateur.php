<?php
	session_start();
	#require_once 'filters/auth_filter.php';
	require_once 'includes/function.php';
	require_once 'classe/user.classe.php';
	$title = 'Tableau de bord';

	if(isset($_POST['register'])){
		if(not_empty(['nom','prenom','sexe','newpass','confpsw','tel','mail','adresse'])){

			$errors = [];
			$dest = "";
			e(trim(extract($_POST)));

			$user = new user($nom,$prenom,$sexe,$adresse,$datnaiss,$profession,$bio,$tel,$mail,$newpass,$confpsw);

			//verification de la longuer des champs
			$textLong = $user->checkTextLong();
			if($textLong){
				$errors[] = "La longuer du champ n'est pas valide! (mimimum 4 caractères)";
			}

			//verification de la validation de l'adresse email
			$checkMail = $user->checkEmailValidation();
			if ($checkMail){
				$errors[] = "L' adresse e-mail au mauvais format";
			}

			//verification de la validation du numero de telephone
			!preg_match('#[0-9]{10,}#', $tel)?$errors[] = "Numero de telephone au mauvais format":null;
		

			//verification de la date de naissance
			$checkDate = $user->checkDateValidation();
		    if($checkDate!=="ok"){
		    	$errors[] = $checkDate;
		    }

			
			//verification de la validation du format de mot de passe			
		    $checkPass = $user->checkPassword();
		    if($checkPass!=="ok"){
		    	$errors[] = $checkPass;
		    }

		    //Verifie si la valeur existe deja dans la bdd
		    $log = $user->checkLoginExist();
			if($log == "non"){
				$errors[] = "Le pseudo existe deja";
			}

			$mail = $user->checkMailExist();
			if($mail){
				$errors[] = "L'adresse e-mail existe deja";
			}

			$phone = $user->checkPhoneExist();
			if($phone){
				$errors[] = "Le numéro utilisé par un autre utilisateur";
			}

			//si il n'ya pas d'erreur on enregistre les infos de l'utilisateur
			if(count($errors) == 0){

				if(!empty($_FILES)){
					$file_name = $_FILES['avatar']['name'];
					$extensions = strrchr($file_name,'.');
					$tempFile = $_FILES['avatar']['tmp_name'];
					$randomFileName = 'YAB-'.md5(uniqid(rand())) . '.' . $extensions;
					$dest = 'uploads/user_avatars/'.$randomFileName;
					$fileTypes = array('.jpg','.jpeg','.gif','.png'); 	
					if(in_array($extensions,$fileTypes)) {
						move_uploaded_file($tempFile,$dest);
					} else {
						$errors[] = "Type de fichier invalide";
					}
				}
				$user->enregistrement($log,$dest);

 				//on efface les valeurs en session pour les champs et on informe l'utilisateur que tout s'est bien //passe 
 				clear_input_data();
				set_flash('Enregistrement effectué','info');

			}else{
				save_input_data();
			}

		}else{

			$errors[] = "Veuillez remplir tous les champs!";
			save_input_data();
		}

	} else{
		clear_input_data();
	}


?>

<!DOCTYPE html>
<html>
	<?php include_once("navigation/header.php"); ?>
<body>
	<?php include_once("navigation/nav.php"); ?>
	<?php include_once("view/utilisateur.view.php"); ?>
</body>
	<?php include_once("footer.php"); ?>
</html>

