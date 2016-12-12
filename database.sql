-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2016 at 12:21 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dropshiper`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `id_category` varchar(3) NOT NULL,
  `explanation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` VALUES('BTT', 'Blouse Batik');
INSERT INTO `tbl_category` VALUES('HBB', 'Batik Pria Lengan Pendek');
INSERT INTO `tbl_category` VALUES('KBP', 'Batik Pria Lengan Panjang');
INSERT INTO `tbl_category` VALUES('SBB', 'Batik Sarimbit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropship`
--

DROP TABLE IF EXISTS `tbl_dropship`;
CREATE TABLE `tbl_dropship` (
  `id_dropship` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fullname` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama_toko` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dropship`
--

INSERT INTO `tbl_dropship` VALUES(1, 2, 'Muhammad Hidayah', 'Jalan Mancasan Indah', '081949162028', 'muhammad30hidayah696@gmail.com', 'Antari Batik');
INSERT INTO `tbl_dropship` VALUES(2, 3, 'Samuel Cahya', 'Jl. Ki Hajar Dewantara No. 128 Bandung', '081234567812', 'samuel@yayaya.com', 'SamCollections');
INSERT INTO `tbl_dropship` VALUES(3, 4, 'agus tok', 'Jln. Pahlawan, Semarang', '087745613464', 'agus@gimail.com', 'AAboutique');
INSERT INTO `tbl_dropship` VALUES(4, 5, 'Andi Nyata', 'Tambaksari, Surabaya', '08123467864', 'andi@andi.com', 'andishop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

DROP TABLE IF EXISTS `tbl_item`;
CREATE TABLE `tbl_item` (
  `id_item` char(6) NOT NULL,
  `id_category` varchar(3) DEFAULT NULL,
  `name_item` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL,
  `selling_price` decimal(15,2) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` VALUES('BTT326', 'BTT', 'BTT326', 12, '50000.00', 'BT 326.jpg');
INSERT INTO `tbl_item` VALUES('BTT327', 'BTT', 'BTT327', 12, '50000.00', 'BT 327.jpg');
INSERT INTO `tbl_item` VALUES('BTT330', 'BTT', 'BTT330', 50, '50000.00', 'BT 330.jpg');
INSERT INTO `tbl_item` VALUES('BTT331', 'BTT', 'BTT331', 50, '50000.00', 'BT 331.jpg');
INSERT INTO `tbl_item` VALUES('HBB282', 'HBB', 'HBB282', 20, '50000.00', 'HB 282.jpg');
INSERT INTO `tbl_item` VALUES('HBB292', 'HBB', 'HBB292', 12, '50000.00', 'HB 292.jpg');
INSERT INTO `tbl_item` VALUES('HBB339', 'HBB', 'HBB339', 20, '50000.00', 'HB 339.jpg');
INSERT INTO `tbl_item` VALUES('HBB392', 'HBB', 'HBB392', 10, '50000.00', 'HB 392.jpg');
INSERT INTO `tbl_item` VALUES('KBP240', 'KBP', 'KBP240', 20, '65000.00', 'KBP 240.jpg');
INSERT INTO `tbl_item` VALUES('KBP241', 'KBP', 'KBP241', 12, '65000.00', 'KBP 241.jpg');
INSERT INTO `tbl_item` VALUES('SBB239', 'SBB', 'SBB239', 50, '100000.00', 'SBB 239.jpg');
INSERT INTO `tbl_item` VALUES('SBB240', 'SBB', 'SBB240', 12, '100000.00', 'SBB 240.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_user`
--

DROP TABLE IF EXISTS `tbl_jenis_user`;
CREATE TABLE `tbl_jenis_user` (
  `id_level` int(11) NOT NULL,
  `jenis_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_user`
--

INSERT INTO `tbl_jenis_user` VALUES(1, 'admin');
INSERT INTO `tbl_jenis_user` VALUES(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

DROP TABLE IF EXISTS `tbl_purchase`;
CREATE TABLE `tbl_purchase` (
  `id_purchase` char(14) NOT NULL,
  `id_dropship` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasesitem`
--

DROP TABLE IF EXISTS `tbl_purchasesitem`;
CREATE TABLE `tbl_purchasesitem` (
  `id_purchase` char(14) NOT NULL,
  `id_item` varchar(6) NOT NULL,
  `amount` int(11) NOT NULL,
  `selling_price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` VALUES(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2016-12-07');
INSERT INTO `tbl_user` VALUES(2, 2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2016-12-07');
INSERT INTO `tbl_user` VALUES(3, 2, 'samuel', 'd8ae5776067290c4712fa454006c8ec6', '2016-12-12');
INSERT INTO `tbl_user` VALUES(4, 2, 'agus', 'fdf169558242ee051cca1479770ebac3', '2016-12-12');
INSERT INTO `tbl_user` VALUES(5, 2, 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46', '2016-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tbl_dropship`
--
ALTER TABLE `tbl_dropship`
  ADD PRIMARY KEY (`id_dropship`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `tbl_jenis_user`
--
ALTER TABLE `tbl_jenis_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`id_purchase`),
  ADD KEY `id_dropship` (`id_dropship`);

--
-- Indexes for table `tbl_purchasesitem`
--
ALTER TABLE `tbl_purchasesitem`
  ADD KEY `id_purchase` (`id_purchase`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_dropship`
--
ALTER TABLE `tbl_dropship`
  MODIFY `id_dropship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_dropship`
--
ALTER TABLE `tbl_dropship`
  ADD CONSTRAINT `tbl_dropship_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD CONSTRAINT `tbl_item_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `tbl_category` (`id_category`);

--
-- Constraints for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD CONSTRAINT `tbl_purchase_ibfk_1` FOREIGN KEY (`id_dropship`) REFERENCES `tbl_dropship` (`id_dropship`);

--
-- Constraints for table `tbl_purchasesitem`
--
ALTER TABLE `tbl_purchasesitem`
  ADD CONSTRAINT `tbl_purchasesitem_ibfk_1` FOREIGN KEY (`id_purchase`) REFERENCES `tbl_purchase` (`id_purchase`),
  ADD CONSTRAINT `tbl_purchasesitem_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `tbl_item` (`id_item`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tbl_jenis_user` (`id_level`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
