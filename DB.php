<?php
    // db constants
    define('DB_DBMS', 'mysql');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'pdo_practice');
    
    // Abstract Class
    class DB{
        private function __construct(){}

        // private function to connect
        private static function connect($dbms, $host, $user, $password, $database){
            $options = [
                PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //make the default fetch be an object array
                PDO::MYSQL_ATTR_FOUND_ROWS => true,
            ];
        }

        // public function to get connection
        public static function get_connection($db = ''){

        }

        // function to execue update, i.e. no rows returned
        public static function executeUpdate($query, $data = []){
            // no return
        }

        // function to execue query, i.e. rows returned
        public static function executeQuery($query, $data = []){
            $rows = [];

            // get the connection
            $connection = self::connect(DB_DBMS, DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

            // pepare the statement
            $prepared_statement = $connection->prepare($query);
            $result = $prepared_statement->execute($data);

            // close the connection
            self::close($connection);

            return $rows;
            // return rows
        }

        // function to close the connection
        public static function close($connection){
            $connection = null;
        }
    }