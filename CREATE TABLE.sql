CREATE TABLE `checkout`.`product` ( `_id` INT(32) NOT NULL AUTO_INCREMENT , `prodName` VARCHAR(32) NOT NULL , `prodBrand` VARCHAR(32) NOT NULL , `prodDescription` VARCHAR(32) NOT NULL , `prodProvider` VARCHAR(32) NOT NULL , `authorName` VARCHAR(32) NOT NULL , `prodAmount` INT(32) NOT NULL , `prodUnit` VARCHAR(32) NOT NULL , `prodPrice` VARCHAR(32) NOT NULL , `prodResource` VARCHAR(32) NOT NULL , PRIMARY KEY (`_id`)) ENGINE = InnoDB;