<?php include("Conexion.php");

$consulta=$_REQUEST['consulta'];
if ($consulta==0)//CONSULTA PARA CARGAR LA INFO DE DEPARTAMENTO
{
	$Sql0="Select * from tidentificacion";
		db('northcompas',$link);
		$Result0=mysql_query($Sql0);
			$i=0;
			while($Rs0=mysql_fetch_array($Result0))
				{
					$csc=$Rs0['CscIdentificacion'];
					$dsc=$Rs0['DscIdentificacion'];
					if($i==0)
						{
						$i++;
						$js.="{'csc':'".$csc."','dsc':'".$dsc."'}";
						}
					else{
						$i++;
						$js.=",";
						$js.="{'csc':'".$csc."','dsc':'".$dsc."'}";
						}	
				}
			$json.="{root:[";//{totalCount:".$i.",
			$json.=$js;
			echo $json."]}";
			
}
if ($consulta==1)//CONSULTA PARA CARGAR LA INFO DE DEPARTAMENTO
{
	$Sql1="Select * from cliente";	
		db('northcompas',$link);
		$Result1=mysql_query($Sql1);
			$i=0;
			while($Rs1=mysql_fetch_array($Result1))
				{
						$CscCliente=$Rs1['CscCliente'];
						$DscCliente=$Rs1['DscCliente'];
						$Identificacion=$Rs1['Identificacion'];
						$TIdentificacion=$Rs1['TIdentificacionCsc'];
							if($TIdentificacion!='')
								{
									$Sql10="Select * from tidentificacion where CscIdentificacion='".$TIdentificacion."'";
										db('northcompas',$link);
										$Result10=mysql_query($Sql10);
											$Rs10=mysql_fetch_array($Result10);
											$TIdentificacion=$Rs10['DscIdentificacion'];
								}
						$Direccion=$Rs1['Direccion'];
						$Telefono=$Rs1['Telefono'];
						$Celular=$Rs1['Celular'];
						$Contacto=$Rs1['Contacto'];
						$Email=$Rs1['Email'];
						$Estado_Csc=$Rs1['Estado_Csc'];
						if($Estado_Csc==1)
							{
								$Estado_Csc='<SPAN style="color:green">Activo</SPAN>';
							}
						else
							{
								$Estado_Csc='<SPAN style="color:red">Inactivo</SPAN>';
							}
						$Terceros='<img src="../../Images/Iconos/group_add.png" title="Terceros" align="middle">';
						$Valor=$Rs1['Valor'];	
				if($i!=0)
					{
					$i++;
					$js.=",";
					$js.="{'cont':'".$i."','CscCliente':'".$CscCliente."','DscCliente':'".$DscCliente."','Identificacion':'".$Identificacion."',".
					"'TIdentificacion':'".$TIdentificacion."','Direccion':'".$Direccion."','Telefono':'".$Telefono."','Celular':'".$Celular."'".
					",'Contacto':'".$Contacto."','Email':'".$Email."','Estado_Csc':'".$Estado_Csc."','Terceros':'".$Terceros."','Valor':'".$Valor."'}";
					}	
				else
					{
					$i++;
					
					$js.="{'cont':'".$i."','CscCliente':'".$CscCliente."','DscCliente':'".$DscCliente."','Identificacion':'".$Identificacion."',".
					"'TIdentificacion':'".$TIdentificacion."','Direccion':'".$Direccion."','Telefono':'".$Telefono."','Celular':'".$Celular."'".
					",'Contacto':'".$Contacto."','Email':'".$Email."','Estado_Csc':'".$Estado_Csc."','Terceros':'".$Terceros."','Valor':'".$Valor."'}";
					}	
				}
			$json.="{totalCount:".$i.", root:[";
			$json.=$js."]}";
			echo $json;
			
			
	
}if ($consulta==2)//CONSULTA PARA CARGAR LA INFO DE DEPARTAMENTO
{//DscCliente	Identificacion	TIdentificacionCsc	Direccion	Telefono	Celular	Contacto	Email	Estado_Csc
$txt_nombre=$_REQUEST['txt_nombre'];
$txt_identificacion=$_REQUEST['txt_identificacion'];
$txt_telefono=$_REQUEST['txt_telefono'];
$txt_contacto=$_REQUEST['txt_contacto'];
$hi_lst_estado=$_REQUEST['hi_lst_estado'];
$hi_lst_tipo=$_REQUEST['hi_lst_tipo'];
$txt_direccion=$_REQUEST['txt_direccion'];
$txt_movil=$_REQUEST['txt_movil'];
$txt_mail=$_REQUEST['txt_mail'];
$txt_csc=$_REQUEST['txt_csc'];
$txt_Val=$_REQUEST['txt_Val'];
	if($txt_csc=='')
		{
			$Sql2="Insert into cliente (DscCliente, Identificacion, TIdentificacionCsc, Direccion, Telefono, Celular, Contacto, Email, Estado_Csc, Valor) Values ".
					"('".$txt_nombre."','".$txt_identificacion."','".$hi_lst_tipo."','".$txt_direccion."','".$txt_telefono."','".$txt_movil."',".
					"'".$txt_contacto."','".$txt_mail."','".$hi_lst_estado."', ".$txt_Val.")";
					db('northcompas',$link);
				  	$Respuesta = mysql_query($Sql2);
					if(!$Respuesta)
						{
							$info = array('success' => true, 'msg' => 'Error en la creacion de cliente Valide su Informacion'); //Ok 	
							echo json_encode($info);
							return false;
						}
					else
						{
							$info = array('success' => true, 'msg' => 'Cliente creado Correctamente'); //Ok 	
							echo json_encode($info);
							return false;
						
						}	
					$info = array('success' => true, 'msg' => 'Cliente Creado Correctamente'); //Ok 
					
		}
	else
		{
				if($hi_lst_tipo=='---')//TIdentificacionCsc='".$hi_lst_tipo."',
				{
				$Sql2="Update cliente set DscCliente='".$txt_nombre."', Identificacion='".$txt_identificacion."', ".
				"Direccion='".$txt_direccion."', Telefono='".$txt_telefono."', Celular='".$txt_movil."', Contacto='".$txt_contacto."', ".
				"Email='".$txt_mail."', Estado_Csc='".$hi_lst_estado."', Valor=".$txt_Val." where CscCliente='".$txt_csc."'";
							if ($hi_lst_estado==0)
								{
								$Sql2Up="update login set Estado='2' where Cliente_Csc='".$txt_csc."'";
									db('northcompas',$link);
									mysql_query($Sql2Up);
									
								}
							else if($hi_lst_estado==1)
								{
								$Sql2Up="update login set Estado='1' where Cliente_Csc='".$txt_csc."'";
									db('northcompas',$link);
									mysql_query($Sql2Up);	
								}
							
						
				}
			else if($hi_lst_estado=='---')
				{
				$Sql2="Update cliente set DscCliente='".$txt_nombre."', Identificacion='".$txt_identificacion."', TIdentificacionCsc='".$hi_lst_tipo."', ".
				"Direccion='".$txt_direccion."', Telefono='".$txt_telefono."', Celular='".$txt_movil."', Contacto='".$txt_contacto."', ".
				"Email='".$txt_mail."', Valor=".$txt_Val."  where CscCliente='".$txt_csc."'";
				}
			else if ($hi_lst_estado!='---' and $hi_lst_tipo!='---')
				{
				$Sql2="Update cliente set DscCliente='".$txt_nombre."', Identificacion='".$txt_identificacion."', TIdentificacionCsc='".$hi_lst_tipo."', ".
				"Direccion='".$txt_direccion."', Telefono='".$txt_telefono."', Celular='".$txt_movil."', Contacto='".$txt_contacto."', ".
				"Email='".$txt_mail."', Estado_Csc='".$hi_lst_estado."', Valor=".$txt_Val."  where CscCliente='".$txt_csc."'";
						if ($hi_lst_estado==0)
								{
								$Sql2Up="update login set Estado='2' where Cliente_Csc='".$txt_csc."'";
									db('northcompas',$link);
									mysql_query($Sql2Up);
									
								}
							else if($hi_lst_estado==1)
								{
								$Sql2Up="update login set Estado='1' where Cliente_Csc='".$txt_csc."'";
									db('northcompas',$link);
									mysql_query($Sql2Up);	
								}
				}
					db('northcompas',$link);
				  	$Respuesta = mysql_query($Sql2);
					if(!$Respuesta)
						{
							$info = array('success' => true, 'msg' => 'Error en la creacion de actualizacion Valide su Informacion'); //Ok 	
							echo json_encode($info);
							return false;
						}
					else
						{
							$info = array('success' => true, 'msg' => 'Cliente actualizado Correctamente'); //Ok 	
							echo json_encode($info);
							return false;
						}		
				
		}
//$info = array('success' => true, 'msg' => 'Cliente Creado Correctamente'); //Ok 
}else if ($consulta==3){
$Cliente_Csc=$_REQUEST['CscCliente'];
	$Sql3="Select * from terceros where Cliente_Csc='".$Cliente_Csc."'";	
		db('northcompas',$link);
		$Result3=mysql_query($Sql3);
			$i=0;
			while($Rs3=mysql_fetch_array($Result3))
				{
						$Csc_Terceros=$Rs3['Csc_Terceros'];
						$Dsc_Terceros=$Rs3['Dsc_Terceros'];
						$Identificacion=$Rs3['Identificacion'];
						$T_Identificacion=$Rs3['T_Identificacion'];
							if($T_Identificacion!='')
								{
									$Sql10="Select * from tidentificacion where CscIdentificacion='".$T_Identificacion."'";
										db('northcompas',$link);
										$Result10=mysql_query($Sql10);
											$Rs10=mysql_fetch_array($Result10);
											$T_Identificacion=$Rs10['DscIdentificacion'];
								}
						$Direccion=$Rs3['Direccion'];
						$Telefono=$Rs3['Telefono'];
						$Celular=$Rs3['Celular'];
						$Contacto=$Rs3['Contacto'];
						$Email=$Rs3['Email'];
						$Estado_Csc=$Rs3['Estado_Csc'];
						if($Estado_Csc==1)
							{
								$Estado_Csc='<SPAN style="color:green">Activo</SPAN>';
							}
						else
							{
								$Estado_Csc='<SPAN style="color:red">Inactivo</SPAN>';
							}
					if($i!=0)
					{
					$i++;
					$js.=",";
					$js.="{'cont':'".$i."','Csc_Terceros':'".$Csc_Terceros."','Dsc_Terceros':'".$Dsc_Terceros."','Identificacion':'".$Identificacion."',".
					"'T_Identificacion':'".$T_Identificacion."','Direccion':'".$Direccion."','Telefono':'".$Telefono."','Celular':'".$Celular."'".
					",'Contacto':'".$Contacto."','Email':'".$Email."','Estado_Csc':'".$Estado_Csc."'}";
					}	
				else
					{
					$i++;
					
					$js.="{'cont':'".$i."','Csc_Terceros':'".$Csc_Terceros."','Dsc_Terceros':'".$Dsc_Terceros."','Identificacion':'".$Identificacion."',".
					"'T_Identificacion':'".$T_Identificacion."','Direccion':'".$Direccion."','Telefono':'".$Telefono."','Celular':'".$Celular."'".
					",'Contacto':'".$Contacto."','Email':'".$Email."','Estado_Csc':'".$Estado_Csc."'}";
					}	
				}
			$json.="{totalCount:".$i.", root:[";
			$json.=$js."]}";
			echo $json; 
	 
}else if ($consulta==4){
$txt_WinCsc=$_REQUEST['txt_WinCsc'];
$txt_WinName=$_REQUEST['txt_WinName'];
$txt_WinNIdentificacion=$_REQUEST['txt_WinNIdentificacion'];
$txt_WinTelefono=$_REQUEST['txt_WinTelefono'];
$txt_WinContacto=$_REQUEST['txt_WinContacto'];
$hi_Winlst_estado=$_REQUEST['hi_Winlst_estado'];
$hi_winlst_tipo=$_REQUEST['hi_winlst_tipo'];
$txt_WinDireccion=$_REQUEST['txt_WinDireccion'];
$txt_WinCelular=$_REQUEST['txt_WinCelular'];
$CscCliente=$_REQUEST['CscCliente'];
$txt_WinMail=$_REQUEST['txt_WinMail'];
	if($txt_WinCsc=='')
		{//Csc_Terceros	Dsc_Terceros	Identificacion	T_Identificacion	Direccion	Telefono	Celular	Contacto	Email	Cliente_Csc	Estado_Csc
			$Sql4="Insert into terceros (Dsc_Terceros, Identificacion, T_Identificacion, Direccion, Telefono, Celular, Contacto, Email, Cliente_Csc, Estado_Csc)".
			" Values ".
			"('".$txt_WinName."','".$txt_WinNIdentificacion."','".$hi_winlst_tipo."','".$txt_WinDireccion."','".$txt_WinTelefono."','".$txt_WinCelular."'".
			",'".$txt_WinContacto."','".$txt_WinMail."','".$CscCliente."','".$hi_Winlst_estado."')";
			db('northcompas',$link);
				$Result4=mysql_query($Sql4);
				if(!$Result4)
						{
							$info = array('success' => true, 'msg' => 'Error en la creacion de tercero Valide su Informacion'); //Ok 	
							echo json_encode($info);
							return false;
						}
				else{
							$info = array('success' => true, 'msg' => 'Creacion de tercero exitosa desea continuar'); //Ok 	
							echo json_encode($info);
							return false;
					}
				
		}
	else
		{
			if($hi_winlst_tipo=='---')
				{
				$Sql4="Update terceros set Dsc_Terceros='".$txt_WinName."', Identificacion='".$txt_WinNIdentificacion."', ".
			"Direccion='".$txt_WinDireccion."', Telefono='".$txt_WinTelefono."', Celular='".$txt_WinCelular."', Contacto='".$txt_WinContacto."',".
			" Email='".$txt_WinMail."',  Estado_Csc='".$hi_Winlst_estado."' where Csc_Terceros='".$txt_WinCsc."'";	
				}
			else if($hi_Winlst_estado=='---')
				{
				$Sql4="Update terceros set Dsc_Terceros='".$txt_WinName."', Identificacion='".$txt_WinNIdentificacion."', T_Identificacion='".$hi_winlst_tipo."', ".
			"Direccion='".$txt_WinDireccion."', Telefono='".$txt_WinTelefono."', Celular='".$txt_WinCelular."', Contacto='".$txt_WinContacto."',".
			" Email='".$txt_WinMail."' where Csc_Terceros='".$txt_WinCsc."'";	
				}
			else if ($hi_Winlst_estado!='---' and $hi_winlst_tipo!='---'){
				$Sql4="Update terceros set Dsc_Terceros='".$txt_WinName."', Identificacion='".$txt_WinNIdentificacion."', T_Identificacion='".$hi_winlst_tipo."', ".
			"Direccion='".$txt_WinDireccion."', Telefono='".$txt_WinTelefono."', Celular='".$txt_WinCelular."', Contacto='".$txt_WinContacto."',".
			" Email='".$txt_WinMail."',  Estado_Csc='".$hi_Winlst_estado."' where Csc_Terceros='".$txt_WinCsc."'";	
				}
			db('northcompas',$link);
				$Result4=mysql_query($Sql4);
				if(!$Result4)
						{
							$info = array('success' => true, 'msg' => 'Error en la actualizacion de tercero Valide su Informacion'); //Ok 	
							echo json_encode($info);
							return false;
						}
				else{
							$info = array('success' => true, 'msg' => 'Actualizacion de tercero exitosa desea continuar'); //Ok 	
							echo json_encode($info);
							return false;
					}
		}
		
}
?>