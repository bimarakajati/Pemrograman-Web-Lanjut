-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2022 pada 02.24
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
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nm_barang`, `ft_barang`, `deskripsi`, `harga`, `stok`) VALUES
(1, 'Attack on Titan - Health Protocol Levi', 'levi.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 990),
(2, 'NEKOSHIBA - Shiba Daijoubu Inu', 'neko.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 995),
(3, 'HxH/Hunter X Hunter - Killua Drink', 'killua.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 145000, 994),
(4, 'Boku No Hero/BNHA - Todoroki Hero', 'todoroki.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 990),
(5, 'Kimetsu no Yaiba - Cool Giyu', 'giyu.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 997),
(6, 'Attack on Titan - Human are Virus', 'titan.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 994),
(7, 'Kimetsu no Yaiba - Rengoku Tasty', 'rengoku.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 956),
(8, 'Jujutsu Kaisen - Megumi Shiki', 'megumi.jpg', 'Kaos, Baju, Shirt, Anime, Hobby, Jepang', 140000, 995);

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
(3, 7, 'Coba', 'coba@gmail.com', '123456789', 'M', 3, 'Coba'),
(4, 6, 'Raka', 'raka@gmail.com', '123', 'S', 1, 'Semarang'),
(7, 4, 'Jati', 'b.imandugal@gmail.com', '12345', 'S', 5, 'Coba'),
(8, 3, 'Killua', 'bima@gmail.com', '123', 'M', 4, 'Greed Island'),
(9, 5, 'Giyuu', 'bimarakajati@outlook.com', '08123456789', 'M', 2, 'Entah'),
(10, 1, 'Levi', 'bimandugal@gmail.com', '12345', 'S', 4, 'Entah'),
(11, 4, 'Kumalala', 'bimarakajati@outlook.com', '08123456789', 'XL', 4, 'Savesta'),
(12, 7, 'Big Boss', '111202013088@mhs.dinus.ac.id', '08123456789', 'S', 4, 'Jauh Disana'),
(21, 7, 'Big Boss', '111202013088@mhs.dinus.ac.id', '08123456789', 'S', 4, 'Jauh Disana'),
(22, 6, 'Beat', 'bima@gmail.com', '123', 'S', 5, 'Coba'),
(23, 8, 'Fushiguro', 'bimandugal@gmail.com', '12345', 'M', 4, 'Greed Island'),
(24, 2, 'Affh Iyh', '111202013088@mhs.dinus.ac.id', '08123456789', 'S', 4, 'Semarang'),
(25, 1, 'Dicoba ygy', 'coba@gmail.com', '08123456789', 'S', 4, 'Coba'),
(26, 3, 'Terus Dicoba', 'bima@gmail.com', '12345', 'S', 1, 'Entah'),
(27, 7, 'Capek ygy', 'bimandugal@gmail.com', '08123456789', 'S', 3, 'Entah');

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
(1, 'Bima', '111202013088@mhs.dinus.ac.id', 'Bismillah'),
(2, 'Raka', 'raka@gmail.com', 'Lancar'),
(3, 'Jati', 'jati@gmail.com', 'UAS');

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `idtamu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
