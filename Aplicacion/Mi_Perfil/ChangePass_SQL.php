<?php
include("Conexion.php");
$Consulta=$_REQUEST['consulta'];
if ($Consulta==0){
	$UserCsc=$_REQUEST['UserCsc'];
	$PassWordNew=$_REQUEST['PassWordNew'];
	db('northcompas',$link);
	$SQL="update  login set PassWord='".$PassWordNew."' where Csc_Login='".$UserCsc."'";
	mysql_query($SQL)or die("{success:false}");
	echo "{success:true}";
	}
?>