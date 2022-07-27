<?php 
  function create_contact($kapcsolat){
    $sql="CREATE TABLE `autokolcsonzo`.`contact` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Vezetéknév` VARCHAR(50) NOT NULL , `Keresztnév` VARCHAR(50) NOT NULL , `e-mail` VARCHAR(50) NOT NULL , `Password` VARCHAR(50) NOT NULL , `Jogosítvány száma` VARCHAR(20) NOT NULL , `Telefonszám` INT(15) UNSIGNED NOT NULL , `user_account_join_id` INT(15) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
    Query($kapcsolat, "contact tábla létrehozása", $sql);

  }

?>