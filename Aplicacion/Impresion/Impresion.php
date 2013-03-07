<?php
//header("Content-type: application/pdf"); 
//header("Content-Disposition: inline; filename=view.pdf"); 
include("Conexion.php");
$Csc=$_REQUEST['csc'];
db('northcompas', $link);
$Sql="Select * from creacion where Csc_Creacion='".$Csc."'";//creacion
	$Result=mysql_query($Sql);
		$Rs=mysql_fetch_array($Result);
		$Departamento=Departamento($link, $Rs['Departamento']);
		$Ciudad=Ciudad($link, $Rs['Departamento'], $Rs['Ciudad']);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
	<!--
	body{ background-image:url(background.png); text-transform:uppercase; font-family:Arial, Helvetica, sans-serif;}
	td,th {
		font-family: Calibri;
		font-size: 14px;
	}
.Vivienda{
	position:absolute;
	top:300px;
	border:#666 solid 2px;
	height:6cm;
	left:680px;
	width:190px;
	float:left;
	padding:2px;
	}
	-->
</style>
</head>
<body>
<div class="Vivienda"><img src="<? 
	if(DatoTabla($link, $Rs['Csc_Creacion'], 'vivienda', 'Foto')!='')
	{
		echo "../Visita/uploads/".DatoTabla($link, $Rs['Csc_Creacion'], 'vivienda', 'Foto');
		}else{
	echo 'Vacio.png';
	} 
	?>" height="225px" width="185px" /></div>
<table style=" position:absolute; Width:216mm; height:279mm" align="center" heigth="250mm" width="200mm" border="0" cellspacing="2" cellpadding="2">
  <tr>

  <td colspan="5" align="center"  ><strong><font color="#000000" size="+1"><? echo strtoupper($Rs['Nombre_Completo']);?><BR /></font>
  <font color="#808080" size="3px"><? echo $Rs['Cargo'];?></font></strong></td>
  <td align="center">
  <div style="height:4cm; width:3.5cm; position: relative; top:1px; left:5%; border:#666 solid 2px;">
  <img src="<? 
  if(DatoTabla($link, $Rs['Csc_Creacion'], 'datos_basicos', 'Foto')!='')
  {
	  echo "../Visita/uploads/".DatoTabla($link, $Rs['Csc_Creacion'], 'datos_basicos', 'Foto');
  }
else
 {
	  echo 'Vacio.png';
  }
