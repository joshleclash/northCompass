<?php
include ("conexion.php");
session_start();
$CscLogin=$_SESSION["Csc"];
$time=date("d/m/Y");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta name="content"  content="text/html;" http-equiv="content-type" charset="utf-8">
<link rel="stylesheet" type="text/css" href="../../ExtJS/resources/css/ext-all.css">
<!--<link rel="stylesheet" type="text/css" href="../../ExtJS/resources/css/xtheme-gray.css">-->
<link rel="stylesheet" type="text/css" href="../../ExtJS/welcomeinc.css">
<link rel="stylesheet" type="text/css" href="../../ExtJS/Examples/form/file-upload.css">
<!-- GC -->
<!-- LIBS -->
<script type="text/javascript" src="../../ExtJS/adapter/ext/ext-base.js"></script>
<!-- ENDLIBS -->
<script type="text/javascript" src="../../ExtJS/ext-all.js"></script>
<script type="text/javascript" src="../../ExtJS/ext-lang-sp.js"></script>
<script type="text/javascript" src="../../ExtJS/Examples/ux/fileuploadfield/file-upload.css"></script> 
<script type="text/javascript" src="../../ExtJS/Examples/ux/fileuploadfield/FileUploadField.js"></script> 
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

    // Tab Principal ----------------------------------------------------------------------------
    var tabs = new Ext.TabPanel({
        renderTo: document.body,
		id: 'tabs',
        activeTab: 0,        
		deferredRender: false,
		frame: true,
        defaults:{autoScroll: true},
		height: 700,
		items:[
			{
                title: 'Creacion',
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
        title: 'Datos Basicos',
        bodyStyle:'padding:5px',
		//fileUpload: true,
		heigth: 700,
        items: [{
				xtype: 'fieldset',
                title: 'REALIZACION DEL SERVICIO',
                collapsible: false,
				heigth: 600,
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
											emptyText:      'Selecione Contrato',
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
											width:			150,
											allowBlank:false	
										},{
											xtype:			'combo',
											fieldLabel:		'Tipo Identificacion',
											id: 			'lst_identificacion',
											width:			200,
											mode:           'local',
											emptyText:      'Selecione Contrato',
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
											data   : [//Cedula Extranjeria//NIP// NUIP//Registro civil//Tarjeta de identidad//Cédula de ciudadanía
													{name : 'REGISTRO CIVIL', value: 'REGISTRO CIVIL'},
													{name : 'TARJETA DE IDENTIDAD', value: 'TARJETA DE IDENTIDAD'},
													{name : 'CEDULA DE CIUDADANIA', value: 'CEDULA DE CIUDADANIA'},
													{name : 'CEDULA EXTRANGERIA', value: 'CCEDULA EXTRANGERIA'},
													{name : 'NIP', value: 'NIP'},
													{name : 'NUIP', value: 'NUIP'}
													
													
													
													
													]
												})	
										
										},{
											xtype:		'textfield',
											fieldLabel:	'Direccion',
											emptyText:	'Direccion', 
											name:		'txt_direccion',
											width:			220,
											allowBlank:false	
																
											
										},{
											xtype:			'combo',
											fieldLabel:		'Ciudad o Municipio',
											id: 			'lst_ciudad',
											width:			150,
											mode:           'local',
											emptyText:      'Selecione Ciudad',
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
											fieldLabel:	'Telefono Fijo',
											emptyText:	'Telefono Fijo', 
											name:		'txt_telfijo',
											allowBlank:false	
										},{
											xtype:		'textfield',
											fieldLabel:	'Telefono Celular-2',
											emptyText:	'Telefono Celular', 
											name:		'txt_telcelular',
											allowBlank:false		
										}]
								},{
						
						layout:'column',
						border:false,
						items:[{
							columnWidth:.5,
							layout: 'form',
							border:false,
							items: [{
								xtype:	'textfield',
								name:	'txt_empresa',
								fieldLabel:	'Empresa',
								allowBlank:	 false,
								emptyText:	'Empresa',
								width:		250	
							},{
								xtype:	'textfield',
								name:	'txt_apellidos',
								fieldLabel:	'Apellidos',
								allowBlank:	 false,
								emptyText:	'apellidos',
								width:		200	
							},{
								xtype:	'numberfield',
								name:	'txt_identificacion',
								allowBlank:  false,
								fieldLabel:	'Nº Identificacion'	
							},{
								xtype:			'combo',
								fieldLabel:		'Departamento',
								id: 			'lst_departamento',
								width:			150,
								mode:           'local',
								emptyText:      'Selecione Departamento',
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
									emptyText:      'Selecione Municipio',
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
											  fieldLabel: 'Diligencie Nombre Barrio o Localidad',
											  items: [{
														xtype:	'textfield',
														width:	250,
														id:	'txt_barrio',
														name:	'txt_barrio'	
												
													}]
										}]
									//}]
							},{
								xtype:			'textfield',
								name:			'txt_celular',
								allowBlank:     false,
								fieldLabel:	    'Telefono Celular-1',
								width:	180,
								emptyText:      'Telefono Celular...'		
							},{
								xtype:	'textfield',
								name:	'txt_cargo',
								allowBlank:  false,
								width:	250,
								fieldLabel:	'Cargo que Aspira',
								buttonText: 'Seleccione Archivo'
							}]
						}]
					
					}]
				},{
					fieldLabel:	'Observaciones',
					xtype:	'textarea',
					name:	'txt_observaciones',
					width:	700		
				},{
					xtype:	'displayfield',
					value:	'(Seleccione Documento)'	
				},{
					xtype:'fileuploadfield',
					fieldLabel:	'Documentos permitido .doc - WORD o .pdf - ACROBAT READER',
					name: 'archivo',
					id:'archivo',
					width:600,
					buttonText:'Examinar..'
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
				]
			}]
			

	
      
  }); ///////////////////////////////END FORM

