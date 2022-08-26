<?php 
function create_account($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`account` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `orszag` VARCHAR(50) NOT NULL , `iranyitoszam` VARCHAR(50) NOT NULL , `varos` VARCHAR(50) NOT NULL , `utca` VARCHAR(50) NOT NULL , `hazszam` VARCHAR(50) NOT NULL , `bankszamlaszam` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;" ;
  Query($kapcsolat, "Az account tábla létrehozása", $sql);
}
function create_personal_account($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`personal_account` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `account_id` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; " ;
  Query($kapcsolat, "A personal_account tábla létrehozása", $sql);
}
function create_company_account($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`company_account` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `cegnev` VARCHAR(50) NOT NULL , `adoszam` VARCHAR(50) NOT NULL , `cegjegyzekszam` VARCHAR(50) NOT NULL , `account_id` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; " ;
  Query($kapcsolat, "A company_account tábla létrehozása", $sql);
}
function create_user_account_join($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`user_account_join` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `account_id` INT(10) UNSIGNED NOT NULL , `contact_id` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
  Query($kapcsolat, "user_account_join tábla létrehozása", $sql);
}
?>