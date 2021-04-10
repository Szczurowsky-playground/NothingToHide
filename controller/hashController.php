<?php

function hashData($data): bool|string|null
{
    return password_hash($data, PASSWORD_BCRYPT);
}