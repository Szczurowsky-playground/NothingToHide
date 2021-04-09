<?php

use JetBrains\PhpStorm\Pure;

include_once('../routes/web.php');

#[Pure] function redirect($URL, $array) {
    if (in_array($URL, $array)) {
        return array_search($URL, $array);
    }
    else {
        return "Error";
    }
}