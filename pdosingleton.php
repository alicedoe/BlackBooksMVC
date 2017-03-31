<?php

final class Database {

    private static  $instance = null;
    private $pdo;

    private function __construct(){

        $this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PWD);

    }

    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function query($query)
    {
        return $this->pdo->query($query);
    }

}