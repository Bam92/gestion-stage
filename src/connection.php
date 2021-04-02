<?php

function db_connect()
{
    include(dirname(__FILE__) . "/config.php");

    try {
        $connection = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $err) {
        echo "Database connection error. <br>" . $err->getMessage();
        exit;
    }
    return $connection;
}