-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql212.epizy.com
-- Waktu pembuatan: 29 Jun 2022 pada 20.03
-- Versi server: 10.3.27-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_20700601_dbtamu`
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
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nm_barang`, `ft_barang`, `deskripsi`, `harga`, `stok`) VALUES
(1, 'Attack on Titan - Health Protocol Levi', 'levi.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 983),
(2, 'NEKOSHIBA - Shiba Daijoubu Inu', 'neko.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 986),
(3, 'HxH/Hunter X Hunter - Killua Drink', 'killua.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 145000, 983),
(4, 'Boku No Hero/BNHA - Todoroki Hero', 'todoroki.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 980),
(5, 'Kimetsu no Yaiba - Cool Giyu', 'giyu.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 990),
(6, 'Attack on Titan - Human are Virus', 'titan.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 990),
(7, 'Kimetsu no Yaiba - Rengoku Tasty', 'rengoku.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 952),
(8, 'Jujutsu Kaisen - Megumi Shiki', 'megumi.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 993);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `name`, `username`, `email`, `password`) VALUES
(4, 'Bima', 'bimarakajati', 'bimandugal@gmail.com', 'bima'),
(5, 'User', 'user', 'user@gmail.com', 'user'),
(6, 'atha', 'athaard', 'siangmalamygy@gmail.com', '123'),
(7, 'Tasya', 'Tacoyy', 'tasyakh99@gmail.com', 'ltmltmltm'),
(8, 'Admin', 'admin', 'admin@rakarts.com', 'admin'),
(9, 'Audwina', 'audwina', 'morikhaglp@gmail.com', 'akucantik');

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
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesan`, `id_barang`, `nama`, `email`, `hp`, `ukuran`, `jumlah`, `alamat`) VALUES
(1, 2, 'Bima Rakajati', 'bimandugal@gmail.com', '08123456789', 'XL', 1, 'Semarang'),
(2, 8, 'Bima', 'bima@gmail.com', '123', 'L', 5, 'Semarang'),
(4, 6, 'Raka', 'raka@gmail.com', '123', 'S', 1, 'Semarang'),
(7, 4, 'Jati', 'b.imandugal@gmail.com', '12345', 'S', 5, 'Coba'),
(8, 3, 'Killua', 'bima@gmail.com', '123', 'M', 4, 'Greed Island'),
(9, 5, 'Giyuu', 'bimarakajati@outlook.com', '08123456789', 'M', 2, 'Entah'),
(10, 1, 'Levi', 'bimandugal@gmail.com', '12345', 'S', 4, 'Entah'),
(23, 8, 'Fushiguro', 'bimandugal@gmail.com', '12345', 'M', 4, 'Greed Island'),
(24, 2, 'Affh Iyh', '111202013088@mhs.dinus.ac.id', '08123456789', 'S', 4, 'Semarang'),
(25, 1, 'Dicoba ygy', 'coba@gmail.com', '08123456789', 'S', 4, 'Coba'),
(26, 3, 'Terus Dicoba', 'bima@gmail.com', '12345', 'S', 1, 'Entah'),
(27, 7, 'Capek ygy', 'bimandugal@gmail.com', '08123456789', 'S', 3, 'Entah'),
(28, 1, 'Zoro', 'bima@gmail.com', '123', 'S', 4, 'Semarang'),
(29, 3, 'Sanji', 'raka@gmail.com', '1234567890', 'M', 5, 'Jauh Disana'),
(30, 4, 'Luffy', 'raka@gmail.com', '1234567890', 'XL', 4, 'Greed Island'),
(31, 3, 'atha', 'siangmalamygy@gmail.com', '12345678', 'S', 1, 'jauh'),
(46, 2, 'Tasya', 'tasyakh99@gmail.com', '081234567890', 'XL', 5, 'GDC'),
(47, 8, 'Audwina', 'morikhaglp@gmail.com ', '082241634974', 'L', 1, 'Jl. Antariksa I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `idtamu` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`idtamu`, `nama`, `email`, `pesan`) VALUES
(1, 'Bima', 'bima@gmail.com', 'Bismillah'),
(2, 'Raka', 'raka@gmail.com', 'Lancar'),
(3, 'Jati', 'jati@gmail.com', 'UAS'),
(7, 'Tasya Kiyowo', 'tasyakiyowo@gmail.com', 'Woeee kalo bisa di buku tamu email orang disensor'),
(8, 'Audwina', 'morikhaglp@gmail.com', 'Cantik');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `idtamu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
