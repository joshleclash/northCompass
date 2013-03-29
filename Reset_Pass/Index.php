<?php
include('../Conexion.php');
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="it">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title> North Compass Colombia</title>
<link rel="shortcut icon" href="../images/icono.ico" />

<link rel="stylesheet" type="text/css" href="../ExtJS/resources/css/ext-all.css">
<!--<link rel="stylesheet" type="text/css" href="../ExtJS/resources/css/xtheme-gray.css">-->
<!-- GC -->
<!-- LIBS -->
<script type="text/javascript" src="../ExtJS/adapter/ext/ext-base.js"></script>
<!-- ENDLIBS -->
<script type="text/javascript" src="../ExtJS/ext-all.js"></script>
<script type="text/javascript" src="../ExtJs/ext-lang-sp.js"></script>
 
    <!-- Common Styles for the examples --> 
    <link rel="stylesheet" type="text/css" href=".../shared/examples.css"/> 
 
    <style type="text/css"> 
        .x-panel-body p {
            margin: 10px;
            font-size: 12px;
        }
		body{ background: url(../Images/Background01.jpg)}
    </style> 
    
</head> 
<body background=""> 
<script type="text/javascript" src="../shared/examples.js"></script> 

<script language="javascript">
Ext.onReady(function(){
var msg = '';


var LoginForm = new Ext.FormPanel({
           region: 'center',
		   url: '../Reset.php?accion=1',
           margins:'3 3 3 0', 
           activeTab: 0,
		   frame:true,
		   labelAlign:'top',
		  //defaultType: 'textfield',
           defaults:{autoScroll:true},
           items:[{
			   layout: 'column',
			   items:[{
				   columnWidth:1,
				   layout: 'form',
				   items:[{
					   		xtype : 'fieldset',
							//title : new Date().format('l d F Y - H:i'),
							autoHeight : true,
							border: false,
							html : '<div align="center"><img src="../Images/Logo.png"/ heigth="80px" width="150"> </div>',
							style: 'padding:5,5,5,5'
					   
				   	},{
					
						fieldLabel:	'Codigo De Verificacion',
						xtype:	'textfield',
						//vtype:  'email',
						id:	'PasVer',
						name:	'PasVer',
						allowBlank: false,
						anchor:	'95%'	
				 }]
			   	},{
				   columnWidth:.5,
				   layout: 'form',
				   defaultType : 'textfield',
				   items:[{
					inputType:	'password',
					name:	'ContraNew1',
					allowBlank:false,
					id:	 'ContraNew1',
					fieldLabel:	'Contrase&ntilde;a',
					anchor:	'80%'	
					 
				 }]
			  
		   	},{
				columnWidth:.5,
				layout: 'form',
				defaultType : 'textfield',
				   items:[{
							inputType:	'password',
							name:	'ContraNew2',
							allowBlank:false,
							fieldLabel:	'Contrase&ntilde;a Confirmacion',
							id:	 'ContraNew2',
							anchor:	'80%'	
				 }]
				  }]  
		   }]
 });
var Window =  new Ext.Window({
            title: 'North Compass Restablecer Contrase&ntilde;a',
			autoScroll: true,
            closable:false,
            width:350,
            height:310,
                items: [LoginForm], 
				buttons:[{
					text:'Enviar',
					handler: function (){
				var PasVer = document.getElementById('PasVer').value;
				var Contra1 =	document.getElementById('ContraNew1').value;
				var Contra2 =	document.getElementById('ContraNew2').value;
				 if(PasVer == ''){
					 
					 Ext.Msg.alert('Eror','El campo de verificacion de Contrase�a no puede estar vacio');
					 }
				else if (Contra1 != Contra2)
					{
					Ext.Msg.alert('Eror','Las Contrase�a Nueva y La Contrase�a Confirmacion No Coinciden Verique sus datos');
					}
				else if (Contra1 == Contra2)
					{
					fn_enviar();
					}	
				         }	
				},{
					text:'No Enviar',
					handler: function (){
						window.location='Default.php';
												
						}	
					}]
				});
		Window.show(this);
		
function fn_enviar(){
			LoginForm.form.submit({
						success: function(){
							var msg = 'Contrase�a  Actualizada Correctamente';
							Ext.Msg.alert('Respuesta',msg, function(btn, text){
							//alert(btn)
							setTimeout("document.location = '../Default.php'", 5);	
							});
							
							}, failure: function(){
								var PasVer = document.getElementById('PasVer').value;
								Ext.Msg.alert('Error', 'El Codigo Que escribio no coincide Con el almacenado, verifique la informacion de su correo:('+PasVer+')');
								//document.location = 'Default.php';
								}
						
						
						});
			
			
			}
			
});
</script>



</body> 
</html> 