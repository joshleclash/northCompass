<?php
include ("../../Conexion.php");
session_start();
$nombres=$_SESSION["Nombres"];
$apeliidos=$_SESSION["Apellidos"];
$nombrc=$nombres." ".$apeliidos;
$time=date("d/m/Y");
$CscSession=$_SESSION["Csc"];
$Perfil=$_SESSION['Perfil'];
?>
<link rel="stylesheet" type="text/css" href="../../ExtJS/resources/css/ext-all.css">
<script type="text/javascript" src="../../ExtJS/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="../../ExtJS/ext-all.js"></script>
<script type="text/javascript" src="../../ExtJS/ext-lang-sp.js"></script>
<script type="text/javascript" src="../../ExtJS/examples/ux/CheckColumn.js"></script>
<!--<script type="text/javascript" src="../../ExtJs/examples/ux/GroupSummary.js"></script> -->
<!-- <script type="text/javascript" src="../../extjs/examples/grid/totals.js"></script>-->
<!-- <link rel="stylesheet" type="text/css" href="../../ExtJs/examples/ux/css/GroupSummary.css" /> -->    
<!-- page specific --> 
<script language="javascript">

Ext.onReady(function(){
	
//FormPanel Busqueda -----------------------------------------------------------------------
var ds_Cliente = new Ext.data.Store({
	//autoLoad: true,
		proxy: new Ext.data.HttpProxy({url:'Form_Programacion_SQL.php?consulta=1'}),
		reader: new Ext.data.JsonReader({
			root:'topics',
			totalProperty: 'totalCount'			
		},[
			{name:'csc',mapping:'csc'},
			{name:'Csc_Creacion',mapping:'Csc_Creacion'},
			{name:'Fecha_Creacion',mapping:'Fecha_Creacion'},
			{name:'Profesional',mapping:'Profesional'},
			{name:'Fecha_Visita',mapping:'Fecha_Visita'},
			{name:'Fecha_Referenciacion',mapping:'Fecha_Referenciacion'},
			{name:'Fecha_Final',mapping:'Fecha_Final'},						
			{name:'Estado',mapping:'Estado'}
			
			]
			)
		});

var ds_ClienteUpdate = new Ext.data.Store({
	autoLoad: true,
		proxy: new Ext.data.HttpProxy({url:'Form_Programacion_SQL.php?consulta=3'}),
		reader: new Ext.data.JsonReader({
			root:'topics',
			totalProperty: 'totalCount'			
		},[
			{name:'csc',mapping:'csc'}
			]
			)
		})
var tabs = new Ext.TabPanel({
        //renderTo: 'tabs1',
        width:500,
        activeTab: 0,
		height: 200,
        frame:true,
		padding:'5px',
        defaults:{autoHeight: true},
        items:[{
			layout: 'form',
			title: '<div id="id_Title"></id>',
			items:[{
					xtype:	'textfield',
					fieldLabel:	'Nombres',
					id:	'id_Nombres',
					disabled: true,
					width: 	250
				},{
					xtype:	'textfield',
					fieldLabel:	'Ciudad',
					id:	'id_Ciudad',
					disabled: true,
					width: 	150
				},{
					xtype: 'grid',
					id: 'grid_Cliente',
					height: 200,
					autoScroll: true,
					cm: new Ext.grid.ColumnModel([
							   {header: "Csc_Creacion", width: 30, dataIndex:'Csc_Creacion', hidden: true},
							   {header: "Fecha Creacion", width: 140,dataIndex:'Fecha_Creacion'},
							  
							   {header: "Estado", width: 130,dataIndex:'Estado'},
							   {header: "Usuario", width: 200,dataIndex:'Profesional'}
							   						   
					]),
						store:  ds_Cliente
					}]
			
			}
          
        ]
    });
	
	var tabs2 = new Ext.TabPanel({
        //renderTo: 'tabs1',
        width:500,
        activeTab: 0,
		height: 200,
        frame:true,
		padding:'10px',
        defaults:{autoHeight: true},
        items:[{
			layout: 'form',
			title: '<div id="id_Title2"></id>',
			url:	'enviando_datos.php',
			items:[{
					xtype:	'hidden',
					id:	'id_csc2',
					width: 	250	
				},{
					xtype:	'textfield',
					fieldLabel:	'Nombres',
					id:	'id_Nombres2',
					disabled: true,
					width: 	250
				},{
					xtype:	'textfield',
					fieldLabel:	'Ciudad',
					id:	'id_Ciudad2',
					disabled: true,
					width: 	150
				},{
					xtype:	'compositefield',
					fieldLabel:	'Fecha',
					anchor:	'90%',
					items:[{
								xtype:	'datefield',
								id:	'id_fecha2',
								disabled: false,
								format:	'd/m/Y',
								width: 	150		
							},{
								xtype:	'displayfield',
								value:	'Hora'
								
							},{	
								xtype:	'timefield',
								id:	'id_hora',
								minValue:	'5:00am',
								maxValue:	'10:00pm',
								incremnet:	'15',
								width:	150
								
						}]
				},{
					xtype:			'combo',
					fieldLabel:		'Profesional',
					id: 			'lst_profesional',
					width:			150,
					mode:           'local',
					emptyText:      'Seleccione',
					msgTarget: 		'side',
					triggerAction:  'all',
					forceSelection: true,
					editable:       false,
					name:           'lst_profesional',
					hiddenName:     'hi_lst_profesional',
					displayField:   'dsc',
					valueField:     'csc',
					store:          new Ext.data.Store({
					autoLoad: true,
					proxy:   new Ext.data.HttpProxy({url:'Form_Programacion_SQL.php?consulta=2'}),
					reader: 	new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'},{name:'dsc', type:'string'}])					
							
						})
					
					
					
				}]
					
		}]
    });
	
	var form_Busqueda = new Ext.form.FormPanel({
        renderTo: 'div_Buscar',
		bodyStyle : 'padding:5px;',	
        title   : 'Buscar solicitud',
        collapsible: false,
		animCollapse: false,
	    //iconCls: 'cssBuscar',
		frame:true,
		autoHeight: true,
		labelAlign: 'top',
        width:'100%',
	    height: 70,  		      
        defaults: {
            anchor: '0'
        },
        items: [
			{
				layout:'column',
				border:false,
				items:[{
					columnWidth:.33,
					layout: 'form',
					border:false,
					items: [{
							xtype:	'hidden',
							value: '<?php echo $Perfil;?>',
							id:	'Session'
					
					},{
						
						xtype:			'datefield',
						id: 			'date_ii',
						fieldLabel: 	'Fecha Inicial',
						name:			'lst_ano',
						format:			'd/m/Y',
						anchor:			'60%'		
					}]
				},{
					columnWidth:.33,
					layout: 'form',
					border:false,
					items: [{
						xtype:			'datefield',
						id: 			'date_ff',
						fieldLabel: 	'Fecha Final',
						name:			'lst_ano',
						format:			'd/m/Y',
						anchor:			'60%'		
					}]
				},{
					columnWidth:.33,
					layout: 'form',
					border:false,
					items: [{
									xtype:			'combo',
									fieldLabel:		'Estado',
									id: 			'lst_estado',
									width:			150,
									mode:           'local',
									emptyText:      'Seleccione',
									msgTarget: 		'side',
									triggerAction:  'all',
									forceSelection: true,
									editable:       false,
									name:           'lst_estado',
									hiddenName:     'hi_lst_estado',
									displayField:   'name',
									valueField:     'value',
									store:          new Ext.data.JsonStore({
									fields : ['name', 'value'],
									data   : [
											{name : 'CREADO', value: '1'},
											{name : 'PROGRAMADO', value: '2'},
											{name : 'VISITA', value: '3'},
											{name : 'REFERENCIACION', value: '4'},
											{name : 'CONCEPTO FINAL', value: '5'},
											{name : 'ANULADO', value: '0'}
											]
										})
								},{									
									xtype:		'hidden',
									id:         'txt_csc',
									name:		'txt_csc',

									allowBlank:   false,
									width:       110					
								}],
									buttons : [{
									text : 'Consultar',
									iconCls : 'btn_continuar',
									margins:  '200, 200, 200, 200',
									disabled: false,
									handler: function() {
												fn_enviar();																		   
					}									
				}],
				buttonAlign:'right'
										
				}]
			}
		]
	});
	
//FormPanel Busqueda Numero -----------------------------------------------------------------------
	var form_BusquedaID = new Ext.form.FormPanel({
        renderTo: 'div_BuscarID',
		bodyStyle : 'padding:5px;',	
        title   : 'Buscar por ID',
        collapsible: false,
		animCollapse: false,
	    //iconCls: 'cssBuscar',
		frame:true,
		autoHeight: true,
		labelAlign: 'top',
        width:'100%',
	    height: 70,
        items: [
			{
				layout:'column',
				border:false,
				items:[{
					columnWidth:.8,
					layout: 'form',
					border:false,
					items: [{
						xtype:			'numberfield',
						id: 			'txt_numberID',
						fieldLabel: 	'Numero de Solicitud (ID)',
						name:			'txt_numberID',
						anchor:			'40%'							
				}],
						buttons : [{
						text : 'Consultar',
						iconCls : 'btn_continuar',
						//margins:  '200, 200, 200, 200',
						disabled: false,
						handler: function() {
								fn_enviar();																		   
					}									
				}],
				buttonAlign:'right'
										
				}]
			}
		]
	});	
	
	
	
	
//------------------------------------------------------------------------------------------											
// GridGrouping
//------------------------------------------------------------------------------------------
    var xg = Ext.grid;

	var ds_grid = new Ext.data.GroupingStore({		
		url:'Form_Programacion_SQL.php?consulta=0',
		reader: new Ext.data.JsonReader({
		 totalProperty: 'totalCount',
			 root: 'topics'
				},[
					{name: 'cont', type: 'float'},
					{name: 'Csc' , type: 'float'},
					{name: 'Identificacion', type: 'string'},	
					{name: 'Nombres', type: 'string'},			
					{name: 'Ciudad' , type: 'string'},
					{name: 'Fecha_Creacion' , type: 'string'},
					{name: 'Profesional' , type: 'string'},
					{name: 'Programacion' , type: 'string'},
					{name: 'Estado' , type: 'string'}
				
		])//,
		//idProperty: 'NombreCompleto',
		//sortInfo:{field: 'NombreCompleto', direction: "ASC"},
		//groupField:'Contrato_Csc'
	});

    var grid = new xg.EditorGridPanel({
        ds: ds_grid,
		columns: [
			{id:'csc', header:'Csc', dataIndex:'cont', width:20, hidden: true},            
			{id:'numeroid', header: 'Número ID', width: 30, sortable: true, dataIndex: 'Csc'},
			{id:'numeroidentificacion', header: 'Identificaci&oacute;n', width: 80, sortable: true, dataIndex: 'Identificacion'},
            {id:'nombres', header: 'Nombres', width: 140, sortable: true, dataIndex: 'Nombres'},
			{id:'ciudad', header: 'Ciudad', width: 70, sortable: true, dataIndex: 'Ciudad'}, 
			{id:'Ffinal', header: 'Fecha Creaci&oacute;n', width: 80,  sortable: true, dataIndex: 'Fecha_Creacion'},  
            {id:'profesional', header: 'Profesional', width: 100, sortable: true, dataIndex: 'Profesional'},
			{id:'estado', header: 'Estado', width: 70,  sortable: true, dataIndex: 'Estado'},
			{id:'programacion', header: 'Programar', width: 70,  sortable: true, dataIndex: 'Programacion'}
        ],		
		
		title   : 'Resultados',
        frame:true,
		width:'100%',
        height: 150,
		clicksToEdit: 1,
        collapsible: false,
        animCollapse: false,
		//iconCls: 'icon-grid',
		loadMask: true,
        renderTo: 'editor-grid'
    });		

	var winX = new Ext.Window({
		layout:'fit',
		width:550,
		height:300,
		closeAction:'hide',
		plain: true,
		modal: true,
		items: [tabs],
		buttons: [{
			text:'Enviar',
			disabled:true
		},{
			text: 'Close',
			handler: function(){
				winX.hide();
			}
		}]
	});
	
	var winX2 = new Ext.Window({
		layout:'fit',
		width:550,
		height:300,
		closeAction:'hide',
		plain: true,
		modal: true,
		items: [tabs2],
		buttons: [{
			text:'Enviar',
			disabled:false,
			handler: function(){
				var csc =document.getElementById('id_csc2').value;//id_csc2//id_fecha//id_hora//hi_lst_profesional
				var fecha =	document.getElementById('id_fecha2').value;
				var hora =	document.getElementById('id_hora').value;
				var profesional = 	document.getElementById('hi_lst_profesional').value;
					if (csc=='' ||   fecha=='' || hora=='' || profesional=='')
						{
						Ext.MessageBox.alert('Error', 'Diligencie toda la informacion');	
						return false;
						}
					ds_ClienteUpdate.load({waitMsg:'Consultando', params:{csc:csc, fecha:fecha, hora:hora, profesional:profesional}})
				winX2.hide();
				document.getElementById('id_csc2').value='';//id_csc2//id_fecha//id_hora//hi_lst_profesional
				document.getElementById('id_fecha2').value='';
				document.getElementById('id_hora').value='';
				document.getElementById('lst_profesional').value='';
				}
		},{
			text: 'Close',
			handler: function(){
				winX2.hide();
				document.getElementById('id_csc2').value='';//id_csc2//id_fecha//id_hora//hi_lst_profesional
				document.getElementById('id_fecha2').value='';
				document.getElementById('id_hora').value='';
				document.getElementById('lst_profesional').value='';
			}
		}]
	});
	
	

  	grid.on('cellclick', function(grid, rowIndex, columnIndex, e){
		var record = grid.getStore().getAt(rowIndex);
		var fieldName = grid.getColumnModel().getDataIndex(columnIndex);
		var data = record.get(fieldName);		
		var csc = ds_grid.getAt(rowIndex).data.Csc;
		var Nombres = ds_grid.getAt(rowIndex).data.Nombres;
		var Ciudad = ds_grid.getAt(rowIndex).data.Ciudad;
		//alert(csc)
		//var opciones = 'status=1,toolbar=1 width=400, height=300';
		//window.open ("Emergente.php?csc="+csc,"Informacion", opciones);		
		if (columnIndex==8)
			{
			var Session =document.getElementById('Session').value;
			var NewWindow;
				if (Session==1 || Session==3)
					{	
						Ext.getCmp('lst_profesional').store.load({waitMsg:'Consultando', params:{}});
						winX2.show(this);//
						
						document.getElementById('id_csc2').value=csc;
						document.getElementById('id_Title2').innerHTML='Solicitud Visita'+csc;
						document.getElementById('id_Nombres2').value=Nombres;
						document.getElementById('id_Ciudad2').value=Ciudad;					
					}
			return false;
			}
		
		
		
		winX.show(this);
		//winX.SetTitle('Estado Solicitud ID('+csc+')');
		document.getElementById('id_Title').innerHTML='Solicitud Visita '+csc;
		document.getElementById('id_Nombres').value=Nombres;
		document.getElementById('id_Ciudad').value=Ciudad;
		ds_Cliente.load({waitMsg:'Consultando', params:{csc:csc}});
			 											
	});
  






function fn_enviar(){
	var Inicial = document.getElementById('date_ii').value;
	var Final =  document.getElementById('date_ff').value;
	var Estado = document.getElementById('hi_lst_estado').value;
	var Id = document.getElementById('txt_numberID').value;
		if (Id!='')
			{
				ds_grid.load({waitMsg:'Consultando...', params:{Id:Id}});
				return false;
			}
if (Inicial == "" || Final=="" )
	{
	Ext.Msg.alert('Error', 'Seleccione fechas antes de realizar la consulta');
	}
else	
	{
	ds_grid.load({waitMsg:'Consultando...', params:{Inicial:Inicial, Final:Final, Estado:Estado, Id:Id}});
	}
};
ds_ClienteUpdate.on('load', function(store){
	var cantidad = ds_ClienteUpdate.getTotalCount();
	var csc = ds_ClienteUpdate.getAt(0).data.csc;
		if (csc==0)
			{
				Ext.Msg.alert('Respuesta','Error en la actulización valide su informacion');
			}
		else
			{
				Ext.Msg.alert('Respuesta','Actualización Exitosa');
				fn_enviar();
			}
	});
});
</script> 
<div id="div_Contenido">
	<div style="padding:5px;" id="div_Buscar"></div>
	<div style="padding:5px;" id="div_BuscarID"></div>
	<div style="padding:5px;" id="editor-grid"></div>
</div>