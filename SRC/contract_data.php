<?php 
  function create_contract_table($kapcsolat){
   $sql="CREATE TABLE `autokolcsonzo`.`contract` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Kezdődátum` DATE NOT NULL , `Végdátum` DATE NOT NULL , `Account_ID` INT(10) UNSIGNED NOT NULL , `Visszavétel_időpontja` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
   $üzenet="contract tábla létrehozása ";
   return Query($kapcsolat,$üzenet,$sql);
  }
?>