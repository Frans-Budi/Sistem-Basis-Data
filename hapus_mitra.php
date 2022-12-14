<?php

require 'function.php';

$id = $_GET['id'];

if (hapusDataMitra($id) > 0) {
    echo "<script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'admin_logic.php';
        </script>";
} else {
    echo "<script>
            alert('Terjadi Kesalahan, Data Gagal dihapus');
            document.location.href = 'admin_logic.php';
        </script>";
}
