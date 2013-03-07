<?php
//include("Conexion.php");
function fn_Mail($Direcciones,$Titulo,$Mensaje)
	{	
		$header='<img src="http://www.northcompass.com.co/Aplicacion/Solicitud/Header.png">';
		$footer='<img src="http://www.northcompass.com.co/Aplicacion/Solicitud/Footer.png">';
		mail($Direcciones,$Titulo,$header."<br/><br/>".$Mensaje."<br/><br/>".$footer,"Content-type: text/html\r\n")or die("Error en el envio de E-mail");
		return true;
	}
?>