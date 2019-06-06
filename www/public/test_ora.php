<?php

$db_config = [
    'username'    => 'PIKALKA',
    'password'    => 'p321',
    'host'        => '10.19.19.100',
    'port'        => '1521',
    'service'     => 'REGION19.TR.STA',
    'pdo_options' => [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]
];

$oracle_tns = '
(DESCRIPTION =
    (ADDRESS_LIST =
        (ADDRESS = (PROTOCOL = TCP)(HOST = '.$db_config['host'].')(PORT = '.$db_config['port'].'))
    )
    (CONNECT_DATA =
        (SERVICE_NAME = '.$db_config['service'].')
    )
)
';

$db_config['oracle_tns'] = $oracle_tns;

try {
    $db = new PDO('oci:dbname='.$db_config['oracle_tns'], $db_config['username'], $db_config['password'], $db_config['pdo_options']);
} catch (\PDOException $e) {
    echo '<h3>' . $e->getMessage() . '</h3>';
}

$sql = 'SELECT SYSDATE FROM dual';
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetch();
echo 'Date from Oracle database: ' . $rows['dt'];
