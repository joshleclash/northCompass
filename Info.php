<?php 
session_start();
include("Conexion.php");
$reset=$_REQUEST['reset'];
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
						value:	'La Contraseña sera enviada a su E-Mail'
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
var msg = '<span style="font-size:14px;"><BR/>TERMINOS Y CONDICIONES <BR/><BR/>Estos términos y condiciones de uso (en adelante, los "Términos") regulan el acceso y uso del sitio Internet cuyo Recurso Localizador Uniforme (URL) es www.northcompass.com.co (en adelante, el "Sitio").<br/><br/> Al acceder, navegar y/o usar el Sitio, usted admite haber leído y entendido estos Términos y acuerda obligarse a los mismos, así como a cumplir con todas las leyes y reglamentos que sean aplicables. En consecuencia, al acceder a los servicios ofrecidos en el Sitio, usted libremente acepta y adhiere expresamente a estos Términos así como todas sus modificaciones y adendas. En el evento en que usted no desee aceptar o se encuentre en desacuerdo con estos Términos, sus modificaciones y/o adendas, deberá abandonar el Sitio inmediatamente.<br/><br/>NORTH COMPASS S.A. coloca el Sitio a disposición de los usuarios de la red Internet (en adelante los "Usuarios" o el "Usuario"). Sin perjuicio de lo anterior, el acceso o uso de ciertos servicios ofrecidos al Usuario a través del Sitio, se realiza a título oneroso y se encuentra sujeto al cumplimiento de las siguientes <br/><br/><strong>CONDICIONES</strong><br/><br/>NORTH COMPASS S.A.  se reserva el derecho a modificar estos Términos en cualquier momento y sin previo aviso. Toda modificación entrará en vigencia y tendrá efectos frente a los Usuarios desde su publicación. En consecuencia, el Usuario deberá revisar estos Términos cada vez que NORTH COMPASS S.A. emita estas modificaciones.<br/><br/> Así mismo, los avisos, reglamentos, circulares o instrucciones de cualquier naturaleza expedidas por NORTH COMPASS S.A., publicadas en el Sitio, y relacionadas de cualquier forma con el acceso, navegación o uso del Sitio, o con el acceso y uso de los productos y/o servicios que en él se ofrecen, serán parte integral de estos Términos y prevalecerán sobre cualquier otra disposición relacionada aún cuando ésta le sea contraria.<br/><br/>CORRECTO USO DEL SITIO<br/><br/>El Usuario se compromete a utilizar el Sitio de conformidad con las leyes de la República de Colombia y con lo dispuesto en estos Términos. El Usuario se abstendrá de utilizar el Sitio con fines o efectos ilícitos, lesivos de los derechos e intereses de terceros, o de realizar actos que de cualquier forma puedan dañar, inutilizar, sobrecargar, deteriorar o impedir el normal funcionamiento del Sitio. <br/><br/>PROPIEDAD INTELECTUAL<br/><br/>North Compass S.A. ha dispuesto en el Sitio ciertos contenidos tales como mensajes, diseños, códigos fuente, códigos objeto, animaciones, gráficos, archivos de sonido y/o imagen, fotografías, grabaciones, y software (los "Contenidos").<br/><br/>Los derechos de autor sobre los Contenidos son de propiedad de NORTH COMPASS S.A. o del creador original de los mismos de quien NORTH COMPASS S.A. ha recibido autorización para su uso, y están plenamente protegidos por las normas nacionales e internacionales de derechos de autor y propiedad intelectual. En consecuencia, salvo lo expresamente señalado en los Términos, el Usuario deberá abstenerse de copiar, divulgar o reproducir de cualquier forma y por cualquier medio los Contenidos y, en general, cualquier clase de material accesible a través del Sitio, salvo aquellos casos en que NORTH COMPASS S.A. haya autorizado expresamente su copia o reproducción.<BR/>Por lo anterior, el Usuario deberá abstenerse en todo momento de (a) utilizar los Contenidos con fines contrarios a la ley, a la moral y a las buenas costumbres generalmente aceptadas o al orden público; (b) reproducir, copiar, distribuir, permitir el acceso del público a través de cualquier modalidad de comunicación pública, transformar o modificar los Contenidos, a menos que se cuente con la autorización del titular de los correspondientes derechos o ello resulte legalmente permitido; (c) suprimir, eludir o manipular cualesquiera clase de textos, leyendas o mensajes cuyo objeto sea la protección de los derechos de propiedad intelectual sobre los Contenidos, así como los dispositivos técnicos de protección que pudieren contener los Contenidos; (d) emplear los Contenidos y, en particular, la información de cualquier clase obtenida a través del Sitio para remitir publicidad, comunicaciones con fines de venta directa o con cualquier otra clase de finalidad comercial, mensajes no solicitados dirigidos a una pluralidad de personas con independencia de su finalidad, así como a abstenerse de comercializar los Contenidos.<BR/> Por virtud de los Términos, se otorga autorización a los Usuarios para desplegar en pantalla los Contenidos únicamente para uso personal no comercial, por lo que los Contenidos no deberán sean modificados de ninguna forma y conservarán todas las leyendas de derechos de autor y de otro tipo de propiedad contenidas en los mismos. Esta autorización podrá ser revocada por NORTH COMPASS S.A.  en cualquier momento. <BR/>Cualquier uso no autorizado de los Contenidos constituye una violación a estos Términos, a las leyes de derechos de autor y marcas comerciales, así como una violación a los tratados internacionales en materia de propiedad intelectual. <BR/><BR/>LICENCIAS<BR/><BR/>Salvo lo expresamente señalado en la sección "Propiedad Intelectual" NORTH COMPASS S.A. no concede ninguna licencia o autorización de uso de ninguna clase sobre sus derechos de propiedad industrial e intelectual o sobre cualquier otra propiedad o derecho relacionado con el Sitio o los Contenidos.<BR/><BR/>Marcas<BR/><BR/>Las marcas comerciales, las marcas de servicio y los logos usados y/o desplegados en el Sitio son marcas comerciales registradas y no registradas de propiedad de, o autorizadas a, NORTH COMPASS S.A. ("Marcas Comerciales"). Nada en este Sitio podrá ser interpretado como concesión de licencias o derechos de uso sobre cualesquiera Marcas Comerciales desplegadas en el Sitio. <BR/><BR/>VIOLACION DE DERECHOS DE TERCEROS<BR/><BR/>En el caso que cualquier Usuario o un tercero considere que cualquiera de los Contenidos ha sido introducido en el Sitio con violación de sus derechos de propiedad intelectual, dicho Usuario o tercero deberá enviar una notificación a NORTH COMPASS S.A en la que se informe lo siguiente: (a) datos personales: nombre, dirección, número de teléfono y dirección de correo electrónico del reclamante; (b) firma auténtica o equivalente, con los datos personales del titular de los derechos de propiedad intelectual supuestamente infringidos y/o de su apoderado; (c) indicación precisa y completa de los Contenidos supuestamente infringidos, así como de su localización en el Sitio; (d) declaración expresa y clara de que la utilización de los Contenidos indicados se ha realizado sin el consentimiento del titular de los derechos de propiedad intelectual supuestamente infringidos; y (e) declaración expresa, clara y bajo la responsabilidad del reclamante de que la información proporcionada en la notificación es exacta y de que la utilización de los Contenidos constituiría una violación de sus derechos de propiedad intelectual. Estas notificaciones deberán ser enviadas a la Coordinación de Compras de NORTH COMPASS S.A.<BR/><BR/>HIPERENLACES<BR/><BR/>Los Usuarios y, en general, todas aquellas personas que pretendan establecer un hiperenlace que desde sus páginas direccionen su navegador (Browser) al Sitio (en adelante, el "Hiperenlace") deberán cumplir con las siguientes condiciones: (a) el Hiperenlace únicamente permitirá el acceso a la página principal (Home) del Sitio; (b) no se creará un browse, frame o border environment sobre las páginas web del Sitio; (c) la inclusión del Hiperenlace no tendrá como objeto o efecto que las páginas del Sitio sean mostradas en un sitio no controlado por NORTH COMPASS S.A. (d) no se realizarán manifestaciones o indicaciones falsas, inexactas o incorrectas sobre el Sitio, en particular, no se declarará ni dará a entender que NORTH COMPASS S.A. ha autorizado el Hiperenlace o que ha supervisado o asumido de cualquier forma los contenidos o servicios ofrecidos o puestos a disposición en la página web que contiene el Hiperenlace; (e) excepción hecha de aquellos signos que formen parte del mismo Hiperenlace, la página web en la que se establezca el Hiperenlace no contendrá ninguna marca, nombre comercial, rótulo de establecimiento, denominación, logotipo, eslogan u otros signos distintivos pertenecientes o licenciados a NORTH COMPASS S.A. ; (f) la página web en la que se establezca el Hiperenlace no contendrá informaciones o contenidos ilícitos, contrarios a la moral y buenas costumbres generalmente aceptadas y al orden público, así como tampoco contendrá contenidos contrarios a cualesquiera derechos de terceros.<BR/>El establecimiento del Hiperenlace no tiene como objeto o efecto la creación de relaciones, comerciales entre NORTH COMPASS S.A. y el propietario de la página web en la que se establezca dicho Hiperenlace. Igualmente, el establecimiento del Hiperenlace en ningún caso tiene como objeto o efecto la aceptación, aprobación o apoyo por parte de NORTH COMPASS S.A. del sitio del tercero, o bien de los productos, servicios y/o contenidos en él ofrecidos.<BR/><BR/> POLITICA DE PRIVACIDAD <BR/><BR/> Todo Usuario que pretenda acceder y/o utilizar los servicios ofrecidos por NORTH COMPASS S.A. en el Sitio, deberá cumplir en todo con estos Términos y la Política de Privacidad que se indica más adelante.<BR/><BR/>RESPONSABILIDAD DEL USUARIO<BR/><BR/>El Usuario responderá por los daños y perjuicios que NORTH COMPASS S.A. pueda sufrir, directa o indirectamente, como consecuencia del incumplimiento de estos Términos o de la ley. El Usuario reconoce y acepta que el acceso y utilización del Sitio se realiza bajo su propia cuenta, riesgo y responsabilidad. <BR/><BR/>RESPONSABILIDAD DE NORTH COMPASS S.A. <BR/><BR/>Continuidad y buen funcionamiento del Sitio. NORTH COMPASS S.A. no garantiza la disponibilidad, continuidad o buen funcionamiento del Sitio. En consecuencia, en cualquier tiempo y sin previo aviso, NORTH COMPASS S.A., a su arbitrio, podrá bloquear, interrumpir o restringir el acceso al Sitio sin que por ello se derive responsabilidad alguna para NORTH COMPASS S.A. <BR/>El USUARIO será responsable por tomar medidas adecuadas y actuar diligentemente al momento de acceder al Sitio. Parte de dicha diligencia implica tener programas de protección, antivirus, para manejo de malware, spyware y herramientas similares. Además, deberá tener copias de los programas y datos que tengan en el equipo mediante el cual accede al Sitio.<BR/>NORTH COMPASS S.A. no controla ni garantiza que los Contenidos se encuentren libres de errores, virus u otros elementos de similar naturaleza que puedan producir alteraciones en el sistema informático del Usuario (software y hardware) o en los documentos electrónicos y ficheros almacenados en el mismo. En consecuencia, NORTH COMPASS S.A. no será responsable por los daños y/o perjuicios que pudiere sufrir el Usuario como resultado de errores, problemas de compatibilidad, virus informáticos, gusanos, troyanos o cualesquiera otros elementos de similar naturaleza que afecten la funcionalidad de los Contenidos. <BR/>NORTH COMPASS S.A. se reserva el derecho a denegar o retirar el acceso al Sitio, en cualquier momento y sin necesidad de preaviso, a aquellos Usuarios que incumplan estos Términos o cualesquiera otras disposiciones que resulten de aplicación.<BR/>Estas Condiciones Generales se rigen por las leyes de la República de Colombia.<BR/><BR/>INDEMNIDAD<BR/><BR/>El Usuario acepta expresamente que mantendrá indemne a NORTH COMPASS S.A., sus sociedades subsidiarias, afiliadas y empleados, por los daños y perjuicios que pudieren sufrir con ocasión de una utilización inapropiada del Sitio. Por utilización inapropiada se entenderá toda utilización del Sitio que se realice sin cumplir lo dispuesto en la ley y en estos Términos.<BR/><BR/>RESPONSABILIDAD CIVIL EXTRACONTRACTUAL<BR/><BR/>El Usuario reconoce y acepta expresamente que NORTH COMPASS S.A. no es responsable por las conductas difamatorias, ofensivas, ilegales y/o delictivas de sus Usuarios.<BR/><BR/>USO INTERNACIONAL<BR/><BR/>NORTH COMPASS S.A. no garantiza que los contenidos y materiales publicados en el Sitio sean apropiados y/o se encuentren disponibles para ser usados en países distintos a la República de Colombia. En consecuencia será responsabilidad de quien accede al Sitio desde lugares distintos a la República de Colombia, el cumplimiento de regulaciones y leyes locales.<BR/><BR/>DOCUMENTO COMLETO<BR/><BR/>Estos Términos y la Política de Privacidad, forman un documento único que debe interpretarse y cumplirse en su conjunto.<BR/><BR/><BR/>DECLARACION DE PRIVACIDAD<BR/><BR/>NORTH COMPASS S.A., respeta la privacidad de cada Usuario que visite el Sitio. NORTH COMPASS S.A. recibe información, la almacena y usa, lo que no obsta para que el Cliente puede verificar la exactitud de esta información y tomar las medidas para su eliminación. La información se recolecta, procesa y usa de conformidad con las regulaciones actuales de protección de información y privacidad.<BR/>NORTH COMPASS S.A. recopila información relacionada con el Cliente con fines de consulta, procesamiento y uso únicamente, si el Cliente decide voluntariamente registrar la información y da su consentimiento al respecto.<BR/>Al visitar el Sitio, cierta información se almacena automáticamente en nuestros servidores para la administración del sistema o para su procesamiento y fines estadísticos o para mantener copias de seguridad. Esta información comprende el nombre de su proveedor de servicio de Internet, en algunos casos su dirección de protocolo de Internet (IP), la versión de su software de búsqueda (browser software), el sistema operativo del computador usado para tener acceso al Sitio, el sitio Web que usted está utilizando para visitarnos, los sitios Web que usted visita mientras está con nosotros y, si es del caso, cualquier antecedente de búsqueda que haya venido utilizando para encontrar el Sitio.<BR/>Por otra parte, la información que usted voluntariamente nos proporciona debe ser veraz y completa, y la misma no la utilizaremos, procesaremos o transferiremos más allá de los limites permitidos por usted definidos en su declaración de consentimiento, es decir, para los fines comerciales que cada USUARIO tiene con NORTH COMPASS S.A.. De forma adicional, transferiremos su información únicamente, si estamos obligados a hacerlo por orden de autoridad o de un tribunal.<BR/>El Cliente autoriza a NORTH COMPASS S.A. y a sus aliados comerciales para utilizar la información que nos suministra y que obtenemos cuando nos vista en el Sitio<BR/><BR/>Para facilitar el uso del Sitio, estamos utilizando "Cookies", que son pequeñas unidades de información almacenada temporalmente en el disco duro de su computador, útiles para navegar en el Sitio. La información contenida en las "Cookies" sirve, v.g., para el control de sesiones, en particular navegación mejorada y para obtener un alto desempeño como usuario amigable de un sitio Web, y para almacenar información personal relativa a identificación. La mayoría de los "browsers" de la red aceptan las "cookies" automáticamente. Ud. puede evitar esto cambiando la configuración de su "browser". Puede quitar las "cookies" almacenadas en su PC en cualquier momento suprimiendo los archivos de Internet temporales ("Herramientas/Extras" de la barra del "Browser" -"Opciones de Internet").<BR/><BR/></span>';										


var tabs = new Ext.TabPanel({
            region: 'center',
            margins:'3 3 3 0', 
            activeTab: 0,
            defaults:{autoScroll:true},

            items:[{
                title: 'Términos de uso Pagina Web North Compass',
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