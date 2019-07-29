<?php
namespace AHT\Config;

use \PDO;
class Database
{
    private static $bdd = null;

    private function __construct() {
    }

    public static function getBdd() {
        if(is_null(self::$bdd)) {
            self::$bdd = new PDO("mysql:host=localhost;dbname=aht_mvc_ex0;", 'root','');
        }
        return self::$bdd;
    }
}
?>