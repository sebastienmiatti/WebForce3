<?php

class PDOManager
{
    private static $instance = NULL;

    private function __construct(){}
    private function __clone(){}
        public static function getIntance(){
            if(!self::$instance;){
                self::$instance = new PDOManager;
            }
            return self::$instance
        }
}


public function getDb(){
    $pdo = new PDO('mysql:host=localhost;dbname=site', 'root','');
    return $pdo;
}
