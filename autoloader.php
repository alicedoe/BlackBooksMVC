<?php
class Autoloader{

    private static $_classDir = "./classes/";

    public static function classAutoloader($class){
//        echo $class."\n";
        $path = static::$_classDir."$class.php";
        $path = str_replace("\\", "/", $path);
//        echo $path."\n";

        if(file_exists($path)&& is_readable($path)){
            require_once $path;
        }

    }

}
spl_autoload_register('autoloader::ClassAutoLoader');