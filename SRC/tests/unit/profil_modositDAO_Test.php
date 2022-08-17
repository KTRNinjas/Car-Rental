<?php

namespace Tests\Unit;

$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "Filldb.php");
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "profil_modositDAO.php");

use \Tests\Support\UnitTester;

class Profil_modositDAO_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;
    protected function _before()
    {
    }
    // tests
    public function test_automatic_profil_fill()
    {
        //Given
        $path = dirname(__DIR__, 2);
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS["kapcsolat"] = $kapcsolat;
        //When
        $result = automatic_profil_fill(1);
        //Then
        $this->assertEquals(1, $result["id"]); //assertTrue
        $this->assertEquals("Ka", $result["Vezetéknév"]);
        $this->assertEquals("Pál", $result["Keresztnév"]);
        $this->assertEquals("k.pal@gmail.com", $result["e-mail"]);
        $this->assertEquals("Palika1", $result["Password"]);
        $this->assertEquals("", $result["Jogosítvány száma"]);
        $this->assertEquals(NULL, $result["Telefonszám"]);
    }
    public function test_profilModifyDAO()
    {
        //Given
        $path = dirname(__DIR__, 2);
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS["kapcsolat"] = $kapcsolat;
        $id=1;
        $surname="Ka";
        $firstname="Pál";
        $mail="k.pal@gmail.com";
        $pass="Palika1";
        $license=NULL;
        $phone="NULL";
        //When
        $result = profilModifyDAO($id, $surname, $firstname, $mail, $pass, $license, $phone);
        //Then
        $this->assertTrue($result); 
    }
    public function test_deleteProfilDAO()
    {
        //Given
        $path = dirname(__DIR__, 2);
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS["kapcsolat"] = $kapcsolat;
        $id=1;
        //When
        $result = deleteProfilDAO($id);
        //Then
        $this->assertTrue($result); 
        //After
        $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (1, 'Ka', 'Pál', 'k.pal@gmail.com', 'Palika1', '', NULL, '1')";
        $result= mysqli_query($kapcsolat,$sql);
        $this->assertTrue($result); 
    }
}
