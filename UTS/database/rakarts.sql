-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2022 pada 16.06
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
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nm_barang`, `ft_barang`, `deskripsi`, `harga`) VALUES
(1, 'Attack on Titan - Health Protocol Levi', 'levi.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(2, 'NEKOSHIBA - Shiba Daijoubu Inu', 'neko.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(3, 'HxH/Hunter X Hunter - Killua Drink', 'killua.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 145000),
(4, 'Boku No Hero/BNHA - Todoroki Hero', 'todoroki.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(5, 'Kimetsu no Yaiba - Cool Giyu', 'giyu.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(6, 'Attack on Titan - Human are Virus', 'titan.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(8, 'Kimetsu no Yaiba - Rengoku Tasty', 'rengoku.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000),
(9, 'Jujutsu Kaisen - Megumi Shiki', 'megumi.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesan`, `id_barang`, `nama`, `hp`, `jumlah`, `alamat`) VALUES
(1, 9, 'Bima Rakajati', '08123456789', 3, 'Semarang');

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
(1, 'Bima', 'bimandugal@gmail.com', 'Bismillah'),
(2, 'Raka', 'raka@gmail.com', 'Lolos'),
(3, 'Jati', 'jati@gmail.com', 'UTS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `idtamu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
