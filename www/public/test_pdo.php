<?php

$dbHost     = '127.0.0.1';
$dbName     = 'test';
$dbUsername = 'root';
$dbPassword = 'secret';
$dbCharset  = 'utf8';
$dbDSN      = 'mysql:host='.$dbHost.';dbname='.$dbName.';charset='.$dbCharset;

$dbOptions = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $db = new PDO($dbDSN, $dbUsername, $dbPassword, $dbOptions);
} catch (PDOException $e) {
    exit ($e->getMessage());
}
