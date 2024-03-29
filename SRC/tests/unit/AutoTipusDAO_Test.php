<?php

namespace Tests\Unit;

$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoTipusDAO.php");

use mysqli;
use \Tests\Support\UnitTester;

class Autotipus_Data_Integration_Test extends \Codeception\Test\Unit
{
    protected function _before()
    {
    }

    // tests
    public function test_if_getAllAutotipus_gets_All_Autotipus()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoTipusDAO.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //When
        $result=AllautotipusDAO();
        //Then
        $this->assertEquals(6,count($result));
        //AudiTeszt
        $this->assertEquals(1,$result[0]["ID"]);
        $this->assertEquals('AudiTeszt',$result[0]["Márka"]);
        $this->assertEquals('S8Teszt',$result[0]["Tipus"]);
        $this->assertEquals('1',$result[0]["Prémium"]);
        $this->assertEquals('Sedan',$result[0]["fajta"]);
        $this->assertEquals('Személy autó',$result[0]["kategoria"]);
        $this->assertEquals("E1",$result[0]["KörnyezetvédelmiBesolas"]);

        //VolkswagenTeszt
        $this->assertEquals(2,$result[1]["ID"]);
        $this->assertEquals('VolkswagenTeszt',$result[1]["Márka"]);
        $this->assertEquals('PassatTeszt',$result[1]["Tipus"]);
        $this->assertEquals('0',$result[1]["Prémium"]);
        $this->assertEquals('Combi',$result[1]["fajta"]);
        $this->assertEquals('Személy autó',$result[1]["kategoria"]);
        $this->assertEquals("E2",$result[1]["KörnyezetvédelmiBesolas"]);

        //JeepTeszt
        $this->assertEquals(3,$result[2]["ID"]);
        $this->assertEquals('JeepTeszt',$result[2]["Márka"]);
        $this->assertEquals('WranglerTeszt',$result[2]["Tipus"]);
        $this->assertEquals('0',$result[2]["Prémium"]);
        $this->assertEquals('Terepjáró',$result[2]["fajta"]);
        $this->assertEquals('Személy autó',$result[2]["kategoria"]);
        $this->assertEquals("E5",$result[2]["KörnyezetvédelmiBesolas"]);

        //BMW
        $this->assertEquals(4,$result[3]["ID"]);
        $this->assertEquals('BMW',$result[3]["Márka"]);
        $this->assertEquals('M3',$result[3]["Tipus"]);
        $this->assertEquals('1',$result[3]["Prémium"]);
        $this->assertEquals('Combi',$result[3]["fajta"]);
        $this->assertEquals('Kis személy',$result[3]["kategoria"]);
        $this->assertEquals("E6",$result[3]["KörnyezetvédelmiBesolas"]);

        //Nissan
        $this->assertEquals(5,$result[4]["ID"]);
        $this->assertEquals('Nissan',$result[4]["Márka"]);
        $this->assertEquals('Mikra',$result[4]["Tipus"]);
        $this->assertEquals('1',$result[4]["Prémium"]);
        $this->assertEquals('Combi',$result[4]["fajta"]);
        $this->assertEquals('Kis személy',$result[4]["kategoria"]);
        $this->assertEquals("E6",$result[4]["KörnyezetvédelmiBesolas"]);
        
