<?php

namespace Tests\Unit;

$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "user_dao.php");

use mysqli;
use \Tests\Support\UnitTester;

class user_dao_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;
    protected function _before()
    {
    }
    // tests
    public function test_if_loginNameDAO_Finds_User()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS["kapcsolat"] = $kapcsolat;
        $sql = "INSERT INTO `autokolcsonzo`.`contact` (`id`, `Vezetéknév`, `Keresztnév`, `e-mail`, `Password`, `Jogosítvány száma`, `Telefonszám`, `Role_id`) VALUES (NULL, 'test', 'user', 'test@test.com', 'test', '', NULL, '1')";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "SELECT id FROM `autokolcsonzo`.`contact` WHERE `Vezetéknév`='test'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_assoc($result);
        //When
        $result = loginNameDAO($egysor["id"]);
        //Then
        $id = $egysor["id"];
        $this->assertEquals($id, $result["id"]);
        $this->assertEquals("test", $result["Vezetéknév"]);
        $this->assertEquals("user", $result["Keresztnév"]);
        $this->assertEquals("1", $result["Role_id"]);
        $sql = "DELETE FROM `autokolcsonzo`.`contact` WHERE `contact`.`id` = '$id'";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
    }
    public function test_if_checkEmails_Finds_email()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS["kapcsolat"] = $kapcsolat;
        $mail='k.pal@gmail.com';
        $sql = "SELECT id FROM `autokolcsonzo`.`contact` WHERE e-mail=$mail";
        $result=mysqli_query($kapcsolat,$sql);
        $egysor=mysqli_fetch_array();
        $id = $egysor["id"];
        //When
        $result = checkEmails($mail);
        //Then
        $this->assertEquals($id, $result["id"]);
    }
}
