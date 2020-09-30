<?php
require_once 'DbTrait.php';
Class TicketCancel{
    use DbTrait;
    private $booking_id;
    private $account_email;
    private $reason;
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
    private function setEmail($account_email)
    {
        $reg = "/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zAZ]\.)+[a-zA-Z]{2,4})$/";
        if (!preg_match($reg, $account_email)) {
            throw new Exception("Invalid / Missing Email");
        }
        $this->$account_email = $account_email;
    }
    private function getEmail()
    {
        return $this->account_email;
    }

    private function setMsg($reason)
    {
        $reg = "/\b(((?!=|\,|\.).)+(.)){10,140}\b/";

        if (!preg_match($reg, $reason)) {
            throw new Exception("Incorrect / Missing Field");
        }

        $this->reason = $reason;
    }
    private function getMsg()
    {
        return $this->reason;
    }
    

    public static function CurrentTicketInfo($cnic){
        $current = date('Y-m-d');
        $obj_db = self::obj_db();
        $query = " SELECT b.id ,b.date , b.name , b.gender , b.cnic ,b.contact_no, b.total_fare,  b.date, r.departure_time, cd.name as departure, ca.name as arrival FROM bookings b  "
        ."JOIN routes r ON r.id = b.route_id "
        ."JOIN cities cd ON (cd.id = r.departure) "
        ."JOIN cities ca ON (ca.id = r.arrival) "
        ."WHERE cnic = '$cnic' AND date >= '$current' ";
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
    public function SubmitCancelRequest()
    {
        $obj_db = self::obj_db();
        $query = "INSERT into cancel_ticket"
            . "(`id`, `booking_id`, `account_email`,`reason`)"
            . " values "
            . " (NULL, '$this->booking_id', '$this->account_email', '$this->reason')";
        $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception(" Query Insert Error " . $obj_db->errno . $obj_db->error);
        }
    }
}

?>