<?php
session_start();
require 'function.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['lanjut'])) {
    header('Location: bayar.php');
    exit;
}

// Ambil Data
$email = $_SESSION['email'];

$user = QueryData("SELECT * FROM konsumen WHERE email = '$email'")[0];
$keahlian = QueryData("SELECT * FROM keahlian");

// SET SESSION FOR ID USER
$_SESSION['id_user'] = $user['id'];

// var_dump($user);

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
    <title>Home</title>
</head>

<body>
    <header>
        <div class="logobox">
            <img class="logo" src="assets/logo.png">
            <span>Kuliku</span>
        </div>

        <div class="nav">
            <a href="history_proyek.php">Proyek</a>
            <a href="logout.php">Keluar</a>
        </div>
    </header>

    <div class="content">


        <h1>Selamat Datang, <?= $user['nama'] ?></h1>

        <div class="box">


            <h2>Mau Buat Proyek?</h2>
            <div class="container">

                <form action="bayar.php" method="POST" enctype="multipart/form-data">

                    <label for="tipe">Tipe:</label>

                    <select name="tipe" id="tipe">
                        <option value="Bangun">Bangun</option>
                        <option value="Renovasi">Renovasi</option>
                        <option value="Perbaikan">Perbaikan</option>
                    </select>

                    <label for="nama_proyek">Nama Proyek: </label>
                    <input type="text" name="nama_proyek" id="nama_proyek" autocomplete="off" required>

                    <label for="deskripsi">Deskripsi Proyek: </label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" placeholder="Optional"></textarea>

                    <label for="jml_kuli">Jumlah Kuli: </label>
                    <input type="number" name="jml_kuli" id="jml_kuli" autocomplete="off" required>

                    <label for="jml_mandor">Jumlah Mandor: </label>
                    <input type="number" name="jml_mandor" id="jml_mandor" autocomplete="off">

                    <label for="gambar">Gambar Proyek: </label>
                    <input type="file" name="gambar" id="gambar" required>

                    <label for="keahlian">Keahlian yang dibutuhkan: </label>

                    <div class="keahlian">
                        <?php foreach ($keahlian as $key => $value) : ?>
                            <input type="checkbox" name="<?= $value["id"] ?>" id="<?= $value["jenis_keahlian"] ?>">
                            <label for="<?= $value["jenis_keahlian"] ?>"><?= $value["jenis_keahlian"] ?></label>
                            <br>
                        <?php endforeach; ?>
                    </div>

                    <button type="submit" name="lanjut">LANJUT</button>


                </form>
            </div>
        </div>
    </div>
</body>

</html>