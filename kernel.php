<?php

final class Kernel {
    /**
     * @var Kernel
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
     * @return Kernel
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



        $welcome = new Controller();

        $welcome->testurl();
//        echo '' .$url."<br />";
//        $route = new Routes();
//
//       if (!empty($_GET['page']) && is_file('controllers/'.$_GET['page'].'.php'))
//        {
//            include 'controllers/'.$_GET['page'].'.php';
//        }
//        else
//        {
//            include 'controllers/accueilController.php';
//        }


        
    }
}