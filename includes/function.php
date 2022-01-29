<?php 
 	isset($page) && $page === 'section'
      ? require '../configuration/database.php'
      : require 'configuration/database.php';
	

	if(!function_exists('set_active')){
		function set_active($file,$class = 'active'){
			$page  = array_pop(explode('/', $_SERVER['SCRIPT_NAME']));
			if($page == $file.'.php'){
				return $class;
			}else{
				return "";
			}
		}
	}

	if(!function_exists('e')){
		function e($string){
			if($string){
				return trim(htmlspecialchars(strip_tags($string)));
			}
		}
	}

	if(!function_exists('i')){
		function i($string){
			if(!(int) $string || strlen(trim($string)) > 1 || !preg_match('#[1-6]{1,}#', $string)){
				return true;
			}
		}
	}

	if(!function_exists('not_number')){
		function not_number($string){
			if(!(int) $string || strlen(trim($string)) > 2 || !preg_match('#[0-9]{1,}#', $string)){
				return true;
			}
		}
	}

	if(!function_exists('n')){
		function n($string){
			if(!(int) $string){
				return true;
			}
		}
	}

	if(!function_exists('set_frais_status')){
		function set_frais_status($mnt_tranche,$mnt_payer,$tranche){
			$diff = (int)($mnt_tranche - $mnt_payer);
			if($diff != 0 && $tranche == "I Tranche") return "0";
            else if ($diff == 0 && $tranche == "I Tranche") return "1";
            else if ($diff != 0 && $tranche == "II Tranche") return "1";
            else if ($diff == 0 && $tranche == "II Tranche") return "2";
            else if ($diff != 0 && $tranche == "III Tranche") return "2";
            else if ($diff == 0 && $tranche == "III Tranche") return "3";
		}
	}

	if(!function_exists('confirmation_inscription')){
		function confirmation_inscription($eleve){
			global $bd;
			$req = $bd->prepare("UPDATE inscription SET  confirmation = ? WHERE  id_inscription  = ? ");
			$req->execute(["1",$eleve]);
		}
	}

	if(!function_exists('Alphabet')){
		function Alphabet($char){
			if(strlen(trim($char)) > 1 || !preg_match('#[aA-zZ]{1,}#', $char)){
				return true;
			}
		}
	}

	if(!function_exists('not_string')){
		function not_string($char){
			if(!preg_match('#[aA-zZ]{1,}#', $char)){
				return true;
			}
		}
	}

	if(!function_exists('not_empty')){
		function not_empty($fields = []){
			if(count($fields) != 0){
				foreach($fields as $field) {
					if(empty($_POST[$field]) || trim($_POST[$field]) == "" ) {
						return false;
					}
				}
				return true;
			}
		}
	}

	if(!function_exists('not_empty_get')){
		function not_empty_get($fields = []){
			if(count($fields) != 0){
				foreach($fields as $field) {
					if(empty($_GET[$field]) || trim($_GET[$field]) == "" ) {
						return false;
					}
				}
				return true;
			}
		}
	}

	if(!function_exists('get_school_year')){
		function get_school_year(){
			global $bd;
			$req = $bd->prepare("SELECT * FROM annees_scolaire WHERE active = ? ");
			$req->execute(['1']);
			$data = current($req->fetchAll(PDO::FETCH_OBJ));
			$req->closeCursor();

			return $data;
		}
	}

	if(!function_exists('get_taux')){
		function get_taux(){
			global $bd;
			$req = $bd->prepare("SELECT * FROM taux WHERE motif = ? ");
			$req->execute(['dollar ']);
			$data = current($req->fetchAll(PDO::FETCH_OBJ));
			$req->closeCursor();

			return $data;
		}
	}

	if(!function_exists('get_tranche_mnt')){
		function get_tranche_mnt($query,$tranche){
			global $bd;

    		$get_school_year = get_school_year();
    		$anne = $get_school_year->annees;

			$req = $bd->prepare("SELECT montant_tranche,id_frais_scolaire FROM frais_scolaire INNER JOIN degre ON degre.id_degre = frais_scolaire.id_degre INNER JOIN filiere ON filiere.id_degre = degre.id_degre INNER JOIN inscription ON inscription.id_filiere = filiere.id_filiere WHERE inscription.id_inscription = :query AND frais_scolaire.annees =:anne AND tranche =:tranche");
			$req->execute([
         		'query' => $query,
         		'anne' =>  $anne,   
         		'tranche'=> $tranche         
    		]);

			$data = $req->fetchAll(PDO::FETCH_OBJ);
			$req->closeCursor();

			return $data;
		}
	}

	if(!function_exists('get_mnt_tranche_payer')){
		function get_mnt_tranche_payer($query,$tranche){
			global $bd;

			$req = $bd->prepare("SELECT montant,id_paiement_frais_scolaire FROM paiement_frais_scolaire  WHERE  id_inscription  = :query AND  id_frais_scolaire  =:tranche");
			$req->execute([
         		'query' => $query,   
         		'tranche'=> $tranche         
    		]);

			$data = $req->fetchAll(PDO::FETCH_OBJ);
			$req->closeCursor();

			return $data;
		}
	}

	if(!function_exists('get_tranche_mnt_filiere')){
		function get_tranche_mnt_filiere($query,$tranche){
			global $bd;

    		$get_school_year = get_school_year();
    		$anne = $get_school_year->annees;

			$req = $bd->prepare("SELECT montant_tranche,id_frais_scolaire FROM frais_scolaire INNER JOIN degre ON degre.id_degre = frais_scolaire.id_degre INNER JOIN filiere ON filiere.id_degre = degre.id_degre INNER JOIN inscription ON inscription.id_filiere = filiere.id_filiere WHERE filiere.id_filiere = :query AND frais_scolaire.annees =:anne AND tranche =:tranche");
			$req->execute([
         		'query' => $query,
         		'anne' =>  $anne,   
         		'tranche'=> $tranche         
    		]);

			$data = $req->fetchAll(PDO::FETCH_OBJ);
			$req->closeCursor();

			return $data;
		}
	}

	if(!function_exists('get_salle_filiere')){
		function get_salle_filiere($id_filiere){
			global $bd;

			$req = $bd->prepare(" SELECT degre.degre AS degre,options.nom AS sal,filiere.nom AS fil FROM options INNER JOIN degre ON options.id_option = degre.id_option INNER JOIN filiere ON degre.id_degre = filiere.id_degre WHERE filiere.id_filiere = :query ");

			$req->execute([
         		'query' => $id_filiere      
    		]);
    		$data = $req->fetchAll(PDO::FETCH_OBJ);

			$req->closeCursor();

			return $data;
		}
	}

	if(!function_exists('generate_login')){
		function generate_login($field1,$field2){
			return e(strtoupper($field1[0]).strtolower($field2));
		}
	}

	if(!function_exists('generate_matricule')){
		function generate_matricule($matricule){
			$get_school_year = get_school_year();
			$anne = $get_school_year->annees;
			$an1 = "ELV";
			
			for ($i=0; $i < 5; $i++) { 
				$an1 = $an1.$anne[$i];
			}

			$an2 = $anne[7].$anne[8]."-";
			return e($an1.$an2.$matricule);
		}
	}

	if(!function_exists('check_validate_fields')){
		function check_validate_fields($fields = []){
			if(count($fields) != 0){
				foreach($fields as $field) {
					if(strlen(trim($field)) < 4) return true;
					else if (strlen(trim($field)) > 30) return true;
				}
				return false;
			}
		}
	}
		
	if(!function_exists('check_mdp')){
		function check_mdp($mdp){
			if($mdp == '') return 'Completer le mot de passe';
				else if (strlen(trim($mdp)) < 8) return 'court';
				else if (strlen(trim($mdp)) > 12) return 'long';
			else
			{
				if(!preg_match('#[0-9]{1,}#', $mdp) && !preg_match('#[A-Z]{1,}#', $mdp)) return 'nofigure';
			}
		}
	}

	if(!function_exists('check_mdp_match')){
		function check_mdp_match($mdp,$mdp2){
			if($mdp != $mdp2 && $mdp != '' && $mdp2 != '') return 'differents';
		}
	}

	if(!function_exists('hash_mdp')){
		function hash_mdp($value, $options = array()){
			$cout = isset($options['rounds'])?$options['rounds']:10;
			$hash = password_hash($value,PASSWORD_BCRYPT, array('cost' => $cout ));

			if($hash === false){
				throw new Exception("Error Processing Request", 1);
			}

			return $hash;
		}
	}

	if(!function_exists('verify_hash_mdp')){
		function verify_hash_mdp($value, $hashvalue){
			return password_verify($value, $hashvalue);
		}
	}

	if(!function_exists('check_validate_mail')){
		function check_validate_mail($email){
			if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $email)) return true;
		}
	}

	if(!function_exists('check_validate_date')){
		function check_validate_date($date){
			if($date == '') return 'empty';
			else if(substr_count($date, '/') != 2) return 'format';

			else{
				$DATE = explode('/', $date);
					if(date('Y') - $DATE[2] <= 4) return 'tooyoung';
					else if(date('Y') - $DATE[2] >= 25) return 'tooold';

					else if($DATE[2]%4 == 0){
						$maxdays = Array('31', '29', '31', '30', '31', '30', '31','31', '30', '31', '30', '31');
						if($DATE[0] > $maxdays[$DATE[1]-1]) return 'invalid';
						else return 'ok';
					}
					
					else{
						$maxdays = Array('31', '28', '31', '30', '31', '30', '31','31', '30', '31', '30', '31');
						if($DATE[0] > $maxdays[$DATE[1]-1]) return 'invalid';
						else return 'ok';
					}
			}
		}
	}

	/*
	if(!function_exists('upload_file')){
		function upload_file(){
			$timestamp = time();
			$token = md5('unique_salt' . $timestamp);
			$targetFolder = '/uploads';

			$verifyToken = md5('unique_salt' . $timestamp);

			if(!empty($_FILES) && $token == $verifyToken){
				$tempFile = $_FILES['photo']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
				$fileParts = pathinfo($_FILES['photo']['name']);

				$randomFileName = md5(uniqid(rand())) . '.' . $fileParts['extension'];
				$targetFile = rtrim($targetPath,'/') . '/' . $randomFileName;
				
				if (in_array($fileParts['extension'],$fileTypes)) {
					move_uploaded_file($tempFile,$targetFile);
					return false;
				} else {
					return true;
				}
			}
		}
	}*/

	if(!function_exists('is_already_in_use')){
		function is_already_in_use($field,$value,$table){
			global $bd;
			$req = $bd->prepare("SELECT * FROM $table WHERE $field = ? ");
			$req->execute([$value]);
			$count=$req->rowCount();
			$req->closeCursor();

			return $count;
		}
	}

	if(!function_exists('is_in_use')){
		function is_in_use($field,$field2,$value,$value2,$table){
			global $bd;
			$req = $bd->prepare("SELECT * FROM $table WHERE $field = ? AND $field2 = ? ");
			$req->execute([$value,$value2]);
			$count=$req->rowCount();
			$req->closeCursor();

			return $count;
		}
	}

	if(!function_exists('is_used')){
		function is_used($field,$field2,$field3,$value,$value2,$value3,$table){
			global $bd;
			$req = $bd->prepare("SELECT * FROM $table WHERE $field = ? AND $field2 = ? AND $field3 = ? ");
			$req->execute([$value,$value2,$value3]);
			$count=$req->rowCount();
			$req->closeCursor();

			return $count;
		}
	}


	if(!function_exists('set_flash')){
		function set_flash($message, $type='info'){
			$_SESSION['notification']['message']= $message;
			$_SESSION['notification']['type']= $type;
		}
	}

	if(!function_exists('get_session')){
		function get_session($key){
			return !empty($_SESSION[$key])?e($_SESSION[$key]): null;
		}
	}

	if(!function_exists('redirect')){
		function redirect($page){
			header('Location:'.$page);
			exit();
		}
	}

	if(!function_exists('save_input_data')){
		function save_input_data(){
			foreach ($_POST as $key => $value) {
				if(strpos($key, 'mdp') === false || strpos($key, 'matricule') === false ) {
					$_SESSION['input'][$key]= $value;
				}
			}
		}
	}

	if(!function_exists('get_input')){
		function get_input($key){
			return !empty($_SESSION['input'][$key])?e($_SESSION['input'][$key]): null;
		}
	}

	if(!function_exists('clear_input_data')){
		function clear_input_data(){
			if(isset($_SESSION['input'])){
				$_SESSION['input']= [];
			}
		}
	}

	if(!function_exists('clear_session')){
		function clear_session(){
			foreach($_SESSION as $cle => $element)
			{
				unset($_SESSION[$cle]);
			}
		}
	}

	if(!function_exists('dump_datas')){
		function dump_datas($field,$value,$table){
			global $bd;
			$req = $bd->prepare("SELECT * FROM $table WHERE $field = ? ");
			$req->execute([$value]);
			$data = current($req->fetchAll(PDO::FETCH_OBJ));
			$req->closeCursor();

			return $data;
		}
	}	

	if(!function_exists('dump_all_datas')){
		function dump_all_datas($table){
			global $bd;
			$req = $bd->query("SELECT * FROM $table");
			$data = $req->fetchAll();
			$req->closeCursor();
			return $data;		
		}
	}	
?>