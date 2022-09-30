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
        $this->assertEquals('Nissan',$result[3]["Márka"]);
        $this->assertEquals('Mikra',$result[3]["Tipus"]);
        $this->assertEquals('1',$result[3]["Prémium"]);
        $this->assertEquals('Combi',$result[3]["fajta"]);
        $this->assertEquals('Kis személy',$result[3]["kategoria"]);
        $this->assertEquals("E6",$result[3]["KörnyezetvédelmiBesolas"]);
        
        //Dacia
        $this->assertEquals(6,$result[5]["ID"]);
        $this->assertEquals('Dacia',$result[3]["Márka"]);
        $this->assertEquals('Logan',$result[3]["Tipus"]);
        $this->assertEquals('1',$result[3]["Prémium"]);
        $this->assertEquals('Combi',$result[3]["fajta"]);
        $this->assertEquals('Kis személy',$result[3]["kategoria"]);
        $this->assertEquals("E6",$result[3]["KörnyezetvédelmiBesolas"]);

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