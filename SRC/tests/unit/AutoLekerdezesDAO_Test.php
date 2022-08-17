<?php
namespace Tests\Unit;
$path=dirname(__DIR__,2);
//include_once($path.DIRECTORY_SEPARATOR."Filldb.php");

include_once($path.DIRECTORY_SEPARATOR."Model".DIRECTORY_SEPARATOR."DAO".DIRECTORY_SEPARATOR."AutoLekredezesDAO.php");
use mysqli;
use \Tests\Support\UnitTester;

class AutoLekredezesDAO_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }
    // tests

public function test_LekerdezesAutok_kivantIntervalumba()
    {
        //Given
        $host="127.0.0.1";
        $user="root";
        $password="";
        $kapcsolat=mysqli_connect($host,$user,$password);
        //when
        $kezdoDATE="2022-08-20";
        $vegDATE="2022-08-31";
        $result=LekerdezesAutok_kivantIntervalumba($kezdoDATE,$vegDATE);
        //then
        //márka
        $this->assertEquals("AudiTeszt",$result[0]["Márka"]);
        $this->assertEquals("AudiTeszt",$result[1]["Márka"]);
        $this->assertEquals("VolkswagenTeszt",$result[2]["Márka"]);

        //Tipus
        $this->assertEquals("S8Teszt",$result[0]["Tipus"]);
        $this->assertEquals("S8Teszt",$result[1]["Tipus"]);
        $this->assertEquals("PassatTeszt",$result[2]["Tipus"]);

        //Fajta_neve
        $this->assertEquals("Sedan",$result[0]["Fajta_neve"]);
        $this->assertEquals("Sedan",$result[1]["Fajta_neve"]);
        $this->assertEquals("Combi",$result[2]["Fajta_neve"]);

        //Kategoria
        $this->assertEquals("Személy autó",$result[0]["Kategoria"]);
        $this->assertEquals("Személy autó",$result[1]["Kategoria"]);
        $this->assertEquals("Személy autó",$result[2]["Kategoria"]);

        //Prémium
        $this->assertEquals(1,$result[0]["Prémium"]);
        $this->assertEquals(1,$result[1]["Prémium"]);
        $this->assertEquals(0,$result[2]["Prémium"]);

        //Ár
        $this->assertEquals(null,$result[0]["Ár"]);
        $this->assertEquals(null,$result[1]["Ár"]);
        $this->assertEquals(95,$result[2]["Ár"]);

        //Hajtaslanc
        $this->assertEquals("Benzines",$result[0]["Hajtaslanc"]);
        $this->assertEquals("Benzines",$result[1]["Hajtaslanc"]);
        $this->assertEquals("Diesel",$result[2]["Hajtaslanc"]);

        //Evjarat
        $this->assertEquals("2008",$result[0]["Evjarat"]);
        $this->assertEquals("2008",$result[1]["Evjarat"]);
        $this->assertEquals("2009",$result[2]["Evjarat"]);

        //Valtotipus
        $this->assertEquals("Automata",$result[0]["Valtotipus"]);
        $this->assertEquals("Automata",$result[1]["Valtotipus"]);
        $this->assertEquals("Kézi",$result[2]["Valtotipus"]);
        
    }


}