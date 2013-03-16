<?php 
session_start();
include("Conexion.php");
@$reset=$_REQUEST['reset'];
echo $_SESSION["Csc"];
if ($reset==1){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="it">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title> North Compass Colombia</title>
<link rel="shortcut icon" href="./images/icono.ico" />

<link rel="stylesheet" type="text/css" href="./ExtJS/resources/css/ext-all.css">
<!--<link rel="stylesheet" type="text/css" href="./ExtJS/resources/css/xtheme-gray.css">-->
<!-- GC -->
<!-- LIBS -->
<script type="text/javascript" src="ExtJS/adapter/ext/ext-base.js"></script>
<!-- ENDLIBS -->
<script type="text/javascript" src="ExtJS/ext-all.js"></script>
<script type="text/javascript" src="./ExtJs/ext-lang-sp.js"></script>
 
    <!-- Common Styles for the examples --> 
    <link rel="stylesheet" type="text/css" href="../shared/examples.css"/> 
 
    <style type="text/css"> 
        .x-panel-body p {
            margin: 10px;
            font-size: 12px;
        }
		body{ background: url(Images/Background.jpg)}
    </style> 
    
</head> 
<body background=""> 
<script type="text/javascript" src="../shared/examples.js"></script> 

<script language="javascript">
Ext.onReady(function(){
var msg = '';


var LoginForm = new Ext.FormPanel({
           region: 'center',
		   url: 'Reset.php',
           margins:'3 3 3 0', 
           activeTab: 0,
		   frame:true,
		   defaultType: 'textfield',
           defaults:{autoScroll:true},
           items:[{
               // title: 'Reestablecer Contrase&ntilde;a',
               
						xtype:	'displayfield',
						value:	'La Contrase�a sera enviada a su E-Mail'
					},{
						fieldLabel:	'E-Mail',
						xtype:	'textfield',
						vtype:  'email',
						id:	'password',
						name:	'Password',
						width:	250	
					
				
			}]
 });
var Window =  new Ext.Window({
            title: 'North Compass Restablecer Contrase&ntilde;a',
			autoScroll: true,
            closable:false,
            width:400,
            height:122,
                items: [LoginForm], 
				buttons:[{
					text:'Enviar',
					handler: function (){
					LoginForm.form.submit({
						success: function(){
							var msg = 'Recibira un mensaje de correo de NorthCompas con su Informacion';
							Ext.Msg.alert('Enviando',msg, function(btn, text){
							//alert(btn)
							setTimeout("document.location = 'Default.php'", 5);	
							});
							
							}, failure: function(){
								var contra = document.getElementById('password').value;
								var msg = 'Verifique la Direccion de Correo que ingreso:('+contra+') Es posible que no este registrado en Nuestro Sistema';
								Ext.Msg.alert('Error', msg, function (btn, text){
									if (btn=='ok'){
									document.location = 'Default.php';	
									}
									});
								
								}
						
						
						});
					}	
				},{
					text:'No Enviar',
					handler: function (){
						window.location='Default.php';
												
						}	
					}]
				});
		Window.show(this);	
});
</script>



</body> 
</html> 
<?php
}else{



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="it">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title> North Compass Colombia</title>
<link rel="shortcut icon" href="./images/icono.ico" />

<link rel="stylesheet" type="text/css" href="./ExtJS/resources/css/ext-all.css">
<!--<link rel="stylesheet" type="text/css" href="./ExtJS/resources/css/xtheme-gray.css">-->
<!-- GC -->
<!-- LIBS -->
<script type="text/javascript" src="ExtJS/adapter/ext/ext-base.js"></script>
<!-- ENDLIBS -->
<script type="text/javascript" src="ExtJS/ext-all.js"></script>
<script type="text/javascript" src="./ExtJs/ext-lang-sp.js"></script>
 
    <!-- Common Styles for the examples --> 
    <link rel="stylesheet" type="text/css" href="../shared/examples.css"/> 
 
    <style type="text/css"> 
        .x-panel-body p {
            margin: 10px;
            font-size: 12px;
        }
		body{ background: url(Images/Background.jpg)}
    </style> 
    
</head> 
<body background=""> 
<script type="text/javascript" src="../shared/examples.js"></script> 

<script language="javascript">
Ext.onReady(function(){
var msg = '<span style="font-size:14px;"><BR/>TERMINOS Y CONDICIONES <BR/><BR/>Estos t�rminos y condiciones de uso (en adelante, los "T�rminos") regulan el acceso y uso del sitio Internet cuyo Recurso Localizador Uniforme (URL) es www.northcompass.com.co (en adelante, el "Sitio").<br/><br/> Al acceder, navegar y/o usar el Sitio, usted admite haber le�do y entendido estos T�rminos y acuerda obligarse a los mismos, as� como a cumplir con todas las leyes y reglamentos que sean aplicables. En consecuencia, al acceder a los servicios ofrecidos en el Sitio, usted libremente acepta y adhiere expresamente a estos T�rminos as� como todas sus modificaciones y adendas. En el evento en que usted no desee aceptar o se encuentre en desacuerdo con estos T�rminos, sus modificaciones y/o adendas, deber� abandonar el Sitio inmediatamente.<br/><br/>NORTH COMPASS S.A. coloca el Sitio a disposici�n de los usuarios de la red Internet (en adelante los "Usuarios" o el "Usuario"). Sin perjuicio de lo anterior, el acceso o uso de ciertos servicios ofrecidos al Usuario a trav�s del Sitio, se realiza a t�tulo oneroso y se encuentra sujeto al cumplimiento de las siguientes <br/><br/><strong>CONDICIONES</strong><br/><br/>NORTH COMPASS S.A.  se reserva el derecho a modificar estos T�rminos en cualquier momento y sin previo aviso. Toda modificaci�n entrar� en vigencia y tendr� efectos frente a los Usuarios desde su publicaci�n. En consecuencia, el Usuario deber� revisar estos T�rminos cada vez que NORTH COMPASS S.A. emita estas modificaciones.<br/><br/> As� mismo, los avisos, reglamentos, circulares o instrucciones de cualquier naturaleza expedidas por NORTH COMPASS S.A., publicadas en el Sitio, y relacionadas de cualquier forma con el acceso, navegaci�n o uso del Sitio, o con el acceso y uso de los productos y/o servicios que en �l se ofrecen, ser�n parte integral de estos T�rminos y prevalecer�n sobre cualquier otra disposici�n relacionada a�n cuando �sta le sea contraria.<br/><br/>CORRECTO USO DEL SITIO<br/><br/>El Usuario se compromete a utilizar el Sitio de conformidad con las leyes de la Rep�blica de Colombia y con lo dispuesto en estos T�rminos. El Usuario se abstendr� de utilizar el Sitio con fines o efectos il�citos, lesivos de los derechos e intereses de terceros, o de realizar actos que de cualquier forma puedan da�ar, inutilizar, sobrecargar, deteriorar o impedir el normal funcionamiento del Sitio. <br/><br/>PROPIEDAD INTELECTUAL<br/><br/>North Compass S.A. ha dispuesto en el Sitio ciertos contenidos tales como mensajes, dise�os, c�digos fuente, c�digos objeto, animaciones, gr�ficos, archivos de sonido y/o imagen, fotograf�as, grabaciones, y software (los "Contenidos").<br/><br/>Los derechos de autor sobre los Contenidos son de propiedad de NORTH COMPASS S.A. o del creador original de los mismos de quien NORTH COMPASS S.A. ha recibido autorizaci�n para su uso, y est�n plenamente protegidos por las normas nacionales e internacionales de derechos de autor y propiedad intelectual. En consecuencia, salvo lo expresamente se�alado en los T�rminos, el Usuario deber� abstenerse de copiar, divulgar o reproducir de cualquier forma y por cualquier medio los Contenidos y, en general, cualquier clase de material accesible a trav�s del Sitio, salvo aquellos casos en que NORTH COMPASS S.A. haya autorizado expresamente su copia o reproducci�n.<BR/>Por lo anterior, el Usuario deber� abstenerse en todo momento de (a) utilizar los Contenidos con fines contrarios a la ley, a la moral y a las buenas costumbres generalmente aceptadas o al orden p�blico; (b) reproducir, copiar, distribuir, permitir el acceso del p�blico a trav�s de cualquier modalidad de comunicaci�n p�blica, transformar o modificar los Contenidos, a menos que se cuente con la autorizaci�n del titular de los correspondientes derechos o ello resulte legalmente permitido; (c) suprimir, eludir o manipular cualesquiera clase de textos, leyendas o mensajes cuyo objeto sea la protecci�n de los derechos de propiedad intelectual sobre los Contenidos, as� como los dispositivos t�cnicos de protecci�n que pudieren contener los Contenidos; (d) emplear los Contenidos y, en particular, la informaci�n de cualquier clase obtenida a trav�s del Sitio para remitir publicidad, comunicaciones con fines de venta directa o con cualquier otra clase de finalidad comercial, mensajes no solicitados dirigidos a una pluralidad de personas con independencia de su finalidad, as� como a abstenerse de comercializar los Contenidos.<BR/> Por virtud de los T�rminos, se otorga autorizaci�n a los Usuarios para desplegar en pantalla los Contenidos �nicamente para uso personal no comercial, por lo que los Contenidos no deber�n sean modificados de ninguna forma y conservar�n todas las leyendas de derechos de autor y de otro tipo de propiedad contenidas en los mismos. Esta autorizaci�n podr� ser revocada por NORTH COMPASS S.A.  en cualquier momento. <BR/>Cualquier uso no autorizado de los Contenidos constituye una violaci�n a estos T�rminos, a las leyes de derechos de autor y marcas comerciales, as� como una violaci�n a los tratados internacionales en materia de propiedad intelectual. <BR/><BR/>LICENCIAS<BR/><BR/>Salvo lo expresamente se�alado en la secci�n "Propiedad Intelectual" NORTH COMPASS S.A. no concede ninguna licencia o autorizaci�n de uso de ninguna clase sobre sus derechos de propiedad industrial e intelectual o sobre cualquier otra propiedad o derecho relacionado con el Sitio o los Contenidos.<BR/><BR/>Marcas<BR/><BR/>Las marcas comerciales, las marcas de servicio y los logos usados y/o desplegados en el Sitio son marcas comerciales registradas y no registradas de propiedad de, o autorizadas a, NORTH COMPASS S.A. ("Marcas Comerciales"). Nada en este Sitio podr� ser interpretado como concesi�n de licencias o derechos de uso sobre cualesquiera Marcas Comerciales desplegadas en el Sitio. <BR/><BR/>VIOLACION DE DERECHOS DE TERCEROS<BR/><BR/>En el caso que cualquier Usuario o un tercero considere que cualquiera de los Contenidos ha sido introducido en el Sitio con violaci�n de sus derechos de propiedad intelectual, dicho Usuario o tercero deber� enviar una notificaci�n a NORTH COMPASS S.A en la que se informe lo siguiente: (a) datos personales: nombre, direcci�n, n�mero de tel�fono y direcci�n de correo electr�nico del reclamante; (b) firma aut�ntica o equivalente, con los datos personales del titular de los derechos de propiedad intelectual supuestamente infringidos y/o de su apoderado; (c) indicaci�n precisa y completa de los Contenidos supuestamente infringidos, as� como de su localizaci�n en el Sitio; (d) declaraci�n expresa y clara de que la utilizaci�n de los Contenidos indicados se ha realizado sin el consentimiento del titular de los derechos de propiedad intelectual supuestamente infringidos; y (e) declaraci�n expresa, clara y bajo la responsabilidad del reclamante de que la informaci�n proporcionada en la notificaci�n es exacta y de que la utilizaci�n de los Contenidos constituir�a una violaci�n de sus derechos de propiedad intelectual. Estas notificaciones deber�n ser enviadas a la Coordinaci�n de Compras de NORTH COMPASS S.A.<BR/><BR/>HIPERENLACES<BR/><BR/>Los Usuarios y, en general, todas aquellas personas que pretendan establecer un hiperenlace que desde sus p�ginas direccionen su navegador (Browser) al Sitio (en adelante, el "Hiperenlace") deber�n cumplir con las siguientes condiciones: (a) el Hiperenlace �nicamente permitir� el acceso a la p�gina principal (Home) del Sitio; (b) no se crear� un browse, frame o border environment sobre las p�ginas web del Sitio; (c) la inclusi�n del Hiperenlace no tendr� como objeto o efecto que las p�ginas del Sitio sean mostradas en un sitio no controlado por NORTH COMPASS S.A. (d) no se realizar�n manifestaciones o indicaciones falsas, inexactas o incorrectas sobre el Sitio, en particular, no se declarar� ni dar� a entender que NORTH COMPASS S.A. ha autorizado el Hiperenlace o que ha supervisado o asumido de cualquier forma los contenidos o servicios ofrecidos o puestos a disposici�n en la p�gina web que contiene el Hiperenlace; (e) excepci�n hecha de aquellos signos que formen parte del mismo Hiperenlace, la p�gina web en la que se establezca el Hiperenlace no contendr� ninguna marca, nombre comercial, r�tulo de establecimiento, denominaci�n, logotipo, eslogan u otros signos distintivos pertenecientes o licenciados a NORTH COMPASS S.A. ; (f) la p�gina web en la que se establezca el Hiperenlace no contendr� informaciones o contenidos il�citos, contrarios a la moral y buenas costumbres generalmente aceptadas y al orden p�blico, as� como tampoco contendr� contenidos contrarios a cualesquiera derechos de terceros.<BR/>El establecimiento del Hiperenlace no tiene como objeto o efecto la creaci�n de relaciones, comerciales entre NORTH COMPASS S.A. y el propietario de la p�gina web en la que se establezca dicho Hiperenlace. Igualmente, el establecimiento del Hiperenlace en ning�n caso tiene como objeto o efecto la aceptaci�n, aprobaci�n o apoyo por parte de NORTH COMPASS S.A. del sitio del tercero, o bien de los productos, servicios y/o contenidos en �l ofrecidos.<BR/><BR/> POLITICA DE PRIVACIDAD <BR/><BR/> Todo Usuario que pretenda acceder y/o utilizar los servicios ofrecidos por NORTH COMPASS S.A. en el Sitio, deber� cumplir en todo con estos T�rminos y la Pol�tica de Privacidad que se indica m�s adelante.<BR/><BR/>RESPONSABILIDAD DEL USUARIO<BR/><BR/>El Usuario responder� por los da�os y perjuicios que NORTH COMPASS S.A. pueda sufrir, directa o indirectamente, como consecuencia del incumplimiento de estos T�rminos o de la ley. El Usuario reconoce y acepta que el acceso y utilizaci�n del Sitio se realiza bajo su propia cuenta, riesgo y responsabilidad. <BR/><BR/>RESPONSABILIDAD DE NORTH COMPASS S.A. <BR/><BR/>Continuidad y buen funcionamiento del Sitio. NORTH COMPASS S.A. no garantiza la disponibilidad, continuidad o buen funcionamiento del Sitio. En consecuencia, en cualquier tiempo y sin previo aviso, NORTH COMPASS S.A., a su arbitrio, podr� bloquear, interrumpir o restringir el acceso al Sitio sin que por ello se derive responsabilidad alguna para NORTH COMPASS S.A. <BR/>El USUARIO ser� responsable por tomar medidas adecuadas y actuar diligentemente al momento de acceder al Sitio. Parte de dicha diligencia implica tener programas de protecci�n, antivirus, para manejo de malware, spyware y herramientas similares. Adem�s, deber� tener copias de los programas y datos que tengan en el equipo mediante el cual accede al Sitio.<BR/>NORTH COMPASS S.A. no controla ni garantiza que los Contenidos se encuentren libres de errores, virus u otros elementos de similar naturaleza que puedan producir alteraciones en el sistema inform�tico del Usuario (software y hardware) o en los documentos electr�nicos y ficheros almacenados en el mismo. En consecuencia, NORTH COMPASS S.A. no ser� responsable por los da�os y/o perjuicios que pudiere sufrir el Usuario como resultado de errores, problemas de compatibilidad, virus inform�ticos, gusanos, troyanos o cualesquiera otros elementos de similar naturaleza que afecten la funcionalidad de los Contenidos. <BR/>NORTH COMPASS S.A. se reserva el derecho a denegar o retirar el acceso al Sitio, en cualquier momento y sin necesidad de preaviso, a aquellos Usuarios que incumplan estos T�rminos o cualesquiera otras disposiciones que resulten de aplicaci�n.<BR/>Estas Condiciones Generales se rigen por las leyes de la Rep�blica de Colombia.<BR/><BR/>INDEMNIDAD<BR/><BR/>El Usuario acepta expresamente que mantendr� indemne a NORTH COMPASS S.A., sus sociedades subsidiarias, afiliadas y empleados, por los da�os y perjuicios que pudieren sufrir con ocasi�n de una utilizaci�n inapropiada del Sitio. Por utilizaci�n inapropiada se entender� toda utilizaci�n del Sitio que se realice sin cumplir lo dispuesto en la ley y en estos T�rminos.<BR/><BR/>RESPONSABILIDAD CIVIL EXTRACONTRACTUAL<BR/><BR/>El Usuario reconoce y acepta expresamente que NORTH COMPASS S.A. no es responsable por las conductas difamatorias, ofensivas, ilegales y/o delictivas de sus Usuarios.<BR/><BR/>USO INTERNACIONAL<BR/><BR/>NORTH COMPASS S.A. no garantiza que los contenidos y materiales publicados en el Sitio sean apropiados y/o se encuentren disponibles para ser usados en pa�ses distintos a la Rep�blica de Colombia. En consecuencia ser� responsabilidad de quien accede al Sitio desde lugares distintos a la Rep�blica de Colombia, el cumplimiento de regulaciones y leyes locales.<BR/><BR/>DOCUMENTO COMLETO<BR/><BR/>Estos T�rminos y la Pol�tica de Privacidad, forman un documento �nico que debe interpretarse y cumplirse en su conjunto.<BR/><BR/><BR/>DECLARACION DE PRIVACIDAD<BR/><BR/>NORTH COMPASS S.A., respeta la privacidad de cada Usuario que visite el Sitio. NORTH COMPASS S.A. recibe informaci�n, la almacena y usa, lo que no obsta para que el Cliente puede verificar la exactitud de esta informaci�n y tomar las medidas para su eliminaci�n. La informaci�n se recolecta, procesa y usa de conformidad con las regulaciones actuales de protecci�n de informaci�n y privacidad.<BR/>NORTH COMPASS S.A. recopila informaci�n relacionada con el Cliente con fines de consulta, procesamiento y uso �nicamente, si el Cliente decide voluntariamente registrar la informaci�n y da su consentimiento al respecto.<BR/>Al visitar el Sitio, cierta informaci�n se almacena autom�ticamente en nuestros servidores para la administraci�n del sistema o para su procesamiento y fines estad�sticos o para mantener copias de seguridad. Esta informaci�n comprende el nombre de su proveedor de servicio de Internet, en algunos casos su direcci�n de protocolo de Internet (IP), la versi�n de su software de b�squeda (browser software), el sistema operativo del computador usado para tener acceso al Sitio, el sitio Web que usted est� utilizando para visitarnos, los sitios Web que usted visita mientras est� con nosotros y, si es del caso, cualquier antecedente de b�squeda que haya venido utilizando para encontrar el Sitio.<BR/>Por otra parte, la informaci�n que usted voluntariamente nos proporciona debe ser veraz y completa, y la misma no la utilizaremos, procesaremos o transferiremos m�s all� de los limites permitidos por usted definidos en su declaraci�n de consentimiento, es decir, para los fines comerciales que cada USUARIO tiene con NORTH COMPASS S.A.. De forma adicional, transferiremos su informaci�n �nicamente, si estamos obligados a hacerlo por orden de autoridad o de un tribunal.<BR/>El Cliente autoriza a NORTH COMPASS S.A. y a sus aliados comerciales para utilizar la informaci�n que nos suministra y que obtenemos cuando nos vista en el Sitio<BR/><BR/>Para facilitar el uso del Sitio, estamos utilizando "Cookies", que son peque�as unidades de informaci�n almacenada temporalmente en el disco duro de su computador, �tiles para navegar en el Sitio. La informaci�n contenida en las "Cookies" sirve, v.g., para el control de sesiones, en particular navegaci�n mejorada y para obtener un alto desempe�o como usuario amigable de un sitio Web, y para almacenar informaci�n personal relativa a identificaci�n. La mayor�a de los "browsers" de la red aceptan las "cookies" autom�ticamente. Ud. puede evitar esto cambiando la configuraci�n de su "browser". Puede quitar las "cookies" almacenadas en su PC en cualquier momento suprimiendo los archivos de Internet temporales ("Herramientas/Extras" de la barra del "Browser" -"Opciones de Internet").<BR/><BR/></span>';										


var tabs = new Ext.TabPanel({
            region: 'center',
            margins:'3 3 3 0', 
            activeTab: 0,
            defaults:{autoScroll:true},

            items:[{
                title: 'T�rminos de uso Pagina Web North Compass',
                html: msg
            }]
});
 
var Window =  new Ext.Window({
            title: 'North Compass Terminos Y Condiiciones',
			autoScroll: true,
            closable:false,
            width:1000,
            height:550,
                items: [tabs], 
				buttons:[{
					text:'Acepto',
					handler: function (){
						window.location='Insert.php?acepto=Acepto';
											
					}
				},{
					text:'No Acepto',
					handler: function (){
						window.location='Insert.php?acepto=NoAcepto';
												
						}	
					}]
				});
		Window.show(this);	
});
</script>



</body> 
</html> 
<?php
}

?>