<?php
require '../function.php';

// AMBIL DATA
$keyword = $_GET['keyword'];
$kuli = serach($keyword);

// Ambil Keahlian Kuli
$query = "SELECT id_kuli, jenis_keahlian FROM keahlian_mitra
JOIN keahlian ON (keahlian_mitra.id_keahlian = keahlian.id)";
$keahlian_kuli = QueryData($query);

?>

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