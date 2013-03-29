<?php
include("../../Conexion.php");
include_once("../Envio-Mail.php");
$consulta=$_REQUEST['consulta'];
$js='';
$json='';
if($consulta==0)
	{
		@$Inicial=$_REQUEST['Inicial'];
		$inicialS=explode("/", $Inicial);
		@$Inicial=$inicialS[2]."-".$inicialS[1]."-".$inicialS[0];
		@$Final=$_REQUEST['Final'];
		$finals=explode("/",$Final);
		@$Final=$finals[2]."-".$finals[1]."-".$finals[0];
		@$Estado=$_REQUEST['Estado'];
		$Id=$_REQUEST['Id'];
                
			if ($Id==''){
				$Sql0="Select * from creacion where Fecha_Creacion between '".$Inicial."' and '".$Final."' and Estado='".$Estado."'";
				//echo $Sql0;
					db('northcompas', $link);
					$Result0=mysql_query($Sql0)or die("Error en la consulta");
						$i=0;
						while($Rs0=mysql_fetch_array($Result0)) 
							{
								$Csc_Creacion=$Rs0['Csc_Creacion'];
								$Num_Identificacion=$Rs0['Num_Identificacion'];
								$Nombre_Completo=$Rs0['Nombre_Completo'];
								$Ciudad=$Rs0['Ciudad'];
								$Fecha_Creacion=$Rs0['Fecha_Creacion'];
								$Profesional=$Rs0['Profesional'];
								$Departamento=$Rs0['Departamento'];
								$Ciudad=Ciudad($link, $Departamento, $Ciudad); 
								$Estado=$Rs0['Estado'];
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
								if ($Profesional!='')
									{
										$SqlProfesional="Select *  from login where Csc_Login = '".$Profesional."'";
											mysql_select_db('northcompas', $link);
												$ResultPro=mysql_query($SqlProfesional);	
													$RsPro=mysql_fetch_array($ResultPro);
														$Profesional=$RsPro['Nombres']." ".$RsPro['Apellidos'];
									}
								else{
									$Profesional='No Asignado';	
									}
									$Programacion='<img src="../../Images/Iconos/pencil.png" title="Programacion">';
								if ($i!=0)
									{
									$i++;
									$js.=",";
									$js.="{'cont':'".$i."','Csc':'".$Csc_Creacion."','Identificacion':'".$Num_Identificacion."','Nombres':'".$Nombre_Completo."',".
										"'Ciudad':'".$Ciudad."','Fecha_Creacion':'".$Fecha_Creacion."','Profesional':'".$Profesional."','Estado':'".$Estado."',".
										"'Programacion':'".$Programacion."'}";
									}
								else
									{
										$i++;
										$js.="{'cont':'".$i."','Csc':'".$Csc_Creacion."','Identificacion':'".$Num_Identificacion."','Nombres':'".$Nombre_Completo."',".
										"'Ciudad':'".$Ciudad."','Fecha_Creacion':'".$Fecha_Creacion."','Profesional':'".$Profesional."','Estado':'".$Estado."',".
										"'Programacion':'".$Programacion."'}";
									}
							
							
							}
						$json.="{totalCount:".$i.", topics:[";
						$json.=$js;
						$json.="]}";	
						echo $json;
				}
		else
				{
				$Sql0="Select * from creacion where Csc_Creacion ='".$Id."'";
					db('northcompas', $link);
					$Result0=mysql_query($Sql0)or die("Error en la consulta");
						$i=0;
						while($Rs0=mysql_fetch_array($Result0))
							{
								$Csc_Creacion=$Rs0['Csc_Creacion'];
								$Num_Identificacion=$Rs0['Num_Identificacion'];
								$Nombre_Completo=$Rs0['Nombre_Completo'];
								$Ciudad=$Rs0['Ciudad'];
								$Fecha_Creacion=$Rs0['Fecha_Creacion'];
								$Profesional=$Rs0['Profesional'];
								$Departamento=$Rs0['Departamento'];
								$Ciudad=Ciudad($link, $Departamento, $Ciudad); 
								$Estado=$Rs0['Estado'];
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
								if ($Profesional!='')
									{
										$SqlProfesional="Select *  from login where Csc_Login = '".$Profesional."'";
											db('northcompas', $link);
												$ResultPro=mysql_query($SqlProfesional);	
													$RsPro=mysql_fetch_array($ResultPro);
														$Profesional=$RsPro['Nombres']." ".$RsPro['Apellidos'];
													//	$Profesional=$SqlProfesional;
									}
								else{
									$Profesional='No Asignado';	
									}
									$Programacion='<img src="../../Images/Iconos/pencil.png" title="Programacion">';
								if ($i!=0)
									{
									$i++;
									$js.=",";
									$js.="{'cont':'".$i."','Csc':'".$Csc_Creacion."','Identificacion':'".$Num_Identificacion."','Nombres':'".$Nombre_Completo."',".
										"'Ciudad':'".$Ciudad."','Fecha_Creacion':'".$Fecha_Creacion."','Profesional':'".$Profesional."','Estado':'".$Estado."',".
										"'Programacion':'".$Programacion."'}";
									}
								else
									{
										$i++;
										$js.="{'cont':'".$i."','Csc':'".$Csc_Creacion."','Identificacion':'".$Num_Identificacion."','Nombres':'".$Nombre_Completo."',".
										"'Ciudad':'".$Ciudad."','Fecha_Creacion':'".$Fecha_Creacion."','Profesional':'".$Profesional."','Estado':'".$Estado."',".
										"'Programacion':'".$Programacion."'}";
									}
							
							
							}
						$json.="{totalCount:".$i.", topics:[";
						$json.=$js;
						$json.="]}";	
						echo $json;
				
				} 
	}
