-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 11:51 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_komputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_akun`
--

CREATE TABLE `m_akun` (
  `ID_akun` int(11) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `jenis_akun` int(2) NOT NULL,
  `status_akun` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_akun`
--

INSERT INTO `m_akun` (`ID_akun`, `nama_akun`, `username`, `password`, `jenis_akun`, `status_akun`) VALUES
(1, 'hasim', 'admin', 'YWRtaW4=', 1, 1),
(2, 'Revi Widiastutik', 'revi', 'cmV2aQ==', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_masuk`
--

CREATE TABLE `tbl_service_masuk` (
  `ID_masuk` int(20) NOT NULL,
  `ID_akun` int(20) NOT NULL,
  `ID_service` int(20) NOT NULL,
  `masuk_tgl` date NOT NULL,
  `masuk_serial` varchar(100) NOT NULL,
  `masuk_kelengkapan` text NOT NULL,
  `masuk_biaya_dp` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_masuk`
--

INSERT INTO `tbl_service_masuk` (`ID_masuk`, `ID_akun`, `ID_service`, `masuk_tgl`, `masuk_serial`, `masuk_kelengkapan`, `masuk_biaya_dp`) VALUES
(3, 1, 2, '2022-05-20', '123456789', 'charger', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_pengeluaran`
--

CREATE TABLE `tbl_service_pengeluaran` (
  `ID_pengeluaran` int(20) NOT NULL,
  `ID_akun` int(20) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `nama_pengeluaran` varchar(255) NOT NULL,
  `biaya_pengeluaran` int(50) NOT NULL,
  `keterangan_pengeluaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_proses`
--

CREATE TABLE `tbl_service_proses` (
  `ID_proses` int(11) NOT NULL,
  `ID_akun` int(20) NOT NULL,
  `ID_service` int(20) NOT NULL,
  `proses_tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_proses`
--

INSERT INTO `tbl_service_proses` (`ID_proses`, `ID_akun`, `ID_service`, `proses_tgl`) VALUES
(1, 1, 2, '2022-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_request`
--

CREATE TABLE `tbl_service_request` (
  `ID_service` int(20) NOT NULL,
  `ID_akun` int(20) NOT NULL,
  `KODE_service` varchar(255) NOT NULL,
  `tgl_request` date NOT NULL,
  `request_nama` varchar(255) NOT NULL,
  `request_rusak` text NOT NULL,
  `request_biaya` int(50) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `request_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_request`
--

INSERT INTO `tbl_service_request` (`ID_service`, `ID_akun`, `KODE_service`, `tgl_request`, `request_nama`, `request_rusak`, `request_biaya`, `nama_pelanggan`, `request_status`) VALUES
(2, 1, '202205206274', '2022-05-20', 'Keyboard Asus X450C', 'Mati Total', 100000, 'Revi Widiastutik', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_terima`
--

CREATE TABLE `tbl_service_terima` (
  `ID_terima` int(11) NOT NULL,
  `ID_akun` int(20) NOT NULL,
  `ID_service` int(20) NOT NULL,
  `terima_tgl` date NOT NULL,
  `terima_biaya` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_akun`
--
ALTER TABLE `m_akun`
  ADD PRIMARY KEY (`ID_akun`);

--
-- Indexes for table `tbl_service_masuk`
--
ALTER TABLE `tbl_service_masuk`
  ADD PRIMARY KEY (`ID_masuk`);

--
-- Indexes for table `tbl_service_pengeluaran`
--
ALTER TABLE `tbl_service_pengeluaran`
  ADD PRIMARY KEY (`ID_pengeluaran`);

--
-- Indexes for table `tbl_service_proses`
--
ALTER TABLE `tbl_service_proses`
  ADD PRIMARY KEY (`ID_proses`);

--
-- Indexes for table `tbl_service_request`
--
ALTER TABLE `tbl_service_request`
  ADD PRIMARY KEY (`ID_service`);

--
-- Indexes for table `tbl_service_terima`
--
ALTER TABLE `tbl_service_terima`
  ADD PRIMARY KEY (`ID_terima`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_akun`
--
ALTER TABLE `m_akun`
  MODIFY `ID_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_service_masuk`
--
ALTER TABLE `tbl_service_masuk`
  MODIFY `ID_masuk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_service_pengeluaran`
--
ALTER TABLE `tbl_service_pengeluaran`
  MODIFY `ID_pengeluaran` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_service_proses`
--
ALTER TABLE `tbl_service_proses`
  MODIFY `ID_proses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_service_request`
--
ALTER TABLE `tbl_service_request`
  MODIFY `ID_service` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_service_terima`
--
ALTER TABLE `tbl_service_terima`
  MODIFY `ID_terima` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
