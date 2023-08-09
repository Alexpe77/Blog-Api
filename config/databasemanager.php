<?php

class DatabaseManager
{
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            $envFile = __DIR__ . '/../.env';

            if (file_exists($envFile)) {
                $envVariables = parse_ini_file($envFile);

                foreach ($envVariables as $key => $value) {
                    putenv("$key=$value");
                }
            }
            $dbHost = getenv('DB_HOST');
            $dbName = getenv('DB_NAME');
            $dbUser = getenv('DB_USER');
            $dbPwd = getenv('DB_PWD');

            self::$instance = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPwd);
        }

        return self::$instance;
    }
}
