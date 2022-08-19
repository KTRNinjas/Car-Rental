<?php

namespace Tests\Unit;

$path = dirname(__DIR__, 2);
//include_once($path.DIRECTORY_SEPARATOR."Filldb.php");

include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "AutoLekredezesDAO.php");

use mysqli;
use \Tests\Support\UnitTester;

class AutoLekredezesDAO_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }
    // tests

    public function test_LekerdezesAutok_kivantIntervalumba08_20_08_31()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //when
        $kezdoDATE = "2022-08-20";
        $vegDATE = "2022-08-31";
        $result = LekerdezesAutok_kivantIntervalumba($kezdoDATE, $vegDATE);
        //then
        //márka
        $this->assertEquals(2, count($result));

        $this->assertEquals("JeepTeszt", $result[0]["Márka"]);
        $this->assertEquals("JeepTeszt", $result[1]["Márka"]);

        //Tipus
        $this->assertEquals("WranglerTeszt", $result[0]["Tipus"]);
        $this->assertEquals("WranglerTeszt", $result[1]["Tipus"]);

        //Fajta_neve
        $this->assertEquals("Terepjáró", $result[0]["Fajta_neve"]);
        $this->assertEquals("Terepjáró", $result[1]["Fajta_neve"]);

        //Kategoria
        $this->assertEquals("Személy autó", $result[0]["Kategoria"]);
        $this->assertEquals("Személy autó", $result[1]["Kategoria"]);

        //Prémium
        $this->assertEquals(0, $result[0]["Prémium"]);
        $this->assertEquals(0, $result[1]["Prémium"]);

        //Ár
        $this->assertEquals(7000, $result[0]["Ár"]);
        $this->assertEquals(7000, $result[1]["Ár"]);

        //Hajtaslanc
        $this->assertEquals("Elektromos", $result[0]["Hajtaslanc"]);
        $this->assertEquals("Diesel", $result[1]["Hajtaslanc"]);

        //Evjarat
        $this->assertEquals("2010", $result[0]["Evjarat"]);
        $this->assertEquals("2012", $result[1]["Evjarat"]);

        //Valtotipus
        $this->assertEquals("Kézi", $result[0]["Valtotipus"]);
        $this->assertEquals("Automata", $result[1]["Valtotipus"]);
    }
    public function test_LekerdezesAutok_kivantIntervalumba09_02_09_09()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //when
        $kezdoDATE = "2022-09-02";
        $vegDATE = "2022-09-09";
        $result = LekerdezesAutok_kivantIntervalumba($kezdoDATE, $vegDATE);
        //then
        //márka
        $this->assertEquals(3, count($result));

        $this->assertEquals("VolkswagenTeszt", $result[0]["Márka"]);
        $this->assertEquals("JeepTeszt", $result[1]["Márka"]);
        $this->assertEquals("JeepTeszt", $result[2]["Márka"]);

        //Tipus
        $this->assertEquals("PassatTeszt", $result[0]["Tipus"]);
        $this->assertEquals("WranglerTeszt", $result[1]["Tipus"]);
        $this->assertEquals("WranglerTeszt", $result[2]["Tipus"]);

        //Fajta_neve
        $this->assertEquals("Combi", $result[0]["Fajta_neve"]);
        $this->assertEquals("Terepjáró", $result[1]["Fajta_neve"]);
        $this->assertEquals("Terepjáró", $result[2]["Fajta_neve"]);

        //Kategoria
        $this->assertEquals("Személy autó", $result[0]["Kategoria"]);
        $this->assertEquals("Személy autó", $result[1]["Kategoria"]);
        $this->assertEquals("Személy autó", $result[2]["Kategoria"]);

        //Prémium
        $this->assertEquals(0, $result[0]["Prémium"]);
        $this->assertEquals(0, $result[1]["Prémium"]);
        $this->assertEquals(0, $result[2]["Prémium"]);

        //Ár
        $this->assertEquals(6000, $result[0]["Ár"]);
        $this->assertEquals(7000, $result[1]["Ár"]);
        $this->assertEquals(7000, $result[2]["Ár"]);

        //Hajtaslanc
        $this->assertEquals("Diesel", $result[0]["Hajtaslanc"]);
        $this->assertEquals("Elektromos", $result[1]["Hajtaslanc"]);
        $this->assertEquals("Diesel", $result[2]["Hajtaslanc"]);

        //Evjarat
        $this->assertEquals("2009", $result[0]["Evjarat"]);
        $this->assertEquals("2010", $result[1]["Evjarat"]);
        $this->assertEquals("2012", $result[2]["Evjarat"]);

        //Valtotipus
        $this->assertEquals("Automata", $result[0]["Valtotipus"]);
        $this->assertEquals("Kézi", $result[1]["Valtotipus"]);
        $this->assertEquals("Automata", $result[2]["Valtotipus"]);
    }
    public function test_LekerdezesAutok_kivantIntervalumba09_25_09_30()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //when
        $kezdoDATE = "2022-09-25";
        $vegDATE = "2022-09-30";
        $result = LekerdezesAutok_kivantIntervalumba($kezdoDATE, $vegDATE);
        //then
        //márka
        $this->assertEquals(2, count($result));

        $this->assertEquals("AudiTeszt", $result[0]["Márka"]);
        $this->assertEquals("VolkswagenTeszt", $result[1]["Márka"]);

        //Tipus
        $this->assertEquals("S8Teszt", $result[0]["Tipus"]);
        $this->assertEquals("PassatTeszt", $result[1]["Tipus"]);

        //Fajta_neve
        $this->assertEquals("Sedan", $result[0]["Fajta_neve"]);
        $this->assertEquals("Combi", $result[1]["Fajta_neve"]);

        //Kategoria
        $this->assertEquals("Személy autó", $result[0]["Kategoria"]);
        $this->assertEquals("Személy autó", $result[1]["Kategoria"]);

        //Prémium
        $this->assertEquals(1, $result[0]["Prémium"]);
        $this->assertEquals(0, $result[1]["Prémium"]);

        //Ár
        $this->assertEquals(5000, $result[0]["Ár"]);
        $this->assertEquals(6000, $result[1]["Ár"]);

        //Hajtaslanc
        $this->assertEquals("Benzines", $result[0]["Hajtaslanc"]);
        $this->assertEquals("Diesel", $result[1]["Hajtaslanc"]);

        //Evjarat
        $this->assertEquals("2008", $result[0]["Evjarat"]);
        $this->assertEquals("2009", $result[1]["Evjarat"]);

        //Valtotipus
        $this->assertEquals("Kézi", $result[0]["Valtotipus"]);
        $this->assertEquals("Automata", $result[1]["Valtotipus"]);
    }
    public function test_LekerdezesAutok_kivantIntervalumba10_25_10_30()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //when
        $kezdoDATE = "2022-10-25";
        $vegDATE = "2022-10-30";
        $result = LekerdezesAutok_kivantIntervalumba($kezdoDATE, $vegDATE);
        //then
        //márka
        $this->assertEquals(3, count($result));

        $this->assertEquals("AudiTeszt", $result[0]["Márka"]);
        $this->assertEquals("VolkswagenTeszt", $result[1]["Márka"]);
        $this->assertEquals("JeepTeszt", $result[2]["Márka"]);

        //Tipus
        $this->assertEquals("S8Teszt", $result[0]["Tipus"]);
        $this->assertEquals("PassatTeszt", $result[1]["Tipus"]);
        $this->assertEquals("WranglerTeszt", $result[2]["Tipus"]);

        //Fajta_neve
        $this->assertEquals("Sedan", $result[0]["Fajta_neve"]);
        $this->assertEquals("Combi", $result[1]["Fajta_neve"]);
        $this->assertEquals("Terepjáró", $result[2]["Fajta_neve"]);

        //Kategoria
        $this->assertEquals("Személy autó", $result[0]["Kategoria"]);
        $this->assertEquals("Személy autó", $result[1]["Kategoria"]);
        $this->assertEquals("Személy autó", $result[2]["Kategoria"]);

        //Prémium
        $this->assertEquals(1, $result[0]["Prémium"]);
        $this->assertEquals(0, $result[1]["Prémium"]);
        $this->assertEquals(0, $result[2]["Prémium"]);

        //Ár
        $this->assertEquals(5000, $result[0]["Ár"]);
        $this->assertEquals(6000, $result[1]["Ár"]);
        $this->assertEquals(7000, $result[2]["Ár"]);

        //Hajtaslanc
        $this->assertEquals("Benzines", $result[0]["Hajtaslanc"]);
        $this->assertEquals("Diesel", $result[1]["Hajtaslanc"]);
        $this->assertEquals("Elektromos", $result[2]["Hajtaslanc"]);

        //Evjarat
        $this->assertEquals("2008", $result[0]["Evjarat"]);
        $this->assertEquals("2009", $result[1]["Evjarat"]);
        $this->assertEquals("2010", $result[2]["Evjarat"]);

        //Valtotipus
        $this->assertEquals("Kézi", $result[0]["Valtotipus"]);
        $this->assertEquals("Automata", $result[1]["Valtotipus"]);
        $this->assertEquals("Kézi", $result[2]["Valtotipus"]);
    }
    public function test_LekerdezesAutok_kivantIntervalumba08_01_10_30()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
        //when
        $kezdoDATE = "2022-08-01";
        $vegDATE = "2022-10-30";
        $result = LekerdezesAutok_kivantIntervalumba($kezdoDATE, $vegDATE);
        //then
        //márka
        $this->assertEquals(0, count($result));
    }
}
