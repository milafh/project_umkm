-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2022 pada 09.26
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promosi_produk_umkm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `nama`) VALUES
(1, 'Frozen Food'),
(2, 'Snack'),
(4, 'Korean Food');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `produk_id` int(11) NOT NULL,
  `suplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `tanggal`, `jumlah`, `harga`, `produk_id`, `suplier_id`) VALUES
(1, '2022-06-12', 20, 100000, 9, 1),
(2, '2022-06-12', 50, 30000, 2, 2),
(3, '2022-07-07', 200, 1000000, 9, 1),
(4, '2021-11-02', 120, 2300000, 8, 3),
(5, '2022-06-02', 100, 2000000, 1, 3),
(6, '2022-06-16', 50, 2500000, 12, 1),
(7, '2022-05-04', 120, 1200000, 13, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `jumlah`, `users_id`, `produk_id`) VALUES
(1, '2022-06-12', 1, 2, 2),
(2, '2022-07-06', 100, 3, 8),
(3, '2022-07-06', 100, 3, 1),
(4, '2022-07-06', 100, 3, 2),
(5, '2022-07-07', 2, 4, 1),
(6, '2022-07-07', 3, 5, 8),
(7, '2022-07-07', 10, 4, 9),
(8, '2022-07-07', 5, 5, 12),
(9, '2022-07-07', 2, 5, 8),
(10, '2022-07-07', 2, 5, 8),
(11, '2022-07-07', 2, 5, 8),
(12, '2022-07-07', 2, 5, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode` varchar(4) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `jenis_id` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kode`, `nama`, `stok`, `harga_beli`, `harga_jual`, `foto`, `jenis_id`, `deskripsi`) VALUES
(1, 'KR00', 'Tteokbokki', 10, 100000, 20000, '1657166542koreanf1.jpg', 4, 'Tteokbokki adalah hidangan Korea berupa tepung beras yang dimasak dalam bumbu gochujang yang pedas dan manis. Tepung beras yang dipakai berbentuk bulat batang yang memanjang.'),
(2, 'FF01', 'Sosis so nice 500mg', 10, 30000, 50000, '1657166600frosen2.jpg', 1, 'Sosis adalah suatu makanan yang terbuat dari daging cincang, lemak hewan, ternak dan rempah, serta bahan-bahan lain dengan bahan bahan yang halal dan bernutrisi'),
(8, 'KR02', 'Kimchi Korea', 151, 150001, 250001, '1657167514kimchi.jpg', 2, 'Kimci adalah makanan tradisional Korea berupa asinan sayur hasil fermentasi yang diberi bumbu pedas. Setelah digarami dan dicuci, sayuran dicampur dengan bumbu yang dibuat dari udang krill, kecap ikan, bawang putih, jahe dan bubuk cabai merah.'),
(9, 'S002', 'Basreng Daun Jeruk', 120, 10000, 15000, '1657167304basreng.jpg', 2, 'basreng yang tersedia dengan rasa pedas, asin, balado dan barbeque'),
(12, 'FF02', 'Crab Stick', 20, 15000, 25000, '1657167322frozen4.jpg', 1, 'Stik kepiting adalah makanan olahan dari surimi yang dibentuk dan diwarnai menjadi mirip kepiting. Meskipun secara bentuk dan warna menyerupai kepiting, tetapi rasanya lebih mirip baso atau sosis ikan, sebab memang bahan bakunya adalah daging ikan yang dilumatkan'),
(13, 'S003', 'Keripik Kaca', 150, 10000, 20000, '1657167348kripca.jpg', 2, 'Keripik kaca atau yang karib disebut kripca merupakan makanan ringan yang terbuat dari adonan tepung tapioka, garam, dan air. Punya cita rasa pedas hingga pedas manis, membuat kripca jadi salah satu cemilan kesukaan sebagian orang lantaran rasanya yang nagih.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kota` varchar(45) DEFAULT NULL,
  `kontak` varchar(30) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `telpon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id`, `nama`, `kota`, `kontak`, `alamat`, `telpon`) VALUES
(1, 'Fikri Food', 'Majalengka', 'Marissa', 'Jl. Musyawarah rt 12/04', '0210984622'),
(2, 'Rumah Cemilan', 'Depok', 'Ani hayati', 'Jl. Mufakat rt01/02', '0811234343'),
(3, 'fookorean', 'Jakarta', 'Kim da ra', 'jl. Sudirman ', '09283618123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `last_login`, `status`, `role`) VALUES
(1, 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 'admin@gmail.com', '2022-06-11 23:46:37', '2022-06-11 23:46:37', 1, 'administrator'),
(2, 'aminah', '90b74c589f46e8f3a484082d659308bd', 'aminah@gmail.com', '2022-06-11 23:47:09', '2022-06-11 23:47:09', 1, 'public'),
(3, 'azizah', 'd41d8cd98f00b204e9800998ecf8427e', 'azizah@gmail.com', '2022-07-06 08:44:31', NULL, 1, 'public'),
(4, 'siti', 'd41d8cd98f00b204e9800998ecf8427e', 'saag@gam.com', '2022-07-06 20:13:48', NULL, 1, 'public'),
(5, 'Luthfiyah', 'd41d8cd98f00b204e9800998ecf8427e', 'undefindcode@gmail.com', '2022-07-06 20:29:05', NULL, 1, 'public');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembelian_produk1_idx` (`produk_id`),
  ADD KEY `fk_pembelian_suplier1_idx` (`suplier_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pesanan_users1_idx` (`users_id`),
  ADD KEY `fk_pesanan_produk1_idx` (`produk_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`),
  ADD KEY `fk_produk_jenis_produk_idx` (`jenis_id`);

--
-- Indeks untuk tabel `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_pembelian_produk1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembelian_suplier1` FOREIGN KEY (`suplier_id`) REFERENCES `suplier` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan_produk1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pesanan_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_jenis_produk` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
