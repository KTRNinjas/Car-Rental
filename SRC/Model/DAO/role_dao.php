<?php
$path = dirname(__DIR__, 2);
require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");
function getRoleIDAndRoleNameOfAUser($email, $vezeteknev, $keresztnev)
{
    $kapcsolat = $GLOBALS['kapcsolat'];
    $sql = "SELECT id, Vezetéknév, Keresztnév, `e-mail`, Role_id,(SELECT role_name FROM `autokolcsonzo`.`Role` WHERE `contact`.`Role_id`=`Role`.`id`) AS rolename FROM `autokolcsonzo`.`contact` WHERE `e-mail`='$email' AND Vezetéknév='$vezeteknev' AND Keresztnév='$keresztnev'";
    $result = mysqli_query($kapcsolat, $sql);
    $user = [];
    if (!$result) {
        return $user;
    } else {
        while ($egysor = mysqli_fetch_assoc($result)) {
            $user['id'] = $egysor['id'];
            $user['Vezetéknév'] = $egysor['Vezetéknév'];
            $user['Keresztnév'] = $egysor['Keresztnév'];
            $user['email'] = $egysor['e-mail'];
            $user['Role_id'] = $egysor['Role_id'];
            $user['rolename'] = $egysor['rolename'];
        }
        return $user;
    }
}
function getAllRoles()
{
    $kapcsolat = $GLOBALS['kapcsolat'];
    $sql = "SELECT * FROM `autokolcsonzo`.`Role`";
    $result = mysqli_query($kapcsolat, $sql);
    $roles = [];
    while ($egysor = mysqli_fetch_assoc($result)) {
        $roles[$egysor['id']] = $egysor['role_name'];
    }
    return $roles;
}