        //Dacia
        $this->assertEquals(6,$result[5]["ID"]);
        $this->assertEquals('Dacia',$result[5]["Márka"]);
        $this->assertEquals('Logan',$result[5]["Tipus"]);
        $this->assertEquals('1',$result[5]["Prémium"]);
        $this->assertEquals('Combi',$result[5]["fajta"]);
        $this->assertEquals('Kis személy',$result[5]["kategoria"]);
        $this->assertEquals("E6",$result[5]["KörnyezetvédelmiBesolas"]);

    }

    public function test_if_FajtaFeltoltoDAO_gets_All_Fajta()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoTipusDAO.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //When
        $result=FajtaFeltoltoDAO();
        //Then
        $this->assertEquals(6,count($result));
        
        $this->assertEquals('Combi',$result[1]);
        $this->assertEquals('Terepjáró',$result[2]);
        $this->assertEquals('Sedan',$result[3]);
        $this->assertEquals('PickUp',$result[4]);
        $this->assertEquals('SUV',$result[5]);
        $this->assertEquals('4X4',$result[6]);
    }
    public function test_if_KategoriaFeltoltoDAO_gets_All_kategoria()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoTipusDAO.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //When
        $result=KategoriaFeltoltoDAO();
        //Then
        $this->assertEquals(4,count($result));
        
        $this->assertEquals('Kis személy',$result[1]);
        $this->assertEquals('Személy autó',$result[2]);
        $this->assertEquals('Kis teher',$result[3]);
        $this->assertEquals('Teher',$result[4]);
    }
    public function test_if_KornyezetVedelemFeltoltoDAO_gets_All_Kornyezetvedelem()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoTipusDAO.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //When
        $result=KornyezetVedelemFeltoltoDAO();
        //Then
        $this->assertEquals(6,count($result));
        
        $this->assertEquals('E1',$result[1]);
        $this->assertEquals('E2',$result[2]);
        $this->assertEquals('E3',$result[3]);
        $this->assertEquals('E4',$result[4]);
        $this->assertEquals('E5',$result[5]);
        $this->assertEquals('E6',$result[6]);
    }
    public function test_if_AutoTipusTarolo_inserts_testautotipus()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoTipusDAO.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        $Marka='test Marka';
        $Tipus='teszt tipus';
        $Fajta=1;
        $Kategoria=2;
        $Premium=1;
        $KornyezetvedelmiBesorolas=1;
        //When
        $result=AutoTipusTarolo($Marka,$Tipus, $Fajta, $Kategoria, $Premium, $KornyezetvedelmiBesorolas);
        //Then
        $this->assertEquals($result,"Az autotipus felvétel  sikeres volt!<br><br>");
    }
    public function test_if_AutoTipusTarolo_not_inserts_testautotipus()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoTipusDAO.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        $Marka='test Marka';
        $Tipus='teszt tipus';
        $Fajta='ez cseszi el';
        $Kategoria=2;
        $Premium=1;
        $KornyezetvedelmiBesorolas=1;
        //When
        $result=AutoTipusTarolo($Marka,$Tipus, $Fajta, $Kategoria, $Premium, $KornyezetvedelmiBesorolas);
        //Then
        $this->assertEquals($result,"Az autotipus felvétel  sikertelen volt!<br><br>");
    }
    public function test_if_updateAutotipusDAO_updates_testAutotipus()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoTipusDAO.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        $marka='test Marka';
        $tipus='teszt tipus Update';
        $fajta_ID=3;
        $kategoria_ID=3;
        $premium=0;
        $kornyezetvedelem_ID=5;
        $sql="SELECT ID FROM `autokolcsonzo`.`autotipus` WHERE `Márka`='$marka'";
        $result=mysqli_query($kapcsolat,$sql);
        $egysor=mysqli_fetch_assoc($result);
        $autotipus_ID=$egysor["ID"];
        //When
        $result=updateAutotipusDAO($marka,$tipus,$premium,$fajta_ID,$kategoria_ID,$kornyezetvedelem_ID,$autotipus_ID);
        //Then
        $this->assertTrue($result);
        //When
        $kornyezetvedelem_ID=2;
        $result=updateAutotipusDAO($marka,$tipus,$premium,$fajta_ID,$kategoria_ID,$kornyezetvedelem_ID,$autotipus_ID);
        $this->assertTrue($result);
    }
    public function test_if_deleteAutotipusDAO_deletes_testAutotipus()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoTipusDAO.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        $sql="SELECT id FROM `autokolcsonzo`.`autotipus` WHERE `Tipus`='teszt tipus Update'";
        $result=mysqli_query($kapcsolat,$sql);
        $egysor=mysqli_fetch_assoc($result);
        $AutitipusID=$egysor["id"];
        //When
        $result=deleteAutotipusDAO($AutitipusID);
        //Then
        $this->assertTrue($result);
    }

}