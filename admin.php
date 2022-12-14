<?php
session_start();
require 'function.php';

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

// Ambil Data
$email = $_SESSION['email'];
// $email = hash('sha256', $email);

$admin = QueryData("SELECT * FROM admin WHERE email = '$email'")[0];
$keahlian = QueryData("SELECT * FROM keahlian");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="index.css">
    <title>Admin</title>
</head>

<body>
    <header>
        <div class="logobox">
            <img class="logo" src="assets/logo.png">
            <span>Kuliku</span>
        </div>

        <div class="nav">
            <a href="admin_logic.php">Daftar Mitra</a>
            <a href="logout.php">Keluar</a>
        </div>
    </header>

    <div class="content">
        <div class="box">
            <h1>Daftar Mitra Disini</h1>
            <br>
            <h2>Pilih Mitra</h2>
            <div class="container">
                <form action="admin_logic.php" method="POST">
                    <div class="tipe">
                        <input type="radio" name="tipe" id="Kuli" value="Kuli" autocomplete="off" onclick="c()" checked>
                        <label for="Kuli">Kuli</label>
                        <span></span>
                        <input type="radio" name="tipe" id="Mandor" value="Mandor" autocomplete="off" onclick="c()">
                        <label for="Mandor">Mandor</label>
                    </div>

                    <label for="nama">Nama: </label>
                    <input type="text" name="nama" id="nama" autocomplete="off" required>

                    <label for="nik">NIK: </label>
                    <input type="text" name="nik" id="nik" autocomplete="off" required>

                    <label for="no_hp">Nomor Handphone: </label>
                    <input type="number" name="no_hp" id="no_hp" autocomplete="off" required>

                    <label for="tempat_lahir">Tempat Lahir: </label>
                    <input type="text" name="tempat_lahir" id="tempat_lahir" autocomplete="off" required>

                    <label for="tempat_lahir">Tanggal Lahir: </label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off" required>

                    <label for="keahlian">Keahlian yang dimiliki: </label>

                    <div class="keahlian">
                        <div id="container">
                            <?php foreach ($keahlian as $value) : ?>
                                <?php if ($value['tipe'] == 'Kuli') : ?>
                                    <input type="checkbox" name="<?= $value["id"] ?>" id="<?= $value["jenis_keahlian"] ?>">
                                    <label for="<?= $value["jenis_keahlian"] ?>"><?= $value["jenis_keahlian"] ?></label>
                                    <br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <label for="alamat_ktp">Alamat KTP: </label>
                    <textarea name="alamat_ktp" id="alamat_ktp" cols="30" rows="3" required></textarea>

                    <label for="domisili">Domisili: </label>
                    <textarea name="domisili" id="domisili" cols="30" rows="3" required></textarea>

                    <label for="email">Email: </label>
                    <input type="email" name="email" id="email" autocomplete="off" required>

                    <button type="submit" name="register">Gabung Jadi Mitra</button>

                </form>

            </div>
        </div>
    </div>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/tipe.js"></script>
</body>

</html>