<?php
function create_contact($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`contact` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Vezetéknév` VARCHAR(50) NOT NULL , `Keresztnév` VARCHAR(50) NOT NULL , `e-mail` VARCHAR(50) NOT NULL , `Password` VARCHAR(50) NOT NULL , `Jogosítvány száma` VARCHAR(20) NOT NULL , `Telefonszám` VARCHAR(15) NULL , `Role_id` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
  Query($kapcsolat, "contact tábla létrehozása", $sql);
}
function create_account($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`account` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Magán/Cég` BOOLEAN NOT NULL , `Lakcím` VARCHAR(100) NOT NULL , `Telephely` VARCHAR(100) NOT NULL , `Cégnév` VARCHAR(60) NOT NULL , `Bankszámlaszám` VARCHAR(100) NOT NULL , `Adószám` VARCHAR(30) NOT NULL , `Cégjegyzékszám` VARCHAR(30) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
  Query($kapcsolat, "account tábla létrehozása", $sql);
}
function create_user_account_join($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`user_account_join` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `account_id` INT(10) UNSIGNED NOT NULL , `contact_id` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
  Query($kapcsolat, "user_account_join tábla létrehozása", $sql);
}
function fill_user_data($kapcsolat)
{
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (NULL, 'Ka', 'Pál', 'k.pal@gmail.com', 'Palika1', '', NULL, '1')";
  Query($kapcsolat, "user_data tábla kitöltése Ka Pállal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (NULL, 'Tök', 'Ödön', 't_odon@gmail.com', 'tokodon2', '', NULL, '1')";
  Query($kapcsolat, "user_data tábla kitöltése Tök Ödönnel", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (NULL, 'Füty', 'Imre', 'f_imre@gmail.com', 'futyimre25', '', NULL, '1')";
  Query($kapcsolat, "user_data tábla kitöltése Füty Imrével", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (NULL, 'Füty', 'Imre', 'autofelvevo@gmail.com', 'autofelvevo', '', NULL, '2')";
  Query($kapcsolat, "user_data tábla kitöltése autófelvevővel", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (NULL, 'Füty', 'Imre', 'admin@gmail.com', 'admin', '', NULL, '3')";
  Query($kapcsolat, "user_data tábla kitöltése adminnal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (NULL, 'Füty', 'Imre', 'fonok@gmail.com', 'fonok', '', NULL, '5')";
  Query($kapcsolat, "user_data tábla kitöltése főnökkel", $sql);
}
