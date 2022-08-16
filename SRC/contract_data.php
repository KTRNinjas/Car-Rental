<?php 
  function create_contract_table($kapcsolat){
   $sql="CREATE TABLE `autokolcsonzo`.`contract` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Kezdődátum` DATE NOT NULL , `Végdátum` DATE NOT NULL , `Account_ID` INT(10) UNSIGNED NOT NULL , `Visszavétel_időpontja` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
   $üzenet="contract tábla létrehozása ";
   return Query($kapcsolat,$üzenet,$sql);
  }
  function Contract_create($kapcsolat){
    $sql="INSERT INTO `autokolcsonzo`.`contract` (`id`, `Kezdődátum`, `Végdátum`, `Account_ID`, `Visszavétel_időpontja`) VALUES (NULL, '2022-08-24', '2022-08-31', '0', '2022-08-31')";
    $uzenet="contract létrehozasa";
    Query($kapcsolat,$uzenet,$sql);
    $sql="INSERT INTO `autokolcsonzo`.`contract` (`id`, `Kezdődátum`, `Végdátum`, `Account_ID`, `Visszavétel_időpontja`) VALUES (NULL, '2022-08-25', '2022-08-29', '0', '2022-08-31')";
    $uzenet="contract létrehozasa";
    Query($kapcsolat,$uzenet,$sql);
    $sql="INSERT INTO `autokolcsonzo`.`contract` (`id`, `Kezdődátum`, `Végdátum`, `Account_ID`, `Visszavétel_időpontja`) VALUES (NULL, '2022-09-26', '2022-09-30', '0', '2022-09-31')";
    $uzenet="contract létrehozasa";
    Query($kapcsolat,$uzenet,$sql);
  }
  function Create_Contract_car_join_table($kapcsolat){
    $sql="CREATE TABLE `autokolcsonzo`.`contract_car_join` (`ID` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Car_ID` INT UNSIGNED NOT NULL , `Contract_ID` INT UNSIGNED NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;";
    $uzenet="Contract car join tabla létrehozasa ";
    return Query($kapcsolat,$uzenet,$sql);
    
  }
  function Contract_car_table_beszuro($kapcsolat){
    $sql="INSERT INTO `autokolcsonzo`.`contract_car_join` (`ID`, `Car_ID`, `Contract_ID`) VALUES (NULL, '2', '3')";
    $uzenet="Contract_car tablaba a beszuras";
    Query($kapcsolat,$uzenet,$sql);
    $sql="INSERT INTO `autokolcsonzo`.`contract_car_join` (`ID`, `Car_ID`, `Contract_ID`) VALUES (NULL, '1', '3')";
    $uzenet="Contract_car tablaba a beszuras";
    Query($kapcsolat,$uzenet,$sql);
    $sql="INSERT INTO `autokolcsonzo`.`contract_car_join` (`ID`, `Car_ID`, `Contract_ID`) VALUES (NULL, '4', '3')";
    $uzenet="Contract_car tablaba a beszuras";
    Query($kapcsolat,$uzenet,$sql);
    $sql="INSERT INTO `autokolcsonzo`.`contract_car_join` (`ID`, `Car_ID`, `Contract_ID`) VALUES (NULL, '2', '1')";
    $uzenet="Contract_car tablaba a beszuras";
    Query($kapcsolat,$uzenet,$sql);
  }
?>