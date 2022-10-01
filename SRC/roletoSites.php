<?php
function create_honlapok($kapcsolat){
  $sql="CREATE TABLE `autokolcsonzo`.`honlapok` (`id` INT NOT NULL AUTO_INCREMENT , `url` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
  Query($kapcsolat, "honlapok tábla létrehozása", $sql);
}
function create_honlapok_role_join($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`honlapok_role_join` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `honlapok_id` INT(10) UNSIGNED NOT NULL , `role_id` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
  Query($kapcsolat, "honlapok_role_join tábla létrehozása", $sql);
}
function fill_create_honlapok_role_join($kapcsolat){
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '', '2')";
  Query($kapcsolat, "ucreate_honlapok_role_join tábla kitöltése autófelvevő jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '', '3')";
  Query($kapcsolat, "ucreate_honlapok_role_join tábla kitöltése admin jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '', '4')";
  Query($kapcsolat, "ucreate_honlapok_role_join tábla kitöltése sales jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '', '5')";
  Query($kapcsolat, "ucreate_honlapok_role_join tábla kitöltése főnöki jogosultsággal", $sql);
}


?>