<?php
date_default_timezone_get("Asia/Karachi");
require_once 'DbTrait.php';

class Route
{
    use DbTrait;
    private $bus_id;
    private $route_id;
    private $departure;
    private $arrival;
    private $fare;
    private $duration;
    private $departure_time;
    private $distance;
    private $days = [];


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
    private function setRoute_id($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            throw new Exception("invalid / Missing User ID");
        }
        $this->route_id = $id;
    }
    private function getRoute_id()
    {
        return $this->id;
    }

    private function setBus_id($bus_id)
    {
        if (!is_numeric($bus_id) || $bus_id <= 0) {
            throw new Exception("Missing Bus");
        }
        $this->bus_id = $bus_id;
    }
    private function getBus_id()
    {
        return $this->bus_id;
    }

    private function setDeparture($departure)
    {
        if (!is_numeric($departure) || $departure <= 0) {
            throw new Exception("Missing Departure City Name");
        }
        $this->departure = $departure;
    }

    private function getDeparture()
    {
        return $this->departure;
    }

    private function setArrival($arrival)
    {
        if (!is_numeric($arrival) || $arrival <= 0) {
            throw new Exception("Missing Arrival City Name");
        }
        $this->arrival = $arrival;
    }

    private function getArrival()
    {
        return $this->arrival;
    }

    private function setFare($fare)
    {
        if (!is_numeric($fare) || $fare <= 0) {
            throw new Exception("Invalid / Missing Fare");
        }
        $this->fare = $fare;
    }
    private function getFare()
    {
        return $this->fare;
    }

    private function setDuration($duration)
    {
        $reg = "/([0-9]{1,3}):([0-9]{2})$/i";
        if (!preg_match($reg, $duration)) {
            throw new Exception("Invalid / Missing Duration");
        }
        $this->duration = $duration;
    }
    private function getDuration()
    {
        return $this->duration;
    }

    private function setDistance($distance)
    {
        if (!is_numeric($distance) || $distance <= 0) {
            throw new Exception("Invalid / Missing Distance");
        }
        $this->distance = $distance;
    }

    private function getDistance()
    {
        return $this->distance;
    }

    private function setDeparture_time($departure_time)
    {
        $time = strtotime($departure_time);
        $main_time = date('h:i a', $time);

        if (!is_numeric($time) || $time <= 0 || !$time) {
            throw new Exception("Invalid / Missing Departure Time");
        }

        $this->departure_time = $main_time;
    }

    private function getDeparture_time()
    {
        return $this->departure_time;
    }

    private function setDays($days)
    {
        if (!$days) {
            throw new Exception('Missing Days');
        }

        foreach ($days as $day) {
            if (!is_numeric($day) || $day <= 0 || '') {
                throw new Exception("Invalid Day");
            }
        }
        $this->days = $days;
    }

    private function getDays()
    {
        return $this->days;
    }

    public function addRoute()
    {
        $obj_db = self::obj_db();

        if($this->departure == $this->arrival)
        {
            throw new Exception("Departure and Arrival Cities Cant be Same");
        }

        $result = $this->days;
        foreach($result as $day)
        {
            $query = " INSERT into routes"
            . " (`id` , `departure`,`arrival`,`fare`,`duration` , `distance` , `departure_time` , `day` , `bus_id`)"
            . " values"
            . " (NULL , '$this->departure', '$this->arrival' , '$this->fare', '$this->duration', '$this->distance', '$this->departure_time', '$day', '$this->bus_id')";
            
        $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("Query Insert Error" . $obj_db->errno . $obj_db->error);
        }
        }
    }

    public static function allDays()
    {
        $obj_db = self::obj_db();
        $query = "select * from days";
        $result = $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }
        if ($result->num_rows == 0) {
            throw new Exception("Days Not Found");
        }
        while ($data = $result->fetch_object()) {
            $days[] = $data;
        }
        return $days;
    }
    public static function viewRoute(){
        $obj_db=self::obj_db();
        $query= " select * from routes";
        $result = $obj_db->query($query);
        if($obj_db->errno){
            throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
        }
        while ($data = $result->fetch_object()){
            $routes[] = $data;
        }
        return $routes;
    }
}
