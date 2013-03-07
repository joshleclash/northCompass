<? include("Conexion.php");
$Csc=$_REQUEST['csc'];
$Sql="Select * from creacion where Csc_Creacion=".$Csc."";
	db('northcompas', $link);
	$Result0=mysql_query($Sql);
	$Rs0=mysql_fetch_array($Result0);
		//select audiovisuales
		$SqlA="Select * from Audiovisuales where Creacion_Csc=".$Csc."";
		db('northcompas', $link);
			$ResultA=mysql_query($SqlA);
			$RsA=mysql_fetch_array($ResultA);
			//fin select audivusales
			//AudioFile	VideoFile	EntrevistaFile	AprobacionFile	Observaciones
			
//Audiovisuales
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adjuntos</title>
</head>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />

<style type="text/css">
body{background-image:url('../../Images/BackgroundCliente.jpg');}
.centro{
	position:absolute;
	top:10%;
	left:10%;
	right:10%;
	height:280px;
	border:#CCC solid 2px;
	padding:4px;
	}
.content{
	position: relative; 
	top:1%;
	border:#CCC solid 2px;
	height:250px;
	}
.imagen{
	position:relative;
	border:#999 solid 2px;
	width:190px;
	right:2px;
	bottom:0px;

		
		
	}
tr{font-family:Arial, Helvetica, sans-serif; color:#000000;}
.td{font-family:Arial, Helvetica, sans-serif; color:#000; font-weight:bold;}			
</style>
<body>
<div class="centro">
<div style="background-color:#06C; color:#FFF; border:#CCC solid 2px; font:Arial, Helvetica, sans-serif; font-weight:bold" align="center">
ARCHIVOS ADJUNTOS - <?php echo $Rs0['Nombre_Completo']; ?>
</div>
<div class="content">
<table align="center" style="background-color:#FFF;" width="99%" height="99%">
<tr>
<td colspan="5" align="center">
<img src="../../Images/LOGO002.png"  title="norhcompass"/>
</td>
</tr>
<tr>
<td align="center" class="td">Audio</td>
<td align="center" class="td">Video</td>
<td align="center" class="td">Entrevista</td>
<td align="center" class="td">Aprobacion</td>
</tr>
<tr>
<?php
if($RsA['AudioFile']!='')
	{
	echo '<td align="center"><a href="../Visita/uploads/'.$RsA["AudioFile"].'" rel="nofollow"><img src="../../Images/icono-audio.jpg" title="Descargar"/></a></td>';
	}
else
	{
	echo '<td align="center" style="color:red">No existe archivo</td>';
	}	
if($RsA['VideoFile']!='')
	{
	echo '<td align="center"><a href="../Visita/uploads/'.$RsA['VideoFile'].'" rel="nofollow"><img src="../../Images/icono-video.png" title="Descargar"/></a></td>';
	}
else
	{
	echo '<td align="center" style="color:red">No existe archivo</td>';
	}	
if($RsA['EntrevistaFile']!='')
	{
	echo '<td align="center"><a href="../Visita/uploads/'.$RsA['EntrevistaFile'].'" rel="lightbox[roadtrip]"><img src="../../Images/FileFolder.jpg" title="Descargar" height="50px" width="50px"/></a></td>';
	}
else
	{
	echo '<td align="center" style="color:red">No existe archivo</td>';
	}	
if($RsA['AprobacionFile']!='')
	{
	echo '<td align="center"><a href="../Visita/uploads/'.$RsA['AprobacionFile'].'" rel="lightbox[roadtrip]"><img src="../../Images/webdev-ok.png" title="Descargar" height="50" width="50"/></a></td>';	
	}
else
	{
	echo '<td align="center" style="color:red">No existe archivo</td>';
	}
?>
</tr>
<tr>
<td align="center" class="td">Observaciones</td>
</tr>
<tr>
<td></td>
<td colspan="4"><? echo $RsA['Observaciones']; ?></td>
</tr>
</table>

</div>
</div>

</body>
</html>