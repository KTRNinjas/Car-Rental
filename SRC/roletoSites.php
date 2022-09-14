<?php
function create_honlapok($kapcsolat){
  $sql="CREATE TABLE `autokolcsonzo`.`honlapok` (`id` INT NOT NULL AUTO_INCREMENT , `url` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
  Query($kapcsolat, "honlapok tábla létrehozása", $sql);
}
function create_honlapok_role_join($kapcsolat)
{
  # code...
}

?>