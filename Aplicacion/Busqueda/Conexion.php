<?php
$host="localhost";
$user="root";
$pass="S1t12009";
$link=mysql_connect($host,$user,$pass) or die ("Imposible copnectarse con la base de datos");
function db($database, $link){
	$db=mysql_select_db($database,$link);
	return $db;
	}
?>