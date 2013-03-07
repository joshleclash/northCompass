<?php 
    // Predefinimos las variables a usar 
	$direcion= "joshsummer_st80@hotmail.com";
    $empresa=	$_REQUEST["txt_empresa"]; 
	$contacto=	$_REQUEST["txt_nombres"];
	$telefono=	$_REQUEST["txt_telefono"];
	$correo=	$_REQUEST["txt_correo"];
	$ciudad=	$_REQUEST["txt_ciudad"];
	$producto=	$_REQUEST["txt_producto"];
	$comentarios=$_REQUEST['txt_comentarios'];
  	$asunto     = "Visita nueva el ".date("D, d M Y - h:i:s a "); 
    $remote_ip  = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : "(Sin IP)"; 
    $remote_isp = gethostbyaddr($remote_ip); 
    $agent      = $_SERVER['HTTP_USER_AGENT']; 
    $referer    = (isset($_SERVER['HTTP_REFERER'])) ? strtolower($_SERVER['HTTP_REFERER']) : "Sin referido"; 
    $headers    = 'From: '.$Nombre."\r\n"; 
	
    // Armamos el cuerpo del mensaje 
    $msg = "-------------------------------------------- \n<br/>"; 
    $msg.= "         Informacion de visitante            \n<br/>"; 
    $msg.= "-------------------------------------------- \n<br/>"; 
    $msg.= "PAGINA:     ".$_SERVER['PHP_SELF']."\n<br/>"; 
    $msg.= "HORA:       ".date("h:i:s a ")."\n<br/>"; 
    $msg.= "FECHA:      ".date("D, d M Y")."\n<br/>"; 
    $msg.= "NAVEGADOR:  ".$agent."\n<br/>"; 
    $msg.= "IP/ISP:     ".$remote_ip." Ip Remota(".$remote_isp.")"."\n<br/>"; 
    $msg.= "REFERIDO:   ".$referer."\n<br/>"; 
	$msg.= "------------------------------------------ \n\n<br/>"; 
	$msg.= "			DATOS DEL CLIENTE            \n<br/>";
	$msg.= "---------------------------------------------\n<br/>";
	$msg.= "Empresa.    		 ".$empresa."\n<br/>";
	$msg.= "Nombres Contacto.    ".$contacto."\n<br/>";
	$msg.= "Telefono.            ".$telefono."\n<br/>";
	$msg.= "E-mail.  			 ".$correo."\n<br/>";
	$msg.= "Ciudad.     		 ".$ciudad."\n<br/>";
	$msg.= "Producto De Interes. ".$producto."\n<br/>";
	$msg.= "Comentarios.         ".$comentarios."\n<br/>";
    // Finalmente enviamos el correo 
    mail($direcion, "BIOPLAST", $msg, $headers); 
	//echo $msg;
	header('Location: http://190.25.156.101:8080/bioplast/');

	?>

