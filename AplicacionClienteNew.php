<?php
session_start();
?>
<html>
<head>
<title>North Compass</title>
<link rel="stylesheet" type="text/css" href="/ExtJS/resources/css/ext-all.css" /> 
<link rel="stylesheet" type="text/css" href="/ExtJS/examples/ux/css/GroupTab.css" /> 
    <style type="text/css"> 
	body{
	background: url(Images/FondoMapa.png) no-repeat;
	margin-left: 10px;
	margin-top: 20px;
	margin-right: 10px;
	margin-bottom: 10px;
	background-color:#000;
		}
    #flashContent { width:100%; height:100%; }       
	.x-icon-creacion{
		background-image:url('/Images/Iconos/application_add.png')
		}
	.x-icon-modificacion {
		background-image: url('/Images/Iconos/application_edit.png');
	}
	.x-icon-busqueda{
	background-image: url('/Images/Iconos/IconoBusqueda.jpg');
		}
	.x-icon-programacion{
		background-image:url('/Images/Iconos/application_go.png');
		}
	.x-icon-domicilio{
		background-image:url('/Images/Iconos/house.png');	
		}
	.x-icon-indicadores{
		background-image:url('/Images/Iconos/chart_bar.png	');			
		}
	.x-icon-reportes {
		background-image: url('/Images/Iconos/report_go.png');
		}	
	.x-icon-useredith {
		background-image: url('/Images/Iconos/user_edit.png');
		}	
	.x-icon-logout {
		background-image: url('/Images/Iconos/user_disabled.png');
		}	
	
	#div1{
		position:absolute;
		z-index:2;
		width: 100%;
	}
	#div2{
		position:absolute;
		z-index:1;
		top:260px;
		left: 450px;
		width:100px;
		height:20PX;
		background:white url(/ExtJs/docs/resources/block-bg.gif) repeat-x;
		color:#003366;
		font:bold 13px tahoma,arial,helvetica;
		padding:10px;
		margin:0;
		border:2px solid #09F
		
	}
	#div3{
		position:absolute;
		z-index:10000;
		bottom:20px;
		right:10px;
		width:100px;
		height:5PX;
		/*			background :white url(./ExtJs/docs/resources/block-bg.gif) repeat-x;*/
		color:#003366;
		font:bold 10px tahoma,arial,helvetica;
		padding:10px;
		margin:0;
		/*border:2px solid #09F			*/
	}			
    body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 11px;
	color: #000;
}
</style>
<script type="text/javascript" src="/ExtJS/adapter/ext/ext-base.js"></script> 
<!-- ExtJS library: all widgets --> 
<script type="text/javascript" src="/ExtJS/ext-all.js"></script> 
<!-- overrides to base library --> 
<!-- extensions --> 
<script type="text/javascript" src="/ExtJS/examples/ux/GroupTabPanel.js"></script> 
<script type="text/javascript" src="/ExtJS/examples/ux/GroupTab.js"></script> 

<script type="text/javascript" src="/ExtJS/examples/ux/Portal.js"></script> 
<script type="text/javascript" src="/ExtJS/examples/ux/PortalColumn.js"></script> 
<script type="text/javascript" src="/ExtJS/examples/ux/Portlet.js"></script> 
<!-- page specific --> 
<script type="text/javascript" src="/ExtJS/examples/shared/examples.js"></script> 
<script type="text/javascript" src="/ExtJS/examples/portal/sample-grid.js"></script> 
<!--<script type="text/javascript" src="./ExtJs/Examples/grouptabs/grouptabs.js"></script> -->
<script language="JavaScript">

