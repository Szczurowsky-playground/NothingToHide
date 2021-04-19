<?php
require_once('model/sessionClass.php');
$sessionClass = new session();
$sessionClass->checkSession();
$sessionClass->accessControl();