<?php
date_default_timezone_get("Asia/Karachi");
require_once 'DbTrait.php';

Class Employee{
    use DbTrait;
    private $id;
    private $name;
    private $address;
    private $type;
    private $date_of_birth;
    private $gender;
    private $mobile_no;
    private $salary;

    public function __set($name, $value)
    {
        $method = "set" . $name;
        if(!method_exists($this,$method)){
            throw new Exception("Set Property $name Doesn't Exist");
        }
        $this->$method($value);
    }
    public function __get($name)
    {
        $method = "get" . $name;
        if(!method_exists($this,$method)){
            throw new Exception("Set Property $name Doesn't Exist");
        }
        return $this->$method();
    }
    private function setEmp_id($id){
        if(!is_numeric($id)|| $id <=0){
            throw new Exception ("Invalid / Missing Employee ID");
        }
        $this->id = $id;
    }
    private function getEmp_id(){
        return $this->id;
    }

    private function setName($name){
        $name = trim($name);
        if($name == "" || is_numeric($name)){
            throw new Exception ("Name in Following Format Be e.g ali ");
        }
        $this->name = ucfirst(strtolower($name));
    }
    private function getName(){
        return $this->name;
    }
    private function setMobile_no($mobile_no){
        $reg = "/^\d{11}$/";
        if(!preg_match($reg, $mobile_no)){
            throw new Exception("Enter No in Following Format e.g 03001231232");
        }
        $this->mobile_no = $mobile_no;
    }
    private function getMobile_no(){
        return $this->mobile_no;
    }
    private function setGender($gender){
        $genders = ['male', 'female'];
        if(!in_array($gender, $genders)){
            throw new Exception("Select Gender");
        }
        $this->gender = $gender;
    }
    private function getGender(){
        return $this->gender;
    }
    private function setDate_of_birth($date_of_birth){
        if(empty($date_of_birth)){
            throw new Exception ("Missing Date of Birth");
        }
        $this->date_of_birth = $date_of_birth;
    }
    private function getDate_of_birth(){
        return $this->date_of_birth;
    }

    private function setAddress($address){
        $address = trim($address);
        if($address == ""){
            throw new Exception("Address is Missing");
        }
        $this->address = $address;
    }
    private function getAddress(){
        return $this->address;
    }
    private function setType($type){
        $type = trim($type);
        if($type == ""){
            throw new Exception ("Job Type is Missing");
        }
        $this->type=$type;
    }
    private function getType(){
        return $this->type;
    }

    private function setSalary($salary){
        $salary = trim($salary);
        if($salary == ""){
            throw new Exception ("Salary is Missing");
        }
        $this->salary=$salary;
    }
    private function getSalary(){
        return $this->salary;
    }
    public function addEmp(){
    $obj_db = self::obj_db();
    $now = date("Y-m-d H:i:s");
    $query = "INSERT into employees "
    ."(`id`,`name`,`gender`, `type` ,`address` , `mobile_no`, `reg_date` , `salary`)"
    . " values "
    . "( NULL , '$this->name' , '$this->gender' , '$this->type' , '$this->address' , '$this->mobile_no' , '$now' , '$this->salary')";
    $obj_db->query($query);
    if($obj_db->errno){
        throw new Exception("Query Insert Error ". $obj_db->errno. $obj_db->error);
    }
    }
    public static function viewEmp(){
        $obj_db=self::obj_db();
        $query= " select * from employees";
        $result = $obj_db->query($query);
        if($obj_db->errno){
            throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
        }
        while ($data = $result->fetch_object()){
            $employees[] = $data;
        }
        return $employees;
    }
    public static function count_employees()
    {
        $obj_db = self::obj_db();
        $query = "SELECT * FROM employees";
        $result = $obj_db->query($query);
        $count = mysqli_num_rows($result);
        return $count; 
}
public static function Driver(){
    $obj_db=self::obj_db();
    $query= " SELECT e.name ,e.type FROM employees e where e.type = 'driver' ";
    $result = $obj_db->query($query);
    if($obj_db->errno){
        throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
    }
    while ($data = $result->fetch_object()){
        $employees[] = $data;
    }
    return $employees;
}
public static function DeleteEmp($id){
    $obj_db = self::obj_db();

    $query = " DELETE FROM Employees "
            ."WHERE id='$id'";

    $obj_db->query($query);

    if ($obj_db->errno) {
        throw new Exception("db delete Error" . $obj_db->errno . $obj_db->error);
    }
}

}
