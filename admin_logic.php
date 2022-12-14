<?php
require 'function.php';

if (isset($_POST['register'])) {

    if (tambahDataMitra($_POST) > 0) {
        echo "<script>
                alert('Mitra Kuliku Berhasil Ditambahkan!');
            </script>";
    } else {
        echo "<script>
                alert('Terjadi Kesalahan, Mitra Gagal Ditambahkan!');
            </script>";
    }
}

// AMBIL DATA
$kuli = QueryData("SELECT * FROM mitra");

// Ambil Keahlian Kuli
$query = "SELECT id_kuli, jenis_keahlian FROM keahlian_mitra
JOIN keahlian ON (keahlian_mitra.id_keahlian = keahlian.id)";
$keahlian_kuli = QueryData($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin_logic.css">
    <title>Mitra Kuliku</title>
    <style>
        table,
        td,
        tr,
        th {
            border: 1px solid #000;
            border-collapse: collapse;
            padding: 0 10px;
        }
    </style>
</head>

<body>


    <div class="content">
        <div class="box">
            <a href="admin.php">
                <button>Kembali</button></a>

            <h1>Daftar Mitra Kuliku</h1>
            <center>
                <input type="search" name="keyword" id="keyword" size="40" placeholder="Search. . .">
            </center>
            <br>
            <div id="container">
                <table>
                    <tr>
                        <th>NO.</th>
                        <th>CONTROLLER</th>
                        <th>TIPE</th>
                        <th>NIK</th>
                        <th>NAMA</th>
                        <th>KEAHLIAN</th>
                        <th>EMAIL</th>
                        <th>NO. HANDPHONE</th>
                        <th>TEMPAT LAHIR</th>
                        <th>TANGGAL LAHIR</th>
                        <th>ALAMAT KTP</th>
                        <th>DOMISILI</th>
                    </tr>

                    <!-- DATA MITRA -->
                    <?php $i = 1 ?>
                    <?php foreach ($kuli as $m) : ?>
                        <tr>
                            <td>
                                <?= $i ?>
                            </td>
                            <td>
                                <a href="edit_mitra.php?id=<?= $m['id'] ?>">EDIT</a> |
                                <a href="hapus_mitra.php?id=<?= $m['id'] ?>" onclick="return confirm('Yakin?')">DELETE</a>
                            </td>
                            <td>
                                <?= $m['tipe'] ?>
                            </td>
                            <td>
                                <?= $m['nik'] ?>
                            </td>
                            <td>
                                <?= $m['nama'] ?>
                            </td>
                            <td>
                                <ul>
                                    <?php foreach ($keahlian_kuli as $kk) : ?>
                                        <?php if ($kk['id_kuli'] == $m['id']) : ?>
                                            <li><?= $kk['jenis_keahlian'] ?></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                            <td>
                                <?= $m['email'] ?>
                            </td>
                            <td>
                                <?= $m['no_hp'] ?>
                            </td>
                            <td>
                                <?= $m['temppat_lahir'] ?>
                            </td>
                            <td>
                                <?= $m['tanggal_lahir'] ?>
                            </td>
                            <td>
                                <?= $m['alamat_KTP'] ?>
                            </td>
                            <td>
                                <?= $m['domisili'] ?>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/cari.js"></script>
</body>

</html>