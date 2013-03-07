<?php
session_start();
$Perfil=$_SESSION["Perfil"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--<html xmlns="http://www.w3.org/1999/xhtml">-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NorthCompas</title>
<link rel="stylesheet" type="text/css" href="/ExtJS/resources/css/ext-all.css" /> 
 
    <!-- overrides to base library --> 
<!--    <link rel="stylesheet" type="text/css" href="./ExtJS/examples/ux/css/Portal.css" /> -->
    <link rel="stylesheet" type="text/css" href="/ExtJS/examples/ux/css/GroupTab.css" /> 
    <style type="text/css"> 
	/* styles for iconCls */
	.x-icon-creacion{
		background-image:url('./Images/Iconos/application_add.png')
		}
	.x-icon-modificacion {
		background-image: url('./Images/Iconos/application_edit.png');
	}
	.x-icon-busqueda{
	background-image: url('./Images/Iconos/IconoBusqueda.jpg');
		}
	.x-icon-programacion{
		background-image:url('./Images/Iconos/application_go.png');
		}
	.x-icon-domicilio{
		background-image:url('./Images/Iconos/house.png');	
		}
	.x-icon-indicadores{
		background-image:url('./Images/Iconos/chart_bar.png	');			
		}
	.x-icon-reportes {
		background-image: url('./Images/Iconos/report_go.png');
		}	
	.x-icon-useredith {
		background-image: url('./Images/Iconos/user_edit.png');
		}
	.x-icon-useradd {
		background-image: url('./Images/Iconos/user_add.png	');
	}
	.x-icon-logout {
		background-image: url('./Images/Iconos/user_disabled.png');
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
		background:white url(./ExtJs/docs/resources/block-bg.gif) repeat-x;
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
			
    </style> 
 
    <!-- ** Javascript ** --> 
    <!-- ExtJS library: base/adapter --> 
    <!--<script type="text/javascript" src="./Aplicacion/welcome.php"></script> -->
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

<?php if ($Perfil==3){?>
<script language="javascript">
Ext.onReady(function() {
	Ext.QuickTips.init();
    
    // create some portlet tools using built in Ext tool ids
    //var tools = [{
     //   id:'gear',
      //  handler: function(){
       //     Ext.Msg.alert('Message', 'The Settings tool was clicked.');
        //}
    //},{
     //   id:'close',
      //  handler: function(e, target, panel){
       //     panel.ownerCt.remove(panel, true);
       // }
    //}];

    var viewport = new Ext.Viewport({
        layout:'fit',
        items:[{
            xtype: 'grouptabpanel',
    		tabWidth: 150,
    		activeGroup: 0,
    		items: [{
				expanded: false,
                items: [{
					title: 'Visita Domiciliaria',
					iconCls: 'x-icon-domicilio',
					tabTip: 'Visita Domiciliria',
                    style: 'padding: 10px;',
                    html:	'<iframe name="myIframe01" src="./Aplicacion/Welcome.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">'
					},{
					title: 'Estado Solicitud',
					iconCls: 'x-icon-domicilio',
					tabTip: 'Estado Visita Domiciliria',
                    style: 'padding: 10px;',
					html:	'<iframe name="myIframe01" src="./Aplicacion/Visita/Form_Visita.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">'
					}]
			
			
            }]
		}]
    });
});


function cerrar(url){
	window.location=url;
};
</script>
<?php }else{?>
<script language="javascript">
Ext.onReady(function() {
	Ext.QuickTips.init();
    
    // create some portlet tools using built in Ext tool ids
    //var tools = [{
     //   id:'gear',
      //  handler: function(){
       //     Ext.Msg.alert('Message', 'The Settings tool was clicked.');
        //}
    //},{
     //   id:'close',
      //  handler: function(e, target, panel){
       //     panel.ownerCt.remove(panel, true);
       // }
    //}];

    var viewport = new Ext.Viewport({
        layout:'fit',
        items:[{
            xtype: 'grouptabpanel',
    		tabWidth: 150,
    		activeGroup: 0,
    		items: [{
    			expanded: false,
                items: [{
                    title: 'Solicitud',
                    iconCls: 'x-icon-configuration',
                    tabTip: 'Solicitudes',
                    style: 'padding: 10px;',
					html:'<iframe name="myIframe01" src="./Aplicacion/Welcome.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">'					
					},{
					title:   'Creaci&oacute;n',
                    iconCls: 'x-icon-creacion',
                    tabTip:  'Creacion Solicitud',
					
                    style:   'padding: 10px;',
					html: '<iframe name="myIframe01" src="./Aplicacion/Solicitud/Form_Creacion.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">'
                  		
				 },{
					title: 'Busqueda',
                    iconCls: 'x-icon-busqueda',
                    tabTip: 'Busqueda Solicitud',
					//disabled: true,
                    style: 'padding: 10px;',
                    html: '<iframe name="myIframe01" src="./Aplicacion/Busqueda/Form_Busqueda.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">'
				}]
			},{
			   
				expanded: false,
                items: [{
					title: 'Programaci&oacute;n',
					iconCls: 'x-icon-programacion',
					tabTip: 'Programacion',
                    style: 'padding: 10px;',
                    html:	''
				},{
					title: 'Solicitudes',
					disabled: false,
					iconCls: 'x-icon-programacion',
					tabTip: 'Programación Solicitudes',
                    style: 'padding: 10px;',
					html: '<iframe name="myIframe01" src="./Aplicacion/Programacion/Form_Programacion.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">'
						
					}]
            },{
			   
				expanded: false,
                items: [{
					title: 'Visita Domiciliaria',
					iconCls: 'x-icon-domicilio',
					tabTip: 'Visita Domiciliria',
                    style: 'padding: 10px;',
                    html:	''
					},{
					title: 'Estado Solicitud',
					iconCls: 'x-icon-domicilio',
					tabTip: 'Estado Visita Domiciliria',
                    style: 'padding: 10px;',
					html:	'<iframe name="myIframe01" src="./Aplicacion/Visita/Form_Visita.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">'
					}]
			},{
				expanded: false,
                items: [{
					title: 'Configuración',
					iconCls: 'x-icon-users',
					tabTip: 'Perfil',
                    style: 'padding: 10px;'//<iframe name="myIframe01" src="./Aplicacion/Indicadores/Ind3.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">
                   //html:	'<div id="div1"><iframe name="myIframe_" src="./Aplicacion/Iframe_Tab.php?URL_Tab=welcome.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes"></div>'
					},{
					title: 'Configuración Usuarios',
					iconCls: 'x-icon-useradd',
					tabTip: 'Cambiar Contraseña',
                    style: 'padding: 10px;',
					html:	'<iframe name="myIframe01" src="./Aplicacion/Usuario/Crea_Mod_Usuario.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">'					
					},{
					title: 'Configuración Clientes',
					iconCls: 'x-icon-useredith',
					tabTip: 'Cambiar Contraseña',
                    style: 'padding: 10px;',
					html:	'<iframe name="myIframe01" src="./Aplicacion/Cliente/Crea_Mod_Cliente.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">'
					
					}]		
            },{
			   
				expanded: false,
                items: [{
					title: 'Indicadores',
					iconCls: 'x-icon-indicadores',
					tabTip: 'Indicadores',
                    style: 'padding: 10px;',
                    html:	''
					},{
					title: 'Indicadores',
					iconCls: 'x-icon-indicadores',
					disabled: false,
					tabTip: 'Grafico Indicadores',
                    style: 'padding: 10px;',
					html:	'<iframe name="myIframe01" src="./Aplicacion/Indicadores/Indicadores.html" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">'
				
				}]
            },{
			   
				expanded: false,
				items: [{
					title: 'Reportes',
					//iconCls: 'x-icon-configuration',
					tabTip: 'Reportes',
                    style: 'padding: 10px;',
					html:	''
                    
					},{
					title: 'Consultar Reportes',
					disabled: true,
					iconCls: 'x-icon-reportes',
					tabTip: 'Consultar Reportes',
                    style: 'padding: 10px;',
					html:	Ext.example.shortBogusMarkup
					}]
            
			},{
				expanded: false,
                items: [{
					title: 'Perf&iacute;l',
					iconCls: 'x-icon-users',
					tabTip: 'Perfil',
                    style: 'padding: 10px;'//<iframe name="myIframe01" src="./Aplicacion/Indicadores/Ind3.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes">
                   //html:	'<div id="div1"><iframe name="myIframe_" src="./Aplicacion/Iframe_Tab.php?URL_Tab=welcome.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes"></div>'
					},{
					title: 'Cambio Contraseña',
					iconCls: 'x-icon-useredith',
					tabTip: 'Cambiar Contraseña',
                    style: 'padding: 10px;',
					html:	'<div id="div1"><iframe name="myIframe_" src="./Aplicacion/Mi_Perfil/ChangePass.php" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="no"></div>'
					}]
            }]
		}]
    });
});


function cerrar(url){
	window.location=url;
};
</script>

<?php } ?>

</head>
<body>
<div id="div3" onclick="cerrar('default.php');"><img src="./Images/Iconos/lock.png" />Cerrar Session</div>
</body>
</html>