-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jul 2022 pada 18.04
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rakarts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `ft_barang` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(10) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nm_barang`, `ft_barang`, `deskripsi`, `harga`, `stok`, `tgl`) VALUES
(1, 'Attack on Titan - Health Protocol Levi', 'levi.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 0, '2022-07-02 10:38:15'),
(2, 'NEKOSHIBA - Shiba Daijoubu Inu', 'neko.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 24, '2022-07-02 10:38:15'),
(3, 'HxH/Hunter X Hunter - Killua Drink', 'killua.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 145000, 13, '2022-07-02 10:38:15'),
(4, 'Boku No Hero/BNHA - Todoroki Hero', 'todoroki.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 35, '2022-07-02 10:38:15'),
(5, 'Kimetsu no Yaiba - Cool Giyu', 'giyu.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 71, '2022-07-02 10:38:15'),
(6, 'Attack on Titan - Human are Virus', 'titan.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 58, '2022-07-02 10:38:15'),
(7, 'Kimetsu no Yaiba - Rengoku Tasty', 'rengoku.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 69, '2022-07-02 10:38:15'),
(8, 'Jujutsu Kaisen - Megumi Shiki', 'megumi.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 42, '2022-07-02 10:38:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `name`, `username`, `email`, `password`, `tgl`) VALUES
(1, 'Admin', 'admin', 'admin@rakarts.com', 'admin', '2022-07-02 12:58:09'),
(2, 'Super Admin', 'superadmin', 'superadmin@rakarts.com', 'superadmin', '2022-07-02 12:58:09'),
(3, 'User', 'user', 'user@gmail.com', 'user', '2022-07-02 12:58:09'),
(4, 'Bima', 'bimarakajati', 'bimandugal@gmail.com', 'bima', '2022-07-02 12:58:09'),
(5, 'Atha', 'athaard', 'siangmalamygy@gmail.com', '123', '2022-07-02 12:58:09'),
(6, 'Tasya', 'Tacoyy', 'tasyakh99@gmail.com', 'ltmltmltm', '2022-07-02 12:58:09'),
(7, 'Audwina', 'audwina', 'morikhaglp@gmail.com', 'akucantik', '2022-07-02 12:58:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesan` int(11) NOT NULL,
  `id_barang` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `alamat` text NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesan`, `id_barang`, `nama`, `email`, `hp`, `ukuran`, `jumlah`, `alamat`, `tgl`) VALUES
(1, 2, 'Bima Rakajati', 'bimandugal@gmail.com', '08123456789', 'XL', 1, 'Semarang', '2022-07-02 12:57:44'),
(2, 8, 'Bima', 'bima@gmail.com', '123', 'L', 5, 'Semarang', '2022-07-02 12:57:44'),
(3, 6, 'Raka', 'raka@gmail.com', '123', 'S', 1, 'Semarang', '2022-07-02 12:57:44'),
(4, 4, 'Jati', 'b.imandugal@gmail.com', '12345', 'S', 5, 'Coba', '2022-07-02 12:57:44'),
(5, 3, 'Killua', 'bima@gmail.com', '123', 'M', 4, 'Kukuroo', '2022-07-02 12:57:44'),
(6, 5, 'Giyuu', 'bimarakajati@outlook.com', '08123456789', 'M', 2, 'Demon Slayer', '2022-07-02 12:57:44'),
(7, 1, 'Levi', 'bimandugal@gmail.com', '12345', 'S', 4, 'Survey Corps', '2022-07-02 12:57:44'),
(8, 8, 'Fushiguro', 'bimandugal@gmail.com', '12345', 'M', 4, 'Tokyo', '2022-07-02 12:57:44'),
(9, 2, 'Affh Iyh', '111202013088@mhs.dinus.ac.id', '08123456789', 'S', 4, 'Semarang', '2022-07-02 12:57:44'),
(10, 1, 'Dicoba ygy', 'coba@gmail.com', '08123456789', 'S', 4, 'Coba', '2022-07-02 12:57:44'),
(11, 3, 'Terus Dicoba', 'bima@gmail.com', '12345', 'S', 1, 'Entah', '2022-07-02 12:57:44'),
(12, 7, 'Capek ygy', 'bimandugal@gmail.com', '08123456789', 'S', 3, 'Entah', '2022-07-02 12:57:44'),
(13, 1, 'Zoro', 'bima@gmail.com', '123', 'S', 4, 'East Blue', '2022-07-02 12:57:44'),
(14, 3, 'Sanji', 'raka@gmail.com', '1234567890', 'M', 5, 'North Blue', '2022-07-02 12:57:44'),
(15, 4, 'Luffy', 'raka@gmail.com', '1234567890', 'XL', 4, 'East Blue', '2022-07-02 12:57:44'),
(16, 3, 'atha', 'siangmalamygy@gmail.com', '12345678', 'S', 1, 'jauh', '2022-07-02 12:57:44'),
(17, 2, 'Tasya', 'tasyakh99@gmail.com', '081234567890', 'XL', 5, 'GDC', '2022-07-02 12:57:44'),
(18, 8, 'Audwina', 'morikhaglp@gmail.com ', '082241634974', 'L', 1, 'Jl. Antariksa I', '2022-07-02 12:57:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `idtamu` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`idtamu`, `nama`, `email`, `pesan`, `tgl`) VALUES
(1, 'Bima', 'bima@gmail.com', 'Bismillah', '2022-07-02 12:57:23'),
(2, 'Raka', 'raka@gmail.com', 'Lancar', '2022-07-02 12:57:23'),
(3, 'Jati', 'jati@gmail.com', 'UAS', '2022-07-02 12:57:23'),
(4, 'Tasya Kiyowo', 'tasyakiyowo@gmail.com', 'Woeee', '2022-07-02 12:57:23'),
(5, 'Audwina', 'morikhaglp@gmail.com', 'Cantik', '2022-07-02 12:57:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`idtamu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `idtamu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
