<?php

require 'vendor/autoload.php';
require 'config/database.php';
require 'config/databasemanager.php';
require 'config/routes.php';



$db = DatabaseManager::getInstance($dbHost, $dbName, $dbUser, $dbPwd);



$router->run();