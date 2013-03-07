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
		height: 420,
		
        items:[
			{
                title: 'Clientes',
				id: 'tab1',
                contentEl: 'div_Contenido',
				style: 'padding:5,5,5,5'
				
            }
        ]
    });
	
	
	var ds_Terceros = new Ext.data.Store({
	//autoLoad: true,
    proxy: new Ext.data.HttpProxy({url:'Crea_Mod_Cliente_SQL.php?consulta=3'}),
     reader: new Ext.data.JsonReader({
       totalProperty: 'totalCount',
         root: 'root'
        }, [
			{name: 'Csc_Terceros', type: 'float'},//ya 
			{name: 'Dsc_Terceros', type: 'string'},
            {name: 'Identificacion', type: 'string'},	
			{name: 'T_Identificacion', type: 'string'},			
            {name: 'Direccion', type: 'string'},
			{name: 'Telefono', type: 'string'},
			{name: 'Celular', type: 'string'},
			{name: 'Contacto', type: 'string'},
			{name: 'Email', type: 'string'},
			{name: 'Estado_Csc', type: 'string'}
			
					
        ])
    });
	
	
var formTerceros = new Ext.FormPanel({//Ext.TabPanel({
        deferredRender: false,
		frame: true,
		url:  'Crea_Mod_Cliente_SQL.php?consulta=4',
        defaults:{autoScroll: true},
		bodyStyle:'padding: 1px',
		height: 560,
		items:[{
			xtype: 'tabpanel',
			activeTab: 0, 
			bodyStyle:'padding: 10px', 
			items:[{
				layout: 'column',
				title:	'Informacion Terceros',
				items:[{
					columnWidth:.5,
					layout: 'form',
					border:false,
					items: [{//CscCliente
							xtype:	'hidden',
							fieldLabel:	'Nombre',
							name:	'CscCliente',
							id:		'CscCliente',
							width:	150
					},{
							xtype:	'hidden',
							fieldLabel:	'Nombre',
							name:	'txt_WinCsc',
							allowBlank: false,
							id:	'txt_WinCsc',
							width:	150
					},{
							xtype:	'textfield',
							fieldLabel:	'Nombre',
							name:	'txt_WinName',
							id:	'txt_WinName',
							width:	150
						},{
							xtype:	'textfield',
							fieldLabel:	'Numero Identificacion',
							name:	'txt_WinNIdentificacion',
							allowBlank: false,
							id:	'txt_WinNIdentificacion',
							width:	150
						},{
							xtype:	'textfield',
							fieldLabel:	'Telefono',
							name:	'txt_WinTelefono',
							id:	'txt_WinTelefono',
							width:	150
						},{
							xtype:	'textfield',
							fieldLabel:	'Contacto',
							name:	'txt_WinContacto',
							id:	'txt_WinContacto',
							width:	150
						},{
							width:          120,
							xtype:          'combo',
							fieldLabel:	'Estado',
							mode:           'local',
							value:          '---',
							triggerAction:  'all',
							forceSelection: true,
							name:           'Winlst_estado',
							hiddenName:     'hi_Winlst_estado',
							id: 'Winlst_estado',
							displayField:   'name',
							valueField:     'value',
							store:          new Ext.data.JsonStore({
								fields: ['name', 'value'],
									data:[
										{name:'Activo', value:'1'},
										{name:'Inactivo', value:'0'}
										]
								})
						}]
			},{ 
				columnWidth:.5,
				layout: 'form',
				border:false,
				items: [{
							width:          150,
							xtype:          'combo',
							fieldLabel:	'Tipo Identificacion',
							mode:           'local',
							value:          '---',
							triggerAction:  'all',
							forceSelection: true,
							name:           'lst_tipo',
							allowBlank: false,
							hiddenName:     'hi_winlst_tipo',
							id: 'winlst_tipo',
							displayField:   'dsc',
							valueField:     'csc',
							store:          new Ext.data.Store({
								autoLoad: true,
								proxy: new Ext.data.HttpProxy({url:'Crea_Mod_Cliente_SQL.php?consulta=0'}),
								reader: new Ext.data.JsonReader({root:'root'},[{name:'csc'},{name:'dsc'}])
							})
					},{
						xtype:	'textfield',
						fieldLabel:	'Direccion',
						name:	'txt_WinDireccion',
						allowBlank: false,
						id:	'txt_WinDireccion',
						width:	150
					},{
						xtype:	'textfield',
						fieldLabel:	'Celular',
						name:	'txt_WinCelular',
						id:	'txt_WinCelular',
						width:	150
					},{
						xtype:	'textfield',
						fieldLabel:	'Correo Electronico',
						name:	'txt_WinMail',
						id:	'txt_WinMail',
						vtype: 'email',
						width:	150
					
			
						}],buttons:[{
							text:'Crear o Modificar',
							handler: function(){
								EnviarTerceros();
							}
						},{
							text: 'Borrar',
							handler: function(){
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
							}]
			},{
				columnWidth:1.1,
				layout: 'form',
				border:false,
				items: [{
						xtype:	'fieldset',
						title: 'Informacion Terceros',
						anchor: '90%',
						items:[{
							height: 130,
							xtype: 'grid',
							id: 'grid_Terceros',
							cm: new Ext.grid.ColumnModel([
									   {header: "csc", width: 30, dataIndex:'Csc_Terceros', hidden: true},
									   {header: "Nombres", width: 150,dataIndex:'Dsc_Terceros'},
									   {header: "T-Identificacion", width: 100,dataIndex:'T_Identificacion'},
									   {header: "N-Identificacion", width: 120,dataIndex:'Identificacion'},
									   {header: "Tel", width: 80,dataIndex:'Telefono'},
									   {header: "Movil", width:90,dataIndex:'Celular'},
									   {header: "Dirección", width: 100,dataIndex:'Direccion'},
									   {header: "Contacto", width: 90,dataIndex:'Contacto'},
									   {header: "Email", width: 90,dataIndex:'Email'},
									   {header: "Estado", width: 80,dataIndex:'Estado_Csc'}
									   
							]),
								store:  ds_Terceros
							}]
						}]
			}]
		}]
		
	}]
});
	
var tab2 = new Ext.FormPanel({
//	labelAlign: 'top',
	url:  'Crea_Mod_Cliente_SQL.php?consulta=2',
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
									xtype:	'textfield',
									id:	'txt_nombre',
									fieldLabel:	'Nombre',
									name:	'txt_nombre',
									width:	300
								},{
									xtype:	'textfield',
									id:	'txt_identificacion',
									fieldLabel:	'N&deg; Identificacion',
									name:	'txt_identificacion',
									allowBlank: false,
									width:	300
								},{
									xtype:	'textfield',
									id:	'txt_telefono',
									fieldLabel:	'Telefono',
									name:	'txt_telefono',
									width:	300
									
								},{
									xtype:	'textfield',
									id:	'txt_contacto',
									fieldLabel:	'Contacto',
									name:	'txt_contacto',
									width:	300
								},{
									width:          200,
									xtype:          'combo',
									fieldLabel:	'Estado',
									mode:           'local',
									value:          '---',
									triggerAction:  'all',
									forceSelection: true,
									name:           'lst_estado',
									hiddenName:     'hi_lst_estado',
									id: 'lst_estado',
									displayField:   'name',
									valueField:     'value',
									store:          new Ext.data.JsonStore({
										fields: ['name', 'value'],
											data:[
												{name:'Activo', value:'1'},
												{name:'Inactivo', value:'0'}
												]
										})
										
								}]
					},{
						columnWidth:.5,
						layout: 'form',
						border:false,
						items: [{
									width:          200,
									xtype:          'combo',
									fieldLabel:	'Tipo Identificacion',
									mode:           'local',
									value:          '---',
									triggerAction:  'all',
									forceSelection: true,
									name:           'lst_tipo',
									hiddenName:     'hi_lst_tipo',
									id: 'lst_tipo',
									displayField:   'dsc',
									valueField:     'csc',
									store:          new Ext.data.Store({
										autoLoad: true,
										proxy: new Ext.data.HttpProxy({url:'Crea_Mod_Cliente_SQL.php?consulta=0'}),
										reader: new Ext.data.JsonReader({root:'root'},[{name:'csc'},{name:'dsc'}])
									})
								},{
									xtype:	'textfield',
									id:	'txt_direccion',
									fieldLabel:	'Direccion',
									name:	'txt_direccion',
									width:	300
								},{
									xtype:	'textfield',
									id:	'txt_movil',
									fieldLabel:	'Telefono Movil',
									name:	'txt_movil',
									width:	300
								},{
									xtype:	'textfield',
									id:	'txt_mail',
									fieldLabel:	'Mail',
									vtype:'email',
									name:	'txt_mail',
									width:	300
								},{
								xtype:	'numberfield',
								fieldLabel:	'Valor Solicitud',
								name:	'txt_Val',
								id:	'txt_Val',
								//vtype: 'email',
								width:	150		
								},{
									xtype:	'hidden',
									id:		'txt_csc',
									name:	'txt_csc'	
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
    proxy: new Ext.data.HttpProxy({url:'Crea_Mod_Cliente_SQL.php?consulta=1'}),
     reader: new Ext.data.JsonReader({
       totalProperty: 'totalCount',
         root: 'root'
        }, [
			{name: 'CscCliente', type: 'float'},//ya 
			{name: 'DscCliente', type: 'string'},
            {name: 'Identificacion', type: 'string'},	
			{name: 'TIdentificacion', type: 'string'},			
            {name: 'Direccion', type: 'string'},
			{name: 'Telefono', type: 'string'},
			{name: 'Celular', type: 'string'},
			{name: 'Contacto', type: 'string'},
			{name: 'Email', type: 'string'},
			{name: 'Estado_Csc', type: 'string'},
			{name: 'Terceros', type: 'string'},
			{name: 'Valor', type: 'string'}
			
					
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
                id: 'csc',
                header: 'Csc',
                dataIndex: 'CscCliente',
				hidden: true,
                width: 60
            },{
                id: 'nombre',
                header: 'Nombre',
			   // format : "d/m/Y",
                dataIndex: 'DscCliente',
                width: 200
            },{
                id: 't-identificacion',
                header:	'T-Identificacion',
			    dataIndex: 'TIdentificacion',
                width: 120
            },{
                id: 'N-identificacion',
                header:	'N&deg; Identificacion',
			    dataIndex: 'Identificacion',
                width: 80
            },{
                id: 'direccion',
                header: 'Direccion',
                hidden: false,
				dataIndex: 'Direccion',
                width: 120
            },{
                id: 'telefono',
                header: 'Telefono',
                hidden: false,
				dataIndex: 'Telefono',
                width: 90
            },{
                id: 'movil',
                header: 'Movil',
                hidden: false,
				dataIndex: 'Celular',
                width: 90
			},{
                id: 'contacto',
                header: 'Contacto',
                hidden: false,
				dataIndex: 'Contacto',
                width: 180
			},{
                id: 'mail',
                header: 'Correo',
                hidden: false,
				dataIndex: 'Email',
                width: 150	
			},{
                id: 'estado',
                header: 'Estado',
                hidden: false,
				dataIndex: 'Estado_Csc',
                width: 90
			},{
                id: 'valor',
                header: 'valor',
                hidden: false,
				dataIndex: 'Valor',
                width: 90	
			},{
                id: 'terceros',
                header: 'Terceros',
                hidden: false,
				dataIndex: 'Terceros',
                width: 80		
		}]
	
    });
	
	
	
	 var grid = new Ext.grid.EditorGridPanel({
        store: ds_Clientes,//store,
        cm: cm,
		loadMask: true,
        renderTo: 'editor-grid',
        width: '100%',
        height: 350,
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
		var CscCliente = ds_Clientes.getAt(rowIndex).data.CscCliente;
		var DscCliente = ds_Clientes.getAt(rowIndex).data.DscCliente;
		var Identificacion = ds_Clientes.getAt(rowIndex).data.Identificacion;
		var TIdentificacion = ds_Clientes.getAt(rowIndex).data.TIdentificacion;
		var Direccion = ds_Clientes.getAt(rowIndex).data.Direccion;
		var Telefono = ds_Clientes.getAt(rowIndex).data.Telefono;
		var Celular = ds_Clientes.getAt(rowIndex).data.Celular;
		var Contacto = ds_Clientes.getAt(rowIndex).data.Contacto;
		var Email = ds_Clientes.getAt(rowIndex).data.Email;
		var Valor = ds_Clientes.getAt(rowIndex).data.Valor;
		var Estado_Csc = ds_Clientes.getAt(rowIndex).data.Estado_Csc;
		
			Estado_Csc = Estado_Csc.replace('<SPAN style="color:green">', "");
			Estado_Csc = Estado_Csc.replace('<SPAN style="color:red">', "");
			Estado_Csc = Estado_Csc.replace("</SPAN>", "");
		
		if(columnIndex==12)
			{
			Terceros.show();
			document.getElementById('CscCliente').value=CscCliente;
			ds_Terceros.load({waitMsg:'Consultando', params:{CscCliente:CscCliente}})
			}
		else
			{
			document.getElementById('txt_nombre').value=DscCliente;
			document.getElementById('txt_identificacion').value=Identificacion;
			document.getElementById('txt_telefono').value=Telefono;
			document.getElementById('txt_contacto').value=Contacto;
			document.getElementById('lst_estado').value=Estado_Csc;
			document.getElementById('lst_tipo').value=TIdentificacion;
			document.getElementById('txt_direccion').value=Direccion;
			document.getElementById('txt_movil').value=Celular;
			document.getElementById('txt_mail').value=Email;
			document.getElementById('txt_csc').value=CscCliente;
			document.getElementById('txt_Val').value=Valor;
			}
			//alert(Valor)
});
//////////////////////////////////////////////////////

Ext.getCmp('grid_Terceros').on('cellclick', function(grid, rowIndex, columnIndex, e){
		var record = grid.getStore().getAt(rowIndex);
		var fieldName = grid.getColumnModel().getDataIndex(columnIndex);
		var data = record.get(fieldName);
		var Csc_Terceros = ds_Terceros.getAt(rowIndex).data.Csc_Terceros;
		var Dsc_Terceros = ds_Terceros.getAt(rowIndex).data.Dsc_Terceros;
		var Identificacion = ds_Terceros.getAt(rowIndex).data.Identificacion;
		var T_Identificacion = ds_Terceros.getAt(rowIndex).data.T_Identificacion;
		var Direccion = ds_Terceros.getAt(rowIndex).data.Direccion;
		var Telefono = ds_Terceros.getAt(rowIndex).data.Telefono;
		var Celular = ds_Terceros.getAt(rowIndex).data.Celular;
		var Contacto = ds_Terceros.getAt(rowIndex).data.Contacto;
		var Email = ds_Terceros.getAt(rowIndex).data.Email;
		var Estado_Csc = ds_Terceros.getAt(rowIndex).data.Estado_Csc;
			Estado_Csc = Estado_Csc.replace('<SPAN style="color:green">', "");
			Estado_Csc = Estado_Csc.replace('<SPAN style="color:red">', "");
			Estado_Csc = Estado_Csc.replace("</SPAN>", "");
		document.getElementById('txt_WinCsc').value=Csc_Terceros;
		document.getElementById('txt_WinName').value=Dsc_Terceros;
		document.getElementById('txt_WinNIdentificacion').value=Identificacion;
		document.getElementById('txt_WinTelefono').value=Telefono;
		document.getElementById('txt_WinCelular').value=Celular;
		document.getElementById('txt_WinContacto').value=Contacto;
		document.getElementById('winlst_tipo').value=T_Identificacion;
		document.getElementById('txt_WinDireccion').value=Direccion;
		document.getElementById('txt_WinMail').value=Email;
		document.getElementById('Winlst_estado').value=Estado_Csc;
});


	var Terceros = new Ext.Window({
				//renderTo: document.body,
				title: 'Información Terceros',
				width: 600,
				height: 400,
				maximizable: true,
				modal: true,
				closeAction: 'hide',
				//resizable: false,
				minWidth: 500,
				minHeight: 350,
				maximized: false,
				constrain: true,
				items:[formTerceros]
			});


	
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