<?php
// MYSQL initial connection
function setDatabaseConnection(): PDO|bool
{
    require('mysql.php');
    if (!empty($dbData)) {
        $host = $dbData['host'];
        $port = $dbData['port'];
        $username = $dbData['username'];
        $password = $dbData['password'];
        $dbname = $dbData['dbname'];
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
        try {
            $pdo = new PDO($dsn, $username, $password);
            return ($pdo);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    else{
        return(false);
    }
}