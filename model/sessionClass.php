<?php

use JetBrains\PhpStorm\NoReturn;

require_once('encryptionClass.php');
class session extends encryption
{
    public static string $token;
    public static $userIP;
    public static bool|string $username;

    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION)){
            session_start();
        }
        if (!isset($_SESSION['username'])){
            if(isset($_COOKIE['nth_val1'])){
                $_COOKIE['nth_val1'] = $_SESSION['username'];
            }
            else{
                $_SESSION['username'] = NULL;
            }
        }
        self::$token = session_id();
        self::$userIP = $this->getIP();
        self::$username = parent::decrypt($_SESSION['username']);
    }
    #[NoReturn] public function accessControl(){
        if(isset($_SESSION['username']) && isset($_COOKIE['nth_val1'])) {
            $currentPageUrl = $_SERVER["REQUEST_URI"];
            if (strpos($currentPageUrl, 'login') || strpos($currentPageUrl, 'register')) {
                header('Location: /');
                exit;
            }
        }
    }

    #[NoReturn] public function addSession($username)
    {
        require_once('controller/databaseInit.php');
        $pdo = setDatabaseConnection();
        $values =[
          'ID' => '',
          'token' => session_id(),
          'IP' => $this->getIP(),
          'username' => $username,
        ];
        $stm = $pdo->prepare('INSERT INTO `nth_token` (`ID`, `token`, `IP`, `username`) VALUES (:ID, :token, :IP, :username)')->execute($values);
    }

    #[NoReturn] public function logout()
    {
        require_once('controller/databaseInit.php');
        if(!isset($_SESSION)){
            session_start();
        }
        if (isset($_COOKIE['PHPSESSID'])) {
            unset($_COOKIE['PHPSESSID']);
            setcookie('PHPSESSID', null, -1, '/');
        }
        if (isset($_COOKIE['nth_val1'])) {
            unset($_COOKIE['nth_val1']);
            setcookie('nth_val1', null, -1, '/');
        }
        $pdo = setDatabaseConnection();
        $stm = $pdo->prepare('DELETE FROM `nth_token` WHERE `token`= :token');
        $stm->bindValue('token', session_id());
        $stm->execute();
        session_destroy();
        session_regenerate_id(true);
        header("Location: /");
        exit;
    }

    public function checkSession(): bool
    {
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['username']) && isset($_COOKIE['nth_val1'])){
            if($_SESSION['username'] != $_COOKIE['nth_val1']){
                $this->logout();
            }
        }
        if(isset($_SESSION['username']) && !isset($_COOKIE['nth_val1'])){
            setcookie('nth_val1', $_SESSION['username'], time()+(86400 * 30), '/', secure:false); // TODO Make it true if use ssl, now false for dev purposes
        }
        if(self::$username == 1 || self::$username == 0){
            return false;
        }
        require_once('controller/databaseInit.php');
        $pdo = setDatabaseConnection();
        $stm = $pdo->prepare('SELECT IP, token FROM `nth_token` WHERE username = :username');
        $stm->bindValue('username', self::$username);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        if (is_array($result) || is_object($result)) {
            $size = sizeof($result) - 1;
            $i = 0;
            $oldToken = session_id();
            while ($i <= $size){
                if(in_array(session_id(), $result[$i])){
                    $res = $result[$i];
                    if($res['IP'] != $this->getIP()){
                        if (isset($_COOKIE['nth_val1'])) {
                            unset($_COOKIE['nth_val1']);
                            setcookie('nth_val1', null, -1, '/');
                        }
                        session_destroy();
                        session_regenerate_id();
                        $pdo = setDatabaseConnection();
                        $stm = $pdo->prepare('DELETE FROM `nth_token` WHERE `token`= :token');
                        $stm->bindValue('token', $oldToken);
                        $stm->execute();
                        header('Location: /');
                        return true;
                    }

                }
                $i++;
            }
            if($i == $size){
                return false;
            }
        }
        return false;
    }

    function getIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
            return ($ip_address);
        } //whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
            return ($ip_address);
        } //whether ip is from remote address
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
            return ($ip_address);
        }
    }


}