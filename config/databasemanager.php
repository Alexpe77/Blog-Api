<?php

require_once 'database.php';

use PDO; 

class DatabaseManager{
    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {

            include 'database.php';

            self::$instance = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        }

        return self::$instance;
    }
}