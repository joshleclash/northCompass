<?php 
include("../../Conexion.php");
$js='';
$json='';
function fn_envioCorreos($link, $Estado,  $csc_creacion)
	{
		$header='<img src="http://www.northcompass.com.co/Aplicacion/Solicitud/Header.png">';
		$footer='<img src="http://www.northcompass.com.co/Aplicacion/Solicitud/Footer.png">';
		$SQL="SELECT t2.Mail, t1.Nombre_Completo, t1.T_Identificacion, t1.Num_Identificacion FROM creacion".
		" t1, login t2 WHERE t1.Login_Csc = t2.Csc_Login AND t1.Csc_Creacion =".$csc_creacion."";
			db('northcompas',$link);
				$Result=mysql_query($SQL); 	
					$Rs=mysql_fetch_array($Result);
			$Send.="La informacion de <STRONG>".$Rs['Nombre_Completo']."</STRONG><br/> Identificado con :".
				   "<STRONG>".$Rs['T_Identificacion']."</STRONG> Numero: <STRONG>".$Rs['Num_Identificacion']." </STRONG><br/>".
				   "El estado de el ID : ".$csc_creacion." a cambiado ahora esta en estado: ".$Estado."<br/>".
				   "Favor no responda este mensaje <br/><br/>Mensaje Generado Automaticamente<br/><br/><STRONG>NORTHCOMPAS</STRONG>";
				   
			$cabeceras = "Content-type: text/html\r\n";
			mail($Rs['Mail'], 'Cambio de Estado', $header."<br/><br/>".$Send."<br/><br/>".$footer, $cabeceras);
	}	
