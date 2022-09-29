<?php

namespace Tests\Unit;

$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "AutotipusSQL.php");

use mysqli;
use \Tests\Support\UnitTester;

class Autotipus_Data_Integration_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function test_if_autotipus_table_created()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DROP TABLE `autokolcsonzo`.`autotipus`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        $result = creatAutotipusManiTable($kapcsolat);
        //then
        $this->assertEquals("Az autotipus tábla létrehozása sikeres volt!", $result);
    }

    //<-kesz
    public function test_if_fajta_table_created()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DROP TABLE `autokolcsonzo`.`fajta`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        $result = creatFajtaTable($kapcsolat);
        //then
        $this->assertEquals("Az Fajta tábla letrehozasa sikeres volt!", $result);
    }
    //<-kesz

    public function test_if_kategoria_table_created()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DROP TABLE `autokolcsonzo`.`kategoria`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        $result = creatKategoriaTable($kapcsolat);
        //then
        $this->assertEquals("Az Kategoria tabla letrehozasa sikeres volt!", $result);
    }
    //<-kesz
    public function test_if_Kornyeyetvedelem_table_created()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DROP TABLE `autokolcsonzo`.`környezetvédelmibesorolás`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        $result = creatKornyezetvedelemTable($kapcsolat);
        //then
        $this->assertEquals("Az Környezetvédelmi besorolás tábla létrehozása sikeres volt!", $result);
    }
    //<-kesz
    public function test_if_fajta_table_filled_with_elements()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DELETE FROM `autokolcsonzo`.`fajta`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        AdatfelvetelAutoFajta($kapcsolat);
        $sql = "SELECT * FROM `autokolcsonzo`.`fajta`";
        $fajta_collector = [];
        $result = mysqli_query($kapcsolat, $sql);
        while ($egysor = mysqli_fetch_array($result)) {
            $fajta = [];
            $fajta["ID"] = $egysor["ID"];
            $fajta["Fajta_neve"] = $egysor["Fajta_neve"];
            array_push($fajta_collector, $fajta);
        }
        //then
        $this->assertEquals(6, count($fajta_collector));
        $this->assertEquals(1, $fajta_collector[0]["ID"]);
        $this->assertEquals("Combi", $fajta_collector[0]["Fajta_neve"]);
        $this->assertEquals(2, $fajta_collector[1]["ID"]);
        $this->assertEquals("Terepjáró", $fajta_collector[1]["Fajta_neve"]);
        $this->assertEquals(3, $fajta_collector[2]["ID"]);
        $this->assertEquals("Sedan", $fajta_collector[1]["Fajta_neve"]);
        $this->assertEquals(4, $fajta_collector[3]["ID"]);
        $this->assertEquals("PickUp", $fajta_collector[1]["Fajta_neve"]);
        $this->assertEquals(5, $fajta_collector[4]["ID"]);
        $this->assertEquals("SUV", $fajta_collector[1]["Fajta_neve"]);
        $this->assertEquals(6, $fajta_collector[5]["ID"]);
        $this->assertEquals("4X4", $fajta_collector[1]["Fajta_neve"]);
    }//<-kesz
    public function test_if_hajtaslanc_table_filled_with_elements()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DELETE FROM `autokolcsonzo`.`hajtaslanc`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        fill_hajtaslanc($kapcsolat);
        $sql = "SELECT * FROM `autokolcsonzo`.`hajtaslanc`";
        $hajtaslanc_collector = [];
        $result = mysqli_query($kapcsolat, $sql);
        while ($egysor = mysqli_fetch_array($result)) {
            $hajtaslanc = [];
            $hajtaslanc["id"] = $egysor["id"];
            $hajtaslanc["Hajtaslanc"] = $egysor["Hajtaslanc"];
            array_push($hajtaslanc_collector, $hajtaslanc);
        }
        //then
        $this->assertEquals(3, count($hajtaslanc_collector));
        $this->assertEquals(1, $hajtaslanc_collector[0]["id"]);
        $this->assertEquals("Benzines", $hajtaslanc_collector[0]["Hajtaslanc"]);
        $this->assertEquals(2, $hajtaslanc_collector[1]["id"]);
        $this->assertEquals("Diesel", $hajtaslanc_collector[1]["Hajtaslanc"]);
        $this->assertEquals(3, $hajtaslanc_collector[2]["id"]);
        $this->assertEquals("Elektromos", $hajtaslanc_collector[2]["Hajtaslanc"]);
    }
    public function test_if_cars_table_filled_with_elements()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DELETE FROM `autokolcsonzo`.`cars`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        fill_testcars($kapcsolat);
        $sql = "SELECT * FROM `autokolcsonzo`.`cars`";
        $car_collector = [];
        $result = mysqli_query($kapcsolat, $sql);
        while ($egysor = mysqli_fetch_array($result)) {
            array_push($car_collector, $egysor);
        }
        //then
        $this->assertEquals(5, count($car_collector));

        $this->assertEquals(1, $car_collector[0]["id"]);
        $this->assertEquals("AAA-001", $car_collector[0]["Rendszám"]);
        $this->assertEquals("123123123123", $car_collector[0]["Alvázszám"]);
        $this->assertEquals(1, $car_collector[0]["hajtaslanc_id"]);
        $this->assertEquals(1, $car_collector[0]["valtotipus_id"]);
        $this->assertEquals("2008", $car_collector[0]["Evjarat"]);
        $this->assertEquals(8, $car_collector[0]["Teljesitmeny"]);
        $this->assertEquals(100000, $car_collector[0]["Biztositasi_dij"]);
        $this->assertEquals(50000, $car_collector[0]["km"]);
        $this->assertEquals("2022-07-31", $car_collector[0]["Forgalmi_megujitasanak_ideje"]);
        $this->assertEquals(1, $car_collector[0]["Autotipus_id"]);
        $this->assertEquals(NULL, $car_collector[0]["Kivezetve"]);

        $this->assertEquals(2, $car_collector[1]["id"]);
        $this->assertEquals("BBB-002", $car_collector[1]["Rendszám"]);
        $this->assertEquals("123123123123", $car_collector[1]["Alvázszám"]);
        $this->assertEquals(2, $car_collector[1]["hajtaslanc_id"]);
        $this->assertEquals(2, $car_collector[1]["valtotipus_id"]);
        $this->assertEquals("2009", $car_collector[1]["Evjarat"]);
        $this->assertEquals(9, $car_collector[1]["Teljesitmeny"]);
        $this->assertEquals(110000, $car_collector[1]["Biztositasi_dij"]);
        $this->assertEquals(60000, $car_collector[1]["km"]);
        $this->assertEquals("2022-08-31", $car_collector[1]["Forgalmi_megujitasanak_ideje"]);
        $this->assertEquals(2, $car_collector[1]["Autotipus_id"]);
        $this->assertEquals(NULL, $car_collector[1]["Kivezetve"]);

        $this->assertEquals(3, $car_collector[2]["id"]);
        $this->assertEquals("CCC-003", $car_collector[2]["Rendszám"]);
        $this->assertEquals("123123123123", $car_collector[2]["Alvázszám"]);
        $this->assertEquals(3, $car_collector[2]["hajtaslanc_id"]);
        $this->assertEquals(1, $car_collector[2]["valtotipus_id"]);
        $this->assertEquals("2010", $car_collector[2]["Evjarat"]);
        $this->assertEquals(10, $car_collector[2]["Teljesitmeny"]);
        $this->assertEquals(120000, $car_collector[2]["Biztositasi_dij"]);
        $this->assertEquals(70000, $car_collector[2]["km"]);
        $this->assertEquals("2022-09-28", $car_collector[2]["Forgalmi_megujitasanak_ideje"]);
        $this->assertEquals(3, $car_collector[2]["Autotipus_id"]);
        $this->assertEquals(NULL, $car_collector[2]["Kivezetve"]);

        $this->assertEquals(4, $car_collector[3]["id"]);
        $this->assertEquals("DDD-004", $car_collector[3]["Rendszám"]);
        $this->assertEquals("123123123123", $car_collector[3]["Alvázszám"]);
        $this->assertEquals(1, $car_collector[3]["hajtaslanc_id"]);
        $this->assertEquals(1, $car_collector[3]["valtotipus_id"]);
        $this->assertEquals("2011", $car_collector[3]["Evjarat"]);
        $this->assertEquals(11, $car_collector[3]["Teljesitmeny"]);
        $this->assertEquals(130000, $car_collector[3]["Biztositasi_dij"]);
        $this->assertEquals(80000, $car_collector[3]["km"]);
        $this->assertEquals("2022-10-28", $car_collector[3]["Forgalmi_megujitasanak_ideje"]);
        $this->assertEquals(1, $car_collector[3]["Autotipus_id"]);
        $this->assertEquals('2021-09-28', $car_collector[3]["Kivezetve"]);

        $this->assertEquals(5, $car_collector[4]["id"]);
        $this->assertEquals("EEE-005", $car_collector[4]["Rendszám"]);
        $this->assertEquals("123123123123", $car_collector[4]["Alvázszám"]);
        $this->assertEquals(2, $car_collector[4]["hajtaslanc_id"]);
        $this->assertEquals(2, $car_collector[4]["valtotipus_id"]);
        $this->assertEquals("2012", $car_collector[4]["Evjarat"]);
        $this->assertEquals(12, $car_collector[4]["Teljesitmeny"]);
        $this->assertEquals(140000, $car_collector[4]["Biztositasi_dij"]);
        $this->assertEquals(90000, $car_collector[4]["km"]);
        $this->assertEquals("2022-11-28", $car_collector[4]["Forgalmi_megujitasanak_ideje"]);
        $this->assertEquals(3, $car_collector[4]["Autotipus_id"]);
        $this->assertEquals('2022-09-28', $car_collector[4]["Kivezetve"]);
    }
    public function test_if_Autotipus_table_filled_with_elements()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DELETE FROM `autokolcsonzo`.`autotipus`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        fill_testAutoTipus($kapcsolat);
        $sql = "SELECT * FROM `autokolcsonzo`.`autotipus`";
        $autotipus_collector = [];
        $result = mysqli_query($kapcsolat, $sql);
        while ($egysor = mysqli_fetch_array($result)) {
            array_push($autotipus_collector, $egysor);
        }
        //then
        $this->assertEquals(3, count($autotipus_collector));
        $this->assertEquals(7, $autotipus_collector[0]["ID"]);
        $this->assertEquals('AudiTeszt', $autotipus_collector[0]["Márka"]);
        $this->assertEquals('S8Teszt', $autotipus_collector[0]["Tipus"]);
        $this->assertEquals(3, $autotipus_collector[0]["Fajta_ID"]);
        $this->assertEquals(2, $autotipus_collector[0]["Kategoria_ID"]);
        $this->assertEquals(1, $autotipus_collector[0]["Prémium"]);
        $this->assertEquals(1, $autotipus_collector[0]["Környezetvédelmi_ID"]);

        $this->assertEquals(8, $autotipus_collector[1]["ID"]);
        $this->assertEquals('VolkswagenTeszt', $autotipus_collector[1]["Márka"]);
        $this->assertEquals('PassatTeszt', $autotipus_collector[1]["Tipus"]);
        $this->assertEquals(1, $autotipus_collector[1]["Fajta_ID"]);
        $this->assertEquals(2, $autotipus_collector[1]["Kategoria_ID"]);
        $this->assertEquals(0, $autotipus_collector[1]["Prémium"]);
        $this->assertEquals(2, $autotipus_collector[1]["Környezetvédelmi_ID"]);

        $this->assertEquals(9, $autotipus_collector[2]["ID"]);
        $this->assertEquals('JeepTeszt', $autotipus_collector[2]["Márka"]);
        $this->assertEquals('WranglerTeszt', $autotipus_collector[2]["Tipus"]);
        $this->assertEquals(2, $autotipus_collector[2]["Fajta_ID"]);
        $this->assertEquals(2, $autotipus_collector[2]["Kategoria_ID"]);
        $this->assertEquals(0, $autotipus_collector[2]["Prémium"]);
        $this->assertEquals(5, $autotipus_collector[2]["Környezetvédelmi_ID"]);
    }
    public function test_if_Cars_table_altered()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        //when
        $sql = "DELETE FROM `autokolcsonzo`.`autotipus`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DELETE FROM `autokolcsonzo`.`cars`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $result = CarsTablamegvaltoztatasa($kapcsolat);
        //then
        $this->assertEquals("A cars tábla kaszkádolása Sikeres volt!", $result);
        //after
        fill_testcars($kapcsolat);
        fill_testAutoTipus($kapcsolat);
    }
    public function test_if_Cars_table_cascaded_for_autotipus()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "INSERT INTO `autokolcsonzo`.`autotipus` (`ID`, `Márka`, `Tipus`, `Fajta_ID`, `Kategoria_ID`, `Prémium`, `Környezetvédelmi_ID`) VALUES (NULL, 'test', 'test', '3', '2', '1', '1') ";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "SELECT `ID` FROM `autokolcsonzo`.`autotipus` WHERE `Márka`='test' AND `Tipus`='test'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_assoc($result);
        $id = $egysor["ID"];
        $sql = "INSERT INTO `autokolcsonzo`.`cars` (`id`, `Rendszám`, `Alvázszám`, `hajtaslanc_id`, `valtotipus_id`, `Evjarat`, `Teljesitmeny`, `Biztositasi_dij`, `km`, `Forgalmi_megujitasanak_ideje`, `Autotipus_id`, `Kivezetve`) VALUES (NULL, 'test', '123123123123', '1', '1', '2008', '8', '100000', '50000', '2022-07-31', '$id', NULL)";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        $sql = "DELETE FROM `autokolcsonzo`.`autotipus` WHERE `autotipus`.`Márka`='test' AND `autotipus`.`Tipus`='test'";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "SELECT * FROM `autokolcsonzo`.`cars` WHERE `Rendszám`='test'";
        $result = mysqli_query($kapcsolat, $sql);
        $cars = [];
        while ($egysor = mysqli_fetch_array($result)) {
            array_push($cars, $egysor);
        }
        //then
        $this->assertEquals(0, count($cars));
    }
}