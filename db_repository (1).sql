-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2014 at 02:54 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_repository`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_files`
--

CREATE TABLE IF NOT EXISTS `tb_files` (
  `kd_files` int(11) NOT NULL AUTO_INCREMENT,
  `npm` varchar(10) DEFAULT NULL,
  `nip` varchar(12) DEFAULT NULL,
  `bab` varchar(10) DEFAULT NULL,
  `files` varchar(100) DEFAULT NULL,
  `status` enum('free','premium') DEFAULT NULL,
  PRIMARY KEY (`kd_files`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `tb_files`
--

INSERT INTO `tb_files` (`kd_files`, `npm`, `nip`, `bab`, `files`, `status`) VALUES
(6, '2011041113', '2007.04.001', 'BAB 1', '2011041113_BAB 1.pdf', 'free'),
(7, '2011041113', '2007.04.001', 'BAB 2', '2011041113_BAB 2.pdf', 'premium'),
(8, '2011041113', '2007.04.001', 'BAB 3', '2011041113_BAB 3.pdf', 'premium'),
(9, '2011041113', '2007.04.001', 'BAB 4', '2011041113_BAB 4.pdf', 'premium'),
(10, '2011041113', '2007.04.001', 'BAB 5', '2011041113_BAB 5.pdf', 'premium'),
(11, '2011041109', '888888888888', 'BAB 1', '2011041109_BAB 1.pdf', 'free'),
(12, '2011041109', '888888888888', 'BAB 2', '2011041109_BAB 2.pdf', 'premium'),
(13, '2011041109', '888888888888', 'BAB 3', '2011041109_BAB 3.pdf', 'premium'),
(14, '2011041109', '888888888888', 'BAB 4', '2011041109_BAB 4.pdf', 'premium'),
(15, '2011041109', '888888888888', 'BAB 5', '2011041109_BAB 5.pdf', 'premium'),
(16, '2011041122', '222222222222', 'BAB 1', '2011041122_BAB 1.pdf', 'free'),
(17, '2011041122', '222222222222', 'BAB 2', '2011041122_BAB 2.pdf', 'premium'),
(18, '2011041122', '222222222222', 'BAB 3', '2011041122_BAB 3.pdf', 'premium'),
(19, '2011041122', '222222222222', 'BAB 4', '2011041122_BAB 4.pdf', 'premium'),
(20, '2011041122', '222222222222', 'BAB 5', '2011041122_BAB 5.pdf', 'premium'),
(21, '2011041115', '444444444444', 'BAB 1', '2011041115_BAB 1.pdf', 'free'),
(22, '2011041115', '444444444444', 'BAB 2', '2011041115_BAB 2.pdf', 'premium'),
(23, '2011041115', '444444444444', 'BAB 3', '2011041115_BAB 3.pdf', 'premium'),
(24, '2011041115', '444444444444', 'BAB 4', '2011041115_BAB 4.pdf', 'premium'),
(25, '2011041115', '444444444444', 'BAB 5', '2011041115_BAB 5.pdf', 'premium'),
(26, '2011041121', '111111111111', 'BAB 1', '2011041121_BAB 1.pdf', 'free'),
(27, '2011041121', '111111111111', 'BAB 2', '2011041121_BAB 2.pdf', 'premium'),
(28, '2011041121', '111111111111', 'BAB 3', '2011041121_BAB 3.pdf', 'premium'),
(29, '2011041121', '111111111111', 'BAB 4', '2011041121_BAB 4.pdf', 'premium'),
(30, '2011041121', '111111111111', 'BAB 5', '2011041121_BAB 5.pdf', 'premium'),
(31, '2011041085', '2007.04.001', 'BAB 1', '2011041085_BAB 1.pdf', 'free'),
(32, '2011041085', '2007.04.001', 'BAB 2', '2011041085_BAB 2.pdf', 'premium'),
(33, '2011041085', '2007.04.001', 'BAB 3', '2011041085_BAB 3.pdf', 'premium'),
(34, '2011041085', '2007.04.001', 'BAB 4', '2011041085_BAB 4.pdf', 'premium'),
(35, '2011041085', '2007.04.001', 'BAB 5', '2011041085_BAB 5.pdf', 'premium'),
(36, '2011041117', '444444444444', 'BAB 1', '2011041117_BAB 1.pdf', 'free'),
(37, '2011041117', '444444444444', 'BAB 2', '2011041117_BAB 2.pdf', 'premium'),
(38, '2011041117', '444444444444', 'BAB 3', '2011041117_BAB 3.pdf', 'premium'),
(39, '2011041117', '444444444444', 'BAB 4', '2011041117_BAB 4.pdf', 'premium'),
(40, '2011041117', '444444444444', 'BAB 5', '2011041117_BAB 5.pdf', 'premium'),
(41, '2011041079', '333333333333', 'BAB 1', '2011041079_BAB 1.pdf', 'free'),
(42, '2011041079', '333333333333', 'BAB 2', '2011041079_BAB 2.pdf', 'premium'),
(43, '2011041079', '333333333333', 'BAB 3', '2011041079_BAB 3.pdf', 'premium'),
(44, '2011041079', '333333333333', 'BAB 4', '2011041079_BAB 4.pdf', 'premium'),
(45, '2011041079', '333333333333', 'BAB 5', '2011041079_BAB 5.pdf', 'premium'),
(46, '2011041105', '222222222222', 'BAB 1', '2011041105_BAB 1.pdf', 'free'),
(47, '2011041105', '222222222222', 'BAB 2', '2011041105_BAB 2.pdf', 'premium'),
(48, '2011041105', '222222222222', 'BAB 3', '2011041105_BAB 3.pdf', 'premium'),
(49, '2011041105', '222222222222', 'BAB 4', '2011041105_BAB 4.pdf', 'premium'),
(50, '2011041105', '222222222222', 'BAB 5', '2011041105_BAB 5.pdf', 'premium'),
(51, '2011041089', '201420132016', 'BAB 1', '2011041089_BAB 1.pdf', 'free'),
(52, '2011041089', '201420132016', 'BAB 2', '2011041089_BAB 2.pdf', 'premium'),
(53, '2011041089', '201420132016', 'BAB 3', '2011041089_BAB 3.pdf', 'premium'),
(54, '2011041089', '201420132016', 'BAB 4', '2011041089_BAB 4.pdf', 'premium'),
(55, '2011041089', '201420132016', 'BAB 5', '2011041089_BAB 5.pdf', 'premium');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_jenis` (
  `kd_jenis` varchar(6) NOT NULL,
  `jenis_ta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`kd_jenis`, `jenis_ta`) VALUES
('J001', 'SISTEM INFORMASI'),
('J002', 'MEDIA PEMBELAJARAN'),
('J003', 'SISTEM PAKAR'),
('J004', 'REKAYASA PERANGKAT LUNAK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsentrasi`
--

CREATE TABLE IF NOT EXISTS `tb_konsentrasi` (
  `kd_konsentrasi` varchar(6) NOT NULL,
  `konsentrasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_konsentrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konsentrasi`
--

INSERT INTO `tb_konsentrasi` (`kd_konsentrasi`, `konsentrasi`) VALUES
('K001', 'PROGRAMING'),
('K002', 'MULTIMEDIA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE IF NOT EXISTS `tb_member` (
  `email` varchar(40) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `gender` enum('1','0') NOT NULL,
  `foto` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`email`, `Password`, `nama`, `gender`, `foto`, `alamat`, `telepon`) VALUES
('naylakuga@gmail.com', 'c83b2d5bb1fb4d93d9d064593ed6eea2', 'nayla', '0', 'photos/CUST5433a6b6cc3611174627_549198648467631_419428170_n.png', 'banyuwangi', '098765432'),
('nca@yahoo.com', '217c3a6a8121b71d2813291b281aade1', 'nca', '0', 'photos/CUST542e3fdd58dfb1174627_549198648467631_419428170_n.png', 'ghfhfhf', '767767'),
('su@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'aa', '1', 'photos/CUST542e3ccdc6789images.jpg', 'fgf', '46565'),
('sudaiaddairobi@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'imah', '0', 'photos/CUST542e207f0cba8btn_add_user.png', 'jember', '923219847');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE IF NOT EXISTS `tb_mhs` (
  `npm` varchar(10) NOT NULL,
  `kd_konsentrasi` varchar(6) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tmp_lhr` varchar(30) DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `jk_mhs` enum('L','P') NOT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `no_telpon` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`npm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`npm`, `kd_konsentrasi`, `nama`, `tmp_lhr`, `tgl_lhr`, `jk_mhs`, `alamat`, `no_telpon`) VALUES
('2011041077', 'MULTIM', 'Ana Fitria', 'Bondowoso', '0000-00-00', 'P', '<p>sukses</p>', '087000000000'),
('2011041079', 'MULTIM', 'Maghfiroh', 'Situbondo', '0000-00-00', 'P', '<p>Situbondo</p>', '087000000000'),
('2011041085', 'PROGRA', 'Husnul khotimah', 'jember', '0000-00-00', 'P', '<p>Jember</p>', '03313425151'),
('2011041089', 'PROGRA', 'Ullifatul ummi', 'sumenep', '0000-00-00', 'P', '<p>Sumenep Madura</p>', '087850219446'),
('2011041098', 'PROGRA', 'Martilatur Rofiqoh', 'Bondowoso', '0000-00-00', 'P', '<p>Bondowoso</p>', '0334786543'),
('2011041105', 'MULTIM', 'Qonik Zakiya', 'jember', '0000-00-00', 'P', '<p>Jember</p>', '033123457'),
('2011041109', 'PROGRA', 'Yusri Widani', 'Bondowoso', '0000-00-00', 'P', '<p>Bondowoso</p>', '0334987654'),
('2011041113', 'PROGRA', 'Riza Hariyani', 'Sumenep', '0000-00-00', 'P', '<p>Sumenep</p>', '087657234567'),
('2011041115', 'PROGRA', 'Rofika Duri', 'Bondowoso', '0000-00-00', 'P', '<p>Bondowoso</p>', '0334897654'),
('2011041117', 'K002', 'Lailatul Munawaroh', 'jember', '0000-00-00', 'P', '<p>Jember</p>', '0331456789'),
('2011041121', 'K002', 'Siti Qomariyah', 'Situbondo', '0000-00-00', 'P', '<p>Situbondo</p>', '0338987654'),
('2011041122', 'K002', 'Uriana', 'Situbondo', '0000-00-00', 'P', '<p>Situbondo</p>', '0338789098'),
('2011041125', 'K001', 'Nur Jamilah', 'Situbondo', '0000-00-00', 'P', '<p>Situbondo</p>', '0338765789');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembimbing`
--

CREATE TABLE IF NOT EXISTS `tb_pembimbing` (
  `nip` varchar(12) NOT NULL,
  `nama_pem` varchar(50) DEFAULT NULL,
  `tmpt_lhr_pem` varchar(30) DEFAULT NULL,
  `tgl_lhr_pem` date DEFAULT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat_pem` varchar(30) DEFAULT NULL,
  `no_telp_pem` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`nip`, `nama_pem`, `tmpt_lhr_pem`, `tgl_lhr_pem`, `jk`, `alamat_pem`, `no_telp_pem`) VALUES
('111111111111', 'Zaehol Fatah, S.Kom', 'Jember', '1880-07-10', 'L', '<p>Banyuputih-Situbondo</p>', '087876876456'),
('2007.04.001', 'Ahmad Homaidi, S.Kom', 'Situbondo', '0000-00-00', 'L', '<p>situbondo</p>', '085655853807'),
('201420132016', 'Abd. Ghafur, S.Kom', 'Banyuwangi', '2012-12-12', 'L', '<p>banyuwangi</p>', '08523451125'),
('20149998888', 'Irma Yunita, S.Kom', 'Situbondo', '2012-12-12', 'P', '<p>situbondo</p>', '08523451125'),
('222222222222', 'Muhassanah, S.kom', 'Situbondo', '2014-09-03', 'P', '<p>Banyuputih-Situbondo</p>', '98909876543'),
('333333333333', 'Ahmad Lutfi, S.Kom', 'Jember', '0000-00-00', 'L', '<p>Sukorambi-Jember</p>', '085678876543'),
('444444444444', 'Sunardi, S.Kom', 'Banyuwangi', '2014-09-03', 'L', '<p>Banyuputih - Situbondo</p>', '087456787345'),
('555555555555', 'Latifah Ardiana, S.Kom', 'Banyuwangi', '2014-09-24', 'P', '<p>Wongsorejo_Banyuwangi</p>', '03335678765'),
('666666666666', 'Syahrul Ibad, S.Ip, M.Ap', 'Situbondo', '2014-09-01', 'L', '<p>Banyuputih-Situbondo</p>', '098767876345'),
('777777777777', 'Mujib Ridwan', 'Malang', '2014-09-03', 'L', '<p>Batu-Malang</p>', '098789765345'),
('888888888888', 'Taufik Saleh, S.Kom', 'Banyuwangi', '2014-09-03', 'L', '<p>Banyuwangi</p>', '0338987654');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE IF NOT EXISTS `tb_status` (
  `kd_status` varchar(4) NOT NULL,
  `status_member` enum('free','premium') DEFAULT NULL,
  PRIMARY KEY (`kd_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tugasakhir`
--

CREATE TABLE IF NOT EXISTS `tb_tugasakhir` (
  `nip` varchar(12) NOT NULL,
  `npm` varchar(10) NOT NULL,
  `kd_jenis` varchar(6) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `thn_lulus` varchar(10) NOT NULL,
  `abstraksi` mediumtext,
  PRIMARY KEY (`nip`,`npm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tugasakhir`
--

INSERT INTO `tb_tugasakhir` (`nip`, `npm`, `kd_jenis`, `username`, `judul`, `thn_lulus`, `abstraksi`) VALUES
('111111111111', '2011041121', 'J001', '', 'Sistem Informasi Manajemen Pendamping Keluarga Harapan di Kecamatan Banyuputih dengan Menggunakan Vb', '2014', '<p>dfsgfdg</p>'),
('2007.04.001', '2011041085', 'J001', '', 'Repository Tugas Akhir di AMIKI menggunakan PHP dan MySQL', '2014', '<p>Sukses Ya Allah</p>'),
('2007.04.001', '2011041113', 'J001', '', 'Elearning LPIBA', '2014', '<p>sukses</p>'),
('201420132016', '2011041089', 'J001', '', 'Sistem Infomasi Pendataan Penduduk didesa Gapura Timur', '2014', '<p>sukses lah,,,</p>'),
('222222222222', '2011041105', 'J001', '', 'Perancangan dan implementasi Aplikasi E-CRM (Electronic Customer Relationship Management) pada pemes', '2014', '<p>jkjlkjl</p>'),
('222222222222', '2011041122', 'J001', '', 'SMS GATEWAY INFORMASI KEAKTIFAN SISWI MI P2S2', '2014', '<p>bantuin MI cari barokah</p>'),
('333333333333', '2011041079', 'J002', '', 'Kitab Elektronik Aljurumiyyah Menurut Kaidah Nahwu dan Shorrof', '2014', '<p>kkk</p>'),
('444444444444', '2011041115', 'J001', '', 'Sistem Informasi Bank Soal Di MISSPI dengan menggunakan PHP Dan MySQL', '2014', '<p>nfdanfmasdf.,mas.</p>'),
('444444444444', '2011041117', 'J001', '', 'Sistem Informasi Penjadwalan Kegiatan Asrama', '2014', '<p>sukses</p>'),
('888888888888', '2011041109', 'J001', '', 'Sistem Informasi Exsekutif Data Pelanggaran', '2014', '<p>sukses</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `level` enum('admin','direktur','kaprodi') DEFAULT NULL,
  `login_terakhir` datetime NOT NULL,
  `id_session` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama`, `email`, `level`, `login_terakhir`, `id_session`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@amiki.ac.id', 'admin', '2014-10-19 16:42:40', 'dpcp6r0crc748u9deotpcneut0'),
('direktur', '4fbfd324f5ffcdff5dbf6f019b02eca8', 'Zaehol Fatah', 'zaehol@amiki.ac.id', 'direktur', '2014-10-19 15:59:38', 'rhmndsni7mvnl5rgufaohdal22'),
('kaprodi', '3c13922905d2bc454cc35e665335e2fd', 'Abd. Ghafur, S.Kom', 'aponkbwi@gmail.com', '', '2014-10-19 16:22:09', 'e3nek1u7ge07v5c96ckqnth6r0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
