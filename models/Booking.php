<?php
require_once "DbTrait.php";
class Booking {
    use DbTrait;
    public static function store($data) {
        // echo("<pre>");
        // print_r($data);
        // echo ("</pre>");
        // die;
        extract($data);
        $obj_db = self::obj_db();
        $seats = preg_split('/,/',$seat_number);
        // print_r(sizeof($seats));
        // die;
        $query_booking = "INSERT INTO bookings "
                        ."(`id`,`date`,`route_id`,`total_fare`,`name`,`contact_no`,`cnic`,`gender`) "
                        ." values "
                        ." (NULL,'{$booking_date}','{$route_id}',{$total_fare},'{$name}','{$contact_no}','{$cnic}','{$gender}')";
        $obj_db->query($query_booking);
        if($obj_db->errno) {
            die($obj_db->error);
        }
        $booking_id = $obj_db->insert_id;

        for($i = 0;$i<sizeof($seats);$i++) {
            if(!empty($seats[$i])) {
                $query_seat_booking = " INSERT INTO booked_seats "
                                    ." (`id`,`seat_no`,`booking_id`) "
                                    ." values "
                                    ." (NULL,$seats[$i],$booking_id) ";
                $obj_db->query($query_seat_booking);
                if($obj_db->errno) {
                    die($obj_db->error);
                }
            }
        }
        
    }

    public static function showBooking(){
        $obj_db = self::obj_db();
        $query = " SELECT * FROM bookings";
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

    public static function getSeats($id)
    {
        $obj_db = self::obj_db();
        $query = " SELECT b.name, b.id, b.route_id, r.fare, bs.seat_no, bs.booking_id FROM bookings b"
                ." JOIN routes r ON b.route_id = r.id"
                ." JOIN booked_seats bs ON b.id = bs.booking_id"
                ." WHERE b.id = '$id'";

        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }
        $query = [];
        
        while ($data = $result->fetch_object()) {
            $query[] = $data;
        }
        $response = [];

        $response['data'] = $query;
        $response['success'] = true;
        // echo ("<pre>");
        // print_r($query);
        // echo ("</pre>");
        // die;
        return $response;
    }

    public static function getRoute($id)
    {
        $obj_db = self::obj_db();
         $query = "SELECT r.id, cd.name as departure, ca.name as arrival,"
                        ." r.fare, r.duration, r.departure_time, r.distance, b.seats, b.bus_no, d.day" 
                        ." from routes r"
                        ." JOIN cities cd ON (cd.id = r.departure)"
                        ." JOIN cities ca ON (ca.id = r.arrival)"
                        ." JOIN buses b ON b.id = r.bus_id"
                        ." JOIN days d ON d.id = r.day"
                        ." WHERE r.id = '$id'";

        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }
        $response = [];
        $response['data'] = $result->fetch_object();
        $response['success'] = true;

        return $response;
    }
}


?>