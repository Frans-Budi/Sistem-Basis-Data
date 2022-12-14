-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20221207.ce5ce76a8d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2022 pada 16.05
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Kuliku', 'kuliku@gmail.com', 'password');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji_mitra`
--

CREATE TABLE `gaji_mitra` (
  `id` int(11) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `gaji` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gaji_mitra`
--

INSERT INTO `gaji_mitra` (`id`, `tipe`, `gaji`) VALUES
(1, 'Kuli', 112000),
(2, 'Mandor', 210000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keahlian`
--

CREATE TABLE `keahlian` (
  `id` int(11) NOT NULL,
  `jenis_keahlian` varchar(100) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keahlian`
--

INSERT INTO `keahlian` (`id`, `jenis_keahlian`, `tipe`) VALUES
(1, 'Pengecoran', 'Kuli'),
(2, 'Finishing', 'Kuli'),
(3, 'Tukang Aluminium', 'Kuli'),
(4, 'Tukang Batu', 'Kuli'),
(5, 'Tukang Bekisting', 'Kuli'),
(6, 'Tukang Besi', 'Kuli'),
(7, 'Tukang Cor', 'Kuli'),
(8, 'Arsitek', 'Kuli'),
(9, 'Tukang Granit dan Mamer', 'Kuli'),
(10, 'Tukang Hitung / Sarjana Teknik Sipil', 'Kuli'),
(11, 'Tukang Kebersihan', 'Kuli'),
(12, 'Tukang Plumbing', 'Kuli'),
(13, 'Tukang Ukur / Surveyor / Uizet', 'Kuli'),
(14, 'Hunian', 'Mandor'),
(15, 'Sipil', 'Mandor'),
(16, 'Bangunan Industri', 'Mandor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keahlian_mitra`
--

CREATE TABLE `keahlian_mitra` (
  `id_kuli` int(11) NOT NULL,
  `id_keahlian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keahlian_mitra`
--

INSERT INTO `keahlian_mitra` (`id_kuli`, `id_keahlian`) VALUES
(1, 1),
(1, 2),
(12, 1),
(12, 2),
(12, 8),
(9, 2),
(9, 3),
(9, 5),
(21, 4),
(21, 8),
(21, 10),
(21, 11),
(24, 14),
(24, 15),
(31, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id` int(11) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `temppat_lahir` varchar(100) NOT NULL,
  `alamat_KTP` text NOT NULL,
  `domisili` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id`, `tipe`, `nama`, `email`, `no_hp`, `tanggal_lahir`, `temppat_lahir`, `alamat_KTP`, `domisili`, `password`) VALUES
(3, 'Pribadi', 'Fazry', 'fazry@gmail.com', '083256981543', '2022-12-01', 'Tasikmalaya', 'Jl. Sl Tobing', 'Jl. Sl Tobing', '$2y$10$JccMJjzKlDiwVuUQxYPqRuFsba7RGugHzqnZFoUGN4gqpar7elws2'),
(4, 'Bisnis', 'Teuku Khairul Amrik', 'teuku@gmail.com', '08893124', '2022-12-01', 'Binjai', 'as dfnasd ffdvcfdgvcsdf brstbgfbvcb', 'cbvx bvcgfhtyhtgbfxfgsdrthtyjtbgfvfrtfdfgcv', '$2y$10$rrj25V89lCNnmcRwl0VL7e7lIIIoZd83ZRxbVNl2mon3.Ovo2IBYe'),
(5, 'Bisnis', 'Mizan', 'mizan@gmail.com', '082359863432', '2022-12-05', 'Bandung', 'Jl. Anggur no 10', 'Jl. Anggur no 10', '$2y$10$/SmQ/1vF7S1AZbMxuw.OEOGdx/Hl4PZWTBqMF76Z3jXzR9ExvoNwK'),
(6, 'Pribadi', 'Ariq', 'ariq@gmail.com', '0832641340', '2022-12-06', 'Jakarta', 'Jl. Surya', 'Jl. Surya', '$2y$10$L0mztL.f9P98WK3qFQjjPuGoQ..ldAfMO40dMYYuTSq9D6Qikyg3W'),
(7, 'Pribadi', 'Akmal', 'akmal@gmail.com', '0842386534', '2022-12-10', 'Cirebon', 'Jl. Mangkubumi', 'Jl. Mangkubumi', '$2y$10$pVvafOWWZIpou3k73HteK.SxkxD/J4Mk2vXgTp5iD8Xno7ADwt.c6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id` char(5) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `nama_alat_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id`, `jenis_pembayaran`, `nama_alat_pembayaran`) VALUES
('B.BCA', 'BANK', 'BCA'),
('B.BNI', 'BANK', 'BNI'),
('B.BRI', 'BANK', 'BRI'),
('B.BSI', 'BANK', 'BSI'),
('B.MAN', 'BANK', 'MANDIRI'),
('UDDNA', 'UANG DIGITAL', 'DANA'),
('UDGPY', 'UANG DIGITAL', 'GO-PAY'),
('UDLKA', 'UANG DIGITAL', 'LINK-AJA'),
('UDOVO', 'UANG DIGITAL', 'OVO'),
('UDPPL', 'UANG DIGITAL', 'PAYPAL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id` int(11) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `temppat_lahir` varchar(100) NOT NULL,
  `alamat_KTP` text NOT NULL,
  `domisili` text NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id`, `nik`, `nama`, `email`, `no_hp`, `tanggal_lahir`, `temppat_lahir`, `alamat_KTP`, `domisili`, `tipe`) VALUES
(1, '32457263823', 'Asep', 'asep@gmail.com', '0843712875634', '2022-12-04', 'Tasikmalaya', 'Jl. Durian no 3', 'Jl. Semangka no 10', 'Kuli'),
(9, '789432367654', 'Jhonson', 'jhonson@gmail.com', '08326876432', '2022-12-04', 'Bandung', 'Jl. Semangka no 01', 'Jl. Semangka no 01', 'Mandor'),
(12, '3464232543', 'Toni', 'toni@gmail.com', '08432817432534', '2022-12-06', 'Yogyakarta', 'Jl. Yakult edit', 'Jl. Yakult', 'Kuli'),
(21, '35426254', 'Farhan', 'farhan@gmail.com', '0839185713485', '2022-12-07', 'Yogyakarta', 'Jl. Singa', 'Jl. Singa', 'Kuli'),
(24, '391853278942', 'Misa Ana', 'misa@gmail.com', '0841398513948', '2022-12-07', 'Medan', 'Jl. kampung sebelah', 'Jl. kampung sebelah', 'Kuli'),
(31, '35437662435', 'Budiawan', 'budiawan@gmail.com', '0834163256349', '2022-12-07', 'Binjai', 'Jl. Sudirman gdsfg', 'Jl. Sudirman', 'Mandor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra_kuliku`
--

CREATE TABLE `mitra_kuliku` (
  `id_kuli` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `no_pembayaran` varchar(100) NOT NULL,
  `total_biaya` bigint(20) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_metode_pembayaran` char(5) NOT NULL,
  `total_gaji_kuli` int(10) UNSIGNED NOT NULL,
  `total_gaji_mandor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `no_pembayaran`, `total_biaya`, `id_proyek`, `id_metode_pembayaran`, `total_gaji_kuli`, `total_gaji_mandor`) VALUES
(13, '6393fa36b7f9f', 784000, 23, 'B.BCA', 672000, 112000),
(14, '63940846b4bba', 3024000, 26, 'B.BRI', 2800000, 224000),
(15, '63943557b24df', 224000, 27, 'UDGPY', 224000, 0),
(16, '639437f9d38cd', 672000, 28, 'B.BCA', 560000, 112000),
(17, '63943dcedd02d', 112000, 29, 'B.BNI', 112000, 0),
(18, '6394554a6bae8', 112000, 30, 'B.BSI', 112000, 0),
(19, '6395e8e98a019', 224000, 31, 'B.BSI', 224000, 0),
(20, '6396fe81667df', 112000, 35, 'UDOVO', 112000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id` int(11) NOT NULL,
  `tipe_proyek` varchar(100) NOT NULL,
  `gambar_proyek` varchar(255) DEFAULT NULL,
  `nama_proyek` varchar(255) NOT NULL,
  `jumlah_kuli` int(10) UNSIGNED DEFAULT NULL,
  `id_konsumen` int(11) NOT NULL,
  `deskripsi_proyek` text DEFAULT NULL,
  `jumlah_mandor` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id`, `tipe_proyek`, `gambar_proyek`, `nama_proyek`, `jumlah_kuli`, `id_konsumen`, `deskripsi_proyek`, `jumlah_mandor`) VALUES
(23, 'Bangun', '6391bb7d8caea.jpg', 'Asep', 6, 4, 'dsamfanv apovncxvnrenpcv', 1),
(26, 'Bangun', '639408343c40e.jpg', 'Perumahan Adalusia', 25, 4, 'Proyek Ambisius bersekala besar', 2),
(27, 'Renovasi', '63943539c9973.jpg', 'Renovasi Pagar Rumah', 2, 4, 'Rumah Saya Harus punya pagar soalnya rentan maling', 0),
(28, 'Bangun', '639437f4501ef.jpg', 'Perpustakaan', 5, 3, 'Mau Bangun perpustakaan untuk mahasiswa', 1),
(29, 'Perbaikan', '63943dacc95a0.jpg', 'Atap Bocor', 1, 7, 'Au ahh', 0),
(30, 'Bangun', '6394552b6713a.jpg', 'Kandang Kucing', 1, 3, 'Biar KUcing sejahtera', 0),
(31, 'Bangun', '6395e8bb47c7d.jpg', 'Kandang Semut', 2, 4, 'Cafe ditanah 10 x 20 berbentuk seperti kadang semut', 0),
(35, 'Bangun', '6396fe73004ee.jpg', 'xxx', 1, 4, 'df', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek_keahlian`
--

CREATE TABLE `proyek_keahlian` (
  `id_proyek` int(11) NOT NULL,
  `id_keahlian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `proyek_keahlian`
--

INSERT INTO `proyek_keahlian` (`id_proyek`, `id_keahlian`) VALUES
(23, 1),
(23, 2),
(23, 5),
(23, 6),
(23, 15),
(26, 2),
(26, 3),
(26, 4),
(26, 8),
(26, 9),
(26, 10),
(26, 15),
(26, 16),
(27, 3),
(27, 6),
(28, 2),
(28, 3),
(28, 4),
(28, 9),
(28, 15),
(29, 7),
(30, 2),
(31, 1),
(31, 3),
(31, 6),
(31, 13),
(35, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `id_pembayaran`) VALUES
(11, '2022-12-09 21:17:10', 13),
(12, '2022-12-09 22:17:10', 14),
(13, '2022-12-10 01:29:27', 15),
(14, '2022-12-10 01:40:41', 16),
(15, '2022-12-10 02:05:34', 17),
(16, '2022-12-10 03:45:46', 18),
(17, '2022-12-10 20:27:53', 19),
(18, '2022-12-12 04:12:17', 20);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- Indeks untuk tabel `gaji_mitra`
--
ALTER TABLE `gaji_mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keahlian`
--
ALTER TABLE `keahlian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keahlian_mitra`
--
ALTER TABLE `keahlian_mitra`
  ADD KEY `fk_keahlian_kuli_kuli` (`id_kuli`),
  ADD KEY `fk_keahlian_kuli_keahlian` (`id_keahlian`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD UNIQUE KEY `no_hp_unique` (`no_hp`);

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_alat_pembayaran_unique` (`nama_alat_pembayaran`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD UNIQUE KEY `no_hp_unique` (`no_hp`);

--
-- Indeks untuk tabel `mitra_kuliku`
--
ALTER TABLE `mitra_kuliku`
  ADD KEY `fk_mitra_kuli_kuli` (`id_kuli`),
  ADD KEY `fk_mitra_kuli_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_proyek` (`id_proyek`),
  ADD KEY `fk_pembayaran_metode_pembayaran` (`id_metode_pembayaran`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proyek_konsumen` (`id_konsumen`);

--
-- Indeks untuk tabel `proyek_keahlian`
--
ALTER TABLE `proyek_keahlian`
  ADD KEY `fk_proyek_keahlian_proyek` (`id_proyek`),
  ADD KEY `fk_proyek_keahlian_keahlian` (`id_keahlian`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaksi_pembayaran` (`id_pembayaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `gaji_mitra`
--
ALTER TABLE `gaji_mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keahlian`
--
ALTER TABLE `keahlian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keahlian_mitra`
--
ALTER TABLE `keahlian_mitra`
  ADD CONSTRAINT `fk_keahlian_kuli_keahlian` FOREIGN KEY (`id_keahlian`) REFERENCES `keahlian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_keahlian_kuli_kuli` FOREIGN KEY (`id_kuli`) REFERENCES `mitra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mitra_kuliku`
--
ALTER TABLE `mitra_kuliku`
  ADD CONSTRAINT `fk_mitra_kuli_kuli` FOREIGN KEY (`id_kuli`) REFERENCES `mitra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mitra_kuli_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_metode_pembayaran` FOREIGN KEY (`id_metode_pembayaran`) REFERENCES `metode_pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembayaran_proyek` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD CONSTRAINT `fk_proyek_konsumen` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `proyek_keahlian`
--
ALTER TABLE `proyek_keahlian`
  ADD CONSTRAINT `fk_proyek_keahlian_keahlian` FOREIGN KEY (`id_keahlian`) REFERENCES `keahlian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_proyek_keahlian_proyek` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_pembayaran` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
