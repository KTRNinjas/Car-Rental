<?php 
include_once("../Model/Service/AutoTipusService.php");
function kiiro($legordulo){
  foreach($legordulo as $key=>$value){
    print "<option>$value </option>";
  };
}
function getFajta($kapcsolat){
  $fajta = FajtaFeltolto($kapcsolat);
  kiiro($fajta);
};
function getKategoria($kapcsolat){
  $kategoria = KategoriaFeltolto($kapcsolat);
  kiiro($kategoria);
};
function getKornyezetVedelem($kapcsolat){
  $kornyezetvedelem = KornyezetVedelemFeltolto($kapcsolat);
  kiiro($kornyezetvedelem);
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