?>" height="150px" width="125px"/>
  </div>
  <td></td>
  <tr>
     <td><strong>Direccion de Residencia</strong></td>
    <td colspan="5"><? echo $Rs['Direccion']; ?></td>
    <td></td>
   </tr>
  <tr>
    <td width="224"><strong>Tipo de Documento:</strong></td>
    <td width="76" colspan="2"><? echo strtolower($Rs['T_Identificacion']); ?></td>
    <td width="107" colspan="1"><strong>Licencia Cond:</strong></td>
   <td colspan="2"><? echo DatoTabla($link, $Rs['Csc_Creacion'], 'documentos', 'Num_Licencia'); ?></td>
   
  
  </tr>
  <tr>
    <td><strong>Departamento:</strong></td>
    <td colspan="2"><? echo Departamento($link, $Rs['Departamento']);?></td>
    <td><strong>Ciudad:</strong></td>
    <td><? echo Ciudad($link, $Rs['Departamento'], $Rs['Ciudad']);?></td>
    <td><strong>Barrio o Municipio</strong></td>
    <td><?  if($Rs['Barrio']!='000'){ echo  CualquierTabla($link, 'CodLocalidad', $Rs['Barrio'], 'localidad', 'DscLocalidad');}else{echo "No definido";} ?></td>
  </tr>
  <tr>
  <td><strong>Estado civil:</strong></td>
  <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Rs['Csc_Creacion'], 'info_familiar', 'Estado_Civil'); ?></td>
  <td><strong>Telefono Fijo</strong></td>
  <td><? echo $Rs['Tel_Fijo'];?></td>
  <td><strong>Celular1:</strong></td>
  <td><? echo $Rs['Tel_Celular']; ?></td>
  </tr>  
  <tr>
    <td><strong>Celular2:</strong></td>
    <td colspan="3">
	<? 
		echo $Rs['Tel_Celular2']; 
	?>
    </td>
    <td><strong></strong></td>
    <td><? //echo "No definido"; ?></td>
    <td></td>
  </tr>
  <tr>
    <td><strong>Mail:</strong></td>
    <td colspan="3">
	<? 
	echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'datos_basicos', 'Mail');
	?>
    </td>
    </tr>
  	<tr>
    <td style="font-size:16px; border-top:#808080 solid 3px;" align="center" colspan="5"><strong>Información Vivienda</strong></td>
  	</tr>
  	<tr>
    <td><strong>Direccion:</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Direccion');?></td>
    <td><strong>Departamento:</strong></td>
    <td><? echo Departamento($link, CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Departamento_Csc'));?></td>
    </tr>
  	<tr>
    <td><strong>Ciudad:</strong></td>
    <td colspan="2"><? echo Ciudad($link, CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Departamento_Csc'), CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Ciudad_Csc')); ?></td>
    <td><strong>Municipio:</strong></td>
    <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Municipio_Dsc'); ?></td>
  </tr>
  <tr>
    <td><strong>Barrio:</strong></td>
    <td colspan="2"><? 
	if($Rs['Dsc_Barrio']=='')
	{
		echo "No diligenciado";
	}
	else
	{
		echo $Rs['Dsc_Barrio'];
	}
   ?></td>
    <td><strong>Tipo Inmueble:</strong></td>
    <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'T_inmueble');?></td>
  </tr>
  <tr>
    <td><strong>Estrato:</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Estrato'); ?></td>
    <td><strong>El inmueble es:</strong></td>
    <td><?   echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Tipo_Inmueble');?></td>
  </tr>
  <tr>
    <td><strong>Nombre Arrendador:</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Arrendador');?></td>
    <td><strong>Valor Canon:</strong></td>
    <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Canon'); ?></td>
  </tr>
  <tr>
    <td><strong>Referencias de entorno:</strong></td>
    <td colspan="4"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Entorno'); ?></td>
    </tr>
  <tr>
    <td height="20" colspan="6">&nbsp;</td>
   <tr>
    <td height="20" colspan="2"><strong>Distribución  física y condiciones generales del Inmueble: </strong></td>
  </tr>
  <tr>
  <td>
    <td height="20" colspan="5"><?php echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Distribucion'); ?></td>
  </tr>
  <tr>
    <td><strong>Caracteristicas de convivencia</strong></td>
  </tr>
  <tr>
  <td></td>
    <td colspan="5"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'vivienda', 'Caracteristicas');?></td>
  </tr>
  <tr>
    <td style="font-size:16px; border-top:#808080 solid 3px;" align="center" colspan="7"><strong>Documentos</strong></td>
  </tr>
  <tr>
  <?
   if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Num_Licencia')!='')
   {
  ?>
    <td><strong>Tiene Licencia de Conduccion:</strong></td>
    <td ><?  if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Num_Licencia')!=''){echo "Si";}else{echo "No";} ?></td>
    <td ><strong>Categoria:</strong></td>
    <td ><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Categoria') ?></td>
  </tr>
  <?
  if (CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Vehiculo1')!=''){
  ?>
  <tr>
    <td><strong>Tiene Vehiculo:</strong></td>
    </tr>
    <tr>
   
    <td><strong>Marca Vehiculo1:</strong></td>
    <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Vehiculo1') ?></td>
    <td><strong>Placas Vehiculo1:</strong></td>
    <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Placas1')?></td>
   
    </tr>
    <tr>
     <? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Vehiculo2')!=''){?>
    <td><strong>Marca Vehiculo2:</strong></td>
    <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Vehiculo2')?></td>
    <td><strong>Placas Vehiculo2:</strong></td>
    <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Placas2')?></td>
     <? }?>
    </tr>
    <tr>
    <? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Vehiculo3')!=''){ ?>
    <td><strong>Marca Vehiculo3:</strong></td>
    <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Vehiculo3')?></td>
    <td><strong>Placas Vehiculo3:</strong></td>
    <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Placas3')?></td>
    <?
  	}
  }
	?>
    </tr>
    
  <tr>
  <? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Moto1')!=''){?>
    <td><strong>Tiene Moto:</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Moto1')?></td>
    <td><strong>Placas Moto:</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'PlacaM1')?></td>
  <? } ?>
  </tr>
  <?
  } ?>
  <tr>
  <? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'RuntObservaciones')!=''){ ?>
  <td><strong>Anotacion Base de datos de el runt:</strong></td>
  </tr>
  <tr>
  <td></td>
  <td colspan="5"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'RuntObservaciones')?></td>
  <? }?>
  </tr>
  <tr>
  <? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Num_Libreta')!=''){?>
  <td><strong>Tiene libreta militar:</strong></td>
  <td ><? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Num_Libreta')!=''){echo "Si";}else{echo "No";}?></td>
  <td colspan="2"><strong>Numero libreta:</strong></td>
  <td ><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Num_Libreta')?></td>´
  
  </tr>
