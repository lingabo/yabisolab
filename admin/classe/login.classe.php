<?php
$page ='section';
 class login{

    private $username;
    private $password;

    public function __construct($username,$password){

        $this->username = e($username);
        $this->password = e($password);     
    }

    public function banirIp(){
        $ip = $_SERVER['REMOTE_ADDR'];
        cookie_bannir($ip);
    }

    public function connect(){
        global $bd;
        $req = $bd->prepare("SELECT id,login,password as hashed_password FROM users 
                            WHERE (login = :username OR  email = :username)
                            AND active  = '0'");
        $req->execute([
            'username' => $this->username
        ]);

        $result = $req->fetch(PDO::FETCH_OBJ);
        
        if($result && verify_hash_mdp($this->password,$result->hashed_password)){
            $_SESSION['account'] = $result->id;
            $_SESSION['username'] = $result->login;
            return true;     
        }else{
            return false;
        }
    }
 }

?>