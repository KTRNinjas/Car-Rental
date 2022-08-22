<?php

namespace Tests\Unit;

use mysqli;
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
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DROP TABLE `autokolcsonzo`.`contact`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DROP TABLE `autokolcsonzo`.`Role`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //When
        $result = createRoleTable($kapcsolat);
        //Then
        $this->assertEquals("A Role tábla létrehozása Sikeres volt!", $result);
        $sql = "CREATE TABLE `autokolcsonzo`.`contact` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `Vezetéknév` VARCHAR(50) NOT NULL , `Keresztnév` VARCHAR(50) NOT NULL , `e-mail` VARCHAR(50) NOT NULL , `Password` VARCHAR(50) NOT NULL , `Jogosítvány száma` VARCHAR(20) NOT NULL , `Telefonszám` INT(15) UNSIGNED NULL , `Role_id` INT(10) UNSIGNED NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
    }
    public function test_if_Roles_Inserted()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        //When
        $result = insertRoles($kapcsolat);
        //Then
        $this->assertEquals("A Vásárló Role létrehozása Sikeres volt!", $result[0]);
        $this->assertEquals("Az autófelvevő Role létrehozása Sikeres volt!", $result[1]);
        $this->assertEquals("Az Admin Role létrehozása Sikeres volt!", $result[2]);
        $this->assertEquals("A Sales Role létrehozása Sikeres volt!", $result[3]);
        $this->assertEquals("A Főnök Role létrehozása Sikeres volt!", $result[4]);
    }
    public function test_if_Role_Table_Altered()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        //When
        $result = alterRoleTable($kapcsolat);
        //Then
        $this->assertEquals("A Role tábla megváltoztatása Sikeres volt!", $result);
    }
    public function test_if_Role_Cant_Be_Deleted_if_user_belongs_to_it()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "INSERT INTO `autokolcsonzo`.`Role` (`id`, `role_name`) VALUES (NULL, 'testrole')";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (NULL, 'testuser', 'testuser', 'test@test.hu', 'test', '', NULL, '6')";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        //When
        $sql = "DELETE FROM `autokolcsonzo`.`Role` WHERE `Role`.`role_name` = 'testrole'";
        $result = mysqli_query($kapcsolat, $sql);
        //Then
        $this->assertFalse($result);
        //When
        $sql = "DELETE FROM `autokolcsonzo`.`contact` WHERE `contact`.`Vezetéknév` = 'testuser'";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        $sql = "DELETE FROM `autokolcsonzo`.`Role` WHERE `Role`.`role_name` = 'testrole'";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
    }
}
