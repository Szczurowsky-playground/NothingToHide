<?php
if(!isset($_SESSION)){
    session_start();
}
require_once($_SERVER['DOCUMENT_ROOT'] . '../controller/databaseInit.php');

function validateLogin(): bool
{
    if($_POST['login'] == ''){
        return(false);
    }
    if(preg_match('/[^A-Za-z0-9.#\\-_]/', $_POST['login'])){
        return(false);
    }
    $username = $_POST['login'];
    $pdo = setDatabaseConnection();
    $stm = $pdo->prepare('SELECT ID FROM `nth_userdata` WHERE username = :username');
    $stm->bindValue('username', $username);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    if (is_array($result) || is_object($result)) {
        foreach ($result as $key => $loop_result) {
            if (isset($loop_result) == 1) {
                return(true);
            }
        }
    }
    else{
        return (false);
    }

}

function validate(): bool
{
    if($_POST['password'] == ''){
        return(false);
    }
    $password = $_POST['password'];
    if(validateLogin() == true){
        $username = $_POST['login'];
        $pdo = setDatabaseConnection();
        $stm = $pdo->prepare('SELECT password FROM `nth_userdata` WHERE username = :username');
        $stm->bindValue('username', $username, PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        if (is_array($result) || is_object($result)) {
            foreach ($result as $key => $getPassword) {
            }
            if(password_verify($password, $getPassword)){
                return(true);
            }
            else{
                return('Wrong password');
            }
        }
        else{
            return(false);
        }
    }
    else{
        return(false);
    }
}
echo validate();
