<?php

$dbHost     = '10.19.190.164';
$dbPort     = '3306';
$dbName     = 'test';
$dbUsername = 'root';
$dbPassword = 'secret';
$dbCharset  = 'utf8';
$dbDSN      = 'mysql:host='.$dbHost.';port='.$dbPort.'dbname='.$dbName.';charset='.$dbCharset;

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

$sql = 'SELECT NOW() dt';
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetch();
echo 'Date from MySQL database: ' . $rows['dt'];
