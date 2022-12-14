<?php

require 'function.php';

// Query Data
$id = $_GET['id'];
$kuli = QueryData("SELECT * FROM mitra WHERE id = $id")[0];

// Ambil Keahlian
$query = "SELECT * FROM keahlian";
$keahlian = QueryData($query);

// Ambil Keahlian Kuli
$query = "SELECT id_kuli, id_keahlian, jenis_keahlian, id FROM keahlian_mitra
JOIN keahlian ON (keahlian_mitra.id_keahlian = keahlian.id) WHERE id_kuli = $id";
$keahlian_kuli = QueryData($query);

// EDIT KULI
if (isset($_POST['update'])) {
    var_dump($_POST);

    // CEK APAKAH BERHASIL MENGUBAH DATA ATAU GAK
    if (ubahMitra($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil Diubah');
                document.location.href = 'admin_logic.php';
            </script>";
    } else {
        echo "<script>
                alert('Terjadi Kesalahan, Data Gagal Diubah');
                document.location.href = 'admin_logic.php';
            </script>";
    }
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
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="edit_mitra.css">
    <title>Edit Mitra</title>
</head>

<body>
    <a href="admin_logic.php">
        <button>Kembali</button> </a>

    <div class="content">
        <h1>Edit Mitra</h1>
        <div class="box">

            <h2>Update Data Mitra Kuliku</h2>

            <form action="" method="POST">

                <input type="hidden" name="id" value="<?= (int) $id ?>">

                <div class="tipe">
                    <label for="tipe">Mitra: </label>
                    <br>
                    <input type="radio" name="tipe" id="Kuli" value="Kuli" autocomplete="off" checked>
                    <label for="Kuli">Kuli</label>
                    <span></span>
                    <input type="radio" name="tipe" id="Mandor" value="Mandor" autocomplete="off">
                    <label for="Mandor">Mandor</label>
                </div>

                <label for="nama">Nama: </label>

                <input value="<?= $kuli['nama'] ?>" type="text" name="nama" id="nama" autocomplete="off">

                <label for="nik">NIK: </label>


                <input value="<?= $kuli['nik'] ?>" type="text" name="nik" id="nik" autocomplete="off">

                <label for="no_hp">Nomor Handphone: </label>

                <input value="<?= $kuli['no_hp'] ?>" type="number" name="no_hp" id="no_hp" autocomplete="off">

                <label for="tempat_lahir">Tempat Lahir: </label>
                <input value="<?= $kuli['temppat_lahir'] ?>" type="text" name="tempat_lahir" id="tempat_lahir" autocomplete="off">
                <label for="tempat_lahir">Tanggal Lahir: </label>
                <input value="<?= $kuli['tanggal_lahir'] ?>" type="date" name="tanggal_lahir" id="tanggal_lahir" autocomplete="off">
                <label for="keahlian">Keahlian yang dimiliki: </label>

                <div class="keahlian" id="container">
                    <?php $j = 0 ?>
                    <?php foreach ($keahlian as $value) : ?>
                        <?php if ($value['tipe'] == 'Kuli') : ?>
                            <input type="checkbox" name="<?= $value["id"] ?>" id="<?= $value["jenis_keahlian"] ?>">
                            <label for="<?= $value["jenis_keahlian"] ?>"><?= $value["jenis_keahlian"] ?></label>
                            <br>
                        <?php endif; ?>
                        <?php $j++ ?>
                    <?php endforeach; ?>
                </div>

                <label for="alamat_ktp">Alamat KTP: </label>
                <textarea name="alamat_ktp" id="alamat_ktp" cols="30" rows="3"><?= $kuli['alamat_KTP'] ?></textarea>
                <label for="domisili">Domisili: </label>
                <textarea name="domisili" id="domisili" cols="30" rows="3"><?= $kuli['domisili'] ?></textarea>
                <label for="email">Email: </label>
                <input value="<?= $kuli['email'] ?>" type="email" name="email" id="email" readonly>
                <button type="submit" name="update">UPADATE</button>

            </form>
        </div>
    </div>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/tipe.js"></script>

</body>

</html>