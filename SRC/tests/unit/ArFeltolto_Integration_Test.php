<?php

namespace Tests\Unit;

$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "Filldb.php");

include_once($path . DIRECTORY_SEPARATOR . "ArFeltolto.php");

use mysqli;
use \Tests\Support\UnitTester;

class ArFeltoltoTest extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }
    // tests
    public function test_fill_Arak()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "role_dao.php");
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        //$db="Autokolcsonzo";//adatbázis neve

        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "DELETE FROM `autokolcsonzo`.`Ar`";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //When
        fillArak($kapcsolat);
        $sql = "SELECT * FROM `autokolcsonzo`.`Ar`";
        $result = mysqli_query($kapcsolat, $sql);
        $arak = [];
        while ($egysor = mysqli_fetch_array($result)) {
            array_push($arak, $egysor);
        }
        //Then
        $this->assertEquals(6, count($arak));
        $this->assertEquals(5000, $arak[0]["Ár"]);
        $this->assertEquals(6000, $arak[1]["Ár"]);
        $this->assertEquals(7000, $arak[2]["Ár"]);
        $this->assertEquals(8000, $arak[3]["Ár"]);
        $this->assertEquals(9000, $arak[4]["Ár"]);
        $this->assertEquals(10000, $arak[5]["Ár"]);
    }
}
