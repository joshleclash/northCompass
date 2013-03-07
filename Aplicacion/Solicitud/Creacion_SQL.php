<?php
session_start();
include('Conexion.php');
include('../Envio-Mail.php');
$consulta=$_REQUEST['consulta'];
$Csc_Login=$_SESSION["Csc"];
if ($consulta==0){
$SQL001="select * from   departamento ";
mysql_select_db('northcompas', $link);
$Con001=mysql_query($SQL001)or die('Error');
	$i=0;
	while($row001=mysql_fetch_array($Con001))
	{
		$CscDepartamento=$row001['CscDepartamento'];
		$DscDepartamento=$row001['DscDepartamento'];
		if ($i<>0)
		{
			$i++;
			$js.=',';
			$js.="{'csc':'".$CscDepartamento."','dsc':'".$DscDepartamento."'}";
			
		}
		else
		{
			$i++;
			$js.="{'csc':'".$CscDepartamento."','dsc':'".$DscDepartamento."'}";
		}
	}
	$json="{root:[";
	$json.=$js;
	$json.="]}";
	echo $json;	
}else if ($consulta==1){
$CodDep	=$_REQUEST['CodDep'];
$SQL001="select * from  ciudad where CodDepartamento='".$CodDep."' order by DescCiudad asc";
mysql_select_db('northcompas', $link);
$Con001=mysql_query($SQL001)or die('Error');
	$i=0;
	while($row001=mysql_fetch_array($Con001))
	{
		$CodCiudad=$row001['CodCiudad'];
		$DescCiudad=$row001['DescCiudad'];
		if ($i<>0)
		{
			$i++;
			$js.=',';
			$js.="{'csc':'".$CodCiudad."','dsc':'".$DescCiudad."'}";
			
		}
		else
		{
			$i++;
			$js.="{'csc':'".$CodCiudad."','dsc':'".$DescCiudad."'}";
		}
	}
	$json="{root:[";
	$json.=$js;
	$json.="]}";
	echo $json;
}else if ($consulta==2){
$CodCiud=$_REQUEST['CodCiud'];
$SQL002="select * from   localidad where CodCiudad='".$CodCiud."' order by CodLocalidad asc";
mysql_select_db('northcompas', $link);
$Con002=mysql_query($SQL002)or die('Error');
	$i=0;
	while($row002=mysql_fetch_array($Con002))
	{
		$CodLocalidad=$row002['CodLocalidad'];
		$DscLocalidad=$row002['DscLocalidad'];
		if ($i<>0)
		{
			$i++;
			$js.=',';
			$js.="{'csc':'".$CodLocalidad."','dsc':'".$DscLocalidad."'}";
			
		}
		else
		{
			$i++;
			$js.="{'csc':'000','dsc':'OTRO'},";
			$js.="{'csc':'".$CodLocalidad."','dsc':'".$DscLocalidad."'}";
		}
	}
	$json="{root:[";
	$json.=$js;
	$json.="]}";
	echo $json;
	
}else if ($consulta==3){
	$txt_num_doc=$_REQUEST['txt_num_doc'];
	$SQl03="select * from creacion where Num_Identificacion='".$txt_num_doc."'";
		db('northcompas', $link);
			$Result03=mysql_query($SQl03)or die("Error en la consulta 3");
				$Rs03=mysql_fetch_array($Result03);
					$Num_Identificacion=$Rs03['Num_Identificacion'];
					if ($Num_Identificacion!='')
						{
							echo "{totalCount:1, topics:[{Identificacion:'".$Num_Identificacion."'}]}";
						}
					else
						{
							echo "{totalCount:1, topics:[{Identificacion:''}]}";
						}
				
}else if ($consulta==4){////SELECT DE LAS EMPRESAS PARA EL PERFIL DE EL CLIENTE
			$Sql004="Select * from login where Csc_Login='".$Csc_Login."'";
				db('northcompas', $link);
					$Result004=mysql_query($Sql004);
					$Rs004=mysql_fetch_array($Result004);
						if ($Rs004['Cliente_Csc']!=0)
							{
								$SqlTerceros2="select t2.* from cliente t1, terceros t2 where t2.Estado_Csc='1' and  t1.CscCliente = t2.Cliente_Csc and t2.Cliente_Csc".
								"='".$Rs004['Cliente_Csc']."'";
								db('northcompas', $link);
									$i=0;
										$ResultTer=mysql_query($SqlTerceros2);
											while($RsTer=mysql_fetch_array($ResultTer))
												{
													$csc=$RsTer['Csc_Terceros'];
													$dsc=$RsTer['Dsc_Terceros'];
												if ($i!=0)
													{
													$i++;
													$js.=",";	
													$js.="{'cont':'".$i."','csc':'".$csc."','dsc':'".$dsc."'}";
													}
												else
													{
													$i++;
													$js.="{'cont':'".$i."','csc':'".$csc."','dsc':'".$dsc."'}";
													}													
												}
										echo "{totalCoun:".$i.", root:[".$js."]}";	
							
							}
						else if($Rs004['Cliente_Csc']==0)
							{
							$SqlTerceros="select * from terceros where Estado_Csc='1'";
									db('northcompas', $link);
									$i=0;
										$ResultTer=mysql_query($SqlTerceros);
											while($RsTer=mysql_fetch_array($ResultTer))
												{
													$csc=$RsTer['Csc_Terceros'];
													$dsc=$RsTer['Dsc_Terceros'];
												if ($i!=0)
													{
													$i++;
													$js.=",";	
													$js.="{'cont':'".$i."','csc':'".$csc."','dsc':'".$dsc."'}";
													}
												else
													{
													$i++;
													$js.="{'cont':'".$i."','csc':'".$csc."','dsc':'".$dsc."'}";
													}													
												}
										echo "{totalCoun:".$i.", root:[".$js."]}";
							}	
					
		
}else if ($consulta==5){
}else if ($consulta==6)
	{/////////////////////upload e insert
		$hi_lst_contrato=$_REQUEST['hi_lst_contrato'];
		$txt_nombres=$_REQUEST['txt_nombres'];
		$txt_session=$_REQUEST['txt_session'];
		$hi_lst_identificacion=$_REQUEST['hi_lst_identificacion'];
		$txt_direccion=$_REQUEST['txt_direccion'];
		$hi_lst_ciudad=$_REQUEST['hi_lst_ciudad'];
		$txt_telfijo=$_REQUEST['txt_telfijo'];
		$txt_telcelular=$_REQUEST['txt_telcelular'];
		$txt_empresa=$_REQUEST['hi_lst_empresa'];
		$txt_apellidos=$_REQUEST['txt_apellidos'];
		$txt_identificacion=$_REQUEST['txt_identificacion'];
		$hi_lst_departamento=$_REQUEST['hi_lst_departamento'];
		$hi_lst_localidad=$_REQUEST['hi_lst_localidad'];
		$txt_barrio=$_REQUEST['txt_barrio'];
		$txt_celular=$_REQUEST['txt_celular'];
		$txt_cargo=$_REQUEST['txt_cargo'];
		$txt_observaciones=$_REQUEST['txt_observaciones'];
		$archivo=$_REQUEST['archivo'];
$SQL006="INSERT INTO  creacion (Login_Csc, Nombres, Apellidos, Nombre_Completo, T_Identificacion, Num_Identificacion, Departamento, Ciudad, Barrio, Dsc_Barrio, Empresa, T_Contrato, Direccion, Tel_Fijo,  Tel_Celular, Tel_Celular2, Cargo, Observaciones, Fecha_Creacion) VALUES ('".$txt_session."','".$txt_nombres."','".$txt_apellidos."','".$txt_nombres." ".$txt_apellidos."','".$hi_lst_identificacion."','".$txt_identificacion."','".$hi_lst_departamento."','".$hi_lst_ciudad."','".$hi_lst_localidad."','".$txt_barrio."','".$txt_empresa."','".$hi_lst_contrato."','".$txt_direccion."','".$txt_telfijo."','".$txt_telcelular."','".$txt_celular."','".$txt_cargo."','".$txt_observaciones."','".date("Y")."/".date("m")."/".date("d")."')";
	$db=db('northcompas',$link);
		$QUERY=mysql_query($SQL006)or die("{success:false}");
		$last=mysql_query("SELECT Csc_Creacion AS 'cantidad' FROM creacion ORDER BY Csc_Creacion DESC Limit 1")or die("{success:false}");
		$row=mysql_fetch_array($last);
		$cantidad=$row['cantidad'];
		$SQLMAIL="select * from login where Csc_Login=".$Csc_Login."";
		$QueryMail=mysql_query($SQLMAIL);
		$i=0;
			while($rowmail=mysql_fetch_array($QueryMail)){
				$mail=$rowmail['Mail'];	
				if ($i!=0)
					{
						$send.=",";
						$i++;
						$send.=$mail;
					}
				else{
						$i++;
						$send.=$mail;	
					}
				}
$emails.=$send;
$Mensaje.="Hemos recibido una nueva solicitud.<br/><br/>".
		  "Su número de identificación de solicitud es: <strong>".$cantidad."</strong><br/><br/>".
		  '¿Necesitas ayuda rápida? Encontrar respuestas, en la opción Chat de nuestra<br/>'.
		  'aplicación haz <a href="http://www.northcompass.com.co" title="NorthCompas"/>clic aquí.</a><br/><br/>'.
		 "O bien, puedes hablar con nuestro personal altamente capacitado, que están a la <br/>espera de recibir tu llamada al teléfono de contacto (571) 4109880.<br/><br/>".
		  "Gracias,<br/>".
		  "Northcompass.com.co<br/><br/><br/>".
		  "Por favor no responda este mensaje.";
		  fn_Mail($emails,"Nueva Solicitud - ID ".$cantidad,$Mensaje);
echo "{success: true, bien:{csc:'".$cantidad."'}}";	
//echo $Mensaje,$emails;
}
?>