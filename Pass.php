<?php session_start();?>
<?php
include ("Conexion.php");
$acces=$_REQUEST["acces"];
$username=$_REQUEST["username"];
$password=$_REQUEST["password"];
$Codigo=$_REQUEST['Codigo'];
$Codigohidden=$_REQUEST['Codigohidden'];
if ($Codigohidden==$Codigo){
if 	($acces == 0)
	{
		//session_destroy();
		//header('Location: Default.php');	
	header ('Location: Default.php');	
    session_destroy();           
        
 }else if ($acces == 1){
	$db=mysql_select_db("northcompas");
	$SQL= "select * from login WHERE Usuario = '".$username."'";
	// = ".$username."";
	$Consulta = mysql_query($SQL, $link) or die ("error en la consulta SQL");
	while($row=mysql_fetch_array($Consulta))
	{
		$pas=$row["PassWord"];
		$Csc=$row["Csc_Login"];
		$Nombres=$row["Nombres"];
		$Apellidos=$row["Apellidos"];
		$Estado=$row['Estado'];
		$Perfil=$row['Perfil'];
	}
	if($Csc==''){
		$Csc="0";
		}
	$_SESSION["Csc"]=$Csc;
	if ($Estado==2)
		{
		echo "{success: false, errors: { reason: 'Usuario Bloqueado Restablesca Contraseña E intentelo Nuevamente' }}";
		}
		else
		{
	$_SESSION["Csc"]=$Csc;
	$SQL="Select count(Acepto)as cantidad from ingresos where Login_Csc='".$_SESSION["Csc"]."' and Acepto = 'Error'";
	mysql_select_db('northcompas', $link);
	$count=mysql_query($SQL);
	$Crow=mysql_fetch_array($count);
	$cantidad=$Crow['cantidad'];
	if ( $cantidad >=3 )
		{
		$SQLup="update login set Estado= '2' where Csc_Login='".$_SESSION["Csc"]."'";
		mysql_select_db('northcompas', $link);
		mysql_query($SQLup)or die("{success: false}");
		echo "{success: false, errors: { reason: 'Usuario Bloqueado Restablesca Contraseña E intentelo Nuevamente' }}";
		}
	else
	if ($pas == $password){
		$_SESSION["Csc"]=$Csc;
		$_SESSION["Nombres"]=$Nombres;
		$_SESSION["Apellidos"]=$Apellidos;
		$_SESSION["Perfil"]=$Perfil;
		echo "{success: true}";
		
	}
	
		else 
	{
		
$UserCsc = $_SESSION["Csc"];
$dia=date('d');
$mes=date('m');
$year=date('Y');
$hora=date('G', strtotime("-1 hour"));
$min=date('i');
$sec=date('s');
mysql_select_db('northcompas', $link);
$sql="insert into ingresos (Login_Csc, Acepto, Fecha) values ('".$UserCsc."', 'Error','".$year."/".$mes."/".$dia." ".$hora.":".$min.":".$sec."')";
mysql_query($sql)or die ('Error al insertar ingresos');	
		echo "{success: false, errors: { reason: 'Errro de contraseña o Usuario Valide su Informacion e intentelo Nuevamente' }}";	
		}
	
}
}else 
{
	echo "{succes: false}";
}

}else{
echo "{success: false, errors: { reason: 'El codigo de Verificacion No coincide Con el escrito por usted Verifique la Informacion e intentelo Nuevamente'}}";
}
?>
