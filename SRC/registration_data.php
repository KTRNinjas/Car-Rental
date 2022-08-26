<?php
function create_contact($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`contact` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Vezetéknév` VARCHAR(50) NOT NULL , `Keresztnév` VARCHAR(50) NOT NULL , `e-mail` VARCHAR(50) NOT NULL , `Password` VARCHAR(50) NOT NULL , `Jogosítvány száma` VARCHAR(20) NOT NULL , `Telefonszám` VARCHAR(15) NULL , `Role_id` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
  Query($kapcsolat, "contact tábla létrehozása", $sql);
}
function fill_user_data($kapcsolat)
{
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (NULL, 'Ka', 'Pál', 'k.pal@gmail.com', 'Palika1', '', NULL, '1')";
  Query($kapcsolat, "user_data tábla kitöltése Ka Pállal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (NULL, 'Tök', 'Ödön', 't_odon@gmail.com', 'tokodon2', '', NULL, '1')";
  Query($kapcsolat, "user_data tábla kitöltése Tök Ödönnel", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (NULL, 'Füty', 'Imre', 'f_imre@gmail.com', 'futyimre25', '', NULL, '1')";
  Query($kapcsolat, "user_data tábla kitöltése Füty Imrével", $sql);
}
