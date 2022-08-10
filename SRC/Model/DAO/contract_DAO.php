<?php 
  $path = dirname(__DIR__, 2);
  require_once($path . DIRECTORY_SEPARATOR . "Connection" . DIRECTORY_SEPARATOR . "Dbconn.php");
  function checkAccount($contactID,$kapcsolat){
    $sql="SELECT * FROM `autokolcsonzo`.`account` WHERE `id`=(SELECT `user_account_join`.`account_id` FROM `autokolcsonzo`.`user_account_join` WHERE `user_account_join`.`contact_id`=$contactID)";
    $result=mysqli_query($kapcsolat, $sql);
    $account=[];
   if(!$result){
  } else {while($egysor=mysqli_fetch_array($result)){
      $acc=[];
      foreach($egysor as $key=>$value){
        $acc[$key]=$value;
      }
      array_push($account,$acc);
    }}
    return $account;
  }
?>