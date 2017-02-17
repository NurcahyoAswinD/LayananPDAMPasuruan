-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2017 at 01:15 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pdam`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `masternum`(IN `kode` VARCHAR(3), OUT `hasil` VARCHAR(6))
    MODIFIES SQL DATA
    SQL SECURITY INVOKER
BEGIN
	DECLARE konter int; 
	
	SET konter = (SELECT `Count` FROM `masternumber` WHERE `KodeID` = kode);
	IF konter = null THEN
		SET konter = 1;
	ELSE
		SET konter = konter + 1;
	END IF;

	SET hasil = (SELECT CONCAT(kode, RIGHT(1000 + konter, 3)) FROM `masternumber` WHERE `KodeID` = kode);

	UPDATE `masternumber` SET `ID` = hasil, `Count` = konter WHERE `KodeID` = kode;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jobpasangbaru`
--

CREATE TABLE IF NOT EXISTS `jobpasangbaru` (
  `nip` varchar(10) NOT NULL,
  `id_jobpasangbaru` varchar(6) NOT NULL,
  PRIMARY KEY (`nip`,`id_jobpasangbaru`),
  KEY `id_job` (`id_jobpasangbaru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobpengaduan`
--

CREATE TABLE IF NOT EXISTS `jobpengaduan` (
  `nip` varchar(10) NOT NULL,
  `id_jobpengaduan` varchar(6) NOT NULL,
  PRIMARY KEY (`nip`,`id_jobpengaduan`),
  KEY `id_jobpengaduan` (`id_jobpengaduan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masternumber`
--

CREATE TABLE IF NOT EXISTS `masternumber` (
  `KodeID` varchar(3) NOT NULL,
  `ID` varchar(6) DEFAULT NULL,
  `Count` int(4) DEFAULT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`KodeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masternumber`
--

INSERT INTO `masternumber` (`KodeID`, `ID`, `Count`, `keterangan`) VALUES
('IDN', 'IDN000', 0, 'ID Pasang Baru'),
('IDP', 'IDP000', 0, 'ID Pengaduan');

-- --------------------------------------------------------

--
-- Table structure for table `pasangbaru`
--

CREATE TABLE IF NOT EXISTS `pasangbaru` (
  `id_daftar` varchar(6) NOT NULL,
  `id_user` int(3) NOT NULL,
  `tanggaldaftar` date NOT NULL,
  `namalengkap` varchar(30) NOT NULL,
  `alamatrumah` varchar(100) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `penghunitetap` int(3) NOT NULL,
  `penghunitidaktetap` int(3) NOT NULL,
  `jnsbangunan` varchar(30) NOT NULL,
  `jmlkran` int(3) NOT NULL,
  `jualair` varchar(6) NOT NULL,
  `alamatpenagihan` varchar(50) NOT NULL,
  `fotoKtp` varchar(45) NOT NULL,
  `fotoKK` varchar(45) NOT NULL,
  `latitude` varchar(45) NOT NULL DEFAULT '0',
  `longitude` varchar(45) NOT NULL DEFAULT '0',
  `status` enum('proses','survey','accept','reject') NOT NULL,
  PRIMARY KEY (`id_daftar`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip` varchar(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  PRIMARY KEY (`nip`,`id_user`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `id_user`, `jabatan`) VALUES
('123123', 1, 'admin'),
('test', 8, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE IF NOT EXISTS `pengaduan` (
  `id_pengaduan` varchar(6) NOT NULL,
  `id_user` int(3) NOT NULL,
  `tanggalpengaduan` date NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pic` text NOT NULL,
  `kerusakan` set('berat','sedang','ringan') NOT NULL,
  `keterangan` text NOT NULL,
  `latitude` varchar(45) NOT NULL DEFAULT '0',
  `longitude` varchar(45) NOT NULL DEFAULT '0',
  `status` enum('proses','survey','accept') NOT NULL,
  PRIMARY KEY (`id_pengaduan`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `privilege` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `email`, `privilege`) VALUES
(1, 'admin', 'admin', 'admin@gm', 'admin@', 1),
(2, 'deniaar', 'deniar12', 'deni aprianto', '', 2),
(3, 'aswin', 'aswin123', 'Nurcahyo Aswin Damasworo', 'aswin.reint@gmail.com', 2),
(4, 'denniapr', 'deni123', 'denniapr12', 'denniapr1232@gmail.com', 2),
(5, 'nur', 'nur', 'admin aswin', 'aswin', 2),
(6, 'test', 'test123', 'test', 'test@local.com', 2),
(7, 'testtt', 'testetete', 'test', 'test@asd.com', 2),
(8, 'testt', 'test', 'test', 'test@asd.casd', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobpasangbaru`
--
ALTER TABLE `jobpasangbaru`
  ADD CONSTRAINT `jobpasangbaru_ibfk_3` FOREIGN KEY (`id_jobpasangbaru`) REFERENCES `pasangbaru` (`id_daftar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobpasangbaru_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobpengaduan`
--
ALTER TABLE `jobpengaduan`
  ADD CONSTRAINT `jobpengaduan_ibfk_2` FOREIGN KEY (`id_jobpengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobpengaduan_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasangbaru`
--
ALTER TABLE `pasangbaru`
  ADD CONSTRAINT `pasangbaru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
