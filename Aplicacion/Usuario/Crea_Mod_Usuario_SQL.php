<?php include("Conexion.php");

$consulta=$_REQUEST['consulta'];
if ($consulta==0)//CONSULTA PARA CARGAR LA INFO DE Empresa
{
	$Sql0="Select * from cliente";
		db('northcompas',$link);
		$Result0=mysql_query($Sql0);
			$i=0;
			while($Rs0=mysql_fetch_array($Result0))
				{
					$csc=$Rs0['CscCliente'];
					$dsc=$Rs0['DscCliente'];
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
	$Sql1="Select * from login ";//where Csc_Login<>'1'";	
		db('northcompas',$link);
		$Result1=mysql_query($Sql1);
			$i=0;
			while($Rs1=mysql_fetch_array($Result1))
				{
						$Csc_Login=$Rs1['Csc_Login'];
						$Usuario=$Rs1['Usuario'];
						$PassWord=$Rs1['PassWord'];
						$Nombres=$Rs1['Nombres'];
							
						$Apellidos=$Rs1['Apellidos'];
						$Mail=$Rs1['Mail'];
						$Estado=$Rs1['Estado'];//1Activo2Bloqueado
						$Perfil=$Rs1['Perfil'];
						if( $Perfil=='1')
							{
							$Perfil='Administrador';
							}
							 else if($Perfil=='3')
								{
									$Perfil='Profesional';
								}
							else if($Perfil=='2'){
									$Perfil='Cliente';
								}	
						$Cliente_Csc=$Rs1['Cliente_Csc'];
							if($Cliente_Csc!='0')
								{
								$Empresa=Empresa($link, $Cliente_Csc);
								}
							else
								{
									$Empresa='No Asignada';
								}	
						if($Estado==1)
							{
								$Estado='<SPAN style="color:green">Activo</SPAN>';
							}
						else
							{
								$Estado='<SPAN style="color:red">Bloqueado</SPAN>';
							}
				if($i!=0)
					{
					$i++;
					$js.=",";
					$js.="{'cont':'".$i."','Csc_Login':'".$Csc_Login."','Usuario':'".$Usuario."','PassWord':'".$PassWord."',".
					"'Nombres':'".$Nombres."','Apellidos':'".$Apellidos."','Mail':'".$Mail."','Estado':'".$Estado."'".
					",'Perfil':'".$Perfil."','Empresa':'".$Empresa."'}";
					}	
				else
					{
					$i++;
					
					$js.="{'cont':'".$i."','Csc_Login':'".$Csc_Login."','Usuario':'".$Usuario."','PassWord':'".$PassWord."',".
					"'Nombres':'".$Nombres."','Apellidos':'".$Apellidos."','Mail':'".$Mail."','Estado':'".$Estado."'".
					",'Perfil':'".$Perfil."','Empresa':'".$Empresa."'}";
					}	
				}
			$json.="{totalCount:".$i.", root:[";
			$json.=$js."]}";
			echo $json;
			
			
	
}if ($consulta==2)//CONSULTA PARA CARGAR LA INFO DE DEPARTAMENTO
{//DscCliente	Identificacion	TIdentificacionCsc	Direccion	Telefono	Celular	Contacto	Email	Estado_Csc
$Csc_Login=$_REQUEST['Csc_Login'];
$Usuario=$_REQUEST['Usuario'];
$PassWord=$_REQUEST['PassWord'];
$Nombres=$_REQUEST['Nombres'];
$Apellidos=$_REQUEST['Apellidos'];
$Mail=$_REQUEST['Mail'];
$hi_lst_Estado=$_REQUEST['hi_lst_Estado'];
$hi_lst_empresa=$_REQUEST['hi_lst_empresa'];
$hi_lst_perfil=$_REQUEST['hi_lst_perfil'];
	if($Csc_Login=='')
		{
			$Sql2="Insert into login (Usuario,	PassWord,	Nombres,	Apellidos,	Mail,	Estado,	Perfil,	Cliente_Csc) Values ".
					"('".$Usuario."','".$PassWord."','".$Nombres."','".$Apellidos."','".$Mail."','".$hi_lst_Estado."',".
					"'".$hi_lst_perfil."','".$hi_lst_empresa."')";
					db('northcompas',$link);
				  	$Respuesta = mysql_query($Sql2);
					if(!$Respuesta)
						{
							$info = array('success' => true, 'msg' => 'Error en la creacion de usuario valide su Informacion'); //Ok 	
							echo json_encode($info);
							return false;
						}
					else
						{
							$info = array('success' => true, 'msg' => 'Usuario creado Correctamente'); //Ok 	
							echo json_encode($info);
							return false;
						
						}	
										
		}
	else
		{
			if($hi_lst_Estado=='---' && $hi_lst_empresa =='---' && $hi_lst_perfil=='---')
				{
				$Sql2="Update login set Usuario='".$Usuario."', PassWord='".$PassWord."',	Nombres='".$Nombres."',	Apellidos='".$Apellidos."',	Mail='".$Mail."'".
					" where Csc_Login='".$Csc_Login."'";
				}
			if($hi_lst_empresa!='---')
				{
				$Sql2="Update login set Usuario='".$Usuario."', PassWord='".$PassWord."',	Nombres='".$Nombres."',	Apellidos='".$Apellidos."',	Mail='".$Mail."',".
					" Cliente_Csc='".$hi_lst_empresa."' where Csc_Login='".$Csc_Login."'";
				}
			if ($hi_lst_Estado!='---')
				{
				$Sql2="Update login set Usuario='".$Usuario."', PassWord='".$PassWord."',	Nombres='".$Nombres."',	Apellidos='".$Apellidos."',	Mail='".$Mail."',".
					" Estado='".$hi_lst_Estado."' where Csc_Login='".$Csc_Login."'";
				}
			if ($hi_lst_perfil!='---')
				{
				$Sql2="Update login set Usuario='".$Usuario."', PassWord='".$PassWord."',	Nombres='".$Nombres."',	Apellidos='".$Apellidos."',	Mail='".$Mail."',".
					" Perfil='".$hi_lst_perfil."' where Csc_Login='".$Csc_Login."'";
				}
					
					db('northcompas',$link);
				  	$Respuesta = mysql_query($Sql2);
					
					if(!$Respuesta)
						{
							$info = array('success' => true, 'msg' => 'Error en la actualizacion de usuario valide su información'); //Ok 	
							echo json_encode($info);
							return false;
						}
					else
						{
							$info = array('success' => true, 'msg' => 'Usuario actualizado Correctamente'); //Ok 	
							echo json_encode($info);
							return false;
						}		
				
		}
//$info = array('success' => true, 'msg' => 'Cliente Creado Correctamente'); //Ok 
}
?>