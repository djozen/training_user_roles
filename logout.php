<?php

require_once 'db.inc.php';

$db = new DB();

if (isset($_SESSION['user'])) {
    $logged = true;
} else {
    $logged = false;
}

const ROLE_ADMIN = 100;
const ROLE_REDACTEUR = 10;
const ROLE_USER = 1;


const URL = '/admin_test/';


if (
    isset($_SESSION['user'])
    && !empty($_SESSION['user'])
) {
    unset($_SESSION['user']);
}
header('Location:'. URL);
exit();
