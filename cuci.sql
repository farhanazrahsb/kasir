-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Agu 2018 pada 15.54
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `no` int(8) NOT NULL,
  `id_admin` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`no`, `id_admin`, `nama`, `username`, `password`, `email`) VALUES
(1, 'A01', 'Farhan Azra Hasibuan', 'azra', 'azra', 'farhanazra90@gmail.com'),
(3, 'A02', 'Ahmad Fauzi', 'baagil', 'baagil', 'fauzi@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya`
--

CREATE TABLE `biaya` (
  `no` int(8) NOT NULL,
  `id_kend` varchar(10) NOT NULL,
  `jenis_kend` varchar(30) NOT NULL,
  `harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`no`, `id_kend`, `jenis_kend`, `harga`) VALUES
(1, 'B01', 'Mobil', '30000'),
(2, 'B02', 'Sepeda Motor', '15000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `no` int(8) NOT NULL,
  `id_kasir` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`no`, `id_kasir`, `nama`, `username`, `password`, `email`) VALUES
(1, 'K01', 'Farhan Azra Hasibuan', 'farhan', 'farhan', 'farhanazra90@gmail.com'),
(2, 'K02', 'Ahmad Fauzi', 'fauzi', 'fauzi', 'user@yahoo.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `no` int(8) NOT NULL,
  `tgl` varchar(15) NOT NULL,
  `kd_pegawai` varchar(10) NOT NULL,
  `id_kend` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`no`, `tgl`, `kd_pegawai`, `id_kend`) VALUES
(11, '2018-08-01', 'P02', 'B02'),
(12, '2018-08-01', 'P02', 'B01'),
(13, '2018-08-02', 'P03', 'B01'),
(14, '2018-08-02', 'P03', 'B01'),
(15, '2018-08-03', 'P03', 'B02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nama_usaha`
--

CREATE TABLE `nama_usaha` (
  `no` int(8) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nama_usaha`
--

INSERT INTO `nama_usaha` (`no`, `nama`) VALUES
(1, 'Aplikasi Cuci Kendaraan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `no` int(8) NOT NULL,
  `kd_pegawai` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`no`, `kd_pegawai`, `nama`, `no_hp`, `alamat`) VALUES
(1, 'P01', 'Farhan Azra Hasibuan', '085270163310', 'Jl. Akses UI'),
(2, 'P02', 'Ahmad Fauzi', '083122782813', 'Jl. Tanah Abang'),
(3, 'P03', 'Dendy', '082189890909', 'Jl. Mana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `no` int(8) NOT NULL,
  `plat` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_kend` varchar(10) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`no`, `plat`, `nama`, `id_kend`, `no_hp`, `alamat`) VALUES
(1, 'BL 3422 IAU', 'Aldo', 'B01', '083122782890', 'Jl. Margonda Raya'),
(3, 'B 1111 JAI', 'Farhan Azra', 'B02', '085270141190', 'Jl. Tebet'),
(4, 'B 3422 AU', 'Ahmad Fauzi', 'B01', '085270141189', 'Jl. Tanah Abang'),
(5, 'B 3521 PFC', 'Kiki', 'B02', '082199902222', 'Jl. Asal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no` int(8) NOT NULL,
  `tgl` varchar(15) NOT NULL,
  `plat` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `id_kend` varchar(10) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `bayar` varchar(10) NOT NULL,
  `kd_pegawai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no`, `tgl`, `plat`, `nama`, `no_hp`, `id_kend`, `harga`, `bayar`, `kd_pegawai`) VALUES
(28, '2018-08-01', 'B 1111 JAI', 'Farhan Azra', '085270141190', 'B02', '15000', '50000', 'P02'),
(29, '2018-08-01', 'BL 3422 IAU', 'Aldo', '083122782890', 'B01', '30000', '50000', 'P02'),
(30, '2018-08-02', 'b 2343 sdc', 'roy', '087623531232', 'B01', '30000', '40000', 'P03'),
(31, '2018-08-02', 'b 7461 rjr', 'monik', '9304832480', 'B01', '30000', '50000', 'P03'),
(32, '2018-08-03', 'b 857 jkl', 'sds', '656678998', 'B02', '15000', '50000', 'P03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `nama_usaha`
--
ALTER TABLE `nama_usaha`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `nama_usaha`
--
ALTER TABLE `nama_usaha`
  MODIFY `no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
