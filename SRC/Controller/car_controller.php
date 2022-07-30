<?php
$path=dirname(__DIR__,1);
include_once($path.DIRECTORY_SEPARATOR."Model".DIRECTORY_SEPARATOR."Service".DIRECTORY_SEPARATOR."car_service.php");
$cars=[];
function initCarController(){
    $GLOBALS['cars']=getAllCarsService();    
}
function makeHeader(){
//$keys=array_keys($GLOBALS['cars'][0]);
print "<th>Rendszám</th>";
print "<th>Alvázszám</th>";
print "<th>Hajtáslánc</th>";
print "<th>Váltótípus</th>";
print "<th>Évjárat</th>";
print "<th>Teljesítmény</th>";
print "<th>Biztosítási díj</th>";
print "<th>Kilométeróra állása</th>";
print "<th>Forgalmi megújításának ideje</th>";
print "<th>Autótípus</th>";
print "<th>Kivezetve</th>";
}
function printCarsInDB(){
   $cars=$GLOBALS['cars'];
   //var_dump($cars);
   for($i=0;$i<count($cars);$i++){
    print '<tr>';
    foreach($cars[$i] as $key=>$value){
     print '<td>'.$value.'</td>';
    }
    print '</tr>';
   }
}
?>