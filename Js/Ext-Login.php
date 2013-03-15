<?php @session_start();?>
<?php
include("./php/GenCodigo.php");
$pass=genera_password(7);
?>



<style type="text/css" >
#divimagen
{
	background-image:url('./php/antispam.php');
	background-position:center
	
}

.ex1{
	background-color: #CCD9E8;
	font-family:Arial, Helvetica, sans-serif;
	color:black;
	}	
A:link {text-decoration: none; }
A:hover {font-size:15; font-weight: bold; color: #B71314;}
	

</style>

<script language="javascript">
Ext.BLANK_IMAGE_URL = 'ExtJs/resources/images/default/s.gif';
Ext.form.Field.prototype.msgTarget = 'side';

// create namespace
Ext.namespace('SITI');

// create application
SITI.app = function() {

	// private variables
	var loading = null;
	var mask = null;

	// public space
	return {
		init : function() {
			Ext.QuickTips.init();
			loading = Ext.get('loading');
			mask = Ext.get("mask");
			mask.setOpacity('0.8');
			mask.shift( {
				xy : loading.getXY(),	// Aplica el efecto a partir de la posicion de la ventana
				width : loading.getWidth(),	// Aplica el efecto a lo anhco
				height : loading.getHeight(),	// aplica el efecto a lo alto
				remove : true,			// si desaperese el terminar
				duration : '0.8',		// durecion del efecto
				opacity : '0.3',		// opacidad del fondo	
				easing : 'bounceOut',	// tipo de efecto
				callback : function() {
					loading.fadeOut( {
						duration : '0.1',
						remove : true,
						callback : function() {
							var loginForm = new Ext.form.FormPanel( {
								baseCls : 'x-plain',
								autoHeight : true,
								url : 'Pass.php?acces=1',
								items : [{
									xtype : 'fieldset',
									//title : new Date().format('l d F Y - H:i'),
									autoHeight : true,
									html : '<img src="./Images/Logo.png"/> ',
									style: 'padding:5,5,5,5'
								},{
									xtype : 'fieldset',
									//title : new Date().format('l d F Y - H:i'),
									autoHeight : true,
									//iconCls:	'<img src="./Php/Antispam.php"/>',
									html : 	'<div  id="divimagen"><?php echo '<p align="center"><font size="+3">'.$pass.'</font></p>';?></div>',						
									style: 		'padding:2,2,2,2'
								}////
								,{
									xtype : 'fieldset',
									title : 'Ingrese sus datos',
									defaultType : 'textfield',
									autoHeight : true,
									invalidText : 'Estos campos son requeridos.',
									items : [ {
										fieldLabel : 'Usuario',
										name : 'username',
										id : 'username',
										allowBlank : false,
										width : '100'
									}, {
										fieldLabel : 'Contrase&ntilde;a',
										name : 'password',
										inputType : 'password',
										allowBlank : false,
										width : '100',
										minLength : 5
									},{
										fieldLabel : 'Codigo Imagen',
										name : 'Codigo',
										inputType : 'textfield',
										allowBlank : false,
										width : '100',
										minLength : 5
									},{
										
										name : 'Codigohidden',
										inputType : 'hidden',
										width : '100',
										value:	'<?php echo $pass;?>',
										minLength : 5
														
									}]
								},{
									
									
										inputType : 'fieldset',
										//autoHeight : true,
										border:false,
										//style: 	'padding:2,2,2,2',
										html : 	' <div class="ex1" align="right"> <a href="Info.php?reset=1" title="Restablecer Contrase&ntilde;a">Olvido Su Contrase&ntilde;a</a></div>'	
								}]
							});
							var loginDlg = new Ext.Window({
								el : 'login-dlg',
								width : 300,
								height : 520,
								resizable : false,
								closable : false,
							
								plain : true,
								focus : function() {
									Ext.get('username').focus();
								},
								keys : {
									key : 13,
									fn : function() {
									loginForm.form.submit({
										reset : false,
										success : function() {
										document.location = 'Info.php';
									},
										bloqueo : function(){
										alert('bloqueo');
									},
									failure : function (form, action){
												obj = Ext.util.JSON.decode(action.response.responseText); 
												Ext.Msg.alert('Error!', '<div><img src="ExtJS/resources/images/yourtheme/window/icon-error.gif" align="lefth">'+obj.errors.reason+'<div>',
												 function(btn){
													window.location.href='default.php';
													});
											},
											scope : loginForm
										})
									}
								},
								buttonAlign : 'center',
								bodyStyle : 'padding:5px;',
								title : appsname,
								iconCls : 'icon-login',
								items : loginForm,
								buttons : [{
									text : 'Ingresar',
									//iconCls : 'icon-login',
									handler : function() {
										loginForm.form.submit( {
											reset : false,
											success : function() {
												document.location = 'Info.php';
											},
											failure : function (form, action){
												obj = Ext.util.JSON.decode(action.response.responseText); 
												Ext.Msg.alert('Error!', '<div><img src="ExtJS/resources/images/yourtheme/window/icon-error.gif" align="lefth">'+obj.errors.reason+'<div>',
												 function(btn){
													window.location.href='default.php';
													});
																								
												//Ext.Msg.show({
												  // title:'Error',
												  // msg: 'Por favor verifique su Usuario, PassWord o CodigoImagen!',
												  // buttons: Ext.Msg.OK,
												   //icon: Ext.MessageBox.ERROR
												//});
											},
											
											
											scope : loginForm
																				
										});
									}
								}, {
									text : 'Borrar',
									handler : function() {
										loginForm.form.reset()
									}
								}]
							});
							loginDlg.show();
						}
					});
				}
			});
		}
	};
}();

Ext.onReady(SITI.app.init, SITI.app);
</script>
