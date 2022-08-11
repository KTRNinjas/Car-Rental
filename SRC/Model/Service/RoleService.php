<?php
$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'DAO' . DIRECTORY_SEPARATOR . 'role_dao.php');
function getAllRolesService()
{
   return getAllRoles();
}
function getRoleIDAndRoleNameOfAUserService($email, $vezeteknev, $keresztnev)
{
   return getRoleIDAndRoleNameOfAUser($email, $vezeteknev, $keresztnev);
}
