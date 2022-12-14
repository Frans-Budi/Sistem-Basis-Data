<?php

session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('key', '');
setcookie('id', '');

setcookie('key_ad', '');
setcookie('id_ad', '');

header('Location: login.php');
