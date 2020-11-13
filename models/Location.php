<?php
require_once 'DbTrait.php';
class Location{
    use DbTrait;

    public static function states(){
        $obj_db = self::obj_db();
        $query= "Select * from states "
                ." where country_id = 174 "
                ." ORDER BY name ASC " ;
        $result = $obj_db->query($query);
        if($obj_db->errno){
            throw new Exception("Db Select Error - $obj_db->errno - $obj_db->error");
        }
        if($result->num_rows == 0){
            throw new Exception("States Not Found");
        }
        $states = [];
        while ($data = $result->fetch_object()){
            $states[] = $data;
        }
        return $states;
    }
public static function cities ($state_id){
    $obj_db = self::obj_db();
    $query = "select * from cities "
            ." where state_id = $state_id " 
            ." ORDER BY name ASC ";
    $result = $obj_db->query($query);
    if($obj_db->errno){
        throw new Exception("db Select Error".$obj_db->errno.$obj_db->error);
    }
    if($result->num_rows==0){
        throw new Exception ("Cities Not Found");
    }
    while ($data = $result->fetch_object()){
        $cities[] = $data;
    }
    return $cities;
}

public static function allCities (){
    $obj_db = self::obj_db();
    $query = "select * from cities"
            ." where country_id = 174";
    $result = $obj_db->query($query);
    if($obj_db->errno){
        throw new Exception("db Select Error".$obj_db->errno.$obj_db->error);
    }
    if($result->num_rows==0){
        throw new Exception ("Cities Not Found");
    }
    while ($data = $result->fetch_object()){
        $cities[] = $data;
    }
    return $cities;
}
public static function MyCity ($city_id){
    $obj_db = self::obj_db();
    $query = "select name from cities"
            ." where country_id = 174 AND id='$city_id' ";
    $result = $obj_db->query($query);
    if($obj_db->errno){
        throw new Exception("db Select Error".$obj_db->errno.$obj_db->error);
    }
    if($result->num_rows==0){
        throw new Exception ("Cities Not Found");
    }
    while ($data = $result->fetch_object()){
        $cities[] = $data;
    }
    return $cities;
}
}
