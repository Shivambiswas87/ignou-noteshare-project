<?php
namespace services;

class Note
{

    private static $_instance = null;
    static function getInstance(){
        if(empty(self::$_instance))
            self::$_instance = new self();

        return self::$_instance;

    }
    private function __construct()
    {
    }


}