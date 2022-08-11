<?php
$path = dirname(__DIR__, 1);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "RoleService.php");
$url = "/Admin";
$fileLocation = $path . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . "Admin.php";
$routes[$url] = $fileLocation;
function searchForUserRole()
{
    if (isset($_POST['searchUserRole'])) {
        $email = $_POST['email'];
        $vezeteknev = $_POST['lastname'];
        $keresztnev = $_POST['firstname'];
        $user = getRoleIDAndRoleNameOfAUserService($email, $vezeteknev, $keresztnev);
        if (count($user) == 0) {
            print "Nincs ilyen nevű ember az adatbázisban";
        } else {
            print '<form method="POST"><table>
            <thead>
            <th></th>
            <th>Vezetéknév</th>
            <th>Keresztnév</th>
            <th>e-mail</th>
            <th>Role azonosító</th>
            </thead>
            <tbody>
            <tr>
            <td><input type="number" name=user_id value="' . $user["id"] . '" size="0" hidden></td>
            <td>' . $user["Vezetéknév"] . '</td>
            <td>' . $user["Keresztnév"] . '</td>
            <td>' . $user["email"] . '</td>
            <td>' . createRoleLegördülő($user["Role_id"]) . '</td>
            <td><input type="submit" name="roleSubmit" value="Módosítás"></td>
            </tr>
            </tbody>
            </table>         
            </form>';
        }
    }
}
function createRoleLegördülő($roleID, $isTest = false, $testData = [])
{
    if ($isTest) {
        $roles = $testData;
    } else {
        $roles = getAllRolesService();
    }
    $display = "";
    $display .= '<select name="roleSelect" id="roleSelect">';
    foreach ($roles as $key => $value) {
        if ($key == $roleID) {
            $display .= '<option value="' . $key . '" selected>' . $value . '</option>';
        } else {
            $display .= '<option value="' . $key . '">' . $value . '</option>';
        }
    }
    $display .= '</select>';
    return $display;
}
function updateRoleController()
{
    if (isset($_POST['roleSubmit'])) {
        $user_id = $_POST['user_id'];
        $role_id = $_POST['roleSelect'];
        updateRoleService($user_id, $role_id);
        header('Location: /Admin', true, 303);
    }
}
