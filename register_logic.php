<?php
session_start();
require 'function.php';

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
} else if (isset($_SESSION['login_admin'])) {
    header('Location: admin.php');
    exit;
}


if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>
                alert('Berhasil, Akun Anda Berhasil diRegistrasi');
                window.location.replace('login.php');
            </script>";
    } else {
        echo mysqli_errno($conn);
        echo "<script>
                alert('Terjadi Kesalahan, Gagal Registrasi!');
                window.location.replace('register.php');
           </script>";
    }
} else {
    header('Location: register.html');
}
