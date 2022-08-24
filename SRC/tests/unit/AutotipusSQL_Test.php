<?php

namespace Tests\Unit;

$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "AutotipusSQL.php");
include_once($path . DIRECTORY_SEPARATOR . "Filldb.php");

use mysqli;

use \Tests\Support\UnitTester;


class AutotipusSQLTest extends \Codeception\Test\Unit
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
    // public function test_MainAutotipusTablaLetrehozas()
    // {
    //     //given
    //     $kapcsolat=[];
    //     sleep(2);
    //     //when
    //     $result= MainAutotipusTablaCreate($kapcsolat);

    //     //then
    //     $this->assertequals("Az autotipus tabla letrehozasa",$result);
    // }
    public function test_2MainAutotipusTablaCreate()
    { //main tábla létrehozása
        //give
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DROP DATABASE `autokolcsonzo`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "CREATE DATABASE `autokolcsonzo`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        $result = MainAutotipusTablaCreate($kapcsolat);
        //them
        //ahogy láttam a fő tábla volt beszurva 
        $this->assertEquals("Az autotipus tabla letrehozasaSikeres volt!", $result);
    }
    public function test_if_SideTable_Create()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);

        //when
        SidetablaCreator($kapcsolat);

        //them
        $sql = "DROP TABLE `autokolcsonzo`.`fajta`";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);

        $sql = "DROP TABLE `autokolcsonzo`.`kategoria`";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);

        $sql = "DROP TABLE `autokolcsonzo`.`környezetvédelmibesorolás`";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        //affter:
        SidetablaCreator($kapcsolat);
    }
    public function test_if_FajtaID_Inserted()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DELETE FROM `autokolcsonzo`.`fajta`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DELETE FROM `autokolcsonzo`.`autotipus`";
        $kapcsolat = mysqli_connect($host, $user, $password);
        //When
        AdatfelvetelAutoFajta($kapcsolat);
        $sql = "SELECT * FROM `autokolcsonzo`.`fajta`";
        $result = mysqli_query($kapcsolat, $sql);
        $fogdo_tomb = [];
        while ($egysor = mysqli_fetch_array($result)) {
            array_push($fogdo_tomb, $egysor);
        };
        //Then
        $this->assertEquals(1, $fogdo_tomb[0]["ID"]);
        $this->assertEquals('Combi', $fogdo_tomb[0]["Fajta_neve"]);

        $this->assertEquals(2, $fogdo_tomb[1]["ID"]);
        $this->assertEquals('Terepjáró', $fogdo_tomb[1]["Fajta_neve"]);

        $this->assertEquals(3, $fogdo_tomb[2]["ID"]);
        $this->assertEquals('Sedan', $fogdo_tomb[2]["Fajta_neve"]);

        $this->assertEquals(4, $fogdo_tomb[3]["ID"]);
        $this->assertEquals('PickUp', $fogdo_tomb[3]["Fajta_neve"]);

        $this->assertEquals(5, $fogdo_tomb[4]["ID"]);
        $this->assertEquals('SUV', $fogdo_tomb[4]["Fajta_neve"]);

        $this->assertEquals(6, $fogdo_tomb[5]["ID"]);
        $this->assertEquals('4X4', $fogdo_tomb[5]["Fajta_neve"]);
    }
    //fajta id teszt :) remélem jó lett
    public function test_if_KategoriaID_Inserted()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DELETE FROM `autokolcsonzo`.`kategoria`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DELETE FROM `autokolcsonzo`.`autotipus`";
        $kapcsolat = mysqli_connect($host, $user, $password);
        //When
        AdatfelvetelAutoKategoria($kapcsolat);
        $sql = "SELECT * FROM `autokolcsonzo`.`kategoria`";
        $result = mysqli_query($kapcsolat, $sql);
        $fogdo_tomb = [];
        while ($egysor = mysqli_fetch_array($result)) {
            array_push($fogdo_tomb, $egysor);
        };
        //Then
        $this->assertEquals(1, $fogdo_tomb[0]["ID"]);
        $this->assertEquals('Kis személy', $fogdo_tomb[0]["Kategoria"]);

        $this->assertEquals(2, $fogdo_tomb[1]["ID"]);
        $this->assertEquals('Személy autó', $fogdo_tomb[1]["Kategoria"]);

        $this->assertEquals(3, $fogdo_tomb[2]["ID"]);
        $this->assertEquals('Kis teher', $fogdo_tomb[2]["Kategoria"]);

        $this->assertEquals(4, $fogdo_tomb[3]["ID"]);
        $this->assertEquals('Teher', $fogdo_tomb[3]["Kategoria"]);
    }
    public function test_if_környezetvédelmibesorolás_Inserted()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DELETE FROM `autokolcsonzo`.`környezetvédelmibesorolás`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DELETE FROM `autokolcsonzo`.`autotipus`";
        $kapcsolat = mysqli_connect($host, $user, $password);
        //When
        KornyezetvedelmiBesorolas($kapcsolat);
        $sql = "SELECT * FROM `autokolcsonzo`.`környezetvédelmibesorolás`";
        $result = mysqli_query($kapcsolat, $sql);
        $fogdo_tomb = [];
        while ($egysor = mysqli_fetch_array($result)) {
            array_push($fogdo_tomb, $egysor);
        };
        //Then
        $this->assertEquals(1, $fogdo_tomb[0]["ID"]);
        $this->assertEquals('E1', $fogdo_tomb[0]["KörnyezetvédelmiBesorolás"]);

        $this->assertEquals(2, $fogdo_tomb[1]["ID"]);
        $this->assertEquals('E2', $fogdo_tomb[1]["KörnyezetvédelmiBesorolás"]);

        $this->assertEquals(3, $fogdo_tomb[2]["ID"]);
        $this->assertEquals('E3', $fogdo_tomb[2]["KörnyezetvédelmiBesorolás"]);

        $this->assertEquals(4, $fogdo_tomb[3]["ID"]);
        $this->assertEquals('E4', $fogdo_tomb[3]["KörnyezetvédelmiBesorolás"]);

        $this->assertEquals(5, $fogdo_tomb[4]["ID"]);
        $this->assertEquals('E5', $fogdo_tomb[4]["KörnyezetvédelmiBesorolás"]);

        $this->assertEquals(6, $fogdo_tomb[5]["ID"]);
        $this->assertEquals('E6', $fogdo_tomb[5]["KörnyezetvédelmiBesorolás"]);
    }
    public function test_if_FajtaTablaCascademukodike()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "INSERT INTO `autokolcsonzo`.`fajta` (`ID`, `Fajta_neve`) VALUES (NULL, 'TestFajta');";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        $sql = "SELECT ID FROM `autokolcsonzo`.`fajta` WHERE `Fajta_neve`='TestFajta'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_assoc($result);
        $this->assertTrue($egysor['ID'] != null);
        $ID = $egysor["ID"];
        $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'TestMarka', 'TestTipus', '$ID', '3', '1', '5');";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        //where
        AutotipusTablamegvaltoztatasa($kapcsolat);
        //them
        $sql = "DELETE FROM `autokolcsonzo`.`fajta`WHERE `Fajta_neve`='TestFajta';";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        $sql = "SELECT ID FROM `autokolcsonzo`.`autotipus` WHERE `Fajta_ID`='$ID'; ";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_assoc($result);
        $this->assertTrue(!isset($egysor['ID']));
    }
    public function test_if_KategoriaTablaCascademukodike()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "INSERT INTO `autokolcsonzo`.`kategoria` (`ID`, `Kategoria`) VALUES (NULL, 'TestKategoria');";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        $sql = "SELECT ID FROM `autokolcsonzo`.`kategoria` WHERE `Kategoria`='TestKategoria'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_assoc($result);
        $this->assertTrue($egysor['ID'] != null);
        $ID = $egysor["ID"];
        $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'TestMarka', 'TestTipus', '2', '$ID', '1', '5');";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        //where
        AutotipusTablamegvaltoztatasa($kapcsolat);
        //them
        $sql = "DELETE FROM `autokolcsonzo`.`kategoria` WHERE `Kategoria`='TestKategoria'";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        $sql = "SELECT ID FROM `autokolcsonzo`.`kategoria` WHERE `Kategoria`='$ID'; ";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_assoc($result);
        $this->assertTrue(!isset($egysor['ID']));
    }



    public function test_if_KornyezetvedelemTablaCascademukodike()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "INSERT INTO `autokolcsonzo`.`környezetvédelmibesorolás` (`ID`, `KörnyezetvédelmiBesorolás`) VALUES (NULL, 'TestkornyezetvedelmiBesorolas');";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        $sql = "SELECT ID FROM `autokolcsonzo`.`környezetvédelmibesorolás` WHERE `KörnyezetvédelmiBesorolás`='TestkornyezetvedelmiBesorolas'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_assoc($result);
        $this->assertTrue($egysor['ID'] != null);
        $ID = $egysor["ID"];
        $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'TestMarka', 'TestTipus', '2', '3', '1', '$ID');";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        //where
        AutotipusTablamegvaltoztatasa($kapcsolat);
        //them
        $sql = "DELETE FROM `autokolcsonzo`.`környezetvédelmibesorolás` WHERE `KörnyezetvédelmiBesorolás`='TestkornyezetvedelmiBesorolas'";
        $result = mysqli_query($kapcsolat, $sql);
        $this->assertTrue($result);
        $sql = "SELECT ID FROM `autokolcsonzo`.`környezetvédelmibesorolás` WHERE `KörnyezetvédelmiBesorolás`='$ID'; ";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_assoc($result);
        $this->assertTrue(!isset($egysor['ID']));
        //affter
        InitDb($kapcsolat);
    }
}
