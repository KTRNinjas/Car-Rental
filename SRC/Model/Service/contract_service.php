<?php 
  $path=dirname(__DIR__,2);
  include_once($path . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . "DAO" . DIRECTORY_SEPARATOR . "contract_DAO.php");
    function checkAccountService($contactID,$kapcsolat){
      $account=checkAccount($contactID,$kapcsolat);
      if(count($account)==0){
        //csinálj egy account-ot a contacthoz
        
      } elseif($account[0]["Magán/Cég"]==0){
        //magánaccount ellenőrzése
        $display="";
        if(!isset($account[0]["Lakcím"])){
          $display=$display."Lakcím hiányzik!";
        }
        if(isset($account[0]["Bankszámlaszám"])){
          $display=$display."Bankszámlaszám hiányzik!";
        }
        return $display;
      } elseif($account[0]["Magán/Cég"]==1){
        //céges account ellenérzőse
        $display="";
        if(!isset($account[0]["Telephely"])){
          $display=$display."Telephely hiányzik!";
        }
        $display="";
        if(!isset($account[0]["Cégnév"])){
          $display=$display."Cégnév hiányzik!";
        }
        $display="";
        if(!isset($account[0]["Bankszámlaszám"])){
          $display=$display."Bankszámlaszám hiányzik!";
        }
        $display="";
        if(!isset($account[0]["Adószám"])){
          $display=$display."Adószám hiányzik!";
        }
        $display="";
        if(!isset($account[0]["Cégjegyzékszám"])){
          $display=$display."Cégjegyzékszám hiányzik!";
        }
        return $display;
      }
    }
?>