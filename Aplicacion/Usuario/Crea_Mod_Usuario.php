<?php include("Conexion.php");
echo $data;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="/../../ExtJS/resources/css/ext-all.css">
<link rel="stylesheet" type="text/css" href="/../../ExtJS/welcomeinc.css">
<!-- GC -->
<!-- LIBS -->

<script type="text/javascript" src="/../../ExtJS/adapter/ext/ext-base.js"></script>
<!-- ENDLIBS -->
<script type="text/javascript" src="/../../ExtJS/ext-all.js"></script>
<script type="text/javascript" src="/../../ExtJS/ext-lang-sp.js"></script>
<title>NorthCompass</title> 
<style type="text/css">
#class .loading-indicator{
	font-size:12px;
	height:18px;
}
.loading-indicator{
	font-size:8pt;
	background-image:url('../../ExtJS/resources/images/default/grid/loading.gif');
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
	background:white url(../../ExtJs/docs/resources/block-bg.gif) repeat-x;
	color:#003366;
	font:bold 13px tahoma,arial,helvetica;
	padding:10px;
	margin:0;
}
.icon-login {
	background-image:url(../../images/login.png) !important;
}
p {
	margin:5px;
}
.settings {
	background-image:url(ExtJS/examples/shared/icons/fam/folder_wrench.png);
}
.nav {
	background-image:url(ExtJS/examples/shared/icons/fam/folder_go.png);
}
/* IM window icons */
.user {
    background-image:url( ./ExtJS/examples/shared/icons/fam/user.gif ) !important;
}
.iconexcel{
    background-image:url( ../../Images/Iconos/excel_ico.gif) !important;
}
.iconnborrar{
background-image:url( ../../Images/Iconos/application_delete.png) !important;
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
		//autoScroll: true,
        defaults:{autoScroll: true},
		bodyStyle:'padding: 10px',
		height: 620,
		
        items:[
			{
                title: 'Clientes',
				id: 'tab1',
                contentEl: 'div_Contenido',
				style: 'padding:5,5,5,5'
				
            }
        ]
    });
	
	
	
	
var tab2 = new Ext.FormPanel({
//	labelAlign: 'top',
	url:  'Crea_Mod_Usuario_SQL.php?consulta=2',
	bodyStyle:'padding:5px',
	heigth: 600,
	items: [{
			xtype: 'fieldset',
			title: 'Información Cliente',
			collapsible: false,
			items: [{
					layout:'column',
					border:false,
					items:[{
						columnWidth:.5,
						layout: 'form',
						border:false,
						items: [{	
							xtype:	'hidden',
							fieldLabel:	'Nombre',
							name:	'Csc_Login',
							id:		'Csc_Login',
							width:	150
					},{
							xtype:	'textfield',
							fieldLabel:	'Usuario',
							name:	'Usuario',
							allowBlank: false,
							id:	'Usuario',
							width:	200
					},{
							xtype:	'textfield',
							fieldLabel:	'Contrase&ntilde;a',
							name:	'PassWord',
							id:	'PassWord',
							width:	150
						},{
							xtype:	'textfield',
							fieldLabel:	'Nombres',
							name:	'Nombres',
							allowBlank: false,
							id:	'Nombres',
							width:	250
						},{
							xtype:	'textfield',
							fieldLabel:	'Apellidos',
							name:	'Apellidos',
							id:	'Apellidos',
							width:	250
						},{
							xtype:	'textfield',
							fieldLabel:	'Mail',
							name:	'Mail',
							id:	'Mail',
							vtype: 'email',
							width:	250
						
							
										
								}]
					},{
						columnWidth:.5,
						layout: 'form',
						border:false,
						items: [{
							width:          120,
							xtype:          'combo',
							fieldLabel:	'Estado',
							mode:           'local',
							value:          '---',
							triggerAction:  'all',
							forceSelection: true,
							name:           'lst_Estado',
							hiddenName:     'hi_lst_Estado',
							id: 'lst_Estado',
							displayField:   'name',
							valueField:     'value',
							store:          new Ext.data.JsonStore({
								fields: ['name', 'value'],
									data:[
										{name:'Activo', value:'1'},
										{name:'Bloqueado', value:'2'}
										]
								})
						},{
									width:          200,
									xtype:          'combo',
									fieldLabel:	'Empresa',
									mode:           'local',
									value:          '---',
									triggerAction:  'all',
									forceSelection: true,
									name:           'lst_empresa',
									hiddenName:     'hi_lst_empresa',
									id: 'lst_empresa',
									displayField:   'dsc',
									valueField:     'csc',
									store:          new Ext.data.Store({
										autoLoad: true,
										proxy: new Ext.data.HttpProxy({url:'Crea_Mod_Usuario_SQL.php?consulta=0'}),
										reader: new Ext.data.JsonReader({root:'root'},[{name:'csc'},{name:'dsc'}])
									})
								},{
									width:          120,
									xtype:          'combo',
									fieldLabel:	'Perfil',
									mode:           'local',
									value:          '---',
									triggerAction:  'all',
									forceSelection: true,
									name:           'lst_perfil',
									hiddenName:     'hi_lst_perfil',
									id: 'lst_perfil',
									displayField:   'name',
									valueField:     'value',
									store:          new Ext.data.JsonStore({
										fields: ['name', 'value'],
											data:[
												{name:'Administrador', value:'1'},
												{name:'Profesional', value:'3'},
												{name:'Cliente', value:'2'}
												]
										})
																		
								}],
								buttons: [{
											text: 'Crear o modificar',
											handler: function(){
												EnviarForm();
												}
										},{
											text: 'Limpiar',
											handler: function(){
												tab2.form.reset();
												}
											}]				
							 
						  }]
				   }]		
		}]
 });
