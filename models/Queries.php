<?php
date_default_timezone_get("Asia/Karachi");
require_once 'DbTrait.php';

Class Queries{
    use DbTrait;
    private $name;
    private $email;
    private $mobile;
    private $msg;
    public function __set($name, $value){
        $method = "set" . $name;
        if(!method_exists($this, $method)){
            throw new Exception("Set Property $name Doesn't Exist");
        }
        $this->$method($value);
    }
    public function __get($name)
    {
        $method = "get" . $name;
        if(!method_exists($this, $method)){
            throw new Exception("Set Property $name Doesn't Exist" );
        }
        return $this->$method();
    }
    private function setName($name){
        $reg = "/^[a-z]+$/i";
        if(!preg_match($reg, $name)){
            throw new Exception("Invalid / Missing User Name");
        }
        $this->user_name = $name;
    }
    private function getName(){
        return $this->name;
    }
    
    
    private function setEmail($email){
        $reg = "/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zAZ]\.)+[a-zA-Z]{2,4})$/";
        if(!preg_match($reg, $email)){
            throw new Exception("Invalid / Missing Email");
        }
        $this->email = $email;
    }
    private function getEmail(){
        return $this->email;
    }
}
?>