<tr>
  <td><strong>Numero distrito militar:</strong></td>
  <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Distrito')?></td>
  <td colspan="2"><strong>Libreta de Conducta</strong></td>
  <td colspan="1"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'LibretaCod')?></td>
  <tr>
  <td><strong>Categoria Libreta:</strong></td>
  <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'LibretaCat')?></td>
 
  <? } ?>
  </tr>
<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'TipoA')!=''){?>
  <td><strong>Tiene arma:</strong></td>
  <td><? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'TipoA')!=''){echo "Si";}else{echo "No"; }?></td>
  <td><strong>Propia:</strong></td>
  <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'TipoA')?></td>
  <td><strong>Marca:</strong></td>
  <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'MarcaA')?></td>
  </tr>
  <tr>
  <td><strong>Calibre arma:</strong></td>
  <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'CalibreA')?></td>
  <td><strong>Serial:</strong></td>
  <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'SerieNum')?></td>
<? }?>
  </tr>
  
<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'CodPasado')!=''){?>
	<td><strong>Tiene pasado judicial vigente:</strong></td>
  	<td><? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'CodPasado')!=''){echo "Si";}else{echo "No";}?></td>
    <td><strong>Numero:</strong></td>
  <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'NumPasado')?></td>
  
</tr>
<tr>
<td colspan=""> <strong>Codigo verificacion:</strong></td>
  <td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'CodPasado')?></td>
<td colspan="2" ><strong>Fecha Vencimiento:</strong></td>
<td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'VencePasado');?></td>
<? }?>
</tr>
<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Pasaporte')!=''){?>
<td><strong>Tiene Pasaporte:</strong></td>
<td>Si</td>
<td colspan="2"><strong>Numero Pasaporte:</strong></td>
<td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Pasaporte');?></td>
<td colspan="1"><strong>Vencimiento:</strong></td>
<td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'VencePasaporte');?></td>
<? }?>
</tr>

<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'NumVisa')!=''){?>
<td><strong>Tiene Visa:</strong></td>
<td>Si</td>
<td colspan="2"><strong>Numero Visa:</strong></td>
<td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'NumVisa');?></td>
<td colspan="1"><strong>Pais:</strong></td>
<td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Pais');?></td>
</tr>
<tr>
<td colspan="1"><strong>Vencimiento Visa:</strong></td>
<td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'VenceVisa');?></td>
<? }?>
</tr>

<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Antecedentes')!=''){?>
<td colspan="2"><strong>El candidato presenta antecedentes judiciales?:</strong></td>
</tr>
<tr>
<td></td>
<td colspan="5"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Antecedentes');?></td>
<? }?>
</tr>
<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'CertificadoVecindad')!=''){?>
<td colspan="2"><strong>El candidato cuenta con certificaco de vecindad?:</strong></td>
</tr>
<tr>
<td></td>
<td colspan="5"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'CertificadoVecindad')?></td>
<? }?>
</tr>
<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Datacredito')!=''){?>
<td colspan="2"><strong>El candidato esta reportado en DATACREDITO?:</strong></td>
</tr>
<tr>
<td></td>
<td colspan="5"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'documentos', 'Datacredito')?></td>
<? }?>
</tr>
<tr>
<td style="font-size:16px; border-top:#808080 solid 3px;" align="center" colspan="7"><strong>INFORMACION ACADEMICA</strong></td>
</tr>
<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'Grid1')!=''){?>
  <td><strong>EDUCACIÓN FORMAL</strong></td>
</tr>
<tr>
<td colspan="7" align="center">
  	<!--GRID DE EDUCACION FORMAL COTENIDO EN UNA FILA DE LA TABLA  -->
	<table border="1" style=" border:#D6E3F3 solid 3PX;" width="90%">
    <tr>
    <td><strong>Nivel</strong></td>
    <td><strong>Titulo</strong></td>
    <td><strong>Institucion</strong></td>
    <td><strong>Otra</strong></td>
    <td><strong>Pais</strong></td>
    <td><strong>Ingreso</strong></td>
    <td><strong>Estado</strong></td>
    <td><strong>Finalizacion</strong></td>
    </tr>
    <?php 
	$Educacion=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'Grid1');
	$EducacionS=split("-",$Educacion);
	for($i=0;$i<=2;$i++)
		{
			if($EducacionS[$i]!='')
				{
							$EducacionDato=split("\|",$EducacionS[$i]);
							$columna.='<tr>'.
									  '<td>'.$EducacionDato[1].'</td>'.
									  '<td>'.$EducacionDato[2].'</td>'.
									  '<td>'.$EducacionDato[3].'</td>'.
									  '<td>'.$EducacionDato[4].'</td>'.
									  '<td>'.$EducacionDato[5].'</td>'.
									  '<td>'.$EducacionDato[6].'</td>'.
									  '<td>'.$EducacionDato[7].'</td>'.
									  '<td>'.$EducacionDato[8].'</td>'.
									  '</tr>';
				}						
			else
				{
				break;
				}	
		}
		echo 	$columna;
	?>
    </table>
	<!-- fin grid 1-->  
