<?php
namespace Tests\Unit;

use \Tests\Support\UnitTester;

class Role_Data_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function test_if_Role_Data_Table_Created()
    {
    //Given
    $path = dirname(__DIR__, 2);
    include_once($path.DIRECTORY_SEPARATOR."role_data.php");
    include_once($path.DIRECTORY_SEPARATOR."Filldb.php");
    $host="127.0.0.1";
    $user="root";
    $password="";
    //$db="Autokolcsonzo";//adatbázis neve

    $kapcsolat=mysqli_connect($host,$user,$password);
    //When
    $result=createRoleTable($kapcsolat);
    //Then
    $this->assertEquals("A Role tábla létrehozása Sikeres volt!".$result);
    }
}
