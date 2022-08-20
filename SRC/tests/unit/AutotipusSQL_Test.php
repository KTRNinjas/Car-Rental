<?php

namespace Tests\Unit;

$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "AutotipusSQL.php");

use mysqli;

use \Tests\Support\UnitTester;


class ExampleTest extends \Codeception\Test\Unit
{
//protected UnitTester $tester;

    protected function _before()
    {
        // $path=dirname(__DIR__,2);
        // include_once($path.DIRECTORY_SEPARATOR."Connection".DIRECTORY_SEPARATOR."Dbconn.php");
        // include_once($path.DIRECTORY_SEPARATOR.'AutotipusSQL.php');
                //  ezeket kikomentoltam mert a m'sikban nincs ott role_data_integration_test.php
    }

    // tests
    public function test_MainAutotipusTablaLetrehozas()
    {
        //given
        $kapcsolat=[];
        sleep(2);
        //when
        $result= MainAutotipusTablaCreate($kapcsolat);
        
        //then
        $this->assertequals("Az autotipus tabla letrehozasa",$result);
    }
    public function test_2MainAutotipusTablaCreate(){//main tábla létrehozása
        //give
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DROP TABLE `autokolcsonzo`.`fajta`";      
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DROP TABLE `autokolcsonzo`.`kategoria`";        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DROP TABLE `autokolcsonzo`.`környezetvédelmibesorolás`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DROP TABLE `autokolcsonzo`.`autotipus`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        $result = MainAutotipusTablaCreate($kapcsolat);
        //them
        //ahogy láttam a fő tábla volt beszurva 
        $this->assertEquals("Az autotipus tabla letrehozasa sikeres volt!", $result);
        $sql = "CREATE TABLE `autokolcsonzo`.`autotipus` (`ID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `Márka` VARCHAR(50) NOT NULL ,`Tipus` VARCHAR(50) NOT NULL ,`Fajta_ID` INT UNSIGNED NOT NULL , `Kategoria_ID` INT UNSIGNED NOT NULL , `Prémium` BOOLEAN NOT NULL , `Környezetvédelmi_ID` INT UNSIGNED NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
    }
    public function test_if_FajtaID_Inserted()//fajta id teszt :) remélem jó lett
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DROP TABLE `autokolcsonzo`.`fajta`"; 
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DROP TABLE `autokolcsonzo`.`autotipus`";
        $kapcsolat = mysqli_connect($host, $user, $password);
        //When
        $result = AdatfelvetelAutoFajta($kapcsolat);
        //Then
        $this->assertEquals("a fajta sikeresen felvetük a Combi elemet sikeres volt!", $result[0]);
        $this->assertEquals("a fajta sikeresen felvetük a Sedan elemet sikeres volt!", $result[1]);
        $this->assertEquals("a fajta sikeresen felvetük a PickUp elemet sikeres volt!", $result[2]);
        $this->assertEquals("a fajta sikeresen felvetük a SUV elemet sikeres volt!", $result[3]);
        $this->assertEquals("a fajta sikeresen felvetük a 4X4 elemet sikeres volt!", $result[4]);        
    }
    //fajta id teszt :) remélem jó lett
    public function test_if_KategoriaID_Inserted()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DROP TABLE `autokolcsonzo`.`kategoria`"; 
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DROP TABLE `autokolcsonzo`.`autotipus`";
        $kapcsolat = mysqli_connect($host, $user, $password);
        //When
        $result = AdatfelvetelAutoKategoria($kapcsolat);
        //Then
        $this->assertEquals("a kategoria sikeresen felvetük a Kis személy elemet sikeres volt!", $result[0]);
        $this->assertEquals("a kategoria sikeresen felvetük a Személy autó elemet sikeres volt!", $result[1]);
        $this->assertEquals("a kategoria sikeresen felvetük a Kis teher elemet sikeres volt!", $result[2]);
        $this->assertEquals("a kategoria sikeresen felvetük a Teher elemet sikeres volt!", $result[3]); 
    }


}