$Fecha_Creacion=date("Y")."-".date("m")."-".date("d");
$consulta=$_REQUEST['consulta'];
if ($consulta==0){/////////////////////////////////departamento
	$SQL="select * from  departamento order by DscDepartamento asc";
	mysql_select_db('northcompas',$link);
	$Con0=mysql_query($SQL);
	$i=0;
	
	while($row0=mysql_fetch_array($Con0)){
		$CscDepartamento=$row0['CscDepartamento'];
		$DscDepartamento=$row0['DscDepartamento'];
			if($i<>0)
			{
				$js.=",";
				$i++;
				$js=$js."{'csc':'".$CscDepartamento."','dsc':'".$DscDepartamento."'}";
			}
			else
			{
				$i++;
				$js=$js."{'csc':'".$CscDepartamento."','dsc':'".$DscDepartamento."'}";
			}
		}
	$json.="{root:[".$js;	
	$json.="]}";
	echo $json;
}else if ($consulta==1){///////////////////////////ciudad
$Cdepto=$_REQUEST['Cdepto'];
	
$SQL001="select * from   ciudad where CscDepartamento='".$Cdepto."' order by DscCiudad asc";
	mysql_select_db('northcompas',$link);
	$Con001=mysql_query($SQL001);
	$i=0;
	
	while($row001=mysql_fetch_array($Con001)){
		$CodCiudad=$row001['CodCiudad'];
		$DscCiudad=$row001['DscCiudad'];
			if($i<>0)
			{
				$js.=",";
				$i++;
				$js=$js."{'csc':'".$CodCiudad."','dsc':'".$DscCiudad."'}";
			}
			else
			{
				$i++;
				$js=$js."{'csc':'".$CodCiudad."','dsc':'".$DscCiudad."'}";
			}
		}
	$json.="{root:[".$js;	
	$json.="]}";
	echo $json;	
}else if ($consulta==2){////////////////////////////////////////tipo identificacion
$SQL002="select * from    tidentificacion order by DscIdentificacion asc";
	mysql_select_db('northcompas',$link);
	$Con002=mysql_query($SQL002);
	$i=0;
	
	while($row002=mysql_fetch_array($Con002)){
		$DscIdentificacion=$row002['DscIdentificacion'];
		$CscIdentificacion=$row002['CscIdentificacion'];
			if($i<>0)
			{
				$js.=",";
				$i++;
				$js=$js."{'csc':'".$CscIdentificacion."','dsc':'".$DscIdentificacion."'}";
			}
			else
			{
				$i++;
				$js=$js."{'csc':'".$CscIdentificacion."','dsc':'".$DscIdentificacion."'}";
			}
		}
	$json.="{root:[".$js;	
	$json.="]}";
	echo $json;	
}else if ($consulta==3){////////////////////////////////////////tipo identificacion
$Cciudad=$_REQUEST['Cciudad'];
$SQL002="select * from    tidentificacion order by DscIdentificacion asc";
	mysql_select_db('northcompas',$link);
	$Con002=mysql_query($SQL002);
	$i=0;
	
	while($row002=mysql_fetch_array($Con002)){
		$DscIdentificacion=$row002['DscIdentificacion'];
		$CscIdentificacion=$row002['CscIdentificacion'];
			if($i<>0)
			{
				$js.=",";
				$i++;
				$js=$js."{'csc':'".$CscIdentificacion."','dsc':'".$DscIdentificacion."'}";
			}
			else
			{
				$i++;
				$js=$js."{'csc':'".$CscIdentificacion."','dsc':'".$DscIdentificacion."'}";
			}
		}
	$json.="{root:[".$js;	
	$json.="]}";
	echo $json;	
}else if ($consulta==4){////////////////////////buscar por nombres
$query=$_REQUEST['query'];
$SQL004="SELECT * FROM creacion where Nombre_Completo like '%".$query."%'";
db('northcompas',$link);
$select=mysql_query($SQL004)or die ("Error En La Consulta");
$i=0;
	while($row=mysql_fetch_array($select))	
	{
	$Csc_Creacion=$row['Csc_Creacion'];
	$Nombre_Completo=$row['Nombre_Completo'];
	
	$Nombres=$row['Nombres'];
	$Apellidos=$row['Apellidos'];
	$T_Identificacion=$row['T_Identificacion'];
	$Num_Identificacion=$row['Num_Identificacion'];
	
	if ($i!=0)
		{
		$i++;
		$js.=",";
		$js.="{'count':'".$i."','Csc_Creacion':'".$Csc_Creacion."','Nombre_Completo':'".$Nombre_Completo."','Nombres':'".$Nombres."','Apellidos':'".$Apellidos."','T_Identificacion':'".$T_Identificacion."','Num_Identificacion':'".$Num_Identificacion."'}";
		}
	else
		{
		$i++;
		$js.="{'count':'".$i."','Csc_Creacion':'".$Csc_Creacion."','Nombre_Completo':'".$Nombre_Completo."','Nombres':'".$Nombres."','Apellidos':'".$Apellidos."','T_Identificacion':'".$T_Identificacion."','Num_Identificacion':'".$Num_Identificacion."'}";
		}	
	
	}	
	$json.="{totalCount:".$i.", topics:[";
	$json.=$js."]}";
	echo $json;

}else if ($consulta==5){//////////////////////buscar por identificacion
$query=$_REQUEST['query'];
$SQL004="SELECT * FROM creacion where Num_Identificacion like '%".$query."%'";
db('northcompas',$link);
$select=mysql_query($SQL004)or die ("Error En La Consulta");
$i=0;
	while($row=mysql_fetch_array($select))	
	{
	$Csc_Creacion=$row['Csc_Creacion'];
	$Nombre_Completo=$row['Nombre_Completo'];
	$Nombres=$row['Nombres'];
	$Apellidos=$row['Apellidos'];
	$T_Identificacion=$row['T_Identificacion'];
	$Num_Identificacion=$row['Num_Identificacion'];
	if (i!=0)
		{
		$i++;
		$js.=",";
		$js.="{'count':'".$i."','Csc_Creacion':'".$Csc_Creacion."','Nombre_Completo':'".$Nombre_Completo."','Nombres':'".$Nombres."','Apellidos':'".$Apellidos."','T_Identificacion':'".$T_Identificacion."','Num_Identificacion':'".$Num_Identificacion."'}";
		}
	else
		{
		$i++;
		$js.="{'count':'".$i."','Csc_Creacion':'".$Csc_Creacion."','Nombre_Completo':'".$Nombre_Completo."','Nombres':'".$Nombres."','Apellidos':'".$Apellidos."','T_Identificacion':'".$T_Identificacion."','Num_Identificacion':'".$Num_Identificacion."'}";
		}	
	
	}	
	$json.="{totalCount:".$i.", topics:[";
	$json.=$js."]}";
	echo $json;

}else if ($consulta==6){
	$Cciudad=$_REQUEST['Cciudad'];
$SQL006="select * from     instituciones_educativas order by Csc_Institucion asc";
	mysql_select_db('northcompas',$link);
	$Con006=mysql_query($SQL006);
	$i=0;
	$js=$js."{'csc':'00000','dsc':'OTRO'},";
	while($row006=mysql_fetch_array($Con006)){
		$Dsc_Institucion=$row006['Dsc_Institucion'];
		$Csc_Institucion=$row006['Csc_Institucion'];
			if($i<>0)
			{
				$js.=",";
				$i++;
				$js=$js."{'csc':'".$Csc_Institucion."','dsc':'".$Dsc_Institucion."'}";
			}
			else
			{
				$i++;
				$js=$js."{'csc':'".$Csc_Institucion."','dsc':'".$Dsc_Institucion."'}";
			}
		}
	$json.="{root:[".$js;	
	$json.="]}";
	echo $json;	
}else if ($consulta==7){
$CC=$_REQUEST['Id_C'];
$Csc=$_REQUEST['Csc'];
//Csc_Creacion/Nombres/Identificacion/Fecha_Solicitud/Empresa/Estado
 		$Sql="Select * from creacion where Num_Identificacion=".$CC."";
			db('northcompas',$link);
				$Result007=mysql_query($Sql);
				$i=0;
					while($Rs007=mysql_fetch_array($Result007))
						{
								$Csc_Creacion=$Rs007['Csc_Creacion'];
								$Nombre_Completo=$Rs007['Nombre_Completo'];
								$Num_Identificacion=$Rs007['Num_Identificacion'];
								$Fecha_Creacion=$Rs007['Fecha_Creacion'];
								$Empresa=$Rs007['Empresa'];
								$Departamento=$Rs007['Departamento'];
								$Ciudad=$Rs007['Ciudad'];
								if ($Departamento!='' and $Ciudad!='')
									{
										$SqlCiu="Select * from ciudad where 	CscCiudad=".$Ciudad." and CscDepartamento=".$Departamento."";
											db('northcompas',$link);
											$ResultCiud=mysql_query($SqlCiu);
											$RsCiu=mysql_fetch_array($ResultCiud);	
											$Ciudad=$RsCiu['DscCiudad'];
									}
								else
									{
										$Ciudad	="Sin Definir";
									}
									
								$Estado="Activo";
								$Empresa=$Rs007['Empresa'];
								if($Empresa!='')
									{
									$Tercero=Terceros($link, $Empresa);	
									$TerceroSplit=explode("-",$Tercero);
									$Tercero=$TerceroSplit[0];
									
									$Empresa1=Empresa($link, $TerceroSplit[1]);
									}
									
						if($i!=0)
							{
								$js.=",";
								$i++;
								$js.="{'csc':'".$i."','Csc_Creacion':'".$Csc_Creacion."','Nombres':'".$Nombre_Completo."','Identificacion':'".$Num_Identificacion."'".
								",'Fecha_Solicitud':'".$Fecha_Creacion."','Terceros':'".$Tercero."','Estado':'".$Estado."',Ciudad:'".$Ciudad."',".
								"'Empresa':'".$Empresa1."'}";
							}
						else
							{
								$i++;
								$js.="{'csc':'".$i."','Csc_Creacion':'".$Csc_Creacion."','Nombres':'".$Nombre_Completo."','Identificacion':'".$Num_Identificacion."'".
								",'Fecha_Solicitud':'".$Fecha_Creacion."','Terceros':'".$Tercero."','Estado':'".$Estado."',Ciudad:'".$Ciudad."',".
								"'Empresa':'".$Empresa1."'}";
							}	
						}
 			 echo "{totalCount:".$i.",topics:[".$js."]}";
}else if ($consulta==8){
		$tab=$_REQUEST['tab'];
		$Csc=$_REQUEST['Csc'];
		$Cedula=$_REQUEST['Id_C'];
		$Login=$_REQUEST['csc_Login'];
	if ($tab==1)
			{
				$Nacimiento=$_REQUEST['Nacimiento'];
				$NacimientoSplit=split("/",$Nacimiento);
				$Nacimiento=$NacimientoSplit[2]."/".$NacimientoSplit[1]."/".$NacimientoSplit[0];
				$Ciudad=$_REQUEST['hi_lst_ciudad'];
				$Telefono=$_REQUEST['txt_Telefono'];
				$Cel2=$_REQUEST['txt_Celular2'];
				$Rh=$_REQUEST['lst_gsanguineo'];
				$Departamento=$_REQUEST['hi_lst_departamento'];
				
				$Municipio=$_REQUEST['txt_Municipio'];
				$Cel1=$_REQUEST['txt_Celular1'];
				$Mail=$_REQUEST['txt_Mail'];
				$Observacion=$_REQUEST['Ob1'];
				$SqlSelect1="Select * from datos_basicos where  Creacion_Csc=".$Csc."";
				db('northcompas', $link);
					$Result1=mysql_query($SqlSelect1)or die("Error al consultar");
					//echo $Result1;
					$Rs1=mysql_fetch_array($Result1);//or die("Error al rs");
						$Csc_Datos=$Rs1['Csc_Datos'];
					if	($Csc_Datos=='')
							{
								fn_envioCorreos($link, 'VISITA', $Csc);
					$Sql008="Insert Into datos_basicos(Creacion_Csc, Usuario_Csc, Identificacion, Fecha_Nacimiento, Ciudad_Csc, Telefono, Celular1, Celular2,"
					."Grupo_Sanguineo, Departamento_Csc, Municipio, Mail, Observacion) Values ('".$Csc."','".$Login."','".$Cedula."','".$Nacimiento."','".$Ciudad."',".
					"'".$Telefono."','".$Cel1."','".$Cel2."','".$Rh."','".$Departamento."','".$Municipio."','".$Mail."','".$Observacion."')";
					db('northcompas', $link);
					mysql_query($Sql008)or die("{success:false}");
						//update estado 
							$UpdateEstado="update creacion set Estado='3' where Csc_Creacion='".$Csc."'"; 
								db('northcompas', $link);
								mysql_query($UpdateEstado);
						//fin update 
					echo "{success:true}";
						}
				else
						{
						fn_envioCorreos($link, 'VISITA', $Csc);	
							if($Rh=='' || $Departamento=='' ||  $Ciudad=='')
								{
					$SqlUp1="update datos_basicos set Fecha_Nacimiento='".$Nacimiento."', Telefono='".$Telefono."', Celular1='".$Cel1."',".
					"Celular2='".$Cel2."',  Municipio='".$Municipio."', Mail='".$Mail."',".
					" Observacion='".$Observacion."' where Csc_Datos='".$Csc_Datos."'";
					mysql_query($SqlUp1)or die("{success:false}");
					$UpdateEstado="update creacion set Estado='3', Fecha_Visita='".$Fecha_Creacion."' where Csc_Creacion='".$Csc."'"; 
								db('northcompas', $link);
								mysql_query($UpdateEstado);
					echo "{success:true}";
								}
							else{
					$SqlUp1="update datos_basicos set Fecha_Nacimiento='".$Nacimiento."', Ciudad_Csc='".$Ciudad."', Telefono='".$Telefono."', Celular1='".$Cel1."',".
					"Celular2='".$Cel2."', Grupo_Sanguineo='".$Rh."', Departamento_Csc='".$Departamento."', Municipio='".$Municipio."', Mail='".$Mail."',".
					" Observacion='".$Observacion."' where Csc_Datos='".$Csc_Datos."'";
					mysql_query($SqlUp1)or die("{success:false}");
					$UpdateEstado="update creacion set Estado='3', Fecha_Visita='".$Fecha_Creacion."' where Csc_Creacion='".$Csc."'"; 
								db('northcompas', $link);
								mysql_query($UpdateEstado);
					echo "{success:true}";
							}
						}
			}
	else if ($tab==2)
			{
			$txt_Direccion=$_REQUEST['txt_Direccion'];
			$txt_BarrioV=$_REQUEST['txt_BarrioV'];
			$hi_lst_ciudad2=$_REQUEST['hi_lst_ciudad2'];
			$hi_lst_estratoV=$_REQUEST['hi_lst_estratoV'];
			$hi_lst_departamento2=$_REQUEST['hi_lst_departamento2'];
			$Municipio_V=$_REQUEST['Municipio_V'];
			$hi_lst_inmuebleV=$_REQUEST['hi_lst_inmuebleV'];//casa o otro
			$hi_lst_tinmuebles=$_REQUEST['hi_lst_tinmuebles'];//arriendo y eso
			$Arrendador_V=$_REQUEST['Arrendador_V'];
			$Canon_V=$_REQUEST['Canon_V'];
			$Dueno_V=$_REQUEST['Dueno_V'];
			$Referencias_V=$_REQUEST['Referencias_V'];
			$Distribucion_V=$_REQUEST['Distribucion_V'];
			$Convivencia_V=$_REQUEST['Convivencia_V'];
			$Ob2=$_REQUEST['Ob2'];
			$SqlSelect2="Select * from vivienda  where Creacion_Csc='".$Csc."'";
			db('northcompas', $link);
			$Result2=mysql_query($SqlSelect2)or die("Query Error.".$SqlSelect2);
			$Rs2=mysql_fetch_array($Result2);
			$Csc_Vivienda=$Rs2['Csc_Vivienda'];
			if ($Csc_Vivienda=='')
			{
				fn_envioCorreos($link, 'REFERENCIACIÓN', $Csc);
			$Sqltab2="insert into  vivienda (Creacion_Csc, Usuario_Csc, Identificacion, Direccion, Ciudad_Csc, Barrio_Dsc, Estrato, Departamento_Csc, Municipio_Dsc,".
			" T_inmueble, Tipo_Inmueble, Arrendador, Canon, Nombre, Entorno, Distribucion, Caracteristicas, Georeferenciacion, Foto, Observaciones) VALUES ('".$Csc."',".
			"'".$Login."','".$Cedula."','".$txt_Direccion."','".$hi_lst_ciudad2."','".$txt_BarrioV."','".$hi_lst_estratoV."','".$hi_lst_departamento2."',".
			"'".$Municipio_V."','".$hi_lst_inmuebleV."','".$hi_lst_tinmuebles."','".$Arrendador_V."','".$Canon_V."','".$Dueno_V."','".$Referencias_V."',".
			"'".$Distribucion_V."','".$Convivencia_V."','Sin Definir','Sin Definir','".$Ob2."')";
			db('northcompas', $link);
			mysql_query($Sqltab2)or die("{success:false}");
			$UpdateEstado="update creacion set Estado='4', Fecha_Referenciacion='".$Fecha_Creacion."' where Csc_Creacion='".$Csc."'"; 
								db('northcompas', $link);
								mysql_query($UpdateEstado);
								echo "{success:true}";
			}
		else
			{
					fn_envioCorreos($link, 'REFERENCIACIÓN', $Csc);
					if ($hi_lst_departamento2=='' || $hi_lst_ciudad2=='' || $hi_lst_tinmuebles=='' || $hi_lst_inmuebleV=='' || $hi_lst_estratoV=='')
						{
						$SqlUp="update vivienda set Direccion='".$txt_Direccion."',  Barrio_Dsc='".$txt_BarrioV."',".
						" Municipio_Dsc='".$Municipio_V."',".
						" Arrendador='".$Arrendador_V."', Canon='".$Canon_V."',".
						" Nombre='".$Dueno_V."', Entorno='".$Referencias_V."', Distribucion='".$Distribucion_V."',	Caracteristicas='".$Convivencia_V."',".
						" Observaciones='".$Ob2."' where Csc_Vivienda='".$Csc_Vivienda."'";
						db('northcompas', $link);
						mysql_query($SqlUp)or die("{success:false}");
						$UpdateEstado="update creacion set Estado='4', Fecha_Referenciacion='".$Fecha_Creacion."' where Csc_Creacion='".$Csc."'"; 
								db('northcompas', $link);
								mysql_query($UpdateEstado);
						echo "{success:true}";
						}
					else
						{
						$SqlUp="update vivienda set Direccion='".$txt_Direccion."', Ciudad_Csc='".$hi_lst_ciudad2."', Barrio_Dsc='".$txt_BarrioV."',".
						" Estrato='".$hi_lst_estratoV."',	Departamento_Csc='".$hi_lst_departamento2."', Municipio_Dsc='".$Municipio_V."',".
						" T_inmueble='".$hi_lst_inmuebleV."', Tipo_Inmueble='".$hi_lst_tinmuebles."', Arrendador='".$Arrendador_V."', Canon='".$Canon_V."',".
						" Nombre='".$Dueno_V."', Entorno='".$Referencias_V."', Distribucion='".$Distribucion_V."',	Caracteristicas='".$Convivencia_V."',".
						" Observaciones='".$Ob2."' where Csc_Vivienda='".$Csc_Vivienda."'";
						db('northcompas', $link);
						mysql_query($SqlUp)or die("{success:false}");
						$UpdateEstado="update creacion set Estado='4', Fecha_Referenciacion='".$Fecha_Creacion."' where Csc_Creacion='".$Csc."'"; 
								db('northcompas', $link);
								mysql_query($UpdateEstado);
						echo "{success:true}";
						}
			}	
		}
		else if ($tab==3)	
		{
$num_licencia=$_REQUEST['num_licencia'];
$num_categoria=$_REQUEST['num_categoria'];
$hi_lst_licencia=$_REQUEST['hi_lst_licencia'];
$ObLicencia=$_REQUEST['ObLicencia'];
$ObRunt=$_REQUEST['ObRunt'];
$txt_vehiculo1=$_REQUEST['txt_vehiculo1'];
$txt_placas1=$_REQUEST['txt_placas1'];
$txt_vehiculo2=$_REQUEST['txt_vehiculo2'];
$txt_placas2=$_REQUEST['txt_placas2'];
$txt_vehiculo3=$_REQUEST['txt_vehiculo3'];
$txt_placas3=$_REQUEST['txt_placas3'];
$hi_lst_vehiculo=$_REQUEST['hi_lst_vehiculo'];
$ObVehiculo=$_REQUEST['ObVehiculo'];
$txt_moto1=$_REQUEST['txt_moto1'];
$num_moto1=$_REQUEST['num_moto1'];
$txt_moto2=$_REQUEST['txt_moto2'];
$num_moto2=$_REQUEST['num_moto2'];
$hi_lst_moto=$_REQUEST['hi_lst_moto'];
$ObMoto=$_REQUEST['ObMoto'];
$hi_lst_libreta=$_REQUEST['hi_lst_libreta'];
$hi_lst_conducta=$_REQUEST['hi_lst_conducta'];
$num_libreta=$_REQUEST['num_libreta'];
$num_distrito=$_REQUEST['num_distrito'];
$txt_salvo=$_REQUEST['txt_salvo'];
$hi_lst_salvo=$_REQUEST['hi_lst_salvo'];
$num_marca=$_REQUEST['num_marca'];
$num_calibre=$_REQUEST['num_calibre'];
$num_serial=$_REQUEST['num_serial'];
$txt_antecedentes=$_REQUEST['txt_antecedentes'];
$txt_vecindad=$_REQUEST['txt_vecindad'];
$txt_verificacicon=$_REQUEST['txt_verificacicon'];
$num_pasado=$_REQUEST['num_pasado'];
$date_pasado=$_REQUEST['date_pasado'];
$date_pasadoSplit=split("/",$date_pasado);
$date_pasado=$date_pasadoSplit[2]."/".$date_pasadoSplit[1]."/".$date_pasadoSplit[0];
$num_pasaporte=$_REQUEST['num_pasaporte'];
$date_pasaporte=$_REQUEST['date_pasaporte'];
$date_pasaporteSplit=split("/", $date_pasaporte);
$date_pasaporte=$date_pasaporteSplit[2]."/".$date_pasaporteSplit[1]."/".$date_pasaporteSplit[0];
$num_visa=$_REQUEST['num_visa'];
$date_visa=$_REQUEST['date_visa'];
$date_visaSplit=split("/",$date_visa);
$date_visa=$date_visaSplit[2]."/".$date_visaSplit[1]."/".$date_visaSplit[0];
$hi_lst_paisVisa=$_REQUEST['hi_lst_paisVisa'];
$txt_antecedentesJudiciales=$_REQUEST['Judiciales'];
$txt_datacredito=$_REQUEST['txt_datacredito'];
$txt_clinton=$_REQUEST['txt_clinton'];
$Ob3=$_REQUEST['Ob3'];
	$Sqltab3="Select * from  documentos where Creacion_Csc='".$Csc."'";
		db('northcompas', $link);
		$ResultTab3=mysql_query($Sqltab3)or die(mysql_error($Sqltab3).$Sqltab3);
			$RsTab3=mysql_fetch_array($ResultTab3);
			$Csc_Documentos=$RsTab3['Csc_Documentos'];
			if($Csc_Documentos=='')
				{
					$InserTab3=" Insert into documentos (Creacion_Csc, Usuario_Csc,	Identificacion,	Num_Licencia, Categoria, PendientesL, Observaciones,".
					           " RuntObservaciones,	Vehiculo1,	Placas1, Vehiculo2, Placas2, Vehiculo3, Placas3, PendientesV, ObservacionesV, Moto1, PlacaM1,".
							   " Moto2,	PlacaM2, PendienteM, ObservacionesM, LibretaCat, LibretaCod, Num_Libreta, Distrito, SalvoconductoA, TipoA, MarcaA,".
							   " CalibreA, SerieNum, ReporteD, CertificadoVecindad, CodPasado, NumPasado, VencePasado, Pasaporte, VencePasaporte, NumVisa,".
							   " VenceVisa,	Pais, Antecedentes,	Datacredito, Clinton, ObTab3) Values ('".$Csc."','".$Login."','".$Cedula."','".$num_licencia."',".
							   " '".$num_categoria."','".$hi_lst_licencia."','".$ObLicencia."','".$ObRunt."','".$txt_vehiculo1."','".$txt_placas1."',".
							   " '".$txt_vehiculo2."','".$txt_placas2."','".$txt_vehiculo3."','".$txt_placas3."','".$hi_lst_vehiculo."','".$ObVehiculo."',".
							   " '".$txt_moto1."','".$num_moto1."','".$txt_moto2."','".$num_moto2."','".$hi_lst_moto."','".$ObMoto."','".$hi_lst_libreta."',".
							   " '".$hi_lst_conducta."','".$num_libreta."','".$num_distrito."','".$txt_salvo."','".$hi_lst_salvo."','".$num_marca."',".
							   " '".$num_calibre."','".$num_serial."','".$txt_antecedentes."','".$txt_vecindad."','".$txt_verificacicon."', '".$num_pasado."',".
							   " '".$date_pasado."','".$num_pasaporte."','".$date_pasaporte."','".$num_visa."','".$date_visa."', '".$hi_lst_paisVisa."',".
							   " '".$txt_antecedentesJudiciales."','".$txt_datacredito."','".$txt_clinton."','".$Ob3."')";
							   //echo $InserTab3;
							   mysql_query($InserTab3)or die("{success:false}");
							   $UpdateEstado="update creacion set Estado='4', Fecha_Referenciacion='".$Fecha_Creacion."' where Csc_Creacion='".$Csc."'"; 
								db('northcompas', $link);
								mysql_query($UpdateEstado);
								echo "{success:true}";					
				}
			else
				{		
				if($hi_lst_licencia==''||$hi_lst_vehiculo==''|| $hi_lst_moto=='' || $hi_lst_conducta=='' || $hi_lst_libreta=='')
					{
					$UpdateTab3="Update documentos set Num_Licencia='".$num_licencia."', Categoria='".$num_categoria."', ".
					" Observaciones='".$ObLicencia."', RuntObservaciones='".$ObRunt."', Vehiculo1='".$txt_vehiculo1."', Placas1='".$txt_placas1."',".
					" Vehiculo2='".$txt_vehiculo2."', Placas2='".$txt_placas2."', Vehiculo3 ='".$txt_vehiculo3."',Placas3 ='".$txt_placas3."',".
					" ObservacionesV='".$ObVehiculo."', Moto1='".$txt_moto1."', PlacaM1='".$num_moto1."',".
					" Moto2='".$txt_moto2."', PlacaM2='".$num_moto2."',  ObservacionesM='".$ObMoto."',".
					" Num_Libreta='".$num_libreta."', Distrito='".$num_distrito."',".
					" SalvoconductoA='".$txt_salvo."', MarcaA='".$num_marca."',".
				    " CalibreA='".$num_calibre."', SerieNum='".$num_serial."', ReporteD='".$txt_antecedentes."', CertificadoVecindad='".$txt_vecindad."',".
					" CodPasado='".$txt_verificacicon."', NumPasado='".$num_pasado."',".
					" VencePasado='".$date_pasado."', Pasaporte='".$num_pasaporte."', VencePasaporte='".$date_pasaporte."', NumVisa='".$num_visa."',".
					" VenceVisa='".$date_visa."',".
					" Antecedentes='".$txt_antecedentesJudiciales."', Datacredito='".$txt_datacredito."', Clinton='".$txt_clinton."', ObTab3='".$Ob3."'".
					" where Csc_Documentos='".$Csc_Documentos."'";
					mysql_query($UpdateTab3)or die("{success:false}");					
				//	$UpdateEstado="update creacion set Estado='4', Fecha_Referenciacion='".$Fecha_Creacion."' where Csc_Creacion='".$Csc."'"; 
								db('northcompas', $link);
				//				mysql_query($UpdateEstado);
					echo "{success:true}";
					}
				else
					{
					$UpdateTab3="Update documentos set Num_Licencia='".$num_licencia."', Categoria='".$num_categoria."', PendientesL='".$hi_lst_licencia."',".
					" Observaciones='".$ObLicencia."', RuntObservaciones='".$ObRunt."', Vehiculo1='".$txt_vehiculo1."', Placas1='".$txt_placas1."',".
					" Vehiculo2='".$txt_vehiculo2."', Placas2='".$txt_placas2."', Vehiculo3 ='".$txt_vehiculo3."',Placas3 ='".$txt_placas3."',".
					" PendientesV='".$hi_lst_vehiculo."', ObservacionesV='".$ObVehiculo."', Moto1='".$txt_moto1."', PlacaM1='".$num_moto1."',".
					" Moto2='".$txt_moto2."', PlacaM2='".$num_moto2."', PendienteM='".$hi_lst_moto."', ObservacionesM='".$ObMoto."',".
					" LibretaCat='".$hi_lst_libreta."', LibretaCod='".$hi_lst_conducta."', Num_Libreta='".$num_libreta."', Distrito='".$num_distrito."',".
					" SalvoconductoA='".$txt_salvo."', TipoA='".$hi_lst_salvo."', MarcaA='".$num_marca."',".
				    " CalibreA='".$num_calibre."', SerieNum='".$num_serial."', ReporteD='".$txt_antecedentes."', CertificadoVecindad='".$txt_vecindad."',".
					" CodPasado='".$txt_verificacicon."', NumPasado='".$num_pasado."',".
					" VencePasado='".$date_pasado."', Pasaporte='".$num_pasaporte."', VencePasaporte='".$date_pasaporte."', NumVisa='".$num_visa."',".
					" VenceVisa='".$date_visa."',	Pais='".$hi_lst_paisVisa."',".
					" Antecedentes='".$txt_antecedentesJudiciales."', Datacredito='".$txt_datacredito."', Clinton='".$txt_clinton."', ObTab3='".$Ob3."'".
					" where Csc_Documentos='".$Csc_Documentos."'";
					mysql_query($UpdateTab3)or die("{success:false}");
					
					//	$UpdateEstado="update creacion set Estado='4', Fecha_Referenciacion='".$Fecha_Creacion."' where Csc_Creacion='".$Csc."'"; 
								db('northcompas', $link);
						//		mysql_query($UpdateEstado);
					echo "{success:true}";
						}
				}
		}else if ($tab==4){
			$Send_Grid1=$_REQUEST['Send_Grid1'];
			$Send_Grid2=$_REQUEST['Send_Grid2'];
			$send_Grid3=$_REQUEST['send_Grid3'];
			$doc_Falso=$_REQUEST['doc_Falso'];
			$doc_Adulterado=$_REQUEST['doc_Adulterado'];
			$Ob4=$_REQUEST['Ob4'];
			$SelectTab4="Select * from info_academica where Creacion_Csc='".$Csc."'";
				db('northcompas',$link);
				$ResulTab4=mysql_query($SelectTab4)or die("Error Al consultar Tab 4");
					$RsTab4=mysql_fetch_array($ResulTab4);
					$Csc_Academica=$RsTab4['Csc_Academica'];
				if($Csc_Academica=='')
					{
						$InserTab4="Insert into  info_academica (Creacion_Csc, Usuario_Csc, Identificacion, Grid1, Grid2, Grid3, DocFalso, DocAdult, ".
						"Observaciones, Fecha_Creacion) values ('".$Csc."','".$Login."','".$Cedula."','".$Send_Grid1."','".$Send_Grid2."','".$send_Grid3."',".
						"'".$doc_Falso."','".$doc_Adulterado."','".$Ob4."','".date("Y")."/".date("m")."/".date("d")."')";
						db('northcompas', $link);
						mysql_query($InserTab4)or die("Error Insert Tab 4");
					}
				else
					{
						$UpdateTab4="Update info_academica set Grid1='".$Send_Grid1."', Grid2='".$Send_Grid2."', Grid3='".$send_Grid3."', DocFalso='".$doc_Falso."'".
						", DocAdult='".$doc_Adulterado."', Observaciones='".$Ob4."', Fecha_Creacion='".date("Y")."/".date("m")."/".date("d")."' where ".
						" Csc_Academica=".$Csc_Academica."";
						db('northcompas', $link);
						mysql_query($UpdateTab4)or die("Error Update Tab4");
						echo "{success:true}";
						
					}	
		}else if ($tab==5){	
			//Creacion_Csc, Usuario_Csc,	Identificacion
//			hi_lst_estadocivil
			$txt_NombresTab5=$_REQUEST['txt_NombresTab5'];
			$txt_ApellidosTab5=$_REQUEST['txt_ApellidosTab5'];
			$txt_CargoTab5=$_REQUEST['txt_CargoTab5'];
			$txt_TelTab5=$_REQUEST['txt_TelTab5'];
			$txt_NombresATab5=$_REQUEST['txt_NombresATab5'];
			$txt_ApellidosATab5=$_REQUEST['txt_ApellidosATab5'];
			$txt_CargoATab5=$_REQUEST['txt_CargoATab5'];
			$txt_TelATab5=$_REQUEST['txt_TelATab5'];
			$Grid_Ref=$_REQUEST['Grid_Ref'];
			$hi_lst_estadocivil=$_REQUEST['lst_estadocivil'];
			$txt_NameConyuge=$_REQUEST['txt_NameConyuge'];
			$txt_ApellidosConyuge=$_REQUEST['txt_ApellidosConyuge'];
			$txt_TipoIdentificacionConyuge=$_REQUEST['txt_TipoIdentificacionConyuge'];
			$txt_NumeroIdentificacionConyuge=$_REQUEST['txt_NumeroIdentificacionConyuge'];
			$txt_TelConyuge=$_REQUEST['txt_TelConyuge'];
			$txt_CelConyuge=$_REQUEST['txt_CelConyuge'];
			$txt_MailConyuge=$_REQUEST['txt_MailConyuge'];
			$txt_EmpresaConyuge=$_REQUEST['txt_EmpresaConyuge'];
			$txt_TelTrabConyuge=$_REQUEST['txt_TelTrabConyuge'];
			$txt_actividadTraConyuge=$_REQUEST['txt_actividadTraConyuge'];
			$send_Hijos=$_REQUEST['send_Hijos'];//grid
			$txt_NombrePadre=$_REQUEST['txt_NombrePadre'];
			$txt_ApellidosPadre=$_REQUEST['txt_ApellidosPadre'];
			$hi_lst_PaisPadre=$_REQUEST['hi_lst_PaisPadre'];
			$hi_lst_deptoPadre=$_REQUEST['hi_lst_deptoPadre'];
			$hi_lst_ciudadPadre=$_REQUEST['hi_lst_ciudadPadre'];
			$txt_ResidenciaPadre=$_REQUEST['txt_ResidenciaPadre'];
			$txt_CelPadre=$_REQUEST['txt_CelPadre'];
			$hi_lst_actividadPadre=$_REQUEST['hi_lst_actividadPadre'];
			$empresa_Padre=$_REQUEST['empresa_Padre'];
			$cargo_Padre=$_REQUEST['cargo_Padre'];
			$Telempresa_Padre=$_REQUEST['Telempresa_Padre'];
			$nombre_Madre=$_REQUEST['nombre_Madre'];
			$name_Apellidos=$_REQUEST['name_Apellidos'];
			
			$hi_lst_PaiseMadre=$_REQUEST['hi_lst_PaiseMadre'];
			$hi_lst_deptoMadre=$_REQUEST['hi_lst_deptoMadre'];
			$hi_lst_ciudadMadre=$_REQUEST['hi_lst_ciudadMadre'];
			$tel_Madre=$_REQUEST['tel_Madre'];
			$cel_Madre=$_REQUEST['cel_Madre'];
			$hi_lst_acMadre=$_REQUEST['hi_lst_acMadre'];
			$emp_Madre=$_REQUEST['emp_Madre'];
			$cargo_Madre=$_REQUEST['cargo_Madre'];
			$telEmp_Madre=$_REQUEST['telEmp_Madre'];
			$send_Hermanos=$_REQUEST['send_Hermanos'];
			$Selecttab5="Select * from info_familiar where Creacion_Csc='".$Csc."'";
				db('northcompas',$link);
				$ResultTab5=mysql_query($Selecttab5);
					$RsTab5=mysql_fetch_array($ResultTab5);
						$Csc_Familiar=$RsTab5['Csc_Familiar'];
					if($Csc_Familiar=='')
						{
							$insetTab5="Insert into info_familiar (Creacion_Csc, Usuario_Csc, Identificacion, Nombres_Familiares, Apellidos_Familiares,".
							" Cargo_Familiares, Telefono_Familiares, Nombre_Amigo, Apellido_Amigo, Cargo_Amigo, Telefono_Amigo, Grid_Referencias, Estado_Civil,".
							" Nombre_Conyuge, Apellidos_Conyuge, Tipo_Identificacion, Numero_Identificacion, Telefono_Conyuge, Celular_Conyuge, Mail_Conyuge,".
							" Empresa_Conyuge, Tel_TrabajoConyu, Actividad_Conyuge, Grid_Hijos, Nombre_Padre, Apellido_Padre, Pais_P, Departamento_Csc, ".
							" Ciudad_Csc, Telefono_Padre, Celular_Padre, Actividad, Empresa_Padre, Cargo_Padre, Tel_TraPadre, Nombre_Madre, apellidos_Madre,".
							" Pais_M, Departamento_CscM, Ciudad_CscM, Tel_Madre, Cel_Madre, Actividad_M, Empresa_Madre, Cargo_Madre, Tel_TraMadre, Grid_Hermanos,".
							" Fecha_Creacion) VAlUES('".$Csc."','".$Login."','".$Cedula."','".$txt_NombresTab5."','".$txt_ApellidosTab5."',".
							"'".$txt_CargoTab5."','".$txt_TelTab5."','".$txt_NombresATab5."','".$txt_ApellidosATab5."','".$txt_CargoATab5."','".$txt_TelATab5."',".
							"'".$Grid_Ref."','".$hi_lst_estadocivil."','".$txt_NameConyuge."','".$txt_ApellidosConyuge."',".
							"'".$txt_TipoIdentificacionConyuge."','".$txt_NumeroIdentificacionConyuge."','".$txt_TelConyuge."',".
							"'".$txt_CelConyuge."','".$txt_MailConyuge."','".$txt_EmpresaConyuge."','".$txt_TelTrabConyuge."','".$txt_actividadTraConyuge."',".
							"'".$send_Hijos."','".$txt_NombrePadre."','".$txt_ApellidosPadre."','".$hi_lst_PaisPadre."','".$hi_lst_deptoPadre."',".
							"'".$hi_lst_ciudadPadre."','".$txt_ResidenciaPadre."','".$txt_CelPadre."','".$hi_lst_actividadPadre."',".
							"'".$empresa_Padre."','".$cargo_Padre."','".$Telempresa_Padre."','".$nombre_Madre."','".$name_Apellidos."','".$hi_lst_PaiseMadre."'".
							",'".$hi_lst_deptoMadre."','".$hi_lst_ciudadMadre."','".$tel_Madre."','".$cel_Madre."','".$hi_lst_acMadre."','".$emp_Madre."',".
							"'".$cargo_Madre."','".$telEmp_Madre."','".$send_Hermanos."','".$Fecha_Creacion."')";
							db('northcompas',$link);
							mysql_query($insetTab5)or die("{sucess:false}");
							echo "{success:true}";	
						}
					else
						{
							if($hi_lst_estadocivil=='' || $hi_lst_PaisPadre=='' || $hi_lst_deptoPadre=='' || $hi_lst_ciudadPadre=='')
							
								{
								$UpdateTab5="update info_familiar set Nombres_Familiares='".$txt_NombresTab5."', Apellidos_Familiares='".$txt_ApellidosTab5."',".
							" Cargo_Familiares='".$txt_CargoTab5."', Telefono_Familiares='".$txt_TelTab5."', Nombre_Amigo='".$txt_NombresATab5."',".
							" Apellido_Amigo='".$txt_ApellidosATab5."', Cargo_Amigo='".$txt_CargoATab5."', Telefono_Amigo='".$txt_TelATab5."',".
							" Grid_Referencias='".$Grid_Ref."', Nombre_Conyuge='".$txt_NameConyuge."', ".
							" Apellidos_Conyuge='".$txt_ApellidosConyuge."', Tipo_Identificacion='".$txt_TipoIdentificacionConyuge."',".
							" Numero_Identificacion='".$txt_NumeroIdentificacionConyuge."', Telefono_Conyuge='".$txt_TelConyuge."', ".
							" Celular_Conyuge='".$txt_CelConyuge."', Mail_Conyuge='".$txt_MailConyuge."', Empresa_Conyuge='".$txt_EmpresaConyuge."',".
							" Tel_TrabajoConyu='".$txt_TelTrabConyuge."', Actividad_Conyuge='".$txt_actividadTraConyuge."', Grid_Hijos='".$send_Hijos."', ".
							" Nombre_Padre='".$txt_NombrePadre."', Apellido_Padre='".$txt_ApellidosPadre."', ".
							" Telefono_Padre='".$txt_ResidenciaPadre."',".
							" Celular_Padre='".$txt_CelPadre."', Empresa_Padre='".$empresa_Padre."', ".
							" Cargo_Padre='".$cargo_Padre."', Tel_TraPadre='".$Telempresa_Padre."', Nombre_Madre='".$nombre_Madre."', ".
							" apellidos_Madre='".$name_Apellidos."',  ".
							" Tel_Madre='".$tel_Madre."', Cel_Madre='".$cel_Madre."', ".
							" Empresa_Madre='".$emp_Madre."', Cargo_Madre='".$cargo_Madre."', Tel_TraMadre='".$telEmp_Madre."', Grid_Hermanos='".$send_Hermanos."'".
							" where Csc_Familiar='".$Csc_Familiar."'";
							db('northcompas',$link);
							mysql_query($UpdateTab5)or die("{sucess:false}");
							echo "{success:true}";
								}
							else
								{
								$UpdateTab5="update info_familiar set Nombres_Familiares='".$txt_NombresTab5."', Apellidos_Familiares='".$txt_ApellidosTab5."',".
							" Cargo_Familiares='".$txt_CargoTab5."', Telefono_Familiares='".$txt_TelTab5."', Nombre_Amigo='".$txt_NombresATab5."',".
							" Apellido_Amigo='".$txt_ApellidosATab5."', Cargo_Amigo='".$txt_CargoATab5."', Telefono_Amigo='".$txt_TelATab5."',".
							" Grid_Referencias='".$Grid_Ref."', Estado_Civil='".$hi_lst_estadocivil."', Nombre_Conyuge='".$txt_NameConyuge."', ".
							" Apellidos_Conyuge='".$txt_ApellidosConyuge."', Tipo_Identificacion='".$txt_TipoIdentificacionConyuge."',".
							" Numero_Identificacion='".$txt_NumeroIdentificacionConyuge."', Telefono_Conyuge='".$txt_TelConyuge."', ".
							" Celular_Conyuge='".$txt_CelConyuge."', Mail_Conyuge='".$txt_MailConyuge."', Empresa_Conyuge='".$txt_EmpresaConyuge."',".
							" Tel_TrabajoConyu='".$txt_TelTrabConyug."', Actividad_Conyuge='".$txt_actividadTraConyuge."', Grid_Hijos='".$send_Hijos."', ".
							" Nombre_Padre='".$txt_NombrePadre."', Apellido_Padre='".$txt_ApellidosPadre."', Pais_P='".$hi_lst_PaisPadre."',".
							" Departamento_Csc='".$hi_lst_deptoPadre."', Ciudad_Csc='".$hi_lst_ciudadPadre."', Telefono_Padre='".$txt_ResidenciaPadre."',".
							" Celular_Padre='".$txt_CelPadre."', Actividad='".$hi_lst_actividadPadre."', Empresa_Padre='".$empresa_Padre."', ".
							" Cargo_Padre='".$cargo_Padre."', Tel_TraPadre='".$Telempresa_Padre."', Nombre_Madre='".$nombre_Madre."', ".
							" apellidos_Madre='".$name_Apellidos."', Pais_M='".$hi_lst_PaiseMadre."', Departamento_CscM='".$hi_lst_deptoMadre."',".
							" Ciudad_CscM='".$hi_lst_ciudadMadre."', Tel_Madre='".$tel_Madre."', Cel_Madre='".$cel_Madre."', Actividad_M='".$hi_lst_acMadre."',".
							" Empresa_Madre='".$emp_Madre."', Cargo_Madre='".$cargo_Madre."', Tel_TraMadre='".$telEmp_Madre."', Grid_Hermanos='".$send_Hermanos."'".
							" where Csc_Familiar='".$Csc_Familiar."'";
							db('northcompas',$link);
							mysql_query($UpdateTab5)or die("{sucess:false}");
							echo "{success:true}";	
								
								}
							
						}	
			}
		else if ($tab==6)
			{
		$obTab6=$_REQUEST['obTab6'];
		$Sendgrid_Laboral=$_REQUEST['Sendgrid_Laboral'];
			$selectTab6="Select * from info_laboral where Creacion_Csc='".$Csc."'";
				db('northcompas',$link);
					$ResultTab6=mysql_query($selectTab6);
						$RsTab6=mysql_fetch_array($ResultTab6);
							$Csc_Laboral=$RsTab6['Csc_Laboral'];
							if ($Csc_Laboral=='')
								{
								$InsertTab6="Insert into info_laboral(Creacion_Csc, Usuario_Csc, Identificacion, Observaciones, Grid_Laboral, Fecha_Creacion)".
										"Values ('".$Csc."','".$Login."','".$Cedula."','".$obTab6."','".$Sendgrid_Laboral."','".$Fecha_Creacion."')";
										db('northcompas',$link);
										mysql_query($InsertTab6)or die("{success:false}");
										echo 	"{success:true}";
								}
							else
								{
								$UpdateTab6="Update info_laboral set Observaciones='".$obTab6."', Grid_Laboral='".$Sendgrid_Laboral."' where ".
											"Csc_Laboral='".$Csc_Laboral."'";
											db('northcompas',$link);
											mysql_query($UpdateTab6)or die("{success:false}");
											echo 	"{success:true}";
								}
									
				
				
			}else if ($tab==7){
	$salario=$_REQUEST['salario'];
	$pension=$_REQUEST['pension'];
	$arriendos=$_REQUEST['arriendos'];
	$honorarios=$_REQUEST['honorarios'];
	$otros=$_REQUEST['otros'];
	$egresoa=$_REQUEST['egresoa'];
	$egresob=$_REQUEST['egresob'];
	$egresoc=$_REQUEST['egresoc'];
	$egresod=$_REQUEST['egresod'];
	$egresoe=$_REQUEST['egresoe'];
	$RetiroTab7=$_REQUEST['RetiroTab7'];
	$ObTab7=$_REQUEST['ObTab7'];
			$selectTab7="Select * from info_finaciera where Creacion_Csc='".$Csc."'";
				db('northcompas',$link);
					$ResultTab7=mysql_query($selectTab7)or die("{success:false}");
						$RsTab7=mysql_fetch_array($ResultTab7);
							$Csc_Finaciero=$RsTab7['Csc_Finaciero'];
							if ($Csc_Finaciero=='')
								{
									$InsertTab7="Insert into info_finaciera (Creacion_Csc, Usuario_Csc, Identificacion, Salario, Pension, Arriendos, Honorarios,".
									"Otros, EgresoA, EgresoB, EgresoC, EgresoD, EgresoE, RetiroTab7, ObservacionesTab7, Fecha_Creacion) Values ('".$Csc."',".
									"'".$Login."','".$Cedula."','".$salario."','".$pension."','".$arriendos."','".$honorarios."','".$otros."','".$egresoa."',".
									"'".$egresob."','".$egresoc."','".$egresod."','".$egresoe."','".$RetiroTab7."','".$ObTab7."','".$Fecha_Creacion."')";
									db('northcompas',$link);
										mysql_query($InsertTab7)or die("{success:false}");
										echo "{success:true}";
								}
							else
								{
									$UpdateTab7="Update info_finaciera set Salario='".$salario."', Pension='".$pension."', Arriendos='".$arriendos."',".
									" Honorarios='".$honorarios."', Otros='".$otros."', EgresoA='".$egresoa."', EgresoB='".$egresob."', EgresoC='".$egresoc."',".
									" EgresoD='".$egresod."', EgresoE='".$egresoe."', RetiroTab7='".$RetiroTab7."', ObservacionesTab7='".$ObTab7."'".
									" where Csc_Finaciero='".$Csc_Finaciero."'";
										db('northcompas',$link);
										mysql_query($UpdateTab7)or die("{success:false}");
									echo "{success:true}";
								}
			}else if ($tab==8){
			$ObUpload=$_REQUEST['ObUpload'];
			$SelectTab8="SELECT * FROM  Audiovisuales where Creacion_Csc = '".$Csc."'";
							db('northcompas',$link);
								$ResultTab8=mysql_query($SelectTab8)or die("Error al consultar tab 8");
									$RsTab8=mysql_fetch_array($ResultTab8);
									$Csc_Audiovisual=$RsTab8['Csc_Audiovisual'];
										if ($Csc_Audiovisual=='')
											{
												$InsertTab9="Insert into Audiovisuales (Creacion_Csc, Usuario_Csc, Observaciones) Values ('".$Csc."','".$Login."',".
												"'".$ObUpload."')";
													mysql_query($InsertTab9)or die("{success:false}");
													db('northcompas', $link);
													echo "{success:true}";
											}
										else
											{
												$UpdateTab9="update Audiovisuales set Observaciones='".$ObUpload."' where  Csc_Audiovisual='".$Csc_Audiovisual."'";
													mysql_query($UpdateTab9)or die("{success:false}");
													echo "{success:true}";
											}
			
				
				//echo "{success:true}";
			}else if ($tab==9){
				$hi_lst_fuma=$_REQUEST['hi_lst_fuma'];
				$Medicamentos=$_REQUEST['Medicamentos'];
				$Alimentos=$_REQUEST['Alimentos'];
				$Analisis=$_REQUEST['Analisis'];
				$hi_lst_actitud=$_REQUEST['hi_lst_actitud'];
				$ObActitud=$_REQUEST['ObActitud'];
				$hi_lst_concepto=$_REQUEST['hi_lst_concepto'];
				$ObConcepto=$_REQUEST['ObConcepto'];
						$SelectTab9="SELECT * FROM  concepto where Creacion_Csc = '".$Csc."'";
							db('northcompas',$link);
								$ResultTab9=mysql_query($SelectTab9)or die("Error al consultar tab 9");
									$RsTab9=mysql_fetch_array($ResultTab9);
									$Concepto_Csc=$RsTab9['Concepto_Csc'];
										if ($Concepto_Csc=='')
											{
												fn_envioCorreos($link, 'CONCEPTO FINAL', $Csc);
												$InsertTab9="Insert into concepto (Creacion_Csc, Usuario_Csc, Identificacion, Fuma, Medicamentos, Alimentos, Analisis,".												" Actitud, ObActitud, Concepto, ObConcepto, Fecha_Creacion) Values ('".$Csc."','".$Login."','".$Cedula."',".
												" '".$hi_lst_fuma."','".$Medicamentos."','".$Alimentos."','".$Analisis."','".$hi_lst_actitud."','".$ObActitud."',".
												" '".$hi_lst_concepto."','".$ObConcepto."','".$Fecha_Creacion."')";
													mysql_query($InsertTab9)or die("{success:false}");
													$UpdateEstado="update creacion set Estado='5', Fecha_Final='".$Fecha_Creacion."' where Csc_Creacion='".$Csc."'"; 
													db('northcompas', $link);
													mysql_query($UpdateEstado);
													echo "{success:true}";
											}
										else
											{
												fn_envioCorreos($link, 'CONCEPTO FINAL', $Csc);
												if ($hi_lst_fuma!='')
													{
											$UpdateTab9="update concepto set  Medicamentos='".$Medicamentos."', Alimentos='".$Alimentos."',".
												" Analisis='".$Analisis."', Fuma='".$hi_lst_fuma."'".
												"  where  Concepto_Csc='".$Concepto_Csc."'";
													mysql_query($UpdateTab9)or die("{success:false}");
													
													
													//echo "{success:true}";
													}
												if($hi_lst_actitud!='')
													{
											$UpdateTab9="update concepto set Fuma='".$hi_lst_fuma."', Medicamentos='".$Medicamentos."', Alimentos='".$Alimentos."',".
												" Analisis='".$Analisis."', Actitud='".$hi_lst_actitud."'".
												" where  Concepto_Csc='".$Concepto_Csc."'";
													mysql_query($UpdateTab9)or die("{success:false}");
													
													//echo "{success:true}";
													}
												if($ObActitud!=''){
											$UpdateTab9="update concepto set Fuma='".$hi_lst_fuma."', Medicamentos='".$Medicamentos."', Alimentos='".$Alimentos."',".
												" Analisis='".$Analisis."', ObActitud='".$ObActitud."' 	".
												" where  Concepto_Csc='".$Concepto_Csc."'";
													mysql_query($UpdateTab9)or die("{success:false}");
													}	
											if($ObConcepto!=''){
											$UpdateTab9="update concepto set Fuma='".$hi_lst_fuma."', Medicamentos='".$Medicamentos."', Alimentos='".$Alimentos."',".
												" Analisis='".$Analisis."', ObActitud='".$ObActitud."', 	".
												" ObConcepto='".$ObConcepto."' where  Concepto_Csc='".$Concepto_Csc."'";
													mysql_query($UpdateTab9)or die("{success:false}");
												}	
												if($hi_lst_concepto!='')
													{
											$UpdateTab9="update concepto set Fuma='".$hi_lst_fuma."', Medicamentos='".$Medicamentos."', Alimentos='".$Alimentos."',".
												" Analisis='".$Analisis."', ObActitud='".$ObActitud."', 	".
												" Concepto='".$hi_lst_concepto."' where  Concepto_Csc='".$Concepto_Csc."'";
													mysql_query($UpdateTab9)or die("{success:false}");
													
													//echo "{success:true}";
													}
													
													$UpdateEstado="update creacion set Estado='5', Fecha_Final='".$Fecha_Creacion."' where Csc_Creacion='".$Csc."'";
													db('northcompas', $link);
													mysql_query($UpdateEstado);
												echo "{success:true}";
												}
						
			}//fin tab 

}else if ($consulta==9){
	$SQL="select * from  pais order by Dsc_Pais asc";
	db('northcompas', $link);
	$Con0=mysql_query($SQL);
	$i=0;
	
	while($row0=mysql_fetch_array($Con0)){
		$Csc_Pais=trim($row0['Csc_Pais']);
		$Dsc_Pais=trim($row0['Dsc_Pais']);
			if($i<>0)
			{
				$js.=",";
				$i++;
				$js=$js."{'csc':'".$Csc_Pais."','dsc':'".$Dsc_Pais."'}";
			}
			else
			{
				$i++;
				$js=$js."{'csc':'".$Csc_Pais."','dsc':'".$Dsc_Pais."'}";
			}
		}
	$json.="{root:[".$js;	
	$json.="]}";
	echo $json;
	
}else if ($consulta==10){//tab datos basicos		
	$Csc=$_REQUEST['Csc'];
	db('northcompas', $link);
	$Sql10="Select * from  datos_basicos where Creacion_Csc='".$Csc."'";
		$Result010=mysql_query($Sql10);
			$Rs10=mysql_fetch_array($Result010);
				$Fecha_Nacimiento=$Rs10['Fecha_Nacimiento'];
				if ($Fecha_Nacimiento!='')
					{
					$splitFecha=split("-",$Fecha_Nacimiento);
					$Fecha_Nacimiento=$splitFecha[2]."/".$splitFecha[1]."/".$splitFecha[0];
					}
				else
					{
					$Fecha_Nacimiento='';
					}				
				$Ciudad_Csc=$Rs10['Ciudad_Csc'];
				$Telefono=$Rs10['Telefono'];
				$Celular1=$Rs10['Celular1'];
				$Celular2=$Rs10['Celular2'];
				$Grupo_Sanguineo=$Rs10['Grupo_Sanguineo'];
				$Departamento_Csc=$Rs10['Departamento_Csc'];
				$Municipio=$Rs10['Municipio'];
				$Mail=$Rs10['Mail'];	
				$Foto=$Rs10['Foto'];	
				$Observacion=$Rs10['Observacion'];
					if (is_numeric($Departamento_Csc) and is_numeric($Ciudad_Csc))
						{
							$ciudad=Ciudad($link, $Departamento_Csc, $Ciudad_Csc);
							$departamento=Departamento($link, $Departamento_Csc);
						}
					else{
							$ciudad=$Rs10['Ciudad_Csc'];
							$departamento=$Rs10['Departamento_Csc'];								
						}	
				$js.="{'Fecha_Nacimiento':'".$Fecha_Nacimiento."','Ciudad':'".$ciudad."','Telefono':'".$Telefono."','Celular1':'".$Celular1."',".
						"'Celular2':'".$Celular2."','Grupo_Sanguineo':'".$Grupo_Sanguineo."','Departamento':'".$departamento."','Municipio':'".$Municipio."',".
						"'Mail':'".$Mail."','Observacion':'".$Observacion."'}";
				$json="{totalCount: 1, topics:[".$js."]}";
				echo $json;
				
}else if ($consulta==11){//tab datos basicos							
	$Csc=$_REQUEST['Csc'];
	db('northcompas', $link);
	$Sql11="Select * from  vivienda where Creacion_Csc='".$Csc."'";
	$Result011=mysql_query($Sql11);
			$Rs11=mysql_fetch_array($Result011);
				$Direccion=$Rs11['Direccion'];
				$Ciudad_Csc=$Rs11['Ciudad_Csc'];
				$Departamento_Csc=$Rs11['Departamento_Csc'];
				$Barrio_Dsc=$Rs11['Barrio_Dsc'];
				$Estrato=$Rs11['Estrato'];
				$Departamento_Csc=$Rs11['Departamento_Csc'];
				$Municipio_Dsc=$Rs11['Municipio_Dsc'];
				$T_inmueble=$Rs11['T_inmueble'];
				$Tipo_Inmueble=$Rs11['Tipo_Inmueble'];
				$Arrendador=$Rs11['Arrendador'];	
				$Canon=$Rs11['Canon'];	
				$Nombre=$Rs11['Nombre'];
				$Entorno=$Rs11['Entorno'];
				$Arrendador=$Rs11['Arrendador'];
				$Canon=$Rs11['Canon'];	
				$Nombre=$Rs11['Nombre'];
				$Distribucion=$Rs11['Distribucion'];
				$Caracteristicas=$Rs11['Caracteristicas'];
				$Georeferenciacion=$Rs11['Georeferenciacion'];
				$Foto=$Rs11['Foto'];
				$Observaciones=$Rs11['Observaciones'];
					if (is_numeric($Departamento_Csc) and is_numeric($Ciudad_Csc))
						{
							$ciudad=Ciudad($link, $Departamento_Csc, $Ciudad_Csc);
							$departamento=Departamento($link, $Departamento_Csc);
						}
					else{
							$ciudad=$Rs11['Ciudad_Csc'];
							$departamento=$Rs11['Departamento_Csc'];								
						}
				$js.="{'Direccion':'".$Direccion."','Ciudad':'".$ciudad."','Barrio_Dsc':'".$Barrio_Dsc."','Estrato':'".$Estrato."',".
						"'Municipio_Dsc':'".$Municipio_Dsc."','T_inmueble':'".$T_inmueble."','Tipo_Inmueble':'".$Tipo_Inmueble."','Arrendador':'".$Arrendador."'".
						",'Canon':'".$Canon."','Nombre':'".$Nombre."','Distribucion':'".$Distribucion."',".
						"'Entorno':'".$Entorno."','Caracteristicas':'".$Caracteristicas."','Georeferenciacion':'".$Georeferenciacion."'".
						",'Foto':'".$Foto."','Departamento':'".$departamento."',".
						"'Observaciones':'".$Observaciones."'}";
				$json="{totalCount:1, topics:[".$js."]}";
				echo $json;
	}else if ($consulta==12){//tab datos basicos							
	$Csc=$_REQUEST['Csc'];	
	db('northcompas', $link);
	$Sql12="Select * from  documentos where Creacion_Csc='".$Csc."'";
	$Result012=mysql_query($Sql12);
			$Rs12=mysql_fetch_array($Result012);	
				$Num_Licencia=$Rs12['Num_Licencia'];
				$Categoria=$Rs12['Categoria'];
				$PendientesL=$Rs12['PendientesL'];
				$Observaciones=$Rs12['Observaciones'];
				$RuntObservaciones=$Rs12['RuntObservaciones'];
				$Vehiculo1=$Rs12['Vehiculo1'];
				$Placas1=$Rs12['Placas1'];
				$Vehiculo2=$Rs12['Vehiculo2'];
				$Placas2=$Rs12['Placas2'];
				$Vehiculo3=$Rs12['Vehiculo3'];
				$Placas3=$Rs12['Placas3'];
				$PendientesV=$Rs12['PendientesV'];
				$ObservacionesV=$Rs12['ObservacionesV'];
				$Moto1=$Rs12['Moto1'];
				$PlacaM1=$Rs12['PlacaM1'];
				$Moto2=$Rs12['Moto2'];
				$PlacaM2=$Rs12['PlacaM2'];
				$PendienteM=$Rs12['PendienteM'];
				$ObservacionesM=$Rs12['ObservacionesM'];
				$LibretaCat=$Rs12['LibretaCat'];
				$LibretaCod=$Rs12['LibretaCod'];
				$Num_Libreta=$Rs12['Num_Libreta'];
				$Distrito=$Rs12['Distrito'];
				$SalvoconductoA=$Rs12['SalvoconductoA'];
				$TipoA=$Rs12['TipoA'];
				$MarcaA=$Rs12['MarcaA'];
				$CalibreA=$Rs12['CalibreA'];
				$SerieNum=$Rs12['SerieNum'];
				$ReporteD=$Rs12['ReporteD'];
				$CertificadoVecindad=$Rs12['CertificadoVecindad'];
				$CodPasado=$Rs12['CodPasado'];
				$NumPasado=$Rs12['NumPasado'];
				$VencePasado=$Rs12['VencePasado'];
				$Pasaporte=$Rs12['Pasaporte'];
				$VencePasaporte=$Rs12['VencePasaporte'];
				if($VencePasaporte=='' || $VencePasaporte=='0000-00-00')
					{
					$VencePasaporte='0000-00-00';
					}
				if($VencePasado=='' || $VencePasado=='0000-00-00')
					{
					$VencePasado='0000-00-00';
					}	
					
				$NumVisa=$Rs12['NumVisa'];
				$VenceVisa=$Rs12['VenceVisa'];
				if($VenceVisa=='' || $VenceVisa=='0000-00-00')
					{
						$VenceVisa='0000-00-00';
					}
				$Pais=$Rs12['Pais'];
				$Antecedentes=$Rs12['Antecedentes'];
				$Datacredito=$Rs12['Datacredito'];
				$Clinton=$Rs12['Clinton'];
				$ObTab3=$Rs12['ObTab3'];
				if($Pais!='')
					{
						$sqlPais="select * from pais where Csc_Pais='".$Pais."'";	
							db('northcompas', $link);
								$ResultPais=mysql_query($sqlPais);
									$RsPais=mysql_fetch_array($ResultPais);
									$Pais=$RsPais['Dsc_Pais'];
					}
				
				
				$js="{'Num_Licencia':'".$Num_Licencia."','Categoria':'".$Categoria."','PendientesL':'".$PendientesL."','Observaciones':'".$Observaciones."'".
				",'RuntObservaciones':'".$RuntObservaciones."','Vehiculo1':'".$Vehiculo1."','Placas1':'".$Placas1."','Vehiculo2':'".$Vehiculo2."',".
				"'Placas2':'".$Placas2."','Vehiculo3':'".$Vehiculo3."','Placas3':'".$Placas3."','PendientesV':'".$PendientesV."',".
				"'ObservacionesV':'".$ObservacionesV."','Moto1':'".$Moto1."','PlacaM1':'".$PlacaM1."','Moto2':'".$Moto2."','PlacaM2':'".$PlacaM2."',".
				"'PendienteM':'".$PendienteM."','ObservacionesM':'".$ObservacionesM."','LibretaCat':'".$LibretaCat."','LibretaCod':'".$LibretaCod."',".
				"'Num_Libreta':'".$Num_Libreta."','Distrito':'".$Distrito."','SalvoconductoA':'".$SalvoconductoA."','TipoA':'".$TipoA."','MarcaA':'".$MarcaA."',".
				"'CalibreA':'".$CalibreA."','SerieNum':'".$SerieNum."','ReporteD':'".$ReporteD."','CertificadoVecindad':'".$CertificadoVecindad."',".
				"'CodPasado':'".$CodPasado."','NumPasado':'".$NumPasado."','VencePasado':'".$VencePasado."','Pasaporte':'".$Pasaporte."',".
				"'VencePasaporte':'".$VencePasaporte."','NumVisa':'".$NumVisa."','VenceVisa':'".$VenceVisa."','Pais':'".$Pais."',".
				"'Antecedentes':'".$Antecedentes."','Datacredito':'".$Datacredito."','Clinton':'".$Clinton."','ObTab3':'".$ObTab3."'}";
			echo $json="{totalCount:1, topics:[".$js."]}";
}else if ($consulta==13){//tab datos basicos							
	$Csc=$_REQUEST['Csc'];	
	db('northcompas', $link);
	$Sql13="Select * from   info_academica where Creacion_Csc='".$Csc."'";
	$Result013=mysql_query($Sql13);
			$Rs13=mysql_fetch_array($Result013);
			$Grid1=$Rs13['Grid1'];
			$Grid2=$Rs13['Grid2'];
			$Grid3=$Rs13['Grid3'];
			$DocFalso=$Rs13['DocFalso'];
			$DocAdult=$Rs13['DocAdult'];
			$Observaciones=$Rs13['Observaciones'];
			$Fecha_Creacion=$Rs13['Fecha_Creacion'];
			$js="{'Grid1':'".$Grid1."','Grid2':'".$Grid2."','Grid3':'".$Grid3."','DocFalso':'".$DocFalso."','DocAdult':'".$DocAdult."'".
			",'Observaciones':'".$Observaciones."','Fecha_Creacion':'".$Fecha_Creacion."'}";				
	echo $json="{totalCount:1, topics:[".$js."]}";	
}else if ($consulta==14){//tab datos basicos
	$Csc=$_REQUEST['Csc'];	
	
	
			$SqlCount="Select count(*)as cantidad from   info_familiar where Creacion_Csc='".$Csc."'";
					db('northcompas', $link);
					$ResultCount=mysql_query($SqlCount);
					$RsCount=mysql_fetch_array($ResultCount);
					$cantidad=$RsCount['cantidad'];
				if ($cantidad == 1){
			$Sql14="Select * from   info_familiar where Creacion_Csc='".$Csc."'";
			db('northcompas', $link);
			$Result14=mysql_query($Sql14);
			$Rs14=mysql_fetch_array($Result14);
			$Nombres_Familiares=$Rs14['Nombres_Familiares'];
			$Apellidos_Familiares=$Rs14['Apellidos_Familiares'];
			$Cargo_Familiares=$Rs14['Cargo_Familiares'];
			$Telefono_Familiares=$Rs14['Telefono_Familiares'];
			$Nombre_Amigo=$Rs14['Nombre_Amigo'];
			$Apellido_Amigo=$Rs14['Apellido_Amigo'];
			$Cargo_Amigo=$Rs14['Cargo_Amigo'];
			$Telefono_Amigo=$Rs14['Telefono_Amigo'];
			$Grid_Referencias=$Rs14['Grid_Referencias'];
			$Estado_Civil=$Rs14['Estado_Civil'];
				if($Estado_Civil=='')
					{
						$Estado_Civil='Casado';
					}
			$Nombre_Conyuge=$Rs14['Nombre_Conyuge'];
			$Apellidos_Conyuge=$Rs14['Apellidos_Conyuge'];
			$Tipo_Identificacion=$Rs14['Tipo_Identificacion'];
			$Numero_Identificacion=$Rs14['Numero_Identificacion'];
			$Telefono_Conyuge=$Rs14['Telefono_Conyuge'];
			$Celular_Conyuge=$Rs14['Celular_Conyuge'];
			$Mail_Conyuge=$Rs14['Mail_Conyuge'];
			$Empresa_Conyuge=$Rs14['Empresa_Conyuge'];
			$Tel_TrabajoConyu=$Rs14['Tel_TrabajoConyu'];
			$Actividad_Conyuge=$Rs14['Actividad_Conyuge'];
			$Grid_Hijos=$Rs14['Grid_Hijos'];
			$Nombre_Padre=$Rs14['Nombre_Padre'];
			$Apellido_Padre=$Rs14['Apellido_Padre'];
			$Pais_P=$Rs14['Pais_P'];
			if (is_numeric($Pais_P)!='')
				{
					$Pais_P=Pais($link, $Pais_P);				
				}
			$Departamento_Csc=$Rs14['Departamento_Csc'];
			$Ciudad_Csc=$Rs14['Ciudad_Csc'];
			if(	is_numeric($Departamento_Csc)!='' && is_numeric($Ciudad_Csc)!='')
							{
								$Ciudad_Csc=Ciudad($link, $Departamento_Csc, $Ciudad_Csc);
								$Departamento_Csc=Departamento($link, $Departamento_Csc);
							}
			$Telefono_Padre=$Rs14['Telefono_Padre'];
			$Celular_Padre=$Rs14['Celular_Padre'];
			$Actividad=$Rs14['Actividad'];
			$Empresa_Padre=$Rs14['Empresa_Padre'];
			$Cargo_Padre=$Rs14['Cargo_Padre'];
			$Tel_TraPadre=$Rs14['Tel_TraPadre'];
			$Nombre_Madre=$Rs14['Nombre_Madre'];
			$apellidos_Madre=$Rs14['apellidos_Madre'];
			$Pais_M=$Rs14['Pais_M'];
			if (is_numeric($Pais_M)!='')
				{
					$Pais_M=Pais($link, $Pais_M);				
				}
			$Departamento_CscM=$Rs14['Departamento_CscM'];
			$Ciudad_CscM=$Rs14['Ciudad_CscM'];
			if(	is_numeric($Departamento_CscM)!='' && is_numeric($Ciudad_CscM)!='')
							{
								$Ciudad_CscM=Ciudad($link, $Departamento_CscM, $Ciudad_CscM);
								$Departamento_CscM=Departamento($link, $Departamento_CscM);
							}
			$Tel_Madre=$Rs14['Tel_Madre'];
			$Cel_Madre=$Rs14['Cel_Madre'];
			$Actividad_M=$Rs14['Actividad_M'];
			$Empresa_Madre=$Rs14['Empresa_Madre'];
			$Cargo_Madre=$Rs14['Cargo_Madre'];
			$Tel_TraMadre=$Rs14['Tel_TraMadre'];
			$Grid_Hermanos=$Rs14['Grid_Hermanos'];
			$Fecha_Creacion=$Rs14['Fecha_Creacion'];
			$js="{'Nombres_Familiares':'".$Nombres_Familiares."','Apellidos_Familiares':'".$Apellidos_Familiares."','Cargo_Familiares':'".$Cargo_Familiares."',".
			"'Telefono_Familiares':'".$Telefono_Familiares."','Nombre_Amigo':'".$Nombre_Amigo."','Apellido_Amigo':'".$Apellido_Amigo."',".
			"'Cargo_Amigo':'".$Cargo_Amigo."','Telefono_Amigo':'".$Telefono_Amigo."','Grid_Referencias':'".$Grid_Referencias."','Estado_Civil':'".$Estado_Civil."',".
			"'Nombre_Conyuge':'".$Nombre_Conyuge."','Apellidos_Conyuge':'".$Apellidos_Conyuge."','Tipo_Identificacion':'".$Tipo_Identificacion."',".
			"'Numero_Identificacion':'".$Numero_Identificacion."','Telefono_Conyuge':'".$Telefono_Conyuge."','Celular_Conyuge':'".$Celular_Conyuge."',".
			"'Mail_Conyuge':'".$Mail_Conyuge."','Empresa_Conyuge':'".$Empresa_Conyuge."','Tel_TrabajoConyu':'".$Tel_TrabajoConyu."',".
			"'Actividad_Conyuge':'".$Actividad_Conyuge."','Grid_Hijos':'".$Grid_Hijos."','Nombre_Padre':'".$Nombre_Padre."','Apellido_Padre':'".$Apellido_Padre."',".
			"'Pais_P':'".$Pais_P."','Departamento_Csc':'".$Departamento_Csc."','Ciudad_Csc':'".$Ciudad_Csc."','Telefono_Padre':'".$Telefono_Padre."',".
			"'Celular_Padre':'".$Celular_Padre."','Actividad':'".$Actividad."','Empresa_Padre':'".$Empresa_Padre."','Cargo_Padre':'".$Cargo_Padre."',".
			"'Tel_TraPadre':'".$Tel_TraPadre."','Nombre_Madre':'".$Nombre_Madre."','apellidos_Madre':'".$apellidos_Madre."','Pais_M':'".$Pais_M."',".
			"'Departamento_CscM':'".$Departamento_CscM."','Ciudad_CscM':'".$Ciudad_CscM."','Tel_Madre':'".$Tel_Madre."','Cel_Madre':'".$Cel_Madre."',".
			"'Actividad_M':'".$Actividad_M."','Empresa_Madre':'".$Empresa_Madre."','Cargo_Madre':'".$Cargo_Madre."','Tel_TraMadre':'".$Tel_TraMadre."'".
			",'Grid_Hermanos':'".$Grid_Hermanos."'}";				
			
			echo $json="{totalCount:1, topics:[".$js."]}";						
		}
	//Nombres_Familiares	Apellidos_Familiares	Cargo_Familiares	Telefono_Familiares	Nombre_Amigo	Apellido_Amigo	Cargo_Amigo	Telefono_Amigo	Grid_Referencias	Estado_Civil	Nombre_Conyuge	Apellidos_Conyuge	Tipo_Identificacion	Numero_Identificacion	Telefono_Conyuge	Celular_Conyuge	Mail_Conyuge	Empresa_Conyuge	Tel_TrabajoConyu	Actividad_Conyuge	Grid_Hijos	Nombre_Padre	Apellido_Padre	Pais_P	Departamento_Csc	Ciudad_Csc	Telefono_Padre	Celular_Padre	Actividad	Empresa_Padre	Cargo_Padre	Tel_TraPadre	Nombre_Madre	apellidos_Madre	Pais_M	Departamento_CscM	Ciudad_CscM	Tel_Madre	Cel_Madre	Actividad_M	Empresa_Madre	Cargo_Madre	Tel_TraMadre	Grid_Hermanos	Fecha_Creacion


				
}else if ($consulta==15){//tab datos basicos	
	$Csc=$_REQUEST['Csc'];	
	db('northcompas', $link);
	$Sql15="Select * from   info_laboral where Creacion_Csc='".$Csc."'";
	$Result015=mysql_query($Sql15);
			$Rs15=mysql_fetch_array($Result015);//Observaciones	Grid_Laboral	Fecha_Creacion
			$Observaciones=$Rs15['Observaciones'];
			$Grid_Laboral=$Rs15['Grid_Laboral'];
			$Fecha_Creacion=$Rs15['Fecha_Creacion'];
			$js="{'Observaciones':'".$Observaciones."','Grid_Laboral':'".$Grid_Laboral."'}";				
	echo $json="{totalCount:1, topics:[".$js."]}";	


}else if ($consulta==16){//tabla de informacion Financiera
	$Csc=$_REQUEST['Csc'];	
	db('northcompas', $link);
	$Sql16="SELECT SUM( Salario + Pension + Arriendos + Honorarios + Otros ) AS  'TotalIngreso', t1 . * , SUM( EgresoA + EgresoB + EgresoC + EgresoD + EgresoE )".
	" AS  'TotalEgreso' FROM info_finaciera t1 WHERE Creacion_Csc =  '".$Csc."'";
	$Result016=mysql_query($Sql16);
			$Rs16=mysql_fetch_array($Result016);//Salario	Pension	Arriendos	Honorarios	Otros	EgresoA	EgresoB	EgresoC	EgresoD	EgresoE	RetiroTab7	ObservacionesTab7
			$Salario=$Rs16['Salario'];
			$Pension=$Rs16['Pension'];
			$Arriendos=$Rs16['Arriendos'];
			$Honorarios=$Rs16['Honorarios'];
			$Otros=$Rs16['Otros'];
			$EgresoA=$Rs16['EgresoA'];
			$EgresoB=$Rs16['EgresoB'];
			$EgresoC=$Rs16['EgresoC'];
			$EgresoD=$Rs16['EgresoD'];
			$EgresoE=$Rs16['EgresoE'];
			$TotalIngreso=$Rs16['TotalIngreso'];
			$TotalEgreso=$Rs16['TotalEgreso'];
			$RetiroTab7=$Rs16['RetiroTab7'];
			$ObservacionesTab7=$Rs16['ObservacionesTab7'];
			$js="{'Salario':'".$Salario."','Pension':'".$Pension."','Arriendos':'".$Arriendos."','Honorarios':'".$Honorarios."','Otros':'".$Otros."'".
			",'EgresoA':'".$EgresoA."','EgresoB':'".$EgresoB."','EgresoC':'".$EgresoC."','EgresoD':'".$EgresoD."','EgresoE':'".$EgresoE."',".
			"'RetiroTab7':'".$RetiroTab7."','ObservacionesTab7':'".$ObservacionesTab7."','TotalIngreso':'".$TotalIngreso."','TotalEgreso':'".$TotalEgreso."'}";				
	echo $json="{totalCount:1, topics:[".$js."]}";	
}else if ($consulta==17){
	$Csc=$_REQUEST['Csc'];	
	db('northcompas', $link);
	$Sql17="SELECT * FROM Audiovisuales WHERE Creacion_Csc =  '".$Csc."'";
			$Result17=mysql_query($Sql17)or die("{success:false}");
				$Rs17=mysql_fetch_array($Result17);
					$Observaciones=$Rs17['Observaciones'];
					$js="{'Observaciones':'".$Observaciones."'}";				
	echo $json="{totalCount:1, topics:[".$js."]}";
			
}else if ($consulta==18){	
	$Csc=$_REQUEST['Csc'];	
	db('northcompas', $link);
	$Sql18="SELECT * FROM concepto t1 WHERE Creacion_Csc =  '".$Csc."'";
	$Result018=mysql_query($Sql18);
			$Rs18=mysql_fetch_array($Result018);//Fuma	Medicamentos	Alimentos	Analisis	Actitud	ObActitud	Concepto	ObConcepto
			$Fuma=$Rs18['Fuma'];
			$Medicamentos=$Rs18['Medicamentos'];
			$Alimentos=$Rs18['Alimentos'];
			$Analisis=$Rs18['Analisis'];
			$Actitud=$Rs18['Actitud'];
			$ObActitud=$Rs18['ObActitud'];
			$Concepto=$Rs18['Concepto'];
			$ObConcepto=$Rs18['ObConcepto'];
			$js="{'Fuma':'".$Fuma."','Medicamentos':'".$Medicamentos."','Actitud':'".$Actitud."','Alimentos':'".$Alimentos."','Analisis':'".$Analisis."'".
			",'ObActitud':'".$ObActitud."','Concepto':'".$Concepto."','ObConcepto':'".$ObConcepto."'}";				
	echo $json="{totalCount:1, topics:[".$js."]}";	

}else if ($consulta==19){	
$SqlTest="Select * from datos_basicos where Creacion_Csc='".$_REQUEST['Csc']."'";
	db('northcompas', $link);
		$ReTest=mysql_query($SqlTest);
			$RsTest=mysql_fetch_array($ReTest);
				if($RsTest['Creacion_Csc']==''){
 $SQL19="Select * from creacion where Csc_Creacion='".$_REQUEST['Csc']."'";
 	db('northcompas',$link);
		$Re19=mysql_query($SQL19);
		$i=0;
			while($Rs19=mysql_fetch_array($Re19))
				{
					$Tel_Fijo=$Rs19['Tel_Fijo'];
					$Tel_Celular=$Rs19['Tel_Celular'];
					$Tel_Celular2=$Rs19['Tel_Celular2'];
				if($i!=0)
					{
					$js.=",";
					$i++;
					$js.="{'cont':'".$i."','Tel_Fijo':'".$Tel_Fijo."','Tel_Celular':'".$Tel_Celular."','Tel_Celular2':'".$Tel_Celular2."'}";
					}
				else
					{
					$i++;
					$js.="{'cont':'".$i."','Tel_Fijo':'".$Tel_Fijo."','Tel_Celular':'".$Tel_Celular."','Tel_Celular2':'".$Tel_Celular2."'}";
					}	
				}
			
 echo $json="{totalCount:1, topics:[".$js."]}";	
 }
}
?>