//	tab3.render('div_Buscar2');
	tab2.render('div_Buscar');
	//------------------------------------------------------------------------------------------

	var ds_Clientes = new Ext.data.Store({
	autoLoad: true,
    proxy: new Ext.data.HttpProxy({url:'Crea_Mod_Usuario_SQL.php?consulta=1'}),
     reader: new Ext.data.JsonReader({
       totalProperty: 'totalCount',
         root: 'root'
        }, [
			{name: 'Csc_Login', type: 'float'},//ya 
			{name: 'Usuario', type: 'string'},
            {name: 'PassWord', type: 'string'},	
			{name: 'Nombres', type: 'string'},			
            {name: 'Apellidos', type: 'string'},
			{name: 'Mail', type: 'string'},
			{name: 'Estado', type: 'string'},
			{name: 'Perfil', type: 'string'},
			{name: 'Empresa', type: 'string'}
			
					
        ])
    });
	
	//-------------------------------------------------
	
	
	 
	//------------------------------------------
	
	//////////////////////////COLUM MODELS
	var cm = new Ext.grid.ColumnModel({

        defaults: {
            sortable: true
        },
        columns: [
            new Ext.grid.RowNumberer(),
			{
                id: 'csc_Login',
                header: 'Csc',
                dataIndex: 'Csc_Login',
				hidden: true,
                width: 60
            },{
                id: 'usuario',
                header: 'Usuario',
			   // format : "d/m/Y",
                dataIndex: 'Usuario',
                width: 200
            },{
                id: 'passWord',
                header:	'PassWord',
			    dataIndex: 'PassWord',
                width: 120
            },{
                id: 'nombres',
                header:	'Nombres',
			    dataIndex: 'Nombres',
                width: 130
            },{
                id: 'apellidos',
                header: 'Apellidos',
                hidden: false,
				dataIndex: 'Apellidos',
                width: 130
            },{
                id: 'mail',
                header: 'Mail',
                hidden: false,
				dataIndex: 'Mail',
                width: 230
            
			},{
                id: 'estado',
                header: 'Estado',
                hidden: false,
				dataIndex: 'Estado',
                width: 90
			},{
                id: 'perfil',
                header: 'Perfil',
                hidden: false,
				dataIndex: 'Perfil',
                width: 80
			},{
                id: 'empresa',
                header: 'Empresa',
                hidden: false,
				dataIndex: 'Empresa',
                width: 80			
		}]
	
    });
	
	
	
	 var grid = new Ext.grid.EditorGridPanel({
        store: ds_Clientes,//store,
        cm: cm,
		loadMask: true,
        renderTo: 'editor-grid',
        width: '100%',
        height: 250,
//        autoExpandColumn: 'usuario', // column with this id will be expanded
        title: 'Clientes',
        frame: false,
        collapsible: false,
		animCollapse: false,
		// specify the check column plugin on the grid so the plugin is initialized
        //plugins: checkColumn,
        clicksToEdit: 1	
    });
	
	 

