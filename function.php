<?php

$conn = mysqli_connect("localhost", "root", "", "kuliku");

function QueryData($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function register($data)
{
    global $conn;
    // Deklarasi Variable
    $tipe = $data['tipe'];
    $nama = htmlspecialchars($_POST['nama']);
    $no_hp = htmlspecialchars($_POST['no_hp']);
    $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
    $tanggal_lahir = htmlspecialchars($data['tanggal_lahir']);
    $alamat_ktp = htmlspecialchars($_POST['alamat_ktp']);
    $domisili = htmlspecialchars($_POST['domisili']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);

    // stripslashes --> slash (\) tidak dimasukkan
    // Kerana email bersifat insensiftive case
    $email = strtolower(stripslashes($email));
    $password = mysqli_real_escape_string($conn, $password);


    // Cek email sudah terdaftar atau belum
    $query = "SELECT * FROM konsumen WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Email Sudah Terdaftar!');
            </script>";
        return false;
    }

    // Cek no_hp sudah terdaftar atau belum
    $query = "SELECT * FROM konsumen WHERE no_hp = '$no_hp'";
    $result = mysqli_query($conn, $query);

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Nomor Handphone Sudah Terdaftar!');
            </script>";
        return false;
    }


    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // Tambahkan user Terbaru ke Database
    $query = "INSERT INTO konsumen VALUES (
        '' , '$tipe' , '$nama' , '$email' , '$no_hp' ,
        '$tanggal_lahir' , '$tempat_lahir' , '$alamat_ktp' , '$domisili' , '$password'  
    )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahDataMitra($data)
{
    global $conn;
    // Ambil Data
    $tipe = $data['tipe'];
    $nama = htmlspecialchars($data['nama']);
    $nik = htmlspecialchars($data['nik']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
    $tanggal_lahir = $data['tanggal_lahir'];
    $domisili = htmlspecialchars($data['domisili']);
    $alamat_ktp = htmlspecialchars($data['alamat_ktp']);
    $email = htmlspecialchars($data['email']);

    // AMBIL DATA KEAHLIAN DARI INPUTAN USER


    // AMBIL DATA KEAHLIAN DARI DATABASE
    $query = "SELECT * FROM keahlian";
    $keahlian = QueryData($query);

    // INSERT KULI
    $query = "INSERT INTO mitra VALUES (
        '' , '$nik' , '$nama' , '$email' , '$no_hp' ,'$tanggal_lahir' , '$tempat_lahir' , '$alamat_ktp' , '$domisili' , '$tipe'

        )";
    mysqli_query($conn, $query);

    // AMBIL DATA MITRA
    $query = "SELECT * FROM mitra WHERE email = '$email'";
    $id_kuli = (int) QueryData($query)[0]['id'];

    // INSERT KEAHLIAN_MITRA
    foreach ($keahlian as $value) {
        // Cek apakah keahlian di Ceklis
        $id_keahlian = (int) $value['id'];
        // $nama = $value["jenis_keahlian"];

        if (isset($data[$id_keahlian])) {
            $query = "INSERT INTO keahlian_mitra VALUES (
                    $id_kuli , $id_keahlian
                )";
            mysqli_query($conn, $query);
        }
    }

    return mysqli_affected_rows($conn);
}

function hapusDataMitra($id)
{
    global $conn;

    $query = "DELETE FROM mitra WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubahMitra($data)
{
    global $conn;

    // AMBIL DATA
    $id = $data['id'];
    $tipe = $data['tipe'];
    $nama = htmlspecialchars($data['nama']);
    $nik = htmlspecialchars($data['nik']);
    $no_hp = htmlspecialchars($data['no_hp']);
    $tempat_lahir = htmlspecialchars($data['tempat_lahir']);
    $tanggal_lahir = $data['tanggal_lahir'];
    $alamat_ktp = htmlspecialchars($data['alamat_ktp']);
    $domisili = htmlspecialchars($data['domisili']);
    $email = htmlspecialchars($data['email']);

    // UPDATE DATA KULI
    $query = "UPDATE mitra SET 
        id = $id , 
        nik = '$nik' , 
        nama = '$nama' ,
        email = '$email' , 
        no_hp = '$no_hp' , 
        tanggal_lahir = '$tanggal_lahir' ,
        temppat_lahir = '$tempat_lahir' , 
        alamat_KTP = '$alamat_ktp' , 
        domisili = '$domisili',
        tipe = '$tipe'
        WHERE id = $id;
    ";
    mysqli_query($conn, $query);

    // UPDATE DATA KEAHLIAN MITRA DENGAN CARA
    // DELETE DATA KEAHLIAN MITRA
    $query = "DELETE FROM keahlian_mitra WHERE id_kuli = $id";
    mysqli_query($conn, $query);

    // AMBIL DATA KEAHLIAN DARI DATABASE
    $query = "SELECT * FROM keahlian";
    $keahlian = QueryData($query);

    // INSERT DATA KEAHLIAN MITRA
    foreach ($keahlian as $value) {
        // Cek apakah keahlian di Ceklis
        $id_keahlian = (int) $value['id'];
        // $nama = $value["jenis_keahlian"];

        if (isset($data[$id_keahlian])) {
            $query = "INSERT INTO keahlian_mitra VALUES (
                    $id , $id_keahlian
                )";
            mysqli_query($conn, $query);
        }
    }



    return mysqli_affected_rows($conn);
}

