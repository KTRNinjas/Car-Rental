<?php

namespace Tests\Unit;

use mysqli;
use \Tests\Support\UnitTester;

class Honlap_create_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;
    protected function _before()
    {
    }

    // tests
    public function test_if_honlapok_Table_Created()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DROP TABLE `autokolcsonzo`.`honlapok`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //When
        $result = create_honlapok($kapcsolat);
        //Then
        $this->assertEquals("honlapok tábla létrehozása Sikeres volt!", $result);
         $sql = "CREATE TABLE `autokolcsonzo`.`honlapok` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `url` VARCHAR(200) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $this->assertTrue(mysqli_query($kapcsolat, $sql)); 
    }
    public function test_if_honlapok_role_join_Table_Created()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DROP TABLE `autokolcsonzo`.`honlapok_role_join`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DROP TABLE `autokolcsonzo`.`Role`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //When
        $result = create_honlapok_role_join($kapcsolat);
        //Then
        $this->assertEquals("honlapok_role_join tábla létrehozása Sikeres volt!", $result);
         $sql =  "CREATE TABLE `autokolcsonzo`.`Role` (`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT , `role_name` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; ";
        $this->assertTrue(mysqli_query($kapcsolat, $sql)); 
    }
}
