<?php
class Database {
	
    //A function for connecting to the database
    private static function connect() {
        $user = 'root';
        $pass = '';
        $host = 'localhost';
        $dbnname = 'k-line-test2';
        $charset = 'utf8mb4';

        try {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbnname . ';charset=' . $charset;
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    
    //A function for queryes
    public static function query($query) {
        try {
            $result = self::connect()->query($query);
            return $result;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}