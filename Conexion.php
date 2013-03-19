<?php
include_once 'Aplicacion/components/Components.php';
$host='localhost';
$user='root';
$pass="";
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
		$Sql="Select * from ciudad where CscDepartamento='".$departamento."' and CscCiudad='".$Ciudad."'";
			mysql_select_db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$DescCiudad=$Rs['DscCiudad'];
					return $DescCiudad;
	
	}
        function UsuarioTabla($link, $csc_creacion, $tabla)
	{
		$Sql="Select * from ".$tabla."  where Creacion_Csc='".$csc_creacion."'";
                //echo $Sql;
                	db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$Usuario_Csc=$Rs['Usuario_Csc'];
					return $Usuario_Csc;
	
	}
function Terceros($link, $Csc_Terceros)
	{
		$Sql="Select * from terceros  where Cliente_Csc='".$Csc_Terceros."'";
			db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$Dsc_Terceros=$Rs['Dsc_Terceros'];
					$Cliente_Csc=$Rs['Cliente_Csc'];
					return $Dsc_Terceros."-".$Cliente_Csc;
	
	}
function Empresa($link, $CscCliente)
	{
		$Sql="Select * from cliente  where Csc_Cliente='".$CscCliente."'";
                //  echo $Sql;
			db('northcompas',$link);
				$Result=mysql_query($Sql);
					$Rs=mysql_fetch_array($Result);
					$DscCliente=$Rs['Dsc_Cliente'];
					return $DscCliente;
	
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

?>