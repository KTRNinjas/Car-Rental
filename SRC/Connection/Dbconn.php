<?php 
//Adatbázis kapcsolat
$host="localhost";
$user="root";
$password="";
$db="emberek";//adatbázis neve

$kapcsolat=mysqli_connect($host,$user,$password,$db);
if(!$kapcsolat){
die('Nem lehet kapcsolódni az adatbázishoz!');
}else{
   print "<h3>Sikerült a kapcsolat</h3>";
}
mysqli_query($kapcsolat,"SET NAMES UTF8");
?>