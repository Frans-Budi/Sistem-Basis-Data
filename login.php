<?php
session_start();
require 'function.php';

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    // Ambil Email Berdasarkan id
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    $result = mysqli_query($conn, "SELECT * FROM konsumen WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if ($key = hash('sha256', $row['email'])) {
        $_SESSION['login'] = true;
        $_SESSION['email'] = $row['email'];
    }
} else if (isset($_COOKIE['id_ad']) && isset($_COOKIE['key_ad'])) {
    // Ambil Email Berdasarkan id
    $id = $_COOKIE['id_ad'];
    $key = $_COOKIE['key_ad'];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if ($key = hash('sha256', $row['email'])) {
        $_SESSION['login_admin'] = true;
        $_SESSION['email'] = $row['email'];
    }
}

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
} else if (isset($_SESSION['login_admin'])) {
    header('Location: admin.php');
    exit;
}

if (isset($_POST['login'])) {

    // Deklarasi Varible
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Cek Email
    $query = "SELECT * FROM konsumen WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        // Cek Password
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            // Set Session
            $_SESSION['login'] = true;
            $_SESSION['email'] = $row['email'];

            // Cek Remember Me
            if (isset($_POST['remember'])) {
                // Set Cookie ('key', 'value', 'duration');
                setcookie('id', $row['id'], time() + 60 * 60 * 24);
                setcookie('key', hash('sha256', $row['email']), time() + 60 * 60 * 24);
            }

            header('Location: index.php');
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <header>
        <div class="logobox">
            <img class="logo" src="assets/logo.png">
            <span>Kuliku</span>
        </div>

        <div class="nav">
            <a href="login_admin.php">Admin</a>
            <a href="register.php">Daftar</a>
        </div>
    </header>

    <div class="content">

        <h1>Selamat Datang di Halaman Web Kuliku</h1>

        <div class="box">

            <h2>Masuk Disini</h2>

            <form action="" method="POST">

                <label for="email">Email: </label>
                <input type="email" name="email" id="email" autocomplete="off" required>

                <label for="password">Password: </label>
                <input type="password" name="password" id="password" autocomplete="off" required colspan="2">

                <?php if (isset($error)) : ?>
                    <p style="color: red; font-style: italic; text-align:right;">Email Atau Password Salah</p>
                <?php endif; ?>

                <div class="action">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Ingat, Saya</label>

                    <button type="submit" name="login">Masuk</button>
                </div>

                <a href="register.php">Belum Punya Akun? Daftar disini</a>

            </form>
        </div>
    </div>
</body>

</html>