CREATE Database db_dropshiper;
GO
USE db_dropshiper;
GO

-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2016 at 11:56 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 5.6.29-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dropshiper`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fnCreateIdPurchase` () RETURNS CHAR(14) CHARSET latin1 BEGIN
DECLARE tgl_purchase char(8);
DECLARE tgl_purchase_temp char(8);
DECLARE id_purc_temp varchar(5);
DECLARE id_purc char(14);
SELECT max(substring(id_purchase,1,8)) INTO tgl_purchase FROM tbl_purchase;
SELECT CURRENT_DATE()+0 INTO tgl_purchase_temp;

IF tgl_purchase is null THEN 
    SET id_purc = CONCAT(tgl_purchase_temp,"-00001");
ELSE
    SELECT LPAD((max(substring(id_purchase,10))+1),5,'0') INTO id_purc_temp FROM tbl_purchase;
    SET id_purc = CONCAT(tgl_purchase_temp,'-',id_purc_temp);
END IF;
RETURN id_purc;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` varchar(3) NOT NULL,
  `explanation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `explanation`) VALUES
('BTT', 'Blouse Batik'),
('HBB', 'Batik Pria Lengan Pendek'),
('KBP', 'Batik Pria Lengan Panjang'),
('SBB', 'Batik Sarimbit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropship`
--

CREATE TABLE `tbl_dropship` (
  `id_dropship` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_toko` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dropship`
--

INSERT INTO `tbl_dropship` (`id_dropship`, `id_user`, `fullname`, `address`, `no_hp`, `email`, `nama_toko`) VALUES
(1, 2, 'Muhammad Hidayah', 'Jalan Mancasan Indah', '081949162028', 'muhammad30hidayah696@gmail.com', 'Antari Batik'),
(2, 3, 'Samuel Cahya', 'Jl. Ki Hajar Dewantara No. 128 Bandung', '081234567812', 'samuel@yayaya.com', 'SamCollections'),
(3, 4, 'agus tok', 'Jln. Pahlawan, Semarang', '087745613464', 'agus@gimail.com', 'AAboutique'),
(4, 5, 'Andi Nyata', 'Tambaksari, Surabaya', '08123467864', 'andi@andi.com', 'andishop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id_item` char(6) NOT NULL,
  `id_category` varchar(3) NOT NULL,
  `name_item` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL,
  `selling_price` decimal(15,2) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id_item`, `id_category`, `name_item`, `stock`, `selling_price`, `foto`) VALUES
('BTT326', 'BTT', 'BTT326', 7, '50000.00', 'BT 326.jpg'),
('BTT327', 'BTT', 'BTT327', 9, '50000.00', 'BT 327.jpg'),
('BTT330', 'BTT', 'BTT330', 49, '50000.00', 'BT 330.jpg'),
('BTT331', 'BTT', 'BTT331', 49, '50000.00', 'BT 331.jpg'),
('HBB282', 'HBB', 'HBB282', 20, '50000.00', 'HB 282.jpg'),
('HBB292', 'HBB', 'HBB292', 12, '50000.00', 'HB 292.jpg'),
('HBB339', 'HBB', 'HBB339', 20, '50000.00', 'HB 339.jpg'),
('HBB392', 'HBB', 'HBB392', 10, '50000.00', 'HB 392.jpg'),
('KBP240', 'KBP', 'KBP240', 20, '65000.00', 'KBP 240.jpg'),
('KBP241', 'KBP', 'KBP241', 12, '65000.00', 'KBP 241.jpg'),
('SBB239', 'SBB', 'SBB239', 50, '100000.00', 'SBB 239.jpg'),
('SBB240', 'SBB', 'SBB240', 12, '100000.00', 'SBB 240.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_user`
--

CREATE TABLE `tbl_jenis_user` (
  `id_level` int(11) NOT NULL,
  `jenis_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_user`
--

INSERT INTO `tbl_jenis_user` (`id_level`, `jenis_user`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `id_purchase` char(14) NOT NULL,
  `id_dropship` int(11) NOT NULL,
  `id_status` char(3) NOT NULL,
  `date` datetime NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`id_purchase`, `id_dropship`, `id_status`, `date`, `alamat`) VALUES
('20161220-00001', 2, '002', '2016-12-20 05:01:38', '#Penerima: #'),
('20161220-00002', 2, '002', '2016-12-20 05:03:14', '0'),
('20161220-00003', 2, '002', '2016-12-20 11:49:52', '0sdfsdsdfsfsdfsdsd545345453534534'),
('20161220-00004', 2, '002', '2016-12-20 11:52:03', '#Penerima: dsfsd#sdfsdsdfsdsfsffdssd453435345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasesitem`
--

CREATE TABLE `tbl_purchasesitem` (
  `id_purchase` char(14) NOT NULL,
  `id_item` varchar(6) NOT NULL,
  `amount` int(11) NOT NULL,
  `selling_price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchasesitem`
--

INSERT INTO `tbl_purchasesitem` (`id_purchase`, `id_item`, `amount`, `selling_price`) VALUES
('20161220-00001', 'BTT326', 2, '50000.00'),
('20161220-00001', 'BTT327', 1, '50000.00'),
('20161220-00001', 'BTT330', 1, '50000.00'),
('20161220-00002', 'BTT326', 1, '50000.00'),
('20161220-00002', 'BTT327', 1, '50000.00'),
('20161220-00003', 'BTT326', 1, '50000.00'),
('20161220-00003', 'BTT327', 1, '50000.00'),
('20161220-00004', 'BTT326', 1, '50000.00'),
('20161220-00004', 'BTT331', 1, '50000.00');

--
-- Triggers `tbl_purchasesitem`
--
DELIMITER $$
CREATE TRIGGER `TgDeletePI` AFTER DELETE ON `tbl_purchasesitem` FOR EACH ROW BEGIN
UPDATE tbl_item i 
SET i.stock=i.stock+OLD.amount WHERE i.id_item=OLD.id_item;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TgInsertPI` AFTER INSERT ON `tbl_purchasesitem` FOR EACH ROW BEGIN
UPDATE tbl_item i
SET i.stock=i.stock-NEW.amount WHERE i.id_item=NEW.id_item;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TgUpdatePI` AFTER UPDATE ON `tbl_purchasesitem` FOR EACH ROW BEGIN
UPDATE tbl_item i 
SET i.stock=i.stock+OLD.amount WHERE i.id_item=OLD.id_item;
UPDATE tbl_item i
SET i.stock=i.stock-NEW.amount WHERE i.id_item=NEW.id_item;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_status`
--

CREATE TABLE `tbl_purchase_status` (
  `id_status` char(3) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_status`
--

INSERT INTO `tbl_purchase_status` (`id_status`, `status`) VALUES
('001', 'dikonfirmasi'),
('002', 'belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_level`, `username`, `password`, `last_login`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2016-12-20 03:48:21'),
(2, 2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2016-12-20 11:43:51'),
(3, 2, 'samuel', 'd8ae5776067290c4712fa454006c8ec6', '2016-12-18 10:21:26'),
(4, 2, 'agus', 'fdf169558242ee051cca1479770ebac3', '2016-12-18 10:21:26'),
(5, 2, 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46', '2016-12-18 10:21:26');

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
  ADD KEY `fk_dropship_user` (`id_user`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_item_cat` (`id_category`);

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
  ADD KEY `fk_purchase_dropship` (`id_dropship`),
  ADD KEY `fk_purchase_status` (`id_status`);

--
-- Indexes for table `tbl_purchasesitem`
--
ALTER TABLE `tbl_purchasesitem`
  ADD PRIMARY KEY (`id_purchase`,`id_item`),
  ADD KEY `fk_prchseitem_item` (`id_item`);

--
-- Indexes for table `tbl_purchase_status`
--
ALTER TABLE `tbl_purchase_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_jnsuser` (`id_level`);

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
  ADD CONSTRAINT `tbl_purchase_ibfk_1` FOREIGN KEY (`id_dropship`) REFERENCES `tbl_dropship` (`id_dropship`),
  ADD CONSTRAINT `tbl_purchase_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `tbl_purchase_status` (`id_status`);

--
-- Constraints for table `tbl_purchasesitem`
--
ALTER TABLE `tbl_purchasesitem`
  ADD CONSTRAINT `tbl_purchasesitem_ibfk_1` FOREIGN KEY (`id_purchase`) REFERENCES `tbl_purchase` (`id_purchase`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_purchasesitem_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `tbl_item` (`id_item`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tbl_jenis_user` (`id_level`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2016 at 10:07 PM
-- Server version: 5.7.11-0ubuntu6
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dropshiper`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fnCreateIdPurchase` () RETURNS CHAR(14) CHARSET latin1 BEGIN
DECLARE tgl_purchase char(8);
DECLARE tgl_purchase_temp char(8);
DECLARE id_purc_temp varchar(5);
DECLARE id_purc char(14);
SELECT max(substring(id_purchase,1,8)) INTO tgl_purchase FROM tbl_purchase;
SELECT CURRENT_DATE()+0 INTO tgl_purchase_temp;

IF tgl_purchase is null THEN 
    SET id_purc = CONCAT(tgl_purchase_temp,"-00001");
ELSE
    SELECT LPAD((max(substring(id_purchase,10))+1),5,'0') INTO id_purc_temp FROM tbl_purchase;
    SET id_purc = CONCAT(tgl_purchase_temp,'-',id_purc_temp);
END IF;
RETURN id_purc;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` varchar(3) NOT NULL,
  `explanation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `explanation`) VALUES
('BTT', 'Blouse Batik'),
('HBB', 'Batik Pria Lengan Pendek'),
('KBP', 'Batik Pria Lengan Panjang'),
('SBB', 'Batik Sarimbit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dropship`
--

CREATE TABLE `tbl_dropship` (
  `id_dropship` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_toko` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dropship`
--

INSERT INTO `tbl_dropship` (`id_dropship`, `id_user`, `fullname`, `address`, `no_hp`, `email`, `nama_toko`) VALUES
(1, 2, 'Muhammad Hidayah', 'Jalan Mancasan Indah', '081949162028', 'muhammad30hidayah696@gmail.com', 'Antari Batik'),
(2, 3, 'Samuel Cahya', 'Jl. Ki Hajar Dewantara No. 128 Bandung', '081234567812', 'samuel@yayaya.com', 'SamCollections'),
(3, 4, 'agus tok', 'Jln. Pahlawan, Semarang', '087745613464', 'agus@gimail.com', 'AAboutique'),
(4, 5, 'Andi Nyata', 'Tambaksari, Surabaya', '08123467864', 'andi@andi.com', 'andishop');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id_item` char(6) NOT NULL,
  `id_category` varchar(3) NOT NULL,
  `name_item` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL,
  `selling_price` decimal(15,2) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id_item`, `id_category`, `name_item`, `stock`, `selling_price`, `foto`) VALUES
('BTT326', 'BTT', 'BTT326', 79, '80000.00', 'BT 326.jpg'),
('BTT327', 'BTT', 'BTT327', 8, '54000.00', 'BT 327.jpg'),
('BTT330', 'BTT', 'BTT330', 49, '50000.00', 'BT 330.jpg'),
('BTT331', 'BTT', 'BTT331', 49, '50000.00', 'BT 331.jpg'),
('HBB282', 'HBB', 'HBB282', 20, '50000.00', 'HB 282.jpg'),
('HBB292', 'HBB', 'HBB292', 12, '50000.00', 'HB 292.jpg'),
('HBB339', 'HBB', 'HBB339', 20, '50000.00', 'HB 339.jpg'),
('HBB392', 'HBB', 'HBB392', 10, '50000.00', 'HB 392.jpg'),
('KBP240', 'KBP', 'KBP240', 20, '65000.00', 'KBP 240.jpg'),
('SBB239', 'SBB', 'SBB239', 50, '100000.00', 'SBB 239.jpg'),
('SBB240', 'SBB', 'SBB240', 12, '100000.00', 'SBB 240.jpg'),
('SBB241', 'KBP', 'SBB241', 12, '123456789.00', ''),
('SBB242', 'BTT', 'SBB242', 12, '120000.00', 'sdaa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_user`
--

CREATE TABLE `tbl_jenis_user` (
  `id_level` int(11) NOT NULL,
  `jenis_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_user`
--

INSERT INTO `tbl_jenis_user` (`id_level`, `jenis_user`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `id_purchase` char(14) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` char(3) NOT NULL,
  `date` datetime NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`id_purchase`, `id_user`, `id_status`, `date`, `alamat`) VALUES
('20161220-00001', 2, '002', '2016-12-20 05:01:38', '#Penerima: #'),
('20161220-00002', 2, '002', '2016-12-20 05:03:14', '0'),
('20161220-00003', 2, '002', '2016-12-20 11:49:52', '0sdfsdsdfsfsdfsdsd545345453534534'),
('20161220-00004', 2, '002', '2016-12-20 11:52:03', '#Penerima: dsfsd#sdfsdsdfsdsfsffdssd453435345'),
('20161222-00005', 2, '002', '2016-12-22 17:51:50', '#Penerima: EKEEE#AlamatsdfsJATIMASKDSAAMFKS02834832');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasesitem`
--

CREATE TABLE `tbl_purchasesitem` (
  `id_purchase` char(14) NOT NULL,
  `id_item` varchar(6) NOT NULL,
  `amount` int(11) NOT NULL,
  `selling_price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchasesitem`
--

INSERT INTO `tbl_purchasesitem` (`id_purchase`, `id_item`, `amount`, `selling_price`) VALUES
('20161220-00001', 'BTT326', 2, '50000.00'),
('20161220-00001', 'BTT327', 1, '50000.00'),
('20161220-00001', 'BTT330', 1, '50000.00'),
('20161220-00002', 'BTT326', 1, '50000.00'),
('20161220-00002', 'BTT327', 1, '50000.00'),
('20161220-00003', 'BTT326', 1, '50000.00'),
('20161220-00003', 'BTT327', 1, '50000.00'),
('20161220-00004', 'BTT326', 1, '50000.00'),
('20161220-00004', 'BTT331', 1, '50000.00'),
('20161222-00005', 'BTT326', 1, '80000.00'),
('20161222-00005', 'BTT327', 1, '54000.00');

--
-- Triggers `tbl_purchasesitem`
--
DELIMITER $$
CREATE TRIGGER `TgDeletePI` AFTER DELETE ON `tbl_purchasesitem` FOR EACH ROW BEGIN
UPDATE tbl_item i 
SET i.stock=i.stock+OLD.amount WHERE i.id_item=OLD.id_item;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TgInsertPI` AFTER INSERT ON `tbl_purchasesitem` FOR EACH ROW BEGIN
UPDATE tbl_item i
SET i.stock=i.stock-NEW.amount WHERE i.id_item=NEW.id_item;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TgUpdatePI` AFTER UPDATE ON `tbl_purchasesitem` FOR EACH ROW BEGIN
UPDATE tbl_item i 
SET i.stock=i.stock+OLD.amount WHERE i.id_item=OLD.id_item;
UPDATE tbl_item i
SET i.stock=i.stock-NEW.amount WHERE i.id_item=NEW.id_item;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_status`
--

CREATE TABLE `tbl_purchase_status` (
  `id_status` char(3) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase_status`
--

INSERT INTO `tbl_purchase_status` (`id_status`, `status`) VALUES
('001', 'dikonfirmasi'),
('002', 'belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_level`, `username`, `password`, `last_login`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2016-12-22 19:30:26'),
(2, 2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2016-12-22 17:51:09'),
(3, 2, 'samuel', 'd8ae5776067290c4712fa454006c8ec6', '2016-12-18 10:21:26'),
(4, 2, 'agus', 'fdf169558242ee051cca1479770ebac3', '2016-12-18 10:21:26'),
(5, 2, 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46', '2016-12-18 10:21:26');

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
  ADD KEY `fk_dropship_user` (`id_user`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_item_cat` (`id_category`);

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
  ADD KEY `fk_purchase_dropship` (`id_user`),
  ADD KEY `fk_purchase_status` (`id_status`);

--
-- Indexes for table `tbl_purchasesitem`
--
ALTER TABLE `tbl_purchasesitem`
  ADD PRIMARY KEY (`id_purchase`,`id_item`),
  ADD KEY `fk_prchseitem_item` (`id_item`);

--
-- Indexes for table `tbl_purchase_status`
--
ALTER TABLE `tbl_purchase_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_jnsuser` (`id_level`);

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
  ADD CONSTRAINT `tbl_purchase_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_dropship` (`id_dropship`),
  ADD CONSTRAINT `tbl_purchase_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `tbl_purchase_status` (`id_status`);

--
-- Constraints for table `tbl_purchasesitem`
--
ALTER TABLE `tbl_purchasesitem`
  ADD CONSTRAINT `tbl_purchasesitem_ibfk_1` FOREIGN KEY (`id_purchase`) REFERENCES `tbl_purchase` (`id_purchase`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_purchasesitem_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `tbl_item` (`id_item`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tbl_jenis_user` (`id_level`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;