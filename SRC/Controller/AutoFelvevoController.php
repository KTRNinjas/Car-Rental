<?php 
include_once("../Model/Service/AutoTipusService.php");
function getFajta($kapcsolat){
  $fajtak = FajtaFeltolto($kapcsolat);
  foreach($fajtak as $key=>$value){
    print "<option>$value </option>";
  };
};
function getKategoria($kapcsolat){
  $kategoria = KategoriaFeltolto($kapcsolat);
  foreach($kategoria as $key=>$value){
    print "<option>$value </option>";
  };
};
function getKornyezetVedelem($kapcsolat){
  $kornyezetvedelem = KornyezetVedelemFeltolto($kapcsolat);
  foreach($kornyezetvedelem as $key=>$value){
    print "<option>$value </option>";
  };
};
  function init(){
    if(isset($_POST["submit"])){
      data();
      print "Bejutott";

    }
  }
  function data(){
    $name=$_POST["name"];
    $mail=$_POST["mail"];
    $pass=$_POST["pass"];
      print $name.$mail.$pass;
  }
?>