<?php
class Database{
    private static $host = 'localhost';
    private static $name = 'ventas';
    private static $user = 'root';
    private static $password = '';

    private static $cont = null;

    public static function conexionBD(){
    if (null == self::$cont) {
        try {
            self::$cont = new PDO("mysql:host=".self::$host.";dbname=".self::$name, self::$user, self::$password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    return self::$cont;
}


    public static function desconectarBD(){
        self::$cont = null;
    }
}

?>