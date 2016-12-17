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