<?php

/**
 * Configuration for local development database connection
 *
 */

$host       = "mysql";
$username   = "salimas";
$password   = "salimas";
$dbname     = "attendancy";
$dsn        = "mysql:host=$host;dbname=$dbname";
$options    = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);