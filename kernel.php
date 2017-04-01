<?php

final class Kernel {
    /**
     * @var Singleton
     * @access private
     * @static
     */
    private static $_instance = null;

    /**
     * Constructeur de la classe
     *
     * @param void
     * @return void
     */
    private function __construct() {}

    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     *
     * @param void
     * @return Singleton
     */
    public static function getInstance() {
        if(is_null(self::$_instance)) {
            self::$_instance = new Kernel();
        }

        return self::$_instance;
    }

    /**
     * Point d'entrée de l'application
     *
     * @param void
     * @return void
     */
    public function main() {

        include 'view/headerView.php';

       if (!empty($_GET['page']) && is_file('controler/'.$_GET['page'].'.php'))
        {
            include 'controler/'.$_GET['page'].'.php';
        }
        else
        {
            include 'controler/accueil.php';
        }

        include 'view/footerView.php';
    }
}