else if($consulta==1)
	{
	$csc=$_REQUEST['csc'];
	$Sql01="Select * from creacion where Csc_Creacion='".$csc."'";
					db('northcompas', $link);
					$Result0=mysql_query($Sql01)or die("Error en la consulta");
						$i=0;
						while($Rs0=mysql_fetch_array($Result0))
							{
                                                    if($i==0){
                                                        $Usuario=Usuario($link, $Rs0['Login_Csc']);
                                                        }
								$Csc_Creacion=$Rs0['Csc_Creacion'];
								$Fecha_Creacion=$Rs0['Fecha_Creacion'];
								$Profesional=$Rs0['Profesional'];
								$Departamento=$Rs0['Departamento'];
                                                                $Ciudad=$Rs0["Ciudad"];
								$Ciudad=Ciudad($link, $Departamento, $Ciudad); 
								$Fecha_Visita=$Rs0['Fecha_Visita'];	
								$Fecha_Referenciacion=$Rs0['Fecha_Referenciacion'];	
								$Fecha_Final=$Rs0['Fecha_Final'];
								$Fecha_Programacion=$Rs0['Fecha_Programacion'];								
								$Estado=$Rs0['Estado'];
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
								if ($Profesional!='')
									{
										$selectPro="Select * from login where Csc_Login='".$Profesional."'";
											db('northcompas',$link);
												$Result=mysql_query($selectPro);
													$Rs=mysql_fetch_array($Result);
												$Profesional=$Rs['Nombres']." ".$Rs['Apellidos'];
									}
								else
									{
										$Profesional='No Asignado'; 
									}
									
									//$csc
									
								//if ($i!=0)
								//	{
										//if ($Fecha_Creacion == '0000-00-00')
										//	{
											$i++;
											$js.="";
											$js.="{'cont':'".$i."','Csc':'".$Csc_Creacion."','Fecha_Creacion':'".$Fecha_Creacion."','Profesional':'".$Profesional."',".
											"'Estado':'CREADO'}";
										//	}
										if($Fecha_Programacion!='0000-00-00')
											{
											$i++;
											$js.=",";
										$js.="{'cont':'".$i."','Csc':'".$Csc_Creacion."','Fecha_Creacion':'".$Fecha_Programacion." ".$Rs0['Hora_Visita']."','Profesional':'".$Profesional."',".
											"'Estado':'PROGRAMADO'}";
											}	
										if ($Fecha_Visita!='0000-00-00')
											{
												$userTabla=UsuarioTabla($link, $csc, 'documentos');
												$Usuario=Usuario($link, $userTabla);
											$i++;
											$js.=",";
											$js.="{'cont':'".$i."','Csc':'".$Csc_Creacion."','Fecha_Creacion':'".$Fecha_Visita."','Profesional':'".$Profesional."',".
											"'Estado':'VISITA'}";
											}
										if ($Fecha_Referenciacion!='0000-00-00')
											{
												$userTabla=UsuarioTabla($link, $csc, 'datos_basicos');
												$Usuario=Usuario($link, $userTabla);
											$i++;
											$js.=",";
											$js.="{'cont':'".$i."','Csc':'".$Csc_Creacion."','Fecha_Creacion':'".$Fecha_Referenciacion."','Profesional':'".$Profesional."',".
											"'Estado':'REFERENCIACION'}";
											}
										if ($Fecha_Final!='0000-00-00')
											{
												$userTabla=UsuarioTabla($link, $csc, 'concepto');
												$Usuario=Usuario($link, $userTabla);
											$i++;
											$js.=",";
											$js.="{'cont':'".$i."','Csc':'".$Csc_Creacion."','Fecha_Creacion':'".$Fecha_Final."','Profesional':'".$Profesional."',".
											"'Estado':'CONCEPTO FINAL'}";
											}
											
								//	}
								
							}
						$json.="{totalCount:".$i.", topics:[";
						$json.=$js;
						$json.="]}";	
						echo $json;
}
else if($consulta==2)
{
	$Sql002="Select * from login where Perfil=3 and estado=1";
		mysql_select_db('northcompas',$link);
			$Result002=mysql_query($Sql002);
			$i=0;
			while($Rs002=mysql_fetch_array($Result002))
					{
						$Csc_Login=$Rs002['Csc_Login'];
						$Nombres=$Rs002['Nombres'];//Nombres	Apellidos
						$Apellidos=$Rs002['Apellidos'];
						$NombreCompleto=$Nombres." ".$Apellidos;
						if ($i!=0)
							{
							$js.=",";
							$i++;
							$js.="{'cont':'".$i."','csc':'".$Csc_Login."','dsc':'".$NombreCompleto."'}";	
							}
						else
							{
							$i++;
							$js.="{'cont':'".$i."','csc':'".$Csc_Login."','dsc':'".$NombreCompleto."'}";
							}	
					}
	echo $json="{totalCount:".$i.", root:[".$js."]}";
}
else if($consulta==3)
{
$csc=$_REQUEST['csc'];
$fecha=$_REQUEST['fecha'];
	$fechaS=explode("/",$fecha);
$fecha=	$fechaS[2]."-".$fechaS[1]."-".$fechaS[0];
$hora=$_REQUEST['hora'];
$profesional=$_REQUEST['profesional'];
	$Sql003="update creacion set Estado='2', Profesional='".$profesional."', Fecha_Programacion='".$fecha."', Hora_Visita='".$hora."' where Csc_Creacion='".$csc."'";
		mysql_select_db('northcompas', $link); 
			mysql_query($Sql003)or die("{totalCount:1, topics:[{'csc':'0'}]}");
			
			$SqlPro="Select * from  login where Csc_Login=".$profesional."";
				db('northcompas',$link);//Nombres	Apellidos	
					$RsPro=mysql_query($SqlPro,$link);
						$RowPro=mysql_fetch_array($RsPro);	
					$profesional=$RowPro['Nombres']." ".$RowPro['Apellidos'];
			//
			$SqlMail="Select t2.Mail from creacion t1,  login t2 where t1.Login_Csc=t2.Csc_Login and t1.Csc_Creacion='".$csc."'";
			db('northcompas',$link);
					$RsMail=mysql_query($SqlMail,$link);
						$RowMail=mysql_fetch_array($RsMail);
						$Mail["user"]=$RowMail['Mail'];
                                                $Mail["admin"]='joshleclash@gmail.com';
						$Mensaje="<strong>Cambio de estado </strong><br/><br/>Su solicitud No <strong>".$csc." </strong>a cambiado de estado.<br/>".
								  "el nuevo estado la solicitud es programado.<br/>Esta visita se realizara el día : <strong>".$fecha."</strong><br/>".
								  "por el profesional: <strong>".$profesional."</strong><br/><br/>".
								  "Por favor no responda este mensaje gracias<br/><br/>".
								  "<strong>NORTHCOMPASS</strong>";
				$components = new Components();				  
                                $components->sendRsForMail($Mail, "modificacion usuario", $Mensaje);
				//fn_Mail($Mail, "Cambio de Estado", $Mensaje); 
				echo "{totalCount:1, topics:[{'csc':'1'}]}";
}
?>