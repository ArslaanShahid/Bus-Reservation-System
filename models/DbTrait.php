<?php


trait DbTrait {

    protected static function obj_db(){
        $host = "localhost";
        $user = "root";
        $password = "";
        $database = "smartbrs";

        $obj_db = new mysqli();
        $obj_db->connect($host, $user, $password);

        if($obj_db->connect_errno){
            throw new Exception("Database Connection Error".$obj_db->errno.$obj_db->errno);
        }
        $obj_db->select_db($database);
        if($obj_db->errno){
            throw new Exception("Db not Found". $obj_db->errno.$obj_db->errno);
        }
        return $obj_db;
    }

}