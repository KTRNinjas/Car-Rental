<?php 
namespace Tests\Unit;
$path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoTipusDAO.php");

use LDAP\Result;
use mysqli;
use \Tests\Support\UnitTester;

class AutoTipus_DAO_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function test_if_getAllAutotipus_gets_All_Autotipus()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "role_dao.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //When
        $result=getAllAutotipus();
        //Then
        $this->assertEquals(6,count($result));
        //Audi
        $this->assertEquals(1,$result[0]["ID"]);
        $this->assertEquals('AAA-001',$result[0]["Márka"]);
        $this->assertEquals('123123123123',$result[0]["Tipus"]);
        $this->assertEquals('Benzines',$result[0]["hajtaslanc"]);
        $this->assertEquals('Kézi',$result[0]["valtotipus"]);
        $this->assertEquals('2008',$result[0]["Evjarat"]);
        $this->assertEquals(8,$result[0]["Teljesitmeny"]);
        $this->assertEquals(100000,$result[0]["Biztositasi_dij"]);
        $this->assertEquals(50000,$result[0]["km"]);
        $this->assertEquals("2022-07-31",$result[0]["Forgalmi_megujitasanak_IDeje"]);
        $this->assertEquals('AudiTeszt S8Teszt',$result[0]["marka"]);
        $this->assertEquals(null,$result[0]["Kivezetve"]);
        //Volkswagen
        $this->assertEquals(2,$result[1]["ID"]);
        $this->assertEquals('BBB-002',$result[1]["Márka"]);
        $this->assertEquals('123123123123',$result[1]["Tipus"]);
        $this->assertEquals('Diesel',$result[1]["Prémium"]);
        $this->assertEquals('Automata',$result[1]["fajta"]);
        $this->assertEquals('2009',$result[1]["Evjarat"]);
        $this->assertEquals(9,$result[1]["Teljesitmeny"]);
        $this->assertEquals(110000,$result[1]["Biztositasi_dij"]);
        $this->assertEquals(60000,$result[1]["km"]);
        $this->assertEquals("2022-08-31",$result[1]["Forgalmi_megujitasanak_IDeje"]);
        $this->assertEquals('VolkswagenTeszt PassatTeszt',$result[1]["marka"]);
        $this->assertEquals(null,$result[1]["Kivezetve"]);
        //Jeep1
        $this->assertEquals(3,$result[2]["ID"]);
        $this->assertEquals('CCC-003',$result[2]["Márka"]);
        $this->assertEquals('123123123123',$result[2]["Tipus"]);
        $this->assertEquals('Elektromos',$result[2]["Prémium"]);
        $this->assertEquals('Kézi',$result[2]["fajta"]);
        $this->assertEquals('2010',$result[2]["Evjarat"]);
        $this->assertEquals(10,$result[2]["Teljesitmeny"]);
        $this->assertEquals(120000,$result[2]["Biztositasi_dij"]);
        $this->assertEquals(70000,$result[2]["km"]);
        $this->assertEquals("2022-09-28",$result[2]["Forgalmi_megujitasanak_IDeje"]);
        $this->assertEquals('JeepTeszt WranglerTeszt',$result[2]["marka"]);
        $this->assertEquals(null,$result[2]["Kivezetve"]);
        //Jeep2
        $this->assertEquals(5,$result[3]["ID"]);
        $this->assertEquals('EEE-005',$result[3]["Márka"]);
        $this->assertEquals('123123123123',$result[3]["Tipus"]);
        $this->assertEquals('Diesel',$result[3]["Prémium"]);
        $this->assertEquals('Automata',$result[3]["fajta"]);
        $this->assertEquals('2012',$result[3]["Evjarat"]);
        $this->assertEquals(12,$result[3]["Teljesitmeny"]);
        $this->assertEquals(140000,$result[3]["Biztositasi_dij"]);
        $this->assertEquals(90000,$result[3]["km"]);
        $this->assertEquals("2022-11-28",$result[3]["Forgalmi_megujitasanak_IDeje"]);
        $this->assertEquals('JeepTeszt WranglerTeszt',$result[3]["marka"]);
        $this->assertEquals('2022-09-28',$result[3]["Kivezetve"]);
    }
    public function test_if_getAllAutotipusDao_gets_All_Autotipus()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "role_dao.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //When
        $result=getAllAutoTipusDAO();
        //Then
        $this->assertEquals(6,count($result));
        
        $this->assertEquals('AudiTeszt S8Teszt',$result[1]);
        $this->assertEquals('VolkswagenTeszt PassatTeszt',$result[2]);
        $this->assertEquals('JeepTeszt WranglerTeszt',$result[3]);
        $this->assertEquals('BMW M3',$result[4]);
        $this->assertEquals('Nissan Mikra',$result[5]);
        $this->assertEquals('Dacia Logan',$result[6]);
    }
    public function test_if_getAllHajtaslancDao_gets_All_Hajtaslanc()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "role_dao.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //When
        $result=getAllHajtaslancDAO();
        //Then
        $this->assertEquals(3,count($result));
        
        $this->assertEquals('Benzines',$result[1]);
        $this->assertEquals('Diesel',$result[2]);
        $this->assertEquals('Elektromos',$result[3]);
    }
    public function test_if_getAllValtotipusDao_gets_All_Valtotipus()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "role_dao.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //When
        $result=getAllValtotipusDAO();
        //Then
        $this->assertEquals(2,count($result));
        
        $this->assertEquals('Kézi',$result[1]);
        $this->assertEquals('Automata',$result[2]);
    }
    public function test_if_insertCarDao_inserts_testcar()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "role_dao.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        $rendszam='test-001';
        $alvazszam='123123';
        $hajtaslanc_id=1;
        $valtotipus_id=1;
        $evjarat="2020";
        $teljesitmeny=800;
        $biztositasi_dij=100;
        $kilometer=100;
        $forgalmi='2021-09-11';
        $autotipus_id=1;
        //When
        $result=insertCarDAO($rendszam, $alvazszam, $hajtaslanc_id, $valtotipus_id, $evjarat, $teljesitmeny, $biztositasi_dij, $kilometer, $forgalmi, $autotipus_id);
        //Then
        $this->assertTrue($result);
    }
    public function test_if_updateCarDao_updates_testcar()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "role_dao.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        $rendszam='test-002';
        $alvazszam='123124';
        $hajtaslanc_id=2;
        $valtotipus_id=2;
        $evjarat="2021";
        $teljesitmeny=900;
        $biztositas=200;
        $kilometer=200;
        $forgalmi='2022-09-11';
        $autotipus_id=2;
        $kivezetve=null;
        $sql="SELECT id FROM `autokolcsonzo`.`cars` WHERE `Rendszám`='test-001'";
        $result=mysqli_query($kapcsolat,$sql);
        $egysor=mysqli_fetch_assoc($result);
        $carID=$egysor["id"];
        //When
        $result=updateCarDAO($rendszam, $alvazszam, $autotipus_id, $hajtaslanc_id, $valtotipus_id, $evjarat, $teljesitmeny, $biztositas, $kilometer, $forgalmi, $kivezetve, $carID);
        //Then
        $this->assertTrue($result);
        //When
        $kivezetve='2022-09-28';
        $result=updateCarDAO($rendszam, $alvazszam, $autotipus_id, $hajtaslanc_id, $valtotipus_id, $evjarat, $teljesitmeny, $biztositas, $kilometer, $forgalmi, $kivezetve, $carID);
        $this->assertTrue($result);
    }
    public function test_if_deleteCarDao_deletes_testcar()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "role_dao.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";

        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        $sql="SELECT id FROM `autokolcsonzo`.`cars` WHERE `Rendszám`='test-002'";
        $result=mysqli_query($kapcsolat,$sql);
        $egysor=mysqli_fetch_assoc($result);
        $carID=$egysor["id"];
        //When
        $result=deleteCarDAO($carID);
        //Then
        $this->assertTrue($result);
    }
}
?>