tab2.render('form_user');
/////////////////////////SE ENVIAS LOS DATOS DEL CAMPO CEDULA///////////////
//function fn_validar(){
		
//	var val = document.getElementById('txt_num_doc').value;
		//alert('Consultando Documento'+val);
	//ds_identificacion.load({waitMsg:'Consultando..', params:{txt_num_doc: val}});	
		
//};

var session= document.getElementById('txt_session').value;
if (session==''){
	
	Ext.Msg.alert('Error', 'Es nesesario que se loguee de nuevo se perdio  su SESSION', function(btn,text){
		//alert(btn);
		//window.location='../../Default.php';
		window.close;
		});
	
	}

 function fn_Actualizar(){ 

		Ext.getCmp('btn_Continuar01').setDisabled(true);
		tab2.form.submit({
		reset : false,
		success : function(form, action){
			obj = Ext.util.JSON.decode(action.response.responseText);
			//alert(obj)
			Ext.Msg.alert('Confirmacion', 'Su Solicitud a sido guardada Correctamente  con el NUMERO:'+obj.bien.csc+'', function(btn, text){
				if (btn == 'ok'){
					tab2.form.reset();	
				Ext.getCmp('btn_Continuar01').setDisabled(false);
				}
			})					
		},
		failure : function() {
			var msg='ESTE ESTUDIO DE SEGURIDAD YA HA SIDO RECHAZADO,<br/> <div align="center">POR FAVOR COMUNIQUECE CON NOTH COMPASS PARA MAYOR INFORMACION.</div> <div align="center">Desea Continuar con el proceso?	</div>';						
			Ext.Msg.confirm('Error', msg, function(btn, text){
				//alert(btn)
				if (btn == 'yes'){
				Ext.getCmp('btn_Continuar01').setDisabled(false);							
				}else if (btn == 'no'){
					tab2.form.reset();
				Ext.getCmp('btn_Continuar01').setDisabled(false);
					}false			})
		},
		scope : tab2
	});	
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