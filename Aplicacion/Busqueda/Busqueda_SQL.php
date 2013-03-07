<?php
include("Conexion.php");
$consulta=$_REQUEST['consulta'];
	db('northcompas',$link);
if ($consulta==0)
			{
			$Query=$_REQUEST['query'];
				$SQL="select * from creacion where Nombre_Completo like '%".$Query."%'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombre_Completo=$Rs['Nombre_Completo'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Nombre_Completo."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Nombre_Completo."'}";
								}	

						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;		
			}

else if ($consulta==1)
			{
$Radio=$_REQUEST['Radio'];
$chk=$_REQUEST['chk'];
$Otros='<img src="../../Images/Iconos/application_cascade.png"/>';
	 if ($chk=='false')
	 	{
		if ($Radio==1)
				{
				$Buscar=$_REQUEST['Buscar'];
				$SplitBuscar=split("/",$Buscar);
				$Buscar=$SplitBuscar[2]."-".$SplitBuscar[1]."-".$SplitBuscar[0];				
					$SQL="select * from creacion where Fecha_Creacion like '%".$Buscar."%'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}	

						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;		
				
				}else if ($Radio==2)
				{
				$Buscar=$_REQUEST['Buscar'];
								
					$SQL="select * from creacion where Nombre_Completo like '%".$Buscar."%'".
					"union ".
					"select t1.* from creacion t1, info_familiar t2 where t2.Nombres_Familiares	 like '%".$Buscar."%'".
					"union ".
					"select t1.* from creacion t1, info_familiar t2 where t2.Apellidos_Familiares	 like '%".$Buscar."%'".
					"union ".
					"select t1.* from creacion t1, info_familiar t2 where t2.Nombre_Amigo	 like '%".$Buscar."%'".
					"union ".
					"select t1.* from creacion t1, info_familiar t2 where t2.Apellido_Amigo	 like '%".$Buscar."%'".
					"union ".
					"select t1.* from creacion t1, info_familiar t2 where t2.Nombre_Conyuge	 like '%".$Buscar."%'".
					"union ".
					"select t1.* from creacion t1, info_familiar t2 where t2.Apellidos_Conyuge	 like '%".$Buscar."%'".
					"union ".
					"select t1.* from creacion t1, info_familiar t2 where t2.Nombre_Padre	 like '%".$Buscar."%'".
					"union ".
					"select t1.* from creacion t1, info_familiar t2 where t2.Apellido_Padre	 like '%".$Buscar."%'".
					"union ".
					"select t1.* from creacion t1, info_familiar t2 where t2.Nombre_Madre	 like '%".$Buscar."%'".
					"union ".
					"select t1.* from creacion t1, info_familiar t2 where t2.apellidos_Madre	 like '%".$Buscar."%'";
					
					
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";				
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";				
								}	
						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;		
				
				}else if ($Radio==3)
				{
				$Buscar=$_REQUEST['Buscar'];
							//	Tel_Fijo	Tel_Celular
					$SQL="select t1.* from creacion t1,  info_familiar t2 where t2.Creacion_Csc=t1.Csc_Creacion and t2.Telefono_Conyuge like '%".$Buscar."%'".
					  "union ".
					  "select t1.* from creacion t1,  info_familiar t2 where t2.Creacion_Csc=t1.Csc_Creacion and t2.Celular_Conyuge like '%".$Buscar."%'".
					  "union ".
					  "select t1.* from creacion t1,  info_familiar t2 where t2.Creacion_Csc=t1.Csc_Creacion and t2.Tel_TrabajoConyu like '%".$Buscar."%'".
					  "union ".
					  "select t1.* from creacion t1,  info_familiar t2 where t2.Creacion_Csc=t1.Csc_Creacion and t2.Telefono_Padre like '%".$Buscar."%'".
					  "union ".
					  "select t1.* from creacion t1,  info_familiar t2 where t2.Creacion_Csc=t1.Csc_Creacion and t2.Celular_Padre like '%".$Buscar."%'".
					  "union ".
					  "select t1.* from creacion t1,  info_familiar t2 where t2.Creacion_Csc=t1.Csc_Creacion and t2.Tel_Madre like '%".$Buscar."%'".
					  "union ".
					  "select t1.* from creacion t1,  info_familiar t2 where t2.Creacion_Csc=t1.Csc_Creacion and t2.Cel_Madre like '%".$Buscar."%'";
					
					  		db('northcompas',$link);
								$Result=mysql_query($SQL);
								$Rows=mysql_affected_rows();		
						
							$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}	
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";				
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";				
								}	
						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;		
						
				}else if ($Radio==4)
				{
				$Buscar=$_REQUEST['Buscar'];
								
					$SQL="select t1.* from creacion t1,  info_familiar t2 where t2.Creacion_Csc=t1.Csc_Creacion and t1.Num_Identificacion like '%".$Buscar."%' ".
					"union ".
					"select t1.* from creacion t1,  info_familiar t2 where t2.Creacion_Csc=t1.Csc_Creacion and t2.Numero_Identificacion like '%".$Buscar."%' ";
					
					
					
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}	
						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;		
				
				}else if ($Radio==5)
				{
				$Buscar=$_REQUEST['Buscar'];
								
					$SQL="select t1.* from creacion t1,  vivienda t2 where t2.Creacion_Csc=t1.Csc_Creacion and t1.Direccion like '%".$Buscar."%' ".
					"union ".
					"select t1.* from creacion t1,  vivienda t2 where t2.Creacion_Csc=t1.Csc_Creacion and t2.Direccion like '%".$Buscar."%' ";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";	
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}	
						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;	
				}else if ($Radio==6)
				{
				$Buscar=$_REQUEST['Buscar'];
					$SQL="Select t1.* from creacion t1, cliente t2 where t1.Empresa=t2.CscCliente and DscCliente like '%".$Buscar."%'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}	
						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;
				}
				else if ($Radio==7)
				{
				$Buscar=$_REQUEST['Buscar'];
								
					$SQL="Select t1.* from creacion t1, documentos t2 where t1.Csc_Creacion=t2.Creacion_Csc and t2.PlacaM1 like '%".$Buscar."%'".
					"union ".
					"Select t1.* from creacion t1, documentos t2 where t1.Csc_Creacion=t2.Creacion_Csc and t2.PlacaM2 like '%".$Buscar."%'".
					"union ".
					"Select t1.* from creacion t1, documentos t2 where t1.Csc_Creacion=t2.Creacion_Csc and t2.Placas3 like '%".$Buscar."%'".
					"union ".
					"Select t1.* from creacion t1, documentos t2 where t1.Csc_Creacion=t2.Creacion_Csc and t2.Placas2 like '%".$Buscar."%'".
					"union ".
					"Select t1.* from creacion t1, documentos t2 where t1.Csc_Creacion=t2.Creacion_Csc and t2.Placas1 like '%".$Buscar."%'";
					
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";	
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";	
								}	
						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;				
				}
				else if ($Radio==8)//rh
					{
					$Buscar=$_REQUEST['Buscar'];
					$SQL="SELECT * FROM creacion t1, datos_basicos t2 WHERE t1.Csc_Creacion = t2.Creacion_Csc AND Grupo_Sanguineo LIKE  '%".$Buscar."%'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";	
								}	
						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;	
					}
				else if ($Radio==9)//depto ciudad barrio
					{
					$Buscar=$_REQUEST['Buscar'];
					//$SQL="select * from creacion where Dsc_Barrio like '%".$Buscar."%'";
					$SQL="SELECT * FROM creacion t1, departamento t2, ciudad t3  where   t1.Departamento=t2.CscDepartamento and t1.Departamento=t3.CodDepartamento".
					" and t1.ciudad=t3.CodCiudad and Dsc_Barrio like '%".$Buscar."%'".
					" union".
					" SELECT * FROM creacion t1, departamento t2, ciudad t3  where  t1.Departamento=t2.CscDepartamento and t1.Departamento=t3.CodDepartamento".
					" and t1.ciudad=t3.CodCiudad and t2.DscDepartamento like '%".$Buscar."%'".
					" union ".
					" SELECT * FROM creacion t1, departamento t2, ciudad t3  where     t1.Departamento=t2.CscDepartamento and t1.Departamento=t3.CodDepartamento".
					" and t1.ciudad=t3.CodCiudad and t3.DescCiudad like '%".$Buscar."%'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}	
						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;	
					
					}	
				}else{//fin chk
			if ($Radio==1)
				{
				$Buscar=$_REQUEST['Buscar'];
				$SplitBuscar=split("/",$Buscar);
				$Buscar=$SplitBuscar[2]."-".$SplitBuscar[1]."-".$SplitBuscar[0];				
					$SQL="select * from creacion where Fecha_Creacion = '".$Buscar."'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}	

						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;		
				
				}else if ($Radio==2)
				{
				$Buscar=$_REQUEST['Buscar'];
								
					$SQL="select * from creacion where Nombre_Completo = '".$Buscar."'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}	

						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;		
				
				}else if ($Radio==3)
				{
				$Buscar=$_REQUEST['Buscar'];
							//	Tel_Fijo	Tel_Celular
					$SQL="select * from creacion where Tel_Fijo = '".$Buscar."'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";	
								}	

						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;		
				
				}else if ($Radio==4)
				{
				$Buscar=$_REQUEST['Buscar'];
								
					$SQL="select * from creacion where Num_Identificacion = '".$Buscar."'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}	

						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;		
				
				}else if ($Radio==5)
				{
				$Buscar=$_REQUEST['Buscar'];
								
					$SQL="select * from creacion where Direccion = '".$Buscar."'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}	

						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;		
				}else if ($Radio==6)
				{
				$Buscar=$_REQUEST['Buscar'];
								
					$SQL="select * from creacion where Empresa = '".$Buscar."'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}	

						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;
				}else if ($Radio==7)
				{
				$Buscar=$_REQUEST['Buscar'];
								
					$SQL="select * from creacion where Placas = '".$Buscar."'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}	
						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;				
				}
				else if ($Radio==8)//rh
					{
					$Buscar=$_REQUEST['Buscar'];
					$SQL="SELECT * FROM creacion t1, datos_basicos t2 WHERE t1.Csc_Creacion = t2.Creacion_Csc AND Grupo_Sanguineo =  '".$Buscar."'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";	
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";	
								}	
						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;	
					}
				else if ($Radio==9)//depto ciudad barrio
					{
					$Buscar=$_REQUEST['Buscar'];
					//$SQL="select * from creacion where Dsc_Barrio like '%".$Buscar."%'";
					$SQL="SELECT * FROM creacion t1, departamento t2, ciudad t3  where   t1.Departamento=t2.CscDepartamento and t1.Departamento=t3.CodDepartamento".
					" and t1.ciudad=t3.CodCiudad and Dsc_Barrio = '".$Buscar."'".
					" union".
					" SELECT * FROM creacion t1, departamento t2, ciudad t3  where  t1.Departamento=t2.CscDepartamento and t1.Departamento=t3.CodDepartamento".
					" and t1.ciudad=t3.CodCiudad and t2.DscDepartamento = '".$Buscar."'".
					" union ".
					" SELECT * FROM creacion t1, departamento t2, ciudad t3  where     t1.Departamento=t2.CscDepartamento and t1.Departamento=t3.CodDepartamento".
					" and t1.ciudad=t3.CodCiudad and t3.DescCiudad = '".$Buscar."'";
					$Result=mysql_query($SQL);
					$i=0;
					while($Rs=mysql_fetch_array($Result))
						{
							$Csc_Creacion=$Rs['Csc_Creacion'];
							$Nombres=$Rs['Nombres'];	
							$Apellidos=$Rs['Apellidos'];
							$Num_Identificacion=$Rs['Num_Identificacion'];
							$Departamento=$Rs['Departamento'];
							$Ciudad=$Rs['Ciudad'];
							$Placas=$Rs['Placas'];
							if ($Departamento!='' and $Ciudad != '')
								{
									$SqlCiu="Select * from ciudad where CodDepartamento='".$Departamento."' and CodCiudad ='".$Ciudad."'";
										$ResultCiu=mysql_query($SqlCiu);
										$RsCiu=mysql_fetch_array($ResultCiu);
										$DescCiudad=$RsCiu['DescCiudad'];
								}
							$Fecha_Creacion=$Rs['Fecha_Creacion'];
							$Estado=$Rs['Estado'];
								if($Estado==0)
									{
										$Estado="Anulado";
									}
								if($Estado==1)
									{
										$Estado="Creado";
									}
								if($Estado==2)
									{
										$Estado="Programado";
									}
								if($Estado==3)
									{
										$Estado="Visita";
									}
								if($Estado==4)
									{
										$Estado="Referencianción";
									}
								if($Estado==5)
									{
										$Estado="Concepto Final";
									}				
							$Icono='<img src="../../Images/Iconos/Iconpdf.gif"/>';
							if($i!=0)
								{
								$js.=",";
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";		
								}
							else
								{
								$i++;
								$js.="{'post_id':'".$i."','Csc':'".$Csc_Creacion."','NombreCompleto':'".$Apellidos." ".$Nombres."','Identificacion':'".
								"".$Num_Identificacion."','Ciudad':'".$DescCiudad."','Fecha':'".$Fecha_Creacion."','Estado':'".$Estado."','Icono':'".$Icono."',".
								"'Placas':'".$Placas."','Otros':'".$Otros."'}";
								}	
						}
				$json.="{totalCount:".$i.", topics:[";
				$json.=$js;
				$json.="]}";
				echo $json;	
					
					}	
					
					}//chk

			}
?>