</td>
<? }?>
</tr>

<tr>
 <? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'Grid2')!=''){?> 
  <td><strong>IDIOMAS</strong></td>
  </tr>
<tr>

<td colspan="7" align="center">
<!--GRID DE EDUCACION FORMAL COTENIDO EN UNA FILA DE LA TABLA  -->
	<table border="1" style=" border:#D6E3F3 solid 3PX;" width="90%">
    <tr>
    <td><strong>Idioma</strong></td>
    <td><strong>Dominio</strong></td>
    <td><strong>Donde Aprendio</strong></td>
    </tr>
    <?php
	$Idiomas=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'Grid2');
	if($Idiomas!=''){
		$IdiomasS=split("-",$Idiomas);
		for($i=0;$i<=10;$i++)
			{
				if($IdiomasS[$i]!='')
					{
						$IdiomasDato=split("\|",$IdiomasS[$i]);
						$ColumnaGrid2.='<tr>'.
										'<td>'.$IdiomasDato[1].'</td>'.
										'<td>'.$IdiomasDato[2].'</td>'.
										'<td>'.$IdiomasDato[3].'</td>'.
										'</tr>';
										
					}
				else
					{
					break;
					}
			echo $ColumnaGrid2;
			}
	}
	?>
    
    
    </table>
	<!-- fin grid 1--> 

</td>
<? }?>
</tr>
<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'Grid3')!=''){?>
  <td><strong>EDUCACIÓN NO FORMAL</strong></td>
</tr>
<tr>
  <td colspan="7" align="center">
  <!--GRID DE EDUCACION FORMAL COTENIDO EN UNA FILA DE LA TABLA  -->
	<table border="1" style=" border:#D6E3F3 solid 3PX;" width="90%">
    <tr>
    <td><strong>Tipo</strong></td>
    <td><strong>Otro</strong></td>
    <td><strong>Pais</strong></td>
    <td><strong>Departamento</strong></td>
    <td><strong>Ciudad</strong></td>
    <td><strong>Titulo</strong></td>
    <td><strong>Institución</strong></td>
    <td><strong>Área</strong></td>
    </tr>
    <?php
	$NoFormal=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'Grid3');
		$NoFormalS=split("-",$NoFormal);
		for($i=0;$i<=10;$i++)
			{
				if($NoFormalS[$i]!='')
					{
					$NoformalD=split("\|", $NoFormalS[$i]);
						$ColumnaGrid3.='<tr>'.
										'<td>'.$NoformalD[1].'</td>'.
										'<td>'.$NoformalD[2].'</td>'.
										'<td>'.$NoformalD[3].'</td>'.
										'<td>'.$NoformalD[4].'</td>'.
										'<td>'.$NoformalD[5].'</td>'.
										'<td>'.$NoformalD[6].'</td>'.
										'<td>'.$NoformalD[7].'</td>'.
										'<td>'.$NoformalD[8].'</td>'.
										'</tr>';
						
					}
				else
					{
					break;
					}
			echo $ColumnaGrid3;
			}
	?>
    </table>
	<!-- fin grid 1--> 
  
  
  
  </td>
 <? }?> 
  </tr>
  <tr>
  <td colspan="7" style="font-size:16px; border-top:#808080 solid 3px;" align="center"><strong>verificaci&Oacute;n de documentos</strong></td>
  </tr>
  
  <tr>
  <? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'DocFalso')!=''){?>
  <td colspan="3"><strong>El candidato presento algun documento falso:</strong></td>
  <td colspan="3"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'DocFalso');?></td>
  <? }?>
  </tr>
  <tr>
  <? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'DocAdult')!=''){?>
  <td colspan="3"><strong>El candidato presento algun documento adulterado:</strong></td>
  <td colspan="3"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'DocAdult');?></td>
  <? }?>
  </tr>
  <tr>
  <? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'Observaciones')!=''){?>
  <td colspan="2"><strong>Observaciones:</strong></td>
  <td colspan="4"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_academica', 'Observaciones');?></td>
  <? }?>
  </tr>
