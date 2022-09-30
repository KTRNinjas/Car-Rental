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
    public function test_if_kategoria_table_filled_with_elements()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DELETE FROM `autokolcsonzo`.`kategoria`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        AdatfelvetelAutoKategoria($kapcsolat);
        $sql = "SELECT * FROM `autokolcsonzo`.`kategoria`";
        $kategoria_collector = [];
        $result = mysqli_query($kapcsolat, $sql);
        while ($egysor = mysqli_fetch_array($result)) {
            $kategoria = [];
            $kategoria["ID"] = $egysor["ID"];
            $kategoria["Kategoria"] = $egysor["Kategoria"];
            array_push($kategoria_collector, $kategoria);
        }
        //then
        $this->assertEquals(4, count($kategoria_collector));
        $this->assertEquals(1, $kategoria_collector[0]["ID"]);
        $this->assertEquals("Kis személy", $kategoria_collector[0]["Kategoria"]);
        $this->assertEquals(2, $kategoria_collector[1]["ID"]);
        $this->assertEquals("Személy autó", $kategoria_collector[1]["Kategoria"]);
        $this->assertEquals(3, $kategoria_collector[3]["ID"]);
        $this->assertEquals("Kis teher", $kategoria_collector[3]["Kategoria"]);
        $this->assertEquals(4, $kategoria_collector[4]["ID"]);
        $this->assertEquals("Teher", $kategoria_collector[4]["Kategoria"]);
    }//<-kesz
    public function test_if_kornyezetvedelem_table_filled_with_elements()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DELETE FROM `autokolcsonzo`.`környezetvédelmibesorolás`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        KornyezetvedelmiBesorolas($kapcsolat);
        $sql = "SELECT * FROM `autokolcsonzo`.`környezetvédelmibesorolás`";
        $kornyezetvedelmibesorolas_collector = [];
        $result = mysqli_query($kapcsolat, $sql);
        while ($egysor = mysqli_fetch_array($result)) {
            $kornyezetvedelmibesorolas = [];
            $kornyezetvedelmibesorolas["ID"] = $egysor["ID"];
            $kornyezetvedelmibesorolas["KörnyezetvédelmiBesorolás"] = $egysor["KörnyezetvédelmiBesorolás"];
            array_push($kornyezetvedelmibesorolas_collector, $kornyezetvedelmibesorolas);
        }
        //then
        $this->assertEquals(6, count($kornyezetvedelmibesorolas_collector));
        $this->assertEquals(1, $kornyezetvedelmibesorolas_collector[0]["ID"]);
        $this->assertEquals("E1", $kornyezetvedelmibesorolas_collector[0]["KörnyezetvédelmiBesorolás"]);
        $this->assertEquals(2, $kornyezetvedelmibesorolas_collector[1]["ID"]);
        $this->assertEquals("E2", $kornyezetvedelmibesorolas_collector[1]["KörnyezetvédelmiBesorolás"]);
        $this->assertEquals(3, $kornyezetvedelmibesorolas_collector[2]["ID"]);
        $this->assertEquals("E3", $kornyezetvedelmibesorolas_collector[2]["KörnyezetvédelmiBesorolás"]);
        $this->assertEquals(4, $kornyezetvedelmibesorolas_collector[3]["ID"]);
        $this->assertEquals("E4", $kornyezetvedelmibesorolas_collector[3]["KörnyezetvédelmiBesorolás"]);
        $this->assertEquals(5, $kornyezetvedelmibesorolas_collector[4]["ID"]);
        $this->assertEquals("E5", $kornyezetvedelmibesorolas_collector[4]["KörnyezetvédelmiBesorolás"]);
        $this->assertEquals(6, $kornyezetvedelmibesorolas_collector[5]["ID"]);
        $this->assertEquals("E6", $kornyezetvedelmibesorolas_collector[5]["KörnyezetvédelmiBesorolás"]);
    }//<-kesz
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
    }//<-kesz
    public function test_if_Cascadolas_table_altered()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        //when
        $sql = "DELETE FROM `autokolcsonzo`.`autotipus`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DELETE FROM `autokolcsonzo`.`fajta`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $result = AutotipusTablamegvaltoztatasa($kapcsolat);
        //then
        $this->assertEquals("Az autotipus tábla környezetvédelemmel kaszádolva sikeres volt!", $result);
        $this->assertEquals("az autotipus tábla Kategóriával kaszkádolva sikeres volt!", $result);
        $this->assertEquals("az autotipus tábla Fajtával kaszkádolva sikeres volt!", $result);
    }//? lehet hibás
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