<?php

final class Database {

    private static  $instance = null;
    private $pdo;

    private function __construct(){

        $this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PWD);

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

    public function prepare($query)
    {
        return $this->pdo->prepare($query);
    }

    public function execute()
    {
        return $this->pdo->execute();
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }

    public function columnCount()
    {
        return $this->pdo->columnCount();
    }

}