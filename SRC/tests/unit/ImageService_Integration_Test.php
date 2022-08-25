<?php

namespace Tests\Unit;

$path = dirname(__DIR__, 2);
include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "Service" . DIRECTORY_SEPARATOR . "ImageService.php");
include_once($path . DIRECTORY_SEPARATOR . "FileMuveletek" . DIRECTORY_SEPARATOR . "Kepfeltoltes.php");

use mysqli;
use \Tests\Support\UnitTester;

class ImageService_Integration_Test extends \Codeception\Test\Unit
{
    //protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function test_if_getPicturesOfACarService_works()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;
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
        //When
        $result = getPicturesOfACarService($id);
        //then
        $this->assertEquals("noimage.jpg", $result[0]);
        //Given
        $sql = "INSERT INTO `autokolcsonzo`.`car_images` (`id`, `car_id`, `path`) VALUES (NULL, '$id', 'teszt1.jpg') ";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "INSERT INTO `autokolcsonzo`.`car_images` (`id`, `car_id`, `path`) VALUES (NULL, '$id', 'teszt2.jpg') ";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        $sql = "INSERT INTO `autokolcsonzo`.`car_images` (`id`, `car_id`, `path`) VALUES (NULL, '$id', 'teszt3.jpg') ";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //When
        $result = getPicturesOfACarService($id);

        //Then
        $this->assertEquals("teszt1.jpg", $result[0]);
        $this->assertEquals("teszt2.jpg", $result[1]);
        $this->assertEquals("teszt3.jpg", $result[2]);
    }
    public function test_if_deleteAllImagesOfACarService_works()
    {
        //Given
        $host = "127.0.0.1";
        $user = "root";
        $password = "";
        $kapcsolat = mysqli_connect($host, $user, $password);
        $GLOBALS['kapcsolat'] = $kapcsolat;

        $teszt_kep = imagecreatetruecolor(50, 50);
        header("Content-type: image/jpeg");
        getTargetDir();
        imagejpeg($teszt_kep, getTargetDir() . "teszt1.jpg", 95);
        imagejpeg($teszt_kep, getTargetDir() . "teszt2.jpg", 95);
        imagejpeg($teszt_kep, getTargetDir() . "teszt3.jpg", 95);

        $sql = "SELECT id FROM `autokolcsonzo`.`cars` WHERE `Rendszám`='test1'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_array($result);
        $this->assertTrue(isset($egysor['id']));
        $id = $egysor['id'];
        $this->assertTrue(file_exists(getTargetDir() . "teszt1.jpg"));
        $this->assertTrue(file_exists(getTargetDir() . "teszt2.jpg"));
        $this->assertTrue(file_exists(getTargetDir() . "teszt3.jpg"));
        //When
        deleteAllImagesOfACarService($id);
        //then
        $this->assertTrue(!file_exists(getTargetDir() . "teszt1.jpg"));
        $this->assertTrue(!file_exists(getTargetDir() . "teszt2.jpg"));
        $this->assertTrue(!file_exists(getTargetDir() . "teszt3.jpg"));
        //When
        $sql = "DELETE FROM `autokolcsonzo`.`cars` WHERE `id`='$id'";
        $this->assertTrue(mysqli_query($kapcsolat, $sql));
        //then
        $sql = "SELECT id FROM `autokolcsonzo`.`car_images` WHERE `path`='teszt1.jpg'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_array($result);
        $this->assertTrue(!isset($egysor['id']));
        $sql = "SELECT id FROM `autokolcsonzo`.`car_images` WHERE `path`='teszt2.jpg'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_array($result);
        $this->assertTrue(!isset($egysor['id']));
        $sql = "SELECT id FROM `autokolcsonzo`.`car_images` WHERE `path`='teszt3.jpg'";
        $result = mysqli_query($kapcsolat, $sql);
        $egysor = mysqli_fetch_array($result);
        $this->assertTrue(!isset($egysor['id']));
    }
}
