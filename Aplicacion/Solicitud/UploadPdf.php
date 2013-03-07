<?php
include("Conexion.php");

session_start();
$CscLogin=$_SESSION["Csc"];
 $Identificacion=$_REQUEST['identificacion'];
 $Empresa=$_REQUEST['Empresa'];
$PdfSelect="select * from Pdf where Identificacion='".$Identificacion."' and Terceros_Csc='".$Empresa."'";
	db('northcompas', $link);
		$PdfResult=mysql_query($PdfSelect);
			$PdfRS=mysql_fetch_array($PdfResult);
			$Csc_Pdf=$PdfRS['Csc_Pdf'];
			$PdfFile=$PdfRS['PdfFile'];
function Consultar($Identificacion, $Empresa, $link)
{
	$PdfSelect="select * from Pdf where Identificacion='".$Identificacion."' and Terceros_Csc='".$Empresa."'";
		db('northcompas', $link);
		$PdfResult=mysql_query($PdfSelect);
			$PdfRS=mysql_fetch_array($PdfResult);
			$Csc_Pdf=$PdfRS['Csc_Pdf'];
	if ($Csc_Pdf!='')
		{
			return $Csc_Pdf;
		}
	else
		{
			return false;
		}
}			
?>
<html>
<head>
</head>
<title></title>
<script language="javascript">
function Imagen()
	{
		document.getElementById('img').style.display='';
	}
function Previsualizar(csc)
	{
		if(csc=='' || csc=='undefined')
			{
				alert("No existe ningun documento para este Usuario");
				return false;
			}
		window.open("VisorPdf.php?csc="+csc,"","width=400,height=500,scrollbars=NO");
	}	
</script>
<style type="text/css">
body{background-color:#FFF;}
.Contenido{
	position:absolute;
	border:#999 /*solid;*/
	top:2px;
	background-color:#333;
	left:20px;	
	width:420;
	background-color:#FFF;
	height:100px;
	z-index:0;
	}
td{font-family:Verdana, Geneva, sans-serif; font-size:13px;}
.error{
	font-family:Verdana, Geneva, sans-serif; 
	font-size:13px;
	color:#F00;
	}
.ok{
	font-family:Verdana, Geneva, sans-serif; 
	font-size:13px;
	color:#060;
	}	
</style>
<body>
<div class="Contenido">
<table>
<form action="UploadPdf.php?identificacion=<?php echo $Identificacion;?>&Empresa=<?php echo $Empresa;?>" enctype="multipart/form-data" method="post" />
<tr>
<td colspan="3">Cargar archivo tamaño maximo (3Mb)-formato(pdf--word)</td>

</tr>
<TR>
<td><input type="hidden" id="nameImagen" value="<?php echo $PdfFile;?>"/></td>
<td colspan="2"><input type="file" name="file_pdf" /></td>
</TR>
<tr>
<td ><input type="submit" value="Cargar Archivo"  onClick="Imagen();"></td>
<td></td>
<td><p style="display:none" id="img">Cargando..<img src="../Visita/cargando.gif" title="Cargando"/></p></td>
</tr>
<tr>
<td colspan="2"></td>
<?php 
	if ($Csc_Pdf!='')
		{
echo '<td align="right"><input type="button"  value="Previsualizar" onClick="Previsualizar('.$Csc_Pdf.');"></td>';
		}
?>
</tr>
</table>
</form>
<?php
function Cambio($carateres)
	{
		$random='';
		$letras.="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$letras.="abcdefghijklmnopqrstuvwxyz";
		$letras.="0123456789";
		for($i=0;$i<=$carateres;$i++)
			{
				$random.=substr($letras,(rand()%(strlen($letras))),1);
			}
		
	return $random;
	}

if (isset($_FILES['file_pdf']['tmp_name']))
	{
		if($_FILES['file_pdf']['tmp_name']!='')
			{
			$TmpFile  =	$_FILES['file_pdf']['tmp_name'];
			$NameFile =	$_FILES['file_pdf']['name'];
			$SizeFile = $_FILES['file_pdf']['size'];
			$TipeFile = $_FILES['file_pdf']['type'];
//			echo $NameFile.$NameFile.$SizeFile;
				if ($TipeFile=='application/pdf' || $TipeFile=='application/msword' && $SizeFile <= 3000000)
					{
						$newFilename=Cambio(5).$NameFile;
						
							if ($Csc_Pdf=='')
								{
									$PdfInsert="Insert into Pdf (Identificacion, Usuario_Csc, PdfFile, Terceros_Csc) values('".$Identificacion."','".$CscLogin."'".
									",'".$newFilename."','".$Empresa."')";
									db('northcompas', $link);
									if ($Identificacion=='' && $Empresa=='')
											{
												echo '<p class="error">Error al crear archivo</p>';
													return false;
											}
										mysql_query($PdfInsert)or die('<p class="error">Error al crear archivo</p>');
										move_uploaded_file($TmpFile, "UploadPdf/".	$newFilename)or die("Error al mover el archivo");
										echo '<p class="ok">Archivo Guardado Correctamente</p>';
										$Csc_Pdf1=Consultar($Identificacion, $Empresa, $link);
										echo '<td align="right"><input type="button"  value="Previsualizar" onClick="Previsualizar('.$Csc_Pdf1.');"></td>';
										
								}
							else
								{
									$PdfUpdate="Update Pdf set PdfFile='".$newFilename."' where Csc_Pdf='".$Csc_Pdf."'"; 
									db('northcompas', $link);
									if ($Identificacion=='' && $Empresa=='')
											{
												echo '<p class="error">Error al actualizar archivo</p>';
													return false;
											}
										mysql_query($PdfUpdate)or die('<p class="error">Error al actualizar archivo</p>');
										move_uploaded_file($TmpFile, "UploadPdf/".	$newFilename)or die("Error al mover el archivo");
											echo '<p class="ok">Archivo Actualizado Correctamente</p>';
											$Csc_Pdf2=Consultar($Identificacion, $Empresa, $link);
											echo '<td align="right"><input type="button"  value="Previsualizar" onClick="Previsualizar('.$Csc_Pdf2.');"></td>';
								
								}
							
					
					}
				else
					{
					echo "<p>El archivo no cumple con los requisitos para ser Cargado</p>";
					}
				
			}
	}

?>
</div>
</body>
</html>