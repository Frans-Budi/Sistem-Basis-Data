<?php
session_start();
require 'function.php';

// var_dump($_COOKIE);

if (isset($_COOKIE['id_ad']) && isset($_COOKIE['key_ad'])) {
    // Ambil Email Berdasarkan id
    $id = $_COOKIE['id_ad'];
    $key = $_COOKIE['key_ad'];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // var_dump($row);
    // var_dump($key);
    // var_dump(hash('sha256', $row['email']));

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

if (isset($_POST['login_admin'])) {

    // Deklarasi Varible
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Cek Email
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        // Cek Password
        $row = mysqli_fetch_assoc($result);

        if ($password == $row['password']) {
            // Set Session
            $_SESSION['login_admin'] = true;
            $_SESSION['email'] = $row['email'];

            // Cek Remember Me
            if (isset($_POST['remember'])) {
                // Set Cookie ('key', 'value', 'duration');
                setcookie('id_ad', $row['id'], time() + 60 * 60 * 24);
                setcookie('key_ad', hash('sha256', $row['email']), time() + 60 * 60 * 24);
            }

            header('Location: admin.php');
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
    <title>Admin</title>
</head>

<body>
    <header>
        <div class="logobox">
            <img class="logo" src="assets/logo.png">
            <span>Kuliku</span>
        </div>

        <div class="nav">
            <a href="login.php">User</a>
            <a href="register.php">Daftar</a>
        </div>
    </header>

    <div class="content">

        <h1>Halaman Login Admin</h1>



        <div class="box">
            <h2>Masuk Disini</h2>
            <form action="" method="POST">

                <label for="email">Email: </label>
                <input type="email" name="email" id="email" autocomplete="off" required>

                <label for="password">Password: </label>
                <input type="password" name="password" id="password" autocomplete="off" required colspan="2">

                <?php if (isset($error)) : ?>
                    <p style="color: red; font-style: italic; text-align: right;">Email Atau Password Salah</p>
                <?php endif; ?>

                <div class="action">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Ingat, Saya</label>

                    <button type="submit" name="login_admin">Masuk</button>
                </div>

            </form>
        </div>
    </div>
</body>

</html>