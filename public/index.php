<?php
$currentPageUrl = $_SERVER["REQUEST_URI"];
$dev = true;
if ($dev == false){
    error_reporting(0);
}
require ('../controller/redirectController.php');
$page = redirect($currentPageUrl, $routes);
if (str_contains($currentPageUrl, 'profile')) {
    if (str_contains($currentPageUrl, 'profile/')) {
        $searchingNickname = str_replace("/profile/", "", $currentPageUrl);
        require_once('profile.php');

    }
    else {
        $error_type = 'Błąd 404';
        $error_solution = 'Przykro nam ale podana strona nie istnieje. Musisz dodać "/nick gracza" po "/profile"';
        require_once('custom_error.php');
    }

}
elseif($page == "Error") {
    $error_type = 'Błąd 404';
    $error_solution = 'Przykro nam strona której szukasz nie istnieje';
    require('custom_error.php');
}
else{
    include($page);
}
