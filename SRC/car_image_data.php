<?php 
function createCarImageTable($kapcsolat){
    $sql="CREATE TABLE `autokolcsonzo`.`car_images` (`id` INT(20) UNSIGNED NOT NULL AUTO_INCREMENT , `car_id` INT(20) UNSIGNED NOT NULL , `path` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    $uzenet="A car-images tábla létrehozása ";
    return Query($kapcsolat,$uzenet,$sql);
}
function alterCarImageTable($kapcsolat){
    $sql="ALTER TABLE `autokolcsonzo`.`car_images` ADD FOREIGN KEY (`car_id`) REFERENCES `autokolcsonzo`.`cars`(`id`) ON DELETE CASCADE ON UPDATE CASCADE; ";
    $uzenet="A car-images tábla kaszkádolása ";
    return Query($kapcsolat,$uzenet,$sql);
}
?>