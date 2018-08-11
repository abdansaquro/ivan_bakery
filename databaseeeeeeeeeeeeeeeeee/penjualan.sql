-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2018 at 07:49 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(1) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `jk`, `no_hp`, `alamat`, `username`, `password`) VALUES
(1, 'Ade Fitra', 'L', '085266072923', 'the hok jambi', 'a', 'a'),
(5, 'Risti R', 'P', '08526607212', 'jelutung jambi', 'r', 'r'),
(19, 'sandi', 'L', '8000', '16', 'sandi', 'sandi'),
(20, 'a', 'L', '3', '3', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(3) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(40) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(3) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `gambar`, `id_kategori`, `harga`, `stok`, `deskripsi`) VALUES
(1, 'Stik Ikan Tenggiri', 'Stik_ikan_tenggiri_12000.jpg', 2, 12000, 18, 'Jajanan tradisional ini cocok untuk menemani hari - hari anda'),
(2, 'Sarang Semut', 'sarang_semut_30000.jpg', 8, 30000, 4, 'Terbuat dari campuran tepung dan coklat...pastinya enak..'),
(3, 'Lapis Surabaya', 'lapis_surabaya_30000.jpg', 2, 30000, 24, 'Makanan khas surabaya yang terdapat butiran mesis yang lezat'),
(4, 'Black Forest', 'black_forest_besar_95000.jpg', 8, 95000, 0, 'Terbuat dari coklat yang berkualitas tinggi dan pastinya enak');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(2) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(40) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Kue Kering'),
(2, 'Kue Tradisional'),
(8, 'Tar'),
(9, 'Roti'),
(10, 'Cake'),
(11, 'Donat');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id_konfirmasi` int(3) NOT NULL AUTO_INCREMENT,
  `id_penjualan` int(3) NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `bukti_pembayaran` varchar(40) NOT NULL,
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `id_penjualan`, `tgl_konfirmasi`, `bukti_pembayaran`) VALUES
(5, 2, '2017-12-13', 'bukti1.jpg'),
(6, 3, '2017-12-13', 'bukti2.jpg'),
(8, 1, '2017-12-13', 'bukti2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `id_kota` int(3) NOT NULL AUTO_INCREMENT,
  `kota` varchar(30) NOT NULL,
  `ongkir` int(10) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`, `ongkir`) VALUES
(1, 'Jambi', 10000),
(2, 'Padang', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(3) NOT NULL AUTO_INCREMENT,
  `tgl` date NOT NULL,
  `id_anggota` int(3) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `id_kota` int(3) NOT NULL,
  `total` int(10) NOT NULL,
  `status` enum('Baru','Dikirim','Lunas') NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tgl`, `id_anggota`, `alamat`, `id_kota`, `total`, `status`) VALUES
(7, '2017-12-16', 1, 'pattimura', 1, 100000, 'Lunas'),
(6, '2017-12-16', 1, 'Kasang pudak', 1, 1910000, 'Baru'),
(5, '2017-12-16', 1, 'Legok', 1, 34000, 'Baru'),
(4, '2017-12-16', 5, 'sebrang', 1, 70000, 'Dikirim'),
(2, '2017-12-13', 5, 'Kampung laut rt 18', 2, 1000000, 'Baru'),
(3, '2017-12-12', 1, 'Jl orang kayo hitam', 1, 106000, 'Dikirim'),
(1, '2017-12-13', 5, 'Jelutung rt 15 No 122', 1, 94000, 'Lunas'),
(8, '2017-12-15', 5, 'wdawda', 1, 118000, 'Baru'),
(9, '2017-12-15', 5, 'karya ', 2, 104000, 'Dikirim'),
(10, '2017-12-15', 5, 'karya', 2, 200000, 'Dikirim'),
(11, '2017-12-15', 5, 'yan', 1, 64000, 'Dikirim'),
(12, '2017-12-15', 1, 'ad', 2, 116000, 'Dikirim'),
(13, '2018-01-04', 1, 'pak', 2, 2034000, 'Baru'),
(14, '2018-01-10', 1, 'a', 2, 1980000, 'Dikirim'),
(15, '2018-01-20', 1, 'the hok jambi', 2, 104000, 'Baru'),
(16, '2018-01-20', 1, 'simpang rimbo', 1, 82000, 'Baru'),
(17, '2018-01-22', 1, 'the hok jambi', 1, 230000, 'Baru'),
(18, '2018-01-22', 1, 'the hok jambi222', 1, 52000, 'Baru'),
(19, '2018-01-22', 5, 'jelutung jambi', 1, 260000, 'Baru'),
(20, '2018-01-22', 5, 'jelutung jambi22', 2, 104000, 'Baru'),
(21, '2018-01-22', 5, 'jelutung jambi11', 2, 115000, 'Baru'),
(22, '2018-01-22', 5, 'jelutung jambi', 1, 135000, 'Baru'),
(23, '2018-01-22', 5, 'jelutung jambi111', 2, 116000, 'Baru'),
(24, '2018-01-22', 5, 'aa', 2, 80000, 'Baru'),
(25, '2018-01-22', 5, 'jelutung jambi', 1, 224000, 'Baru'),
(26, '2018-01-22', 5, 'jelutung jambi122', 2, 104000, 'Baru'),
(27, '2018-01-20', 20, '3', 2, 2870000, 'Baru'),
(28, '2018-01-20', 20, '333', 2, 80000, 'Baru'),
(29, '2018-01-20', 1, 'the hok jambi', 1, 260000, 'Baru'),
(30, '2018-01-20', 1, 'qww', 2, 175000, 'Baru'),
(31, '2018-01-21', 1, 'the hok jambi', 1, 105000, 'Baru'),
(32, '2018-02-21', 5, 'jelutung jambi', 2, 50000, 'Baru'),
(33, '2018-02-21', 5, 'jelutung jambi', 2, 140000, 'Baru'),
(34, '2018-02-21', 5, 'jelutung jambi', 2, 170000, 'Baru'),
(35, '2018-02-21', 5, 'jelutung jambi', 1, 34000, 'Baru'),
(36, '2018-02-21', 5, 'jelutung jambi', 2, 50000, 'Baru'),
(37, '2018-02-21', 5, 'jelutung jambi', 2, 32000, 'Baru'),
(38, '2018-02-21', 5, 'ss', 1, 130000, 'Baru');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE IF NOT EXISTS `penjualan_detail` (
  `id_penjualan_detail` int(3) NOT NULL AUTO_INCREMENT,
  `id_penjualan` int(3) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `sub_total` int(10) NOT NULL,
  PRIMARY KEY (`id_penjualan_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `id_penjualan`, `id_barang`, `jumlah`, `sub_total`) VALUES
