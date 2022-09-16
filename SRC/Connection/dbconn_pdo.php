<?php 
$db_host="127.0.0.1";
$db_user="root";
$db_password="";

//$conn="mysql:host=$db_host;dbname=$db_name";
$conn="mysql:host=$db_host";
try{
	$db_conn=new PDO($conn,$db_user,$db_password);   //PDO típusú objektum a $db_conn
	$db_conn->query("SET NAMES UTF8");
	print "<h5>Sikeres kapcsolat!</h5>";
}catch(Exception $e){			
	print "<h5>Nem sikerült a kapcsolat!</h5>".$e->getMessage();  //megmondja milyen hibája van
}

?>