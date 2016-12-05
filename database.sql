CREATE DATABASE PripoenBatikDB;

GO

USE PripoenBatikDB;

GO

CREATE TABLE CATEGORY(
id_category char(6) PRIMARY KEY NOT NULL,
explanation varchar(30) NOT NULL
);

GO

CREATE TABLE ITEM(
id_item char(6) NOT NULL PRIMARY KEY,
id_category varchar(4) ,
name_item varchar(10) NOT NULL,
stock int NOT NULL,
selling_price numeric(15,2) NOT NULL,
foto varchar(100) NOT NULL,
FOREIGN KEY (id_category) REFERENCES CATEGORY(id_category)
);

GO

CREATE TABLE DROPSHIPER(
id_dropshiper char(10) PRIMARY KEY NOT NULL,
name_dropshiper varchar(30) NOT NULL,
address varchar(40) NOT NULL,
no_hp varchar(12) NOT NULL,
username varchar(20) NOT NULL,
password varchar(50) NOT NULL
);

GO

CREATE TABLE PURCHASE(
id_purchase char(14) PRIMARY KEY NOT NUll,
id_dropshiper char(10) ,
date DATETIME,
FOREIGN KEY(id_dropshiper) REFERENCES DROPSHIPER(id_dropshiper)
);

GO

CREATE TABLE PURCHASES_ITEM(
id_purchase char(14) NOT NULL ,
id_item varchar(6) NOT NULL ,
amount int NOT NULL,
selling_price numeric(15,2) NOT NULL,
FOREIGN KEY(id_purchase) REFERENCES PURCHASE(id_purchase),
FOREIGN KEY(id_item) REFERENCES ITEM(id_item)
);

GO