function serach($keyword)
{
    global $conn;

    $query = "SELECT * FROM mitra WHERE
                nik LIKE '%$keyword%' OR
                nama LIKE '%$keyword%' OR
                email LIKE '%$keyword%' OR
                no_hp LIKE '%$keyword%' OR
                tanggal_lahir LIKE '%$keyword%' OR
                temppat_lahir LIKE '%$keyword%' OR
                alamat_KTP LIKE '%$keyword%' OR
                domisili LIKE '%$keyword%' OR
                tipe LIKE '%$keyword%'
    ";

    return QueryData($query);
}

function tambahProyek($data, $id)
{
    global $conn;
    global $id;

    // Ambil Data dari 'index.php'
    $id = (int) $id;
    $tipe = $data['tipe'];
    $nama = htmlspecialchars($data['nama_proyek']);
    $deskripsi = htmlspecialchars($data['deskripsi']);
    $jml_kuli = (int) htmlspecialchars($data['jml_kuli']);
    $jml_mandor = (int) htmlspecialchars($data['jml_mandor']);

    // Upload Gambar
    $gambar = upload();

    if (!$gambar) {
        return false;
    }

    // INSERT DATA PROYEK
    $query = "INSERT INTO proyek VALUES (
        '' , '$tipe' , '$gambar' , '$nama' , $jml_kuli ,
        $id , '$deskripsi' , $jml_mandor
    )";
    mysqli_query($conn, $query);

    // AMBIL DATA KEAHLIAN dan ID PROYEK
    $keahlian = QueryData("SELECT * FROM keahlian");
    $id_proyek = (int) QueryData("SELECT id FROM proyek ORDER BY id DESC LIMIT 1")[0]['id'];

    //INSERT KEAHLIAN PROYEK
    foreach ($keahlian as $k) {
        $id_keahlian = (int) $k['id'];

        // INSERT HANYA YANG DICEKLIS
        if (isset($data[$id_keahlian])) {
            $query = "INSERT INTO proyek_keahlian VALUES (
                $id_proyek , $id_keahlian
            )";
            mysqli_query($conn, $query);
        }
    }

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tempName = $_FILES['gambar']['tmp_name'];

    // Jika Gambar belum di upload
    if ($error === 4) {
        echo "<script>
                alert('Harus ada Gambar yang diupload');
            </script>";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Tolong Hanya memasukkan Gambar Saja');
            </script>";
        return false;
    }

    // Cek Apakah ukuran file yang diupload lebih dari 2 Mb
    if ($ukuranFile > 2000000) {
        echo "<script>
                alert('File yang dimasukkan Tidak boleh lebih dari 2 mb');
            </script>";
        return false;
    }

    // Jika Lolos dari semua seleksi
    // Generate nama file Baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tempName, 'images/' . $namaFileBaru);

    return $namaFileBaru;
}

function tambahPembayaran($data, $no_pembayaran)
{
    global $conn;

    // AMBIL DATA METODE PEMBAYARAN
    $met_pem = $data['met_pembayaran'];
    $no_pem = $no_pembayaran;
    $t_biaya = $data['tBiaya'];
    $t_gajiKuli = $data['tGajiKuli'];
    $t_gajiMandor = $data['tGajiMandor'];
    $id_proyek = $data['id_proyek'];

    // INSERT DATA KE TALBE PEMBAYARAN
    $query = "INSERT INTO pembayaran VALUES(
        '' , '$no_pem' , '$t_biaya' , '$id_proyek' ,
        '$met_pem' , '$t_gajiKuli' , '$t_gajiMandor'
    )";
    mysqli_query($conn, $query);

    // AMBIL ID PEMBAYARAN
    $id_pembayaran = (int) QueryData("SELECT * FROM pembayaran WHERE no_pembayaran = '$no_pem'")[0]['id'];

    // GENERATE CURRENT TIME
    $currentTime = date("Y-m-d h:i:s", time());

    //INSERT DATA KE TABLE TRANSAKSI
    $query = "INSERT INTO transaksi VALUES(
        '' , '$currentTime' , $id_pembayaran
    )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
