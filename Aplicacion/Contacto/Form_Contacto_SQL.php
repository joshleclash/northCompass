<?php
include_once("Conexion.php");
include_once("../Envio-Mail.php");
$Nombres=$_REQUEST['Nombres'];
$Telefono=$_REQUEST['Telefono'];
$email=$_REQUEST['email'];
$coment=$_REQUEST['coment'];

$SQL="Select Mail from login ";
	db('northcompas',$link);
	$Result=mysql_query($SQL)or die("{success:false}");
		
		$i=0;
		while($Rs=mysql_fetch_array($Result))
			{
				$Mail=$Rs['Mail'];
				if ($i!=0)
					{
					$direcciones.=",";
					$i++;
					$direcciones.=$Mail;
					}
				else
					{
					$i++;
					$direcciones.=$Mail;
					}
			
			}
			$Mensaje.="Hemos recibido un nuevo mensaje.<br/><br/>".
					 "<strong>Nombres y Apellidos:</strong><br/>".
					 $Nombres."<br/>".
					 "<strong>Número telefónico:</strong><br/>".
					 $Telefono."<br/>".
					 "<strong>Correo electrónico:</strong><br/>".
					 $email."<br/>".
					 "<strong>Comentarios:</strong><br/>".
					 $coment."<br/><br/><br/>".
					 "Gracias,<br/>".
					 "pronto recibirá una respuesta.<br/>".
					 "Northcompass.com.co<br/><br/>".
					'<font size="-1"/>Por favor no responda este mensaje.</font>';


fn_Mail($direcciones, "Contactenos", $Mensaje);
echo "{success:true}";	
?>