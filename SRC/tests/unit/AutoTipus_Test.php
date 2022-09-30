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
    
    public function test_if_Fajta_table_altered()
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
        $result = AutoFajtaTablaMegvaltoztatas($kapcsolat);
        //then
        $this->assertEquals("az autotipus tábla Fajtával kaszkádolva sikeres volt!", $result);
        //after
        AdatfelvetelAutoFajta($kapcsolat);
        fill_testAutoTipus($kapcsolat);
    }//? lehet hibás
    public function test_if_Kategoria_table_altered()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        //when
        $sql = "DELETE FROM `autokolcsonzo`.`autotipus`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DELETE FROM `autokolcsonzo`.`kategoria`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $result = KategoriaTablaMegvaltoztatasa($kapcsolat);
        //then
        $this->assertEquals("az autotipus tábla Kategóriával kaszkádolva sikeres volt!", $result);
        //after
        AdatfelvetelAutoKategoria($kapcsolat);
        fill_testAutoTipus($kapcsolat);
    }//? lehet hibás
    public function test_if_Kornyezetvedelmi_table_altered()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        //when
        $sql = "DELETE FROM `autokolcsonzo`.`autotipus`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "DELETE FROM `autokolcsonzo`.`környezetvédelmibesorolás`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $result = KornyezetvedelmiBesorolasMegvaltoztatas($kapcsolat);
        //then
        $this->assertEquals("Az autotipus tábla környezetvédelemmel kaszádolva sikeres volt!", $result);
        //after
        KornyezetvedelmiBesorolas($kapcsolat);
        fill_testAutoTipus($kapcsolat);
    }//? lehet hibás

}