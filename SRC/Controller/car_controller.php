<?php
$path=dirname(__DIR__,1);
include_once($path.DIRECTORY_SEPARATOR."Model".DIRECTORY_SEPARATOR."Service".DIRECTORY_SEPARATOR."car_service.php");
$cars=[];
$path = dirname(__DIR__, 1);
$url = "/Autofelvetel";
$fileLocation = $path .DIRECTORY_SEPARATOR."View".DIRECTORY_SEPARATOR."Autofelvevo.php";
$routes[$url] = $fileLocation;
function initCarController(){
    $GLOBALS['cars']=getAllCarsService();    
}
function makeHeader(){
print "<th><small>Rendszám</small></th>";
print "<th><small>Alvázszám</small></th>";
print "<th><small>Autótípus</small></th>";
print "<th><small>Hajtáslánc</small></th>";
print "<th><small>Váltótípus</small></th>";
print "<th><small>Évjárat</small></th>";
print "<th><small>Teljesítmény</small></th>";
print "<th><small>Biztosítási díj</small></th>";
print "<th><small>Kilométeróra állása</small></th>";
print "<th><small>Forgalmi megújításának ideje</small></th>";
print "<th><small>Kivezetve</small></th>";
}
/*function printCarsInDB(){
   $cars=$GLOBALS['cars'];
   for($i=0;$i<count($cars);$i++){
    print '<tr>';
    foreach($cars[$i] as $key=>$value){
     print '<td>'.$value.'</td>';
    }
    print '</tr>';
   }
}*/
function printCarsInDB(){
    $cars=$GLOBALS['cars'];
    for($i=0;$i<count($cars);$i++){
     //print '<tr>';
     print '<form action="" method="post">';
     print '<tr>';
      print '<td>';
      print '<input type="text" name="carID" size="0" value="'.$cars[$i]['id'].'" hidden>';
      print '<input type="text" name="rendszam" size="4" value="'.$cars[$i]['Rendszám'].'" required>
      </td>';
      print '<td><input type="text" name="alvazszam" size="8" value="'.$cars[$i]['Alvázszám'].'" required></td>';
      
      print '<td><select name="autotipus" id="" required>
      <option value="">Válasszon autótípust</option>';
      getAllAutoTipusController($cars[$i]['marka']);
      //print '<option value="AutoTipusFelvetel"onclick="location = this.value;">Új autótípus felvétele</option>';
      print '</select></td>';

      print '<td><select name="hajtaslanc" id="" required>
      <option value="">Válasszon hajtásláncot</option>';
      getAllHajtaslancController($cars[$i]["hajtaslanc"]);
      print '</select></td>';

      print '<td><select name="valtotipus" id="" required>
      <option value="">Válasszon váltótípust</option>';
      getAllValtotipusController($cars[$i]["valtotipus"]);
      print '</select></td>';

      print '<td><input type="number" name="evjarat" id="" value="'.$cars[$i]['Evjarat'].'" size="4" required></td>';
      
      print '<td><input type="number" name="teljesitmeny" id="" value="'.$cars[$i]['Teljesitmeny'].'" size=4 required></td>';

      print '<td><input type="number" name="biztositas" id="" value="'.$cars[$i]['Biztositasi_dij'].'" size=7 required></td>';
    
      print '<td> <input type="number" name="kilometer" id="" value="'.$cars[$i]['km'].'" size="6" required></td>';
      
      print '<td><input type="date" name="forgalmi" id="" size="6" value="'.$cars[$i]['Forgalmi_megujitasanak_ideje'].'" required></td>';
      
      print '<td><input type="date" name="kivezetve" id="" value="'.$cars[$i]['Kivezetve'].'"></td>';
      
      print '</tr>';
     
      print '<td><input type="submit" name="updateCar" value="Mentés"></td>';

      print '<td><input type="submit" name="deleteCar" value="Törlés"></td>';
      
      print '</form>';

      //print '</tr>';
    }
}
function updateCarController(){
    if(isset($_POST['updateCar'])){
    $rendszam=$_POST['rendszam'];
    $alvazszam=$_POST['alvazszam'];
    $autotipus_id=$_POST['autotipus'];
    $hajtaslanc_id=$_POST['hajtaslanc'];
    $valtotipus_id=$_POST['valtotipus']; 
    $evjarat=$_POST['evjarat'];
    $teljesitmeny=$_POST['teljesitmeny'];
    $biztositas=$_POST['biztositas'];
    $kilometer=$_POST['kilometer'];
    $forgalmi=$_POST['forgalmi']; 
    $kivezetve=$_POST['kivezetve'];
    $carID=$_POST['carID']; 
    updateCarService($rendszam, $alvazszam,$autotipus_id,$hajtaslanc_id,$valtotipus_id,$evjarat,$teljesitmeny,$biztositas,$kilometer,$forgalmi,$kivezetve,$carID);
    header('Location: /Autofelvetel', true, 303);
}
}
function getAllHajtaslancController($hajtaslancInput=null){
    $hajtaslanc=getAllHajtaslancService();
    foreach($hajtaslanc as $key=>$value){
        if($value!=$hajtaslancInput){
        print '<option value="'.$key.'">'.$value.'</option>';
    }else{
        print '<option value="'.$key.'" selected>'.$value.'</option>';
    }
    }
}
function getAllValtotipusController($valtotipusInput=null){
    $valtotipus=getAllValtotipusService();
    foreach($valtotipus as $key=>$value){
        if($value!=$valtotipusInput){
        print '<option value="'.$key.'">'.$value.'</option>';
        }else{
            print '<option value="'.$key.'" selected>'.$value.'</option>';    
        }
    }
}
function getAllAutoTipusController($marka=null){
    $autotipus=getAllAutoTipusService();
    foreach($autotipus as $key=>$value){
        if($value!=$marka){
        print '<option value="'.$key.'">'.$value.'</option>';
        }else{
            print '<option value="'.$key.'" selected>'.$value.'</option>';    
        }
    }
}
function insertCarController(){
    if(isset($_POST['insertCar'])){
        $rendszam=$_POST['rendszam'];
        $alvazszam=$_POST['alvazszam'];
        $hajtaslanc_id=$_POST['hajtaslanc'];
        $valtotipus_id=$_POST['valtotipus'];
        $evjarat=$_POST['evjarat'];
        $teljesitmeny=$_POST['teljesitmeny'];
        $biztositasi_dij=$_POST['biztositas'];
        $kilometer=$_POST['kilometer'];
        $forgalmi=$_POST['forgalmi'];
        $autotipus_id=$_POST['autotipus'];
        insertCarService($rendszam,$alvazszam,$hajtaslanc_id,$valtotipus_id,$evjarat,$teljesitmeny,$biztositasi_dij,$kilometer,$forgalmi,$autotipus_id);
        header('Location: /Autofelvetel', true, 303);
        exit;
    }
}
function deleteCarController(){
    if(isset($_POST['deleteCar'])){
        $carID=$_POST['carID'];
        deleteCarService($carID);
        header('Location: /Autofelvetel', true, 303);  
    }
}
?>