<?php
function create_cars($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`cars` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Rendszám` VARCHAR(50) NOT NULL , `Alvázszám` VARCHAR(50) NOT NULL , `hajtaslanc_id` INT(10) UNSIGNED NOT NULL , `valtotipus_id` INT(10) UNSIGNED NOT NULL , `Evjarat` INT(4) NOT NULL , `Teljesitmeny` INT(10) NOT NULL , `Biztositasi_dij` INT(10) NOT NULL , `km` INT(10) NOT NULL , `Forgalmi_megujitasanak_ideje` DATE NOT NULL , `Autotipus_id` INT(10) UNSIGNED NOT NULL , `Kivezetve` DATE NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB ";
  return Query($kapcsolat, "Az egyedi autó tábla létrehozása", $sql);
}
function create_valtotipus($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`valtotipus` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Valtotipus` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB ";
  return Query($kapcsolat, "A váltótípus tábla létrehozása", $sql);
}
function create_hajtaslanc($kapcsolat)
{
  $sql = "CREATE TABLE `autokolcsonzo`.`hajtaslanc` (`id` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Hajtaslanc` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
  return Query($kapcsolat, "A hajtáslánc tábla létrehozása", $sql);
}
function fill_valtotipus($kapcsolat)
{
  $sql = "INSERT INTO `autokolcsonzo`.`valtotipus` (`id`, `Valtotipus`) VALUES (NULL, 'Kézi') ";
  Query($kapcsolat, "Kézi váltó feltöltése", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`valtotipus` (`id`, `Valtotipus`) VALUES (NULL, 'Automata') ";
  Query($kapcsolat, "Automata váltó feltöltése", $sql);
}
function fill_hajtaslanc($kapcsolat)
{
  $sql = "INSERT INTO `autokolcsonzo`.`hajtaslanc` (`id`, `Hajtaslanc`) VALUES (NULL, 'Benzines') ";
  Query($kapcsolat, "Benzines hajtáslánc feltöltése", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`hajtaslanc` (`id`, `Hajtaslanc`) VALUES (NULL, 'Diesel') ";
  Query($kapcsolat, "Diesel hajtáslánc feltöltése", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`hajtaslanc` (`id`, `Hajtaslanc`) VALUES (NULL, 'Elektromos') ";
  Query($kapcsolat, "Elektromos hajtáslánc feltöltése", $sql);
}
function fill_testcars($kapcsolat)
{
  $sql = "INSERT INTO `autokolcsonzo`.`cars` (`id`, `Rendszám`, `Alvázszám`, `hajtaslanc_id`, `valtotipus_id`, `Evjarat`, `Teljesitmeny`, `Biztositasi_dij`, `km`, `Forgalmi_megujitasanak_ideje`, `Autotipus_id`, `Kivezetve`) VALUES (NULL, 'AAA-001', '123123123123', '1', '1', '2008', '8', '100000', '50000', '2022-07-31', '1', NULL)";
  Query($kapcsolat, "tesztauto1 betöltése ", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`cars` (`id`, `Rendszám`, `Alvázszám`, `hajtaslanc_id`, `valtotipus_id`, `Evjarat`, `Teljesitmeny`, `Biztositasi_dij`, `km`, `Forgalmi_megujitasanak_ideje`, `Autotipus_id`, `Kivezetve`) VALUES (NULL, 'BBB-002', '123123123123', '2', '2', '2009', '9', '110000', '60000', '2022-08-31', '2', NULL)";
  Query($kapcsolat, "tesztauto2 betöltése ", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`cars` (`id`, `Rendszám`, `Alvázszám`, `hajtaslanc_id`, `valtotipus_id`, `Evjarat`, `Teljesitmeny`, `Biztositasi_dij`, `km`, `Forgalmi_megujitasanak_ideje`, `Autotipus_id`, `Kivezetve`) VALUES (NULL, 'CCC-003', '123123123123', '3', '1', '2010', '10', '120000', '70000', '2022-09-28', '3', NULL)";
  Query($kapcsolat, "tesztauto3 betöltése ", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`cars` (`id`, `Rendszám`, `Alvázszám`, `hajtaslanc_id`, `valtotipus_id`, `Evjarat`, `Teljesitmeny`, `Biztositasi_dij`, `km`, `Forgalmi_megujitasanak_ideje`, `Autotipus_id`, `Kivezetve`) VALUES (NULL, 'DDD-004', '123123123123', '1', '1', '2011', '11', '130000', '80000', '2022-10-28', '1', '2021-09-28')";
  Query($kapcsolat, "tesztauto4 betöltése ", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`cars` (`id`, `Rendszám`, `Alvázszám`, `hajtaslanc_id`, `valtotipus_id`, `Evjarat`, `Teljesitmeny`, `Biztositasi_dij`, `km`, `Forgalmi_megujitasanak_ideje`, `Autotipus_id`, `Kivezetve`) VALUES (NULL, 'EEE-005', '123123123123', '2', '2', '2012', '12', '140000', '90000', '2022-11-28', '3', '2022-09-28')";
  Query($kapcsolat, "tesztauto5 betöltése ", $sql);
}
function fill_testAutoTipus($kapcsolat)
{
  $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'AudiTeszt', 'S8Teszt', '3', '2', '1', '1') ";
  Query($kapcsolat, "tesztAudiS8 betoltese ", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'VolkswagenTeszt', 'PassatTeszt', '1', '2', '0', '2') ";
  Query($kapcsolat, "tesztVolkswagenPassat betoltese ", $sql);
  $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'JeepTeszt', 'WranglerTeszt', '2', '2', '0', '5') ";
  Query($kapcsolat, "tesztJeepWranlger betoltese ", $sql);
}
function CarsTablamegvaltoztatasa($kapcsolat)
{
  $sql = "ALTER TABLE `autokolcsonzo`.`cars` ADD FOREIGN KEY (`Autotipus_id`) REFERENCES `autokolcsonzo`.`autotipus`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  return Query($kapcsolat, "A cars tábla kaszkádolása ", $sql);
}
<<<<<<< HEAD
<<<<<<< HEAD
function hajtaslancCascad($kapcsolat){
  $sql="ALTER TABLE `autokolcsonzo`.`cars` ADD FOREIGN KEY (`hajtaslanc_id`) REFERENCES `autokolcsonzo`.`hajtaslanc`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  Query($kapcsolat, "A cars hajtaslanc tábla kaszkádolása ", $sql);
}
function valtotipusCascad($kapcsolat){
  $sql="ALTER TABLE `autokolcsonzo`.`cars` ADD FOREIGN KEY (`valtotipus_id`) REFERENCES `autokolcsonzo`.`valtotipus`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
=======
function hajtaslancCascad(){
  $sql="ALTER TABLE `autokolcsonzo`.`cars` ADD FOREIGN KEY (`Autotipus_id`) REFERENCES `autokolcsonzo`.`hajtaslanc`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  Query($kapcsolat, "A cars hajtaslanc tábla kaszkádolása ", $sql);
}
function valtotipusCascad(){
  $sql="ALTER TABLE `autokolcsonzo`.`cars` ADD FOREIGN KEY (`Autotipus_id`) REFERENCES `autokolcsonzo`.`Valtotipus`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
>>>>>>> 41a0a42 (cascad kesz tesyt nincs)
=======
function hajtaslancCascad($kapcsolat){
  $sql="ALTER TABLE `autokolcsonzo`.`cars` ADD FOREIGN KEY (`hajtaslanc_id`) REFERENCES `autokolcsonzo`.`hajtaslanc`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
  Query($kapcsolat, "A cars hajtaslanc tábla kaszkádolása ", $sql);
}
function valtotipusCascad($kapcsolat){
  $sql="ALTER TABLE `autokolcsonzo`.`cars` ADD FOREIGN KEY (`valtotipus_id`) REFERENCES `autokolcsonzo`.`valtotipus`(`ID`) ON DELETE CASCADE ON UPDATE CASCADE";
>>>>>>> c9e10de (kesz a kaskadolas)
  Query($kapcsolat, "A cars valtotipus tábla kaszkádolása ", $sql);
}