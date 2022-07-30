<?php 
include_once("../Model/Service/AutoTipusService.php");
function kiiro($legordulo){
  foreach($legordulo as $key=>$value){
    print '<option value="'.$key.'" >'.$value.'</option>';
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
    if(isset($_POST["Autotipusbekuldes"])){
     // data();
     Autotipusbekuldes();
    }
  }
  function Autotipusbekuldes(){
    $marka =$_POST["marka"];
    $fajta = $_POST["fajta"];
    $kategoria = $_POST["kategoria"];
    $premium=isset($_POST["premium"]);
    $kornyezetvedelem=$_POST["kornyezetvedelem"];
    //print $marka.$fajta.$kategoria.$premium.$kornyezetvedelem;
    AutotipusAdatAtvevo($marka,$fajta,$kategoria,$premium,$kornyezetvedelem);
  }
  function data(){
    /* $name=$_POST["name"];
    $mail=$_POST["mail"];
    $pass=$_POST["pass"];
      print $name.$mail.$pass; */
  }

?>