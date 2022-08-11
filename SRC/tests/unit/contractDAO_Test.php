<?php

namespace tests\unit;

use \Tests\Support\UnitTester;

class contractDAO_test extends \Codeception\Test\Unit
{
   //protected UnitTester $tester;

    protected function _before()
    {
     
    }

    // tests
    public function test_if_account_found()
    {
      //given
      $path=dirname(__DIR__,2);
      include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "contract_DAO.php");
      $host="127.0.0.1";
      $user="root";
      $password="";
      $kapcsolat=mysqli_connect($host,$user,$password);
      $sql="INSERT INTO `autokolcsonzo`.`account` (`id`, `Magán/Cég`, `Lakcím`, `Telephely`, `Cégnév`, `Bankszámlaszám`, `Adószám`, `Cégjegyzékszám`) VALUES (NULL, '0', 'Cegléd', '', '', '', '', '')";
      mysqli_query($kapcsolat,$sql);
      $sql="INSERT INTO `autokolcsonzo`.`user_account_join` (`id`, `account_id`, `contact_id`) VALUES (NULL, '1', '1')";
      mysqli_query($kapcsolat,$sql);
      //when
      $result=checkAccount(1,$kapcsolat);
      
      //then
      $this->assertEquals("Cegléd", $result[0]["Lakcím"]);
    }
}