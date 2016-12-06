CREATE DATABASE db_dropshiper;

GO

USE db_dropshiper;

GO

CREATE TABLE tbl_category(
id_category char(6) PRIMARY KEY NOT NULL,
explanation varchar(30) NOT NULL
);

GO

CREATE TABLE tbl_item(
id_item char(6) NOT NULL PRIMARY KEY,
id_category varchar(4) ,
name_item varchar(10) NOT NULL,
stock int NOT NULL,
selling_price numeric(15,2) NOT NULL,
foto varchar(100) NOT NULL,
FOREIGN KEY (id_category) REFERENCES tbl_category(id_category)
);

GO

CREATE TABLE tbl_user(
id_user char(10) PRIMARY KEY NOT NULL,
username varchar(20) NOT NULL,
password varchar(50) NOT NULL,
fullname varchar(30) NOT NULL,
address varchar(40) NOT NULL,
no_hp varchar(12) NOT NULL,
email varchar(50)
);

GO

CREATE TABLE tbl_purchase(
id_purchase char(14) PRIMARY KEY NOT NUll,
id_user char(10),
date DATETIME,
FOREIGN KEY(id_user) REFERENCES tbl_user(id_user)
);

GO

CREATE TABLE tbl_purchasesitem(
id_purchase char(14) NOT NULL ,
id_item varchar(6) NOT NULL ,
amount int NOT NULL,
selling_price numeric(15,2) NOT NULL,
FOREIGN KEY(id_purchase) REFERENCES tbl_purchase(id_purchase),
FOREIGN KEY(id_item) REFERENCES tbl_item(id_item)
);

GO


INSERT INTO tbl_user VALUES( 'CUS-000001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Muhammad Hidayah', 'Jalan Mancasan', '081949162028', 'a@gmail.com');






