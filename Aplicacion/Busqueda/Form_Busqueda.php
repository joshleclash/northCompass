<?php
include ("../../Conexion.php");
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
   
	// Tab Principal ----------------------------------------------------------------------------
//	    var tabs = new Ext.TabPanel({
  //      renderTo: document.body,
//		id: 'tabs',
 //       activeTab: 0,        
//		deferredRender: false,
//		frame: true,
 //       defaults:{autoScroll: true},
//		height: 442,
 //       items:[
//			{
     //           title: 'Formulario Busqueda',
	//			id: 'tab1',
    //            contentEl: 'div_Contenido'
//            }
 //       ]
 //   });
	
	//Funcion Tab Principal
 //   function handleActivate(tab){
  //      var tab_title 	= tab.title;
//		var tab_id		= tab.id;
//		tabs.doLayout();
 //   }
	//Fin Tab Principal
	
	
	
	
	
	
	
	//------------------------------------------------------------------------------------------
	
	var Radios = new Ext.form.RadioGroup({  
    fieldLabel:'Seleccione',  
    columns:4,//showing two columns of checkboxes  
	//id:'id_Radio',
    items:[  
        {boxLabel: 'Fechas',  inputValue:1,  name:'opciones', id:'1'},  //checked: false},//handler: fn_Consultar('1')},
        {boxLabel: 'Nombres y Apellidos',  inputValue:2, name:'opciones', id:'2'},  
        {boxLabel: 'Tel&eacute;fono', inputValue:3,   name:'opciones', id:'3'},  
        {boxLabel: 'Identificaci&oacute;n', inputValue:4, name:'opciones', id:'4'},
        {boxLabel: 'Direcci&oacute;n', inputValue:5, name:'opciones', id:'5'},   
        {boxLabel: 'Empresa', inputValue:6, name:'opciones', id:'6'},
		 
    ]  
});
	
	
	
	//FormPanel Busqueda -----------------------------------------------------------------------
	var form_Busqueda = new Ext.form.FormPanel({
        renderTo: 'div_Buscar',
		bodyStyle : 'padding:5px;',	       
        collapsible: true,
		animCollapse: true,
		frame: true,
	    title   : 'Buscar coincidencias',
		//iconCls: 'cssBuscar',
		autoHeight: true,
		labelAlign: 'left',
        height: 50,
		items: [
			{
				layout:'column',
				border:false,
				items:[{
					columnWidth:1.0,
					layout: 'form',
					border:false,
					items: [{
									xtype: 'textfield',
									fieldLabel:'Diligencie para consultar',
									name:	'txt_Buscar',
									id:	'txt_Buscar_Id',
									anchor: '60%'
									
							
						}]	
				},{		 
					columnWidth:.4,
					layout: 'form',
					border:false,
					items: [{xtype:	'radio', boxLabel: 'Fechas',  inputValue:1,  name:'opciones', id:'1'},  
							//checked: false},//handler: fn_Consultar('1')},
					      	{xtype:	'radio', boxLabel: 'Nombres y Apellidos',  inputValue:2, name:'opciones', id:'2'},
							{xtype:	'radio', boxLabel: 'Depto/Ciudad/Barrio', inputValue:9, name:'opciones', id:'9'}]
				},{ 
					columnWidth:.35,
					layout: 'form',
					border:false,
					items: [{xtype:	'radio', boxLabel: 'Tel&eacute;fono', inputValue:3,   name:'opciones', id:'3'},  
					      	{xtype:	'radio', boxLabel: 'Identificaci&oacute;n', inputValue:4, name:'opciones', id:'4'},
							{xtype:	'radio', boxLabel: 'RH', inputValue:8, name:'opciones', id:'8'},
							{xtype:   'checkbox', boxLabel: 'Coincidencia exacta', id:'id_chk'}]
							
				},{
					columnWidth:.25,
					layout: 'form',
					border:false,
					items: [{xtype:	'radio', boxLabel: 'Direcci&oacute;n', inputValue:5, name:'opciones', id:'5'},   
					      	{xtype:	'radio', boxLabel: 'Empresa', inputValue:6, name:'opciones', id:'6'},
							{xtype:	'radio', boxLabel: 'Placas', inputValue:7, name:'opciones', id:'7'}	
						  	
						  				
							],
								buttons : [{
								text : 'Consultar',
								iconCls : 'btn_continuar',
								margins:  '200, 200, 200, 200',
								disabled: false,
								handler: function() {
								var Radio1 = document.getElementById('1').checked;
								var Radio2 = document.getElementById('2').checked;
								var Radio3 = document.getElementById('3').checked;
								var Radio4 = document.getElementById('4').checked;
								var Radio5 = document.getElementById('5').checked;
								var Radio6 = document.getElementById('6').checked;
								var Radio7 = document.getElementById('7').checked;
								var Radio8 = document.getElementById('8').checked;
								var Radio9 = document.getElementById('9').checked;
								var chk7 = document.getElementById('id_chk').checked;
								
								if (Radio1==false && Radio2==false && Radio3==false && Radio4==false && Radio5==false && Radio6==false && Radio7==false && Radio8==false && Radio9==false)
									{
										Ext.Msg.alert('Error', 'Seleccione una opcion antes de consultar');
										return false;
									}
								if(Radio1==true)
									{
										var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										if (txt_Buscar=='' || txt_Buscar=='dd/mm/yyyy' || txt_Buscar=='Nombres y Apellidos' || txt_Buscar=='Telefono' || txt_Buscar=='Identificacion' || txt_Buscar=='Direccion' || txt_Buscar=='Empresa' || txt_Buscar=='Coincidencia Exacta')
											{//Direccion//Empresa//Coincidencia Exacta
												document.getElementById('txt_Buscar_Id').value='dd/mm/yyyy';
												Ext.Msg.alert('Error', 'Diligencie la Informacion antes de consultar formato permitido (dd/mm/yyyy)');
												return false;
											}
										var ValRadio1 = document.getElementById('1').value;
										//var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										ds_grid.load({waitMsg:'Consultando', params:{Radio:ValRadio1, Buscar:txt_Buscar, chk:chk7}});
									}
								else if	(Radio2==true)
									{
										var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										if (txt_Buscar=='' || txt_Buscar=='dd/mm/yyyy' || txt_Buscar=='Nombres y Apellidos' || txt_Buscar=='Telefono' || txt_Buscar=='Identificacion' || txt_Buscar=='Direccion' || txt_Buscar=='Empresa' || txt_Buscar=='Coincidencia Exacta')
											{
												document.getElementById('txt_Buscar_Id').value='Nombres y Apellidos';
												Ext.Msg.alert('Error', 'Diligencie la Informacion antes de consultar');
												return false;
											}
										var ValRadio2 = document.getElementById('2').value;
										//var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										ds_grid.load({waitMsg:'Consultando', params:{Radio:ValRadio2, Buscar:txt_Buscar, chk:chk7}});
									}
								else if	(Radio3==true)
									{
										var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										if (txt_Buscar=='' || txt_Buscar=='dd/mm/yyyy' || txt_Buscar=='Nombres y Apellidos' || txt_Buscar=='Telefono' || txt_Buscar=='Identificacion' || txt_Buscar=='Direccion' || txt_Buscar=='Empresa' || txt_Buscar=='Coincidencia Exacta')
											{
												document.getElementById('txt_Buscar_Id').value='Telefono';
												Ext.Msg.alert('Error', 'Diligencie la Informacion antes de consultar');
												return false;
											}
										var ValRadio3 = document.getElementById('3').value;
										//var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										ds_grid.load({waitMsg:'Consultando', params:{Radio:ValRadio3, Buscar:txt_Buscar, chk:chk7}});
									}
								else if	(Radio4==true)
									{
										var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										if (txt_Buscar=='' || txt_Buscar=='dd/mm/yyyy' || txt_Buscar=='Nombres y Apellidos' || txt_Buscar=='Telefono' || txt_Buscar=='Identificacion' || txt_Buscar=='Direccion' || txt_Buscar=='Empresa' || txt_Buscar=='Coincidencia Exacta')
											{
												document.getElementById('txt_Buscar_Id').value='Identificacion';
												Ext.Msg.alert('Error', 'Diligencie la Informacion antes de consultar');
												return false;
											}
										var ValRadio4 = document.getElementById('4').value;
										ds_grid.load({waitMsg:'Consultando', params:{Radio:ValRadio4, Buscar:txt_Buscar, chk:chk7}});
									}
								else if	(Radio5==true)
									{
										var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										if (txt_Buscar=='' || txt_Buscar=='dd/mm/yyyy' || txt_Buscar=='Nombres y Apellidos' || txt_Buscar=='Telefono' || txt_Buscar=='Identificacion' || txt_Buscar=='Direccion' || txt_Buscar=='Empresa' || txt_Buscar=='Coincidencia Exacta')
											{
												document.getElementById('txt_Buscar_Id').value='Direccion';
												Ext.Msg.alert('Error', 'Diligencie la Informacion antes de consultar');
												return false;
											}
										var ValRadio5 = document.getElementById('5').value;
										ds_grid.load({waitMsg:'Consultando', params:{Radio:ValRadio5, Buscar:txt_Buscar, chk:chk7}});
									}
								else if	(Radio6==true)
									{
										var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										if (txt_Buscar=='' || txt_Buscar=='dd/mm/yyyy' || txt_Buscar=='Nombres y Apellidos' || txt_Buscar=='Telefono' || txt_Buscar=='Identificacion' || txt_Buscar=='Direccion' || txt_Buscar=='Empresa' || txt_Buscar=='Coincidencia Exacta')
											{
												document.getElementById('txt_Buscar_Id').value='Empresa';
												Ext.Msg.alert('Error', 'Diligencie la Informacion antes de consultar');
												return false;
											}
										var ValRadio6 = document.getElementById('6').value;
										ds_grid.load({waitMsg:'Consultando', params:{Radio:ValRadio6, Buscar:txt_Buscar, chk:chk7}});
									}
								else if	(Radio7==true)
									{
										var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										if (txt_Buscar=='' || txt_Buscar=='dd/mm/yyyy' || txt_Buscar=='Nombres y Apellidos' || txt_Buscar=='Telefono' || txt_Buscar=='Identificacion' || txt_Buscar=='Direccion' || txt_Buscar=='Empresa' || txt_Buscar=='Coincidencia Exacta')
											{
												document.getElementById('txt_Buscar_Id').value='';
												Ext.Msg.alert('Error', 'Diligencie la Informacion antes de consultar');
												return false;
											}
										var Radio7 = document.getElementById('7').value;
										ds_grid.load({waitMsg:'Consultando', params:{Radio:Radio7, Buscar:txt_Buscar, chk:chk7}});
									}	
								else if	(Radio8==true)
									{
										var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										if (txt_Buscar=='' || txt_Buscar=='dd/mm/yyyy' || txt_Buscar=='Nombres y Apellidos' || txt_Buscar=='Telefono' || txt_Buscar=='Identificacion' || txt_Buscar=='Direccion' || txt_Buscar=='Empresa' || txt_Buscar=='Coincidencia Exacta')
											{
												document.getElementById('txt_Buscar_Id').value='';
												Ext.Msg.alert('Error', 'Diligencie la Informacion antes de consultar');
												return false;
											}
										var Radio8 = document.getElementById('8').value;
										ds_grid.load({waitMsg:'Consultando', params:{Radio:Radio8, Buscar:txt_Buscar, chk:chk7}});
									}
								else if	(Radio9==true)
									{
										var txt_Buscar = document.getElementById('txt_Buscar_Id').value;
										if (txt_Buscar=='' || txt_Buscar=='dd/mm/yyyy' || txt_Buscar=='Nombres y Apellidos' || txt_Buscar=='Telefono' || txt_Buscar=='Identificacion' || txt_Buscar=='Direccion' || txt_Buscar=='Empresa' || txt_Buscar=='Coincidencia Exacta')
											{
												document.getElementById('txt_Buscar_Id').value='';
												Ext.Msg.alert('Error', 'Diligencie la Informacion antes de consultar');
												return false;
											}
										var Radio9 = document.getElementById('9').value;
										ds_grid.load({waitMsg:'Consultando', params:{Radio:Radio9, Buscar:txt_Buscar, chk:chk7}});
									}	
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
//------------------------------------------

//--------------------------
   // var xg = Ext.grid;

	var ds_grid = new Ext.data.GroupingStore({		
		url:'Busqueda_SQL.php?consulta=1',
		reader: new Ext.data.JsonReader({
		 totalProperty: 'totalCount',
			 root: 'topics'
				},[
					{name: 'Csc', type: 'float'},
					{name: 'NombreCompleto', type: 'string'},	
					{name: 'Identificacion', type: 'string'},			
					{name: 'Ciudad', type: 'string'},
					{name: 'Fecha', type: 'string'},
					{name: 'Estado', type: 'string'},
					{name: 'Placas', type: 'string'},
					{name: 'Otros', type: 'string'},
					{name: 'Icono', type: 'string'}
		])
		//idProperty: 'NombreCompleto',
		//sortInfo:{field: 'NombreCompleto', direction: "ASC"},
		//groupField:'Contrato_Csc'
	});

    var grid = new Ext.grid.EditorGridPanel({
        ds: ds_grid,
		columns: [
			{id:'csc', header:'Csc', dataIndex:'Csc', width:20, hidden: true},            
			{id:'numeroidentificacion', header: 'Numero Identificaci&oacute;n', width: 100, sortable: true, dataIndex: 'Identificacion'},
            {id:'nombres', header: 'Nombres', width: 170, sortable: true, dataIndex: 'NombreCompleto'},
			{id:'ciudad', header: 'Ciudad', width: 90, sortable: true, dataIndex: 'Ciudad'}, 
			{id:'Ffinal', header: 'Fecha Creaci&oacute;n', width: 90,  sortable: true, dataIndex: 'Fecha'}, 
			{id:'Placa', header: 'Placa', width: 90,  sortable: true, dataIndex: 'Placas', hidden:true}, 
			{id:'estado', header: 'Estado', width: 90,  sortable: true, dataIndex: 'Estado'}
			
        ],		
		//view: new Ext.grid.GroupingView({
         //   forceFit:true,
		//	startCollapsed: true,
         //   showGroupName: true,
          //  enableNoGroups:true,
           // hideGroupedColumn: false,
           // groupOnSort: true,
           // groupTextTpl: '{text}  		 ({[values.rs.length]} {[values.rs.length > 1 ? "Usuarios" : "Usuarios"]})'
        //}),
        frame:true,
		width:'100%',
        height: 180,
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
		var Csc = ds_grid.getAt(rowIndex).data.Csc;
		

});



function fn_enviar(){
	var ano = "2011";
	var mes = "09";
	ds_grid.load({waitMsg:'Consultando...', params:{ano:ano, mes:mes}});
};
//function fn_Consultar(check){
	
	//	};


});
</script> 
<!--<div id="div_Contenido">-->
	<style type="text/css">
	body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
}
    body {
	margin-left: 5px;
	margin-top: 5px;
	margin-right: 5px;
	margin-bottom: 5px;
}
    </style>
<div style="padding:5px; background-color:#FFC;" id="div_txt">Registre la descripci&oacute;n de consulta y tenga en cuenta las siguientes opciones: Incluya calle, carrera, numero de casa, numero de manzana, interior, para RH A+ etc.
</div>
<div style="padding:5px;" id="div_Buscar"></div>
	<div style="padding:5px;" id="editor-grid"></div>
<!--</div>-->