<tr>
<td style="font-size:16px; border-top:#808080 solid 3px;" align="center" colspan="7"><strong>INFORMACION FAMILIAR</strong></td>

</tr>
<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Nombres_Familiares')!=''){?>
  <td><strong>Tiene Familiares en la Empresa:</strong></td>
  <td colspan="5">SI</td>
 </tr>
<tr>
  <td><strong>Nombres:</strong></td><td ><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Nombres_Familiares');?></td>
  <td><strong>Apellidos:</strong></td><td colspan="3"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Apellidos_Familiares');?></td>
</tr>
<tr>
  <td><strong>Cargo:</strong></td><td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Cargo_Familiares');?></td>
  <td><strong>Telefono:</strong></td><td colspan="3"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Telefono_Familiares');?></td>
<? }?> 
</tr>
<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Nombre_Amigo')!=''){?>
  <td><strong>Tiene amigos en la empresa:</strong></td>
  <td colspan="5">Si</td>
 </tr>
<tr>
  <td><strong>Nombres:</strong></td><td ><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Nombre_Amigo');?></td>
  <td><strong>Apellidos:</strong></td><td colspan="3"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Apellido_Amigo');?></td>
</tr>
<tr>
  <td><strong>Cargo:</strong></td><td><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Cargo_Amigo');?></td>
  <td><strong>Telefono:</strong></td><td colspan="3"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Telefono_Amigo');?></td>
<? }?>
</tr>
<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Grid_Referencias')!=''){?>
  <td colspan="7" align="center"><strong>REFERENCIAS</strong></td>
 </tr>
<tr>
<td colspan="7" align="center">
<!--GRID DE EDUCACION FORMAL COTENIDO EN UNA FILA DE LA TABLA  -->
	<table border="1" style=" border:#D6E3F3 solid 3PX;" width="90%">
    <tr>
    <td><strong>Nombres</strong></td>
    <td><strong>Empresa</strong></td>
    <td><strong>Cargo</strong></td>
    <td><strong>Telefonos</strong></td>
    <td><strong>Parentesco</strong></td>
    </tr>
    
    <?php
	$Referencias=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Grid_Referencias');//
	//echo $Referencias;
		$ReferenciasS=split("-", $Referencias);
			for($i=0;$i<=20;$i++)
				{
					if($ReferenciasS[$i]!='')
						{
							$ReferenciasDato=explode("|", $ReferenciasS[$i]);
								$ColumnaR.='<tr>'.
											'<td>'.$ReferenciasDato[1].'</td>'.
											'<td>'.$ReferenciasDato[2].'</td>'.
											'<td>'.$ReferenciasDato[3].'</td>'.
											'<td>'.$ReferenciasDato[4].'</td>'.
											'<td>'.$ReferenciasDato[5].'</td>'.
											'</tr>';
						}
					else
						{
						break;
						}
						
				}
			echo 	$ColumnaR;	
	?>
    </table>
	<!-- fin grid 1-->

</td>
<? }?>
</tr>
<tr><td><strong>Estado Civil:</strong></td>
<td colspan="5"><? 
echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Estado_Civil');
 if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Estado_Civil')=='Casado'){
		
?></td>

</tr>
<tr>
<td><strong>Nombre Conyuge:</strong></td>
<td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Nombre_Conyuge');?></td>
<td colspan="2"><strong>Apellido Conyuge:</strong></td>
<td colspan="1"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Apellidos_Conyuge');?></td>
</tr>
<tr>
<td><strong>Tipo identificacion:</strong></td>
<td colspan="4"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Tipo_Identificacion');?></td>
</tr>
<tr>
<td><strong>Identificacion:</strong></td>
<td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Numero_Identificacion');?></td>
<td colspan="2"><strong>Numero telefono:</strong></td>
<td colspan="1"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Telefono_Conyuge');?></td>
</tr>

<tr>
<td><strong>Numero Celular:</strong></td>
<td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Celular_Conyuge');?></td>
<td colspan="2"><strong>Correo Electronico:</strong></td>
<td colspan="1"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Mail_Conyuge');?></td>
</tr>
<tr>
<td><strong>Empresa donde trabaja:</strong></td>
<td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Empresa_Conyuge');?></td>
<td colspan="2"><strong>Telefono trabajo</strong></td>
<td colspan="1"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Tel_TrabajoConyu');?></td>
</tr>
<tr>
  <td><strong>Actividad que realiza</strong></td>
