<?php
require('mysql.php');
if (!empty($dbData)) {
    $host = $dbData['host'];
    $port = $dbData['port'];
    $username = $dbData['username'];
    $password = $dbData['password'];
    $dbname = $dbData['dbname'];
    $dsn = "mysql:host=$host;port=$port";
    try {
        $pdo = new \PDO($dsn, $username, $password);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    $pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
}