grid.on('cellclick', function(grid, rowIndex, columnIndex, e){
		var record = grid.getStore().getAt(rowIndex);
		var fieldName = grid.getColumnModel().getDataIndex(columnIndex);
		var data = record.get(fieldName);
		var Csc_Login = ds_Clientes.getAt(rowIndex).data.Csc_Login;
		var Usuario = ds_Clientes.getAt(rowIndex).data.Usuario;
		var PassWord = ds_Clientes.getAt(rowIndex).data.PassWord;
		var Nombres = ds_Clientes.getAt(rowIndex).data.Nombres;
		var Apellidos = ds_Clientes.getAt(rowIndex).data.Apellidos;
		var Mail = ds_Clientes.getAt(rowIndex).data.Mail;
		var Perfil = ds_Clientes.getAt(rowIndex).data.Perfil;
		var Empresa = ds_Clientes.getAt(rowIndex).data.Empresa;
		var Estado = ds_Clientes.getAt(rowIndex).data.Estado;
			Estado = Estado.replace('<SPAN style="color:green">', "");
			Estado = Estado.replace('<SPAN style="color:red">', "");
			Estado = Estado.replace("</SPAN>", "");
			document.getElementById('Csc_Login').value=Csc_Login;
			document.getElementById('Usuario').value=Usuario;
			document.getElementById('PassWord').value=PassWord;
			document.getElementById('Nombres').value=Nombres;
			document.getElementById('Apellidos').value=Apellidos;
			document.getElementById('Mail').value=Mail;
			document.getElementById('lst_perfil').value=Perfil;
			document.getElementById('lst_empresa').value=Empresa;
			document.getElementById('lst_Estado').value=Estado;
			
		
});
//////////////////////////////////////////////////////





	
	function EnviarForm(){
		tab2.form.submit({
			success: function(form, action){
				  //var jsonData= Ext.util.JSON.decode(response.responseText);	
				  	 	Ext.Msg.confirm("Respuesta",action.result.msg, function(btn, text){
							if (btn=='yes')
								{
								ds_Clientes.load({waitMsg:'Consultando',params:{}});
								tab2.form.reset();		
								}
							});
				},
			failure: function()
				{
					Ext.Msg.alert("Respuesta","Valide la Informacion los datos en color rojo son obligatorios");
				
				}	
			
			
			});
		
		}
function EnviarTerceros(){
	formTerceros.form.submit({
			success: function(form, action){
				  //var jsonData= Ext.util.JSON.decode(response.responseText);	
				  	 	Ext.Msg.confirm("Respuesta",action.result.msg, function(btn, text){
							if (btn=='yes')
								{
								var CscCliente = document.getElementById('CscCliente').value;
								ds_Terceros.load({waitMsg:'Consultando',params:{CscCliente:CscCliente}});
								document.getElementById('txt_WinCsc').value='';
								document.getElementById('txt_WinName').value='';
								document.getElementById('txt_WinNIdentificacion').value='';
								document.getElementById('txt_WinTelefono').value='';
								document.getElementById('txt_WinCelular').value='';
								document.getElementById('txt_WinContacto').value='';
								document.getElementById('winlst_tipo').value='';
								document.getElementById('txt_WinDireccion').value='';
								document.getElementById('txt_WinMail').value='';
								document.getElementById('Winlst_estado').value='';	
								}
							});
				},
			failure: function()
				{
					Ext.Msg.alert("Respuesta","Valide la Informacion los datos en color rojo son obligatorios");
				
				}	
			
			
			});
		
		}	
});

</script>
</head>
	<body>
    	<div id="div_Contenido">
       			<div id="div_Buscar2"></div>
                <div id="div_Buscar"></div>
                 <!--            <div style="height:3px;"></div> -->
        		<div id="editor-grid"></div>
            </div>       
           
    </body>
</html>