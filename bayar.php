<?php
require 'function.php';
session_start();

$email = $_SESSION['email'];
$id = (int) QueryData("SELECT id FROM konsumen WHERE email = '$email'")[0]['id'];

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

// Cek Jika Tombol Lanjut ditekan
if (isset($_POST['lanjut'])) {

    if (tambahProyek($_POST, $id) > 0) {
        echo "<script>
                alert('Proyek Berhasil Disimpan');
            </script>";
    } else {
        echo "<script>
                alert('Terjadi Kesalahan, Proyek Gagal Disimpan');
                window.location.href='index.php';
            </script>";
    }
}

// AMBIL DATA PROYEK
$proyek = QueryData("SELECT * FROM proyek WHERE id_konsumen = $id ORDER BY id DESC LIMIT 1")[0];

// AMBIL DATA KEAHLIAN PROYEK
$id_proyek = $proyek['id'];
$proyek_keahlian = QueryData("SELECT * FROM proyek_keahlian 
    JOIN keahlian ON (proyek_keahlian.id_keahlian = keahlian.id)
    WHERE id_proyek = $id_proyek");

// HITUNGAN GAJI
// AMBIL GAJI MITRA
$gaji = QueryData("SELECT * FROM gaji_mitra");
$gajiKuli = (int) $gaji[0]['gaji'];
$gajiMandor = (int) $gaji[1]['gaji'];

$total_gajiKuli = (int) $gajiKuli * $proyek['jumlah_kuli'];
$total_gajiMandor = (int) $gajiKuli * $proyek['jumlah_mandor'];
$total = (int) $total_gajiKuli + $total_gajiMandor;

// AMBIL DATA METODE PEMBAYARAN
$metode_pembayaran = QueryData("SELECT * FROM metode_pembayaran");

// Generate Uniq ID
$no_pembayaran = uniqid();

// Ketika Tombol Bayar Ditekan
if (isset($_POST['bayar'])) {

    if (tambahPembayaran($_POST, $no_pembayaran) > 0) {
        echo "<script>
                alert('Pembayaran Berhasil');
                window.location.replace('index.php');
            </script>";
    } else {
        echo "<script>
                alert('Terjadi Kesalahan, Pembayaran Gagal');
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
    <link rel="stylesheet" href="bayar.css">
    <title>Pembayaran</title>
</head>

<body>
    <div class="content">
        <h1>Rincian Estimasi Biaya</h1>

        <div class="box">
            <!-- Uniq Id -->
            <p> Nomor Pembayaran : <?= $no_pembayaran ?></p>

            <!-- Gambar Proyek -->
            <img src="images/<?= $proyek['gambar_proyek'] ?>" height="250px">

            <!-- Nama Proyek -->
            <h2><?= $proyek['nama_proyek'] ?></h2>

            <!-- Deskripsi Proyek -->
            <p>Deskripsi : <?= $proyek['deskripsi_proyek'] ?></p>

            <!-- Tipe Proyek -->
            <h3>Proyek <?= $proyek['tipe_proyek'] ?></h3>
            <br>
            <!-- Keahlian yang dibutuhkan -->
            <h3>Membutuhkan Keahlian: </h3>
            <ul>
                <?php foreach ($proyek_keahlian as $pk) : ?>
                    <li><?= $pk['jenis_keahlian'] ?></li>
                <?php endforeach; ?>
            </ul>
            <br>
            <!-- Hitungan Kuli -->
            <h3>Jumlah Kuli: <?= $proyek['jumlah_kuli'] ?></h3>
            <p>1 Hari = Rp. <?= number_format($gajiKuli) ?> <br> <?= $proyek['jumlah_kuli'] ?> Kuli X 1 Hari = Rp. <?= number_format($total_gajiKuli) ?></p>
            <br>
            <!-- Hitungan Mandor -->
            <h3>Jumlah Mandor: <?= $proyek['jumlah_mandor'] ?></h3>
            <p>1 Hari = Rp. <?= number_format($gajiMandor) ?> <br> <?= $proyek['jumlah_mandor'] ?> Mandor X 1 Hari = Rp. <?= number_format($total_gajiMandor) ?></p>
            <br>
            <!-- Rekapitulasi -->
            <h3>Rekapitulasi:</h3>
            <p>Biaya Kuli per Hari = Rp. <?= number_format($total_gajiKuli) ?></p>
            <p>Biaya Mandor per Hari = Rp. <?= number_format($total_gajiMandor) ?></p>
            <p>Total Biaya = Rp. <?= number_format($total) ?></p>
            <br>
            <!-- Metode Pembayaran -->
            <form action="" method="POST">

                <input type="hidden" name="tGajiKuli" value="<?= $total_gajiKuli  ?>">
                <input type="hidden" name="tGajiMandor" value="<?= $total_gajiMandor  ?>">
                <input type="hidden" name="tBiaya" value="<?= $total  ?>">
                <input type="hidden" name="id_proyek" value="<?= $id_proyek ?>">

                <label for="met_pembayaran">Metode Pembayaran</label>
                <select name="met_pembayaran" id="met_pembayaran">
                    <?php foreach ($metode_pembayaran as $mp) : ?>
                        <option value="<?= $mp['id'] ?>"><?= $mp['nama_alat_pembayaran'] ?></option>
                    <?php endforeach ?>
                </select>

                <Button type="submit" name="bayar">BAYAR SEKARANG</Button>

            </form>
        </div>
    </div>

</body>

</html>