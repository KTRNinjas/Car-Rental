<?php

namespace Tests\Unit;

use \Tests\Support\UnitTester;

class Role_DAO_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function test_if_USER_NOT_FOUND_BY_HIS_NAME_AND_EMAIL()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "role_dao.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        //$db="Autokolcsonzo";//adatbázis neve

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //When
        $result = getRoleIDAndRoleNameOfAUser("kamu@kamu.hu", "Kamu", "Kamu");
        //Then
        $this->assertEquals(0, count($result));
    }
    public function test_if_USER_FOUND_BY_HIS_NAME_AND_EMAIL()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "role_dao.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        //$db="Autokolcsonzo";//adatbázis neve

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //When
        $result = getRoleIDAndRoleNameOfAUser("k.pal@gmail.com", "Ka", "Pál");
        //Then
        $this->assertEquals(1, $result['id']);
        $this->assertEquals("Ka", $result['Vezetéknév']);
        $this->assertEquals("Pál", $result['Keresztnév']);
        $this->assertEquals("k.pal@gmail.com", $result['email']);
        $this->assertEquals("1", $result['Role_id']);
        $this->assertEquals("Vásárló", $result['rolename']);
    }
    public function test_if_all_roles_found_to_fill_legördülő()
    {
        //given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "role_dao.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        //$db="Autokolcsonzo";//adatbázis neve

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //When
        $result = getAllRoles();
        //Then
        $this->assertEquals("Vásárló", $result[1]);
        $this->assertEquals("Autófelvevő", $result[2]);
        $this->assertEquals("Admin", $result[3]);
        $this->assertEquals("Sales", $result[4]);
        $this->assertEquals("Főnök", $result[5]);
    }
}
