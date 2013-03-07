<?php
include ("Conexion.php");
session_start();
$CscLogin=$_SESSION["Csc"];
$time=date("d/m/Y");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta name="content"  content="text/html;" http-equiv="content-type" charset="utf-8">
<link rel="stylesheet" type="text/css" href="../../ExtJS/resources/css/ext-all.css">
<link rel="stylesheet" type="text/css" href="../../ExtJS/welcomeinc.css">
<link rel="stylesheet" type="text/css" href="../../ExtJS/examples/form/file-upload.css">
<!-- GC -->
<!-- LIBS -->
<script type="text/javascript" src="../../ExtJS/adapter/ext/ext-base.js"></script>
<!-- ENDLIBS -->
<script type="text/javascript" src="../../ExtJS/ext-all.js"></script>
<script type="text/javascript" src="../../ExtJS/ext-lang-sp.js"></script>
<!--<script type="text/javascript" src="../../ExtJS/examples/ux/fileuploadfield/file-upload.css"></script> -->
<script type="text/javascript" src="../../ExtJS/examples/ux/fileuploadfield/FileUploadField.js"></script>
<title>NORTH COMPASS</title> 
<style type="text/css">
#class .loading-indicator{
	font-size:12px;
	height:18px;
}
.loading-indicator{
	font-size:8pt;
	background-image:url('file:/ExtJS/resources/images/default/grid/loading.gif');
	background-repeat:no-repeat;
	background-position:top left;
	padding-left:20px;
	height:18px;
	text-align:left;
}
#loading{
	position:absolute;
	left:45%;
	top:40%;
	border:1px solid #6593cf;
	padding:2px;
	background:#c3daf9;
	width:150px;
	text-align:center;
	z-index:20001;
}
#loading .loading-indicator{
	border:1px solid #a3bad9;
	background:white url(file:///D|/ExtJs/docs/resources/block-bg.gif) repeat-x;
	color:#003366;
	font:bold 13px tahoma,arial,helvetica;
	padding:10px;
	margin:0;
}
.icon-login {
	background-image:url(file:///D|/images/login.png) !important;
}
p {
	margin:5px;
}
.settings {
	background-image:url(file:///D|/Mis%20Documentos/bhmips/ExtJS/examples/shared/icons/fam/folder_wrench.png);
}
.nav {
	background-image:url(file:///D|/Mis%20Documentos/bhmips/ExtJS/examples/shared/icons/fam/folder_go.png);
}
/* IM window icons */
.user {
    background-image:url(file:///D|/Mis%20Documentos/bhmips/ExtJS/examples/shared/icons/fam/user.gif) !important;
}
</style>

<script language="javascript">
Ext.onReady(function(){
var ds_identificacion = new Ext.data.Store({
	//autoLoad: true,
		proxy: new Ext.data.HttpProxy({url:'Creacion_SQL.php?consulta=3'}),
		reader: new Ext.data.JsonReader({
			root:'topics',
			totalProperty: 'totalCount'			
		},[
			{name:'Identificacion',mapping:'Identificacion'}
			
			]
			)
		});






    // Tab Principal ----------------------------------------------------------------------------
    var tabs = new Ext.TabPanel({
        //renderTo: document.body,
		id: 'tabs',
        activeTab: 0,        
		deferredRender: false,
		frame: true,
        defaults:{autoScroll: true},
		height: 710,
        items:[
			{
                title: 'Formulario de Creación',
				id: 'tab1',
                contentEl: 'div_Contenido',
				style: 'padding:5,5,5,5',
				buttons : [{
					id: 'btn_Continuar01',
					text : 'Guardar',
					iconCls : 'btn_continuar',
					disabled: false,
					handler: function() {
						fn_Actualizar();																		   
					}									
				}],
				buttonAlign:'right'
            }
        ]
    });
	
	//Funcion Tab Principal
    function handleActivate(tab){
        var tab_title 	= tab.title;
		var tab_id		= tab.id;
		tabs.doLayout();
    }
	//Fin Tab Principal
	
	
//------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------
//FORMULARIO DE ACTUALIZACION DE DATOS
//
   
 var tab2 = new Ext.FormPanel({
    	labelAlign: 'top',
		url:  'Creacion_SQL.php?consulta=6',
        title: 'Datos básicos del aspirante',
        bodyStyle:'padding:5px',
		//fileUpload: true,
		//heigth: 700,
		anchor:'80%',
		frame: true,
        items: [{
				xtype: 'fieldset',
                title: 'Información de la Solicitud',
                collapsible: false,
				anchor:'95%',
				//width: 90%,
                items: [{
						layout:'column',
						border:false,
						items:[{
								columnWidth:.5,
								layout: 'form',
								border:false,
								items: [{
											xtype:			'combo',
											fieldLabel:		'Tipo Contrato',
											id: 			'lst_contrato',
											width:			150,
											mode:           'local',
											emptyText:      'Seleccione',
											msgTarget: 		'side',
											triggerAction:  'all',
											forceSelection: true,
											editable:       false,
											name:           'lst_contrato',
											hiddenName:     'hi_lst_contrato',
											displayField:   'name',
											valueField:     'value',
											store:          new Ext.data.JsonStore({
											fields : ['name', 'value'],
											data   : [
													{name : 'Contratista', value: 'Contratista'},
													{name : 'Temporal', value: 'Temporal'},
													{name : 'Outsourcing', value: 'Outsourcing'},
													{name : 'Directo', value: 'Directo'}
													]
												})
										},{
											xtype:	'hidden',
											name:		'txt_session',
											id:		'txt_session',
											value:	'<?php echo $CscLogin; ?>'


										},{	
											xtype:	'textfield',
											fieldLabel:	'Nombres',
											emptyText:	'Nombres', 
											name:		'txt_nombres',
											id:		'txt_nombres',
											width:			150,
											allowBlank:false	
										},{
											xtype:			'combo',
											fieldLabel:		'Tipo Identificación',
											id: 			'lst_identificacion',
											width:			200,
											mode:           'local',
											emptyText:      'Seleccione',
											msgTarget: 		'side',
											triggerAction:  'all',
											forceSelection: true,
											editable:       false,
											name:           'lst_identificacion',
											hiddenName:     'hi_lst_identificacion',
											displayField:   'name',
											valueField:     'value',
											store:          new Ext.data.JsonStore({
											fields : ['name', 'value'],
											data   : [
													{name : 'REGISTRO CIVIL', value: 'REGISTRO CIVIL'},
													{name : 'TARJETA DE IDENTIDAD', value: 'TARJETA DE IDENTIDAD'},
													{name : 'CEDULA DE CIUDADANIA', value: 'CEDULA DE CIUDADANIA'},
													{name : 'CEDULA DE EXTRANJER&Iacute;A', value: 'CEDULA DE EXTRANJER&Iacute;A'},
													{name : 'NIP', value: 'NIP'},
													{name : 'NUIP', value: 'NUIP'}
													]
												})	
										
										},{
											xtype:		'textfield',
											fieldLabel:	'Dirección',
											emptyText:	'Dirección', 
											name:		'txt_direccion',
											id:		'txt_direccion',
											//readOnly: true,
											width:			320
											//allowBlank:false
											
										},{
											xtype:			'combo',
											fieldLabel:		'Cíudad ó Municipio',
											id: 			'lst_ciudad',
											width:			150,
											mode:           'local',
											emptyText:      'Seleccione',
											msgTarget: 		'side',
											triggerAction:  'all',
											forceSelection: true,
											editable:       false,
											name:           'lst_ciudad',
											hiddenName:     'hi_lst_ciudad',
											disabled:true,
											displayField:   'dsc',
											valueField:     'csc',
											selectOnFocus:	true,
											store:  new Ext.data.Store({
											proxy:	new Ext.data.HttpProxy({url:'Creacion_SQL.php?consulta=1'}),
											reader: 	new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'},{name:'dsc', type:'string'}])
											}),
											listeners:{
												select: function(){
												var CodCiud =	document.getElementById('hi_lst_ciudad').value;
													if (CodCiud==1)
														{
														Ext.getCmp('lst_localidad').setDisabled(false);
														document.getElementById('lst_localidad').value='';
														Ext.getCmp('lst_localidad').store.load({waitMsg:'Consultando.', params:{CodCiud:CodCiud}})
														}else {
															document.getElementById('lst_localidad').value='';
															Ext.getCmp('lst_localidad').setDisabled(true);
															}														
													}
												}
										
										},{
											xtype:		'textfield',
											fieldLabel:	'Teléfono Fijo',
											width:	150,
											name:		'txt_telfijo',
//											vtype:	'AlphaNum',
											id:		'txt_telfijo',
											enableKeyEvents:true,
											allowBlank:false,
											listeners:{
												'keypress': function(){
													var Key = document.getElementById('txt_telfijo').value;
													if(Key!=''){
														var Func=Key;
														var Contador=Key.length;
														//alert(Contador)
														if(Contador==1)
															{
																Func="("+Key;
															}
														if(Contador==4)
															{
																Func=Key+")";
															}
														if(Contador==8)
															{
																Func=Key+"-";
															}		
														document.getElementById('txt_telfijo').value=Func;
														}//fin key Empty
													}//fin function
												}			
										},{
											xtype:			'textfield',
											name:			'txt_celular',
											id:			'txt_celular',
											//allowBlank:     false,
											fieldLabel:	    'Teléfono Celular 1',
											enableKeyEvents:true,
											//vtype:	'AlphaNum1',
											width:	150,
											//emptyText:      '',
											listeners:{
												'keypress': function(){
													var Key = document.getElementById('txt_celular').value;
													if(Key!=''){
														var Func=Key;
														var Contador=Key.length;
														//alert(Contador)
														if(Contador==1)
															{
																Func="("+Key;
															}
														if(Contador==4)
															{
																Func=Key+")";
															}
														if(Contador==8)
															{
																Func=Key+"-";
															}		
														document.getElementById('txt_celular').value=Func;
														}//fin key Empty
													}//fin function
												}		
										},{
											xtype:		'textfield',
											fieldLabel:	'Teléfono Celular 2',
											width:	150,
//											vtype:	'AlphaNum2',											
											name:		'txt_telcelular',
											id:		'txt_telcelular',
											enableKeyEvents:true,
											//allowBlank:false,
											listeners:{
												'keypress': function(){
												var Key = document.getElementById('txt_telcelular').value;
													if(Key!=''){
														var Func=Key;
														var Contador=Key.length;
														//alert(Contador)
														if(Contador==1)
															{
																Func="("+Key;
															}
														if(Contador==4)
															{
																Func=Key+")";
															}
														if(Contador==8)
															{
																Func=Key+"-";
															}		
														document.getElementById('txt_telcelular').value=	Func;
														}//fin key Empty
													}
												}
												
										}]
								},{
						
						layout:'column',
						border:false,
						items:[{
							columnWidth:.5,
							layout: 'form',
							border:false,
							items: [{
											xtype:			'combo',
											fieldLabel:		'Empresa',
											id: 			'lst_empresa',
											width:			150,
											mode:           'local',
											emptyText:      'Seleccione',
											msgTarget: 		'side',
											triggerAction:  'all',
											forceSelection: true,
											editable:       false,
											name:           'lst_empresa',
											hiddenName:     'hi_lst_empresa',
											//disabled:true,
											displayField:   'dsc',
											valueField:     'csc',
											selectOnFocus:	true,
											store:  new Ext.data.Store({
											autoLoad: true,
											proxy:	new Ext.data.HttpProxy({url:'Creacion_SQL.php?consulta=4'}),
											reader: 	new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'},{name:'dsc', type:'string'}])
											})
								
								
								//xtype:	'textfield',
								//name:	'txt_empresa',
								//fieldLabel:	'Empresa',
								//allowBlank:	 false,
								//emptyText:	'Empresa',
								//width:		250	
							},{
								xtype:	'textfield',
								name:	'txt_apellidos',
								fieldLabel:	'Apellidos',
								allowBlank:	 false,
								emptyText:	'Apellidos',
								width:		200	
							},{
								xtype:	'textfield',
								name:	'txt_identificacion',
								allowBlank:  false,
								id:	'txt_num_doc',
								//value:'',
								fieldLabel:	'Nº Identificación'	
							},{
								xtype:			'combo',
								fieldLabel:		'Departamento',
								id: 			'lst_departamento',
								width:			150,
								mode:           'local',
								emptyText:      'Seleccione',
								msgTarget: 		'side',
								triggerAction:  'all',
								forceSelection: true,
								editable:       false,
								name:           'lst_departamento',
								hiddenName:     'hi_lst_departamento',
								displayField:   'dsc',
								valueField:     'csc',
								store:  new Ext.data.Store({
											autoLoad: true,	
								proxy:	new Ext.data.HttpProxy({url:'Creacion_SQL.php?consulta=0'}),
								reader: 	new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'},{name:'dsc', type:'string'}])
								}),
								listeners:{
									select : function (){
								var CodDepar = document.getElementById('hi_lst_departamento').value;
								Ext.getCmp('lst_ciudad').store.load({waitMsg:'Consultando', params:{CodDep:CodDepar}});
								Ext.getCmp('lst_ciudad').setDisabled(false);
								document.getElementById('lst_ciudad').value='';
										}
									}							
								},{
									xtype:			'combo',
									fieldLabel:		'Localidad o Barrio',
									id: 			'lst_localidad',
									width:			150,
									mode:           'local',
									emptyText:      'Seleccione',
									msgTarget: 		'side',
									triggerAction:  'all',
									forceSelection: true,
									editable:       false,
									name:           'lst_localidad',
									hiddenName:     'hi_lst_localidad',
									displayField:   'dsc',
									disabled:true,
									valueField:     'csc',
									store:  new Ext.data.Store({
									proxy:	new Ext.data.HttpProxy({url:'Creacion_SQL.php?consulta=2'}),
									reader: 	new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'},{name:'dsc', type:'string'}])
								}), 
								listeners: {
									select: function(){
										var cod = document.getElementById('hi_lst_localidad').value;
										//alert(cod);
										if (cod==000){
										Ext.getCmp('panel1').expand(true);
										}else{Ext.getCmp('panel1').collapse(true);document.getElementById('txt_barrio').value='';}
										}
									}
							},{
										xtype:'fieldset',
										title: 'Descripcion Barrio',
										autoHeight:true,
										id:	'panel1',
										width:	300,	
										animated:'',
										animCollapse:true,							
       									collapsed:true,
       									items :[{
											  xtype: 'compositefield',
											  anchor:	'100%',
											  fieldLabel: 'Diligencie nombre Barrio ó Localidad',
											  items: [{
														xtype:	'textfield',
														width:	250,
														id:	'txt_barrio',
														name:	'txt_barrio'	
												
													}]
										}]
									//}]
							},{
								xtype:	'textfield',
								name:	'txt_cargo',
								allowBlank:  false,
								width:	250,
								fieldLabel:	'Cargo al que aspira'
							}]
						}]
					
					}]
				},{
					fieldLabel:	'Observaciones',
					xtype:	'textarea',
					name:	'txt_observaciones',
					width:	600		
				},{
					xtype:'fieldset',
					id: 'fieldUpload',
					disabled: true,
					width:	600,		
					fieldLabel:	'Documentos permitidos WORD ó PDF',
					html:'<iframe src="" width="98%" id="Documentos"></iframe>'
				}//],
				//	buttonAlign: 'left',De	Asunto	Recibido	Tamaño	Categorías	
				//	buttons: [{
				//				text:	'Subir',
				//				handler: function(){
				//				tab2.getForm().submit({
				//					url: 'Creacion_SQL.php?consulta=6',
				//					waitMsg: 'Subiendo Archivo al servidor...',
				//					success: function(fp, o){
				//						msg('Cargando', 'Proceso de cargue de informacion');
				//					}
				//				});
							
					//	}
					
				//}
				],buttons : [{
					id: 'btn_Continuar01',
					text : 'Guardar',
					iconCls : 'btn_continuar',
					disabled: false,
					handler: function() {
						fn_validar();																		   
					}									
				}],
				buttonAlign:'right'
			}]
			

	
      
  }); ///////////////////////////////END FORM
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
  
  
  
  var w1 =  new Ext.Window({ 
  		//id:'cdsw',
		layout: 'fit',
		modal: true,
		width:700, 
		closable: false,
		height:500, 
		title:'<div id="User">Dirección de usuario</div>', 
		html: '<iframe src="direcciones.html" id="Contenido" width="98%" height="98%"></iframe>',
		//html:'<iframe src="direcciones.html" width="98%" height="98%" id="Documentos"></iframe>',
		scripts: true,
		buttons:[{
			text: 'Agregar',
			handler: function(){
				//var var1 = document.getElementById('Documentos').value;
			
				var Direccion = getDocFrame('Contenido').getElementById("direccion").value;
				//alert(Direccion)
				w1.hide();
				document.getElementById('txt_direccion').value=Direccion;
				getDocFrame('Contenido').getElementById("direccion").value='';
				//	alert(var1.document.getElementById('direccion').value);
				//alert(direccion+'hola')
				}
			}]
			
	});
//Ext.getCmp('txt_direccion').on('focus', function(){
//	var Nombres = document.getElementById('txt_nombres').value; 
		//document.getElementById('User').innerHTML='Hola a todos';
//	w1.show();
//	});
	
  
  function getDocFrame(idFrame){
	    var myIFrame = document.getElementById(idFrame);
		return  myIFrame.contentWindow.document;
		alert("hola")
  }

  

Ext.getCmp('txt_num_doc').on('blur', function(){
	var Empresa = document.getElementById('hi_lst_empresa').value;
	var Identificacion = document.getElementById('txt_num_doc').value;	
		if (Empresa=='' || Identificacion=='')
				{
					Ext.Msg.alert('Error', 'Debe diligenciar la información de numero  Identificación y Empresa para poder cargar la información')
				return false;
				}
				Ext.getCmp('fieldUpload').setDisabled(false);
				document.getElementById('Documentos').src='UploadPdf.php?identificacion='+Identificacion+'&Empresa='+Empresa;
	});
Ext.getCmp('lst_empresa').on('select', function(){
	var Empresa = document.getElementById('hi_lst_empresa').value;
	var Identificacion = document.getElementById('txt_num_doc').value;	
		if (Empresa=='' || Identificacion=='')
				{
					Ext.Msg.alert('Error', 'Debe diligenciar la información de numero  Identificación y Empresa para poder cargar la información')
				return false;
				}
				Ext.getCmp('fieldUpload').setDisabled(false);
				document.getElementById('Documentos').src='UploadPdf.php?identificacion='+Identificacion+'&Empresa='+Empresa;
	});	
	


tab2.render('form_user');
/////////////////////////SE ENVIAS LOS DATOS DEL CAMPO CEDULA///////////////
function fn_validar(){
	var val = document.getElementById('txt_num_doc').value;
		if (val!=''){
			ds_identificacion.load({waitMsg:'Consultando..', params:{txt_num_doc: val}});
				
		}		
};


	ds_identificacion.on('load', function(store){
	var cantidad = ds_identificacion.getTotalCount();
	var Identificacion = ds_identificacion.getAt(0).data.Identificacion;
		if (Identificacion!='')
			{
				var msg = 'Este  documento ya esta registrado en el sistema, <div align="center"><b>Desea crearlo !Nuevamente¡'+Identificacion+'</b></div>';
				Ext.MessageBox.confirm("Error", msg, function (btn, text){
					if (btn=='yes')
						{
						fn_enviar();
						}
					
					});
				}else{
					fn_enviar();
					}
				
		
			
			
	});
 function fn_enviar(){
	// alert("Entra en la funcion");
	 	tab2.form.submit({
			success: function(){
					Ext.Msg.alert("Respuesta", 'Usuario Creado Exitosamente',function (btn, text){
						if (btn=='ok')
							{
							tab2.form.reset();	
							Ext.getCmp('fieldUpload').setDisabled(true);
							
							}
						})
				},
				failure:function (){
					var msg2='Error en la creación de el usuario valide su información, <div align="center">Recuerde los campos en rojo son Obligatorios</div>';
					Ext.Msg.alert("Error", msg2);
					}
			
			})
	 
	 
	 };
		
});																				
</script>
</head>
	<body>
			<div id="div_Contenido">
			<div id="div_Buscar"></div>
	           <div style="height:3px;">
                          
               </div>
        	<div id="form_user"></div> 
        </div>       
    </body>
</html>
