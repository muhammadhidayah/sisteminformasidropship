-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: db_dropshiper
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP Database IF EXISTS `db_dropshiper`;
CREATE Database db_dropshiper;
GO

USE db_dropshiper;

GO
--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_category` (
  `id_category` varchar(3) NOT NULL,
  `explanation` varchar(30) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category`
--

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_dropship`
--

DROP TABLE IF EXISTS `tbl_dropship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_dropship` (
  `id_dropship` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `fullname` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_dropship`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tbl_dropship_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_dropship`
--

LOCK TABLES `tbl_dropship` WRITE;
/*!40000 ALTER TABLE `tbl_dropship` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_dropship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_item`
--

DROP TABLE IF EXISTS `tbl_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_item` (
  `id_item` char(6) NOT NULL,
  `id_category` varchar(3) DEFAULT NULL,
  `name_item` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL,
  `selling_price` decimal(15,2) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `tbl_item_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `tbl_category` (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_item`
--

LOCK TABLES `tbl_item` WRITE;
/*!40000 ALTER TABLE `tbl_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_jenis_user`
--

DROP TABLE IF EXISTS `tbl_jenis_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_jenis_user` (
  `id_level` int(11) NOT NULL,
  `jenis_user` varchar(20) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_jenis_user`
--

LOCK TABLES `tbl_jenis_user` WRITE;
/*!40000 ALTER TABLE `tbl_jenis_user` DISABLE KEYS */;
INSERT INTO `tbl_jenis_user` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `tbl_jenis_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_purchase`
--

DROP TABLE IF EXISTS `tbl_purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_purchase` (
  `id_purchase` char(14) NOT NULL,
  `id_dropship` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_purchase`),
  KEY `id_dropship` (`id_dropship`),
  CONSTRAINT `tbl_purchase_ibfk_1` FOREIGN KEY (`id_dropship`) REFERENCES `tbl_dropship` (`id_dropship`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_purchase`
--

LOCK TABLES `tbl_purchase` WRITE;
/*!40000 ALTER TABLE `tbl_purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_purchasesitem`
--

DROP TABLE IF EXISTS `tbl_purchasesitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_purchasesitem` (
  `id_purchase` char(14) NOT NULL,
  `id_item` varchar(6) NOT NULL,
  `amount` int(11) NOT NULL,
  `selling_price` decimal(15,2) NOT NULL,
  KEY `id_purchase` (`id_purchase`),
  KEY `id_item` (`id_item`),
  CONSTRAINT `tbl_purchasesitem_ibfk_1` FOREIGN KEY (`id_purchase`) REFERENCES `tbl_purchase` (`id_purchase`),
  CONSTRAINT `tbl_purchasesitem_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `tbl_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_purchasesitem`
--

LOCK TABLES `tbl_purchasesitem` WRITE;
/*!40000 ALTER TABLE `tbl_purchasesitem` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_purchasesitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_level` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` date DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_level` (`id_level`),
  CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tbl_jenis_user` (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,1,'admin','21232f297a57a5a743894a0e4a801fc3','2016-12-07'),(2,2,'user','ee11cbb19052e40b07aac0ca060c23ee','2016-12-07');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-07 22:37:46
