<?php
date_default_timezone_get("Asia/Karachi");
require_once 'DbTrait.php';
class bus{
    use DbTrait;
    private $bus_id;
    private $bus_no;
    private $air_conditioner;
    private $seats;


    public function __set($name, $value)
    {
        $method= "set" . $name;
        if(!method_exists($this, $method)){
            throw new Exception("set property $name doesn't Exist");
        }
        $this->$method($value);
    }
    public function __get($name)
    {
        $method= "get" . $name;
        if(!method_exists($this, $method)){
            throw new Exception("set Property $name doesn't Exist");
        }
        return $this->$method();
    }
    private function setBus_id($bus_id){
        if(!is_numeric($bus_id) || $bus_id <=0){
            throw new Exception("Invalid / Missing Bus ID");
        }
        $this->bus_id= $bus_id;
    }
    private function getBus_id(){
        return $this->bus_id;
    }
    private function setBus_no($bus_no){
        $reg = "/[A-Z\d]+/";
        if(!preg_match($reg, $bus_no)){
            throw new Exception ("Invalid / Missing Bus No");
        }
        $this->bus_no = $bus_no;
    }
    private function getBus_no(){
       return $this->bus_no;
    }
    private function setAir_conditioner($air_conditioner){
        $air_conditioners= ['1','0'];
        if(!in_array($air_conditioner, $air_conditioners)){
            throw new Exception("Invalid / Missing Field");
        }
        $this->air_conditioner = $air_conditioner;
    }
    private function getAir_conditioner(){
        return $this->air_conditioner;
    }
    private function setSeats($seats){
        if(!is_numeric($seats) || $seats<=0){
            throw new Exception ("Invalid / Enter Correct Seats No");
        }
        $this->seats = $seats;
    }

    private function getSeat(){
        return $this->seats;
    }


    public function addBus(){
        $obj_db = self::obj_db();
       
        $query = "INSERT into buses "
        ." (`id`, `bus_no`, `air_conditioner`, `seats`)"
        . "VALUES"
        . "(NULL , '$this->bus_no' , '$this->air_conditioner' , '$this->seats')";
        $obj_db->query($query);
        if($obj_db->errno == 1062){
            throw new Exception("Bus with "  .$this->bus_no . " Model Already Exist");
        }
        if($obj_db->errno){
            throw new Exception("Query Insert Error ". $obj_db->errno. $obj_db->error);
        }
    }

    public static function allBuses()
    {
    $obj_db = self::obj_db();

    $query = "select * from buses";

    $result = $obj_db->query($query);

    if($obj_db->errno){
        throw new Exception("db Select Error".$obj_db->errno.$obj_db->error);
    }
    if($result->num_rows==0){
        throw new Exception ("Buses Not Found");
    }
    // if($result->air_conditioner==0){
    //     $msg="non-AC";
    //     echo($msg);
    // }
    while ($data = $result->fetch_object()){
        $buses[] = $data;
    }
    return $buses;
    }
    public static function count_bus()
    {
        $obj_db = self::obj_db();
        $query = "SELECT * FROM buses";
        $result = $obj_db->query($query);
        $count = mysqli_num_rows($result);
        return $count; 
}
}

?>