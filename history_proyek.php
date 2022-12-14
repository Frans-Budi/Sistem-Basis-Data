<?php
session_start();
require 'function.php';

// AMBIL ID
$id = $_SESSION['id_user'];

$query = "SELECT * FROM proyek
JOIN pembayaran ON (proyek.id = pembayaran.id_proyek)
JOIN transaksi ON (transaksi.id_pembayaran = pembayaran.id)
WHERE id_konsumen = $id";
$proyek = QueryData($query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="history_proyek.css">
    <title>History Proyek</title>

</head>

<body>
    <a href="index.php">
        <button>Back</button></a>

    <div class="null">

        <?php if (!$proyek) {
            echo "<br><br>";
            echo "Belum ada Proyek yang dibuat!";
            exit;
        } ?>
    </div>

    <h1>History Proyek Kamu</h1>

    <div class="container">

        <?php foreach ($proyek as $p) : ?>
            <a href="history_proyek_detail.php?id=<?= $p['id_proyek'] ?>">
                <div class="box">
                    <img src="images/<?= $p['gambar_proyek'] ?>">
                    <h2><?= $p['nama_proyek'] ?></h2>
                    <p><?= $p['tanggal'] ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

</body>

</html>