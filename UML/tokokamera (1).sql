-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2019 pada 12.47
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokokamera`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `kd_admin` int(5) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`kd_admin`, `nama_admin`, `alamat`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksesoris`
--

CREATE TABLE `aksesoris` (
  `id_aksesoris` int(11) NOT NULL,
  `file_aksesoris` varchar(30) DEFAULT NULL,
  `merk_aksesoris` varchar(50) NOT NULL,
  `tipe_aksesoris` varchar(50) NOT NULL,
  `kategori_aksesoris` varchar(50) NOT NULL,
  `deskripsi_aksesoris` varchar(500) DEFAULT NULL,
  `harga_aksesoris` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aksesoris`
--

INSERT INTO `aksesoris` (`id_aksesoris`, `file_aksesoris`, `merk_aksesoris`, `tipe_aksesoris`, `kategori_aksesoris`, `deskripsi_aksesoris`, `harga_aksesoris`) VALUES
(2, 'tripot_mini_.jpg', 'tripod', 'mini', 'accessories', 'gagang kamera', 350);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `kd_detail` int(5) NOT NULL,
  `harga_jual` double NOT NULL,
  `jumlah` double NOT NULL,
  `kd_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamera`
--

CREATE TABLE `kamera` (
  `id_kamera` int(11) NOT NULL,
  `file_kamera` varchar(30) DEFAULT NULL,
  `merk_kamera` varchar(50) NOT NULL,
  `tipe_kamera` varchar(50) NOT NULL,
  `kategori_kamera` varchar(50) NOT NULL,
  `deskripsi_kamera` varchar(500) DEFAULT NULL,
  `harga_kamera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamera`
--

INSERT INTO `kamera` (`id_kamera`, `file_kamera`, `merk_kamera`, `tipe_kamera`, `kategori_kamera`, `deskripsi_kamera`, `harga_kamera`) VALUES
(3, 'c_canon_m10.jpg', 'AA', 'BB', 'CC', 'DD', 341),
(4, 'c_nikon_d5500.jpg', 'Nikon', 'd5500', 'body camera', 'kamera ini adalah ,.......', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `kd_komentar` int(5) NOT NULL,
  `tgl_komentar` datetime NOT NULL,
  `kd_pelanggan` int(5) NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lensa`
--

CREATE TABLE `lensa` (
  `id_lensa` int(11) NOT NULL,
  `file_lensa` varchar(30) DEFAULT NULL,
  `merk_lensa` varchar(50) NOT NULL,
  `tipe_lensa` varchar(50) NOT NULL,
  `kategori_lensa` varchar(50) NOT NULL,
  `deskripsi_lensa` varchar(500) DEFAULT NULL,
  `harga_lensa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `fullname`, `email`, `password`, `phone`, `address`) VALUES
(1, 'bagas_da', 'Bagas', 'Bagas@gmail.com', 'atmaja', '082937123', 'Yogyakarta'),
(2, 'trondoll07', 'Agung', 'prayitnoa99@gmail.com', 'trndll07', '082345678910', 'YOGYAKARTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` int(5) NOT NULL,
  `total_trans` double NOT NULL,
  `tanggal_trans` datetime NOT NULL,
  `kd_admin` int(5) NOT NULL,
  `kd_pelanggan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indeks untuk tabel `aksesoris`
--
ALTER TABLE `aksesoris`
  ADD PRIMARY KEY (`id_aksesoris`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`kd_detail`),
  ADD KEY `transaksi` (`kd_transaksi`);

--
-- Indeks untuk tabel `kamera`
--
ALTER TABLE `kamera`
  ADD PRIMARY KEY (`id_kamera`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`kd_komentar`),
  ADD KEY `kd_pelanggan` (`kd_pelanggan`);

--
-- Indeks untuk tabel `lensa`
--
ALTER TABLE `lensa`
  ADD PRIMARY KEY (`id_lensa`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `pelanggan` (`kd_pelanggan`),
  ADD KEY `admin` (`kd_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `kd_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aksesoris`
--
ALTER TABLE `aksesoris`
  MODIFY `id_aksesoris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kamera`
--
ALTER TABLE `kamera`
  MODIFY `id_kamera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `kd_komentar` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lensa`
--
ALTER TABLE `lensa`
  MODIFY `id_lensa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_transaksi` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
