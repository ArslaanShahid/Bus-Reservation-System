<?php
require_once "DbTrait.php";
class Booking
{
    use DbTrait;
    public static function store($data)
    {
        // echo("<pre>");
        // print_r($data);
        // echo ("</pre>");
        // die;
        extract($data);
        $obj_db = self::obj_db();
        $seats = preg_split('/,/', $seat_number);
        // print_r(sizeof($seats));
        // die;
        $dep_time  = date("H:i", strtotime($departure_time));
        $date = ($booking_date." ".$dep_time);
        $query_booking = "INSERT INTO bookings"
            . "(`id`,`date`,`route_id`,`total_fare`,`name`,`contact_no`,`cnic`,`gender`) "
            . " values "
            . " (NULL, '$date', '$route_id', '$total_fare','$name','$contact_no','$cnic','$gender') ";
        $obj_db->query($query_booking);
        if ($obj_db->errno) {
            die($obj_db->error);
        }
        $booking_id = $obj_db->insert_id;
        for ($i = 0; $i < sizeof($seats); $i++) {
            if (!empty($seats[$i])) {
                $query_seat_booking = " INSERT INTO booked_seats "
                    . " (`id`,`seat_no`,`booking_id`) "
                    . " values "
                    . " (NULL,$seats[$i],$booking_id) ";
                $obj_db->query($query_seat_booking);
                if ($obj_db->errno) {
                    die($obj_db->error);
                }
            }
        }

        return $booking_id;
    }

    public static function showBooking()
    {
        $obj_db = self::obj_db();
        $query = " SELECT * FROM bookings ";
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
            . " JOIN routes r ON b.route_id = r.id"
            . " JOIN booked_seats bs ON b.id = bs.booking_id"
            . " WHERE b.id = '$id'";

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
            . " r.fare, r.duration, r.departure_time, r.distance, b.seats, b.bus_no, d.day"
            . " from routes r"
            . " JOIN cities cd ON (cd.id = r.departure)"
            . " JOIN cities ca ON (ca.id = r.arrival)"
            . " JOIN buses b ON b.id = r.bus_id"
            . " JOIN days d ON d.id = r.day"
            . " WHERE r.id = '$id'";

        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }
        $response = [];
        $response['data'] = $result->fetch_object();
        $response['success'] = true;

        return $response;
    }
    public static function dailyBooking(){
        $current = date('Y-m-d');
        $obj_db = self::obj_db();
        $query = " SELECT * FROM bookings " 
        . " JOIN booked_seats ON bookings.id = booked_seats.booking_id "
        . " JOIN routes ON routes.id = bookings.route_id "
        . " WHERE date = '$current' ";
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

    public static function weeklyBooking()
    {
        $obj_db = self::obj_db();
        $monday = strtotime("last monday");
        $monday = date('w', $monday) == date('w') ? $monday + 7 * 86400 : $monday;
        $sunday = strtotime(date("Y-m-d", $monday) . " +6 days");
        $start_date = date("Y-m-d", $monday);
        $end_date = date("Y-m-d", $sunday);
        
        $query = " SELECT * FROM bookings  where date between " 
        ." '$start_date' AND '$end_date' "; 
        $result = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }
        $bookings = [];
        while ($data = $result->fetch_object()) {
            $rows = [];
            $rows['name'] = $data->name;
            $rows['contact_no'] = $data->contact_no;
            $rows['cnic'] = $data->cnic;
            $rows['gender'] = $data->gender;
            $rows['total_fare'] = $data->total_fare;
            $rows['date'] = $data->date;

            $query_seat = "select * from booked_seats bs "
                        ." where booking_id = $data->id";
            $result = $obj_db->query($query_seat);
            $seats = [];
            while($data = $result->fetch_object()) {
                $seat_rows = [];
                $seat_rows['seat_no'] = $data->seat_no;
                $seats[] = $seat_rows;
            }
            $rows['seats'] = $seats;
            $bookings[] = $rows; 
        }
        return $bookings;
    }
    public static function bookingHistory($cnic){
        $obj_db = self::obj_db();
        $query = " SELECT b.cancel_status, b.name , b.gender , b.cnic ,b.contact_no, b.total_fare,  b.date, r.departure_time, cd.name as departure, ca.name as arrival FROM bookings b  "
        ."JOIN routes r ON r.id = b.route_id "
        ."JOIN cities cd ON (cd.id = r.departure) "
        ."JOIN cities ca ON (ca.id = r.arrival) "
        ."WHERE cnic = '$cnic' ";
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

    public static function getTicketInfo($booking_id)
    {
        $obj_db = self::obj_db();
        $query = "SELECT b.name as customer, b.date, r.departure_time, cd.name as departure, ca.name as arrival FROM bookings b "
                ."JOIN routes r ON r.id = b.route_id "
                ."JOIN cities cd ON (cd.id = r.departure) "
                ."JOIN cities ca ON (ca.id = r.arrival) "
                ."WHERE b.id = '$booking_id'";
        
        $booking = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }

        $booking_info = $booking->fetch_object();

        $query = "SELECT seat_no from booked_seats "
                ."WHERE booking_id = '$booking_id'";
    
        $seat = $obj_db->query($query);
        if ($obj_db->errno) {
            throw new Exception("db Select Error" . $obj_db->errno . $obj_db->error);
        }

        $seats = [];
        while ($data = $seat->fetch_object()) {
            $seats[] = $data;
        }

        $ticket = [];
        $ticket['booking'] = $booking_info;
        $ticket['seats'] = $seats;
        
        return $ticket;
    }
}
