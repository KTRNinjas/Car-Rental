<?php

namespace Tests\Unit;

$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "car__image_data.php");

use mysqli;
use \Tests\Support\UnitTester;

class Car_Image_Integration_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function test_if_car_image_table_created()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        //when
        $result = createCarImageTable($kapcsolat);
        //then
        $this->assertEquals("A car-images tábla létrehozása Sikeres volt!", $result);
    }
    public function test_if_car_image_table_altered()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        //when
        $result = alterCarImageTable($kapcsolat);
        //then
        $this->assertEquals("A car-images tábla kaszkádolása Sikeres volt!", $result);
    }
    public function test_if_images_deleted_after_car_deleted()
    {
        //given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $sql = "SELECT id FROM `autokolcsonzo`.`autotipus` LIMIT 1";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_array($result);
        $this->assertTrue(isset($egysor['id']));
        $id = $egysor['id'];
        $sql = "INSERT INTO `autokolcsonzo`.`cars` (`id`, `Rendszám`, `Alvázszám`, `hajtaslanc_id`, `valtotipus_id`, `Evjarat`, `Teljesitmeny`, `Biztositasi_dij`, `km`, `Forgalmi_megujitasanak_ideje`, `Autotipus_id`, `Kivezetve`) VALUES (NULL, 'test1', '123123123123', '1', '1', '2008', '8', '100000', '50000', '2022-07-31', '$id', NULL)";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "SELECT id FROM `autokolcsonzo`.`cars` WHERE `Rendszám`='test1'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_array($result);
        $this->assertTrue(isset($egysor['id']));
        $id = $egysor['id'];
        $sql = "INSERT INTO `autokolcsonzo`.`car_images` (`id`, `car_id`, `path`) VALUES (NULL, '$id', 'test1') ";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "INSERT INTO `autokolcsonzo`.`car_images` (`id`, `car_id`, `path`) VALUES (NULL, '$id', 'test2') ";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "INSERT INTO `autokolcsonzo`.`car_images` (`id`, `car_id`, `path`) VALUES (NULL, '$id', 'test3') ";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //when
        $sql = "DELETE FROM `autokolcsonzo`.`cars` WHERE `id`='$id'";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //then
        $sql = "SELECT id FROM `autokolcsonzo`.`car_images` WHERE `path`='test1'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_array($result);
        $this->assertTrue(!isset($egysor['id']));
        $sql = "SELECT id FROM `autokolcsonzo`.`car_images` WHERE `path`='test2'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_array($result);
        $this->assertTrue(!isset($egysor['id']));
        $sql = "SELECT id FROM `autokolcsonzo`.`car_images` WHERE `path`='test3'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_array($result);
        $this->assertTrue(!isset($egysor['id']));
    }
}
