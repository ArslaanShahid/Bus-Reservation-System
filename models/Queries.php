<?php
date_default_timezone_get("Asia/Karachi");
require_once 'DbTrait.php';

class Queries
{
    use DbTrait;
    private $name;
    private $email;
    private $mobile;
    private $msg;

    public function __set($name, $value)
    {
        $method = "set" . $name;
        if (!method_exists($this, $method)) {
            throw new Exception("Set Property $name Doesn't Exist");
        }
        $this->$method($value);
    }
    public function __get($name)
    {
        $method = "get" . $name;
        if (!method_exists($this, $method)) {
            throw new Exception("Set Property $name Doesn't Exist");
        }
        return $this->$method();
    }
    private function set_id($id)
    {
        if (!is_numeric($id) || $id <= 0) {
            throw new Exception("Invalid / Missing Query ID");
        }
        $this->id = $id;
    }
    private function get_id()
    {
        return $this->id;
    }
    private function setName($name)
    {
        $reg = "/([a-zA-Z]+\s?$)/";
        if (!preg_match($reg, $name)) {
            throw new Exception("Name Should be in Capital or Small Letters");
        } 
        $this->name = $name;
    }
    private function getName()
    {
        return $this->name;
    }


    private function setEmail($email)
    {
        $reg = "/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zAZ]\.)+[a-zA-Z]{2,4})$/";
        if (!preg_match($reg, $email)) {
            throw new Exception("Email Format : abc@xyz.com");
        }
        $this->email = $email;
    }
    private function getEmail()
    {
        return $this->email;
    }

    private function setMsg($msg)
    {
        $reg = "/\b(((?!=|\,|\.).)+(.)){10,140}\b/";

        if (!preg_match($reg, $msg)) {
            throw new Exception("Please Enter Your Message.");
        }

        $this->msg = $msg;
    }
    private function getMsg()
    {
        return $this->msg;
    }
    private function setMobile($mobile)
    {
        $reg = "/^\d{11}$/";
        if (!preg_match($reg, $mobile)) {
            throw new Exception("Invalid/ Missing Number");
        }
        $this->mobile = $mobile;
    }
    private function getMobile()
    {
        return $this->mobile;
    }

    public function user_query()
    {
        $obj_db = self::obj_db();
        $query = " INSERT into user_queries "
            . "(`id` , `name` , `email` ,`msg` , `mobile`) "
            . " values "
            . "(NULL , '$this->name' , '$this->email' , '$this->msg' , '$this->mobile') ";

            $obj_db->query($query);

            $username = "923237553458";///Your Username
            $password = "ripazha1@";///Your Password
            $phone = "$this->mobile";///Recepient Mobile Number
            $sender = "SmartBRs";
            $message = "Greetings, Welcome To Smart BRs Complaint Service: $this->name Your Complaint Has Been Registered, Our Team Will Contact You Shortly.";
            ////sending sms
            $url = "https://sendpk.com/api/sms.php?username=".$username."&password=".$password."&mobile=".$phone."&sender=".urlencode($sender)."&message=".urlencode($message)."&format=json";
            $ch = curl_init();
            $timeout = 30; // set to zero for no timeout
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POST, 1);
            //
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $result = curl_exec($ch); 
            /*Print Responce*/
            echo $result; 


        if ($obj_db->errno) {
            throw new Exception("Query Insert Error" . $obj_db->errno . $obj_db->error);
        }
    }
    public static function show_complaint()
    {
        $obj_db = self::obj_db();

        $query = " SELECT * FROM user_queries";
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

    public static function deleteQuery($id)
    {
        $obj_db = self::obj_db();

        $query = " DELETE FROM user_queries"
                ."WHERE id='$id' ";

        $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("db delete Error" . $obj_db->errno . $obj_db->error);
        }
    }
    public static function count_complaint()
    {
        $obj_db = self::obj_db();
        $query = "SELECT * FROM user_queries";
        $result = $obj_db->query($query);
        $count = mysqli_num_rows($result);
        return $count; 
    }
    public static function api_user_query($name, $email, $mobile, $msg)
    {
        $obj_db = self::obj_db();
        $query = " INSERT into user_queries "
            . "(`id` , `name` , `email` ,`msg` , `mobile`) "
            . "values "
            . "(NULL , '$name' , '$email' , '$msg' , '$mobile') ";
        $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("Query Insert Error" . $obj_db->errno . $obj_db->error);
        }
    }
    }

