<?php

class Model {

    function get_livres($id = NULL )
    {
        $pdo = Database::getInstance();

        if (is_null($id) or !is_numeric($id)) {
            $query = $pdo->query('SELECT * FROM books');
        } else {
            $query = $pdo->query('SELECT * FROM books WHERE id='.$id);
        }

        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results);
        return $json;

    }

}
