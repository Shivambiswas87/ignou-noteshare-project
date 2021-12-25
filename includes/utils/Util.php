<?php
namespace utils;

class Util
{

    public static function getToday($showDateWithTime = false){

        if($showDateWithTime){
            return date('Y-m-d H:i:s');
        }
        else{
            return date('Y-m-d');
        }
    }


}