Ext.onReady(function(){
	Ext.QuickTips.init();
	
	Ext.IframeWindow = Ext.extend(Ext.Window, { 
	onRender: function() {     
		this.bodyCfg = {         
			tag: 'iframe',         
			src: this.src,         
			cls: this.bodyCls,         
			style: {             
				border: '0px none'         
				}     
			};     
			Ext.IframeWindow.superclass.onRender.apply(this, arguments);
		} 
	});  
	
	var w1 = new Ext.IframeWindow({ 
		id:id, 
		width:640, 
		height:480, 
		title:"Knowledge Control Solutions Iframe Window Sample", 
		src:"http://www.google.es" 
	});
	
	//w1.show(); 	
});

	function openNewWindow(t){ 
		if(t==1){
			
			var w1 = new Ext.IframeWindow({ 
				id:t, 
				width:820, 
				height:500, 
				title:"Crear nueva solicitud", 
				src:"/Aplicacion/Solicitud/Form_Creacion.php",
				maximizable: true,
				modal: true				
			});		
			w1.show();
			
		}else if(t==2){
		
			var w2 = new Ext.IframeWindow({ 
				id:t, 
				width:820, 
				height:500, 
				title:"Programación de mis solicitudes", 
				src:"/Aplicacion/Programacion/Form_Programacion.php",
				maximizable: true,
				modal: true				
			});		
			w2.show();		
		
		}else if(t==3){
		
			var w3 = new Ext.IframeWindow({ 
				id:t, 
				width:820, 
				height:500, 
				title:"Estado de mis solicitudes", 
				src:"/Aplicacion/Visita/Form_Visita_Cliente.php",
				maximizable: true,
				modal: true
			});		
			w3.show();		
		
		}else if(t==4){
		
			var w4 = new Ext.IframeWindow({ 
				id:t, 
				width:820, 
				height:500, 
				title:"Realizar busqueda", 
				src:"/Aplicacion/Busqueda/Form_Busqueda.php",
				maximizable: true,
				modal: true				
			});		
			w4.show();		
		
		}else if(t==5){
		
			var w5 = new Ext.IframeWindow({ 
				id:t, 
				width:900, 
				height:600, 
				title:"Indicadores", 
				src:"/Aplicacion/Indicadores/Indicadores.html",
				maximizable: true,
				modal: true				
			});		
			w5.show();		
		
		}else if(t==6){
		
			var w6 = new Ext.IframeWindow({ 
				id:t, 
				width:600, 
				height:250, 
				title:"Reportes", 
				src:"/Aplicacion/Reporte/Reportes.html",
				maximizable: true,
				modal: true				
			});		
			w6.show();		
		
		}else if(t==7){
		
			var w7 = new Ext.IframeWindow({ 
				id:t,
				width:290,
				height:360,
				title:"Chat",
				src:"/Aplicacion/Chat.html",
				//maximizable: true,
				//modal: true,
				x: screen.width-330,
				y: screen.height-600
			});		
			
			w7.show();
		
		}else if(t==8){
		
			var w8 = new Ext.IframeWindow({ 
				id:t, 
				width:800,
				height:395,
				title:"Contactenos",
				src:"/Aplicacion/Contacto/Form_Contacto.php",
				maximizable: true,
				modal: true
			});		
			w8.show();		
		
		}else if(t==10){
		
			var w10 = new Ext.IframeWindow({ 
				id:t, 
				width:800,
				height:480,
				title:"Mi Perfil - Cambio de Contraseña",
				src:"/Aplicacion/Mi_Perfil/ChangePass.php",
				maximizable: true,
				modal: true
			});		
			w10.show();		
		
		}else if(t==11){
		
			var w11 = new Ext.IframeWindow({ 
				id:t, 
				width:1000,
				height:480,
				title:"Siguenos en Facebook",
				src:"/Aplicacion/Face.html",
				maximizable: true,
				modal: true
			});		
			w11.show();		
		
		}else if(t==12){
		
			var w12 = new Ext.IframeWindow({ 
				id:t, 
				width:1000,
				height:480,
				title:"Siguenos en Twitter",
				src:"http://twitter.com/north_compass",
				maximizable: true,
				modal: true
			});		
			w12.show();		
		
		};
		
	};
	
	function cerrar(url){
		window.location=url;
	};
