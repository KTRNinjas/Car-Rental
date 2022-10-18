<?php
function create_honlapok($kapcsolat){
  $sql="CREATE TABLE `autokolcsonzo`.`honlapok` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `url` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
  Query($kapcsolat, "honlapok tábla létrehozása", $sql);
}
function create_honlapok_role_join($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`honlapok_role_join` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `honlapok_id` INT(10) UNSIGNED NOT NULL , `role_id` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
  Query($kapcsolat, "honlapok_role_join tábla létrehozása", $sql);
}
function fill_create_honlapok_role_join($kapcsolat){
  $sql = "INSERT INTO `autokolcsonzo`.`honlapok_role_join` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '3', '1')";
  Query($kapcsolat, "create_honlapok_role_join tábla kitöltése view-vásárló jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`honlapok_role_join` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '3', '2')";
  Query($kapcsolat, "create_honlapok_role_join tábla kitöltése view-autófelvevő jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`honlapok_role_join` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '3', '3')";
  Query($kapcsolat, "create_honlapok_role_join tábla kitöltése view-admin jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`honlapok_role_join` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '3', '4')";
  Query($kapcsolat, "create_honlapok_role_join tábla kitöltése view-sales jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`honlapok_role_join` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '3', '5')";
  Query($kapcsolat, "create_honlapok_role_join tábla kitöltése view-főnök jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`honlapok_role_join` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '5', '2')";
  Query($kapcsolat, "ucreate_honlapok_role_join tábla kitöltése autófelvevő jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`honlapok_role_join` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '7', '2')";
  Query($kapcsolat, "ucreate_honlapok_role_join tábla kitöltése autófelvevő jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`honlapok_role_join` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '8', '3')";
  Query($kapcsolat, "ucreate_honlapok_role_join tábla kitöltése admin jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`honlapok_role_join` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '8', '4')";
  Query($kapcsolat, "ucreate_honlapok_role_join tábla kitöltése sales jogosultsággal", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`honlapok_role_join` (`id`, `honlapok_id`, `role_id`) VALUES (NULL, '6', '5')";
  Query($kapcsolat, "ucreate_honlapok_role_join tábla kitöltése főnöki jogosultsággal", $sql);
}

function alter_honlapok_role_join($kapcsolat){
  $sql="ALTER TABLE `autokolcsonzo`.`honlapok_role_join` ADD CONSTRAINT `honlap_kapcsolat` FOREIGN KEY (`honlapok_id`) REFERENCES `autokolcsonzo`.`honlapok`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;";
  Query($kapcsolat, "honlapok_role tábla megváltoztatása", $sql);
}
function alter_role_join($kapcsolat){
  $sql="ALTER TABLE `autokolcsonzo`.`honlapok_role_join` ADD CONSTRAINT `role_kapcsolat` FOREIGN KEY (`role_id`) REFERENCES `autokolcsonzo`.`role`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;";
  Query($kapcsolat, "role tábla megváltoztatása", $sql);
}

?>