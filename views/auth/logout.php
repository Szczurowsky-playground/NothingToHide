<?php

session_start();
if (isset($_COOKIE['nth_val1'])) {
    unset($_COOKIE['nth_val1']);
    setcookie('nth_val1', null, -1, '/');
}
session_destroy();
header("Location: /");
exit;