</tr>
<tr>
<td></td>
  <td colspan="5"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Actividad_Conyuge');?></td>
</tr>
 
<tr>
<? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Grid_Hijos')!=''){?>
  <td><strong>Hijos:</strong></td>
</tr>
<tr>
<td colspan="7" align="center">
<table border="1" style=" border:#D6E3F3 solid 3PX;" width="90%">
    <tr>
    <td><strong>Nombres</strong></td>
    <td><strong>Apellidos</strong></td>
    <td><strong>Nacimiento</strong></td>
    <td><strong>Mayor</strong></td>
    <td><strong>Empresa</strong></td>
    <td><strong>Celular</strong></td>
    
    </tr>
    
    <?php
	$Hijos=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Grid_Hijos');//
		$HijosS=split("-", $Hijos);
			for($i=0;$i<=10;$i++)
				{
					if($HijosS[$i]!='')
						{
							$HijosDato=split("\|", $HijosS[$i]);
								$ColumnaH.='<tr>'.
											'<td>'.$HijosDato[1].'</td>'.
											'<td>'.$HijosDato[2].'</td>'.
											'<td>'.$HijosDato[3].'</td>'.
											'<td>'.$HijosDato[4].'</td>'.
											'<td>'.$HijosDato[5].'</td>'.
											'<td>'.$HijosDato[6].'</td>'.
											'</tr>';
						}
					else
						{
						break;
						}
						
				}
			echo 	$ColumnaH;	
	?>
    </table>
	<!-- fin grid 1-->





