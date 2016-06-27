-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2016 at 05:57 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `SIG`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pohon`
--

CREATE TABLE IF NOT EXISTS `jenis_pohon` (
  `id_jenis_pohon` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_lokal` text NOT NULL,
  `nama_ilmiah` text NOT NULL,
  PRIMARY KEY (`id_jenis_pohon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `jenis_pohon`
--

INSERT INTO `jenis_pohon` (`id_jenis_pohon`, `nama_lokal`, `nama_ilmiah`) VALUES
(1, 'Trembesi', 'Trembesi trembesi'),
(2, 'Angsana', 'Angsana angsana'),
(3, 'Kamboja', 'Kamboja kamboja'),
(4, 'Cemara', 'Cemara cemara'),
(5, 'Glodokan', 'Glodokan glodokan'),
(6, 'Pisang', 'Pisang pisang');

-- --------------------------------------------------------

--
-- Table structure for table `nama_jalan`
--

CREATE TABLE IF NOT EXISTS `nama_jalan` (
  `id_nama_jalan` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_jalan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nama_jalan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nama_jalan`
--

INSERT INTO `nama_jalan` (`id_nama_jalan`, `nama_jalan`) VALUES
(1, 'Soekarno-Hatta'),
(2, 'Veteran'),
(3, 'Achmad Yani');

-- --------------------------------------------------------

--
-- Table structure for table `pohon`
--

CREATE TABLE IF NOT EXISTS `pohon` (
  `id_pohon` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_nama_jalan` int(10) unsigned NOT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `id_jenis_pohon` int(10) unsigned NOT NULL,
  `tinggi` float unsigned NOT NULL,
  `lebar_tajuk` float unsigned NOT NULL,
  `diameter_batang` float unsigned NOT NULL,
  `bentuk_tajuk` varchar(255) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `foto_fisik` text NOT NULL,
  `ab_1` tinyint(1) NOT NULL DEFAULT '0',
  `ab_2` tinyint(1) NOT NULL DEFAULT '0',
  `ab_3` tinyint(1) NOT NULL DEFAULT '0',
  `ab_4` tinyint(1) NOT NULL DEFAULT '0',
  `ab_5` tinyint(1) NOT NULL DEFAULT '0',
  `ab_6` tinyint(1) NOT NULL DEFAULT '0',
  `cd_1` tinyint(1) NOT NULL DEFAULT '0',
  `cd_2` tinyint(1) NOT NULL DEFAULT '0',
  `cd_3` tinyint(1) NOT NULL DEFAULT '0',
  `cd_4` tinyint(1) NOT NULL DEFAULT '0',
  `cd_5` tinyint(1) NOT NULL DEFAULT '0',
  `cd_6` tinyint(1) NOT NULL DEFAULT '0',
  `m_1` tinyint(1) NOT NULL DEFAULT '0',
  `m_2` tinyint(1) NOT NULL DEFAULT '0',
  `m_3` tinyint(1) NOT NULL DEFAULT '0',
  `m_4` tinyint(1) NOT NULL DEFAULT '0',
  `m_5` tinyint(1) NOT NULL DEFAULT '0',
  `m_6` tinyint(1) NOT NULL DEFAULT '0',
  `total_kerusakan` decimal(10,2) NOT NULL DEFAULT '0.00',
  `validasi` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_pohon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pohon`
--

INSERT INTO `pohon` (`id_pohon`, `tanggal`, `id_nama_jalan`, `id_user`, `id_jenis_pohon`, `tinggi`, `lebar_tajuk`, `diameter_batang`, `bentuk_tajuk`, `longitude`, `latitude`, `foto_fisik`, `ab_1`, `ab_2`, `ab_3`, `ab_4`, `ab_5`, `ab_6`, `cd_1`, `cd_2`, `cd_3`, `cd_4`, `cd_5`, `cd_6`, `m_1`, `m_2`, `m_3`, `m_4`, `m_5`, `m_6`, `total_kerusakan`, `validasi`) VALUES
(2, '2016-04-29', 2, 2, 3, 5, 3, 1, 'lalalalala', 112.617149, -7.957045, '', 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 33.33, 0),
(3, '2016-05-02', 2, 2, 2, 6, 2, 19, 'nanana', 112.638321, -7.955385, '', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 3.33, 0),
(4, '2016-05-02', 2, 2, 5, 9, 3, 27, 'kakaka', 112.631653, -7.970774, '', 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 8.33, 0),
(5, '2016-05-02', 2, 2, 1, 8, 4, 30, 'gagagaga', 112.635017, -7.964485, '', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 3.33, 0),
(6, '2016-05-02', 2, 2, 6, 10, 3, 37, 'dadada', 112.630341, -7.981340, '', 0, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 6.67, 0),
(7, '2016-05-02', 3, 2, 3, 16, 390, 90, 'lololo', 112.634941, -7.977253, '', 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 10.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tanggal_lahir` text NOT NULL,
  `tinggi` int(10) unsigned NOT NULL,
  `tingkat_user` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `tanggal_lahir`, `tinggi`, `tingkat_user`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'administrator', '', 160, 'administrator'),
(2, 'ardi_ansyah', '89c2ff32c023915fb02bfc3d4c62b3d8ffb122db', 'Moh. Ardiansyah', '11011994', 180, 'surveyor'),
(3, 'aliful_brewok', 'deac7b404cf0c39be7639659d0866634ab5efa5e', 'Aliful', '20051994', 165, 'surveyor'),
(4, 'Habibi', 'f51a33339b601946a4c7b800da7453ca42b9f463', 'Habibi', '17061994', 170, 'surveyor'),
(5, 'Laxus', '5faacba5306e60edc7527eacf48a2cc17d808717', 'Laxus', '18021993', 183, 'surveyor'),
(6, 'Kira', '7bd32f71783f9c0bc7fd39611c1493c674348575', 'Kira', '12061992', 189, 'surveyor'),
(7, 'Lucifer', '38058d3ac95c1986c9e5ea98e1297dbe485ec3ac', 'Lucifer', '13031990', 180, 'surveyor'),
(8, 'Ramzi', '8750b98a88224589785385c4141b3f6fc80d61a6', 'Ramzi', '16041993', 188, 'surveyor'),
(9, 'Riki', '84b7d75d9a0b0a08805177a0a4ed736fc592fda2', 'Riki', '24021994', 160, 'surveyor'),
(10, 'Zaki', 'a064dc8f1787900246621ad74fc9e42897567453', 'Zaki', '13061992', 189, 'surveyor'),
(11, 'Zack_x', '3d7cb1e740ba15ad1e460173d4d6c329f50d4304', 'Zack', '15031992', 183, 'surveyor'),
(12, 'Robbin_cwan', 'b524a839720cedb6adefa982bde5a2178660e5d9', 'Robbin', '16021992', 178, 'surveyor'),
(13, 'the_juned', '9d2471ba07c9255afe7654fde7861569e67b494f', 'Juned', '11121996', 165, 'surveyor');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
