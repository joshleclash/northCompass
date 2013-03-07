<?php
include ("Conexion.php");
session_start();
$nombres=$_SESSION["Nombres"];
$apeliidos=$_SESSION["Apellidos"];
$nombrc=$nombres." ".$apeliidos;
$time=date("d/m/Y");
?>
<link rel="stylesheet" type="text/css" href="../../ExtJS/resources/css/ext-all.css">
<script type="text/javascript" src="../../ExtJS/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="../../ExtJS/ext-all.js"></script>
<script type="text/javascript" src="../../ExtJs/ext-lang-sp.js"></script>
<script type="text/javascript" src="../../ExtJs/examples/ux/CheckColumn.js"></script>
<!--<script type="text/javascript" src="../../ExtJs/examples/ux/GroupSummary.js"></script> -->
<!-- <script type="text/javascript" src="../../extjs/examples/grid/totals.js"></script>-->
<!-- <link rel="stylesheet" type="text/css" href="../../ExtJs/examples/ux/css/GroupSummary.css" /> -->
<!-- page specific --> 
<script language="javascript">

Ext.onReady(function(){
	
//FormPanel Busqueda -----------------------------------------------------------------------
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
						xtype:			'datefield',
						id: 			'lst_fi',
						fieldLabel: 	'Fecha Inicial',
						name:			'lst_ano',
						format: 'd/m/Y',
						anchor:			'60%'		
					}]
				},{
					columnWidth:.33,
					layout: 'form',
					border:false,
					items: [{
						xtype:			'datefield',
						id: 			'lst_ff',
						fieldLabel: 	'Fecha Final',
						name:			'lst_ano',
						format: 'd/m/Y',
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
								var User_Id = document.getElementById('txt_numberID').value;
									if (User_Id!='')
										{
											Ext.Msg.alert('Error', 'El campo de Numero de solicitud(ID) deve estar vacio para realizar esta consulta');
											return false;
										}
								var Estado = document.getElementById('hi_lst_estado').value;
								var fi = document.getElementById('lst_fi').value;
								var ff = document.getElementById('lst_ff').value;
									if(fi=='' || ff=='')
										{
											Ext.Msg.alert('Error', 'Los campo de fecha inicial y fecha final deven estar devidamente diligenciados para poder realizar esta consulta');
										return false;	
										}
								ds_grid.load({params:{Estado:Estado, fi:fi, ff:ff}});																				   
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
							var User_Id = document.getElementById('txt_numberID').value;
								if (User_Id=='')
									{
										Ext.Msg.alert("Error", "La informacion de numero de Solicitud(ID), deve estar diligenciada para realizar esta consulta");
										return false;
									}
								ds_grid.load({params:{User_Id:User_Id}});																		   
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
		url:'Form_Visita_Cliente_SQL.php?consulta=0',
		reader: new Ext.data.JsonReader({
		 totalProperty: 'totalCount',
			 root: 'topics'
				},[
					{name: 'cont', type: 'float', mapping:'cont'},
					{name: 'csc' , type: 'float', mapping:'csc'},
					{name: 'Nombres', type: 'string', mapping:'Nombres'},	
					{name: 'Ciudad', type: 'string', mapping:'Ciudad'},			
					{name: 'Fecha_Creacion' , type: 'string', mapping:'Fecha_Creacion'},
					{name: 'Identificacion' , type: 'string', mapping:'Identificacion'},
					{name: 'Estado' , type: 'string', mapping:'Estado'},
					{name: 'Adjuntos' , type: 'string', mapping:'Adjuntos'},
					{name: 'Icono' , type: 'string', mapping:'Icono'}
					
		])
		//idProperty: 'Nombres',
		//sortInfo:{field: 'Nombres', direction: "ASC"},
		//groupField:'csc'
	});

    var grid = new xg.EditorGridPanel({
        ds: ds_grid,
		columns: [
			{id:'csc', header:'csc', dataIndex:'csc', width:20, hidden: true},            

			{id:'numeroidentificacion', header: 'Identificaci&oacute;n', width: 80, sortable: true, dataIndex: 'Identificacion'},
            {id:'nombres', header: 'Nombres', width: 120, sortable: true, dataIndex: 'Nombres'},
			{id:'ciudad', header: 'Ciudad', width: 100, sortable: true, dataIndex: 'Ciudad'}, 
			{id:'Ffinal', header: 'Fecha Creaci&oacute;n', width: 100,  sortable: true, dataIndex: 'Fecha_Creacion'},  
			{id:'Estado', header: 'Estado', width: 100,  sortable: true, dataIndex: 'Estado'},  
            {id:'iconno', header: 'Generar Pdf', width: 120, sortable: true, dataIndex: 'Icono'},
			{id:'documentos', header: 'Adjuntos', width: 120, sortable: true, dataIndex: 'Adjuntos'}
			
        ],		
		//view: new Ext.grid.GroupingView({
        //    forceFit:true,
		//	startCollapsed: true,
         //   showGroupName: true,
         //   enableNoGroups:true,
         //   hideGroupedColumn: false,
         //   groupOnSort: true,
         //   groupTextTpl: '{text}  		 ({[values.rs.length]} {[values.rs.length > 1 ? "nombres" : "nombres"]})'
        //}),
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
   
  grid.on('cellclick', function(grid, rowIndex, columnIndex, e){
		var record = grid.getStore().getAt(rowIndex);
		var fieldName = grid.getColumnModel().getDataIndex(columnIndex);
		var data = record.get(fieldName);		
		var Csc = ds_grid.getAt(rowIndex).data.csc;
		
		if(columnIndex==6)
			{
					var url='../Impresion/Impresion.php?csc='+Csc;
				var ventana = window.open(url, '', 'height=600,width=900, scrollbars=yes, menubar=no');
					
			}
		else if(columnIndex==7)
			{
				var url='../Impresion/Adjuntos.php?csc='+Csc;
					window.open(url, '', 'height=600,width=800, scrollbars=yes, menubar=no');
			}	
		 											
	});
   
   var creacion = new Ext.Window({
            title: 'Creacio De Autorizacion BHM-IPS',
			autoScroll: true,
            closable:false,
            width:600,
            height:340,
			items: [evolucion],
			buttons: [{
				text: 'Crear',
				handler:	function(){
			var PCsc =	document.getElementById('txt_cscP').value;
			var FIni =	document.getElementById('txt_fechaInicial').value;
			var FFin = 	document.getElementById('txt_fechaFinal').value;
			var CCon =	document.getElementById('hi_lst_contrato').value;
			var NAut =	document.getElementById('txt_autorizacion').value;
			ds_insert.load({waitMsg:'Consultando..', params:{Csc_Paciente:PCsc, FechaInicial:FIni, FechaFinal:FFin, CContrato:CCon, NAutor:NAut}});// FechaInicial:FIni, FechaFinal:FFin, CContrato:CCon, NAutor:NAut}});
		//ds_insert.load({waitMsg:'Consultando...', params:{CscP:PCsc, FechaInicial:FIni, FechaFinal:FFin, CodCon:CCon, Nau:NAut}});
			creacion.hide();
			fn_enviar();
			Ext.getCmp('lst_eps').setDisabled(true);//lst_contrato//lst_eps
			Ext.getCmp('lst_contrato').setDisabled(true);
			//document.getElementById('txt_cscP').value='';
			document.getElementById('txt_fechaInicial').value='';
			document.getElementById('txt_fechaFinal').value='';
			document.getElementById('txt_autorizacion').value='';
			}			
			},{
				text:'cerrar',
				handler:	function(){
				creacion.hide();
				document.getElementById('txt_cscP').value='';
				document.getElementById('txt_nombres').value='';
				document.getElementById('txt_identificacion').value='';
				document.getElementById('Eps_csc').value='';
			}
		
		}]
   });
   
 


});
</script> 
<style type="text/css">
body {
	margin-left: 5px;
	margin-top: 5px;
	margin-right: 5px;
	margin-bottom: 5px;
}
</style>
<div id="div_Contenido">
	<div style="padding:5px;" id="div_Buscar"></div>
	<div style="padding:5px;" id="div_BuscarID"></div>
	<div style="padding:5px;" id="editor-grid"></div>
</div>