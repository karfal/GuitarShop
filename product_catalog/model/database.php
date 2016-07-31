<?php
    
    class Database {

        private static $dsn = 'mysql:dbname=guitar_shop;host=localhost';
        private static $user = 'root';
        private static $password = 'root';
        private static $db;

        private function __construct() {} //prevent objects from being created

        public static function getDb() {
            if(!isset(self::$db)) {
                try {
                    self::$db = new PDO(self::$dsn, self::$user, self::$password);
                }
                catch(PDOException $e) {
                    $errorMessage = $e->getMessage();
                    include('../errors/database_error.php');
                    exit;
                }
            }
            return self::$db;
        }

    }//end class

?>