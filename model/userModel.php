<?php


class user
{
    private static $username;
    private static $password;

     function __construct($inputUsername, $inputPassword){
         self::$username = $inputUsername;
         self::$password = $inputPassword;
     }
}