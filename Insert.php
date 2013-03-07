<?php session_start();
include('Conexion.php');
$Perfil=$_SESSION["Perfil"];
if (isset($_REQUEST['acepto'])){
	$acepto=$_REQUEST['acepto'];

	if ($acepto=='Acepto'){
		$UserCsc = $_SESSION["Csc"];
		$dia=date('d');
		$mes=date('m');
		$year=date('Y');
		$hora=date('G');
		$hora=$hora-1;
		$min=date('i');
		$sec=date('s');
		mysql_select_db('northcompas', $link);
		$sql="insert into ingresos (Login_Csc, Acepto, Fecha) values ('".$UserCsc."', '".$acepto."','".$year."/".$mes."/".$dia." ".$hora.":".$min.":".$sec."')";
		mysql_query($sql)or die ('Error al insertar ingresos'.$sql);
		if($Perfil==2){
			header("Location:AplicacionClienteNew.php");
		}else{
			header("Location:NewAplicacion.php");
		}
		
	}else if ($acepto=='NoAcepto'){
		$UserCsc = $_SESSION["Csc"];
		$dia=date('d');
		$mes=date('m');
		$year=date('Y');
		$hora=date('G');
		$hora=$hora-1;
		$min=date('i');
		$sec=date('s');
		mysql_select_db('northcompas', $link);
		$sql="insert into ingresos (Login_Csc, Acepto, Fecha) values ('".$UserCsc."', '".$acepto."','".$year."/".$mes."/".$dia." ".$hora.":".$min.":".$sec."')";
		mysql_query($sql)or die ('Error al insertar ingresos'.$sql);
		header("Location:Default.php");							
	}
}
?>