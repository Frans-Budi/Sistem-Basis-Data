<?php
session_start();

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
} else if (isset($_SESSION['login_admin'])) {
    header('Location: admin.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="register.css">
    <title>Registrasi</title>
</head>

<body>
    <header>
        <div class="logobox">
            <img class="logo" src="assets/logo.png">
            <span>Kuliku</span>
        </div>

        <div class="nav">
            <a href="login_admin.php">Admin</a>
            <a href="login.php">User</a>
        </div>
    </header>

    <div class="content">

        <!-- <h1>Halaman Registrasi</h1> -->

        <div class="box">

            <h1>Pendaftaran Konsumen Disni</h1>

            <div class="container">

                <form action="register_logic.php" method="POST">

                    <div class="tipe">
                        <label for="tipe">Kamu Sebagai: </label>
                        <br>
                        <input type="radio" name="tipe" id="pribadi" value="Pribadi" checked>
                        <label for="pribadi">Pribadi</label>
                        <span></span>
                        <input type="radio" name="tipe" id="bisnis" value="Bisnis">
                        <label for="bisnis">Bisnis</label>
                    </div>


                    <label for="nama">Nama: </label>
                    <input type="text" name="nama" id="nama" autocomplete="off" required autofocus>

                    <label for="no_hp">Nomor Handphone: </label>
                    <input type="number" name="no_hp" id="no_hp" required autocomplete="off">

                    <label for="tempat_lahir">Tempat Lahir: </label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" required autocomplete="off">

                    <label for="tanggal_lahir">Tanggal Lahir: </label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" required autocomplete="off">

                    <label for="alamat_ktp">Alamat KTP: </label>
                    <textarea name="alamat_ktp" id="alamat_ktp" cols="30" rows="3" required></textarea>

                    <label for="domisili">Domisili: </label>
                    <textarea name="domisili" id="domisili" cols="30" rows="3" required></textarea>

                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" autocomplete="off" required>

                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" autocomplete="off" required>

                    <button type="submit" name="register">REGISTRASI</button>
                    <a href="login.php">Sudah Mempunyai Akun? Masuk disini</a>

                </form>
            </div>

        </div>
    </div>
</body>

</html>