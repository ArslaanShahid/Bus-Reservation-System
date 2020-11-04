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
            throw new Exception("set property $name doesn't Exist");
        }
        $this->$method($value);
    }
    public function __get($name)
    {
        $method = "get" . $name;
        if (!method_exists($this, $method)) {
            throw new Exception("set property $name doesn't Exist");
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

        //Checking if arrival and departure cities are same.
        if ($this->departure == $this->arrival) {
            throw new Exception("Departure and Arrival Cities Cant be Same");
        }

        //Checking If bus has added for any route or not.
        $query = "SELECT * from routes "
        . "WHERE bus_id = '$this->bus_id'";
        $result = $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }
        if (!$result->num_rows == 0) {
            throw new Exception("Route Already Added for this bus.");
        }
        
        //Same Route timing Checking
        $query = "SELECT * from routes "
                ."WHERE bus_id = '$this->bus_id' AND departure='$this->departure' AND arrival = '$this->arrival' AND departure_time='$this->departure_time'";
        $result = $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }
        if (!$result->num_rows == 0) {
            throw new Exception("Same Route of Timing (" .$this->departure_time. ") already Exist Under this Bus.");
        }

        $result = $this->days;
        foreach ($result as $day) {
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
    public static function viewRoute()
    {
        $obj_db = self::obj_db();
        $query = " select r.id, r.fare, r.duration, r.departure_time, r.distance, d.day as day, b.bus_no as bus, cd.name as departure, ca.name as arrival from routes r "
            . "JOIN cities cd ON (cd.id = r.departure) "
            . "JOIN cities ca ON  (ca.id = r.arrival) "
            . "JOIN days d ON (r.day = d.id) "
            . "JOIN buses b ON (r.bus_id = b.id)";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
        }

        while ($data = $result->fetch_object()) {
            $routes[] = $data;
        }
        // echo('<pre>');
        // print_r($routes);
        // echo('</pre>');
        // die;
        return $routes;
    }
    public static function deleteRoute($id){
        $obj_db = self::obj_db();

        $query = " DELETE FROM routes "
                ."WHERE id='$id'";

        $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("db delete Error" . $obj_db->errno . $obj_db->error);
        }
    }

    public static function search($from, $to, $date)
    {
        $obj_db = self::obj_db();
        $res = strtotime($date);
        // print_r($res);
        // die;
        $day = strtolower(date('l', $res));
        // if ($from == $to) {
        //     throw new Exception("Departure and Arrival Cities Cant be Same");
        // }

        $query = " SELECT r.id, r.fare, r.duration, r.departure_time, r.distance, d.day as day, b.bus_no as bus, b.seats, b.air_conditioner, cd.name as departure, cd.id as departure_id, ca.name as arrival, ca.id as arrival_id from routes r "
            . "JOIN cities cd ON (cd.id = r.departure) "
            . "JOIN cities ca ON  (ca.id = r.arrival) "
            . "JOIN days d ON (r.day = d.id) "
            . "JOIN buses b ON (r.bus_id = b.id) "
            . "WHERE r.departure ='$from' AND r.arrival ='$to' AND d.day = '$day'";

        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
        }
        // print_r($result);
        // die;
        while ($data = $result->fetch_object()) {
            $routes[] = $data;
        }

        // echo ('<pre>');
        // print_r($routes);
        // echo ('</pre>');
        // die;
        $data = [
            'routes' => $routes,
            'date' => $date,
        ];
        return $data;
    }

    public static function routeInfo($id,$date)
    {
        $obj_db = self::obj_db();

        $query = "SELECT r.id, cd.name as departure, ca.name as arrival,"
                        ." r.fare, r.duration, r.departure_time, r.distance, b.seats" 
                        ." from routes r "
                        ." JOIN cities cd ON (cd.id = r.departure) "
                        ." JOIN cities ca ON (ca.id = r.arrival) "
                        ." JOIN buses b ON b.id = r.bus_id "
                        ." WHERE r.id = '$id'";

        // $query = " SELECT r.id, r.fare, r.duration, r.departure_time, r.distance, d.day as day, b.bus_no as bus, b.seats, b.air_conditioner, cd.name as departure, cd.id as departure_id, ca.name as arrival, ca.id as arrival_id from routes r "
        //     . "JOIN cities cd ON (cd.id = r.departure) "
        //     . "JOIN cities ca ON  (ca.id = r.arrival) "
        //     . "JOIN days d ON (r.day = d.id) "
        //     . "JOIN buses b ON (r.bus_id = b.id) "
        //     . "WHERE r.id ='$id'";

        $result_route = $obj_db->query($query);

        $route = $result_route->fetch_object();
        
        //making seats 
        $seat_data = [];
        $seats = $route->seats;

        for($i = 1; $i <= $seats; $i++) {
            $rows = [];
            $rows['seat_no'] = $i;
            $rows['status'] = 0;
            $seat_data[] = $rows;
        }

        if ($obj_db->errno) {
            throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
        }
        //getting route bookings
        $query_booking = "select * from bookings b "
                        ." where route_id = $id AND date = '$date'";
        $result_booking = $obj_db->query($query_booking);

        if($obj_db->errno) {
            die($obj_db->error);
        }

        while($data = $result_booking->fetch_object()) {
            //getting booked seats from storage
            $query_seats = "select * from booked_seats bs "
                            ." where booking_id = $data->id AND cancel_status = 0";
            $result_seats = $obj_db->query($query_seats);

            if($obj_db->errno) {
                die($obj_db->error);
            }

            while($data = $result_seats->fetch_object()) {
                $index = self::checkSeat($seat_data,$data->seat_no);
                if($index > -1) {
                    $seat_data[$index]['status'] = 1;
                }
            }
            
        }

        $response = [
            'route_data'=>$route,
            'seats'=>$seat_data,
        ];

        return $response;
    }
    public static function count_routes()
    {
        $obj_db = self::obj_db();
        $query = "SELECT * FROM routes";
        $result = $obj_db->query($query);
        $count = mysqli_num_rows($result);
        return $count; 
    }

    //check seat exist in array
    public static function checkSeat($seats,$seat_no) {
        foreach($seats as $field=>$data) {
            // die('field'.$field);
            // print_r($data);
            // die;
            if($data['seat_no'] == $seat_no) {
                return $field; 
            }
        }
        return -1;
    }

    public static function testRoute($id)
    {
        $obj_db = self::obj_db();
        $query = "SELECT r.id, cd.name as departure, ca.name as arrival,"
        ." r.fare, r.duration, r.departure_time, r.distance, b.seats" 
        ." from routes r "
        ." JOIN cities cd ON (cd.id = r.departure) "
        ." JOIN cities ca ON (ca.id = r.arrival) "
        ." JOIN buses b ON b.id = r.bus_id "
        ." WHERE r.id = '$id'"; 
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
        }
        $data = $result->fetch_object();
        // print_r($result);
        // die;
        // while ($data = $result->fetch_object()) {
        //     $routes[] = $data;
        // }
        // echo('<pre>');
        // print_r($routes);
        // echo('</pre>');
        // die;
        return $data;
    }
    public static function DailyRoute()
    {
        $currentDay = date('w');
        $obj_db = self::obj_db();
        $query = " SELECT r.id, r.fare, d.id, r.duration, r.departure_time as time, r.distance, d.day as day, b.bus_no as bus, cd.name as departure, ca.name as arrival from routes r "
            . "JOIN cities cd ON (cd.id = r.departure) "
            . "JOIN cities ca ON  (ca.id = r.arrival) "
            . "JOIN days d ON (r.day = d.id) "
            . "JOIN buses b ON (r.bus_id = b.id)"
            . "WHERE d.id = '$currentDay'" ; 
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
        }
        while ($data = $result->fetch_object()) {
            $routes[] = $data;
        }
        // echo('<pre>');
        // print_r($routes);
        // echo('</pre>');
        // die;
        return $routes;
    }
    public static function WeeklyRoute()
    {
        $obj_db = self::obj_db();
        $query = " SELECT r.id, r.fare, d.id, r.duration, r.departure_time as time, r.distance, d.day as day, b.bus_no as bus, cd.name as departure, ca.name as arrival from routes r "
            . "JOIN cities cd ON (cd.id = r.departure) "
            . "JOIN cities ca ON  (ca.id = r.arrival) "
            . "JOIN days d ON (r.day = d.id) "
            . "JOIN buses b ON (r.bus_id = b.id)";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
        }
        // print_r($result);
        // die;
        while ($data = $result->fetch_object()) {
            $routes[] = $data;
        }
        // echo('<pre>');
        // print_r($routes);
        // echo('</pre>');
        // die;
        return $routes;
    }

    public static function dayRouteAPI($date)
    {
        $obj_db = self::obj_db();
        $res = strtotime($date);
        // print_r($res);
        // die;
        $day = strtolower(date('l', $res));
        // print_r($day);
        // die;
        $query = " SELECT r.id, r.fare, r.duration, r.departure_time, r.distance, d.day as day, b.bus_no as bus, b.seats, b.air_conditioner, cd.name as departure, cd.id as departure_id, ca.name as arrival, ca.id as arrival_id from routes r "
            . "JOIN cities cd ON (cd.id = r.departure) "
            . "JOIN cities ca ON  (ca.id = r.arrival) "
            . "JOIN days d ON (r.day = d.id) "
            . "JOIN buses b ON (r.bus_id = b.id) "
            . "WHERE d.day = '$day'";

        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("Select Error - $obj_db->errno - $obj_db->error");
        }
        $routes = [];
        while ($data = $result->fetch_object()) {
            $routes[] = $data;
        }
        return $routes;
    }

    public static function checkRouteBus($id)
    {
        $obj_db = self::obj_db();
        //Checking If bus has added for any route or not.
        $query = "SELECT * from routes "
        . "WHERE bus_id = '$id'";
        $result = $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }
        
        if (!$result->num_rows == 0) {
            $response = false;
        }else{
            $response = true;
        }

        return $response;
    }
}
