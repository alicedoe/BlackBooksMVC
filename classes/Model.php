<?php

class Model {

    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();

    }

    function delete($truc, $id)
    {

        $testtrucexist = $this->pdo->query("SELECT 1 FROM ".$truc." LIMIT 0");

        if ( !$testtrucexist ) {

            $result['data'] = "Not Found";
            $result['status'] = "404";
            return $result;

        }

        else {

            $sql = "DELETE FROM ".$truc." WHERE id= ".$id;
            $req = $this->pdo->prepare($sql);
            $req->execute();
            $result['data'] = "OK";
            $result['status'] = "200";
            return $result;
        }

    }

    function get($truc, $id=NULL)
    {

        $testtrucexist = $this->pdo->prepare("SELECT * FROM ".$truc);
        $testtrucexist->execute();
        $column = $testtrucexist->columnCount();

        if ( $column == 0 ) {

            $result['data'] = "Not Found";
            $result['status'] = "404";
            return $result;


        }

        else {

            if (!is_null($id) and is_numeric($id)) {
                $testtrucexist = $this->pdo->prepare('SELECT * FROM '.$truc.' WHERE id='.$id);
                $testtrucexist->execute();
                $row = $testtrucexist->rowCount();
                if ($row == 0 ) {
                    $result['data'] = "Not Found";
                    $result['status'] = "404";
                    return $result;
                } else {
                    $query = $this->pdo->prepare('SELECT * FROM '.$truc.' WHERE id='.$id);
                }

            } else {
                $query = $this->pdo->prepare('SELECT * FROM '.$truc);
            }
            $query->execute();
            $result['data'] = "OK";
            $result['status'] = "200";
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            return array($result,$results);
        }

    }

    function post($truc, $param1, $param2 = NULL, $param3 = NULL, $param4 = NULL)
    {

        $testtrucexist = $this->pdo->query("SELECT 1 FROM ".$truc." LIMIT 0");

        if ( !$testtrucexist ) {

            $result['data'] = "Not Found";
            $result['status'] = "404";
            return $result;

        }

        else {
            $testtrucexist = $this->pdo->prepare("SELECT * FROM ".$truc);
            $testtrucexist->execute();
            $column = $testtrucexist->columnCount();
            $sql = "INSERT INTO ".$truc." VALUES (NULL";
            for ($i=1; $i<$column; $i++) {

                $sql .= ", ";
                $sql .= "'".${'param'.$i}."'";

            }

            $sql .= ")";
            $req = $this->pdo->prepare($sql);
            $req->execute();

            $id = $this->pdo->lastInsertId();
            $query = $this->pdo->query('SELECT * FROM '.$truc.' WHERE id='.$id);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            $result['data'] = "OK";
            $result['status'] = "200";
            return array($result,$results);
        }

    }
}