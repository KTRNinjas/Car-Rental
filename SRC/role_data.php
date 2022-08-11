<?php
function createRoleTable($kapcsolat){
    $sql="CREATE TABLE `autokolcsonzo`.`Role` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `role_name` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; ";
    Query($kapcsolat,"A Role tábla létrehozása",$sql);
}
?>