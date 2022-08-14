<?php
namespace Tests\Unit;

use \Tests\Support\UnitTester;

class Profil_modositDAO_Test extends \Codeception\Test\Unit{
    //protected UnitTester $tester;
    protected function _before()
    {
    }
    // tests
    public function test_automatic_profil_fill()
    {
        //Given
        $path = dirname(__DIR__, 2);
        include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "profil_modositDAO.php");
        $host="127.0.0.1";
        $user="root";
        $password="";
        $kapcsolat=mysqli_connect($host,$user,$password);
        $GLOBALS["kapcsolat"]=$kapcsolat;
        include_once($path . DIRECTORY_SEPARATOR . "Filldb.php");
        //When
        $result = automatic_profil_fill(1);
        //Then
        $this->assertEquals(1, $result["id"]);
        $this->assertEquals("Ka", $result["Vezetéknév"]);
        $this->assertEquals("Pál", $result["Keresztnév"]);
        $this->assertEquals("k.pal@gmail.com", $result["e-mail"]);
        $this->assertEquals("Palika1", $result["Password"]);
        $this->assertEquals("", $result["Jogosítvány száma"]);
        $this->assertEquals(NULL, $result["Telefonszám"]);
    }
}
?>