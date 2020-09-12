<?php
date_default_timezone_get("Asia/Karachi");
require_once 'DbTrait.php';

class Admin{
    use DbTrait;
private $user_name;
private $email;
private $password;
private $admin_id;
private $loggedin;
private $mobile_no;
private $name;
private $gender;
private $address;


public function __set($name, $value){
    $method = "set" . $name;
    if(!method_exists($this, $method)){
        throw new Exception("Set Property $name does'nt Exist");
    }
    $this->$method($value);
}
public function __get($name)
{
    $method = "get" . $name;
    if(!method_exists($this, $method)){
        throw new Exception("Set Property $name does'nt Exist" );
    }
    return $this->$method();
}
private function setAdmin_id($admin_id){
    if(!is_numeric($admin_id) || $admin_id <=0){
        throw new Exception("Invalid / Missing User ID");
    }
    $this->admin_id = $admin_id;
}
private function getAdmin_id(){
    return $this->admin_id;
}

private function getLoggedin(){
    return $this->loggedin;
}
private function setUser_name($user_name){
    $reg = "/^[a-z]+$/i";
    if(!preg_match($reg, $user_name)){
        throw new Exception("Invalid / Missing User Name");
    }
    $this->user_name = $user_name;
}
private function getUser_name(){
    return $this->user_name;
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

private function setPassword($password){
    $reg = "/^[a-z][a-z0-9]{5,15}$/i";
    if(!preg_match($reg, $password)){
        throw new Exception("Invalid / Missing Password");
    }
    $this->password = sha1($password);
}
private function getPassword(){
    return $this->password;
}
private function setStatus($status){

}

public function login(){
    $obj_db = self::obj_db();
    $query_select=
        " select * from admins "
        . " WHERE user_name = '$this->user_name'";
    $result = $obj_db->query($query_select);
    if($obj_db->errno){
        throw new Exception ("Db Select Error." . $obj_db->errno . $obj_db->error);
    }
    if($result->num_rows==0){
        throw new Exception("Admin Not Found");
    }
    
    $user_data = $result->fetch_object();
    if($user_data->password != $this->password) {
        throw new Exception("Invalid User Name or Password");
    }
    if($user_data->status==0){
        throw new Exception("Your Account is Currently Inactive Contact Admin");
    }
    $this->admin_id = $user_data->id;
    $this->email = $user_data->email;
    $this->password = NULL;
    $this->user_name = $user_data->user_name;
    $this->loggedin = true;
    $str_obj = serialize($this);
    $_SESSION ['obj_admin'] = $str_obj;
}
public function logout(){
    if(isset($_SESSION['obj_admin'])){
        unset($_SESSION['obj_admin']);
    }
}
public function addAdmin(){
    $obj_db = self::obj_db();
    $now = date("Y-m-d H:i:s");
    $query = " INSERT into admins "
    . "(`admin_id` , `user_name`,`email`,`password`,`signup_date`)"
    . "values "
    . "(NULL , '$this->user_name', '$this->email' , '$this->password', '$now')";
    $obj_db->query($query);
    if($obj_db->errno == 1062){
        throw new Exception("User Name "  .$this->user_name  .  " Already Exist");
    }
    if($obj_db->errno){
        throw new Exception("Query Insert Error" . $obj_db->errno. $obj_db->error);
    }
    }
public static function viewAdmin(){
    $obj_db = self::obj_db();
    $query = " select * from admins";
    $result = $obj_db->query($query);
    if($obj_db->errno){
        throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
    }
    while($data = $result->fetch_object()){ 
        $admins[] = $data;
    }
    return $admins;
}
public static function deactivateAccount($id){
    $obj_db = self::obj_db();
    $query = "update admins set status = 0"
            ." where admin_id = $id";
    $result = $obj_db->query($query);
    return $result;
    if($obj_db->errno){
        throw new Exception("Update Error = $obj_db->errno - $obj_db->error");
    }
}
public static function activateAccount($id){
    $obj_db= self::obj_db();
    $query= "update admins set status = 1"
            ." where admin_id = $id" ;
    $result =$obj_db->query($query);
    return $result;
    if($obj_db->errno){
        throw new Exception("Update Error = $obj_db->errno -$obj_db->error");
    }
}
public static function count_admin()
    {
        $obj_db = self::obj_db();
        $query = "SELECT * FROM admins";
        $result = $obj_db->query($query);
        $count = mysqli_num_rows($result);
        return $count; 
}
}
?>
