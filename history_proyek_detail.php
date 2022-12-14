<?php
session_start();
require 'function.php';

// AMBIL ID
$id = $_GET['id'];

// AMBIL DATA PROYEK
$query = "SELECT * FROM proyek
JOIN pembayaran ON (proyek.id = pembayaran.id_proyek)
JOIN transaksi ON (transaksi.id_pembayaran = pembayaran.id)
JOIN metode_pembayaran ON (metode_pembayaran.id = pembayaran.id_metode_pembayaran)
WHERE proyek.id = $id";
$proyek = QueryData($query)[0];

// AMBIL DATA KEAHLIAN PROYEK
$query = "SELECT * FROM proyek_keahlian
JOIN keahlian ON (keahlian.id = proyek_keahlian.id_keahlian)
WHERE id_proyek = $id";
$proyek_keahlian = QueryData($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="history_proyek_detail.css">
    <title>Detail</title>
</head>

<body>
    <a href="history_proyek.php">
        <button>Back</button> </a>

    <div class="container">
        <div class="box">


            <!-- JUDUL PROYEK -->
            <h1><?= $proyek['nama_proyek'] ?></h1>

            <!-- GAMBAR PROYEK -->
            <img src="images/<?= $proyek['gambar_proyek'] ?>" height="200px">

            <!-- TANGGAL TRANSAKSI -->
            <p><?= $proyek['tanggal'] ?></p>

            <!-- DESKRIPSI PROYEK -->
            <p>Deskripsi: <?= $proyek['deskripsi_proyek'] ?></p>

            <!-- TIPE PROYEK -->
            <h3><?= $proyek['tipe_proyek'] ?></h3>

            <!-- KEAHLIAN YANG DIBUTUHKAN -->
            <h3>Keahlian yang dibutuhkan : </h3>
            <ul>
                <?php foreach ($proyek_keahlian as $pk) : ?>
                    <li><?= $pk['jenis_keahlian'] ?></li>
                <?php endforeach; ?>
            </ul>
            <br>
            <!-- JUMLAH KULI DIBUTUHKAN -->
            <P>Jumlah Kuli: <?= $proyek['jumlah_kuli'] ?></P>

            <!-- JUMLAH MANDOR YANG DIBUTUHKAN -->
            <p>Jumlah Mandor: <?= $proyek['jumlah_mandor'] ?></p>

            <p>===============================================</p>

            <!-- NO PEMBAYARAN -->
            <h2>Nomor Pembayaran : <?= $proyek['no_pembayaran'] ?></h2>

            <!-- METODE PEMBAYARAN -->
            <p>Metode Pembayaran : <?= $proyek['nama_alat_pembayaran'] ?></p>

            <!-- TOTAL GAJI KULI -->
            <p>Total Gaji Kuli : Rp. <?= number_format($proyek['total_gaji_kuli']) ?></p>

            <!-- TOTAL GAJI MANDOR -->
            <p>Total Gaji Mandor : Rp. <?= number_format($proyek['total_gaji_mandor']) ?></p>

            <!-- TOTAL BIAYA -->
            <p>Total Biaya : Rp. <?= number_format($proyek['total_biaya']) ?></p>
        </div>
    </div>

</body>

</html>