</script>
</head>
<body>		
			<table width="99%" border="0" align="center" cellpadding="2" cellspacing="0">
			  <tr>
			    <td width="39%">&nbsp;</td>
			    <td width="20%">&nbsp;</td>
			    <td width="30%" height="50"align="left" 
                	style=" font-family:'Monotype Corsiva'; padding-left:5px; font-size:24px; color:#FFF; background-image:url(Images/BG25.png); ">
                Bienvenido<br>
                <?php echo $_SESSION["Nombres"]." ".$_SESSION["Apellidos"];?></td>
			    <td width="11%"align="right" style="padding-right:5px; background-image:url(Images/BG25.png)">
                	<div title="Cerrar Sesión">
                    	<a href="javascript:openNewWindow(10);">
                       	<img src="Images/ICOPerfil.png" alt="Mi Perfil" title="Mi Perfil" width="26" height="26" border="0" />
                        </a>
                        <a href="cerrar('default.php');">
                       	<img src="Images/ICOSesion.png" alt="Cerrar Sesión" title="Cerrar Sesión" width="26" height="26" border="0" />
                        </a>
                    </div>
                </td>
		      </tr>
			  <tr>
			    <td colspan="4" align="center">
                <div id="flashContent">
			  	  <p>
			  	    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="800" height="500" id="Vista Cliente" align="middle">
			  	      <param name="movie" value="Vista Cliente.swf" />
			  	      <param name="quality" value="high" />
			  	      <param name="bgcolor" value="#ffffff" />
			  	      <param name="play" value="true" />
			  	      <param name="loop" value="true" />
			  	      <param name="wmode" value="transparent" />
			  	      <param name="scale" value="showall" />
			  	      <param name="menu" value="true" />
			  	      <param name="devicefont" value="false" />
			  	      <param name="salign" value="" />
			  	      <param name="allowScriptAccess" value="sameDomain" />
			  	      <!--[if !IE]>-->
			  	      <object type="application/x-shockwave-flash" data="Vista Cliente.swf" width="800" height="500">
			  	        <param name="movie" value="Vista Cliente.swf" />
			  	        <param name="quality" value="high" />
			  	        <param name="bgcolor" value="#ffffff" />
			  	        <param name="play" value="true" />
			  	        <param name="loop" value="true" />
			  	        <param name="wmode" value="transparent" />
			  	        <param name="scale" value="showall" />
			  	        <param name="menu" value="true" />
			  	        <param name="devicefont" value="false" />
			  	        <param name="salign" value="" />
			  	        <param name="allowScriptAccess" value="sameDomain" />
			  	        <!--<![endif]-->
			  	        <a href="http://www.adobe.com/go/getflash">
			  	          <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" />
		  	            </a>
			  	        <!--[if !IE]>-->
		  	          </object>
			  	      <!--<![endif]-->
		  	        </object>
			  	  </p>
</div>
                </td>
		      </tr>
			  <tr style="background-image:url(Images/BG25.png);">
			    <td width="39%" height="40" style="padding-left:5px; font-size:13px; color:#FFF;">Derechos Reservados &reg; 2011 <br>
		        North Compass Colombia</td>
			    <td width="20%" height="32">&nbsp;</td>
			    <td height="32" colspan="2" align="right" valign="baseline" style="padding-right:5px; font-size:13px; color:#FFF;">
    <a href="http://www.youtube.com" target="_blank">
                	<img src="Images/youtube.png" alt="!Siguenos en You Tube!" title="!Siguenos en You Tube!" 
                     width="64" height="64" border="0" /></a>
    <a href="javascript:openNewWindow(11);">
                	<img src="Images/facebook.png" alt="!Siguenos en Facebook!" title="!Siguenos en Facebook!" 
                     width="64" height="64" border="0" /></a>
    <a href="http://twitter.com/north_compass" target="_blank">
                	<img src="Images/twitter.png" alt="!Siguenos en Twitter!" title="!Siguenos en Twitter!" 
                     width="64" height="64" border="0" /></a>
                </td>
		      </tr>
</table>
</body>
</html>