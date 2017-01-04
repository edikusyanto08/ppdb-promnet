-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2017 at 11:23 AM
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

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`ID_alamat`, `ID_siswa`, `provinsi`, `kota`, `kecamatan`, `desa`, `detail`) VALUES
(2, 3, 1, 2, 1, 'Sarijadi', 'Jl Cipedes atas No 81 RT03/03\r\n40153'),
(3, 1, 1, 2, 1, 'Sarijadi', 'Jl Gerlong Tengah No 23'),
(4, 2, 5, 11, 4, 'KOMPLEK ANGKASA PURA', 'Jln. Hasanudin C/XIX no.4'),
(5, 4, 5, 11, 4, 'PAP2', 'BLOK C NOMER 4'),
(6, 7, 1, 1, 3, 'Yang Kucinta', 'Udah'),
(7, 8, 1, 2, 1, 'Gegerkalong', 'Jl. Gegerkalong Girang'),
(8, 9, 1, 5, 3, 'Sukasari', 'Jl. Sukasari Tengah');

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
(5, 'JR005', 'Teknik Mesin', 70, 70, 1),
(6, 'JR006', 'Teknik Elektro', 70, 85, 1),
(7, 'JR007', 'Tata Boga', 75, 80, 1),
(8, 'JR008', 'Tata Busana', 80, 70, 1);

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
(3, 'Cikarang Barat', 5),
(4, 'Neglasari', 11);

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
(11, 'Tangerang', 1);

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
(8, 1, 'sekolah', 'Logged In', '2016-12-31 17:16:06'),
(9, 1, 'sekolah', 'Logged Out', '2016-12-31 18:26:23'),
(10, 1, 'siswa', 'Logged In', '2016-12-31 18:30:44'),
(11, 1, 'siswa', 'Logged Out', '2016-12-31 18:34:09'),
(12, 1, 'siswa', 'Logged In', '2016-12-31 18:34:24'),
(13, 1, 'siswa', 'Logged Out', '2016-12-31 18:36:10'),
(14, 1, 'siswa', 'Logged In', '2016-12-31 18:36:43'),
(15, 1, 'siswa', 'Logged Out', '2016-12-31 18:37:38'),
(16, 1, 'siswa', 'Logged In', '2016-12-31 18:39:59'),
(17, 1, 'siswa', 'Logged Out', '2016-12-31 18:40:40'),
(18, 1, 'siswa', 'Logged In', '2016-12-31 18:41:56'),
(19, 1, 'siswa', 'Logged Out', '2016-12-31 18:42:06'),
(20, 1, 'siswa', 'Logged In', '2016-12-31 18:43:56'),
(21, 1, 'siswa', 'Logged Out', '2016-12-31 18:44:07'),
(22, 2, 'siswa', 'Logged In', '2016-12-31 18:45:23'),
(23, 2, 'siswa', 'Logged Out', '2016-12-31 18:45:32'),
(24, 3, 'siswa', 'Logged In', '2016-12-31 18:47:22'),
(25, 3, 'siswa', 'Logged Out', '2016-12-31 18:47:58'),
(26, 3, 'siswa', 'Logged In', '2016-12-31 18:48:12'),
(27, 3, 'siswa', 'Logged Out', '2016-12-31 19:02:46'),
(28, 1, 'siswa', 'Logged In', '2016-12-31 19:04:03'),
(29, 1, 'siswa', 'Logged In', '2016-12-31 19:04:03'),
(30, 1, 'siswa', 'Logged Out', '2016-12-31 19:06:26'),
(31, 3, 'siswa', 'Logged In', '2016-12-31 19:06:36'),
(32, 3, 'siswa', 'Logged Out', '2016-12-31 19:07:49'),
(33, 2, 'siswa', 'Logged In', '2016-12-31 19:08:04'),
(34, 2, 'siswa', 'Logged Out', '2016-12-31 19:10:06'),
(35, 1, 'sekolah', 'Logged In', '2016-12-31 19:10:13'),
(36, 1, 'sekolah', 'Logged Out', '2016-12-31 19:21:09'),
(37, 1, 'siswa', 'Logged In', '2016-12-31 19:21:23'),
(38, 1, 'siswa', 'Logged Out', '2016-12-31 20:56:35'),
(39, 3, 'siswa', 'Logged In', '2016-12-31 20:56:49'),
(40, 3, 'siswa', 'Logged Out', '2016-12-31 22:12:23'),
(41, 1, 'siswa', 'Logged In', '2016-12-31 22:12:35'),
(42, 1, 'siswa', 'Logged Out', '2016-12-31 23:28:17'),
(43, 3, 'siswa', 'Logged In', '2016-12-31 23:28:21'),
(44, 3, 'siswa', 'Logged Out', '2016-12-31 23:28:32'),
(45, 1, 'siswa', 'Logged In', '2016-12-31 23:28:41'),
(46, 1, 'siswa', 'Logged Out', '2016-12-31 23:51:13'),
(47, 1, 'sekolah', 'Logged In', '2016-12-31 23:51:23'),
(48, 1, 'sekolah', 'Logged Out', '2016-12-31 23:53:22'),
(49, 1, 'sekolah', 'Logged In', '2017-01-01 01:18:38'),
(50, 1, 'siswa', 'Logged In', '2017-01-01 01:21:08'),
(51, 1, 'sekolah', 'Logged Out', '2017-01-01 01:21:21'),
(52, 1, 'siswa', 'Logged In', '2017-01-01 01:21:39'),
(53, 1, 'siswa', 'Logged Out', '2017-01-01 03:36:29'),
(54, 1, 'sekolah', 'Logged In', '2017-01-01 03:42:16'),
(55, 1, 'siswa', 'Logged In', '2017-01-01 03:42:38'),
(56, 1, 'siswa', 'Logged Out', '2017-01-01 03:53:13'),
(57, 2, 'siswa', 'Logged In', '2017-01-01 03:53:51'),
(58, 1, 'sekolah', 'Logged Out', '2017-01-01 03:59:13'),
(59, 2, 'siswa', 'Logged Out', '2017-01-01 04:01:12'),
(60, 3, 'sekolah', 'Logged In', '2017-01-01 04:07:13'),
(61, 3, 'sekolah', 'Logged Out', '2017-01-01 04:08:59'),
(62, 4, 'siswa', 'Logged In', '2017-01-01 04:09:25'),
(63, 4, 'siswa', 'Logged Out', '2017-01-01 04:12:13'),
(64, 1, 'siswa', 'Logged In', '2017-01-01 07:51:12'),
(65, 1, 'siswa', 'Logged In', '2017-01-01 14:14:08'),
(66, 1, 'siswa', 'Logged Out', '2017-01-01 15:21:28'),
(67, 3, 'siswa', 'Logged In', '2017-01-01 15:23:13'),
(68, 3, 'siswa', 'Logged Out', '2017-01-01 16:41:26'),
(69, 1, 'siswa', 'Logged In', '2017-01-01 16:41:37'),
(70, 1, 'siswa', 'Logged Out', '2017-01-01 17:05:15'),
(71, 3, 'siswa', 'Logged In', '2017-01-01 17:05:26'),
(72, 3, 'siswa', 'Logged Out', '2017-01-01 17:17:31'),
(73, 1, 'siswa', 'Logged In', '2017-01-01 17:17:37'),
(74, 1, 'siswa', 'Logged Out', '2017-01-01 17:26:12'),
(75, 3, 'siswa', 'Logged In', '2017-01-01 17:26:17'),
(76, 3, 'siswa', 'Logged Out', '2017-01-01 18:29:29'),
(77, 1, 'siswa', 'Logged In', '2017-01-01 18:29:37'),
(78, 1, 'siswa', 'Logged Out', '2017-01-01 18:48:23'),
(79, 3, 'siswa', 'Logged In', '2017-01-01 18:48:31'),
(80, 3, 'siswa', 'Logged Out', '2017-01-01 21:11:50'),
(81, 1, 'siswa', 'Logged In', '2017-01-01 21:11:59'),
(82, 1, 'siswa', 'Logged In', '2017-01-02 03:06:13'),
(83, 1, 'siswa', 'Logged Out', '2017-01-02 03:08:36'),
(84, 3, 'sekolah', 'Logged In', '2017-01-02 03:11:11'),
(85, 3, 'sekolah', 'Logged Out', '2017-01-02 03:16:07'),
(86, 4, 'siswa', 'Logged In', '2017-01-02 03:21:12'),
(87, 1, 'siswa', 'Logged In', '2017-01-02 05:13:20'),
(88, 1, 'siswa', 'Logged Out', '2017-01-02 05:39:15'),
(89, 1, 'siswa', 'Logged In', '2017-01-02 09:04:37'),
(90, 1, 'siswa', 'Logged Out', '2017-01-02 09:25:21'),
(91, 2, 'siswa', 'Logged In', '2017-01-02 09:25:29'),
(92, 2, 'siswa', 'Logged Out', '2017-01-02 09:50:50'),
(93, 1, 'siswa', 'Logged In', '2017-01-02 09:50:57'),
(94, 1, 'siswa', 'Logged Out', '2017-01-02 09:57:45'),
(95, 1, 'siswa', 'Logged In', '2017-01-02 09:57:48'),
(96, 1, 'siswa', 'Logged Out', '2017-01-02 09:57:54'),
(97, 1, 'siswa', 'Logged In', '2017-01-02 10:04:13'),
(98, 1, 'siswa', 'Logged Out', '2017-01-02 10:04:16'),
(99, 3, 'siswa', 'Logged In', '2017-01-02 10:04:55'),
(100, 3, 'siswa', 'Logged Out', '2017-01-02 10:04:59'),
(101, 4, 'siswa', 'Logged In', '2017-01-02 10:05:38'),
(102, 4, 'siswa', 'Logged Out', '2017-01-02 10:06:16'),
(103, 2, 'siswa', 'Logged In', '2017-01-02 10:06:31'),
(104, 2, 'siswa', 'Logged Out', '2017-01-02 10:16:40'),
(105, 1, 'siswa', 'Logged In', '2017-01-02 10:16:50'),
(106, 1, 'siswa', 'Logged Out', '2017-01-02 11:04:31'),
(107, 1, 'siswa', 'Logged In', '2017-01-02 11:04:37'),
(108, 1, 'siswa', 'Logged In', '2017-01-02 19:19:52'),
(109, 1, 'siswa', 'Logged Out', '2017-01-02 19:20:23'),
(110, 1, 'siswa', 'Logged In', '2017-01-02 19:20:43'),
(111, 1, 'siswa', 'Logged Out', '2017-01-02 21:16:10'),
(112, 1, 'siswa', 'Logged In', '2017-01-02 21:16:49'),
(113, 1, 'siswa', 'Logged Out', '2017-01-02 21:17:42'),
(114, 1, 'siswa', 'Logged In', '2017-01-02 21:17:59'),
(115, 1, 'siswa', 'Logged Out', '2017-01-03 00:30:15'),
(116, 2, 'siswa', 'Logged In', '2017-01-03 00:30:30'),
(117, 2, 'siswa', 'Logged Out', '2017-01-03 00:30:37'),
(118, 4, 'siswa', 'Logged In', '2017-01-03 00:30:47'),
(119, 4, 'siswa', 'Logged Out', '2017-01-03 00:32:32'),
(120, 3, 'siswa', 'Logged In', '2017-01-03 00:33:42'),
(121, 3, 'siswa', 'Logged Out', '2017-01-03 00:34:11'),
(122, 3, 'siswa', 'Logged In', '2017-01-03 00:34:58'),
(123, 3, 'siswa', 'Logged Out', '2017-01-03 01:49:22'),
(124, 1, 'siswa', 'Logged In', '2017-01-03 01:49:29'),
(125, 1, 'siswa', 'Logged Out', '2017-01-03 02:37:06'),
(126, 3, 'siswa', 'Logged In', '2017-01-03 02:37:23'),
(127, 3, 'siswa', 'Logged Out', '2017-01-03 02:50:52'),
(128, 1, 'siswa', 'Logged In', '2017-01-03 04:42:35'),
(129, 1, 'siswa', 'Logged Out', '2017-01-03 05:35:00'),
(130, 3, 'siswa', 'Logged In', '2017-01-03 05:35:06'),
(131, 3, 'siswa', 'Logged Out', '2017-01-03 05:35:38'),
(132, 3, 'siswa', 'Logged In', '2017-01-03 05:35:46'),
(133, 1, 'siswa', 'Logged In', '2017-01-03 08:08:31'),
(134, 1, 'siswa', 'Logged Out', '2017-01-03 08:08:44'),
(135, 3, 'siswa', 'Logged In', '2017-01-03 08:08:57'),
(136, 4, 'sekolah', 'Logged In', '2017-01-03 10:11:05'),
(137, 4, 'sekolah', 'Logged Out', '2017-01-03 10:15:56'),
(138, 7, 'siswa', 'Logged In', '2017-01-03 10:16:31'),
(139, 7, 'siswa', 'Logged Out', '2017-01-03 10:23:00'),
(140, 7, 'siswa', 'Logged In', '2017-01-03 10:29:16'),
(141, 7, 'siswa', 'Logged Out', '2017-01-03 10:44:26'),
(142, 5, 'sekolah', 'Logged In', '2017-01-04 00:44:54'),
(143, 5, 'sekolah', 'Logged Out', '2017-01-04 00:46:59'),
(144, 8, 'siswa', 'Logged In', '2017-01-04 00:47:25'),
(145, 8, 'siswa', 'Logged Out', '2017-01-04 01:02:27'),
(146, 8, 'siswa', 'Logged In', '2017-01-04 01:02:45'),
(147, 8, 'siswa', 'Logged Out', '2017-01-04 01:32:01'),
(148, 5, 'sekolah', 'Logged In', '2017-01-04 01:33:10'),
(149, 9, 'siswa', 'Logged In', '2017-01-04 01:38:29'),
(150, 1, 'siswa', 'Logged In', '2017-01-04 01:44:18'),
(151, 1, 'siswa', 'Logged Out', '2017-01-04 01:55:06'),
(152, 1, 'siswa', 'Logged In', '2017-01-04 01:55:33'),
(153, 1, 'siswa', 'Logged Out', '2017-01-04 01:55:48'),
(154, 1, 'siswa', 'Logged In', '2017-01-04 01:55:57');

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
  `kontak_ibu` varchar(15) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orangtua`
--

INSERT INTO `orangtua` (`id_orangtua`, `ID_siswa`, `nama_ayah`, `nama_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `umur_ayah`, `umur_ibu`, `kontak_ayah`, `kontak_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`) VALUES
(7, 1, 'C Simanjuntak', 'Y D', 500000, 0, 60, 51, '01111111111', '085771508899', 'Guru', 'IRT'),
(8, 2, 'Liam Payne', 'Lili Collins', 50000, 0, 23, 22, '021221923', '0218263572', 'CEO', 'IRT'),
(6, 3, 'Bryan Walker', 'Catty Perry', 9001000, 0, 88, 80, '02112345678', '02112345679', 'CEO Google', 'IRT'),
(9, 4, 'Louis', 'Brigitta', 2000000, 1000000, 50, 48, '08926351834', '08739429293', 'pegawai bumn', 'guru'),
(10, 7, 'I Made Pakarsari', 'Ketut Nyoman', 50000000, 3000000, 50, 45, '+628822773355', '+62896453423', 'Broker Saham', 'Wirausaha'),
(11, 8, 'John Doe', 'Jane Doe', 5000000, 3000000, 52, 50, '08123456789', '08134567892', 'Dosen', 'Guru'),
(12, 9, 'John Doe', 'Jane Doe', 5000000, 3000000, 52, 50, '08123456789', '08134567892', 'Dosen', 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `ID_penerimaan` int(11) NOT NULL,
  `ID_siswa` int(11) NOT NULL,
  `ID_jurusan` int(11) NOT NULL
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
  `SKKB` varchar(100) NOT NULL,
  `rapor` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persyaratan`
--

INSERT INTO `persyaratan` (`ID_persyaratan`, `ID_siswa`, `Ijazah`, `SKHUN`, `KK`, `SKKB`, `rapor`, `foto`) VALUES
(11, 3, 'Ijazah3.pdf', 'SKHUN3.pdf', 'SKHUN3.pdf', 'SKHUN3.rar', 'SKHUN3.txt', 'foto3.jpg'),
(10, 1, 'Ijazah1.docx', 'skhun1.PNG', 'KK1.pdf', 'SKKB1.PNG', 'rapor1.PNG', 'foto1.png'),
(12, 4, 'Ijazah4.pdf', 'SKHUN4.jpg', 'SKHUN4.JPG', 'SKHUN4.xlsx', 'SKHUN4.JPG', ''),
(13, 7, 'Ijazah7.jpg', 'Ijazah7.jpg', 'Ijazah7.jpg', 'Ijazah7.jpg', 'rapor7.jpg', 'foto7.jpg'),
(14, 8, 'Ijazah8.pdf', 'Ijazah8.jpg', 'Ijazah8.pdf', 'Ijazah8.PNG', 'Ijazah8.PNG', 'Ijazah8.png');

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

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`ID_pilihan`, `ID_siswa`, `pilihan1`, `pilihan2`) VALUES
(1, 1, 2, 5),
(2, 2, 4, 3),
(3, 4, 1, 5),
(4, 3, 1, 3),
(5, 7, 1, 3),
(6, 8, 7, 8);

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
(4, 'DKI Jakarta'),
(5, 'Banten');

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
(2, 'SMPN 4 BANDUNG', '123456', 'ztQbOmViHr', 'wflUu0lsa3', 'irmaayu13@gmail.com', 1, 2, 1, 'MANA AJA DEH', '08987654321', 'perkotaan', 'Negeri', 'A', 1, 0),
(3, 'SMPN 1 Tangerang', '09876', 'gxn64S3Csh', '4e521d432d0cadc45484a5c62bdfdf8c', 'smpn1@gmail.com', 5, 11, 4, 'Depan SANMAR', '021223234', 'perkotaan', 'Negeri', 'A', 1, 1),
(4, 'SMPIT SEMBLAD TERPADU', '666-666-666', 'wNCK1TOaPz', 'fae0b27c451c728867a567e8c1bb4e53', 'pakardinamik10@gmail.com', 5, 11, 4, 'Jalan Ovwevwevwe onyemvwevwe osas', '+6289933229933', 'pedesaan', 'Negeri', 'A', 1, 1),
(5, 'SMP PONPES', '1234567890', 'QpULlQtfHS', '5a852040f32f66839f5d0300007b6f6e', 'auliafahmi21@gmail.com', 1, 2, 1, 'Jl. Gegerkalong Tengah No. 23', '0223456789', 'perkotaan', 'Swasta', 'B', 1, 1);

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
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `ID_sekolah` int(11) NOT NULL,
  `status_pendaftaran` int(11) NOT NULL,
  `log` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`ID_siswa`, `NISN`, `nama_lengkap`, `username`, `password`, `jenis_kelamin`, `tgl_lahir`, `email`, `kontak`, `ID_sekolah`, `status_pendaftaran`, `log`) VALUES
(1, '123456', 'Ronaldo Simanjuntak', '4haZynwsf', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 'simanjuntakronaldo9@gmail.com', '08567934299', 1, 2, 1),
(2, '123457', 'John Doe', 'a7QkFodd9V', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 'jondower@gmail.com', '0215503733', 1, 1, 1),
(3, '123458', 'Alan Walker', 'ZI9gjgv3Sh', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 'walker@gmail.com', '0812332122', 1, 2, 1),
(4, '1404074', 'Dheya Anggita', 'IONDlJP5m0', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 'dheya@gmail.com', '085939790839', 3, 1, 1),
(5, '0001', 'Siranos Semblad', 'In4Y07KhOi', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, 4, 1, 0),
(6, '0002', 'M. Ballack Genep', '3EzwffxGFE', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, 4, 1, 0),
(7, '0003', 'I Gede Tidituna', '2GigJSVKPG', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 'igedetid@gmail.com', '+6289933229933', 4, 2, 1),
(8, '1304491', 'Aulia Fahmi', 'giLaXXOeXi', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 'aulia@gmail.com', '085345678912', 5, 2, 1),
(9, '1304401', 'Fahmi', 'ZYH3eg3QFf', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 'fahmi@gmail.com', '083876543219', 5, 1, 1);

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
(2, 'Pending', 1),
(3, 'Terdaftar', 1),
(4, 'Diterima', 1),
(5, 'Tidak Diterima', 1);

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

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`ID_test`, `ID_siswa`, `ID_jurusan`, `nilai`, `keterangan`) VALUES
(18, 7, 1, 10, 'Tidak Lulus'),
(17, 3, 3, 88, 'Lulus'),
(14, 1, 5, 90, 'Lulus'),
(16, 3, 1, 78, 'Tidak Lulus'),
(13, 1, 2, 90, 'Lulus'),
(19, 7, 3, 10, 'Tidak Lulus');

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
  `ipa` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `un`
--

INSERT INTO `un` (`ID_UN`, `ID_siswa`, `matematika`, `bahasa_indonesia`, `bahasa_inggris`, `ipa`) VALUES
(1, 1, 85, 90, 93, 87),
(2, 2, 60, 90, 85, 80),
(3, 4, 70, 100, 90, 80),
(4, 3, 90, 90, 90, 89),
(5, 7, 80, 80, 80, 80),
(6, 8, 84, 82, 78, 70);

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
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`ID_penerimaan`),
  ADD KEY `ID_siswa` (`ID_siswa`),
  ADD KEY `ID_jurusan` (`ID_jurusan`);

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
  MODIFY `ID_alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `ID_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `ID_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `ID_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `ID_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT for table `orangtua`
--
ALTER TABLE `orangtua`
  MODIFY `id_orangtua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `ID_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `ID_persyaratan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `ID_pilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `ID_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `ID_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `ID_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `un`
--
ALTER TABLE `un`
  MODIFY `ID_UN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
