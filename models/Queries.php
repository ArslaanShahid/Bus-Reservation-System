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
            throw new Exception("Invalid / Missing Name");
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
            throw new Exception("Invalid / Missing Email");
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
            throw new Exception("Incorrect / Missing Field");
        }

        $this->msg = $msg;
    }
    private function getMsg()
    {
        return $this->msg;
    }
    private function setMobile($mobile)
    {
        $reg = "/^\+\d{2}\-\d{3}\-\d{7}$/";
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
            . "values "
            . "(NULL , '$this->name' , '$this->email' , '$this->msg' , '$this->mobile') ";
        $obj_db->query($query);

        if ($obj_db->errno) {
            throw new Exception("Query Insert Error" . $obj_db->errno . $obj_db->error);
        }
    }
    public static function show_complaint()
    {
        $obj_db = self::obj_db();

        $query = " SELECT * FROM user_queries ";

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

        $query = " DELETE FROM user_queries "
                ."WHERE id='$id'";

        $result = $obj_db->query($query);

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
    }