</td>
<?php 
 }//fin grid hijos
}?>
</tr>
<tr>
  <td><strong>Informacion Padres:</strong></td><td colspan="5"></td></tr>  
  <tr>
    <td height="20" colspan="3"><strong>Madre</strong></td>
    <td colspan="3"><strong></strong></td>
  </tr>  
  <td bgcolor="#000000" height="1%" colspan="6"></td>
  </tr>
  <tr>
    <td height="20"><strong>Nombres</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Nombre_Madre');?></td>
    <td><strong>Apellidos</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'apellidos_Madre');?></td>
    </tr>
    <tr>
    <td height="20"><strong>Pais</strong></td>
    <td colspan="2"><? echo Pais($link,CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Pais_M'));?></td>
    <td><strong>Departamento</strong></td>
    <td colspan="2"><? echo Departamento($link, CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Departamento_CscM'));?></td>
    </tr>
    <tr>
    <td height="20"><strong>Ciudad</strong></td>
    <td colspan="2"><? echo Ciudad($link,CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Departamento_CscM'), CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Ciudad_CscM'));?></td>
    <td><strong>Telefono residencia</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Tel_Madre');?></td>
    </tr>
    <tr>
    <td height="20"><strong>Telefono Celular</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Cel_Madre');?></td>
    <td colspan="2"><strong>Actividad que realiza </strong></td>
    <td colspan="1"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Actividad_M'); ?></td>
    </tr>
    <tr>
    <td height="20"><strong>Empresa :</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Empresa_Madre');?></td>
    <td><strong>Cargo</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Cargo_Madre'); ?></td>
    </tr>
   <tr>
    <td height="20" colspan="3"><strong>Padre</strong></td>
    <td colspan="3"><strong></strong></td>
  </tr>  
  <td bgcolor="#000000" height="1%" colspan="6"></td>
  </tr>
  <tr>
    <td height="20"><strong>Nombres</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Nombre_Padre'); ?></td>
    <td><strong>Apellidos</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Apellido_Padre');?></td>
    </tr>
    <tr>
    <td height="20"><strong>Pais</strong></td>
    <td colspan="2"><? echo Pais($link,CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Pais_P'));?></td>
    <td><strong>Departamento</strong></td>
    <td colspan="2"><? echo Departamento($link,CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Departamento_Csc'));?></td>
    </tr>
    <tr>
    <td height="20"><strong>Ciudad</strong></td>
    <td colspan="2"><? echo Ciudad($link, CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Departamento_Csc'),CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Ciudad_Csc'));?></td>
    <td><strong>Telefono residencia</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Telefono_Padre');?></td>
    </tr>
    <tr>
    <td height="20"><strong>Telefono Celular</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Celular_Padre');?></td>
    <td colspan="2"><strong>Actividad que realiza</strong></td>
    <td colspan="1"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Actividad');?></td>
    </tr> 
    <tr>
    <? if(CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Empresa_Padre')!=''){?>
    <td><strong>Empresa:</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Empresa_Padre');//Empresa_Padre	Cargo_Padre	Tel_TraPadre?></td>
    <td><strong>Cargo:</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Cargo_Padre');//Empresa_Padre	Cargo_Padre	Tel_TraPadre?></td>
   
</tr>
<tr>
    <td colspan="1"><strong>Telefono Trabajo</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Tel_TraPadre');//Empresa_Padre	Cargo_Padre	Tel_TraPadre?></td>
    <? }?>
    </tr>
  <tr>
  <? $Hermanos=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Grid_Hermanos');
	if($Hermanos!='' and $Hermanos!=0)
	{
  ?>
  <td><strong>Hermanos:</strong></td>
  <td colspan="5"></td>
</tr>
<tr>

<td colspan="7" align="center">
<table border="1" style=" border:#D6E3F3 solid 3PX;" width="90%">
    <tr>
    <td><strong>Nombres</strong></td>
    <td><strong>Apellidos</strong></td>
    <td><strong>Pais</strong></td>
    <td><strong>Telefono</strong></td>
    <td><strong>Celular</strong></td>
    <td><strong>Actividad</strong></td>
    <td><strong>Empresa</strong></td>
    <td><strong>Cargo</strong></td>
    </tr>
    <?php
	$Hermanos=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_familiar', 'Grid_Hermanos');//
		$HermanosS1=split("-", $Hermanos);
			for($i=0;$i<=20;$i++)
				{
					if($HermanosS1[$i]!='')
						{
							$HermanosDato=split("\|", $HermanosS1[$i]);
								$ColumnaHermanos.='<tr>'.
											'<td>'.$HermanosDato[1].'</td>'.
											'<td>'.$HermanosDato[2].'</td>'.
											'<td>'.$HermanosDato[3].'</td>'.
											'<td>'.$HermanosDato[4].'</td>'.
											'<td>'.$HermanosDato[5].'</td>'.
											'<td>'.$HermanosDato[6].'</td>'.
											'<td>'.$HermanosDato[7].'</td>'.
											'<td>'.$HermanosDato[8].'</td>'.
											'</tr>';
							
						}
					else
						{
						break;
						}
						
				}
			echo 	$ColumnaHermanos;	
	?>
	
	
    </table>
	<!-- fin grid 1-->





</td>
<? } ?>
</tr>
  <tr>
 <? ////////INICIO INFORMACION LABORAL-----------------------------------------------
  $Laboral=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_laboral', 'Grid_Laboral');
 if($Laboral!=''){
  ?> 
    <td style="font-size:16px; border-top:#808080 solid 3px;" align="center" colspan="7"><strong>INFORMACION LABORAL</strong></td>
    </tr>
  <tr>
    <td><strong>Historial Laboral</strong></td>
    
  </tr>
  <tr>
    <td colspan="7" align="center">
    <table border="1" style=" border:#D6E3F3 solid 3PX;" width="90%">
    <tr>
    <td><strong>Empresa</strong></td>
    <td><strong>Departamento</strong></td>
    <td><strong>Ciudad</strong></td>
    <td><strong>Direccion</strong></td>
    <td><strong>Razon Social</strong></td>
    <td><strong>Telefono</strong></td>
    <td><strong>Cargo</strong></td>
    <td><strong>A&ntilde;os</strong></td>
    <td><strong>Retiro</strong></td>
    </tr>
    <?php
	$Laboral=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_laboral', 'Grid_Laboral');//
	$Laboral=str_replace('||','_',$Laboral);
		
		$LaboralS=split("_", $Laboral);
			for($i=0;$i<=50;$i++)
				{
					if($LaboralS[$i]!='')
						{
							$LaboralDato=split("\|",$LaboralS[$i]);
							$ColumnaL.='<tr>'.
								'<td>'.$LaboralDato[1].'</td>'.
								'<td>'.$LaboralDato[2].'</td>'.
								'<td>'.$LaboralDato[3].'</td>'.
								'<td>'.$LaboralDato[4].'</td>'.
								'<td>'.$LaboralDato[5].'</td>'.
								'<td>'.$LaboralDato[6].'</td>'.
								'<td>'.$LaboralDato[8].'</td>'.
								'<td>'.$LaboralDato[9].'</td>'.
								'<td>'.$LaboralDato[10].'</td>'.
								'<tr>';
						}
					else{
						break;
						}	
				
				}
			echo 	$ColumnaL;
		
		
	?>
    
    
    </table>
     </td>
     <tr>
     <td><strong>Observaciones:</strong></td>
     <td colspan="6"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_laboral', 'Observaciones');?></td>     
     
    <?
 }//FIN INFORMACION LABORAL
	?> 
     </tr>
     <tr>
    <td style="font-size:16px; border-top:#808080 solid 3px;" align="center" colspan="7"><strong>INFORMACION FINANCIERA</strong></td>
    </tr>
    <tr>
    <td><strong>Tipo Ingreso</strong></td>
    <td colspan="2"></td>
    
    <td><strong>Tipo Egreso</strong></td>
    <td colspan="2"></td>
    </tr>
    <tr>
    <td><strong>Salario</strong></td>
    <td colspan="2"><? echo $Salario=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_finaciera', 'Salario');?></td>
    <td><strong>Egreso A</strong></td>
    <td colspan="2"><? echo $EgresoA=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_finaciera', 'EgresoA');?></td>
    </tr>
    <tr>
    <td><strong>Pension</strong></td>
    <td colspan="2"><? echo $Pension=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_finaciera', 'Pension');?></td>
    <td><strong>Egreso B</strong></td>
   <td colspan="2"><? echo $EgresoB=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_finaciera', 'EgresoB');?></td>
    </tr>
    <tr>
    <td><strong>Arriendos</strong></td>
    <td colspan="2"><? echo $Arriendos=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_finaciera', 'Arriendos');?></td>
    <td><strong>Egreso C</strong></td>
    <td colspan="2"><? echo $EgresoC=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_finaciera', 'EgresoC');?></td>
    </tr>
    <tr>
    <td><strong>Honorarios</strong></td>
    <td colspan="2"><? echo $Honorarios=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_finaciera', 'Honorarios');?></td>
    <td><strong>Egreso D</strong></td>
    <td colspan="2"><? echo $EgresoD=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_finaciera', 'EgresoD');?></td>
    </tr>
    <tr>
    <td><strong>Otros</strong></td>
    <td colspan="2"><? echo $Otros=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_finaciera', 'Otros');?></td>
    <td><strong>Egreso E</strong></td>
   <td colspan="2"><? echo $EgresoE=CualquierTabla($link, 'Creacion_Csc', $Csc, 'info_finaciera', 'EgresoE');?></td>
    </tr>
    <tr>
    <td><strong>Total</strong></td>
    <td colspan="2"><? echo $Total=$Salario+$Pension+$Arriendos+$Honorarios+$Otros;?></td>
    <td><strong>Total</strong></td>
    <td colspan="2"><? echo $TotalE=$EgresoA+$EgresoB+$EgresoC+$EgresoD+$EgresoE;?></td>
    </tr>
    <tr>
    <td style="font-size:16px; border-top:#808080 solid 3px;" align="center" colspan="7"><strong>CONCEPTO GENERAL</strong></td>
    </tr>
    <tr>
    <td><strong>AnÁlisis PSicÓlogico</strong></td>
    <td colspan="1"></td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
    <td><strong>Analisis:</strong></td>
    <td colspan="5"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'concepto', 'Analisis');?></td>
    </tr>
     <tr>
    <td><strong>Fuma:</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'concepto', 'Fuma');?></td>
    <td><strong>Es alerjico a:</strong></td>
    <td colspan="2"></td>
    </tr>
    <tr>
    <td><strong>Medicamentos:</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'concepto', 'Medicamentos');?></td>
    <td><strong>Alimentos:</strong></td>
    <td colspan="2"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'concepto', 'Alimentos');?></td>				
    </tr>
     <tr>
    
   
    </tr>
     <tr>
    <td colspan="2"><strong>Actitud frente al proceso:</strong></td>
    <td colspan="5"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'concepto', 'Actitud');?></td>
                                                                         <tr>
    <td><strong>Observaciones:</strong></td>
    <td colspan="5"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'concepto', 'ObActitud');?></td>
    </tr>
    <tr>
    <td><strong>Concepto final:</strong></td>
    <td colspan="5"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'concepto', 'Concepto');?></td>
    </tr>
    <tr>
    <td></td>
    <td><strong>Observaciones:</strong></td>
    <td colspan="4"><? echo CualquierTabla($link, 'Creacion_Csc', $Csc, 'concepto', 'ObConcepto');?></td>
    </tr>
</table>
</body>
</html>
<? 
//$NameFile=$Rs['Nombre_Completo'].".pdf";

//$OpenFile=fopen($NameFile, "w+");
//$WriteFile=fwrite($OpenFile, );


?>