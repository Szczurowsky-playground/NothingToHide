<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '../controller/databaseInit.php');
$pdo = setDatabaseConnection();
$username = 'Kamil';
$stm = $pdo->prepare('SELECT jsondata FROM `nth_logindata` WHERE username = :username ORDER BY ID desc');
$stm->bindValue('username', $username);
$stm->execute();
$result = $stm->fetchAll(PDO::FETCH_ASSOC);
$i = 0;
$arrayLength = count($result);
while($i < $arrayLength){
    $array = $result[$i];
    $json = json_decode($array['jsondata'], true);
    $IPData = $json['IPData'];
    print_r($json);
    $i++;
}