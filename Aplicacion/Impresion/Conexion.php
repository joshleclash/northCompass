<?php
//Conexion sitio real
$host='northcompas.db.8472814.hostedresource.com';
$user='northcompas';
$pass="S1t12009";
//fin conexion 
//desarrollo--------------
//$host='localhost';
//$user='root';
//$pass="S1t12009";
$link=mysql_connect($host,$user,$pass) or die ("Imposible conectarse con la base de datos");
function db($database, $link){
	$db=mysql_select_db($database,$link);
	return $db;
	}
function Departamento($link, $departamento)
	{
		$Sql="Select * from departamento where CscDepartamento='".$departamento."'";
			mysql_select_db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$DscDepartamento=$Rs['DscDepartamento'];
					return $DscDepartamento;
	
	}
function Ciudad($link, $departamento, $Ciudad)
	{
		$Sql="Select * from ciudad where CodDepartamento='".$departamento."' and CodCiudad='".$Ciudad."'";
			mysql_select_db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$DescCiudad=$Rs['DescCiudad'];
					return $DescCiudad;
	
	}
function Pais($link, $pais)
	{
		$Sql="Select * from pais  where Csc_Pais='".$pais."'";
			db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$pais=$Rs['Dsc_Pais'];
					return $pais;
	
	}
function Usuario($link, $login_csc)
	{
		$Sql="Select * from login  where Csc_Login='".$login_csc."'";
			db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$Nombres=$Rs['Nombres'];
					$Apellidos=$Rs['Apellidos'];
					return $Nombres." ".$Apellidos;
	
	}
function UsuarioTabla($link, $csc_creacion, $tabla)
	{
		$Sql="Select * from ".$tabla."  where Creacion_Csc='".$csc_creacion."'";
			db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$Usuario_Csc=$Rs['Usuario_Csc'];
					return $Usuario_Csc;
	
	}
function Terceros($link, $Csc_Terceros)
	{
		$Sql="Select * from terceros  where Csc_Terceros='".$Csc_Terceros."'";
			db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$Dsc_Terceros=$Rs['Dsc_Terceros'];
					$Cliente_Csc=$Rs['Cliente_Csc'];
					return $Dsc_Terceros."-".$Cliente_Csc;
	
	}
function Empresa($link, $CscCliente)
	{
		$Sql="Select * from cliente  where CscCliente='".$CscCliente."'";
			db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$DscCliente=$Rs['DscCliente'];
					return $DscCliente;
	
	}	
function DatoTabla($link, $csc_creacion, $tabla, $Dato)
	{
		$Sql="Select ".$Dato." from ".$tabla."  where Creacion_Csc='".$csc_creacion."'";
		
			db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$Dato=$Rs[$Dato];
					return $Dato;
	
	}	
function CualquierTabla($link, $buscar, $csc, $tabla, $devuelto)
	{
		$Sql="Select * from ".$tabla."  where ".$buscar."='".$csc."'";
			db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$devuelto=$Rs[$devuelto];
					return $devuelto;
	
	}		
				
?>