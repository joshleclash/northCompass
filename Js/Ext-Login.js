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
									html : '<img src="./Php/Antispam.php"/> ',
									style: 'padding:5,5,5,5'
								},{
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
									}]
								}]
							});
							var loginDlg = new Ext.Window({
								el : 'login-dlg',
								width : 300,
								height : 440,
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
												document.location = 'Aplicacion.php';
											},
											failure : function() {
												Ext.Msg.show({
												   title:'Error',
												   msg: 'Por favor verifique su Usuario o PassWord!',
												   buttons: Ext.Msg.OK,
												   icon: Ext.MessageBox.ERROR
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
								buttons : [ {
									text : 'Ingresar',
									//iconCls : 'icon-login',
									handler : function() {
										loginForm.form.submit( {
											reset : false,
											success : function() {
												document.location = 'Aplicacion.php';
											},
											failure : function() {
												Ext.Msg.show({
												   title:'Error',
												   msg: 'Por favor verifique su Usuario o PassWord!',
												   buttons: Ext.Msg.OK,
												   icon: Ext.MessageBox.ERROR
												});
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