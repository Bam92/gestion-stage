<?php

function db_connect()
{
    include(__DIR__ . "/config.php");

    try {
        $connection = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
        printf(
            "Echec de connexion à la base de données : %s\n",
            $e->getMessage()
        );
        exit();
    }
    
    return $connection;
}