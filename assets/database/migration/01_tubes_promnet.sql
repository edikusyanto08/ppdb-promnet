-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2017 at 01:05 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes_promnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `nama_admin`, `username`, `password`) VALUES
(1, 'Ronaldo Simanjuntak', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `ID_alamat` int(11) NOT NULL,
  `ID_siswa` int(11) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `kota` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `ID_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(20) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `kuota_jurusan` int(11) NOT NULL,
  `KKM` int(11) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`ID_jurusan`, `kode_jurusan`, `nama_jurusan`, `kuota_jurusan`, `KKM`, `status`) VALUES
(1, 'JR001', 'Teknik Komputer dan Jaringan', 85, 88, 1),
(2, 'JR002', 'Rekayasa Perangkat Lunak', 90, 80, 1),
(3, 'JR003', 'Multimedia', 60, 75, 1),
(4, 'JR004', 'Farmasi', 70, 75, 1),
(5, 'JR005', 'Teknik Mesin', 70, 70, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `ID_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `ID_kota` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`ID_kecamatan`, `nama_kecamatan`, `ID_kota`) VALUES
(1, 'Sukasari', 2),
(2, 'Cikarang Utara', 5),
(3, 'Cikarang Barat', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `ID_kota` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `ID_provinsi` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`ID_kota`, `nama_kota`, `ID_provinsi`) VALUES
(1, 'Bogor', 1),
(2, 'Bandung', 1),
(3, 'Purwakarta', 1),
(4, 'Karawang', 1),
(5, 'Cikarang', 1),
(6, 'Garut', 1),
(7, 'Cimahi', 1),
(8, 'Cianjur', 1),
(9, 'Sukabumi', 1),
(10, 'Depok', 1),
(11, 'Banten', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `ID_log` int(11) NOT NULL,
  `ID_akses` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `Aksi` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`ID_log`, `ID_akses`, `user`, `Aksi`, `waktu`) VALUES
(8, 1, 'sekolah', 'Logged In', '2016-12-31 17:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `id_orangtua` int(11) NOT NULL,
  `ID_siswa` int(11) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `penghasilan_ayah` int(11) NOT NULL,
  `penghasilan_ibu` int(11) NOT NULL,
  `umur_ayah` int(11) NOT NULL,
  `umur_ibu` int(11) NOT NULL,
  `kontak_ayah` varchar(15) NOT NULL,
  `kontak_ibu` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan`
--

CREATE TABLE `persyaratan` (
  `ID_persyaratan` int(11) NOT NULL,
  `ID_siswa` int(11) NOT NULL,
  `Ijazah` varchar(100) NOT NULL,
  `SKHUN` varchar(100) NOT NULL,
  `KK` varchar(100) NOT NULL,
  `SKKB` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `ID_pilihan` int(11) NOT NULL,
  `ID_siswa` int(11) NOT NULL,
  `pilihan1` int(11) NOT NULL,
  `pilihan2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `ID_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`ID_provinsi`, `nama_provinsi`) VALUES
(1, 'Jawa Barat'),
(2, 'Jawa Timur'),
(3, 'Jawa Tengah'),
(4, 'DKI Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `ID_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `NPSN` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `kota` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `detail` longtext NOT NULL,
  `kontak` varchar(25) NOT NULL,
  `daerah` varchar(50) NOT NULL,
  `status_sekolah` varchar(20) NOT NULL,
  `akreditasi` varchar(5) NOT NULL,
  `status` int(11) DEFAULT '0',
  `log` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`ID_sekolah`, `nama_sekolah`, `NPSN`, `username`, `password`, `email`, `provinsi`, `kota`, `kecamatan`, `detail`, `kontak`, `daerah`, `status_sekolah`, `akreditasi`, `status`, `log`) VALUES
(1, 'SMPN 1 Bandung', '01234567', 'jngRxzccLx', '30d6bb93b0ea0f1ff897cb18d4d2ef76', 'simanjuntakronaldo3@gmail.com', 1, 2, 1, 'Jl cipedes atas no 81', '02112345678', 'perkotaan', 'Negeri', 'A', 1, 1),
(2, 'SMPN 4 BANDUNG', '123456', 'ztQbOmViHr', 'wflUu0lsa3', 'irmaayu13@gmail.com', 1, 2, 1, 'MANA AJA DEH', '08987654321', 'perkotaan', 'Negeri', 'A', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `ID_siswa` int(11) NOT NULL,
  `NISN` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `ID_sekolah` int(11) NOT NULL,
  `status_pendaftaran` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`ID_siswa`, `NISN`, `nama_lengkap`, `username`, `password`, `email`, `kontak`, `ID_sekolah`, `status_pendaftaran`) VALUES
(1, '123456', 'Ronaldo Simanjuntak', '4haZynwsf', 'U3KScTbm2', NULL, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `ID_status` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL,
  `keterangan` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID_status`, `nama_status`, `keterangan`) VALUES
(1, 'Mendaftar', 1),
(3, 'Pending', 1),
(4, 'Terdaftar', 1),
(5, 'Diterima', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `ID_test` int(11) NOT NULL,
  `ID_siswa` int(11) NOT NULL,
  `ID_jurusan` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `un`
--

CREATE TABLE `un` (
  `ID_UN` int(11) NOT NULL,
  `ID_siswa` int(11) NOT NULL,
  `matematika` int(11) NOT NULL,
  `bahasa_indonesia` int(11) NOT NULL,
  `bahasa_inggris` int(11) NOT NULL,
  `ipa` int(11) NOT NULL,
  `ips` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`ID_alamat`),
  ADD KEY `ID_siswa` (`ID_siswa`),
  ADD KEY `kecamatan` (`kecamatan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`ID_jurusan`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`ID_kecamatan`),
  ADD KEY `ID_kota` (`ID_kota`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`ID_kota`),
  ADD KEY `ID_provinsi` (`ID_provinsi`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ID_log`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`id_orangtua`),
  ADD KEY `ID_siswa` (`ID_siswa`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`ID_persyaratan`),
  ADD KEY `ID_siswa` (`ID_siswa`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`ID_pilihan`),
  ADD KEY `ID_siswa` (`ID_siswa`),
  ADD KEY `pilihan1` (`pilihan1`),
  ADD KEY `pilihan2` (`pilihan2`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`ID_provinsi`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`ID_sekolah`),
  ADD KEY `kecamatan` (`kecamatan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`ID_siswa`),
  ADD KEY `status_pendaftaran` (`status_pendaftaran`),
  ADD KEY `ID_sekolah` (`ID_sekolah`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_status`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`ID_test`),
  ADD KEY `ID_siswa` (`ID_siswa`),
  ADD KEY `ID_jurusan` (`ID_jurusan`);

--
-- Indexes for table `un`
--
ALTER TABLE `un`
  ADD PRIMARY KEY (`ID_UN`),
  ADD KEY `ID_siswa` (`ID_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `ID_alamat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `ID_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `ID_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `ID_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `ID_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `ID_persyaratan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `ID_pilihan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `ID_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `ID_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `ID_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID_test` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `un`
--
ALTER TABLE `un`
  MODIFY `ID_UN` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
