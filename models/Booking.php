<?php
require_once "DbTrait.php";
class Booking {
    use DbTrait;
    public static function store($data) {
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
        $query = " SELECT * " 
        ."FROM bookings b "  
        ."JOIN booked_seats s "
        ."WHERE b.id = s.booking_id" ;
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
}


?>