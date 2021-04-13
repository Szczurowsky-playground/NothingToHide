<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/../model/sessionClass.php');
$sessionClass = new session();
$sessionClass->logout();