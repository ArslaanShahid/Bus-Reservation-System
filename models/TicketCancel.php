<?php
require_once 'DbTrait.php';
Class TicketCancel{
    use DbTrait;
    private $booking_id;
    private $email;
    private $reason;
    private $cnic;
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

    private function setReason($reason)
    {
        $reg = "/\b(((?!=|\,|\.).)+(.)){10,140}\b/";

        if (!preg_match($reg, $reason)) {
            throw new Exception("Incorrect / Missing Field");
        }

        $this->reason = $reason;
    }
    private function getReason()
    {
        return $this->reason;
    }
    private function setBooking_id($booking_id)
    {
        if (empty($booking_id)) {
            throw new Exception("Missing Booking ID");
        }
        $this->booking_id = $booking_id;
    }
    private function getBooking_id()
    {
        return $this->booking_id;
    }
    

    public static function CurrentTicketInfo($cnic){
        $current = date('Y-m-d');
        $obj_db = self::obj_db();
        $query = " SELECT b.id ,b.date , b.name , b.gender , b.cnic ,b.contact_no, b.total_fare,  b.date, b.cancel_status, b.request_status, r.departure_time, cd.name as departure, ca.name as arrival FROM bookings b  "
        ."JOIN routes r ON r.id = b.route_id "
        ."JOIN cities cd ON (cd.id = r.departure) "
        ."JOIN cities ca ON (ca.id = r.arrival) "
        ."WHERE cnic = '$cnic' AND date >= '$current'";
        
        $result = $obj_db->query($query);
        
        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }
        $query = [];
        while ($data = $result->fetch_object()) {
            $query[] = $data;
        }
        return $query;
    }
    public function submitCancelRequest()
    {
        $current = date('Y-m-d');
        $current_time = strtotime(date('h:i a'));
        
        $obj_db = self::obj_db();

        $info = "SELECT b.date, b.id, r.departure_time, r.id from bookings b "
                ."JOIN routes r ON b.id = r.id " 
                ."WHERE b.id='$this->booking_id'";

        $result = $obj_db->query($info);
        $temp = $result->fetch_object();

        // $temp_date = ($current.' '.$temp->departure_time);
        // $departure_time = strtotime($temp_date);
        // print_r($departure_time);
        // die;

        if($current == $temp->date && $current_time >= $temp->departure_time)
        {
            throw new Exception('Ticket Cannot Cancel Time is passed<br> <i>Ticket Can be Cancel Before Departure Time</i>');
        }


        $query = "INSERT into cancel_ticket"
            . "(`id`, `booking_id`, `email`, `reason`) "
            . " values "
            . " (NULL, '$this->booking_id', '$this->email', '$this->reason') " ;

        $obj_db->query($query);

        $query = "UPDATE bookings"
        . " SET request_status = 1"
        . " WHERE id = '$this->booking_id'";

        $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception(" Query Insert Error " . $obj_db->errno . $obj_db->error);
        }
    }

    public static function getAllCancelTicket()
    {
        $obj_db = self::obj_db();
        $query = "SELECT * from cancel_ticket";
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }
        $query = [];
        while ($data = $result->fetch_object()) {
            $query[] = $data;
        }
        return $query;
    }

    public static function getCancelBooking($id)
    {
        $obj_db = self::obj_db();
        $query = "SELECT b.name as customer, b.cnic, b.contact_no, b.gender,b.total_fare, cd.name as departure, ca.name as arrival FROM bookings b "
        . "JOIN routes r ON r.id = b.route_id "
        . "JOIN cities cd ON (cd.id = r.departure) "
        . "JOIN cities ca ON (ca.id = r.arrival) "
        . "WHERE b.id = '$id'";

        $booking = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }
        $booking_info = $booking->fetch_object();
        $response = [];

        $response['booking_info'] = $booking_info;
        $response['success'] = true;

        return $response;
    }

    public static function cancelTicket($booking_id , $id)
    {
        $current = date('Y-m-d');

        $obj_db = self::obj_db();
        $query = "SELECT date, cancel_status from bookings"
                ." WHERE id = '$booking_id'";

        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }

        $data = $result->fetch_object();

        if($data->cancel_status == 1)
        {
            throw new Exception("Booking Already Cancelled");
        }
        
        if($current <= $data->date)
        {
            $query = "UPDATE bookings"
            . " SET cancel_status = 1"
            . " WHERE id = '$booking_id'";
            $result = $obj_db->query($query);
            if ($obj_db->errno) {
                throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
            }

            $query = "UPDATE booked_seats"
            . " SET cancel_status = 1"
                . " WHERE booking_id = '$booking_id'";
            $result = $obj_db->query($query);
            if ($obj_db->errno) {
                throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
            }

            $query = "UPDATE cancel_ticket"
            . " SET pending_status = 0"
                . " WHERE id = '$id'";
            $result = $obj_db->query($query);
            if ($obj_db->errno) {
                throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
            }

        }else{
            throw new Exception("Cannot Cancel Ticket. Date is Passed.");
        }

        return 1;
        
    }
}
