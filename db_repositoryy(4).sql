-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 14. September 2014 jam 09:59
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

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
-- Struktur dari tabel `tb_files`
--

CREATE TABLE IF NOT EXISTS `tb_files` (
  `kd_files` int(11) NOT NULL AUTO_INCREMENT,
  `npm` varchar(10) DEFAULT NULL,
  `nip` varchar(12) DEFAULT NULL,
  `bab` varchar(10) DEFAULT NULL,
  `files` varchar(100) DEFAULT NULL,
  `status` enum('free','premium') DEFAULT NULL,
  PRIMARY KEY (`kd_files`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tb_files`
--

INSERT INTO `tb_files` (`kd_files`, `npm`, `nip`, `bab`, `files`, `status`) VALUES
(1, '2007041012', '2007.04.001', 'BAB 1', '2007041012_BAB 1.pdf', 'free'),
(2, '2007041012', '2007.04.001', 'BAB 2', '2007041012_BAB 2.pdf', 'premium'),
(3, '2007041012', '2007.04.001', 'BAB 3', '2007041012_BAB 3.pdf', 'premium'),
(4, '2007041012', '2007.04.001', 'BAB 4', '2007041012_BAB 4.pdf', 'premium'),
(5, '2007041012', '2007.04.001', 'BAB 5', '2007041012_BAB 5.pdf', 'premium');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_jenis` (
  `kd_jenis` varchar(6) NOT NULL,
  `jenis_ta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`kd_jenis`, `jenis_ta`) VALUES
('J001', 'Sistem Informasi'),
('J002', 'Kecerdasan Buatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konsentrasi`
--

CREATE TABLE IF NOT EXISTS `tb_konsentrasi` (
  `kd_konsentrasi` varchar(6) NOT NULL,
  `konsentrasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_konsentrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_konsentrasi`
--

INSERT INTO `tb_konsentrasi` (`kd_konsentrasi`, `konsentrasi`) VALUES
('K001', 'Programing'),
('K002', 'Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE IF NOT EXISTS `tb_member` (
  `kd_member` varchar(6) NOT NULL,
  `nama_member` varchar(50) DEFAULT NULL,
  `tmp_lhr_member` varchar(30) DEFAULT NULL,
  `tgl_lhr_member` date DEFAULT NULL,
  `alamat_member` mediumtext,
  `status_member` enum('free','premium') DEFAULT NULL,
  `aktif` enum('aktif','tidak aktif') NOT NULL,
  `username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`kd_member`, `nama_member`, `tmp_lhr_member`, `tgl_lhr_member`, `alamat_member`, `status_member`, `aktif`, `username`, `Password`) VALUES
('M001', 'Junior', 'Situbondo', '1989-09-01', 'Situbondo', 'free', 'aktif', 'junior', 'b03e3fd2b3d22ff6df2796c412b09311');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mhs`
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
-- Dumping data untuk tabel `tb_mhs`
--

INSERT INTO `tb_mhs` (`npm`, `kd_konsentrasi`, `nama`, `tmp_lhr`, `tgl_lhr`, `jk_mhs`, `alamat`, `no_telpon`) VALUES
('2007041012', 'K001', 'Ahmad Homaidi', 'Situbondo', '1989-07-05', 'L', '<p>Tenggir</p>', '085655853807');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembimbing`
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
-- Dumping data untuk tabel `tb_pembimbing`
--

INSERT INTO `tb_pembimbing` (`nip`, `nama_pem`, `tmpt_lhr_pem`, `tgl_lhr_pem`, `jk`, `alamat_pem`, `no_telp_pem`) VALUES
('2007.04.001', 'Ahmad Homaid', 'Situbondo', '0000-00-00', 'L', '<p>xss</p>', '085655853807');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE IF NOT EXISTS `tb_status` (
  `kd_status` varchar(4) NOT NULL,
  `status_member` enum('free','premium') DEFAULT NULL,
  PRIMARY KEY (`kd_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tugasakhir`
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
-- Dumping data untuk tabel `tb_tugasakhir`
--

INSERT INTO `tb_tugasakhir` (`nip`, `npm`, `kd_jenis`, `username`, `judul`, `thn_lulus`, `abstraksi`) VALUES
('2007.04.001', '2007041012', 'J001', '', 'Sistem Informasi Kebijakan Pesantren', '2012', '<p>dsabndsad sabdahsd dsabdas</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `level` enum('admin','direktur') DEFAULT NULL,
  `login_terakhir` datetime NOT NULL,
  `id_session` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `nama`, `email`, `level`, `login_terakhir`, `id_session`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@amiki.ac.id', 'admin', '2014-09-06 21:39:19', 'mf3ig4nclkb0m51cigai2qi3k2'),
('direktur', '4fbfd324f5ffcdff5dbf6f019b02eca8', 'Zaehol Fatah', 'zaehol@amiki.ac.id', 'direktur', '0000-00-00 00:00:00', '4fbfd324f5ffcdff5dbf6f019b02eca8');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
