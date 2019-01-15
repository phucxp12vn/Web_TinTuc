<?php 
session_start();          
class Apps_Libs_UserIdentity{
    public $username;
    public $password;
    
    protected $id;
    
    public function __construct($username = "",$password = "") {
        $this->username = $username;
        $this->password = $password;        
    }
    
    public function encryptPassword(){
        return md5($this->password);
    }
    
    public function login() {
        $db = new Apps_Models_Users();
        $query = $db->buildQueryParams([
            "where"=>"email = :username AND password = :password",
            "params"=> [
                ":username"=>trim($this->username),
                ":password"=>trim($this->encryptPassword($this->password))]
        ])->selectOne();
         
        if($query){
            $_SESSION['name'] = $query['name'];

            $_SESSION['id'] = $query['id'];
            return true;
        }
        return false;
    }
    
    public function logout() {
        unset($_SESSION['name']);
        unset($_SESSION['id']);
        
    }
    
    
    public function getSession($key) {                
        if ($key !== null ){
            return isset($_SESSION[$key])? $_SESSION[$key] : null;         
        }
        return $_SESSION;
    }
    
    public function isLogin() {
        if($this->getSession('name')){
            return true;
        }else{
            return FALSE;
        }        
    }
    
    public function getId() {   
        return $this->getSession('name');        
    }
}