<?php
session_start();
include("Conexion.php");
$Csc_Login=$_SESSION["Csc"];
$Csc=$_REQUEST['csc'];
$select="Select * from Audiovisuales where Creacion_Csc='".$Csc."'";
								db('northcompas', $link);
									$resultselect=mysql_query($select);
									$RsSelect=mysql_fetch_array($resultselect);
										$Csc_Audiovisual=$RsSelect['Csc_Audiovisual'];
										$AudioFile=$RsSelect['AudioFile'];
										$VideoFile=$RsSelect['VideoFile'];
										$EntrevistaFile=$RsSelect['EntrevistaFile'];
										$AprobacionFile=$RsSelect['AprobacionFile'];
													
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

</style>
<title></title>
<script language="javascript">
function Cargando(){
	document.getElementById('cargando').style.display='';
	}
</script>
</head>

<body>
<div style="position:absolute; top:10px; left::5px; z-index:0; width:35%">
<form action="Upload.php?csc=<?php echo $Csc;?>" enctype="multipart/form-data" method="post">
<table width="95%">
<tr>
<td style=" font-family:Arial, Helvetica, sans-serif; color:#000; font-weight:bold; font-size:14px;" colspan="3">Recomendacion (suba de a un archivo)..</td>
</tr>
<tr>
<td>
Archivo de audio(.mp3)
</td>
<td>
<input type="file" name="file_audio" />
</td>
</tr>
<tr>
<td>
Archivo de video(.avi)
</td>
<td>
<input type="file" name="file_video"  />
</td>
</tr>
<tr>
<td>
Formato de entrevista(.jpg)
</td>
<td>
<input type="file" name="file_entrevista" />
</td>
</tr>
<tr>
<td>
Aprobacion de visita(.jpg)
</td>
<td>
<input type="file" name="file_visita" />
</td>
</tr>
<tr>
<td colspan="1"><input type="submit" value="Upload archivos" class="botones" onClick="Cargando();"/>
</td>
<td><img style="display:none;" src="cargando.gif" id="cargando" title="Cargando"></td>
</tr>
</table>
</form>
</div>
<div style=" position:absolute; top:160px; width:90%">
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
	///////////////////////////ARHVIO DE AUDIO
if(isset($_FILES['file_audio']['tmp_name']))
	{
	$AudioTmp = $_FILES['file_audio']['tmp_name'];
	$AudioName = $_FILES['file_audio']['name'];
	$AudioSize = $_FILES['file_audio']['size'];
	$AudioType = $_FILES['file_audio']['type'];
	if ($AudioTmp=='')
			{
		echo '<br/><p class="perror">Archivo de audio no fue cargado'.$FileAudio.'</p>';
			}
		else
			{	
				
				if ($AudioType=="audio/mp3" || $AudioType=='audio/mpeg' && $AudioSize<=3000000)
					{
						$newAudioName=RandomString(5).$AudioName;
						move_uploaded_file($AudioTmp, "uploads/".$newAudioName);	
							$select="Select * from Audiovisuales where Creacion_Csc='".$Csc."'";
								db('northcompas', $link);
									$resultselect=mysql_query($select);
									$RsSelect=mysql_fetch_array($resultselect);
										$Csc_Audiovisual=$RsSelect['Csc_Audiovisual'];
										if($Csc_Audiovisual=='')
											{
												$insertAudioName="Insert into Audiovisuales (Creacion_Csc, Usuario_Csc, AudioFile) Values('".$Csc."',".
												"'".$Csc_Login."','".$newAudioName."')";
												db('northcompas', $link);
												mysql_query($insertAudioName);
												echo '<p class="pok">Archivo de audio cargado Correctamente</p>';
												$AudioFile="datos";
											}
										else{
												$UpdateAudioName="update Audiovisuales set AudioFile='".$newAudioName."' where Csc_Audiovisual='".$Csc_Audiovisual."'";
												db('northcompas', $link);
												mysql_query($UpdateAudioName);
												echo '<p class="pok">Archivo de audio cargado Correctamente</p>';
												$AudioFile="datos";
											}
									
						}
				else
					{
						echo '<br/><p class="perror">Error el archivo de audio no es compatible o excede el tama&ntilde;o maximo</p>';
					}
				
			}
			
	}
	if(isset($_FILES['file_video']['tmp_name']))
		{
			$VideoTmp = $_FILES['file_video']['tmp_name'];
			$VideoName = $_FILES['file_video']['name'];
			$VideoSize = $_FILES['file_video']['size'];
			$VideoType = $_FILES['file_video']['type'];
			if($VideoTmp=='')
				{
					echo '<br/><p class="perror">Selecione un archivo de Video</p>';
				}
			else
				{
					if($VideoType=='video/avi' and $VideoSize<=3000000)
						{
							$newVideoName=RandomString(5).$VideoName;
							move_uploaded_file($VideoTmp, "uploads/".$newVideoName);
							$select="Select * from Audiovisuales where Creacion_Csc='".$Csc."'";
								db('northcompas', $link);
									$resultselect=mysql_query($select);
									$RsSelect=mysql_fetch_array($resultselect);
										$Csc_Audiovisual=$RsSelect['Csc_Audiovisual'];
								if($Csc_Audiovisual=='')
											{
												$insertVideoName="Insert into Audiovisuales (Creacion_Csc, Usuario_Csc, VideoFile) Values('".$Csc."',".
												"'".$Csc_Login."','".$newVideoName."')";
												db('northcompas', $link);
												mysql_query($insertVideoName);
												echo '<p class="pok">Archivo de video cargado Correctamente</p>';
												$VideoFile='';
											}
										else{
												$UpdateVideoName="update Audiovisuales set VideoFile='".$newVideoName."' where Csc_Audiovisual='".$Csc_Audiovisual."'";
												db('northcompas', $link);
												mysql_query($UpdateVideoName);
												echo '<p class="pok">Archivo de video cargado Correctamente</p>';
												$VideoFile='';
											}	
							
							
						}
					else{
							echo '<br/><p class="perror">Error el archivo de video no cumple con los requisitos para ser cargado</p>';
						}	
				}
		}
	if(isset($_FILES['file_entrevista']['tmp_name']))
		{
				$EntrevistaTmp = $_FILES['file_entrevista']['tmp_name'];
				$EntrevistaName = $_FILES['file_entrevista']['name'];
				$EntrevistaSize = $_FILES['file_entrevista']['size'];
				$EntrevistaType = $_FILES['file_entrevista']['type'];
			if($EntrevistaTmp=='')
				{
					echo '<br/><p class="perror">Selecione un archivo de formato de entrevista</p>';
				}
			else
				{
					if($EntrevistaType=='image/jpeg' || $EntrevistaType=='image/pjpeg' && $EntrevistaSize<=3000000)
						{
							$newEntrevistaName=RandomString(5).$EntrevistaName;
							move_uploaded_file($EntrevistaTmp, "uploads/".$newEntrevistaName)or die("Error");
							$select="Select * from Audiovisuales where Creacion_Csc='".$Csc."'";
								db('northcompas', $link);
									$resultselect=mysql_query($select);
									$RsSelect=mysql_fetch_array($resultselect);
										$Csc_Audiovisual=$RsSelect['Csc_Audiovisual'];
								if($Csc_Audiovisual=='')
											{
												$insertEntrevistaName="Insert into Audiovisuales (Creacion_Csc, Usuario_Csc, EntrevistaFile) Values('".$Csc."',".
												"'".$Csc_Login."','".$newEntrevistaName."')";
												db('northcompas', $link);
												mysql_query($insertEntrevistaName);
												echo '<p class="pok">Archivo de entrevista cargado Correctamente Insert</p>';
												$EntrevistaFile='vacio';
											}
										else{
											$UpdateEntrevistaName="update Audiovisuales set EntrevistaFile='".$newEntrevistaName."' where ".
																  " Csc_Audiovisual='".$Csc_Audiovisual."'";
												db('northcompas', $link);
												mysql_query($UpdateEntrevistaName);
												echo '<p class="pok">Archivo de entrevista cargado Correctamente Update</p>';
												$EntrevistaFile='vacio';
											}	
							
							
						}
					else{
							echo '<br/><p class="perror">Error el archivo de entrevista no cumple con los requisitos para ser cargado</p>';
						}
					
				}
		}
