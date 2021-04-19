<?php
$dev = true;
$currentPageUrl = $_SERVER["REQUEST_URI"];
if (strpos($currentPageUrl, "?")) {
    $currentPageUrl = substr($currentPageUrl, 0, strpos($currentPageUrl, "?"));
}
if ($dev == false){
    error_reporting(0);
}
require('controller/redirectController.php');
if(!isset($routes)){
    $error_type = 'Routing system error';
    $error_solution = 'Something goes wrong';
    require_once('public/custom_error.php');
}
$page = redirect($currentPageUrl, $routes);
if($page == "Error") {
    $error_type = 'Error 404';
    $error_solution = 'Site what you are looking for does not exists';
    require('public/custom_error.php');
}
else{
    include($page);
}