(71, 1, 3, 2, 60000),
(72, 1, 1, 2, 24000),
(73, 2, 3, 1, 30000),
(75, 3, 3, 2, 60000),
(76, 3, 1, 3, 36000),
(77, 4, 3, 2, 60000),
(78, 5, 1, 2, 24000),
(79, 6, 4, 2, 1900000),
(80, 7, 3, 3, 90000),
(81, 8, 2, 2, 60000),
(82, 8, 1, 4, 48000),
(83, 9, 2, 2, 60000),
(84, 9, 1, 2, 24000),
(85, 10, 2, 2, 60000),
(86, 10, 3, 4, 120000),
(87, 11, 1, 2, 24000),
(88, 11, 3, 1, 30000),
(89, 12, 3, 2, 60000),
(90, 12, 1, 3, 36000),
(91, 13, 4, 2, 1900000),
(92, 13, 2, 3, 90000),
(93, 13, 4, 2, 1900000),
(94, 13, 3, 3, 90000),
(95, 13, 1, 2, 24000),
(96, 14, 4, 2, 1900000),
(97, 14, 3, 2, 60000),
(98, 15, 1, 2, 24000),
(99, 15, 3, 2, 60000),
(100, 16, 2, 2, 60000),
(101, 16, 1, 1, 12000),
(102, 17, 4, 2, 190000),
(103, 17, 3, 1, 30000),
(104, 18, 2, 1, 30000),
(105, 18, 1, 1, 12000),
(106, 19, 2, 2, 60000),
(107, 19, 4, 2, 190000),
(108, 20, 3, 2, 60000),
(109, 20, 1, 2, 24000),
(110, 21, 4, 1, 95000),
(111, 22, 3, 1, 30000),
(112, 22, 4, 1, 95000),
(113, 23, 3, 2, 60000),
(114, 23, 1, 3, 36000),
(115, 24, 2, 2, 60000),
(116, 25, 4, 2, 190000),
(117, 25, 1, 2, 24000),
(118, 26, 3, 2, 60000),
(119, 26, 1, 2, 24000),
(120, 27, 4, 30, 2850000),
(121, 28, 2, 2, 60000),
(122, 29, 4, 2, 190000),
(123, 29, 3, 2, 60000),
(124, 30, 2, 2, 60000),
(125, 30, 4, 1, 95000),
(126, 31, 4, 1, 95000),
(127, 32, 3, 1, 30000),
(128, 33, 3, 1, 30000),
(129, 33, 2, 3, 90000),
(130, 34, 3, 2, 60000),
(131, 34, 2, 3, 90000),
(132, 35, 1, 2, 24000),
(133, 36, 3, 1, 30000),
(134, 37, 1, 1, 12000),
(135, 38, 2, 2, 60000),
(136, 38, 3, 2, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_temp`
--

CREATE TABLE IF NOT EXISTS `penjualan_temp` (
  `id_penjualan_temp` int(3) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(3) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `sub_total` int(10) NOT NULL,
  PRIMARY KEY (`id_penjualan_temp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=175 ;

--
-- Dumping data for table `penjualan_temp`
--


-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
  `id_rek` int(1) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(60) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `atas_nama` varchar(60) NOT NULL,
  PRIMARY KEY (`id_rek`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rek`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BNI', '24242342', 'Ivan Bakery'),
(2, 'BRI', '3463636', 'Ivan Bakery'),
(3, 'Bank Mandiri', '646464', 'Ivan Bakery');
