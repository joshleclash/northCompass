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

?>