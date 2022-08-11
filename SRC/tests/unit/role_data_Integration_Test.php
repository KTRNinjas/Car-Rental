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
    $sql="DROP TABLE `autokolcsonzo`.`Role`";
    mysqli_query($kapcsolat,$sql);
    
    //When
    $result=createRoleTable($kapcsolat);
    //Then
    $this->assertEquals("A Role tábla létrehozása Sikeres volt!",$result);
    }
    public function test_if_Roles_Inserted()
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
    $result=insertRoles($kapcsolat);
    //Then
    $this->assertEquals("A Vásárló Role létrehozása Sikeres volt!",$result[0]);
    $this->assertEquals("Az autófelvevő Role létrehozása Sikeres volt!",$result[1]);
    $this->assertEquals("Az Admin Role létrehozása Sikeres volt!",$result[2]);
    $this->assertEquals("A Sales Role létrehozása Sikeres volt!",$result[3]);
    $this->assertEquals("A Főnök Role létrehozása Sikeres volt!",$result[4]);
    }
}
