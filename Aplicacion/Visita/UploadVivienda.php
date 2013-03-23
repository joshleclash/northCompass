<?php
@session_start();
include("../../Conexion.php");

$Csc_Login=$_SESSION["Csc"];
$Csc=$_REQUEST['csc'];
$sql="Select * from vivienda where Creacion_Csc='".$Csc."'";
							db('northcompas', $link);
								$ResultVivienda=mysql_query($sql);
									$RsVivienda=mysql_fetch_array($ResultVivienda);
										$Csc_Vivienda=$RsVivienda['Csc_Vivienda'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css"/>
tr{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	width:200px;
	}
p{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	width:200px;
	}
.perror{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	width:500px;
	color: #F00;
	}
.pok{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	width:500px;
	color: #090;
	}		
.botones{
		font-size:10px;
        font-family:Verdana,Helvetica;
        /*font-weight:bold;*/
        color:000000;
        background: -webkit-linear-gradient(#fff, #f1f1f1);
  		background: -moz-linear-gradient(#fff, #f1f1f1);
  		background:  -o-linear-gradient(#fff, #f1f1f1);
        border: #a3a3a3 1px solid;
        width:100px;
        height:19px;

}
.botones:hover{background-color:#d7e5f8;}
.imagen{
	position:absolute;
	top:50px;
	left:50px;
	width:200px;
	height:350px;
	
	}
</style>
<title></title>
<script language="javascript">
function imagen(){
	document.getElementById('id_foto').style.display='';
	
	}
</script>
</head>

<body>
<form action="UploadVivienda.php?csc=<?php echo $Csc;?>" enctype="multipart/form-data" method="post">
<table width="80%" align="center">
<tr>
<td colspan="2">Adjuntar foto tamaño maximo (3Mb)-Tipo(jpg) </td>
</tr>
<tr>
<td><input type="file" name="file_Vivienda" /></td>
</tr>
<tr>
<td colspan="2"><input type="submit" value="Upload archivos" class="botones" onClick="imagen();"/>
</td>
</tr>
<tr>
<td colspan="2"><img style="display:none;" src="cargando.gif"  id="id_foto" title="Cargando"></td>
</tr>
<tr>
<td colspan="2">
<div style=" width:auto;">
<?php
function RandomString($largo){
	$random='';
	srand((double)microtime()*100000);
	$Chars="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$Chars.="abcdefghijklmnopqrstuvwxyz";
	$Chars.="0123456789";
	//añadiendo a lista de carateres
		for($i=0;$i<=$largo;$i++)
			{
				$random.=substr($Chars,(rand()%(strlen($Chars))),1);
			}
		return $random;	
	}
if (isset($_FILES['file_Vivienda']['tmp_name']))
	{
	$ViviendaTmp = $_FILES['file_Vivienda']['tmp_name'];
	$ViviendaName = $_FILES['file_Vivienda']['name'];
	$ViviendaSize = $_FILES['file_Vivienda']['size'];
	$ViviendaType = $_FILES['file_Vivienda']['type'];
		if ($ViviendaTmp=='')
			{
		echo '<p class="perror">Error selecione algun archivo antes de empezar a cargar la información</p>'.$FileAudio.'vacio';
			}
		else
			{	
						echo $ViviendaType;
				if ($ViviendaType=='image/png' || $ViviendaType=='image/x-png' || $ViviendaType=='image/jpeg' || $ViviendaType=='image/pjpeg' || $ViviendaType=='image/bmp'&& $ViviendaSize<=3000000){
						$newViviendaName=RandomString(5).$ViviendaName;
						move_uploaded_file($ViviendaTmp, "uploads/".$newViviendaName)or die('<p class="perror">Error al cargar la imagen Intentelo nuevamente</p>');	
							
										if($Csc_Vivienda!='')
											{
													$update="update vivienda set Foto='".$newViviendaName."' where Csc_Vivienda='".$Csc_Vivienda."'";	
														db('northcompas', $link);
														mysql_query($update);
																																									
											}
										else
											{	
											$Insert="insert  into vivienda (Creacion_Csc, Usuario_Csc, Foto) values ".
											"('".$Csc."','".$Csc_Login."','".$newViviendaName."')"; 
													db('northcompas', $link);
														mysql_query($Insert);
																										
											}
									echo '<p class="pok">Archivo cargado Corectamente</p>';
									echo '</td></tr><tr><td colspan="2" align="center"><img style="height:350px; width:300px" src="uploads/'.$newViviendaName.'" >';			
																
						}
						else
						{
							echo '<p class="perror">Revise el tama&ntilde;o y el tipo de imagen</p>';
							echo '</td></tr><tr><td colspan="2"><img style="height:150px; width:200px" src="error.gif">';
						}
				
			}
			return false;
	}
	if ($RsVivienda['Foto']!='' && $RsVivienda['Foto']!='Sin Definir')
		{
			echo '</td></tr><tr><td colspan="2" align="center"><img style="height:300px; width:300px" src="uploads/'.$RsVivienda['Foto'].'" >';	
		}
	
?>
</div>

</td>
</tr>
</table>
</form>
</body>
</html>