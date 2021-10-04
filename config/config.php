<?php

/**
 * Configuration for local development database connection
 *
 */

$host       = $_ENV['DB_HOST'];
$username   = $_ENV['DB_USER'];
$password   = $_ENV['DB_PASSWORD'];
$dbname     = $_ENV['DB_NAME'];
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
