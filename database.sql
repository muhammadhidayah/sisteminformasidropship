CREATE Database db_dropshiper;
GO
USE db_dropshiper;
GO

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `id_category` varchar(3) NOT null PRIMARY KEY,
  `explanation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_item`;
CREATE TABLE `tbl_item` (
  `id_item` char(6) NOT NULL PRIMARY KEY,
  `id_category` varchar(3) NOT NULL , FOREIGN KEY fk_item_cat(`id_category`) REFERENCES tbl_category(`id_category`), 
  `name_item` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL,
  `selling_price` decimal(15,2) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_jenis_user`;
CREATE TABLE `tbl_jenis_user` (
  `id_level` int(11) not null PRIMARY KEY,
  `jenis_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT null AUTO_INCREMENT PRIMARY KEY,
  `id_level` int(11) NOT NULL, FOREIGN KEY fk_user_jnsuser(`id_level`) REFERENCES tbl_jenis_user(`id_level`), 
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_dropship`;
CREATE TABLE `tbl_dropship` (
  `id_dropship` int(11) not null AUTO_INCREMENT PRIMARY KEY,
  `id_user` int(11) NOT NULL, FOREIGN KEY fk_dropship_user(`id_user`) REFERENCES tbl_user(`id_user`), 
  `fullname` varchar(30) NOT NULL,
  `address` varchar(40) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_toko` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_purchase_status`;
CREATE TABLE `tbl_purchase_status` (
  `id_status` char(3) NOT NULL PRIMARY KEY,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_purchase`;
CREATE TABLE `tbl_purchase` (
  `id_purchase` char(14) NOT NULL PRIMARY KEY,
  `id_dropship` int(11) NOT NULL, FOREIGN KEY fk_purchase_dropship(`id_dropship`) REFERENCES tbl_dropship(`id_dropship`), 
  `id_status` char(3) NOT NULL, FOREIGN KEY fk_purchase_status(`id_status`) REFERENCES tbl_purchase_status(`id_status`), 
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_purchasesitem`;
CREATE TABLE `tbl_purchasesitem` (
  `id_purchase` char(14) NOT NULL, FOREIGN KEY fk_prchseitem_purchase(`id_purchase`) REFERENCES tbl_purchase(`id_purchase`) ON UPDATE CASCADE ON DELETE NO ACTION, 
  `id_item` varchar(6) NOT NULL, FOREIGN KEY fk_prchseitem_item(`id_item`) REFERENCES tbl_item(`id_item`) ON UPDATE CASCADE ON DELETE NO ACTION,
  `amount` int(11) NOT NULL,
  `selling_price` decimal(15,2) NOT NULL,
  PRIMARY KEY (id_purchase, id_item)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tbl_category` VALUES('BTT', 'Blouse Batik');
INSERT INTO `tbl_category` VALUES('HBB', 'Batik Pria Lengan Pendek');
INSERT INTO `tbl_category` VALUES('KBP', 'Batik Pria Lengan Panjang');
INSERT INTO `tbl_category` VALUES('SBB', 'Batik Sarimbit');


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


INSERT INTO `tbl_jenis_user` VALUES(1, 'admin');
INSERT INTO `tbl_jenis_user` VALUES(2, 'user');



INSERT INTO `tbl_user` VALUES(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NOW());
INSERT INTO `tbl_user` VALUES(2, 2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', NOW());
INSERT INTO `tbl_user` VALUES(3, 2, 'samuel', 'd8ae5776067290c4712fa454006c8ec6', NOW());
INSERT INTO `tbl_user` VALUES(4, 2, 'agus', 'fdf169558242ee051cca1479770ebac3', NOW());
INSERT INTO `tbl_user` VALUES(5, 2, 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46', NOW());


ALTER TABLE `tbl_dropship`
  MODIFY `id_dropship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


INSERT INTO `tbl_dropship` VALUES(1, 2, 'Muhammad Hidayah', 'Jalan Mancasan Indah', '081949162028', 'muhammad30hidayah696@gmail.com', 'Antari Batik');
INSERT INTO `tbl_dropship` VALUES(2, 3, 'Samuel Cahya', 'Jl. Ki Hajar Dewantara No. 128 Bandung', '081234567812', 'samuel@yayaya.com', 'SamCollections');
INSERT INTO `tbl_dropship` VALUES(3, 4, 'agus tok', 'Jln. Pahlawan, Semarang', '087745613464', 'agus@gimail.com', 'AAboutique');
INSERT INTO `tbl_dropship` VALUES(4, 5, 'Andi Nyata', 'Tambaksari, Surabaya', '08123467864', 'andi@andi.com', 'andishop');


INSERT INTO `tbl_purchase_status` VALUES('001', 'dikonfirmasi');
INSERT INTO `tbl_purchase_status` VALUES('002', 'belum dikonfirmasi');


DELIMITER $$
CREATE FUNCTION fnCreateIdPurchase()
RETURNS char(14)
BEGIN
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
END $$
DELIMITER ;
