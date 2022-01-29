<?php 
 	isset($page) && $page === 'section'
      ? require_once '../config/database.php'
      : require_once 'config/database.php';
	

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

	if(!function_exists('n')){
		function n($string){
			if(!(int) $string){
				return true;
			}
		}
	}

	if(!function_exists('confirmation_inscription')){
		function confirmation_inscription($eleve){
			global $bd;
			$req = $bd->prepare("UPDATE inscription SET  confirmation = ? WHERE  id_inscription  = ? ");
			$req->execute(["1",$eleve]);
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
	
	if(!function_exists('generate_login')){
		function generate_login($field1,$field2){
			return e(strtoupper($field1[0]).strtolower($field1)." ".strtoupper($field2[0]).strtolower($field2));
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
					if(date('Y') - $DATE[2] <= 15) return 'tooyoung';
					else if(date('Y') - $DATE[2] >= 80) return 'tooold';

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
?>