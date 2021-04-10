<?php
require($_SERVER['DOCUMENT_ROOT'] . '../mysql.php');
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
    $pdo->query("CREATE TABLE IF NOT EXISTS `nothingtohide`.`nth_loginlogs` ( `ID` INT(255) NOT NULL AUTO_INCREMENT , `username` VARCHAR(255) NOT NULL , `date` VARCHAR(255) NOT NULL , `hour` VARCHAR(255) NOT NULL , `passwordOk` BOOLEAN NOT NULL , `passed2fa` BOOLEAN NOT NULL , `wasSuccessful` BOOLEAN NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;");
}