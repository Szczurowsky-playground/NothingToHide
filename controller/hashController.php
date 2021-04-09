<?php

function hashData($data){
    return password_hash($data, PASSWORD_BCRYPT);
}