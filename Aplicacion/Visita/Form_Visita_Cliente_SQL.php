<?php
include("Conexion.php");
$consulta=$_REQUEST['consulta'];
if ($consulta==0)
	{
	$User_Id=$_REQUEST['User_Id'];
		if($User_Id=='')
			{
				$Estado=$_REQUEST['Estado'];
				$fi=$_REQUEST['fi'];
				$splitfi=split("/", $fi);
				$fi=$splitfi[2]."-".$splitfi[1]."-".$splitfi[0];
				$ff=$_REQUEST['ff'];
				$splitff=split("/", $ff);
				$ff=$splitff[2]."-".$splitff[1]."-".$splitff[0];
				$Sql="Select * from creacion where Estado='".$Estado."' and Fecha_Creacion between '".$fi."' and '".$ff."'";
				db('northcompas', $link);
					$Result=mysql_query($Sql)or die(mysql_error($Sql));
						$i=0;
						while($Rs=mysql_fetch_array($Result))
							{
								$Csc_Creacion=$Rs['Csc_Creacion'];
								$Nombre_Completo=$Rs['Nombre_Completo'];
								$Num_Identificacion=$Rs['Num_Identificacion'];
								$Ciudad=$Rs['Ciudad'];
								$Departamento=$Rs['Departamento'];
								$Ciudad=Ciudad($link, $Departamento, $Ciudad);
								$Fecha_Creacion=$Rs['Fecha_Creacion'];
								$Estado=$Rs['Estado'];
									if ($Estado==0)
									{
									$Estado='ANULADO';
									}
								else if($Estado==1)
									{
									$Estado='CREADO';
									}	
								else if($Estado==2)
									{
									$Estado='PROGRAMADO';
									}
								else if($Estado==3)
									{
									$Estado='VISITA';
									}
								else if($Estado==4)
									{
									$Estado='REFERENCIACION';
									}
								else if($Estado==5)
									{
									$Estado='CONCEPTO FINAL';
									}					
								$Icono='<img src="../../Images/Iconos/icono_pdf.gif">';
								$Adjuntos='<img src="../../Images/Iconos/application_cascade.png">';
									if($i!=0)
										{
											$i++;
											$js.=",";
											$js.="{'cont':'".$i."','csc':'".$Csc_Creacion."','Nombres':'".$Nombre_Completo."','Ciudad':'".$Ciudad."',".
											"'Fecha_Creacion':'".$Fecha_Creacion."','Identificacion':'".$Num_Identificacion."','Icono':'".$Icono."',".
											"'Estado':'".$Estado."','Adjuntos':'".$Adjuntos."'}";
										}
									else
										{
											$i++;
											$js.="{'cont':'".$i."','csc':'".$Csc_Creacion."','Nombres':'".$Nombre_Completo."','Ciudad':'".$Ciudad."',".
											"'Fecha_Creacion':'".$Fecha_Creacion."','Identificacion':'".$Num_Identificacion."','Icono':'".$Icono."',".
											"'Estado':'".$Estado."','Adjuntos':'".$Adjuntos."'}";
										}
								
							}
					$json.="{totalCount:".$i.", topics:[".$js."]}";
					echo $json;
			}
		else
			{
			$Sql="Select * from creacion where Csc_Creacion='".$User_Id."'";
				db('northcompas', $link);
					$Result=mysql_query($Sql)or die(mysql_error($Sql));
						$i=0;
						while($Rs=mysql_fetch_array($Result))
							{
								$Csc_Creacion=$Rs['Csc_Creacion'];
								$Nombre_Completo=$Rs['Nombre_Completo'];
								$Num_Identificacion=$Rs['Num_Identificacion'];
								$Ciudad=$Rs['Ciudad'];
								$Departamento=$Rs['Departamento'];
								$Ciudad=Ciudad($link, $Departamento, $Ciudad);
								$Fecha_Creacion=$Rs['Fecha_Creacion'];
								$Estado=$Rs['Estado'];
									if ($Estado==0)
									{
									$Estado='ANULADO';
									}
								else if($Estado==1)
									{
									$Estado='CREADO';
									}	
								else if($Estado==2)
									{
									$Estado='PROGRAMADO';
									}
								else if($Estado==3)
									{
									$Estado='VISITA';
									}
								else if($Estado==4)
									{
									$Estado='REFERENCIACION';
									}
								else if($Estado==5)
									{
									$Estado='CONCEPTO FINAL';
									}					
								$Icono='<img src="../../Images/Iconos/icono_pdf.gif">';
								$Adjuntos='<img src="../../Images/Iconos/application_cascade.png">';
									if($i!=0)
										{
											$i++;
											$js.=",";
											$js.="{'cont':'".$i."','csc':'".$Csc_Creacion."','Nombres':'".$Nombre_Completo."','Ciudad':'".$Ciudad."',".
											"'Fecha_Creacion':'".$Fecha_Creacion."','Identificacion':'".$Num_Identificacion."','Icono':'".$Icono."',".
											"'Estado':'".$Estado."','Adjuntos':'".$Adjuntos."'}";
										}
									else
										{
											$i++;
											$js.="{'cont':'".$i."','csc':'".$Csc_Creacion."','Nombres':'".$Nombre_Completo."','Ciudad':'".$Ciudad."',".
											"'Fecha_Creacion':'".$Fecha_Creacion."','Identificacion':'".$Num_Identificacion."','Icono':'".$Icono."',".
											"'Estado':'".$Estado."','Adjuntos':'".$Adjuntos."'}";
										}
								
							}
					$json.="{totalCount:".$i.", topics:[".$js."]}";
					echo $json;
			}	
	
	}



?>