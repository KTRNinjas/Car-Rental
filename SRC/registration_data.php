<?php 
  function create_contact($kapcsolat){
    $sql="CREATE TABLE `autokolcsonzo`.`contact` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Vezetéknév` VARCHAR(50) NOT NULL , `Keresztnév` VARCHAR(50) NOT NULL , `e-mail` VARCHAR(50) NOT NULL , `Password` VARCHAR(50) NOT NULL , `Jogosítvány száma` VARCHAR(20) NOT NULL , `Telefonszám` INT(15) UNSIGNED NOT NULL , `user_account_join_id` INT(15) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
    Query($kapcsolat, "contact tábla létrehozása", $sql);
  }
  function create_account($kapcsolat){
    $sql="CREATE TABLE `autokolcsonzo`.`account` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Magán/Cég` BOOLEAN NOT NULL , `Lakcím` VARCHAR(100) NOT NULL , `Telephely` VARCHAR(100) NOT NULL , `Cégnév` VARCHAR(60) NOT NULL , `Bankszámlaszám` VARCHAR(100) NOT NULL , `Adószám` VARCHAR(30) NOT NULL , `Cégjegyzékszám` VARCHAR(30) NOT NULL , `user_account_join_id` INT(15) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
    Query($kapcsolat, "account tábla létrehozása", $sql);
  }
  function create_user_account_join($kapcsolat){
    $sql="CREATE TABLE `autokolcsonzo`.`user_account_join` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `account_id` INT(10) UNSIGNED NOT NULL , `contact_id` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
    Query($kapcsolat, "user_account_join tábla létrehozása", $sql);
  }

?>