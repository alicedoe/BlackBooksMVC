<?php

function get_livres()
{
    $livres = array();

    $db = Database::getInstance();
    $query = $db->query('SELECT * FROM books');
    foreach ($query as $livre) {
        $livres[] = " Titre : ". $livre["Titre"] ." - Auteur : ". $livre["Auteur"];
    }

    return $livres;

}
