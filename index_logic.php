<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}


if (isset($_POST['lanjut'])) {
    header('Location: bayar.php');
}
