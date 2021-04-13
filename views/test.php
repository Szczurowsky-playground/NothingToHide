<?php
require_once('../model/sessionClass.php');
$new = new session();
$t = $new->checkSession();
print_r($t);