if(isset($_FILES['file_visita']['tmp_name']))
		{
					$VisitaTmp = $_FILES['file_visita']['tmp_name'];
					$VisitaName = $_FILES['file_visita']['name'];
					$VisitaSize = $_FILES['file_visita']['size'];
					$VisitaType = $_FILES['file_visita']['type'];
			if($VisitaTmp=='')
				{
					echo '<br/><p class="perror">Selecione un archivo de informacion visita</p>';
				}
			else
				{
					if ($VisitaType== 'image/jpeg' || $VisitaType=='image/pjpeg' and  $VisitaSize<=3000000){
							$newVisitaName=RandomString(5).$VisitaName;
							move_uploaded_file($VisitaTmp, "uploads/".$newVisitaName);
							$select="Select * from Audiovisuales where Creacion_Csc='".$Csc."'";
								db('northcompas', $link);
									$resultselect=mysql_query($select);
									$RsSelect=mysql_fetch_array($resultselect);
										$Csc_Audiovisual=$RsSelect['Csc_Audiovisual'];
								if($Csc_Audiovisual=='')
											{
												$insertVisitaName="Insert into Audiovisuales (Creacion_Csc, Usuario_Csc, AprobacionFile) Values('".$Csc."',".
												"'".$Csc_Login."','".$newVisitaName."')";
												db('northcompas', $link);
												mysql_query($insertVisitaName);
												echo '<br/><p class="pok">Archivo de visita cargado Correctamente</p>';
												$AprobacionFile='datos';
											}
										else{
												$UpdateVisitaName="update Audiovisuales set AprobacionFile='".$newVisitaName."' where Csc_Audiovisual='".$Csc_Audiovisual."'";
												db('northcompas', $link);
												mysql_query($UpdateVisitaName);
												echo '<br/><p class="pok">Archivo de visita cargado Correctamente</p>';
												$AprobacionFile='datos';
											}
						
						
						
						}
					else
						{
							echo '<br/><p class="perror">Error el archivo de visita no cumple con los requisitos para ser cargado</p>';
						}	
					
				}
		}

	
?>
	

</div>
<div style="position:absolute; top:20px; left:450px; width:70px; height:150px">
<table border="0">
<tr>
<td height="30"><?php if($AudioFile!=''){echo '<img src="dialog-okL.png" height="30" width="30" title="Archivo cargado">';}?></td>
</tr>
<tr>
<td height="30"><?php if($VideoFile!=''){echo '<img src="dialog-okL.png" height="30" width="30" title="Archivo cargado">';}?></td>
</tr>
<tr>
<td height="30"><?php if($EntrevistaFile!=''){echo '<img src="dialog-okL.png" height="30" width="30" title="Archivo cargado">';}?></td>
</tr>
<tr>
<td height="30"><?php if($AprobacionFile!=''){echo '<img src="dialog-okL.png" height="30" width="30" title="Archivo cargado">';}?></td>
</tr>
</table>


</div>
</body>
</html>