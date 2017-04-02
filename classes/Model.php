<?php

class Model {

    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
//        header('Cache-Control: no-cache, must-revalidate');
//        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
//        header('Content-type: application/json');
    }

    function get_livres($id = NULL)
    {

        if (!is_null($id) and is_numeric($id)) {
            $query = $this->pdo->query('SELECT * FROM books WHERE id='.$id);
        } else {
            $query = $this->pdo->query('SELECT * FROM books');
        }

        return json_encode($query->fetchAll(PDO::FETCH_ASSOC));

    }

    function get_cat($id = NULL)
    {

        if (!is_null($id) and is_numeric($id)) {
            $query = $this->pdo->query('SELECT * FROM categories WHERE id='.$id);
        } else {
            $query = $this->pdo->query('SELECT * FROM categories');
        }

        return json_encode($query->fetchAll(PDO::FETCH_ASSOC));

    }

    function post_cat($nomcat = NULL )
    {

        $sql = "INSERT INTO categories(Nom) VALUES($nomcat)";
        $req = $this->pdo->prepare($sql);
        $req->execute();
        $id = $this->pdo->lastInsertId();
        $query = $this->pdo->query('SELECT * FROM categories WHERE id='.$id);
        return json_encode($query->fetchAll(PDO::FETCH_ASSOC));

    }



}
