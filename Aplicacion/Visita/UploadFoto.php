<?php
session_start();
include("Conexion.php");
$Csc_Login=$_SESSION["Csc"];
$Csc=$_REQUEST['csc'];
$sql="Select * from datos_basicos where Creacion_Csc='".$Csc."'";
							db('northcompas', $link);
								$ResultSelect=mysql_query($sql);
									$RsSelect=mysql_fetch_array($ResultSelect);
										$Csc_Datos=$RsSelect['Csc_Datos'];
										$Foto=$RsSelect['Foto'];
										
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
<form action="UploadFoto.php?csc=<?php echo $Csc;?>" enctype="multipart/form-data" method="post">
<table width="90%" align="center">
<tr>
<td colspan="2">
Adjuntar foto tamaño maximo (3Mb)-Tipo(jpg)
</td>
</tr>
<tr>
<td><input type="file" name="file_Foto" /></td>
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
	$Chars.="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$Chars.="abcdefghijklmnopqrstuvwxyz";
	$Chars.="0123456789";
	//añadiendo a lista de carateres
		for($i;$i<=$largo;$i++)
			{
				$random.=substr($Chars,(rand()%(strlen($Chars))),1);
			}
		return $random;	
	}
if (isset($_FILES['file_Foto']['tmp_name']))
	{
	$FotoTmp = $_FILES['file_Foto']['tmp_name'];
	$FotoName = $_FILES['file_Foto']['name'];
	$FotoSize = $_FILES['file_Foto']['size'];
	$FotoType = $_FILES['file_Foto']['type'];
		if ($FotoTmp=='')
			{
		echo '<p class="perror">Error selecione algun archivo antes de empezar a cargar la información</p>'.$FileAudio.'vacio';
			}
		else
			{	

						if ($FotoType=='image/jpeg' || $FotoType=='image/pjpeg' && $FotoSize<=3000000){
						$newFotoName=RandomString(5).$FotoName;
						move_uploaded_file($FotoTmp, "uploads/".$newFotoName)or die('<p class="perror">Error al cargar la imagen Intentelo nuevamente</p>');	
						
										if($Csc_Datos!='')
											{
													$update="update datos_basicos set Foto='".$newFotoName."' where Csc_Datos='".$Csc_Datos."'";	
														db('northcompas', $link);
														mysql_query($update);
																												
											}
										else
											{	
											$Insert="insert  into datos_basicos (Creacion_Csc, Usuario_Csc, Foto) values ".
											"('".$Csc."','".$Csc_Login."','".$newFotoName."')"; 
													db('northcompas', $link);
														mysql_query($Insert);
											}
									echo '<p class="pok">Archivo cargado Corectamente</p>';
									echo '</td></tr><tr><td colspan="2"><img style="200px; width:250px" src="uploads/'.$newFotoName.'" >';			
																
						}
						else
						{
							echo '<p class="pok">Revise el tama&ntilde;o y el tipo de imagen</p>';
							echo '</td></tr><tr><td colspan="2"><img style="height:200px; width:250px" src="error.gif">';
						}
						return false;
				
			}
	}
		if($Foto!='')
			{
				echo '</td></tr><tr><td colspan="2"><img style="200px; width:250px" src="uploads/'.$RsSelect['Foto'].'" >';			
			}
?>
</div>
</td>
</tr>
</table>
</form>
</body>
</html>