<?php
 $page ='section';
 class user{

    private $nom;
    private $prenom;
    private $sexe;
    private $adresse;
    private $datnaiss;
    private $profession;
    private $bio;
    private $phone;
    private $email;
    private $login;
    private $mdp;
    private $mdpconf;
    

    public function __construct($nom,$prenom,$sexe,$adresse,$datnaiss,$profession,$bio,$phone,$email,$mdp,$mdpconf){

        $this->nom = e($nom);
        $this->prenom = e($prenom);
        $this->sexe = e($sexe);
        $this->adresse = e($adresse);
        $this->datnaiss = e($datnaiss);
        $this->profession = e($profession);
        $this->bio = e($bio);
        $this->phone = e($phone);
        $this->email = e($email);
        $this->mdp = e($mdp);
        $this->mdpconf = e($mdpconf);
    }

    public function checkTextLong(){
        if(check_validate_fields([$this->nom,$this->prenom,$this->adresse])){
            return true;
        }else{
            return false;
        }
    }

    public function checkEmailValidation(){
        if (check_validate_mail($this->email)){
            return true;
        }else{
            return false;
        }
    }

    public function checkDateValidation(){
        $birthdate = check_validate_date($this->datnaiss);

        if($birthdate == 'format'){
            return "Date de naissance au mauvais format";
        }else if($birthdate == 'tooyoung'){
            return "Vous êtes trop jeune pour vous inscrire ici";
        }else if($birthdate == 'tooold'){
            return "Vous êtes trop vieux pour vous inscrire ici";
        }else if($birthdate == 'invalid'){
            return "Le ".htmlspecialchars($this->datnaiss, ENT_QUOTES)." n'existe pas" ;
        }else{
            return "ok";
        }
    }

    public function checkLoginExist(){
        $logon = generate_login($this->prenom,$this->nom);
        if(is_already_in_use('login',$logon,'users')){
            return "non";
        }else{
            return  $this->login = $logon;
        }
    }

    public function checkMailExist(){
        if(is_already_in_use('email',$this->email,'users')){
            return true;
        }else{
            return  false;
        }
    }

     public function checkPhoneExist(){
        if(is_already_in_use('telephone',$this->phone,'users')){
            return true;
        }else{
            return  false;
        }
    }

    public function checkPassword(){
        $passcheck = check_mdp($this->mdp);
        $passmatch = check_mdp_match($this->mdp,$this->mdpconf);

        if($passcheck == 'court'){
            return "Mot de passe trop court! (mimimum 8 caractères)";
        }else if($passcheck == 'long'){
            return "Mot de passe trop long! (maximum 12 caractères)";
        }else if($passcheck == 'nofigure'){
            return "Mot de passe au mauvais format";
        }else if($passmatch == 'differents'){
            return "Les deux mots de passe ne concordent pas";
        }else{
            return "ok";
        }
    }

    public function enregistrement($log,$dest){
        global $bd;
        $req = $bd->prepare('INSERT INTO users(nom,prenom,genre,adresse,date_naissance,avatar,telephone,email,login,password,active,created_date,profession,bio) VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW(),?,?)');
        $req->execute([
            $this->nom,
            $this->prenom,
            $this->sexe,
            $this->adresse,
            $this->datnaiss,
            $dest,
            $this->phone,
            $this->email,
            $log,
            hash_mdp($this->mdp),
            '0', 
            $this->profession,
            $this->bio  
        ]);
        return 1;
    }
 }

?>