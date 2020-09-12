<?php
date_default_timezone_set("Asia/Karachi");
require_once 'DbTrait.php';
class User
{
    use DbTrait;
    private $user_name;
    private $email;
    private $password;
    private $user_id;
    private $loggedin;


    private $gender;
    private $mobile_no;
    private $first_name;
    private $last_name;
    private $date_of_birth;
    private $city_id;
    private $state_id;
    private $city;


    public function __set($name, $value)
    {
        $method = "set" . $name;
        if (!method_exists($this, $method)) {
            throw new Exception("set property $name does'nt Exist");
        }
        $this->$method($value);
    }
    public function __get($name)
    {
        $method = "get" . $name;
        if (!method_exists($this, $method)) {
            throw new Exception("set property $name does'nt Exist");
        }
        return $this->$method();
    }
    private function setUser_id($user_id)
    {
        if (!is_numeric($user_id) || $user_id <= 0) {
            throw new Exception("invalid / Missing User ID");
        }
        $this->user_id = $user_id;
    }
    private function getUser_id()
    {
        return $this->user_id;
    }
    private function getLoggedin()
    {
        return $this->loggedin;
    }
    private function setUser_name($user_name)
    {
        $reg = "/^[a-z]+$/i";
        if (!preg_match($reg, $user_name)) {
            throw new Exception("Invalid / Missing User Name");
        }
        $this->user_name = $user_name;
    }
    private function getUser_name()
    {
        return $this->user_name;
    }
    private function setEmail($email)
    {
        $reg = "/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zAZ]\.)+[a-zA-Z]{2,4})$/";
        if (!preg_match($reg, $email)) {
            throw new Exception("Invalid / Missing Email");
        }
        $this->email = $email;
    }
    private function getEmail()
    {
        return $this->email;
    }
    private function setPassword($password)
    {
        $reg = "/^[a-z][a-z0-9]{5,15}$/i";
        if (!preg_match($reg, $password)) {
            throw new Exception("Invalid/ Missing Password");
        }
        $this->password = sha1($password);
    }
    private function getPassword()
    {
        return $this->password;
    }
    private function setFirst_name($first_name)
    {
        $first_name = trim($first_name);
        if ($first_name == "" || is_numeric($first_name)) {
            throw new Exception("Invalid / Missing First Name");
        }
        $this->first_name = ucfirst(strtolower($first_name));
    }
    private function getFirst_name()
    {
        return $this->first_name;
    }
    private function setLast_name($last_name)
    {
        $last_name = trim($last_name);
        if (empty($last_name) || is_numeric($last_name)) {
            throw new Exception("Invalid / Missing Last Name");
        }
        $this->last_name = ucfirst(strtolower($last_name));
    }
    private function getLast_name()
    {
        return $this->last_name;
    }
    private function setMobile_no($mobile_no)
    {
        $reg = "/^\+\d{2}\-\d{3}\-\d{7}$/";
        if (!preg_match($reg, $mobile_no)) {
            throw new Exception("Invalid/ Missing Number");
        }
        $this->mobile_no = $mobile_no;
    }
    private function getMobile_no()
    {
        return $this->mobile_no;
    }
    private function setGender($gender)
    {
        $genders = ['male', 'female'];
        if (!in_array($gender, $genders)) {
            throw new Exception("Invalid / Missing Gender");
        }
        $this->gender = $gender;
    }
    private function getGender()
    {
        return $this->gender;
    }
    private function setDate_of_birth($date_of_birth)
    {
        if (empty($date_of_birth)) {
            throw new Exception("Missing Date of Birth");
        }
        $this->date_of_birth = $date_of_birth;
    }
    private function getDate_of_birth()
    {
        return $this->date_of_birth;
    }

    private function setState_id($state_id)
    {
        if (!is_numeric($state_id) || empty($state_id)) {
            throw new Exception("Invalid / Missing State Name");
        }
        $this->state_id = $state_id;
    }

