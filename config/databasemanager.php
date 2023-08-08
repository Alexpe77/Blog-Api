<?php

require_once 'database.php';

class DatabaseManager{
    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {

            include 'database.php';

            self::$instance = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPwd);
        }

        return self::$instance;
    }
}