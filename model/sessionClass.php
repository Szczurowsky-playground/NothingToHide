<?php


class session
{
    public static string $token;
    public static $userIP;

    public function __construct()
    {
        if(!isset($_SESSION)){
            session_start();
        }
        self::$token = session_id();
        self::$userIP = $this->getIP();
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