<?php
include_once($path . DIRECTORY_SEPARATOR . 'Connection' . DIRECTORY_SEPARATOR . 'dbconn_pdo.php');
function urlCollectorDAO($urls){
  $sql="INSERT INTO `autokolcsonzo`.`honlapok` (`id`, `url`) VALUES (NULL, ?)";
  $db_conn=$GLOBALS["db_conn"];
  $sql2=$db_conn->prepare($sql); 
  for($i=0;$i<count($urls);$i++){
    $sql2->bindParam(1,$urls[$i]);
    $sql2->execute(); 
  }
}
function getURL_DAO(){
  $sql="SELECT `url` FROM `autokolcsonzo`.`honlapok` asc";
  $db_conn=$GLOBALS["db_conn"];
  try{
    $result=$db_conn->query($sql);
    $urls=[];
    while($egysor=$result->fetch()){
       array_push($urls,$egysor["url"]);
    } return $urls;
   }catch(PDOException $e){
     print "Az url nem kérdezhető le!";
   }
}
?>