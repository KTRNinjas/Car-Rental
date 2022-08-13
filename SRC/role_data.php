<?php
function createRoleTable($kapcsolat)
{
    $sql = "CREATE TABLE `autokolcsonzo`.`Role` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `role_name` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; ";
    return Query($kapcsolat, "A Role tábla létrehozása ", $sql);
}
function insertRoles($kapcsolat)
{
    $messages = [];
    $sql = "INSERT INTO `autokolcsonzo`.`Role` (`id`, `role_name`) VALUES (NULL, 'Vásárló') ";
    $messages[0] = Query($kapcsolat, "A Vásárló Role létrehozása ", $sql);
    $sql = "INSERT INTO `autokolcsonzo`.`Role` (`id`, `role_name`) VALUES (NULL, 'Autófelvevő') ";
    $messages[1] = Query($kapcsolat, "Az autófelvevő Role létrehozása ", $sql);
    $sql = "INSERT INTO `autokolcsonzo`.`Role` (`id`, `role_name`) VALUES (NULL, 'Admin') ";
    $messages[2] = Query($kapcsolat, "Az Admin Role létrehozása ", $sql);
    $sql = "INSERT INTO `autokolcsonzo`.`Role` (`id`, `role_name`) VALUES (NULL, 'Sales') ";
    $messages[3] = Query($kapcsolat, "A Sales Role létrehozása ", $sql);
    $sql = "INSERT INTO `autokolcsonzo`.`Role` (`id`, `role_name`) VALUES (NULL, 'Főnök') ";
    $messages[4] = Query($kapcsolat, "A Főnök Role létrehozása ", $sql);
    return $messages;
}
function alterRoleTable($kapcsolat)
{
    $sql = "ALTER TABLE `autokolcsonzo`.`contact` ADD FOREIGN KEY (`Role_id`) REFERENCES `autokolcsonzo`.`Role`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; ";
    return Query($kapcsolat, "A Role tábla megváltoztatása ", $sql);
}
