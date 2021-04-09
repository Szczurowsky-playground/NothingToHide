<?php
require_once('../model/encryptionClass.php');
require_once('../controller/hashController.php');
$test = new encryption();
$s1 = $test->encrypt('izihuj');
echo nl2br($s1 . "\n");
echo $test->decrypt($s1);