    private function getState_name()
    {
        $obj_db = self::obj_db();
        $query = " select name "
            . " from states "
            . " where id = '$this->state_id'";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Select Error." . $obj_db->errno . $obj_db->errno);
        }
        if ($result->num_rows == 0) {
            $name = "N/A";
        }else{
            $name = $result->fetch_object()->name;
        }
        return $name;
    }
    private function getState_id()
    {
        return $this->state_id;
    }

    private function getCity_name()
    {
        $obj_db = self::obj_db();
        $query = "select name "
            . " from cities "
            . " where id = '$this->city_id' ";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Select Error" . $obj_db->errno . $obj_db->error);
        }
        if ($result->num_rows == 0) {
            $name = "N/A";
        }else{
            $name = $result->fetch_object()->name;
        }
        return $name;
    }
    private function setCity_id($city_id)
    {
        if (!is_numeric($city_id) || empty($city_id)) {
            throw new Exception("Invalid / Missing City Name");
        }
        $this->city_id = $city_id;
    }
    private function getCity_id()
    {
        return $this->city_id;
    }
    public function password_validate($password)
    {
        $reg = "/^[a-z][a-z0-9]{5,15}$/i";
        if (!preg_match($reg, $password)) {
            throw new Exception("Invalid / Missing Password ");
        }
    }
    public function confirm_password($new_password, $confirm_password)
    {
        if ($new_password != $confirm_password) {
            throw new Exception("Not Matching");
        }
    }

    public function signup()
    {
        $obj_db = self::obj_db();
        $now = date("Y-m-d H:i:s");
        $query = "INSERT into users"
            . "(`id`, `user_name`, `email`,`password`, `signup_date`)"
            . " values "
            . " (NULL, '$this->user_name', '$this->email', '$this->password','$now')";
        $obj_db->query($query);
        if ($obj_db->errno == 1062) {
            throw new Exception("User Name" . $this->user_name . "Already Exist");
        }
        if ($obj_db->errno) {
            throw new Exception("Query Insert Error" . $obj_db->errno . $obj_db->error);
        }
        $user_id = $obj_db->insert_id;
        $query_profile = "INSERT into user_profiles"
            . "(`id`,`user_id`)"
            . "values "
            . "(NULL,$user_id)";
        $obj_db->query($query_profile);
        if ($obj_db->errno) {
            throw new Exception("Profile Insert Error" . $obj_db->errno . $obj_db->error);
        }
    }
    public function login()
    {
        $obj_db = $this->obj_db();
        $query_select =
            " SELECT * From users "
            . " WHERE user_name = '$this->user_name'";
        $result = $obj_db->query($query_select);
        if ($obj_db->errno) {
            throw new Exception("Db Select Error" . $obj_db->errno . $obj_db->error);
        }
        if ($result->num_rows == 0) {
            throw new Exception("User Not Found");
        }
        $user_data = $result->fetch_object();
        if ($user_data->password != $this->password) {
            throw new Exception("Invalid User Name or Password");
        }
        $this->user_id = $user_data->id;
        $this->email = $user_data->email;
        $this->password = NULL;
        $this->user_name = $user_data->user_name;
        $this->loggedin = true;
        $str_obj = serialize($this);
        $_SESSION['obj_user'] = $str_obj;
    }
    public function logout()
    {
        if (isset($_SESSION['obj_user'])) {
            unset($_SESSION['obj_user']);
        }
    }
    public function profile()
    {
        $obj_db = self::obj_db();
        $query = " SELECT * from users u "
            . " JOIN user_profiles up on up.user_id = u.id "
            . " where u.id = $this->user_id " ;
        $result = $obj_db->query($query);
        if ($obj_db->errno){
        throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
        }
        $user_data = $result->fetch_object();
        // echo("<pre>");
        //    print_r($user_data);
        //    echo("</pre>");
        //    die;
        $this->first_name = $user_data->first_name;
        $this->last_name = $user_data->last_name;
        $this->gender = $user_data->gender;
        $this->mobile_no = $user_data->mobile_no;
        $this->date_of_birth = $user_data->date_of_birth;
        $this->state_id = $user_data->state_id;
        $this->city_id = $user_data->city_id;
    }
    public function update()
    {
        $obj_db = self::obj_db();
        $query = "update user_profiles set "
            . " first_name = '$this->first_name', last_name = '$this->last_name', "
            . " mobile_no =  '$this->mobile_no' , gender = '$this->gender', state_id = '$this->state_id', "
            . " city_id = '$this->city_id' "
            . " where user_id = $this->user_id ";
        $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Update Error" . $obj_db->errno . $obj_db->error);
        }
    }
    public function update_password($old_password, $new_password)
    {
        $obj_db = self::obj_db();
        $query = "select password from users "
            . " where id = $this->user_id ";
        $result = $obj_db->query($query);
        if ($result->num_rows == 0) {
            throw new Exception("Invalid Old Password");
        }
        $new_password = sha1($new_password);
        $query_update = "update users set  "
            . " password = '$new_password' "
            . " where id = $this->user_id ";
        $obj_db->query($query_update);
        if ($obj_db->error) {
            throw new Exception("db Update Error -" . $obj_db->errno . $obj_db->error);
        }
        unset($old_password);
        unset($new_password);
    }
    public static function registered_user(){
        $obj_db=self::obj_db();
        $query= " select * from users ";
        $result = $obj_db->query($query);
        if($obj_db->errno){
            throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
        }
        while ($data = $result->fetch_object()){
            $users[] = $data;
        }
        return $users;
    }
    public static function deactivateAccount($id){
        $obj_db = self::obj_db();
        $query = "update users set status = 0"
                ." where id = $id";
        $result = $obj_db->query($query);
        return $result;
        if($obj_db->errno){
            throw new Exception("Update Error = $obj_db->errno - $obj_db->error");
        }
    }
    public static function activateAccount($id){
        $obj_db= self::obj_db();
        $query= "update users set status = 1"
                ." where id = $id" ;
        $result =$obj_db->query($query);
        return $result;
        if($obj_db->errno){
            throw new Exception("Update Error = $obj_db->errno -$obj_db->error");
        }
    }
    public static function count_use_reg()
    {
        $obj_db = self::obj_db();
        $query = "SELECT * FROM user_queries";
        $result = $obj_db->query($query);
        $count = mysqli_num_rows($result);
        return $count; 
}
}
