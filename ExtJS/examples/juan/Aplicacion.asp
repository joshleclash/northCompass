<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Toolbar with Menus</title>
<link rel="stylesheet" type="text/css" href="./ExtJS/resources/css/ext-all.css" />

    <!-- GC -->
 	<!-- LIBS -->
 	<script type="text/javascript" src="./ExtJS/adapter/ext/ext-base.js"></script>
 	<!-- ENDLIBS -->

    <script type="text/javascript" src="./ExtJS/ext-all.js"></script>

<script type="text/javascript" src="./ExtJS/examples/form/states.js"></script>

<link rel="stylesheet" type="text/css" href="./ExtJS/examples/menu/menus.css" />

<!-- Common Styles for the examples -->
<link rel="stylesheet" type="text/css" href="./ExtJS/shared/examples.css" />
</head>
<body>
<script type="text/javascript" src="./ExtJs/shared/examples.js"></script><!-- EXAMPLES -->
<script language="javascript">
/*!
 * Ext JS Library 3.3.1
 * Copyright(c) 2006-2010 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */
Ext.onReady(function(){
    Ext.QuickTips.init();

    // Menus can be prebuilt and passed by reference
var dateMenu1 = new Ext.menu.DateMenu({
        handler: function(dp, date){
         var url='Reporte.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	alert(date.format('d/m/Y'));
      
		}
 });
var dateMenu2 = new Ext.menu.DateMenu({
        handler: function(dp, date){
         var url='confirmacion_Listado.asp';
	document.getElementById('myIframe').src=url;
	alert(date.format('d/m/Y'));
      
		}
 });
var dateMenu3 = new Ext.menu.DateMenu({
        handler: function(dp, date){
         var url='Programacion_Listado.asp';
		 document.getElementById('myIframe').src=url;
	alert(date.format('d/m/Y'));
      }
 });
var dateMenu4 = new Ext.menu.DateMenu({
        handler: function(dp, date){
         var url='NewCierre_Servicios.asp';
		 document.getElementById('myIframe').src=url;
	alert(date.format('d/m/Y'));
      }
 });
var dateMenu5 = new Ext.menu.DateMenu({
        handler: function(dp, date){
         var url='Programacion_Listado_Anulados.asp';
		 document.getElementById('myIframe').src=url;
	alert(date.format('d/m/Y'));
      }
 });
var dateMenu6 = new Ext.menu.DateMenu({
        handler: function(dp, date){
         var url='Creacion_Listado.asp';
		 document.getElementById('myIframe').src=url;
	alert(date.format('d/m/Y'));
      }
 });		
var menu3ingresos = new Ext.menu.DateMenu({
        handler: function(dp, date){
         var url='Operador_Listado_Ingreso.asp';
		 document.getElementById('myIframe').src=url;
	alert(date.format('d/m/Y'));
     }
  });     
	
	
    var store = new Ext.data.ArrayStore({
        fields: ['abbr', 'state'],
        data : Ext.exampledata.states // from states.js
    });

  

    var menu1 = new Ext.menu.Menu({
        id: 'menu1',
        style: {
            overflow: 'visible'     // For the Combo popup
        },
        items: [
                              // A Field in a Menu
            {
                text: 'Crear',
			    handler:  menu1crear
               //checkHandler: onItemCheck
            },{
                text: 'Modificar',
                handler:	menu1modificar
            },{
				text:	'Autorizaciones',	
				handler:	menu1autorizaciones
			},'-',{
				text:	'Reportes',
				iconCls: 'calendar',
				menu:	dateMenu1
				
			},{
                text: 'Confirmacion',
                iconCls: 'calendar',
                menu: dateMenu2 // <-- submenu by reference
            },{
				text:   'Programacion',
				iconCls: 'calendar',
				menu:	dateMenu3
			},{
				text:	'Cierre',
				iconCls: 'calendar',
				menu:	dateMenu4
			},{
				text:	'Cancelados',
				iconCls: 'calendar',
				menu:	dateMenu5
			},{
				text:	'Creacion',
				iconCls: 'calendar',
				menu:	dateMenu6
			
	}]
    });
	 var menu2 = new Ext.menu.Menu({
        id: 'menu2',
        style: {
            overflow: 'visible'     // For the Combo popup
        },
        items: [
                              // A Field in a Menu
            {
                text: 'Crear',
				iconCls:	'user',
				handler: menu2crear
               // checked: true,       // when checked has a boolean value, it is assumed to be a CheckItem
                //checkHandler: onItemCheck
            }, '-', {
                text: 'Modificar',
				iconCls:	'user',
                handler:  menu2modificar
         }]
    });
	 var menu3 = new Ext.menu.Menu({
        id: 'menu3',
        style: {
            overflow: 'visible'     // For the Combo popup
        },
        items: [
                              // A Field in a Menu
            {
                text: 'Crear',
				iconCls:	'',
				handler: menu3crear
               // checked: true,       // when checked has a boolean value, it is assumed to be a CheckItem
                //checkHandler: onItemCheck
            },  {
                text: 'Modificar',
				iconCls:	'',
                handler:	menu3modificar
         },'-',{
				text:		'Libretas',
				handler:	menu3libretas	 
		 },{
			 	text:		'Ingresos',
				menu:		menu3ingresos
			 
		}]
    });
	var menu4 = new Ext.menu.Menu({
        id: 'menu4',
        style: {
            overflow: 'visible'     // For the Combo popup
        },
        items: [
                              // A Field in a Menu
            {
                text: 'Autorizacion',
				iconCls:	'',
				handler:	menu4autorizacion
               // checked: true,       // when checked has a boolean value, it is assumed to be a CheckItem
                //checkHandler: onItemCheck
            },  {
                text: 'Verificacion',
				iconCls:	'',
                handler:  menu4verificacion
         },'-',{
				text:		'Crear'	,
				handler:	menu4crear 
		 },{
			 	text:		'Listado',
			 	handler:	menu4listado
		},{
			text:			'Unificado Op',		
			handler:		menu4unificadoop
		},{
			text:			'Unificado Us',
			handler:		menu4aunificadous		
			
		},{
			text:			'Pago Op',
			handler:		menu4pagoop		
			
	}]
    });
	var menu5 = new Ext.menu.Menu({
        id: 'menu5',
        style: {
            overflow: 'visible'     // For the Combo popup
        },
        items: [
                              // A Field in a Menu
            {
                text: 'Servicio',
				iconCls:	'',
				handler:	menu5servicio
               // checked: true,       // when checked has a boolean value, it is assumed to be a CheckItem
                //checkHandler: onItemCheck
            },  {
                text: 'Destino',
				iconCls:	'',
                handler:	menu5destinos
         },'-',{
				text:		'Usuario',
				handler:	menu5usuarios	 
		 },{
			 	text:		'Encuesta',
				handler:	menu5encuesta
			    //menu:		dateMenu
		}]
    });
	var menu6 = new Ext.menu.Menu({
        id: 'menu6',
        style: {
            overflow: 'visible'     // For the Combo popup
        },
        items: [
                              // A Field in a Menu
            {
                text: 'Indicadores',
				iconCls:	'',
				handler:	menu6indicadores
				
               // checked: true,       // when checked has a boolean value, it is assumed to be a CheckItem
                //checkHandler: onItemCheck
            
		}]
    });
	var menu7 = new Ext.menu.Menu({
        id: 'menu7',
        style: {
            overflow: 'visible'     // For the Combo popup
        },
        items: [{
                text: 'Ir a Inicio',
				iconCls:	'',
				handler: menu7irainicio
			    }, {
                text: 'Cambio Clave',
				iconCls:	'',
				handler:  menu7cambioclave
				}, {
                text: 'Ayuda',
				iconCls:	'',
				handler:    menu7ayuda
				}, {
                text: 'Cerrar Sesion',
				iconCls:	'',
				handler:	menu7cerrasession	
		}]
    });
//////////////////////////menu solicitudes
    var tb = new Ext.Toolbar();
    tb.render('toolbar');

    tb.add({
            text:'Solicitudes',
			iconCls: 'bmenu',  // <-- icon
            menu: menu1  // assign menu by instance
        	},'-',{
            text: 'SW Usuario',
            iconCls: 'user',
            menu: menu2
     		},'-',{
			text:	'Operador',
//			iconCls:	''	 
			menu:	menu3
			},'-',{
				text:	'Facturacion',
				menu:	menu4
			},'-',{
				text:	'Indicadores',
				menu:	menu5
			},'-',{
				text:	'Gerencia',	
				menu:	menu6
			},'-',{
				text:	'Mi Perfil',
				menu:	menu7	
	 });
///////////////////////////////////esto es aparte del menu
    //menu.addSeparator();
    // Menus have a rich api for
    // adding and removing elements dynamically
   
    // items support full Observable API
   
    // items can easily be looked up
   
    // access items by id or index
   

    // They can also be referenced by id in or components
    

  

    // add a combobox to the toolbar
    var combo = new Ext.form.ComboBox({
        store: store,
        displayField: 'state',
        typeAhead: true,
        mode: 'local',
        triggerAction: 'all',
        emptyText:'Select a state...',
        selectOnFocus:true,
        width:135
    });
    //tb.addField(combo);

    tb.doLayout();

   //////////////////////////FUNCIONES DE LOS BOTONES
   function menu1crear(){
	   var url = 'Formulario_Citas.asp?Csc_Usuario=<%=Usuario_Csc%>';
	 //  alert(txt_crear)
	   document.getElementById('myIframe').src=url;
	   }
function menu1modificar(){
	var url = 'Autorizacion_Listado.asp?Csc_Usuario=<%=Usuario_Csc%>"';
	document.getElementById('myIframe').src=url;
	}
function menu1autorizaciones(){
	var url = 'Autorizaciones_Listado.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}

	
	
	
	
	
	
function menu2crear(){
	var url = 'Formulario_Citas.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}
function menu2modificar(){
	var url = 'Modificar_Servicio.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}  
function menu3crear(){
	var url = 'crear_conductor.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}  
function menu3modificar(){
	var url = 'lista_Conductores.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}
function menu3libretas(){
	var url = 'Historial_Libretas.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu4autorizacion(){
	var url = 'Facturacion_Autorizaciones_Listado.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu4verificacion(){
	var url = 'Facturacion_Listado_Usuarios.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu4crear(){
	var url = 'Facturacion_Crear_Factura.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu4listado(){
	var url = 'Facturacion_Listado.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu4unificadoop(){
	var url = 'Facturacion_Verificacion_Operador.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu4aunificadous(){
	var url = 'Facturacion_Verificacion_Usuario.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu4pagoop(){
	var url = 'Facturacion_Verificacion_PagoOperador.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu5servicio(){
	var url = 'Setting_S.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
	function menu5destinos(){
	var url = 'Setting_D1.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu5usuarios(){
	var url = 'Listado_Usuarios.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu5encuesta(){
	var url = 'Usuario_Consulta.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu6indicadores(){
	var url = 'Indicador.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   
function menu7irainicio(){
	var url = 'Inicio.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   

function menu7cambioclave(){
	var url = 'Cambio_Clave.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   

function menu7ayuda(){
	var url = 'Ayuda.asp?Csc_Usuario=<%=Usuario_Csc%>';
	document.getElementById('myIframe').src=url;
	}   

function menu7cerrasession(){
	var url = 'pass.asp?acces=0';
	document.getElementById('myIframe').src=url;
	}   



});

</script>
<div id="container">
    <div id="toolbar">Haces Inversiones y Servicios - BHM T&amp;C</div>
    <iframe name="myIframe" id="myIframe"  src="" width="100%" height="100%" style="vertical-align:top;" scrolling="yes" frameborder="1" >
</iframe>
</div>
</body>
</html>
<script language="javascript">
	var alto 	= screen.height;
	var alt = (alto + 100)	    
	var	ajuste	= ((25*alto)/100);
	alert(alt);
	var div 	= alt-ajuste;
	//	alert('Alto: '+alto+' - Ajuste: '+ajuste+' - Div:'+div);
	document.getElementById('container').style.height = div+'px';
	document.getElementById('myIframe').style.height = (div-30)+'px';
</script>