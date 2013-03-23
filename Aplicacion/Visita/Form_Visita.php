<?php
include ("../../Conexion.php");
@session_start();
$nombres=$_SESSION["Nombres"];
$apeliidos=$_SESSION["Apellidos"];
$Csc_Login=$_SESSION["Csc"];
$Perfil=$_SESSION["Perfil"];
if($Perfil==3)
	{
		$disabled= true;
	}
else{
		$disabled= false;
	}
 
$nombrc=$nombres." ".$apeliidos;
$time=date("d/m/Y");
?>
<html>
<head>
<meta name="content"  content="text/html;" http-equiv="content-type" charset="utf-8">
<link rel="stylesheet" type="text/css" href="../../ExtJS/resources/css/ext-all.css">
<link rel="stylesheet" type="text/css" href="../../ExtJS/welcomeinc.css">
<link rel="stylesheet" type="text/css" href="../../ExtJS/examples/form/file-upload.css">

<script type="text/javascript" src="../../ExtJS/adapter/ext/ext-base.js"></script>
<!--<script type="text/javascript" src="/../../Alert.js"></script>-->
<script type="text/javascript" src="../../ExtJS/ext-all.js"></script>
<script type="text/javascript" src="../../ExtJS/ext-lang-sp.js"></script>
<script type="text/javascript" src="../../ExtJS/examples/ux/fileuploadfield/FileUploadField.js"></script> 
<script type="text/javascript" src="../../ExtJS/examples/ux/GMapPanel.js"></script>

<!--AIzaSyA-OLwP8KTTrkuV5PqDOQg0Pjx5iKTgdU8-->
</head>
<title>NORTH COMPAS</title> 

<style type="text/css">
.backfielset{
	background:#666;
	}
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
	background-image: url('../../ExtJS/docs/resources/block-bg.gif');
	color:#003366;
	font:bold 13px tahoma,arial,helvetica;
	padding:10px;
	margin:0;
}
.icon-login {
	background-image:url('../../images/login.png') !important;
}
p {
	margin:5px;
}
/*
.settings {
	background-image:url(file:///D|/Mis%20Documentos/bhmips/ExtJS/examples/shared/icons/fam/folder_wrench.png);
}
.nav {
	background-image:url(file:///D|/Mis%20Documentos/bhmips/ExtJS/examples/shared/icons/fam/folder_go.png);
}

.user {
    background-image:url(file:///D|/Mis%20Documentos/bhmips/ExtJS/examples/shared/icons/fam/user.gif) !important;
}*/
.DatosBasicos {
    background-image:url(DatosBasicos.png) !important;
}
.InformacionVIVIENDA{ 
	background-image:url(INFORMACIONVIVIENDA.png);
}
.Documentos{ 
	background-image:url(DOCUMENTOS.png);
}
.InformacionACADEMICA{ 
	background-image:url(INFORMACIONACADEMICA.png);
}
.InformacionLABORAL{ 
	background-image:url(INFORMACIONLABORALFINAL.png);
}
.InformacionFamiliar{ 
	background-image:url(INFORMACIONFAMILIAR.png);
}
.INFORMACIONFINANCIERA{ 
	background-image:url(INFORMACIONFINANCIERA.png);
}
.MEDIOSAUDIOVISUALES{ 
	background-image:url(MEDIOSAUDIOVISUALES.png);
}
.CONCEPTOGENERAL{ 
	background-image:url(CONCEPTOGENERAL.png);
}
.cssBuscar{ 
	background-image:url(../../Images/Iconos/find.png);
}
tr{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	width:200px;
	}

</style>

<script language="javascript">
Ext.onReady(function(){
 		//Daprendio//NivelIdioma

		var ds_Tab1 = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
	           url: 'Visita_SQL.php?consulta=10'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Fecha_Nacimiento', mapping: 'Fecha_Nacimiento'},
			{name: 'Ciudad', mapping: 'Ciudad'},//Departamento
			{name: 'Departamento', mapping: 'Departamento'},
			{name: 'Telefono', mapping: 'Telefono'},
			{name: 'Celular1', mapping: 'Celular1'},
			{name: 'Celular2', mapping: 'Celular2'},
			{name: 'Grupo_Sanguineo', mapping: 'Grupo_Sanguineo'},
			{name: 'Observacion', mapping: 'Observacion'},
			{name: 'Mail', mapping: 'Mail'},
			{name: 'Municipio', mapping: 'Municipio'}
			

        ])
    });
	var ds_Tab2 = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
	           url: 'Visita_SQL.php?consulta=11'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Direccion', mapping: 'Direccion'},
			{name: 'Ciudad', mapping: 'Ciudad'},//Departamento
			{name: 'Barrio_Dsc', mapping: 'Barrio_Dsc'},
			{name: 'Estrato', mapping: 'Estrato'},
			{name: 'Departamento', mapping: 'Departamento'},
			{name: 'Municipio_Dsc', mapping: 'Municipio_Dsc'},
			{name: 'T_inmueble', mapping: 'T_inmueble'},
			{name: 'Tipo_Inmueble', mapping: 'Tipo_Inmueble'},
			{name: 'Arrendador', mapping: 'Arrendador'},
			{name: 'Canon', mapping: 'Canon'},
			{name: 'Nombre', mapping: 'Nombre'},
			{name: 'Entorno', mapping: 'Entorno'},
			{name: 'Distribucion', mapping: 'Distribucion'},
			{name: 'Caracteristicas', mapping: 'Caracteristicas'},
			{name: 'Georeferenciacion', mapping: 'Georeferenciacion'},
			{name: 'Foto', mapping: 'Foto'},
			{name: 'Observaciones', mapping: 'Observaciones'}

			

        ])
    });	
		
	var ds_Tab3 = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
	           url: 'Visita_SQL.php?consulta=12'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Num_Licencia', mapping: 'Num_Licencia'},
			{name: 'Categoria', mapping: 'Categoria'},
			{name: 'PendientesL', mapping: 'PendientesL'},
			{name: 'Observaciones', mapping: 'Observaciones'},
			{name: 'RuntObservaciones', mapping: 'RuntObservaciones'},
			{name: 'Vehiculo1', mapping: 'Vehiculo1'},
			{name: 'Placas1', mapping: 'Placas1'},
			{name: 'Vehiculo2', mapping: 'Vehiculo2'},
			{name: 'Placas2', mapping: 'Placas2'},
			{name: 'Vehiculo3', mapping: 'Vehiculo3'},
			{name: 'Placas3', mapping: 'Placas3'},
			{name: 'PendientesV', mapping: 'PendientesV'},
			{name: 'ObservacionesV', mapping: 'ObservacionesV'},
			{name: 'Moto1', mapping: 'Moto1'},
			{name: 'PlacaM1', mapping: 'PlacaM1'},
			{name: 'Moto2', mapping: 'Moto2'},
			{name: 'PlacaM2', mapping: 'PlacaM2'},
			{name: 'PendienteM', mapping: 'PendienteM'},
			{name: 'ObservacionesM', mapping: 'ObservacionesM'},
			{name: 'LibretaCat', mapping: 'LibretaCat'},
			{name: 'LibretaCod', mapping: 'LibretaCod'},
			{name: 'Num_Libreta', mapping: 'Num_Libreta'},
			{name: 'Distrito', mapping: 'Distrito'},
			{name: 'SalvoconductoA', mapping: 'SalvoconductoA'},
			{name: 'TipoA', mapping: 'TipoA'},
			{name: 'MarcaA', mapping: 'MarcaA'},
			{name: 'CalibreA', mapping: 'CalibreA'},
			{name: 'SerieNum', mapping: 'SerieNum'},
			{name: 'ReporteD', mapping: 'ReporteD'},
			{name: 'CertificadoVecindad', mapping: 'CertificadoVecindad'},
			{name: 'CodPasado', mapping: 'CodPasado'},
			{name: 'NumPasado', mapping: 'NumPasado'},
			{name: 'VencePasado', mapping: 'VencePasado'},
			{name: 'Pasaporte', mapping: 'Pasaporte'},
			{name: 'VencePasaporte', mapping: 'VencePasaporte'},
			{name: 'NumVisa', mapping: 'NumVisa'},
			{name: 'VenceVisa', mapping: 'VenceVisa'},
			{name: 'Pais', mapping: 'Pais'},
			{name: 'Antecedentes', mapping: 'Antecedentes'},
			{name: 'Datacredito', mapping: 'Datacredito'},
			{name: 'Clinton', mapping: 'Clinton'},
			{name: 'ObTab3', mapping: 'ObTab3'}
			
			])
    });		
		
	var ds_Tab4 = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
	           url: 'Visita_SQL.php?consulta=13'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Grid1', mapping: 'Grid1'},
			{name: 'Grid2', mapping: 'Grid2'},
			{name: 'Grid3', mapping: 'Grid3'},
			{name: 'DocFalso', mapping: 'DocFalso'},
			{name: 'DocAdult', mapping: 'DocAdult'},
			{name: 'Observaciones', mapping: 'Observaciones'},
			{name: 'Fecha_Creacion', mapping: 'Fecha_Creacion'}
		])
    });			
	
	
	var ds_Tab5 = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
	           url: 'Visita_SQL.php?consulta=14'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Nombres_Familiares', mapping: 'Nombres_Familiares'},
			{name: 'Apellidos_Familiares', mapping: 'Apellidos_Familiares'},
			{name: 'Cargo_Familiares', mapping: 'Cargo_Familiares'},
			{name: 'Telefono_Familiares', mapping: 'Telefono_Familiares'},
			{name: 'Nombre_Amigo', mapping: 'Nombre_Amigo'},
			{name: 'Apellido_Amigo', mapping: 'Apellido_Amigo'},
			{name: 'Cargo_Amigo', mapping: 'Cargo_Amigo'},
			{name: 'Telefono_Amigo', mapping: 'Telefono_Amigo'},
			{name: 'Grid_Referencias', mapping: 'Grid_Referencias'},
			{name: 'Estado_Civil', mapping: 'Estado_Civil'},
			{name: 'Nombre_Conyuge', mapping: 'Nombre_Conyuge'},
			{name: 'Apellidos_Conyuge', mapping: 'Apellidos_Conyuge'},
			{name: 'Tipo_Identificacion', mapping: 'Tipo_Identificacion'},
			{name: 'Numero_Identificacion', mapping: 'Numero_Identificacion'},
			{name: 'Telefono_Conyuge', mapping: 'Telefono_Conyuge'},
			{name: 'Celular_Conyuge', mapping: 'Celular_Conyuge'},
			{name: 'Mail_Conyuge', mapping: 'Mail_Conyuge'},
			{name: 'Empresa_Conyuge', mapping: 'Empresa_Conyuge'},
			{name: 'Tel_TrabajoConyu', mapping: 'Tel_TrabajoConyu'},
			{name: 'Actividad_Conyuge', mapping: 'Actividad_Conyuge'},
			{name: 'Grid_Hijos', mapping: 'Grid_Hijos'},
			{name: 'Nombre_Padre', mapping: 'Nombre_Padre'},
			{name: 'Apellido_Padre', mapping: 'Apellido_Padre'},
			{name: 'Pais_P', mapping: 'Pais_P'},
			{name: 'Departamento_Csc', mapping: 'Departamento_Csc'},
			{name: 'Ciudad_Csc', mapping: 'Ciudad_Csc'},
			{name: 'Telefono_Padre', mapping: 'Telefono_Padre'},
			{name: 'Celular_Padre', mapping: 'Celular_Padre'},
			{name: 'Actividad', mapping: 'Actividad'},
			{name: 'Empresa_Padre', mapping: 'Empresa_Padre'},
			{name: 'Tel_TraPadre', mapping: 'Tel_TraPadre'},
			{name: 'Nombre_Madre', mapping: 'Nombre_Madre'},
			{name: 'apellidos_Madre', mapping: 'apellidos_Madre'},
			{name: 'Pais_M', mapping: 'Pais_M'},
			{name: 'Departamento_CscM', mapping: 'Departamento_CscM'},
			{name: 'Ciudad_CscM', mapping: 'Ciudad_CscM'},
			{name: 'Tel_Madre', mapping: 'Tel_Madre'},
			{name: 'Cel_Madre', mapping: 'Cel_Madre'},
			{name: 'Actividad_M', mapping: 'Actividad_M'},
			{name: 'Empresa_Madre', mapping: 'Empresa_Madre'},
			{name: 'Tel_TraMadre', mapping: 'Tel_TraMadre'},
			{name: 'Grid_Hermanos', mapping: 'Grid_Hermanos'}
			
			
		])
    });
var ds_Tab6 = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
	           url: 'Visita_SQL.php?consulta=15'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Observaciones', mapping: 'Observaciones'},
			{name: 'Grid_Laboral', mapping: 'Grid_Laboral'},
			{name: 'Fecha_Creacion', mapping: 'Fecha_Creacion'}
		])
    });
	
var ds_Tab7 = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
	           url: 'Visita_SQL.php?consulta=16'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Salario', mapping: 'Salario'},
			{name: 'Pension', mapping: 'Pension'},
			{name: 'Arriendos', mapping: 'Arriendos'},
			{name: 'Honorarios', mapping: 'Honorarios'},
			{name: 'Otros', mapping: 'Otros'},
			{name: 'EgresoA', mapping: 'EgresoA'},
			{name: 'EgresoB', mapping: 'EgresoB'},
			{name: 'EgresoC', mapping: 'EgresoC'},
			{name: 'EgresoD', mapping: 'EgresoD'},
			{name: 'EgresoE', mapping: 'EgresoE'},
			{name: 'TotalIngreso', mapping: 'TotalIngreso'},
			{name: 'TotalEgreso', mapping: 'TotalEgreso'},
			{name: 'RetiroTab7', mapping: 'RetiroTab7'},
			{name: 'ObservacionesTab7', mapping: 'ObservacionesTab7'}
		])
    });	
	var ds_Tab8 = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
	           url: 'Visita_SQL.php?consulta=17'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Observaciones', mapping: 'Observaciones'}
		])
    });	
	var ds_Tab9 = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
	           url: 'Visita_SQL.php?consulta=18'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Fuma', mapping: 'Fuma'},
			{name: 'Medicamentos', mapping: 'Medicamentos'},
			{name: 'Actitud', mapping: 'Actitud'},
			{name: 'Alimentos', mapping: 'Alimentos'},
			{name: 'Analisis', mapping: 'Analisis'},
			{name: 'ObActitud', mapping: 'ObActitud'},
			{name: 'Concepto', mapping: 'Concepto'},
			{name: 'ObConcepto', mapping: 'ObConcepto'}
			
		])
    });		
		
	var ds_cargueInicial = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
	           url: 'Visita_SQL.php?consulta=19'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Tel_Fijo', mapping: 'Tel_Fijo'},
			{name: 'Tel_Celular', mapping: 'Tel_Celular'},
			{name: 'Tel_Celular2', mapping: 'Tel_Celular2'}
			
		])
    });	
		var ds_Buscar_Nombre = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
	           url: 'Visita_SQL.php?consulta=4'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Csc_Creacion', mapping: 'Csc_Creacion'},
			{name: 'Nombre_Completo', mapping: 'Nombre_Completo'},
			{name: 'Nombres', mapping: 'Nombres'},
			{name: 'Apellidos', mapping: 'Apellidos'},
			{name: 'Num_Identificacion', mapping: 'Num_Identificacion'},
			{name: 'T_Identificacion', mapping: 'T_Identificacion'}

        ])
    });
	//------------------------------------------------------------------------------------------
	
	//Tpl Buscar_Nombre-------------------------------------------------------------------------
	var Tpl_Buscar_Nombre = new Ext.XTemplate(
        '<tpl for="." id="search-item"><div class="search-item">',
            '<span>{Nombre_Completo}</span>',
        '</div></tpl>'
    );
	//------------------------------------------------------------------------------------------

	//ds_Buscar_Identificacion------------------------------------------------------------------
	var ds_Buscar_Identificacion = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({url: 'Visita_SQL.php?consulta=5'}),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
          	{name: 'Csc_Creacion', mapping: 'Csc_Creacion'},
			{name: 'Nombre_Completo', mapping: 'Nombre_Completo'},
			{name: 'Nombres', mapping: 'Nombres'},
			{name: 'Apellidos', mapping: 'Apellidos'},
			{name: 'Num_Identificacion', mapping: 'Num_Identificacion'},
			{name: 'T_Identificacion', mapping: 'T_Identificacion'}

        ])
    });
	//------------------------------------------------------------------------------------------
	
	//Tpl Buscar_Identificacion-----------------------------------------------------------------
	var Tpl_Buscar_Identificacion = new Ext.XTemplate(
        '<tpl for="." id="search-item"><div class="search-item">',
            '<span>{Num_Identificacion}</span>',
        '</div></tpl>'
    );
	//------------------------------------------------------------------------------------------

	//ds_Buscar_CIE-------------------------------------------------------------------------
	var ds_Buscar_CIE = new Ext.data.Store({
        proxy: new Ext.data.HttpProxy({
//            url: 'Actualizacion_Paciente_SQL.asp?consulta=3'
        }),
        reader: new Ext.data.JsonReader({
            root: 'topics',
            totalProperty: 'totalCount',
            id: 'post_id'
        },[
            {name: 'Csc_CIE', mapping: 'csc_CIE'},
			{name: 'Dsc_CIE', mapping: 'dsc_CIE'}
        ])
    });
	//---------------------------------------------------------------------------------------
	//Tpl Buscar_CIE-------------------------------------------------------------------------
	var Tpl_Buscar_CIE = new Ext.XTemplate(
        '<tpl for="." id="search-item"><div class="search-item">',
            '<span>{Dsc_CIE}</span>',
        '</div></tpl>'
    );
	//-------------------------------------------------------------------------------------
	var ds_Principal = new Ext.data.Store({
		proxy: new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=7'}),
		reader: new Ext.data.JsonReader({
			root:'topics',
			totalProperty: 'totalCount'			
		},[
			{name:'csc',mapping:'csc'},
			{name:'Csc_Creacion',mapping:'Csc_Creacion'},
			{name:'Nombres',mapping:'Nombres'},
			{name:'Identificacion',mapping:'Identificacion'},
			{name:'Terceros',mapping:'Terceros'},//Terceros
			{name:'Empresa',mapping:'Empresa'},//Terceros
			{name:'Estado',mapping:'Estado'},
			{name:'Ciudad',mapping:'Ciudad'},
			{name:'Fecha_Solicitud',mapping:'Fecha_Solicitud'}
			]
			)
		});
	
	//-*--------------------------------------------------------------------------------------///////ENVIOS INSERT DS INSERT
	
			
			
		
	//-------------------------------------------------------------------------------------------FIN ENVIOS FINNN DS INSERT
	
//////////////////////////////////
		
	var storeEduFormal = new Ext.data.ArrayStore({
        fields: ['Csc','Nivel','Titulo','Institucion','Otra','Pais','Ingreso','Estado','Finalizacion'],
		data:[]		           
    });	
	
	var storeNoFormal = new Ext.data.ArrayStore({
        fields: ['Csc','Idioma','Dominio','Donde'],
		data:[]		           
    });	
	var storeEduNoFormal = new Ext.data.ArrayStore({
        fields: ['Csc','Tipo','Otro','Pais','Departamento','Ciudad', 'Titulo', 'Institucion', 'Area', 'Ingreso', 'Estado', 'Final'],
		data:[]		           
    });
	var ds_Referencias = new Ext.data.ArrayStore({
        fields: ['Csc','Nombres','Empresa','Cargo','Telefonos','Parentesco'],
		data:[]		           
    });
	
	var ds_Hijos = new Ext.data.ArrayStore({
        fields: ['Csc','Nombres','Apellidos','Nacimiento','Mayor','Empresa','Celular'],
		data:[]		           
    });
	var ds_Hermanos = new Ext.data.ArrayStore({
        fields: ['Csc','Nombres','Apellidos','Pais','Telefono','Celular','Actividad','Empresa','Cargo'],
		data:[]		           
    });
	
	var ds_Laboral = new Ext.data.ArrayStore({
        fields: ['Csc','Empresa','Departamento','Ciudad','Direccion','Razon_Social','Telefono','Cargo','Anos','Retiro'],
		data:[]		           
    });
	
	
	var recId = 100;

    // Tab Principal ----------------------------------------------------------------------------
	
    var tabs = new Ext.FormPanel({
	 defaults:{autoScroll: true},
   	    renderTo: 'tabs',
		//activeTab: 0,
		//deferredRender: false,
		//frame: false,
		autoScroll: true,
		url:'Visita_SQL.php?consulta=8',
		bodyStyle : 'padding:10px;',
		
		//defaults:{autoScroll: true},
		height: 630,
		items:[{
            xtype:'tabpanel',
			id: 'tb_Formularios',
            activeTab: 0,
			resizeTabs      : true,
			defaults:{autoHeight:true, bodyStyle:'padding:5px'}, 
			enableTabScroll : true,
			resizeTabs      : true,
			
            items:[{
					layout:'column',
					title:'Buscar Aspirante',
					id:	'Buscar_aspirante',
					iconCls: 'DatosBasicos',
					items:[{
							columnWidth:.5,
							layout: 'form',
							labelAlign: 'top',
							border:false,
							items: [{
									xtype: 'combo',
									fieldLabel: 'Buscar por Nombres y Apellidos',
									id: 'txt_Buscar_Nombre',								 
									store: ds_Buscar_Nombre,
									minChars : 2,
									maxHeight : 400,
									//allowBlank: false,
									displayField:'Dsc_Paciente',
									typeAhead: false,
									loadingText: 'Consultando..',
									anchor : '75%',
									hideTrigger:true,
									tpl: Tpl_Buscar_Nombre,
									itemSelector: 'div.search-item',
									onSelect: function(record){
										var Nombre_Completo = record.data.Nombre_Completo;
											Nombre_Completo = Nombre_Completo.replace(/<B>/g, "");
											Nombre_Completo = Nombre_Completo.replace("</B>", "");
											this.setValue(Nombre_Completo);
											Ext.getCmp('txt_Buscar_Nombre').setValue(record.data.Nombre_Completo)
											Ext.getCmp('txt_Buscar_Identificacion').setValue(record.data.Num_Identificacion);
											Ext.getCmp('Csc').setValue(record.data.Csc_Creacion);
											Ext.getCmp('Id_C').setValue(record.data.Num_Identificacion);
											Ext.getCmp("txt_nombres").setValue(record.data.Nombres);
											Ext.getCmp("txt_Apellidos").setValue(record.data.Apellidos);
											Ext.getCmp("lst_identificacion").setValue(record.data.T_Identificacion);
											Ext.getCmp('txt_nidentificacion').setValue(record.data.Num_Identificacion);
												
											ds_Principal.load({waitMsg:'Cargando..', params:{Csc:record.data.Csc_Creacion,Id_C:record.data.Num_Identificacion}});
										this.collapse();	
										//alert (record.data.FechaNacimiento);							
									}
								
								},{
									xtype:'hidden',
									id:'Csc',
									name:'Csc'
								},{
									xtype:'hidden',
									id:'Id_C',
									name:'Id_C'
								},{
									xtype:	'hidden',
									id:'csc_Login',
									value:'<?php echo $Csc_Login;?>'
										}]
								
					},{
							columnWidth:.5,
							layout: 'form',
							labelAlign: 'top',
							border:false,
							items: [{
								    xtype: 'combo',
									fieldLabel: 'Buscar por Número de Identificación',
									id: 'txt_Buscar_Identificacion',								 
									store: ds_Buscar_Identificacion,
									minChars : 4,
									maxHeight : 100,
									//allowBlank: false,
									displayField:'txt_Buscar_Identificacion',
									typeAhead: false,
									loadingText: 'Consultando..',
									anchor : '25%',
									hideTrigger:true,
									tpl: Tpl_Buscar_Identificacion,
									itemSelector: 'div.search-item',
									onSelect: function(record){
										var Num_Identificacion = record.data.Num_Identificacion;
											Num_Identificacion = Num_Identificacion.replace(/<B>/g, "");
											Num_Identificacion = Num_Identificacion.replace("</B>", "");
											this.setValue(Num_Identificacion);
											Ext.getCmp('txt_Buscar_Nombre').setValue(record.data.Nombre_Completo)
											Ext.getCmp('txt_Buscar_Identificacion').setValue(record.data.Num_Identificacion);
											Ext.getCmp('Csc').setValue(record.data.Csc_Creacion);
											Ext.getCmp('Id_C').setValue(record.data.Num_Identificacion);
											Ext.getCmp("txt_nombres").setValue(record.data.Nombres);
											Ext.getCmp("txt_Apellidos").setValue(record.data.Apellidos);
											Ext.getCmp("lst_identificacion").setValue(record.data.T_Identificacion);
											Ext.getCmp('txt_nidentificacion').setValue(record.data.Num_Identificacion);
											ds_Principal.load({waitMsg:'Cargando..', params:{Csc:record.data.Csc_Creacion,Id_C:record.data.Num_Identificacion}});		
										this.collapse();									
									}
								}]
					},{
						
							columnWidth:1,
							layout: 'form',
							labelAlign: 'top',
							border:false,
							items: [{	
						
												height: 200,
												anchor: '90%',
												//title: 'Educacion Formal',
												xtype: 'grid',
												id: 'grid_Principal',
												cm: new Ext.grid.ColumnModel([
														   {header: "csc", width: 30, dataIndex:'Csc_Creacion', hidden: true},
														   {header: "Nombres", width: 200,dataIndex:'Nombres'},
														   {header: "Identificacion", width: 50,dataIndex:'Identificacion'},
														   {header: "Fecha Solicitud", width: 100,dataIndex:'Fecha_Solicitud'},
														   {header: "Terceros", width: 200,dataIndex:'Terceros'},
														   {header: "Empresa", width: 200,dataIndex:'Empresa'},
														   {header: "Ciudad", width:100,dataIndex:'Ciudad'},
														   {header: "Estado", width: 90,dataIndex:'Estado'}
														   
												]),
													store:  ds_Principal,
														    tbar: [{
															text: 'Consultar',
														    //iconCls: 'icon-new'
														    handler: function(){ 
															var Id_C = document.getElementById('Id_C').value;
															var Csc = document.getElementById('Csc').value;
															if (Id_C==''){
																Ext.Msg.alert("Error",'Cosnulte de Nuevo');
																}
															ds_Principal.load({waitMsg:'Cargando..', params:{Csc:Csc,Id_C:Id_C}});
															}// var EduFormalData = {
	//													Título: document.getElementById('txt_Título').value,
	//													FIngreso: document.getElementById('date_ingreso').value,
	//													FFinalizacion: document.getElementById('date_finalizacion').value,
	//													Ciudad: document.getElementById('lst_departamento3').value,
	//	    											Institucion: document.getElementById('lst_institucion').value,
	//													};
	//													alert(document.getElementById('lst_institucion').value);
	//												var r = new storeEduFormal.recordType(EduFormalData, ++recId);
     //                                                    storeEduFormal.insert(0, r);
	//													alert('paso');
														// }
														 
                                   //},{
                                   //            text: 'Borrar',
                                    //           iconCls: 'icon-delete',
                                     //          handler: function(){
                                     //          storeEduFormal.removeAll();
                                     //          }                                                                                                                                                                                           
                                   
             								 }]//FIN TBAR
								}],
						buttons:[{
							text:'Continuar',
							id:	'btn_Continuar',
							disabled:true,
							handler: function(){
								Ext.getCmp('Datos_Basicos').setDisabled(false);//
								Ext.getCmp('tb_Formularios').setActiveTab(1);
								//tabs.setActiveTab(1);
								Ext.getCmp('Buscar_aspirante').setDisabled(true);//
								var Csc = document.getElementById('Csc').value;
								ds_Tab1.load({waitMsg:'Consultando', params:{Csc:Csc}});
								ds_cargueInicial.load({waitMsg:'Consultando..', params:{Csc:Csc}});
								var Csc = document.getElementById('Csc').value;
													document.getElementById('Upload2').src='UploadFoto.php?csc='+Csc;
								}
							}]

					}]
			},{
					layout:'column',
					title:'Datos Básicos',
					iconCls: 'DatosBasicos',
					id:'Datos_Basicos',
					activeTab: 1,
					disabled: true,
					items:[{
							columnWidth:.5,
							layout: 'form',
							border:false,
							items: [{
									xtype:	'hidden',
									name:	'tab',
									id:	'tab'
								},{
									xtype: 'textfield',
									fieldLabel:	'Nombres',
									id:	'txt_nombres',
									disabled:true,
									name:	'txt_nombres',
									anchor:	'70%'
								},{
									xtype: 'datefield',
									fieldLabel:	'Fecha Nacimiento',
									name:	'Nacimiento',
									id: 'F_Nacimiento',
									//allowBlank: false,
									format: 'd/m/Y',
									emptyText: 'dia/mes/año',
									width:	100
									//allowBlank:	false		
								},{
									xtype:			'combo',
									fieldLabel:		'Ciudad Nacimiento',
									id: 			'lst_ciudad',
									width:			250,
									mode:           'local',
									emptyText:      'Ciudad Nacimiento',
									msgTarget: 		'side',
									triggerAction:  'all',
									forceSelection: true,
									editable:       false,
									disabled: true,
									name:           'lst_ciudad',
									hiddenName:     'hi_lst_ciudad',
									displayField:   'dsc',
									valueField:     'csc',
									store:          new Ext.data.Store({
										autoLoad: false,
										proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=1'}),
										reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
										})
											
								},{
									xtype:			'combo',
									fieldLabel:		'Tipo Identificación',
									id:	'lst_identificacion',
									width:			250,
									mode:           'local',
									emptyText:      'Tipo Identificación',
									msgTarget: 		'side',
									triggerAction:  'all',
									forceSelection: true,
									editable:       false,
									disabled: true,
									name:           'lst_identificacion',
									hiddenName:     'hi_lst_identificacion',
									displayField:   'dsc',
									valueField:     'csc',
									store:          new Ext.data.Store({
										autoLoad: true,
										proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=2'}),
										reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'float'}, {name:'dsc', type:'string'}])
										})	
								},{
									xtype:	'textfield',
									fieldLabel:	'Teléfono Fijo',
									name:	'txt_Telefono',
									id:	'TelefonoTab1',
									anchor:	'50%'
										
								},{
									xtype:	'textfield',
									fieldLabel:	'Teléfono Celular 2',
									name:	'txt_Celular2',
									id:	'Celular2',
									anchor:	'50%'	
								},{
									xtype:	'combo',
									fieldLabel:	'Gupo Sanguíneo',
									name:	'lst_gsanguineo',
									id:	'lst_gruposanguineo',
									anchor:	'30%',
									mode: 'local',
									hiddenName:	'lst_gsanguineo',
									displayField:'name',
									valueField:'value',
									store: new Ext.data.JsonStore({
										fields:  ['name','value'],
										data: [
											{name:'O-', value:'O-'},
											{name:'O+', value:'O+'},
											{name:'A-', value:'A-'},
											{name:'A+', value:'A+'},
											{name:'B-', value:'B-'},
											{name:'B+', value:'B+'},
											{name:'AB-', value:'AB-'},
											{name:'AB+', value:'AB+'}
											]
										})
								},{
									xtype: 'fieldset',
									anchor:	'80%',
									title: 'Huella',
									autoHeight : true,
									html : '<img src="FotoHuella.png" class="backfielset" title="Empty"/> '
									
								}]
						},{
							columnWidth:.5,
							layout: 'form',
							border:false,
							items: [{
								xtype:	'textfield',
								fieldLabel:	'Apellidos',
								disabled:true,
								name:	'txt_Apellidos',
								id:	'txt_Apellidos',
								anchor:	'70%'
								
							},{
									xtype:			'combo',
									fieldLabel:		'Departamento Nacimiento',
									id: 			'lst_departamento',
									width:			250,
									mode:           'local',
									emptyText:      'Departamento Nacimiento',
									msgTarget: 		'side',
									triggerAction:  'all',
									forceSelection: true,
									editable:       false,
									name:           'lst_departamento',
									hiddenName:     'hi_lst_departamento',
									displayField:   'dsc',
									valueField:     'csc',
									store:          new Ext.data.Store({
										autoLoad: true,
										proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=0'}),
										reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
										}),
									listeners:{
										select: function(){
											var Cdepto = document.getElementById('hi_lst_departamento').value;
											//alert(Cdepto);
											Ext.getCmp('lst_ciudad').setDisabled(false);
											Ext.getCmp('lst_ciudad').store.load({waitMsg:'Consultando', params:{Cdepto:Cdepto}});
											
											document.getElementById('lst_ciudad').value='';
											}
										}	
								},{
									xtype:		'textfield',
									fieldLabel:	'Muncipio Nacimiento',
									emptyText:  'Muncipio Nacimiento',	
									id:	'txt_Municipio',
									anchor :	'70%',
									name:		'txt_Municipio'
									
									
								},{
									xtype:		 'numberfield',
									fieldLabel:  'Número Identificación',
									disabled:true,
									id: 'txt_nidentificacion',
									anchor :	'60%'	
								},{
									xtype:		 'numberfield',
									fieldLabel:  'Teléfono Celular 1',
									name:   	'txt_Celular1',
									id:	'Celular1',
									anchor :	'60%'	
								},{
									xtype:		    'textfield',
									fieldLabel:     'Correo electrónico',
									name:   	   'txt_Mail',
									id:	'txt_Mail',
									vtype:		   'email',
									anchor :	  '70%'
								},{
									xtype: 'fieldset',
									anchor:	'70%',
									title: 'Foto',
									
									autoHeight : true,
									//html : '<iframe src="" id="Upload2" width="98%" height="260px"></iframe>'
                                                                        html:'<div id="map_canvas" style=" height: 100px; width: 100px;"></div>'
										
								}]
						},{
							columnWidth:1,
							layout: 'form',
							border:false,
							items: [{
								xtype:'textarea',
								fieldLabel:'Observaciones',
								id:	'ObTab1',
								anchor:	'80%',
								name:	'Ob1'
							//	allowBlank:false
								}]
							}],
						buttons:[{
							text: 'Volver',
							handler: function (){
								fn_Volver(0)
								}
						},{
							text:'Guardar y Continuar',
							handler: function(){
								/////
							var F_Nacimiento = document.getElementById('F_Nacimiento').value;
							var TelefonoTab1 = document.getElementById('TelefonoTab1').value;
							var Celular2 = document.getElementById('Celular2').value;
							var Celular1 = document.getElementById('Celular1').value;
							
							var lst_gruposanguineo = document.getElementById('lst_gruposanguineo').value;
							var lst_departamento = document.getElementById('lst_departamento').value;
							var txt_Municipio =  document.getElementById('txt_Municipio').value;
							var txt_Mail = document.getElementById('txt_Mail').value;
	if(F_Nacimiento=='' || TelefonoTab1=='' || Celular2=='' || lst_gruposanguineo=='' || lst_departamento=='' || txt_Municipio=='' || txt_Mail=='' || Celular1=='')
							{
								Ext.Msg.alert("Error", 'Existen espacios sin diligenciar por favor valide su información');
								return false;
							}
							 fn_EnvioTabs(1);//
							 Ext.getCmp('Info_Vivienda').setDisabled(true);
							 Ext.getCmp('tb_Formularios').setActiveTab(1);
								var Csc = document.getElementById('Csc').value;
									document.getElementById('Upload3').src='UploadVivienda.php?csc='+Csc;					
							 	}
							}]

			},{
					layout:'column',
					title:'Información de Vivienda',
					id:	'Info_Vivienda',
					//disabled: true,
					activeTab: 2,
					iconCls: 'InformacionVIVIENDA',
					items:[{
							columnWidth:.5,
							layout: 'form',
							border:false,
							items: [{
									
									xtype:		   'textfield',
									fieldLabel:    'Dirección',
									name:   	   'txt_Direccion',
									id: 'txt_DirTab2',
									anchor :	   '70%'
								   },{
									xtype:			'combo',
									fieldLabel:		'Ciudad',
									id: 			'lst_ciudad2',
									anchor :	   '70%',
									mode:           'local',
									emptyText:      'Seleccione ciudad',
									msgTarget: 		'side',
									triggerAction:  'all',
									forceSelection: true,
									editable:       false,
									disabled: true,
									name:           'lst_ciudad2',
									hiddenName:     'hi_lst_ciudad2',
									displayField:   'dsc',
									valueField:     'csc',
									store:          new Ext.data.Store({
										autoLoad: false,
										proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=1'}),
										reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
										})
								   },{
									xtype:		    'textfield',
									fieldLabel:     'Barrio',
									name:   	    'txt_BarrioV',
									id:	'txt_BarrioTab2',
									anchor :	    '90%'
								   },{
											xtype:		'combo',
											name:		'lst_Estrato',
											id:	'lst_EstratoTab2',
											anchor :	'70%',
											fieldLabel:	'Estrato',
											msgTarget: 		'side',
											triggerAction:  'all',
											hiddenName:'hi_lst_estratoV',
											forceSelection: true,
											mode:       'local',
											emptyText:	'Estrato',
											displayField:   'name',
											valueField:     'value',
											store:		new Ext.data.JsonStore({
												fields:['name', 'value'],
												data:	[
												{name:'1', value:'1'},
												{name:'2', value:'2'},
												{name:'3', value:'3'},
												{name:'4', value:'4'},
												{name:'5', value:'5'},
												{name:'6', value:'6'}																								
												]												
											})				   
									},{
                                                                            xtype:'textfield',
                                                                            fieldLabel:     'Referenciacion',
                                                                            name:   	    'txt_localizacion',
                                                                            id:	'txt_localizacion',
                                                                            anchor :	    '70%'
                                                                        }]
							},{
								columnWidth:.5,
								layout: 'form',
								border:false,
								items: [{	
										xtype:			'combo',
										fieldLabel:		'Departamento',
										id: 			'lst_departamento2',
										anchor :	    '70%',
										mode:           'local',
										emptyText:      'Seleccione Departamento',
										msgTarget: 		'side',
										triggerAction:  'all',
										forceSelection: true,
										editable:       false,
										name:           'lst_departamento',
										hiddenName:     'hi_lst_departamento2',
										displayField:   'dsc',
										valueField:     'csc',
										store:          new Ext.data.Store({
											autoLoad: true,
											proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=0'}),
											reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
											}),
										listeners:{
											select: function(){
												var Cdepto = document.getElementById('hi_lst_departamento2').value;
												Ext.getCmp('lst_ciudad2').setDisabled(false);
												Ext.getCmp('lst_ciudad2').store.load({waitMsg:'Consultando', params:{Cdepto:Cdepto}});
												
												document.getElementById('lst_ciudad').value='';
												}
											}	
									   },{
											xtype:		'textfield',
											name:		'Municipio_V',
											id:	'txt_MunicipioTab2',
											anchor :	'70%',
											fieldLabel:	'Municipio'
									  },{
											xtype:		'combo',
											name:		'lst_tinmueble',
											id:	'lst_InmuebleTab2',
											anchor :	'70%',
											fieldLabel:	'T. Inmueble',
											msgTarget: 		'side',
											triggerAction:  'all',
											forceSelection: true,
											mode:       'local',
											hiddenName:'hi_lst_inmuebleV',
											emptyText:	'Seleccione Inmueble',
											displayField:   'name',
											valueField:     'value',
											store:		new Ext.data.JsonStore({
												fields:['name', 'value'],
												data:	[
												{name:'Casa', value:'Casa'},
												{name:'Apartamento', value:'Apartamento'},
												{name:'Habitación', value:'Habitación'},
												{name:'Inquilinato', value:'Inquilinato'}
												]
												
												}) 
									  							   
										   },{
												xtype:		'combo',
												name:		'lst_tinmuebles',
												id:	'lst_InmueblesTab2',
												anchor :	'70%',
												fieldLabel:	'El Inmueble es',
												mode:       'local',
												msgTarget: 		'side',
												triggerAction:  'all',
												forceSelection: true,
												//emptyText:	'Seleccione',
												hiddenName:	'hi_lst_tinmuebles',
												displayField:   'name',
												valueField:     'value',
												store:		new Ext.data.JsonStore({
													fields:['name', 'value'],
													data:	[
													{name:'Propio', value:'Propio'},
													{name:'Familiar', value:'Familiar'},
													{name:'Arriendo', value:'Arriendo'}
													]
												}),
												listeners:{
													select: function(){
														var tinmu = document.getElementById('hi_lst_tinmuebles').value;
														if (tinmu=='Arriendo')
															{
															Ext.getCmp('panel1').expand(true);
															document.getElementById('lst_InmueblesTab2').value='Arriendo';
															}
														else if (tinmu=='Familiar')
															{
															Ext.getCmp('panel2').expand(true);
															document.getElementById('lst_InmueblesTab2').value='Familiar';
															}
															Ext.getCmp('panel1').collapse(true);
															Ext.getCmp('panel2').collapse(true);
														}
													} 
									  				   
											}]
							
								},{
								columnWidth:1.2,
								layout: 'form',
								border:false,
								items: [{
										xtype:'fieldset',
										title: 'Inmueble Arriendo',
										autoHeight:true,
										id:	'panel1',
										width:	600,	
										animated:'',
										animCollapse:true,							
       									collapsed:true,
       									items :[{
											  xtype: 'compositefield',
											  anchor:	'100%',
											  fieldLabel: 'Arrendador',
											  items: [{

														xtype:	'textfield',
														name:	'Arrendador_V',
														id:	'Arrendador_V',
														//emptyText:'Arrendador',
														width:	280	
													},{
														xtype:	'displayfield',
														value:	'Canon:'
														
													},{
														xtype:	'numberfield',
														//emptyText:	'Valor',
														name:	'Canon_V',
														id:	'Canon_V',
														width:	100	
													}]
										}],listeners:{
											expand: function(){
												var Csc = document.getElementById('Csc').value;
												ds_Tab2.load({waitMsg:'Consultando', params:{Csc:Csc}});
												}
											}
									}]		
								},{
								columnWidth:1.2,
								layout: 'form',
								border:false,
								items: [{
										xtype:'fieldset',
										title: 'Inmueble Familiar',
										autoHeight:true,
										id:	'panel2',
										width:	600,	
										animated:'',
										animCollapse:true,							
       									collapsed:true,
       									items :[{
											  xtype: 'compositefield',
											  anchor:	'100%',
											  fieldLabel: 'Nombre Dueño', 
											  items: [{

														xtype:	'textfield',
														name:	'Dueno_V',
														id:	'Dueno_V',
														width:	250
													}]
										}],listeners:{
											expand: function(){
												var Csc = document.getElementById('Csc').value;
												ds_Tab2.load({waitMsg:'Consultando', params:{Csc:Csc}});
												}
											}
									}]		
								},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{     
										xtype:		'textarea',
										fieldLabel: 'Referencias del entorno',
										name:	'Referencias_V',
										id:	'txt_ReferenciasTab2',
										emptyText:	'Descripción entorno...',
										anchor: '70%'
										 }]
								},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{
										 xtype:		'textarea',
										 fieldLabel: 'Distribución fisica y condiciones generales',
										 id:	'txt_DistribucionTab2',
										 name:	'Distribucion_V',
										 emptyText:	'Descripción distribución...',
										 anchor: '70%'
														 
									  }]	
								},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{
										 xtype:		'textarea',
										 fieldLabel: 'Características de convivencia',
										 name:		'Convivencia_V',
										 id:	'txt_caracteristicasTab2',
										 emptyText:	'Descripción características...',
										 anchor: '70%'
										},{
											
											xtype:'textarea',
											fieldLabel:	'Observaciones',
											name: 'Ob2',
											id:	'ObservacionesTab2',
											width:500
										},{
											xtype:	'hidden',
											id:	'txt_perfil',									
											value:	'<?php echo $Perfil;?>'
											}]	
								},{
								columnWidth:.5,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{
											xtype:	'fieldset',
											//bodyStyle : 'height: 150px',
											anchor:	'90%',
											title: 'Georeferenciación',
											autoHeight : true,
											layout: 'fit',
											items:[{
                                                                                            html:	'<iframe id="mapaIframe" src="mapa.php" style="width: 99%; height: 400px; border:2px solid #000;"></div>'
											}]
										}]	
								},{
								columnWidth:.5,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{
											xtype:	'fieldset',
											anchor:	'90%',
											//width:	200,
											//height: 500,
											title: 'Foto vivienda',
											autoHeight : true,
											layout: 'fit',
											html : '<iframe src="" id="Upload3" width="98%" height="395px"></iframe> '
									
										
									}]
								}], buttons:[{
									text: 'Volver',
										handler: function(){
											fn_Volver(1);
											}
								},{
									text:'Guardar y Continuar',
									handler: function(){
																		
													fn_EnvioTabs(2);
                                                                                                        /*Ext.getCmp('tabdocs').setDisabled(false);
													Ext.getCmp('Info_Vivienda').setDisabled(true);
													Ext.getCmp('tb_Formularios').setActiveTab(3);
													Ext.getCmp('field').expand(true);
													var Csc = document.getElementById('Csc').value;
													ds_Tab3.load({waitMsg:'Consultando', params:{Csc:Csc}});
													Ext.getCmp('field').expand(true);
													Ext.getCmp('Runt').expand(true);
													Ext.getCmp('fieldvehiculo').expand(true);
													Ext.getCmp('fieldvehiculo').expand(true);
													Ext.getCmp('fieldMoto').expand(true);
													Ext.getCmp('fieldLibreta').expand(true);
													Ext.getCmp('fieldArma').expand(true);
													Ext.getCmp('fieldAntecedentes').expand(true);
													Ext.getCmp('fieldVecindad').expand(true);	
													Ext.getCmp('fieldPasadoJudicial').expand(true);	
													Ext.getCmp('fieldPasaporte').expand(true);
													Ext.getCmp('fieldVisa').expand(true);
													Ext.getCmp('fieldAntecedentesJu').expand(true);
													Ext.getCmp('fieldDatacredito').expand(true);
													Ext.getCmp('fieldClinton').expand(true);
													*/
											
										}
										}]
			},{
					layout:'column',
					title:'Documentos',
					id:'tabdocs',
					disabled:	true,
					activeTab: 3,
					iconCls:'Documentos',
					items:[{
								columnWidth:.8,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{
										xtype: 'hidden',
										id: 'Contador_documentos',
										value: '0'
									},{
										xtype:			'fieldset',
										title: 			'Tiene  licencia de conducción?',//
										autoHeight:		true,
										id:				'field',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:	true,
       									items :[{
											   	
										//},{
										  		xtype: 'compositefield',
												fieldLabel:	'Licencia',
												anchor:	'100%',
												items:[{
														xtype:		'displayfield',
														value:		'Número de '												
													},{
														xtype:		'textfield',
														name:		'num_licencia',
														id:	 'num_licencia',
														
														anchor :	'50%'
													 },{
														 xtype:		'displayfield',
														 value:		'Categoría'	
												 	},{
														xtype:		'textfield',
														name:		'num_categoria',
														
														id:	'num_categoria',
														width :	 	50	
													}]
										},{
												xtype: 'compositefield',
												fieldLabel:	'Pendientes',
												anchor:	'100%',
												items:[{
															xtype:		'combo',
															name:		'lst_licencia',
															id:	'lst_licencia',
															width:		200,
															mode:       'local',
															msgTarget: 		'side',
															triggerAction:  'all',
															forceSelection: true,
															emptyText:	'Seleccione',
															hiddenName:	'hi_lst_licencia',
															
															displayField:   'name',
															valueField:     'value',
															store:		new Ext.data.JsonStore({
															fields:['name', 'value'],
															data:	[
																{name:'SI', value:'SI'},
																{name:'NO', value:'NO'}															
															]
															})
													},{
														xtype:		'displayfield',
														value:		'Observaciones'
													},{
														xtype:		'textarea',
														name:	'ObLicencia',
														id:	'ObLicencia',
														width:		300
													}]			
										  }]//,listeners:{
											//  expand : function(){
											//					setTimeout(fn_Enviarcargue(3), 5000);
											//					//alert("Expand")	
											//					}
										  	//			}
								 }]
						},{
								columnWidth:.8,
								layout: 'form',
								//labelAlign: '',
								//bodyStyle : 'padding: 1px',
								border:false,
								items: [{
										xtype:			'fieldset',
										title: 			'Anotacion en bases de datos del RUNT?',//
										autoHeight:		true,
										id:				'Runt',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkbox:	true,
										checkboxToggle:	true,
										items:[{
											layout: 'column',
												items:[{
														columnWidth:1,
														layout: 'form',
														labelAlign: 'top',
														bodyStyle : 'padding: 5px',
														border:false,
														items: [{
															xtype:	'textfield',
															fieldLabel: 'Observaciones',
															disabled: '<? echo $disabled;?>',
															width:	350,
															name:'ObRunt',
															id:	'ObRunt'
															}]
														}]
											}]//,listeners:{
											  //expand : function(){
											//					setTimeout(fn_Enviarcargue(3), 5000);
											//					}
										  	//			}
       									
								}]
							
						},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{
										xtype:			'fieldset',
										title: 			'Tiene vehiculo?',
										autoHeight:		true,
										id:				'fieldvehiculo',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
											   	layout: 'column',
												items:[{
														columnWidth:1,
														layout: 'form',
														labelAlign: 'top',
														bodyStyle : 'padding: 5px',
														border:false,
														items: [{
															
														//},{	
																xtype:	'compositefield',
																anchor:	'100%',
																fieldLabel:	'Marca vehículo 1',
																items:[{
																	xtype:	'textfield',
																	name:	'txt_vehiculo1',
																	id:	'txt_vehiculo1',
																	width:	250
																	},{
																	xtype:	'displayfield',
																	value:	'Placas Vehículo 1:'	
																	},{
																	xtype:	'textfield',
																	name:	'txt_placas1',
																	id:	'txt_placas1',
																	width:	100	
																	}]
													},{
																xtype:	'compositefield',
																anchor:	'100%',
																fieldLabel:	'Marca vehículo 2',
																items:[{
																	xtype:	'textfield',
																	name:	'txt_vehiculo2',
																	id:	'txt_vehiculo2',
																	width:	250
																	},{
																	xtype:	'displayfield',
																	value:	'Placas vehículo 2:'	
																	},{
																	xtype:	'textfield',
																	name:	'txt_placas2',
																	id:	'txt_placas2',
																	width:	100	
																	}]	
																},{
																xtype:	'compositefield',
																anchor:	'100%',
																fieldLabel:	'Marca vehículo 3',
																items:[{
																	xtype:	'textfield',
																	name:	'txt_vehiculo3',
																	id:	'txt_vehiculo3',
																	width:	250
																	},{
																	xtype:	'displayfield',
																	value:	'Placas vehículo 3:'	
																	},{
																	xtype:	'textfield',
																	name:	'txt_placas3',
																	id:	'txt_placas3',
																	width:	100	
																	}]	
																},{
															xtype:		'combo',
															name:		'lst_vehiculo',
															id:	'lst_vehiculo',
															fieldLabel:	'Pendiente',
															width:		200,
															mode:       'local',
															msgTarget: 		'side',
															triggerAction:  'all',
															forceSelection: true,
															emptyText:	'Seleccione',
															disabled: '<? echo $disabled;?>',
															hiddenName:	'hi_lst_vehiculo',
															displayField:   'name',
															valueField:     'value',
															store:		new Ext.data.JsonStore({
															fields:['name', 'value'],
															data:	[
																{name:'SI', value:'SI'},
																{name:'NO', value:'NO'}															
															]
															})
														},{
															xtype:	'textarea',
															fieldLabel:	'Observaciones',
															name:	'ObVehiculo',
															disabled: '<? echo $disabled;?>',
															id:	'ObVehiculo',
															width:		350
																	
																}]													
													
															}]
												}]//,listeners:{
											  //expand : function(){
											//					setTimeout(fn_Enviarcargue(3), 5000);
																//alert('expand3')
											//					}
										  	//			}	
										
									}]
							
								
							},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{	
										xtype:			'fieldset',
										title: 			'Tiene moto?',
										autoHeight:		true,
										id:				'fieldMoto',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
															
													//	},{
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'Marca Moto ',
														items:[{
															xtype:	'textfield',
															name:	'txt_moto1',
															id:	'txt_moto1',
															width:	250
															},{
															xtype:	'displayfield',
															value:	'Placa de la moto'	
															},{
															xtype:	'textfield',
															name:	'num_moto1',
															id:	'num_moto1',
															width:	100	
														}]
												},{
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'Marca Moto ',
														items:[{
															xtype:	'textfield',
															name:	'txt_moto2',
															id:	'txt_moto2',
															width:	250
															},{
															xtype:	'displayfield',
															value:	'Placa de la moto'	
															},{
															xtype:	'textfield',
															name:	'num_moto2',
															id:	'num_moto2',
															width:	100	
														}]
												},{
															xtype:		'combo',
															name:		'lst_moto',
															id:		'lst_moto',
															width:		200,
															mode:       'local',
															fieldLabel:	'Pendiente',
															msgTarget: 		'side',
															triggerAction:  'all',
															forceSelection: true,
															disabled: '<? echo $disabled;?>',
															emptyText:	'Seleccione',
															hiddenName:	'hi_lst_moto',
															displayField:   'name',
															valueField:     'value',
															store:		new Ext.data.JsonStore({
															fields:['name', 'value'],
															data:	[
																{name:'SI', value:'SI'},
																{name:'NO', value:'NO'}															
															]
															})
														},{
															xtype:	'textarea',
															fieldLabel:	'observaciones',
															name:	'ObMoto',
															disabled: '<? echo $disabled;?>',
															id:	'ObMoto',
															width:		350
											}]//,listeners:{
											  //expand : function(){
											//					setTimeout(fn_Enviarcargue(3), 5000);
																
											//					}
										  	//			}	
										
									}]	
								
							},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{	
										xtype:			'fieldset',
										title: 			'Tiene libreta militar?',
										autoHeight:		true,
										id:				'fieldLibreta',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
															xtype:		'combo',
															fieldLabel:	'Tiene libreta militar',
															name:		'lst_libreta',
															id:	'lst_libreta',
															width:		200,
															mode:       'local',
															msgTarget: 		'side',
															triggerAction:  'all',
															forceSelection: true,
															emptyText:	'Seleccione',
															hiddenName:	'hi_lst_libreta',
															displayField:   'name',
															valueField:     'value',
															store:		new Ext.data.JsonStore({
															fields:['name', 'value'],
															data:	[
																{name:'1ra', value:'1ra'},
																{name:'2da', value:'2da'}															
															]
															})
														},{
															xtype:		'combo',
															fieldLabel:	'Libreta de conducta',
															name:		'lst_conducta',
															id:		'lst_conducta',
															width:		200,
															mode:       'local',
															msgTarget: 		'side',
															triggerAction:  'all',
															forceSelection: true,
															emptyText:	'Seleccione',
															hiddenName:	'hi_lst_conducta',
															displayField:   'name',
															valueField:     'value',
															store:		new Ext.data.JsonStore({
															fields:['name', 'value'],
															data:	[
																{name:'SI', value:'SI'},
																{name:'NO', value:'NO'}															
															]
															})
														
												 },{
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'Número libreta',
														items:[{
															xtype:	'textfield',
															name:	'num_libreta',
															id:	'num_libreta',
															width:	250
															},{
															xtype:	'displayfield',
															value:	'Número Distrito Militar'	
															},{
															xtype:	'numberfield',
															name:	'num_distrito',
															id:	'num_distrito',
															width:	80	
														}]
											}]//,listeners:{
											  //expand : function(){
												//				setTimeout(fn_Enviarcargue(3), 5000);
																//alert("ExpandlIBRETA")	
												//				}
										  		//		}	
										
									}]		
							},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{	
										xtype:			'fieldset',
										title: 			'Tiene arma?',
										autoHeight:		true,
										id:				'fieldArma',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
													xtype:		'textfield',
													fieldLabel:	'Salvo conducto numero',
													name:	'txt_salvo',
													id:	'txt_salvo',
													width:		250
													},{
															xtype:		'combo',
															fieldLabel:	'Tipo salvo conducto',
															name:		'lst_salvo',
															id:		'lst_salvo',
															width:		200,
															mode:       'local',
															msgTarget: 		'side',
															triggerAction:  'all',
															forceSelection: true,
															emptyText:	'Seleccione',
															hiddenName:	'hi_lst_salvo',
															displayField:   'name',
															valueField:     'value',
															store:		new Ext.data.JsonStore({
															fields:['name', 'value'],
															data:	[
																{name:'TENENCIA', value:'TENENCIA'},
																{name:'PORTE', value:'PORTE'}															
															]
															})
													},{
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'Marca',
														items:[{

															xtype:	'textfield',
															name:	'num_marca',
															id:	'num_marca',
															width:	120	
															},{
															xtype:	'displayfield',
															value:	'Calibre del arma'	
															},{
															xtype:	'textfield',
															name:	'num_calibre',
															id:	'num_calibre',
															width:	50	
																													
														}]
												},{	
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'Número de serie',
														items:[{
																xtype:	'textfield',
																name:	'num_serial',
																id:	'num_serial',
																width:		200
															  }]
												}]//,listeners:{
											  //expand : function(){
												//				setTimeout(fn_Enviarcargue(3), 5000);
																//alert("Expandlsalvoconducto")	
													//			}
										  				//}	
										
									}]			
							},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{	
										xtype:			'fieldset',
										title: 			'El candidato presenta antecedentes diciplinarios ante la procuraduría?',
										autoHeight:		true,
										id:				'fieldAntecedentes',//
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
														xtype:	'textarea',
														fieldLabel:	'Detalles del reporte',
														disabled: '<? echo $disabled;?>',
														name:	'txt_antecedentes',
														id:	'txt_antecedentes',
														width:	350		
										
											    }]//,listeners:{
											  //expand : function(){
												//				setTimeout(fn_Enviarcargue(3), 5000);
																//alert("ExpandlReporte")	
													//			}
										  			//	}	
										
									}]	
							},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{	
										xtype:			'fieldset',
										title: 			'El candidato cuenta con certificado de vecindad?',
										autoHeight:		true,
										id:				'fieldVecindad',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
														xtype:	'textarea',
														fieldLabel:	'Detalles del certificado',
														name:	'txt_vecindad',
														id:	'txt_vecindad',
														width:	350		
										
											    }]
									}]	
							},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{	
										xtype:			'fieldset',
										title: 			'Tiene pasado judicial vigente?',
										autoHeight:		true,
										id:				'fieldPasadoJudicial',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
														xtype:	'textfield',
														fieldLabel:	'Codigo de verificacion',
														name:	'txt_verificacicon',
														id:	'txt_verificacion',
														width:	300		
										},{
												
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'Número',
														items:[{
															xtype:	'textfield',
															name:	'num_pasado',
															id:	'num_pasado',
															width:	180	
															},{
															xtype:	'displayfield',
															value:	'Fecha de vencimiento'	
															},{
															xtype:	'datefield',
															name:	'date_pasado',
															id:	'date_pasado',
															format:	'd/m/Y',
															//emptyText:	'Dia/Mes/Año',
															width:	120	
															}]
											    }]//,listeners:{
											  //expand : function(){
												//				setTimeout(fn_Enviarcargue(3), 5000);
																//alert("ExpandlReporte")	
												//				}
										  		//		}
										
									}]				
							
							},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{	
										xtype:			'fieldset',
										title: 			'Tiene pasaporte?',
										autoHeight:		true,
										id:				'fieldPasaporte',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'Número',
														items:[{
															xtype:	'textfield',
															name:	'num_pasaporte',
															id:	'num_pasaporte',
															width:	180	
															},{
															xtype:	'displayfield',
															value:	'Fecha de vencimiento'	
															},{
															xtype:	'datefield',
															name:	'date_pasaporte',
															id:	'date_pasaporte',
															format:	'd/m/Y',
															//emptyText:	'Dia/Mes/Año',
															width:	120	
															}]
											    }]//,listeners:{
											 // expand : function(){
											//					setTimeout(fn_Enviarcargue(3), 5000);
																//alert("ExpandlReporte")	
											//					}
										  	//			}	
										
									}]					
							},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{	
										xtype:			'fieldset',
										title: 			'Tiene visa?',
										autoHeight:		true,
										id:				'fieldVisa',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'Número',
														items:[{
															xtype:	'numberfield',
															name:	'num_visa',
															id:	'num_visa',
															width:	180	
															},{
															xtype:	'displayfield',
															value:	'Fecha de vencimiento'	
															},{
															xtype:	'datefield',
															name:	'date_visa',
															id:	'date_visa',
															format:	'd/m/Y',
															//emptyText:	'Dia/Mes/Año',
															width:	120	
															}]
											    },{
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'País',
														items:[{	
															xtype:		'combo',
															name:		'lst_País',
															id:		'lst_Pais',
															width:		200,
															mode:       'local',
															msgTarget: 		'side',
															triggerAction:  'all',
															forceSelection: true,
															emptyText:	'Seleccione',
															hiddenName:	'hi_lst_paisVisa',
															displayField:   'dsc',
															valueField:     'csc',
															store:		new Ext.data.Store({
															autoLoad: true,
															proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=9'}),
															reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
															})
														}]
												}]//,listeners:{
											  //expand : function(){
												//				setTimeout(fn_Enviarcargue(3), 5000);
																//alert("ExpandlReporte")	
												//				}
										  		//		}	
										
									}]						
							},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{	
										xtype:			'fieldset',
										title: 			'El candidato presenta antecedentes judiciales?',
										autoHeight:		true,
										id:				'fieldAntecedentesJu',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'Tipo de antecedentes',
														items:[{
															xtype:	'textarea',
															name:	'Judiciales',
															disabled: '<? echo $disabled;?>',
															id:	'Judiciales',
															width:	600	
															}]
											    }]//,listeners:{
											  //expand : function(){
												//				setTimeout(fn_Enviarcargue(3), 5000);
																//alert("ExpandlReporte")	
												//				}
										  		//		}	
										
									}]					
							},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{	
										xtype:			'fieldset',
										title: 			'El candidato esta reportado en Datacrédito?',
										autoHeight:		true,
										id:				'fieldDatacredito',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'Razones del reporte ',
														items:[{
															xtype:	'textarea',
															name:	'txt_datacredito',
															disabled: '<? echo $disabled;?>',
															id:	'txt_datacredito',
															width:	600	
															}]
											    }]	
										
									}]	
							},{
								columnWidth:1.2,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{	
										xtype:			'fieldset',
										title: 			'El candidato esta reportado en la lista clinton?',
										autoHeight:		true,
										id:				'fieldClinton',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
														xtype:	'compositefield',
														anchor:	'100%',
														fieldLabel:	'Detalles del reporte',
														items:[{
															xtype:	'textarea',
															name:	'txt_clinton',
															disabled: '<? echo $disabled;?>',
															id:	'txt_clinton',
															width:	600	
															}]
											    }],listeners:{
											  		expand : function(){
																fn_Enviarcargue(3);
																	}
										  				}	
										
									},{
										xtype:	'textarea',
										fieldLabel:	'Observaciones',
										name:	'Ob3',
										id:	'Ob3',
										width:	450
										}]
							}],buttons:[{
								text: 'Volver',
								handler: function (){
									
												fn_Volver(2);
											
									}
							},{
											text:'Guardar y continuar',
											handler: function(){
												fn_EnvioTabs(3);
												
												}
											}]			
			},{
					layout:'column',
					title:'Información Academica',
					id:	'Info_Academica',
					activeTab: 4,
					disabled: true,
					iconCls: 'InformacionACADEMICA',
					items:[{
						xtype:'tabpanel',
            			activeTab: 0,
						id:'tab_Educacion',
						defaults:{autoHeight:true, bodyStyle:'padding:10px'}, 
            			items:[{
							  	layout:'column',
								title:'Educación Formal',
								items:[{
										columnWidth:1.2,
										layout: 'form',
										labelAlign: 'top',
										border:false,
										items: [{	
												xtype:	'compositefield',
												anchor:	'100%',
												fieldLabel:	'Nivel de estudio',
												items:[{
														xtype:		'combo',
														id:		'lst_estudios',
														width:		200,
														mode:       'local',
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														fieldLabel:	'Nivel de estudio',
														emptyText:	'Seleccione estudios',
														hiddenName:	'hi_lst_estudios',
														displayField:   'name',
														valueField:     'value',
														store:		new Ext.data.JsonStore({
														fields:['name', 'value'],
														data:	[
														{name:'Bachillerato', value:'Bachillerato'},
														{name:'Tecnico', value:'Tecnico'},
														{name:'Tecnologo', value:'Tecnologo'},														
														{name:'Profesional', value:'Profesional'},																																						
														{name:'Especialización', value:'Especialización'},
														{name:'Maestria', value:'Maestria'},
														{name:'Ph. D', value:'Ph. D'}
														]})
													},{
													xtype:	'displayfield',
													value:	'Título:'
													
													},{
													xtype:	'textfield',
													id:		'txt_Título',
													width:	150	
													}]
												},{
												xtype:	'compositefield',
												anchor:	'100%',
												fieldLabel:	'Institución en la que estudio',
												items:[{
														xtype:		'combo',
														name:		'lst_institucion',
														id:		'lst_institucion',
														width:		400,
														mode:       'local',
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														emptyText:	'Seleccione',
														hiddenName:	'hi_lst_institucion',
														displayField:   'dsc',
														valueField:     'csc',
														store:	new Ext.data.Store({
															autoLoad: true,
														proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=6'}),
														reader: new Ext.data.JsonReader({root:'root'},
														[{name:'csc', type:'float'}, {name:'dsc', type:'string'}])												
													})
													},{
														xtype:	'displayfield',
														value:	'Otra Institución:'	
													},{
														xtype:	'textfield',
														name:	'txt_institucion',
														id:	'txt_institucion',
														width:	200
													}]
											},{
												xtype:	'compositefield',
												anchor:	'100%',
												fieldLabel:	'País',
												items:[{
															xtype:		'combo',
															id:		'lst_País2',
															width:		200,
															mode:       'local',
															msgTarget: 		'side',
															triggerAction:  'all',
															forceSelection: true,
															emptyText:	'Seleccione País',
															hiddenName:	'hi_lst_pais2',
															displayField:   'dsc',
															valueField:     'csc',
															store:		new Ext.data.Store({
															autoLoad: true,
															proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=9'}),
															reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
															}), 
															listeners: {
																select: function(){
																var PaisCsc =	document.getElementById('hi_lst_pais2').value;
																	if (PaisCsc==43){
																		Ext.getCmp('lst_departamento3').setDisabled(false)
																		}
																	}
																}
												},{
													xtype:	'displayfield',
													value:	'Departamento:'
												},{
													xtype:			'combo',
													id: 			'lst_departamento3',
													width:			180,
													mode:           'local',
													emptyText:      'Seleccione Departamento',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													disabled:	true,
													editable:       false,
													name:           'lst_departamento3',
													hiddenName:     'hi_lst_departamento3',//hi_lst_País2//txt_institucion//hi_lst_institucion//txt_Título//hi_lst_estudios//lst_departamento3//lst_ciudad3
													displayField:   'dsc',
													valueField:     'csc',
													store:          new Ext.data.Store({
														autoLoad: true,
														proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=0'}),
														reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
														}),
													listeners:{
														select: function(){
															var Cdepto = document.getElementById('hi_lst_departamento3').value;
															Ext.getCmp('lst_ciudad3').setDisabled(false);
															Ext.getCmp('lst_ciudad3').store.load({waitMsg:'Consultando', params:{Cdepto:Cdepto}});
															
															document.getElementById('lst_ciudad3').value='';
															}
														}	
									
													
													},{
													xtype:	'displayfield',
													value:	'Ciudad:'
													},{
														xtype:			'combo',
														fieldLabel:		'Ciudad',
														id: 			'lst_ciudad3',
														width:			200,
														mode:           'local',
														emptyText:      'Seleccione ciudad',
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														editable:       false,
														disabled: true,
														name:           'lst_ciudad3',
														hiddenName:     'hi_lst_ciudad3',

														displayField:   'dsc',
														valueField:     'csc',
														store:          new Ext.data.Store({
															autoLoad: false,
															proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=1'}),
															reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
															})
													}]	
											}]
									},{
										columnWidth:.8,
										layout: 'form',
										labelAlign: 'top',
										border:false,
										items: [{	
												xtype:	'compositefield',
												anchor:	'100%',
												fieldLabel:	'Ingreso',
												items:[{
												     	xtype:	'datefield',
														format:	'd/m/Y',
														name:	'date_ingreso',
														id:	'date_ingreso',
														width:	120
														//emptyText:	'Dia/Mes/Año'
														
														
													  },{
														  xtype:	'displayfield',
														  value:	'Estado Estudios:'
													  },{
														    xtype:		'combo',
															id:		'lst_estudiosE',
															width:		200,
															mode:       'local',
															msgTarget: 		'side',
															triggerAction:  'all',
															forceSelection: true,
															emptyText:	'Seleccione nivel estudios',
															hiddenName:	'hi_lst_estudios',
															displayField:   'name',
															valueField:     'value',
															store:		new Ext.data.JsonStore({
															fields:['name', 'value'],
															data:	[
																	{name:'Terminados', value:'Terminados'},
																	{name:'Activo', value:'Activo'},
																	{name:'Inactivo', value:'Inactivo'}
															]})   
														},{
														  xtype:	'displayfield',
														  value:	'Finalización:'
													  },{
														xtype:	'datefield',
														format:	'd/m/Y',
														name:	'date_finalizacion',
														id:	'date_finalizacion',
														width:	120,
														emptyText:	'Dia/Mes/Año'
													},{
														xtype: 'hidden',
														id: 'Send_Grid1',
														name:	'Send_Grid1'
													},{
														xtype: 'hidden',
														id: 'Cont',
														value: '0'
													}]
												
												
										}]
									},{
										columnWidth:1.2,
										layout: 'column',
										labelAlign: 'top',
										border:false,
										items:[{
											//////////////////////
												height: 200,
												width: 850,
												//title: 'Educacion Formal',
												xtype: 'grid',
												id: 'grid_EduFormal',
												cm: new Ext.grid.ColumnModel([
														   {header: "Csc", width: 100, hidden:true},
														   {header: "Nivel", width: 100},
														   {header: "Titulo", width: 150},
														   {header: "Institucion", width: 250},
														   {header: "Otra", width: 60},
														   {header: "Pais", width: 120},
														   {header: "Ingreso", width: 80},
														   {header: "Estado", width: 60},
														   {header: "Finalizacion", width: 80}
												]),
													store:  storeEduFormal,
														    tbar: [{
															text: 'Crear',
														    iconCls: 'icon-new',
														    handler: function(){
														var	defaultData = {
															Csc: document.getElementById('Cont').value,
															Nivel:	document.getElementById('lst_estudios').value,
															Titulo: document.getElementById('txt_Título').value,
															Institucion:  document.getElementById('lst_institucion').value,
															Otra:	document.getElementById('txt_institucion').value,
															Pais: document.getElementById('lst_País2').value,
															Ingreso: document.getElementById('date_ingreso').value,
															Estado: document.getElementById('lst_estudiosE').value,
															Finalizacion: document.getElementById('date_finalizacion').value
															};
														var r = new storeEduFormal.recordType(defaultData, ++recId);
																		storeEduFormal.insert(0, r);
														var j =	document.getElementById('Cont').value;
																j++;
																document.getElementById('Cont').value=j;															
																fn_ReadGrid(0);
																} 
																
														//alert(storeEduFormal.data.Csc)
												 },'-',{
													 text:'Borrar',
													 handler: function(){
														 document.getElementById('Send_Grid1').value='';
														 document.getElementById('Cont').value='';
														 storeEduFormal.removeAll();
														 }
													 }]//FIN TBAR
													 ,buttons:[{
														 text:'Continuar',
														 handler: function(){
															 Ext.getCmp('tab_Educacion_NoFormal').setDisabled(false);
															 Ext.getCmp('tab_Educacion').setActiveTab(1);
															 }
														 }]
											
											}]
								}]
							  },{
								layout:'column',
								title:'Idiomas y educación no formal',
								id:	'tab_Educacion_NoFormal',
								disabled: true,
								activeTab: 1,
								items:[{
										columnWidth:1.2,
										layout: 'form',
										labelAlign: 'top',
										border:false,
										items:[{
												xtype:	'compositefield',
												anchor:	'100%',
												fieldLabel:	'Nota: Incluya diplomados, seminarios, talleres,',
		//										html: '<div>cursos u otro tipo de estudios no formales que haya terminado o este cursando en forma descendente</div>',
												items:[{
													xtype:	'displayfield',
													value:	'<div>cursos u otro tipo de estudios no formales que haya terminado o este cursando en forma descendente</div>'	
												}]
										},{
												xtype:	'compositefield',
												anchor:	'100%',
												fieldLabel:	'Idioma',
		//										html: '<div>cursos u otro tipo de estudios no formales que haya terminado o este cursando en forma descendente</div>',
												items:[{
														xtype:		'combo',
														id:		'lst_idioma',
														width:		200,
														mode:       'local',
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														emptyText:	'Seleccione Idioma',
														hiddenName:	'hi_lst_idioma',
														displayField:   'name',
														valueField:     'value',
														store:		new Ext.data.JsonStore({
														fields:['name', 'value'],
														data:	[
														{name:'Ingles', value:'Ingles'},
														{name:'Italiano', value:'Italiano'},
														{name:'Aleman', value:'Aleman'}
														]})   
													},{
														xtype:	'displayfield',
														value:	'Dominio'
													},{
														xtype:		'combo',
														id:		'lst_nivel',
														width:		200,
														mode:       'local',
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														emptyText:	'Dominio Idioma',
														hiddenName:	'hi_lst_nivel',
														displayField:   'name',
														valueField:     'value',
														store:		new Ext.data.JsonStore({
														fields:['name', 'value'],
														data:	[
														{name:'5%', value:'5%'},
														{name:'10%', value:'10%'},
														{name:'15%', value:'15%'},
														{name:'20%', value:'20%'},
														{name:'25%', value:'25%'},
														{name:'30%', value:'30%'},
														{name:'35%', value:'35%'},
														{name:'40%', value:'40%'},
														{name:'45%', value:'45%'},
														{name:'50%', value:'50%'},
														{name:'55%', value:'55%'},
														{name:'60%', value:'60%'},
														{name:'65%', value:'65%'},
														{name:'70%', value:'70%'},
														{name:'75%', value:'75%'},
														{name:'80%', value:'80%'},
														{name:'85%', value:'85%'},
														{name:'90%', value:'90%'},
														{name:'95%', value:'95%'},
														{name:'100%', value:'100%'}
														]})   
													},{
														xtype:	'displayfield',
														value:	'Donde lo aprendio'
													},{
														xtype:		'textfield',
														name:		'txt_aprendio',
														id:	  'txt_aprendio',
														width:		200
														
													},{
														xtype:	'hidden',
														id:	'Send_Grid2'														
														//value:	'0'		
													},{
														xtype:	'hidden',
														id:	'Cont1',
														value:	'0'	
													}]
												}]
									},{
										columnWidth:1,
										layout: 'form',
										border:false,
										items: 	[{
										//////////////
											height: 200,
											width: 300,
											//title: 'Idiomas y educacion no formal',
											xtype: 'grid',
											id: 'grid_IdiomasEduNo',
											cm: new Ext.grid.ColumnModel([
													   {header: "Csc", width: 10, hidden: true},
													   {header: "Idioma", width: 120},
													   {header: "Dominio", width: 60},
													   {header: "Donde", width: 120}
											]),
												store:  storeNoFormal,
														   tbar: [{
															text: 'Crear',
														    iconCls: 'icon-new',
														    handler: function(){   
												 var defaultData = {
																	Csc: document.getElementById('Cont1').value,
																	Idioma: document.getElementById('lst_idioma').value,
																	Dominio: document.getElementById('lst_nivel').value,
																	Donde: document.getElementById('txt_aprendio').value////Send_Grid2//grid_EduNo
                                                       				}//'Csc','Idioma','Dominio','Donde'
												 var r = new storeNoFormal.recordType(defaultData, ++recId);
																		storeNoFormal.insert(0, r);
														var j =	document.getElementById('Cont1').value;
																j++;
																document.getElementById('Cont1').value=j;
																fn_ReadGrid(1);
												 }
                                   },{
                                               text: 'Borrar',
                                               iconCls: 'icon-delete',
                                               handler: function(){
                                               storeNoFormal.removeAll();
                                               }                                                                                                                                                                                           
                                   
             								 }]


										}]		
											//////////
											
									},{
										columnWidth:1.2,
										layout: 'form',
										labelAlign: 'top',
										//title: 'Educacion No Formal',
										border:false,
										items: 	[{
												xtype:	'compositefield',
												anchor:	'100%',
												fieldLabel:	'Educacion No Formal',
												items:[{
														xtype:	'displayfield',
														value:	'Tipo De Estudio'
													},{
														xtype:		'combo',
														id:		'lst_estudio',
														width:		200,
														mode:       'local',
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														hiddenName:	'hi_lst_estudio',
														displayField:   'name',
														valueField:     'value',
														store:		new Ext.data.JsonStore({
														fields:['name', 'value'],
														data:	[
														{name:'Diplomado', value:'Diplomado'},
														{name:'Seminario', value:'Seminario'},
														{name:'Curso', value:'Curso'},
														{name:'Taller', value:'Taller'},
														{name:'Otro', value:'Otro'}
														]})   
													},{
														xtype:	'displayfield',
														value:	' Otro tipo de estudio'
													},{
														xtype:		'textfield',
														id:		'txt_estudio2',
														width:		200

													}]
										},{
										columnWidth:1.2,
										layout: 'form',
										labelAlign: 'top',
										border:false,
										items: 	[{
												xtype:	'compositefield',
												anchor:	'100%',
												fieldLabel:	'País',
												items:[{
														xtype:		'combo',
														id:		'lst_Paises2',
														width:		200,
														mode:       'local',
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														hiddenName:	'hi_lst_Pais2',
														displayField:   'dsc',
														valueField:     'csc',
														store:		new Ext.data.Store({
														autoLoad: true,
															proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=9'}),
															reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
															}),listeners:{
																select: function(){
																	var Pais = document.getElementById('hi_lst_Pais2').value;
																		if (Pais=='43')
																			{
																			Ext.getCmp('lst_Deptos').setDisabled(false);
																			}
																	}
																}
													
													},{
														xtype:	'displayfield',
														value:	'Departamento'
													},{
														xtype:		'combo',
														id:		'lst_Deptos',
														width:		200,
														mode:       'local',
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														disabled: true,
														hiddenName:	'hi_lst_Deptos',
														displayField:   'dsc',
														valueField:     'csc',
														store:		 new Ext.data.Store({
														autoLoad: true,
														proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=0'}),
														reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
														}),listeners:{
														select: function(){
															var Cdepto = document.getElementById('hi_lst_Deptos').value;
															Ext.getCmp('lst_ciudad4').setDisabled(false);
															Ext.getCmp('lst_ciudad4').store.load({waitMsg:'Consultando', params:{Cdepto:Cdepto}});
															
															document.getElementById('lst_ciudad4').value='';
															}
														}	
													},{
														xtype:	'displayfield',
														value:	'Ciudad'
													},{
														xtype:		'combo',
														id:		'lst_ciudad4',
														width:		200,
														mode:       'local',
														disabled: true,
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														hiddenName:	'hi_lst_ciudad4',
														displayField:   'dsc',
														valueField:     'csc',
														store:		new Ext.data.Store({
															autoLoad: false,
															proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=1'}),
															reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'float'}, {name:'dsc', type:'string'}])
															})
													}]
												}]
											},{
										columnWidth:1.2,
										layout: 'form',
										labelAlign: 'top',
										border:false,
										items: 	[{
												xtype:	'compositefield',
												anchor:	'100%',
												fieldLabel:	'Título Estudio',
												items:[{
														xtype:		'textfield',
														id:		'lst_Titulo',
														width:		200
														
												},{
													xtype:	'displayfield',
													value:	'institución'
												},{
													xtype:	'textfield',
													id: 'txt_institucion2',
													width:		200
												}]
											}]
										},{
											columnWidth:1.2,
											layout: 'form',
											labelAlign: 'top',
											border:false,
											items: 	[{
												xtype:	'compositefield',
												anchor:	'100%',
												fieldLabel:	'Área del Curso',
												items:[{
														xtype:		'textfield',
														id:		'lst_areacurso',
														width:		300
												}]
											}]
										},{
											columnWidth:1.2,
											layout: 'form',
											labelAlign: 'top',
											border:false,
											items: 	[{
												xtype:	'compositefield',
												anchor:	'100%',
												fieldLabel:	'Ingreso',
												items:[{
														xtype:		'datefield',
														id:		'date_ingreso1',
														format:		'd/m/Y',
										
														emptyText:	'Dia/Mes/Año',
														width:		100
												},{
													xtype:	'displayfield',
													value:	'Estado de los estudios'
												},{
														xtype:	'combo',
														id:		'lst_estudiosestado2',
														width:		200,
														mode:       'local',
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														hiddenName:	'hi_lst_estudiosestado',
														displayField:   'name',
														valueField:     'value',
														store:		new Ext.data.JsonStore({
														fields:['name', 'value'],
														data:	[
														{name:'Terminado', value:'Terminado'},
														{name:'En Curso', value:'En Curso'}																												
														]}) 
												},{
													xtype:	'displayfield',
													value:	'Finalización'
												},{
														xtype:		'datefield',
														id:		'date_finalizacion1',
														format:		'd/m/Y',
														//id:	'date_finalizacion',
														emptyText:	'Dia/Mes/Año',
														width:		100
												},{
													xtype:	'hidden',
													id: 'send_Grid3',
													name:'send_Grid3'
												},{
													xtype:	'hidden',
													value: '0',
													id: 'Csc_id'
														
												}]
											}]
										},{
											columnWidth:1.2,
											layout: 'form',
											labelAlign: 'top',
											border:false,
											items: 	[{
											///////////////////////////////	
												height: 200,
												width: 800,
												//title: 'Educacion no formal',
												xtype: 'grid',
												id: 'grid_EduNoFormal',
												cm: new Ext.grid.ColumnModel([
														   {header: "Csc", width: 20, hidden: true},
														   {header: "Tipo", width: 80},
														   {header: "Otro", width: 80},
														   {header: "Pais", width: 80},
														   {header: "Departamento", width: 80},
														   {header: "Ciudad", width: 80},
														   {header: "Titulo", width: 150},
														   {header: "Institucion", width: 150},
														   {header: "Area", width: 100},
														   {header: "Ingreso", width: 80},
														   {header: "Estado", width: 80},
														    {header: "Final", width: 80}
														   
												]),
												store:  storeEduNoFormal,
														   tbar: [{
															text: 'Crear',
														    iconCls: 'icon-new',
														    handler: function(){                                            														                                                        var defaultData = {
													    Csc: document.getElementById('Csc_id').value,
														Tipo: document.getElementById('lst_estudio').value,
														Otro: document.getElementById('txt_estudio2').value,
														Pais: document.getElementById('lst_Paises2').value,
														Departamento: document.getElementById('lst_Deptos').value,
														Ciudad: document.getElementById('lst_ciudad4').value,
														Titulo: document.getElementById('lst_Titulo').value,
														Institucion: document.getElementById('txt_institucion2').value,
														Area: document.getElementById('lst_areacurso').value,
														Ingreso: document.getElementById('date_ingreso1').value,
														Estado: document.getElementById('lst_estudiosestado2').value,
														Final: document.getElementById('date_finalizacion1').value
//lst_estudio//txt_estudio2//lst_Paises2//lst_Deptos//lst_ciudad4//lst_Titulo//txt_institucion//lst_areacurso//	date_ingreso1//	date_finalizacion1//lst_estudiosestado2													
														};
														
                                                        var r = new storeEduNoFormal.recordType(defaultData, ++recId);
															storeEduNoFormal.insert(0, r);
															var cont = document.getElementById('Csc_id').value;	
															cont++;
															document.getElementById('Csc_id').value=cont;
														fn_ReadGrid(2);
														 }
                                   },{
                                               text: 'Borrar',
                                               iconCls: 'icon-delete',
                                               handler: function(){
                                               storeEduNoFormal.removeAll();
                                               }                                                                                                                                                                                           
                                   
             								 }],buttons:[{
														 text:'Continuar',
														 handler: function(){
															 Ext.getCmp('tab_Educacion_Verificacion').setDisabled(false);
															 Ext.getCmp('tab_Educacion').setActiveTab(2);
															 Ext.getCmp('btn_Educacion').setDisabled(false);
															 var Csc = document.getElementById('Csc').value;
															ds_Tab4.load({waitMsg:'Consultando', params:{Csc:Csc}});
															
															 }
														 }]
											///////////////////////////////	
												}]
											}]
									}],listeners:{
														activate: function(){
															var Csc = document.getElementById('Csc').value;
															ds_Tab4.load({waitMsg:'Consultando', params:{Csc:Csc}});
															}
														}
							  },{
								layout:'column',
								title:'Verificación de Documentos',
								id:	'tab_Educacion_Verificacion',
								disabled: true,
								activeTab: 2,
								items:[{
								columnWidth:.8,
								layout: 'form',
								labelAlign: 'top',
								border:false,
								items: [{
										xtype:			'fieldset',
										title: 			'El candidato presentó algún documento falso',
										autoHeight:		true,
										id:				'fieldDocFalso',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
											   	xtype: 'compositefield',
												fieldLabel:	'Observaciones',
												anchor:	'100%',
												items:[{
														xtype:		'textarea',
														name:		'doc_Falso',
														id:		'doc_Falso',
														width :	500
													 }]
											   
											   }]
										  },{
										xtype:			'fieldset',
										title: 			'El candidato presentó algún documento adulterado',
										autoHeight:		true,
										id:				'fieldDocAdulterado',
										width:			700,	
										animated:		true,
										animCollapse:	true,							
       									collapsed:		true,
										checkboxToggle:true,
       									items :[{
											   	xtype: 'compositefield',
												fieldLabel:	'Observaciones',
												anchor:	'100%',
												items:[{
														xtype:		'textarea',
														name:		'doc_Adulterado',
														id:		'doc_Adulterado',
														width :	500
													 }]
											   
											   }],listeners:{
												   expand: function(){
													   		var Csc = document.getElementById('Csc').value;
															ds_Tab4.load({waitMsg:'Consultando', params:{Csc:Csc}});
													   }
												   }  
										  },{
											  xtype:	'textarea',
											  fieldLabel:	'Observaciones',
											  name:	'Ob4',
											  id:	'Ob4',
											  width:	500
										  }]  
									}],listeners:{
														activate: function(){
															Ext.getCmp('fieldDocFalso').expand(true);
															Ext.getCmp('fieldDocAdulterado').expand(true);
															var Csc = document.getElementById('Csc').value;
															ds_Tab4.load({waitMsg:'Consultando', params:{Csc:Csc}});
															
															}
														}
								  
							 }]
				
				
						}],buttons:[{
								text: 'Volver',
								handler: function (){
									var Perfil = document.getElementById('txt_perfil').value;
										if(Perfil==3)
											{
												fn_Volver(2)
												Ext.getCmp('Info_Academica').setDisabled(true);
											}
										else{
												fn_Volver(3)
										}
									}
							},{
											text:'Guardar y continuar',
											id:	'btn_Educacion',
											disabled: true,
											handler: function(){
												
												fn_EnvioTabs(4);
												Ext.getCmp('Info_Familiar').setDisabled(false);
												Ext.getCmp('fieldEmpresa').expand(true);
												Ext.getCmp('fieldAmigos').expand(true);
												Ext.getCmp('fieldReferencias').expand(true);
												Ext.getCmp('panel12').expand(true);
												//fn_EnvioTabs(4);
												}
											}]
			},{//------------------------------------------------------------------INFORMACION FAMILIAR INICIO
				
					layout:'column',
					title:'Información Familiar',
					iconCls: 'InformacionFamiliar',
					id:	'Info_Familiar',//Info_Familiar//fn_Volver(3)//fn_EnvioTabs(4);
					disabled: true,
					activeTab: 5,
					items:[{
						columnWidth:1,
						layout: 'form',
						labelAlign: 'top',
						border:false,
						items: [{
								xtype:			'fieldset',
								title: 			'Tiene familiares en la empresa?',
								autoHeight:		true,
								id:				'fieldEmpresa',
								width:			700,	
								animated:		true,
								animCollapse:	true,							
								collapsed:		true,
								checkboxToggle:true,
								items :[{
										xtype: 'compositefield',
										fieldLabel:	'Nombres',
										anchor:	'100%',
										items:[{
												xtype:	'textfield',
												name: 'txt_NombresTab5',
												id: 'txt_NombresTab5',
												width:	250
											},{
												xtype:	'displayfield',
												value:	'Apellidos:'	
											},{
												xtype:	'textfield',
												name: 'txt_ApellidosTab5',
												id: 'txt_ApellidosTab5',
												width:	250
											}]
									
									},{
										xtype: 'compositefield',
										fieldLabel:	'Cargo',
										anchor:	'100%',
										items:[{
												xtype:	'textfield',
												name: 'txt_CargoTab5',
												id: 'txt_CargoTab5',
												width:	250
											},{
												xtype:	'displayfield',
												value:	'Teléfono:'	
											},{
												xtype:	'textfield',
												name: 'txt_TelTab5',
												id: 'txt_TelTab5',
												width:	250
											}]
										
										}]
								//}]
						},{
						columnWidth:1,
						layout: 'form',
						labelAlign: 'top',
						border:false,
						items: [{
								xtype:			'fieldset',
								title: 			'Tiene amigos en la empresa?',
								autoHeight:		true,
								id:				'fieldAmigos',
								width:			700,	
								animated:		true,
								animCollapse:	true,							
								collapsed:		true,
								checkboxToggle:true,
								items :[{
										xtype: 'compositefield',
										fieldLabel:	'Nombres',
										anchor:	'100%',
										items:[{
												xtype:	'textfield',
												name: 'txt_NombresATab5',
												id: 'txt_NombresATab5',
												width:	250
											},{
												xtype:	'displayfield',
												value:	'Apellidos:'	
											},{
												xtype:	'textfield',
												name: 'txt_ApellidosATab5',
												id: 'txt_ApellidosATab5',
												width:	250
											}]
									
									},{
										xtype: 'compositefield',
										fieldLabel:	'Cargo',
										anchor:	'100%',
										items:[{
												xtype:	'textfield',
												name: 'txt_CargoATab5',
												id: 'txt_CargoATab5',
												width:	250
											},{
												xtype:	'displayfield',
												value:	'Teléfono:'	
											},{
												xtype:	'textfield',
												name: 'txt_TelATab5',
												id: 'txt_TelATab5',
												width:	250
											}]
										
										}]
									},{
								xtype:			'fieldset',
								title: 			'Referencias',
								autoHeight:		true,
								id:				'fieldReferencias',
								width:			700,	
								animated:		true,
								animCollapse:	true,							
								collapsed:		true,
								checkboxToggle:true,
								items :[{
										layout:'column',
										items:[{
											columnWidth:1,
											layout: 'form',
											labelAlign: 'top',
											border:false,
											items: [{
												xtype: 'compositefield',
												fieldLabel:'Nombres y Apellidos',
												items:[{
													xtype:	'textfield',
													id:	'txt_NombreReferencia',
													width:	200
												},{
													xtype:	'displayfield',
													value:  'Empresa'
												},{
													xtype:	'textfield',
													id:'Empresa_Referencia',
													width:	150
												},{
													xtype:	'displayfield',
													value:  'Cargo'
												},{
													xtype:	'textfield',
													id:'Cargo_Referencia',
													width:	150
												}]
											},{
											columnWidth:1,
											layout: 'form',
											labelAlign: 'top',
											border:false,
											items: [{
												xtype: 'compositefield',
												fieldLabel:'Telefonos',
												items:[{
													xtype:	'textfield',
													id: 'Tel_Referencia',
													width:	150	
													},{
													xtype:	'displayfield',
													value:  'Parentesco'
													},{
														xtype:		'combo',
														id:		'lst_parent_Referencia',
														width:		200,
														mode:       'local',
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														hiddenName:	'hi_lst_Países4',
														displayField:   'name',
														valueField:     'value',
														store:		new Ext.data.JsonStore({
														fields:['name', 'value'],
														data:	[
														{name:'Familiar', value:'Familiar'},
														{name:'Amigo', value:'Amigo'}																												
														]}) 
													}]
												}]
												
											}]
										},{
											columnWidth:1,
											layout: 'form',
											labelAlign: 'top',
											border:false,
											items: [{
												xtype: 'hidden',
												id: 'Csc_Ref',
												value: '0'
											},{
												xtype: 'hidden',
												id: 'Grid_Ref',
												name: 'Grid_Ref',
												value: '0'
												},{
												height: 200,
												width: 800,
												//title: 'Educacion no formal',
												xtype: 'grid',
												id: 'Grid_Referencias',
												cm: new Ext.grid.ColumnModel([
														   {header: "Csc", width: 100, hidden: true},
														   {header: "Nombres", width: 60},
														   {header: "Empresa", width: 80},
														   {header: "Cargo", width: 60},
														   {header: "Telefonos", width: 250},
														   {header: "Parentesco", width: 60}
												]),
//txt_NombreReferencia//Empresa_Referencia//Cargo_Referencia//Tel_Referencia//lst_parent_Referencia
//										'Csc','Nombres','Empresa','Cargo','Telefonos','Parentesco'
												store:  ds_Referencias,
														    tbar: [{
															text: 'Crear',
														    iconCls: 'icon-new',
														    handler: function(){                                            														                                                        var defaultData = {
													    Csc: document.getElementById('Csc_Ref').value,
														Nombres: document.getElementById('txt_NombreReferencia').value,
														Empresa: document.getElementById('Empresa_Referencia').value,
														Cargo: document.getElementById('Cargo_Referencia').value,
														Telefonos: document.getElementById('Tel_Referencia').value,
														Parentesco: document.getElementById('lst_parent_Referencia').value
														
														};
                                                        var r = new ds_Referencias.recordType(defaultData, ++recId);
															ds_Referencias.insert(0, r);
															var Csc_Ref = document.getElementById('Csc_Ref').value;
															Csc_Ref++;
															document.getElementById('Csc_Ref').value=Csc_Ref;
														fn_ReadGrid(3);
														 }
                                   },{
                                               text: 'Borrar',
                                               iconCls: 'icon-delete',
                                               handler: function(){
                                               ds_Referencias.removeAll();
                                               }                                                                                                                                                                                           
                                   
             								 }]
												}]
											}]
									}],listeners:{
												expand: function(){
													var Csc = document.getElementById('Csc').value;
														ds_Tab5.load({waitMsg:'Consultando', params:{Csc:Csc}});
													}
												}
									//},{
											
										}]
						},{
						xtype:'tabpanel',
		            	plain:true,
        		   		activeTab: 0,
						defaults:{autoScroll: true},
						id:	'tab_Familia',
						scroll:	true,
						height: 350,
						items:[{
							title:'Cónyuge o Compañera',
							layout:'column',
							items: [{
									columnWidth:1,
									layout: 'form',
									border:false,
									items: [{
										xtype: 'compositefield',
										fieldLabel:	'Estado Civil',
										anchor:	'100%',
										items:[{
											xtype:		'combo',
											name:		'lst_estadocivil',
											id:			'lst_estadocivil',
											width:		200,
											mode:       'local',
											fieldlabel:	'Estado Civil',
											msgTarget: 		'side',
											triggerAction:  'all',
											forceSelection: true,
											//hiddenName:	'hi_lst_estadocivil',
											displayField:   'name',
											valueField:     'value',
											store:		new Ext.data.JsonStore({
											fields:['name', 'value'],
											data:	[
												{name:'Casado', value:'Casado'},
												{name:'Soltero', value:'Soltero'},														
												{name:'Unión libre', value:'Unión libre'},	
												{name:'Divorciado', value:'Divorciado'},
												{name:'Viudo', value:'Viudo'}												
											]}) ,
											listeners:{
												select: function(){
													var tinmu = document.getElementById('lst_estadocivil').value;
														if (tinmu=='Casado'){
															Ext.getCmp('panel12').expand(true);
														}
														else if (tinmu=='Unión libre'){
															Ext.getCmp('panel12').expand(true);
														}
														Ext.getCmp('panel12').collapse(true);
												}
											}										
											
											}]
								},{		
									columnWidth:1.02,
									layout: 'form',
									border:false,
									items: [{
										xtype:			'fieldset',										
//										autoHeight:		true,
										id:	'panel12',
										width:			800,	
										animated:		true,
										animCollapse:	true,							
										collapsed:		true,
										items :[{
											xtype: 'compositefield',
											fieldLabel:	'Nombre del cónyuge',
											anchor:	'100%',
											items:[{
													xtype:	'textfield',
													name: 'txt_NameConyuge',
													id: 'txt_NameConyuge',
													width:	250
												},{
													xtype:	'displayfield',
													value:	'Apellidos del cónyuge'
												},{
													xtype:	'textfield',
													name: 'txt_ApellidosConyuge',
													id: 'txt_ApellidosConyuge',
													width:	250
												}]
											},{
											xtype: 'compositefield',
											fieldLabel:	'Tipo identificación',
											anchor:	'100%',
													items:[{
													xtype:		'combo',
													name:		'txt_TipoIdentificacionConyuge',
													id:			'txt_TipoIdentificacionConyuge',
													width:		200,
													mode:       'local',
													//fieldlabel:	'Estado Civil',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													//hiddenName:	'hi_lst_estadocivil',
													displayField:   'name',
													valueField:     'value',
													store:		new Ext.data.JsonStore({
													fields:['name', 'value'],
													data:	[
														{name:'REGISTRO CIVIL', value:'REGISTRO CIVIL'},
														{name:'TARJETA DE INDENTIDAD', value:'TARJETA DE INDENTIDAD'},														
														{name:'CEDULA DE CIUDADANIA', value:'CEDULA DE CIUDADANIA'},	
														{name:'CEDULA DE EXTRANJERIA', value:'CEDULA DE EXTRANJERIA'},
														{name:'NIP', value:'NIP'},
														{name:'NUIP', value:'NUIP'}																								
													]})
													
													
												//	xtype:	'textfield',
												//	name: 'txt_TipoIdentificacionConyuge',
												//	id: 'txt_TipoIdentificacionConyuge',
												//	width:	250
												},{
													xtype:	'displayfield',
													value:	'Número'
												},{
												
													xtype:	'textfield',
													name: 'txt_NumeroIdentificacionConyuge',
													id: 'txt_NumeroIdentificacionConyuge',
													width:	150
												
												},{
													xtype:	'displayfield',
													value:	'Número teléfono'
												},{
												
													xtype:	'textfield',
													name: 'txt_TelConyuge',
													id: 'txt_TelConyuge',
													width:	150
												
												}]
											},{
											xtype: 'compositefield',
											fieldLabel:	'Número celular',
											anchor:	'100%',
											items:[{
													xtype:	'textfield',
													name: 'txt_CelConyuge',
													id: 'txt_CelConyuge',
													width:	150
												},{
													xtype:	'displayfield',
													value:	'Correo electrónico'
												},{
												
													xtype:	'textfield',
													width:	150,
													name: 'txt_MailConyuge',
													id: 'txt_MailConyuge',
													vtype:	'email'
												
												}]
											},{
											xtype: 'compositefield',
											fieldLabel:	'Empresa donde trabaja',
											anchor:	'100%',
											items:[{
													xtype:	'textfield',
													name: 'txt_EmpresaConyuge',
													id: 'txt_EmpresaConyuge',
													width:	380
												}]
											},{
											xtype: 'compositefield',
											fieldLabel:	'Teléfono trabajo',
											anchor:	'100%',
											items:[{
													xtype:	'textfield',
													name: 'txt_TelTrabConyuge',
													id: 'txt_TelTrabConyuge',
													width:	250
												},{
													xtype:	'displayfield',
													value:	'Actividad que realiza'
												},{
												
													xtype:	'textfield',
													name: 'txt_actividadTraConyuge',
													id: 'txt_actividadTraConyuge',
													width:	150
													
												
												}]
											}],listeners:{
												expand: function(){
													var Csc = document.getElementById('Csc').value;
														ds_Tab5.load({waitMsg:'Consultando', params:{Csc:Csc}});
													}
												}	
										}]
										
									

									}],buttons:[{
														 text:'Continuar',
														 handler: function(){
													//	fn_EnvioTabs(5);	 
														 Ext.getCmp('tab_Educacion_NoFormal').setDisabled(false);
														 Ext.getCmp('tab_Familia').setActiveTab(1);
														 Ext.getCmp('tab_hijos').setDisabled(false);
														 }
													 }]
							  	}]
							},{
							title:'Hijos',
							layout:'column',
							id:	'tab_hijos',
							disabled:true,
							//defaults: {width: 400},
							items: [{
									columnWidth:1.02,
									layout: 'form',
									border:false,
									items: [{
										xtype: 'compositefield',
										fieldLabel:	'Nombres',
										anchor:	'100%',
										items:[{
													xtype:	'textfield',
													id:	'nombres_Hijos',
													width:	250
												},{
													xtype:	'displayfield',
													value:	'Apellidos'
												},{
												
													xtype:	'textfield',
													id:	'apellidos_Hijos',
													width:	250
												}]
										},{
										xtype: 'compositefield',
										fieldLabel:	'Fecha Nacimiento',
										anchor:	'100%',
										items:[{
													xtype:	'datefield',
													format:	'd/m/Y',
													emptyText:	'Dia/Mes/Año',
													id:	'nacimieto_Hijos',//
													width:	100
												},{
													xtype:	'displayfield',
													value:	'Hijo Mayor'
												},{
													xtype:		'combo',
													id:		'lst_mayorHijo',
													width:		100,
													mode:       'local',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													hiddenName:	'hi_lst_ciudad4',
													displayField:   'name',
													valueField:     'value',
													store:		new Ext.data.JsonStore({
													fields:['name', 'value'],
													data:	[
													{name:'Si', value:'Si'},
													{name:'No', value:'No'}							
													]})
												},{
													xtype:	'displayfield',
													value:	'Trabaja'
												},{
													xtype:		'combo',
													id:		'lst_trabaja',
													width:		100,
													mode:       'local',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													hiddenName:	'hi_lst_ciudad4',
													displayField:   'name',
													valueField:     'value',
													store:		new Ext.data.JsonStore({
													fields:['name', 'value'],
													data:	[
													{name:'Si', value:'Si'},
													{name:'No', value:'No'}																				
													]}),
													listeners:{
														select: function (){
															var work = document.getElementById('lst_trabaja').value;
															if (work=='Si')
																{
																Ext.getCmp('field_trabajo').expand(true);
																}
															else if (work=='No')
																{
																Ext.getCmp('field_trabajo').collapse(false);	
																}
													}
											}										
										}]	
									},{
													xtype:			'fieldset',
													title: 			'Información trabajo',
													autoHeight:		true,
													id:				'field_trabajo',
													width:			800,	
													animated:		true,
													animCollapse:	true,							
													collapsed:		true,
													checkboxToggle:true,
													items :[{
														xtype: 'compositefield',
														fieldLabel:	'Empresa',
														anchor:	'100%',
														items:[{
															xtype:	'textfield',
															id:	'trabaja_mayor',
															width:	350
															
														},{
															xtype:	'displayfield',
															value:	'Número celular'
														},{
															xtype:	'textfield',
															id:	'cel_mayor',
															width:	150
														}]
												}]
										},{
											xtype: 'hidden',
											id:	'Csc_Hijos',//send_Hijos
											value:	'1'
										},{
											xtype: 'hidden',
											id:	'send_Hijos',
											name: 'send_Hijos'
										},{
												height: 200,
												width: 800,
												//title: 'Educacion no formal',
												xtype: 'grid',
												id: 'grid_Hijos',
												cm: new Ext.grid.ColumnModel([
														   {header: "Csc", width: 100, hidden: true},
														   {header: "Nombres", width: 100},
														   {header: "Apellidos", width: 100},
														   {header: "Nacimiento", width: 80},
														   {header: "Mayor", width: 50},
														   {header: "Empresa", width: 200},
														   {header: "Celular", width: 100}
												]),
												store:  ds_Hijos,
														    tbar: [{
															text: 'Crear',
														    iconCls: 'icon-new',
														    handler: function(){
																                                            														                                                        var defaultData = {
													    Csc: document.getElementById('Csc_Hijos').value,
														Nombres: document.getElementById('nombres_Hijos').value,
														Apellidos: document.getElementById('apellidos_Hijos').value,
														Nacimiento: document.getElementById('nacimieto_Hijos').value,
														Mayor: document.getElementById('lst_trabaja').value//,
													//	Empresa: document.getElementById('trabaja_mayor').value,
													//	Celular: document.getElementById('cel_mayor').value
														};
                                                        var r = new ds_Hijos.recordType(defaultData, ++recId);
															ds_Hijos.insert(0, r);
														var Csc =document.getElementById('Csc_Hijos').value;	
														Csc++;
														document.getElementById('Csc_Hijos').value=Csc;
														fn_ReadGrid(4);
							///nombres_Hijos//apellidos_Hijos/nacimieto_Hijos/lst_trabaja/trabaja_mayor/cel_mayor							 
														 }
                                   },{
                                               text: 'Borrar',
                                               iconCls: 'icon-delete',
                                               handler: function(){
                                               ds_Hijos.removeAll();
                                               }                                                                                                                                                                                           
                                   
             								 }]
											}],buttons:[{
														 text:'Continuar',
														 handler: function(){
														//fn_EnvioTabs(5);	 
														 Ext.getCmp('tab_padres').setDisabled(false);
														 Ext.getCmp('tab_Familia').setActiveTab(2);
														 }
													 }]
								}],listeners:{
												activate: function(){
													
													var Csc = document.getElementById('Csc').value;
														ds_Tab5.load({waitMsg:'Consultando', params:{Csc:Csc}});
													}
												}	
							},{
							title:'Padres',
							layout:'column',
							id:'tab_padres',
							disabled: true,
							//defaults: {width: 400},
							items: [{
									columnWidth:1.02,
									layout: 'form',
									border:false,
									items: [{
											xtype:			'fieldset',
											title: 			'Información Padre',
											autoHeight:		true,
											//id:				'',
											width:			800,	
											animated:		true,
											animCollapse:	true,							
											collapsed:		false,
											checkboxToggle:true,
											items :[{
													xtype: 'compositefield',
													fieldLabel:	'Información padre',
													anchor:	'100%',
													items:[{
																xtype:	'displayfield',
																value:	'Nombres'
															},{
																xtype:	'textfield',
																name:	'txt_NombrePadre',
																id:	'txt_NombrePadre',
																width:	250
															},{
																xtype:	'displayfield',
																value:	'Apellidos'
															},{															
																xtype:	'textfield',
																name:	'txt_ApellidosPadre',
																id:	'txt_ApellidosPadre',
																width:	250
															}]	
												
												},{
													xtype: 'compositefield',
													fieldLabel:	'Lugar nacimiento',
													anchor:	'100%',
													items:[{
																xtype:	'displayfield',
																value:	'País'
															},{
														xtype:		'combo',
														id:		'pais_Padre',
														width:		160,
														mode:       'local',
														msgTarget: 		'side',
														triggerAction:  'all',
														forceSelection: true,
														hiddenName:	'hi_lst_PaisPadre',
														displayField:   'dsc',
														valueField:     'csc',
														store:		new Ext.data.Store({
														autoLoad: true,
															proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=9'}),
															reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
															}),listeners:{
																select: function(){
																	var Pais = document.getElementById('hi_lst_PaisPadre').value;
																		if (Pais=='43')
																			{
																			Ext.getCmp('lst_peptoPadre').setDisabled(false);
																			}
																	}
																}
															},{
																xtype:	'displayfield',
																value:	'Departamento'
															},{
																xtype:		'combo',
																id:		'lst_peptoPadre',
																width:		160,
																mode:       'local',
																msgTarget: 		'side',
																triggerAction:  'all',
																forceSelection: true,
																disabled: true,
																hiddenName:	'hi_lst_deptoPadre',
																displayField:   'dsc',
																valueField:     'csc',
																store:		 new Ext.data.Store({
																autoLoad: true,
																proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=0'}),
																reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
																}),listeners:{
																select: function(){
																	var Cdepto = document.getElementById('hi_lst_deptoPadre').value;
																	Ext.getCmp('lst_ciudadPadre').setDisabled(false);
																	Ext.getCmp('lst_ciudadPadre').store.load({waitMsg:'Consultando', params:{Cdepto:Cdepto}});
																	document.getElementById('lst_ciudadPadre').value='';
																	}
																}
															},{
																xtype:	'displayfield',
																value:	'Ciudad'
															},{
																xtype:		'combo',
																id:		'lst_ciudadPadre',
																width:		160,
																mode:       'local',
																disabled: true,
																msgTarget: 		'side',
																triggerAction:  'all',
																forceSelection: true,
																hiddenName:	'hi_lst_ciudadPadre',
																displayField:   'dsc',
																valueField:     'csc',
																store:		new Ext.data.Store({
																	autoLoad: false,
																	proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=1'}),
																reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'float'},{name:'dsc', type:'string'}])
																})
															}]												
												},{
													xtype: 'compositefield',
													fieldLabel:	'Información residencia padre',
													anchor:	'100%',
													items:[{
																xtype:	'displayfield',
																value:	'Teléfono residencia'
															},{
																xtype:	'textfield',
																name:	'txt_ResidenciaPadre',
																id:	'txt_ResidenciaPadre',
																width:	100
															},{
																xtype:	'displayfield',
																value:	'Teléfono celular'
															},{														
																xtype:	'textfield',
																name:	'txt_CelPadre',
																id:	'txt_CelPadre',
																width:	100																															
															},{
																xtype:	'displayfield',
																value:	'Actividad que realiza'
															},{															
																xtype:	'combo',
																width:	130,
																name:		'lst_actividadPadre',
																id:		'lst_actividadPadre',
																mode:       'local',
																msgTarget: 		'side',
																triggerAction:  'all',
																forceSelection: true,
																hiddenName:	'hi_lst_actividadPadre',
																displayField:   'name',
																valueField:     'value',
																store:		new Ext.data.JsonStore({
																fields:['name', 'value'],
																data:	[
																{name:'Empleado', value:'Empleado'},
																{name:'Independiente', value:'Independiente'},																																						
																{name:'Pensionado', value:'Pensionado'},
																{name:'Ama de casa', value:'Ama de casa'}
																]}),
																listeners:{
																	select: function (){
																		var actividad = document.getElementById('hi_lst_actividadPadre').value;
																		if (actividad=='Empleado')
																			{
																				Ext.getCmp('trabajo_padre').expand(true);
																			}
																		else
																			{
																				Ext.getCmp('trabajo_padre').collapse(true);
																			}
																		}
																	}
															
															}]
												}]
									},{
													xtype:			'fieldset',
													title: 			'Información Trabajo Padre',
													autoHeight:		true,
													id:				'trabajo_padre',
													width:			800,	
													animated:		true,
													animCollapse:	true,							
													collapsed:		true,
													//checkboxToggle:true,													
													items :[{
														xtype: 'compositefield',
														fieldLabel:	'Empresa donde trabaja',
														anchor:	'100%',
														items:[{
															xtype:	'textfield',
															name:	'empresa_Padre',
															width:	350
															
														},{
															xtype:	'displayfield',
															value:	'Cargo'
														},{
															xtype:	'textfield',
															name:	'cargo_Padre',
															width:	150
														},{
															xtype:	'displayfield',
															value:	'Teléfono'
														},{
															xtype:	'textfield',
															name:	'Telempresa_Padre',
															width:	150
													}]
											}]
									}]
								},{
									columnWidth:1.02,
									layout: 'form',
									border:false,
									items: [{
													xtype:			'fieldset',
													title: 			'Información Madre',
													autoHeight:		true,
													//id:				'',
													width:			800,	
													animated:		true,
													animCollapse:	true,							
													collapsed:		false,
													checkboxToggle:true,
													items :[{
										xtype: 'compositefield',
										fieldLabel:	'Información Madre',
										anchor:	'100%',
										items:[{
													xtype:	'displayfield',
													value:	'Nombres'
												},{
													xtype:	'textfield',
													name:	'nombre_Madre',
													id:	'nombre_Madre',
													width:	250
												},{
													xtype:	'displayfield',
													value:	'Apellidos'
												},{
												
													xtype:	'textfield',
													name:	'name_Apellidos',
													id:	'name_Apellidos',
													width:	250
													
												
												}]	
									
									},{
										xtype: 'compositefield',
										fieldLabel:	'Lugar Nacimiento',
										anchor:	'100%',
										items:[{
													xtype:	'displayfield',
													value:	'País'
												},{
													xtype:		'combo',
													id:		'lst_PaiseMadre',
													width:		160,
													mode:       'local',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													hiddenName:	'hi_lst_PaiseMadre',
													displayField:   'dsc',
													valueField:     'csc',
													store:		new Ext.data.Store({
													autoLoad: true,
														proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=9'}),
														reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
														}),listeners:{
															select: function(){
																var Pais = document.getElementById('hi_lst_PaiseMadre').value;
																	if (Pais=='43')
																		{
																		Ext.getCmp('lst_deptoMadre').setDisabled(false);
																	}
																}
															}
												},{
													xtype:	'displayfield',
													value:	'Departamento'
												},{												
													xtype:		'combo',
													id:		'lst_deptoMadre',
													width:		160,
													mode:       'local',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													disabled: true,
													hiddenName:	'hi_lst_deptoMadre',
													displayField:   'dsc',
													valueField:     'csc',
													store:		 new Ext.data.Store({
													autoLoad: true,
													proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=0'}),
													reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
													}),listeners:{
													select: function(){
														var Cdepto = document.getElementById('hi_lst_deptoMadre').value;
														Ext.getCmp('lst_ciudadMadre').setDisabled(false);
														Ext.getCmp('lst_ciudadMadre').store.load({waitMsg:'Consultando', params:{Cdepto:Cdepto}});
														
														document.getElementById('lst_ciudadMadre').value='';
														}
													}												
												},{
													xtype:	'displayfield',
													value:	'Ciudad'
												},{												
													xtype:		'combo',
													id:		'lst_ciudadMadre',
													width:		160,
													mode:       'local',
													disabled: true,
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													hiddenName:	'hi_lst_ciudadMadre',
													displayField:   'dsc',
													valueField:     'csc',
													store:		new Ext.data.Store({
														autoLoad: false,
														proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=1'}),
														reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'float'}, {name:'dsc', type:'string'}])
														})
												}]	
									},{
										xtype: 'compositefield',
										fieldLabel:	'Información residencia madre',
										anchor:	'100%',
										items:[{
													xtype:	'displayfield',
													value:	'Teléfono residencia'
												},{
													xtype:	'textfield',
													name:	'tel_Madre',
													id:	'tel_Madre',
													width:	100
												},{
													xtype:	'displayfield',
													value:	'Teléfono celular'
												},{
												
													xtype:	'textfield',
													name:	'cel_Madre',
													id:	'cel_Madre',
													width:	90
													
												
												},{
													xtype:	'displayfield',
													value:	'Actividad que realiza'
												},{
												
													xtype:	'combo',
													width:	130,
													id:		'lst_acMadre',
													mode:       'local',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													hiddenName:	'hi_lst_acMadre',
													displayField:   'name',
													valueField:     'value',
													store:		new Ext.data.JsonStore({
													fields:['name', 'value'],
													data:	[
													{name:'Empleado', value:'Empleado'},
													{name:'Independiente', value:'Independiente'},														
													{name:'Pensionado', value:'Pensionado'},
													{name:'Ama de casa', value:'Ama de casa'}																						
													]}),
													listeners:{
														select: function (){
															var ActMam =	document.getElementById('hi_lst_acMadre').value;
															if (ActMam=='Empleado')
																{
																	Ext.getCmp('fieldset_madre').expand(true);
																}
															else
																{
																	Ext.getCmp('fieldset_madre').collapse(true);
																}	
															}
															
														}
												
												}]
										}]
									},{
													xtype:			'fieldset',
													title: 			'Información Trabajo Madre',
													autoHeight:		true,
													id:				'fieldset_madre',
													width:			800,	
													animated:		true,
													animCollapse:	true,							
													collapsed:		true,
													//checkboxToggle:true,
													items :[{
														xtype: 'compositefield',
														fieldLabel:	'Empresa donde trabaja',
														anchor:	'100%',
														items:[{
															xtype:	'textfield',
															name:	'emp_Madre',
															width:	350
															
														},{
															xtype:	'displayfield',
															value:	'Cargo'
														},{
															xtype:	'textfield',
															name:	'cargo_Madre',
															width:	150
														},{
															xtype:	'displayfield',
															value:	'Teléfono'
														},{
															xtype:	'textfield',
															name:	'telEmp_Madre',
															width:	150
														}]
													}]
									}],buttons:[{
														 text:'Continuar',
														 handler: function(){
														//fn_EnvioTabs(5);	 
														 Ext.getCmp('tab_hermanos').setDisabled(false);
														 Ext.getCmp('tab_Familia').setActiveTab(3);
														 Ext.getCmp('btn_hermanos').setDisabled(false);
														 }
													 }]
								}],listeners:{
												activate: function(){
													
													var Csc = document.getElementById('Csc').value;
														ds_Tab5.load({waitMsg:'Consultando', params:{Csc:Csc}});
													}
												}	
							
							
							//	}]	
							},{
							title:'Hermanos',
							layout:'column',
							id:	'tab_hermanos',
							disabled: true,
							//defaults: {width: 400},
							items: [{
									columnWidth:1.02,
									layout: 'form',
									border:false,
									items: [{
										xtype: 'compositefield',
										fieldLabel:	'Información Hermanos',
										anchor:	'100%',
										items:[{
													xtype:	'displayfield',
													value:	'Nombres'
												},{
													xtype:	'textfield',
													id:'name_Hermano',
													width:	250
												},{
													xtype:	'displayfield',
													value:	'Apellidos'
												},{
												
													xtype:	'textfield',
													id:'apellido_Hermano',
													width:	250												
												}]	
											},{
										xtype: 'compositefield',
										fieldLabel:	'País',
										anchor:	'100%',
										items:[{
													xtype:		'combo',
													id:		'lst_paisHermano',
													width:		150,
													mode:       'local',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													hiddenName:	'hi_lst_paisHermano',
													displayField:   'dsc',
													valueField:     'csc',
													store:		new Ext.data.Store({
													autoLoad: true,
														proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=9'}),
														reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
														}),listeners:{
															select: function(){
																var Pais = document.getElementById('hi_lst_paisHermano').value;
																	if (Pais=='43')
																		{
																		Ext.getCmp('lst_deptoHermano').setDisabled(false);
																		}
																}
															}
												},{
													xtype:	'displayfield',
													value:	'Departamento'
												},{												
													xtype:		'combo',
													id:		'lst_deptoHermano',
													width:		150,
													mode:       'local',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													disabled: true,
													hiddenName:	'hi_lst_deptoHermano',
													displayField:   'dsc',
													valueField:     'csc',
													store:		 new Ext.data.Store({
													autoLoad: true,
													proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=0'}),
													reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
													}),listeners:{
													select: function(){
														var Cdepto = document.getElementById('hi_lst_deptoHermano').value;
														Ext.getCmp('lst_ciudadHermano').setDisabled(false);
														Ext.getCmp('lst_ciudadHermano').store.load({waitMsg:'Consultando', params:{Cdepto:Cdepto}});
														
														document.getElementById('lst_ciudadHermano').value='';
														}
													}																							
												},{
													xtype:	'displayfield',
													value:	'Ciudad'
												},{												
													xtype:		'combo',
													id:		'lst_ciudadHermano',
													width:		150,
													mode:       'local',
													disabled: true,
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													hiddenName:	'hi_lst_ciudadHermano',
													displayField:   'dsc',
													valueField:     'csc',
													store:		new Ext.data.Store({
														autoLoad: false,
														proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=1'}),
														reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'float'}, {name:'dsc', type:'string'}])
														})																									
												}]															
									},{
										xtype: 'compositefield',
										fieldLabel:	'Teléfono residencia',
										anchor:	'100%',
										items:[{
													xtype:	'textfield',
													id:	'tel_Hermano',
													width:	150
												},{
													xtype:	'displayfield',
													value:	'Teléfono celular'
												},{												
													xtype:	'textfield',
													id:	'cel_Hermano',
													width:	150
												},{
													xtype:	'displayfield',
													value:	'Actividad que realiza'
												},{												
													xtype:	'combo',
													width:	130,
													id:		'lst_actividadHermano',
													mode:       'local',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													hiddenName:	'hi_lst_actividadHermano',
													displayField:   'name',
													valueField:     'value',
													store:		new Ext.data.JsonStore({
													fields:['name', 'value'],
													data:	[
													{name:'Empleado', value:'Empleado'},
													{name:'Independiente', value:'Independiente'},														
													{name:'Pensionado', value:'Pensionado'}
													]})
													
												
												}]	
														
									},{
										xtype: 'compositefield',
										fieldLabel:	'Empresa donde trabaja',
										anchor:	'100%',
										items:[{
													xtype:	'textfield',
													id:	'empresa_Hermano',
													width:	250
												},{
													xtype:	'displayfield',
													value:	'Cargo'
												},{
												
													xtype:	'textfield',
													id:	'cargo_Hermano',
													width:	120
													
												
												},{
													xtype:	'displayfield',
													value:	'Teléfono'
												},{
												
													xtype:	'textfield',
													id:	'telEmpresa_Hermano',
													width:	100
													
												
												}]	
														
									}]
							},{
								//
										columnWidth:1,
										layout: 'form',
										border:false,
										items: 	[{
											xtype:	'hidden',
											id:	'Csc_Hermano',
											value:'0'
										},{
											xtype:	'hidden',
											id:	'send_Hermanos',
											name:	'send_Hermanos',
											value:'0'
										},{
											height: 200,
											width: 800,
											//title: 'Información hermanos',
											xtype: 'grid',
											id: 'grid_Hermano',//ds_Hermanos//grid_Hermano
											cm: new Ext.grid.ColumnModel([
													   {header: "Csc", width: 100, hidden:true},
													   {header: "Nombres", width: 140},
													   {header: "Apellidos", width: 140},
													   {header: "Pais", width: 80},
													   {header: "Telefono", width: 60},
													   {header: "Celular", width: 60},
													   {header: "Actividad", width: 80},
													   {header: "Empresa", width: 100},
													   {header: "Cargo", width: 60}
											]),
											
												store: ds_Hermanos,
														   tbar: [{
															text: 'Crear',
														    iconCls: 'icon-new',
														    handler: function(){                                            														                                  	  var defaultData = {
														Csc: document.getElementById('Csc_Hermano').value,
														Nombres: document.getElementById('name_Hermano').value,
														Apellidos: document.getElementById('apellido_Hermano').value,
														Pais: document.getElementById('lst_paisHermano').value,
														Telefono: document.getElementById('tel_Hermano').value,
														Celular: document.getElementById('cel_Hermano').value,
														Actividad: document.getElementById('lst_actividadHermano').value,
														Empresa: document.getElementById('empresa_Hermano').value,
														Cargo: document.getElementById('cargo_Hermano').value
														};
                                                         
														 var r = new ds_Hermanos.recordType(defaultData, ++recId);
                                                         ds_Hermanos.insert(0, r);
														 var Csc_Hermano =document.getElementById('Csc_Hermano').value;
														 Csc_Hermano++;
														 document.getElementById('Csc_Hermano').value=Csc_Hermano;
														 fn_ReadGrid(5);
														 }
														 
                                   },{
                                               text: 'Borrar',
                                               iconCls: 'icon-delete',
                                               handler: function(){
                                               ds_Hermanos.removeAll();
                                               }                                                                                                                                                                                           
                                   
             								 }]


										}]		
								//
								}],listeners:{
												activate: function(){
													
													var Csc = document.getElementById('Csc').value;
														ds_Tab5.load({waitMsg:'Consultando', params:{Csc:Csc}});
													}
												}	
							}]
						}],buttons:[{
								text: 'Volver',
								handler: function (){
									fn_Volver(4)
									}
							},{
											text:'Guardar y continuar',
											id:	'btn_hermanos',
											disabled:true,
											handler: function(){
												fn_EnvioTabs(5);
												}
											}]
											
					}]/////////----------------------------------------------------------------------------------INFORMACION FAMILIAR FIN
				},{
						layout:'column',
						title:'Información Laboral',
						id: 'tab_Laboral',
						activeTab: 6,
						disabled: true,
						iconCls: 'InformacionLABORAL',
						items:[{
								columnWidth:1.2,
								layout: 'form',
								border:false,
								items: 	[{
										xtype: 'compositefield',
										fieldLabel:	'Nota',
										anchor:	'100%',
										items:[{
													xtype:	'displayfield',
													value:	'Incluya las 3 ultimas  empresas o fincas donde a laborado fecha de culminación en forma descendente.'
											}]
											
									
										
								},{
										xtype: 'compositefield',
										fieldLabel:	'Nombre Empresa',
										anchor:	'100%',
										items:[{
													xtype:	'textfield',
													id: 'Empresa_tab6',//id: 'Empresa_tab6',
													emptyText:'-',
													width:	180
											},{
													xtype:	'displayfield',
													value:	'Departamento'		
											},{
														xtype:		'combo',
														id:		'tab6Depto',
														width:		130,
														mode:       'local',
														msgTarget: 		'side',
														emptyText:'-',
														triggerAction:  'all',
														forceSelection: true,
														//disabled: true,
														hiddenName:	'hi_tab6Depto',
														displayField:   'dsc',
														valueField:     'csc',
														store:		 new Ext.data.Store({
														autoLoad: true,
														proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=0'}),
														reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'string'}, {name:'dsc', type:'string'}])
														}),listeners:{
														select: function(){
															var Cdepto = document.getElementById('hi_tab6Depto').value;
															Ext.getCmp('tab6Ciudad').setDisabled(false);
															Ext.getCmp('tab6Ciudad').store.load({waitMsg:'Consultando', params:{Cdepto:Cdepto}});
															
															document.getElementById('tab6Ciudad').value='';
															}
														}

											},{
													xtype:	'displayfield',
													value:	'Ciudad'
											},{
													
														xtype:		'combo',
														id:		'tab6Ciudad',
														width:		130,
														mode:       'local',
														disabled: true,
														msgTarget: 		'side',
														triggerAction:  'all',
														emptyText:'-',
														forceSelection: true,
														hiddenName:	'hi_tab6Ciudad',
														displayField:   'dsc',
														valueField:     'csc',
														store:		new Ext.data.Store({
															autoLoad: false,
															proxy:	new Ext.data.HttpProxy({url:'Visita_SQL.php?consulta=1'}),
															reader: new Ext.data.JsonReader({root:'root'},[{name:'csc', type:'float'}, {name:'dsc', type:'string'}])
															})
													
											}]
								},{
										xtype: 'compositefield',
										fieldLabel:	'Dirección empresa',
										anchor:	'100%',
										items:[{
													xtype:	'textfield',
													id:	'dir_EmpresaTab6',
													emptyText:'-',
													width:	250
													
											},{
													xtype:	'displayfield',
													value:	'Razón social'
											},{
													xtype:	'textfield',
													id:	'razon_EmpresaTab6',
													emptyText:'-',
													width:	150
											
											}]
								},{
										xtype: 'compositefield',
										fieldLabel:	'Teléfono',
										anchor:	'100%',
										items:[{
													xtype:	'textfield',
													id:	'tel_EmpresaTab6',
													emptyText:'-',
													width:	100
													
											},{
													xtype:	'displayfield',
													value:	'Cargo'
											},{
													xtype:	'textfield',
													id:	'cargo_EmpresaTab6',
													emptyText:'-',
													width:	150
														
											},{
													xtype:	'displayfield',
													value:	'Años que laboro'
											},{
													xtype:	'combo',
													width:	70,
													id:		'anos_Tab6',
													mode:       'local',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													emptyText:'-',
													hiddenName:	'hi_anos_Tab6',
													displayField:   'name',
													valueField:     'value',
													store:		new Ext.data.JsonStore({
													fields:['name', 'value'],
													data:	[
													{name:'0', value:'0'},
													{name:'1', value:'1'},														
													{name:'2', value:'2'},
													{name:'3', value:'3'},
													{name:'4', value:'4'},
													{name:'5', value:'5'},
													{name:'6', value:'6'},
													{name:'7', value:'7'},
													{name:'8', value:'8'},
													{name:'9', value:'9'},
													{name:'10', value:'10'}
													
													]})
													
											}]
								},{
										xtype: 'compositefield',
										fieldLabel:	'Motivo retiro',
										anchor:	'100%',
										items:[{
													xtype:	'textfield',
													id:	'retiroTab6',
													emptyText:'-',
													width:	350
													
											}]
								},{
										columnWidth:1.2,
											layout: 'form',
											labelAlign: 'top',
											border:false,
											items: 	[{
												xtype:	'textarea',
												fieldLabel:	'Observaciones',
												id: 'obTab6',
												name:	'obTab6',
												width:	450
											},{
												xtype: 'hidden',
												id:	'Csc_Lab',
												value:	'0'
											},{
												xtype: 'hidden',
												id:	'Sendgrid_Laboral',
												name:	'Sendgrid_Laboral',
												value:	'0'
											},{		
											
												height: 200,
												width: 800,
												//title: 'Educación no formal',
												xtype: 'grid',
												id: 'grid_Laboral',
												cm: new Ext.grid.ColumnModel([
														   {header: "Csc_Lab", width: 200,hidden:true},
														   {header: "Empresa", width: 60},
														   {header: "Departamento", width: 120},
														   {header: "Ciudad", width: 60},
														   {header: "Direccion", width: 60},
														   {header: "Razon Social", width: 60},
														   {header: "Telefono", width: 60},
														   {header: "Cargo", width: 60},
														   {header: "Años", width: 60},
														   {header: "Retiro", width: 60}
//														   
												]),
												store: ds_Laboral,//
														   tbar: [{
															text: 'Crear',
														    iconCls: 'icon-new',
														    handler: function(){                                            														                                       var defaultData = {
													    Csc: document.getElementById('Csc_Lab').value,
														Empresa: document.getElementById('Empresa_tab6').value,
														Departamento: document.getElementById('tab6Depto').value,
														Ciudad: document.getElementById('tab6Ciudad').value,
														Direccion: document.getElementById('dir_EmpresaTab6').value,
														Razon_Social: document.getElementById('razon_EmpresaTab6').value,
														Telefono: document.getElementById('tel_EmpresaTab6').value,
														Cargo: document.getElementById('cargo_EmpresaTab6').value,
														Anos: document.getElementById('anos_Tab6').value,
														Retiro: document.getElementById('retiroTab6').value//Sendgrid_Laboral
														};
                                                       var r = new ds_Laboral.recordType(defaultData, ++recId);
															ds_Laboral.insert(0, r);
			//Empresa_tab6/tab6Depto/tab6Ciudad/dir_EmpresaTab6/razon_EmpresaTab6/tel_EmpresaTab6/cargo_EmpresaTab6/anos_Tab6/retiroTab6											
														 var Csc =document.getElementById('Csc_Lab').value;
														 Csc++;
														 document.getElementById('Csc_Lab').value=Csc;
														 fn_ReadGrid(6);
														 }
                                   },{
                                               text: 'Borrar',
                                               iconCls: 'icon-delete',
                                               handler: function(){
                                               ds_Laboral.removeAll();
											   document.getElementById('Csc_Lab').value=0;
											   document.getElementById('Sendgrid_Laboral').value=0;
                                               }                                                                                                                                                                                           
                                   
             								 }]
	
												
											}]
								//	
								}]
						}],buttons:[{
								text: 'Volver',
								handler: function (){
									fn_Volver(5);
									}
							},{
											text:'Guardar y continuar',
											handler: function(){
											fn_EnvioTabs(6);
												}
											}]
					
				},{
						layout:'column',
						title:'Información Financiera',
						id: 'tab_Financiero',
						activeTab: 7,
						disabled:true,
						iconCls: 'INFORMACIONFINANCIERA',
						items:[{
								columnWidth:.5,
								layout: 'form',
								border:false,
								items: 	[{
									xtype:	'displayfield',
									value:	'Tipo de ingreso.'
								},{
									xtype:	'numberfield',
									fieldLabel: 'Salario',
									id: 'salario',
									value:	0,
									width:	250
									
								},{
									xtype:		'numberfield',
									fieldLabel: 'Pensión',
									id:	'pension',
									value:	0,
									width:	250
								},{
									xtype:		'numberfield',
									fieldLabel: 'Arriendos',
									id:	'arriendos',
									value:	0,
									width:	250
								},{
									xtype:		'numberfield',
									fieldLabel: 'Honorarios',
									id:	'honorarios',
									value:	0,
									width:	250
								},{
									xtype:		'numberfield',
									fieldLabel: 'Otros',
									id:	'otros',
									value:	0,
									width:	250
								},{
									xtype:		'numberfield',
									fieldLabel: 'Total',
									id: 'Tingreso',
									value:	0,
									disabled: true,
									width:	150
									
								}]//,buttons:[{
									//text: 'Calcular',
									//handler: function(){
									//	var salario = document.getElementById('salario').value;
									//	document.getElementById('Tingreso').value=salario;
									//	}
									//}]
						},{
								columnWidth:.5,
								layout: 'form',
								border:false,
								items: 	[{
										xtype:	'displayfield',
										value:	'Tipo de egreso.'
										
								},{
									xtype:	'numberfield',
									fieldLabel: 'Egreso A',
									id:	'egresoa',
									value:	0,
									width:	250
									
								},{
									xtype:		'numberfield',
									fieldLabel: 'Egreso B',
									id:	'egresob',
									value:	0,
									width:	250
								},{
									xtype:		'numberfield',
									fieldLabel: 'Egreso C',
									id:	'egresoc',
									value:	0,
									width:	250
								},{
									xtype:		'numberfield',
									fieldLabel: 'Egreso D',
									id:	'egresod',
									value:	0,
									width:	250
								},{
									xtype:		'numberfield',
									fieldLabel: 'Egreso E',
									value:	0,
									id:	'egresoe',
									width:	250
								},{
									xtype:		'numberfield',
									fieldLabel: 'Total',
									value:	0,
									id:	'Tegreso',
									disabled: true,
									width:	150
								}]	
						},{
								columnWidth:1,
								layout: 'form',
								border:false,
								items: 	[{
										xtype: 'compositefield',
										//fieldLabel:	'Motivo retiro',
										anchor:	'100%',
										items:[{
											xtype:	'hidden',
											name:'RetiroTab7',
											id:	'RetiroTab7',
											width:	600
												}]
								}]
						},{
							columnWidth:1,
								layout: 'form',
								border:false,
								items: 	[{
										xtype: 'compositefield',
										fieldLabel:	'Observaciones',
										
										anchor:	'100%',
										items:[{
											xtype:	'textarea',
											name:'ObTab7',
											id: 'ObservacionesTab7',
											width:	600
											}]
										}]
							
									//}]	
						}],buttons:[{
								text: 'Volver',
								handler: function (){
									fn_Volver(6);
									}
							},{
											text:'Guardar y continuar',
											handler: function(){
												Ext.getCmp('tab_Audiovisuales').setDisabled(true);//tabComportamiento
												Ext.getCmp('tb_Formularios').setActiveTab(8);
												var Csc = document.getElementById('Csc').value;
													document.getElementById('Upload').src='Upload.php?csc='+Csc;
													fn_EnvioTabs(7);
													//												
												}
											}]
				},{
						layout:'column',
						title:'Medios Audiovisuales',
						id: 'tab_Audiovisuales',
						disabled: true,
						activeTab: 8,
						iconCls: 'MEDIOSAUDIOVISUALES',
						items:[{
								columnWidth:.8,
								layout: 'form',
								border:false,
								script: true,
								items: 	[{
									xtype: 'fieldset',
									title:	'Selecione los archivos para cargar la información',
									width:	600,
									html:'<iframe src="" id="Upload" width="97%" height="250"> </iframe>'//class="botones"
									
								},{
									xtype:	'textarea',
									fieldLabel:	'Observaciones',
									name:	'ObUpload',
									id:	'ObUpload',
									width:	500
								}]
							}],buttons:[{
								text: 'Volver',
								handler: function (){
									
									fn_Volver(7);
									}
							},{
											text:'Guardar y continuar',
											handler: function(){
												
												fn_EnvioTabs(8);
												}
											}]
				},{
					layout:'column',
					title:'Concepto general del candidato',
					id: 'tabComportamiento',
					disabled: true,
					activeTab: 9,
					iconCls: 'CONCEPTOGENERAL',
					items:[{
						xtype:'tabpanel',
            			activeTab: 0,
						id:	'tab_general',
						width:	800,
						//defaults:{autoHeight:true}, 
            			items:[{
									layout:'column',
									title:'Análisis psicológico',
									
									items:[{
										columnWidth:1,
										layout: 'form',
										border:false,
										items:[{
													xtype:	'combo',
													fieldLabel:	 'Fuma',
													width:	70,
													id:		'lst_fuma',
													mode:       'local',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													hiddenName:	'hi_lst_fuma',
													displayField:   'name',
													valueField:     'value',
													store:		new Ext.data.JsonStore({
													fields:['name', 'value'],
													data:	[
													{name:'Si', value:'Si'},
													{name:'No', value:'No'}
													
													]})
												},{
												xtype: 'compositefield',
												fieldLabel:	'Es alergico a?',
												anchor:	'100%',
												items:[{
													xtype:      'displayfield',
													value:	'Medicamentos',
													width:	100
												},{
													xtype:      'checkbox',
													checked:	false,
													//boxLabel:	'Medicamentos',
													width:		140	
												
												},{
													xtype:      'displayfield',
													value:		'Alimentos',
													width:		80
												},{
													xtype:      'checkbox',
													checked:	false	
												
											}]
										},{
												xtype: 'compositefield',
												fieldLabel:	'Que medicamentos?',
												anchor:	'100%',
												items:[{
													xtype:      'textarea',
													name:		'Medicamentos',
													id:'Medicamentos_Tab9',
													width:	250
												},{
													xtype:      'displayfield',
													value:		'Que alimentos?:'
													
												},{
													xtype:      'textarea',
													name:		'Alimentos',
													id: 'Alimentos_tab9',
													width:		250	
												
											}]
												
									},{
												xtype: 'compositefield',
												fieldLabel:	'Análisis',
												anchor:	'100%',
												items:[{
													xtype:      'textarea',
													name:	'Analisis',
													id:	'AnalisisTab9',
													width:	600
												}]
												
									}],buttons:[{
											 text:'Continuar',
											 handler: function(){
											 Ext.getCmp('tab_GeneralActitud').setDisabled(false);
											 Ext.getCmp('tab_general').setActiveTab(1);
											 //fn_EnvioTabs(9);
											
											 }
										 }]
								}]
								
								},{
									layout:'column',
									disabled:	true,
									id:	'tab_GeneralActitud',
									title:'Actitud frente al proceso',
									height:   200,
									items:[{
											columnWidth:1.2,
											layout: 'form',
											border:false,
											items:[{
													xtype:	'displayfield',
													value:	'Que actitud presento el candidato frente al proceso de visita domiciliaria?'
												},{
													xtype:	'combo',
													width:	130,
													name:		'lst_actitud',
													id:	'lst_actitud',
													mode:       'local',
													msgTarget: 		'side',
													triggerAction:  'all',
													forceSelection: true,
													hiddenName:	'hi_lst_actitud',
													displayField:   'name',
													valueField:     'value',
													store:		new Ext.data.JsonStore({
													fields:['name', 'value'],
													data:	[
													{name:'Excelente', value:'Excelente'},
													{name:'Muy Buena', value:'Muy Buena'},
													{name:'Regular', value:'Regular'},
													{name:'Pecima', value:'Pecima'},
													{name:'No Permitio El Ingreso', value:'No Permitio El Ingreso'}														
																					
													]})
												},{
													xtype:      'textarea',
													fieldLabel:	'Observaciones',
													name:	'ObActitud',
													id:	'ObActitudTab9',
													width:		600
												}]
										  }],buttons:[{
													 text:'Continuar',
													 handler: function(){
													 Ext.getCmp('tab_GeneralConcepto').setDisabled(false);
											 		 Ext.getCmp('tab_general').setActiveTab(2);
													 Ext.getCmp('btn_GeneralConcepto').setDisabled(false); 
													 
													 //fn_EnvioTabs(9);
													
													 }
												 }]
								},{
									layout:'column',
									title:'Concepto final',
									id:	'tab_GeneralConcepto',
									disabled: true,
									items:[{
										  	columnWidth:1.2,
											layout: 'form',
											border:false,
											items:[{
													xtype:	'combo',
													width:	130,
													name:		'lst_concepto',
													id:	'lst_concepto',
													mode:       'local',
													msgTarget: 		'side',
													fieldLabel:	 'Concepto',
													triggerAction:  'all',
													forceSelection: true,
													hiddenName:	'hi_lst_concepto',
													displayField:   'name',
													valueField:     'value',
													store:		new Ext.data.JsonStore({
													fields:['name', 'value'],
													data:	[
													{name:'Favorable', value:'Favorable'},
													{name:'Desfavorable', value:'Desfavorable'}
																																		
													]})
												},{
													xtype:      'textarea',
													fieldLabel:	'Observaciones',
													name:	'ObConcepto',
													id:	'ObConceptoTab9',
													width:		600
												}]
										}]
								}]
						
						}],buttons:[{
								text: 'Volver',
								handler: function (){
									fn_Volver(8);
									}
							},{
											text:'Guardar y continuar',
											id:	'btn_GeneralConcepto',
											disabled:true,
											handler: function(){
												fn_EnvioTabs(9);
												}
											}]
				}]
		}]
		
									
            
    });
	
        //MAPA DE GOOGLE
        Ext.getCmp('txt_localizacion').on('blur',function(){
        var latitud = document.getElementById("txt_localizacion").value;
        document.getElementById("mapaIframe").contentWindow.codeAddress(latitud)
        //alert(latitud);
        
        
        
        })
	
	
	
	Ext.getCmp('salario').on('blur', function(){//salario
	//pension//arriendos/honorarios/otros
	var  sal = document.getElementById('salario').value;
	var  pen = document.getElementById('pension').value;
	var  arr = document.getElementById('arriendos').value;
	var  hon = document.getElementById('honorarios').value;
	var  otr = document.getElementById('otros').value;
	var total=0;
	total=parseInt(sal) + parseInt(pen) + parseInt(arr) + parseInt(hon) + parseInt(otr);
	document.getElementById('Tingreso').value=total;
	});
	Ext.getCmp('pension').on('blur', function(){//salario
	//pension//arriendos/honorarios/otros
	var  sal = document.getElementById('salario').value;
	var  pen = document.getElementById('pension').value;
	var  arr = document.getElementById('arriendos').value;
	var  hon = document.getElementById('honorarios').value;
	var  otr = document.getElementById('otros').value;
	var total=0;
	total=parseInt(sal) + parseInt(pen) + parseInt(arr) + parseInt(hon) + parseInt(otr);
	document.getElementById('Tingreso').value=total;
	});
	Ext.getCmp('arriendos').on('blur', function(){//salario
	//pension//arriendos/honorarios/otros
	var  sal = document.getElementById('salario').value;
	var  pen = document.getElementById('pension').value;
	var  arr = document.getElementById('arriendos').value;
	var  hon = document.getElementById('honorarios').value;
	var  otr = document.getElementById('otros').value;
	var total=0;
	total=parseInt(sal) + parseInt(pen) + parseInt(arr) + parseInt(hon) + parseInt(otr);
	document.getElementById('Tingreso').value=total;
	});
	Ext.getCmp('honorarios').on('blur', function(){//salario
	//pension//arriendos/honorarios/otros
	var  sal = document.getElementById('salario').value;
	var  pen = document.getElementById('pension').value;
	var  arr = document.getElementById('arriendos').value;
	var  hon = document.getElementById('honorarios').value;
	var  otr = document.getElementById('otros').value;
	var total=0;
	total=parseInt(sal) + parseInt(pen) + parseInt(arr) + parseInt(hon) + parseInt(otr);
	document.getElementById('Tingreso').value=total;
	});
	Ext.getCmp('otros').on('blur', function(){//salario
	//pension//arriendos/honorarios/otros
	var  sal = document.getElementById('salario').value;
	var  pen = document.getElementById('pension').value;
	var  arr = document.getElementById('arriendos').value;
	var  hon = document.getElementById('honorarios').value;
	var  otr = document.getElementById('otros').value;
	var total=0;
	total=parseInt(sal) + parseInt(pen) + parseInt(arr) + parseInt(hon) + parseInt(otr);
	document.getElementById('Tingreso').value=total;
	});
	
	Ext.getCmp('egresoa').on('blur', function(){
		var SalA = document.getElementById('egresoa').value;
		var SalB = document.getElementById('egresob').value;
		var SalC = document.getElementById('egresoc').value;
		var SalD = document.getElementById('egresod').value;
		var SalE = document.getElementById('egresoe').value;		
		var Tegreso=0;
		Tegreso=parseInt(SalA)+parseInt(SalB)+parseInt(SalC)+parseInt(SalD)+parseInt(SalE);
		document.getElementById('Tegreso').value=Tegreso;
		});//'//Tegreso//egresoe
		Ext.getCmp('egresob').on('blur', function(){
		var SalA = document.getElementById('egresoa').value;
		var SalB = document.getElementById('egresob').value;
		var SalC = document.getElementById('egresoc').value;
		var SalD = document.getElementById('egresod').value;
		var SalE = document.getElementById('egresoe').value;		
		var Tegreso=0;
		Tegreso=parseInt(SalA)+parseInt(SalB)+parseInt(SalC)+parseInt(SalD)+parseInt(SalE);
		document.getElementById('Tegreso').value=Tegreso;
		});//'//Tegreso//egresoe
		Ext.getCmp('egresoc').on('blur', function(){
		var SalA = document.getElementById('egresoa').value;
		var SalB = document.getElementById('egresob').value;
		var SalC = document.getElementById('egresoc').value;
		var SalD = document.getElementById('egresod').value;
		var SalE = document.getElementById('egresoe').value;		
		var Tegreso=0;
		Tegreso=parseInt(SalA)+parseInt(SalB)+parseInt(SalC)+parseInt(SalD)+parseInt(SalE);
		document.getElementById('Tegreso').value=Tegreso;
		});//'//Tegreso//egresoe
		Ext.getCmp('egresod').on('blur', function(){
		var SalA = document.getElementById('egresoa').value;
		var SalB = document.getElementById('egresob').value;
		var SalC = document.getElementById('egresoc').value;
		var SalD = document.getElementById('egresod').value;
		var SalE = document.getElementById('egresoe').value;		
		var Tegreso=0;
		Tegreso=parseInt(SalA)+parseInt(SalB)+parseInt(SalC)+parseInt(SalD)+parseInt(SalE);
		document.getElementById('Tegreso').value=Tegreso;
		});//'//Tegreso//egresoe
		Ext.getCmp('egresoe').on('blur', function(){
		var SalA = document.getElementById('egresoa').value;
		var SalB = document.getElementById('egresob').value;
		var SalC = document.getElementById('egresoc').value;
		var SalD = document.getElementById('egresod').value;
		var SalE = document.getElementById('egresoe').value;		
		var Tegreso=0;
		Tegreso=parseInt(SalA)+parseInt(SalB)+parseInt(SalC)+parseInt(SalD)+parseInt(SalE);
		document.getElementById('Tegreso').value=Tegreso;
		});//'//Tegreso//egresoe
	////////////////////////////// ON LOAD DS --------------------------------------------------
	
	Ext.getCmp('grid_Principal').on('cellclick', function(grid, rowIndex, columnIndex, e){
		var record =  grid.getStore().getAt(rowIndex);
		var fieldName = grid.getColumnModel().getDataIndex(columnIndex);
		var data = record.get(fieldName);
		var Csc_Creacion = ds_Principal.getAt(rowIndex).data.Csc_Creacion;
		var Identificacion = ds_Principal.getAt(rowIndex).data.Identificacion;
		document.getElementById('Csc').value=Csc_Creacion;
		document.getElementById('Id_C').value=Identificacion;
		Ext.getCmp('btn_Continuar').setDisabled(false);
	});

	//-------------------------------------------------------------------
function fn_Volver(val){
	//Datos_Basicos//deshabilita
	Buscar_aspirante//habilita
	if(val=='0')
		{	
									Ext.getCmp('Buscar_aspirante').setDisabled(false);
									Ext.getCmp('Datos_Basicos').setDisabled(true);
									Ext.getCmp('tb_Formularios').setActiveTab(0);
					
		}
	else if (val=='1')
		{
									Ext.getCmp('Info_Vivienda').setDisabled(true);
									Ext.getCmp('Datos_Basicos').setDisabled(false);
									Ext.getCmp('tb_Formularios').setActiveTab(1);
						
		}
	else if (val=='2')
		{
									Ext.getCmp('tabdocs').setDisabled(true);
									Ext.getCmp('Info_Vivienda').setDisabled(false);
									Ext.getCmp('tb_Formularios').setActiveTab(2);//Info_Academica//4
									//alert(val)
		}
	else if (val=='3')
		{
									storeEduFormal.removeAll;
									Ext.getCmp('tabdocs').setDisabled(false);//Info_Familiar//fn_Volver(3)//fn_EnvioTabs(4);
									Ext.getCmp('Info_Academica').setDisabled(true);
									Ext.getCmp('tb_Formularios').setActiveTab(3);//Info_Academica//4

		}	
	else if (val=='4')
		{
								
									Ext.getCmp('Info_Academica').setDisabled(false);
									Ext.getCmp('Info_Familiar').setDisabled(true);
									storeEduFormal.removeAll;
								//	alert(val)
									Ext.getCmp('tb_Formularios').setActiveTab(4);
		}
	else if (val=='5')
		{
								
									Ext.getCmp('tab_Laboral').setDisabled(true);
									Ext.getCmp('Info_Familiar').setDisabled(false);
									Ext.getCmp('tb_Formularios').setActiveTab(5);
								//	alert(val)
		}
	else if (val=='6')
		{
								
									Ext.getCmp('tab_Financiero').setDisabled(true);
									Ext.getCmp('tab_Laboral').setDisabled(false);
									Ext.getCmp('tb_Formularios').setActiveTab(6);
		}//tab_Audiovisuales	
	else if (val=='7')
		{
								
									Ext.getCmp('tab_Audiovisuales').setDisabled(true);
									Ext.getCmp('tab_Financiero').setDisabled(false);
									Ext.getCmp('tb_Formularios').setActiveTab(7);
		}
		else if (val=='8')
		{
								
									Ext.getCmp('tab_Audiovisuales').setDisabled(false);
									Ext.getCmp('tabComportamiento').setDisabled(true);
									Ext.getCmp('tb_Formularios').setActiveTab(8);
		}	
		}; 	
		
		
function fn_EnvioTabs(Dato){
	document.getElementById('tab').value=Dato;
	var Csc= document.getElementById('Csc').value;
	var Cedula = document.getElementById('Id_C').value;
	var Login = document.getElementById('csc_Login').value;
	//alert(Dato)
        
		if (Cedula == ''|| Login =='' || Csc=='')
			{
				Ext.Msg.alert('Error','Error de session Intentelo nuevamente');
				
				return false;
			}
			//alert(Dato)
	tabs.form.submit({
                success:function(){
                    alert("EnvioOK"+Dato);
			//alert(Dato)
			Ext.Msg.alert("Confirmacion","Creacion Exitosa desea continuar", function (btn, text){
						if (btn=='ok')
							{
								if(Dato=='1')
									{
										
									Ext.getCmp('Info_Vivienda').setDisabled(false);
									Ext.getCmp('Datos_Basicos').setDisabled(true);
									var Csc = document.getElementById('Csc').value;
									ds_Tab2.load({waitMsg:'Consultando', params:{Csc:Csc}});
									Ext.getCmp('tb_Formularios').setActiveTab(2);
									var Csc = document.getElementById('Csc').value;
									document.getElementById('Upload3').src='UploadVivienda.php?csc='+Csc;
									
									}
								else if (Dato=='2')
									{
									Ext.getCmp('tabdocs').setDisabled(false);
									Ext.getCmp('Info_Vivienda').setDisabled(true);
									Ext.getCmp('tb_Formularios').setActiveTab(3);
									Ext.getCmp('field').expand(true);
									var Csc = document.getElementById('Csc').value;
									ds_Tab3.load({waitMsg:'Consultando', params:{Csc:Csc}});
													Ext.getCmp('field').expand(true);
													Ext.getCmp('Runt').expand(true);
													Ext.getCmp('fieldvehiculo').expand(true);
													Ext.getCmp('fieldvehiculo').expand(true);
													Ext.getCmp('fieldMoto').expand(true);
													Ext.getCmp('fieldLibreta').expand(true);
													Ext.getCmp('fieldArma').expand(true);
													Ext.getCmp('fieldAntecedentes').expand(true);
													Ext.getCmp('fieldVecindad').expand(true);	
													Ext.getCmp('fieldPasadoJudicial').expand(true);	
													Ext.getCmp('fieldPasaporte').expand(true);
													Ext.getCmp('fieldVisa').expand(true);
													Ext.getCmp('fieldAntecedentesJu').expand(true);
													Ext.getCmp('fieldDatacredito').expand(true);
													Ext.getCmp('fieldClinton').expand(true);
											
									}
								else if (Dato=='3')
									{
									Ext.getCmp('tabdocs').setDisabled(true);
									Ext.getCmp('Info_Academica').setDisabled(false);
									Ext.getCmp('tb_Formularios').setActiveTab(4);
									var Csc = document.getElementById('Csc').value;
									ds_Tab4.load({waitMsg:'Consultando', params:{Csc:Csc}});
									
									
									
									}
								else if (Dato=='4')
									{
										//Info_Academica
									Ext.getCmp('Info_Academica').setDisabled(true);
									Ext.getCmp('Info_Familiar').setDisabled(false);
									Ext.getCmp('tb_Formularios').setActiveTab(5);
									Ext.getCmp('fieldEmpresa').expand(true);
									Ext.getCmp('fieldAmigos').expand(true);
									Ext.getCmp('fieldReferencias').expand(true);
									var Csc = document.getElementById('Csc').value;
									ds_Tab5.load({waitMsg:'Consultando', params:{Csc:Csc}});
									}
								else if (Dato=='5')////tab_Laboral
									{
									Ext.getCmp('Info_Familiar').setDisabled(true);
									Ext.getCmp('tab_Laboral').setDisabled(false);
									Ext.getCmp('tb_Formularios').setActiveTab(6);
									var Csc = document.getElementById('Csc').value;
									ds_Tab6.load({waitMsg:'Consultando', params:{Csc:Csc}});
									}	
							else if (Dato=='6')////tab_Financiero
									{
									Ext.getCmp('tab_Financiero').setDisabled(false);
									Ext.getCmp('tab_Laboral').setDisabled(true);
									Ext.getCmp('tb_Formularios').setActiveTab(7);
									var Csc = document.getElementById('Csc').value;
									ds_Tab7.load({waitMsg:'Consultando', params:{Csc:Csc}});
								}
							else if (Dato=='7')////tab_Financiero
									{
									Ext.getCmp('tab_Audiovisuales').setDisabled(false);
									Ext.getCmp('tab_Financiero').setDisabled(true);
									Ext.getCmp('tb_Formularios').setActiveTab(8);
									var Csc = document.getElementById('Csc').value;
									ds_Tab8.load({waitMsg:'Consultando', params:{Csc:Csc}});
								}
							else if (Dato=='8')////tab_Mediso Audiovisules
									{
									Ext.getCmp('tabComportamiento').setDisabled(false);
									Ext.getCmp('tab_Audiovisuales').setDisabled(true);//tabComportamiento
									Ext.getCmp('tb_Formularios').setActiveTab(9);
									var Csc = document.getElementById('Csc').value;
									ds_Tab9.load({waitMsg:'Consultando', params:{Csc:Csc}});
								}	
							else if (Dato=='9')////tab_Mediso Audiovisules
									{
									 var Csc = document.getElementById('Csc').value;
														ds_Tab9.load({waitMsg:'Consultando', params:{Csc:Csc}});
									//Ext.getCmp('tabComportamiento').setDisabled(false);
									//Ext.getCmp('tab_Audiovisuales').setDisabled(true);//tabComportamiento
									//Ext.getCmp('tb_Formularios').setActiveTab(9);
								}																				
							}//tab_Financiero//tab_Audiovisuales
				});
				},
				failure:function()
					{
						Ext.Msg.alert("Error", 'Valide su informacion e intentelo nuevamente', function (btn, text){
							if (btn=='ok')
								{
								
								}
							
							})	
					}
		});
	}
	
////////////////////////
//	Onload Tabs****************
///////////////////

ds_cargueInicial.on('load',function(store){
	var cantidad = ds_cargueInicial.getTotalCount();
	var Tel_Fijo = ds_cargueInicial.getAt(0).data.Tel_Fijo;
	var Tel_Celular = ds_cargueInicial.getAt(0).data.Tel_Celular;
	var Tel_Celular2 = ds_cargueInicial.getAt(0).data.Tel_Celular2;
	
	document.getElementById('TelefonoTab1').value=Tel_Fijo;
	document.getElementById('Celular1').value=Tel_Celular;
	document.getElementById('Celular2').value=Tel_Celular2;
	
	});

ds_Tab1.on('load', function(store){
	var cantidad = ds_Tab1.getTotalCount();
	var F_Nacimiento = ds_Tab1.getAt(0).data.Fecha_Nacimiento;
	var Ciudad = ds_Tab1.getAt(0).data.Ciudad;
	var Telefono = ds_Tab1.getAt(0).data.Telefono;
	var Celular1 = ds_Tab1.getAt(0).data.Celular1;
	var Celular2 = ds_Tab1.getAt(0).data.Celular2;
	var Grupo_Sanguineo = ds_Tab1.getAt(0).data.Grupo_Sanguineo;
	var Departamento = ds_Tab1.getAt(0).data.Departamento;
	var Municipio = ds_Tab1.getAt(0).data.Municipio;
	var Mail = ds_Tab1.getAt(0).data.Mail;
	var Observacion = ds_Tab1.getAt(0).data.Observacion;
	
		document.getElementById('F_Nacimiento').value=F_Nacimiento;
		document.getElementById('lst_ciudad').value=Ciudad;
		document.getElementById('TelefonoTab1').value=Telefono;
		document.getElementById('Celular1').value=Celular1;
		document.getElementById('lst_gruposanguineo').value=Grupo_Sanguineo;
		document.getElementById('lst_departamento').value=Departamento;
		document.getElementById('txt_Municipio').value=Municipio;
		document.getElementById('Celular2').value=Celular2;
		document.getElementById('txt_Mail').value=Mail;
		document.getElementById('ObTab1').value=Observacion;
		
	});


ds_Tab2.on('load', function(store){
		var cantidad = ds_Tab2.getTotalCount();
		var Direccion = ds_Tab2.getAt(0).data.Direccion;
		if (Direccion!=''){
		var Ciudad = ds_Tab2.getAt(0).data.Ciudad;
		var Barrio_Dsc = ds_Tab2.getAt(0).data.Barrio_Dsc;
		var Estrato = ds_Tab2.getAt(0).data.Estrato;
		var Departamento = ds_Tab2.getAt(0).data.Departamento;
		var Municipio_Dsc = ds_Tab2.getAt(0).data.Municipio_Dsc;
		var T_inmueble = ds_Tab2.getAt(0).data.T_inmueble;
		var Tipo_Inmueble = ds_Tab2.getAt(0).data.Tipo_Inmueble;
		var Arrendador = ds_Tab2.getAt(0).data.Arrendador;
		var Canon = ds_Tab2.getAt(0).data.Canon;
		var Nombre = ds_Tab2.getAt(0).data.Nombre;
		var Distribucion = ds_Tab2.getAt(0).data.Distribucion;
		var Entorno = ds_Tab2.getAt(0).data.Entorno;
		var Caracteristicas = ds_Tab2.getAt(0).data.Caracteristicas;
		
		//var Georeferenciacion = ds_Tab2.getAt(0).data.Georeferenciacion;
		//var Foto = ds_Tab2.getAt(0).data.Foto;
		var Observaciones = ds_Tab2.getAt(0).data.Observaciones;
		document.getElementById('txt_DirTab2').value=Direccion;
		document.getElementById('lst_ciudad2').value=Ciudad;
		document.getElementById('txt_BarrioTab2').value=Barrio_Dsc;
		document.getElementById('lst_EstratoTab2').value=Estrato;
		document.getElementById('lst_departamento2').value=Departamento;
		document.getElementById('txt_MunicipioTab2').value=Municipio_Dsc;
		document.getElementById('lst_InmuebleTab2').value=T_inmueble;
		if(Tipo_Inmueble!=''){document.getElementById('lst_InmueblesTab2').value=Tipo_Inmueble;}
		
		document.getElementById('txt_ReferenciasTab2').value=Distribucion;
		document.getElementById('txt_DistribucionTab2').value=Entorno;
		document.getElementById('txt_caracteristicasTab2').value=Caracteristicas;
		document.getElementById('ObservacionesTab2').value=Observaciones;
		if (Tipo_Inmueble=='Arriendo')
			{
				Ext.getCmp('panel1').expand(true);	
				document.getElementById('Arrendador_V').value=Arrendador;
				document.getElementById('Canon_V').value=Canon;
			}
		else if(Tipo_Inmueble=='Familiar')
			{
				Ext.getCmp('panel2').expand(true);	
				document.getElementById('Dueno_V').value=Nombre;
			}	
	}		
});	
ds_Tab3.on('load', function(store){
		var cantidad = ds_Tab3.getTotalCount();
		var count = document.getElementById('Contador_documentos').value;
		var Num_Licencia = ds_Tab3.getAt(0).data.Num_Licencia;//num_Tab3//field//
		var Categoria = ds_Tab3.getAt(0).data.Categoria;
		var PendientesL = ds_Tab3.getAt(0).data.PendientesL; 
		var Observaciones = ds_Tab3.getAt(0).data.Observaciones; 
		var RuntObservaciones = ds_Tab3.getAt(0).data.RuntObservaciones; 
		var Vehiculo1 = ds_Tab3.getAt(0).data.Vehiculo1;
		var Placas1 = ds_Tab3.getAt(0).data.Placas1;
		var Vehiculo2 = ds_Tab3.getAt(0).data.Vehiculo2;
		var Placas2 = ds_Tab3.getAt(0).data.Placas2;
		var Vehiculo3 = ds_Tab3.getAt(0).data.Vehiculo3;
		var Placas3 = ds_Tab3.getAt(0).data.Placas3;
		var PendientesV = ds_Tab3.getAt(0).data.PendientesV;
		var ObservacionesV = ds_Tab3.getAt(0).data.ObservacionesV;
		var Moto1 = ds_Tab3.getAt(0).data.Moto1;
		var PlacaM1 = ds_Tab3.getAt(0).data.PlacaM1;
		var Moto2 = ds_Tab3.getAt(0).data.Moto2;
		var PlacaM2 = ds_Tab3.getAt(0).data.PlacaM2;
		var PendienteM = ds_Tab3.getAt(0).data.PendienteM;
		var ObservacionesM = ds_Tab3.getAt(0).data.ObservacionesM;
		var LibretaCat = ds_Tab3.getAt(0).data.LibretaCat;
		var LibretaCod = ds_Tab3.getAt(0).data.LibretaCod;
		var Num_Libreta = ds_Tab3.getAt(0).data.Num_Libreta;
		var Distrito = ds_Tab3.getAt(0).data.Distrito;
		var SalvoconductoA = ds_Tab3.getAt(0).data.SalvoconductoA;
		var TipoA = ds_Tab3.getAt(0).data.TipoA;
		var MarcaA = ds_Tab3.getAt(0).data.MarcaA;
		var CalibreA = ds_Tab3.getAt(0).data.CalibreA;
		var SerieNum = ds_Tab3.getAt(0).data.SerieNum;
		var ReporteD = ds_Tab3.getAt(0).data.ReporteD; 
		var CertificadoVecindad = ds_Tab3.getAt(0).data.CertificadoVecindad; 
		var CodPasado = ds_Tab3.getAt(0).data.CodPasado; 
		var NumPasado = ds_Tab3.getAt(0).data.NumPasado; 
		var VencePasado = ds_Tab3.getAt(0).data.VencePasado;
		var Pasaporte = ds_Tab3.getAt(0).data.Pasaporte;
		var VencePasaporte = ds_Tab3.getAt(0).data.VencePasaporte;
		var NumVisa = ds_Tab3.getAt(0).data.NumVisa;
		var VenceVisa = ds_Tab3.getAt(0).data.VenceVisa;
		var Pais = ds_Tab3.getAt(0).data.Pais;
		var Datacredito = ds_Tab3.getAt(0).data.Datacredito;
		var Antecedentes = ds_Tab3.getAt(0).data.Antecedentes;
		var ObTab3 = ds_Tab3.getAt(0).data.ObTab3;
		var Clinton = ds_Tab3.getAt(0).data.Clinton;
											//ABRIENDO LOS FIELSET TODOS MENO EL ULTIMO PARA ENVIAR EL DS
													Ext.getCmp('fieldAntecedentes').expand(true);
													Ext.getCmp('fieldVecindad').expand(true);	
													Ext.getCmp('fieldPasadoJudicial').expand(true);	
													Ext.getCmp('fieldPasaporte').expand(true);
													Ext.getCmp('fieldVisa').expand(true);
													Ext.getCmp('fieldAntecedentesJu').expand(true);
													Ext.getCmp('fieldDatacredito').expand(true);
													Ext.getCmp('field').expand(true);
													Ext.getCmp('Runt').expand(true);
													Ext.getCmp('fieldvehiculo').expand(true);
													Ext.getCmp('fieldvehiculo').expand(true);
													Ext.getCmp('fieldMoto').expand(true);
													Ext.getCmp('fieldLibreta').expand(true);
													Ext.getCmp('fieldArma').expand(true);

													
													Ext.getCmp('fieldClinton').expand(true);
							
												//FIN ABRIENDO	
		if (count==2)
			{
				document.getElementById('num_licencia').value=Num_Licencia;
				document.getElementById('num_categoria').value=Categoria;
				document.getElementById('lst_licencia').value=PendientesL;
				document.getElementById('ObLicencia').value=Observaciones;
				document.getElementById('ObRunt').value=RuntObservaciones;
				document.getElementById('txt_vehiculo1').value=Vehiculo1;
				document.getElementById('txt_placas1').value=Placas1;
				document.getElementById('txt_vehiculo2').value=Vehiculo2;
				document.getElementById('txt_placas2').value=Placas2;
				document.getElementById('txt_vehiculo3').value=Vehiculo3;
				document.getElementById('txt_placas3').value=Placas3;
				document.getElementById('lst_vehiculo').value=PendientesV;
				document.getElementById('ObVehiculo').value=ObservacionesV;
				document.getElementById('txt_moto1').value=Moto1;
				document.getElementById('num_moto1').value=PlacaM1;
				document.getElementById('txt_moto2').value=Moto2;
				document.getElementById('num_moto2').value=PlacaM2;
				document.getElementById('lst_moto').value=PendienteM;
				document.getElementById('ObMoto').value=ObservacionesM;
				document.getElementById('lst_libreta').value=LibretaCat;
				document.getElementById('lst_conducta').value=LibretaCod;
				document.getElementById('num_libreta').value=Num_Libreta;
				document.getElementById('num_distrito').value=Distrito;
				document.getElementById('txt_salvo').value=SalvoconductoA;
				document.getElementById('lst_salvo').value=TipoA;
				document.getElementById('num_marca').value=MarcaA;
				document.getElementById('num_calibre').value=CalibreA;
				document.getElementById('num_serial').value=SerieNum;
				document.getElementById('txt_antecedentes').value=ReporteD;
				document.getElementById('txt_vecindad').value=CertificadoVecindad;//CertificadoVecindad
				document.getElementById('txt_verificacion').value=CodPasado;
				document.getElementById('num_pasado').value=NumPasado;
				var VencePasadoS
				VencePasadoS =	VencePasado.split("-");
				document.getElementById('date_pasado').value=VencePasadoS[2]+"/"+VencePasadoS[1]+"/"+VencePasadoS[0];
				document.getElementById('num_pasaporte').value=Pasaporte;
				var VencePasaporteS
				VencePasaporteS = VencePasaporte.split("-")
				document.getElementById('date_pasaporte').value=VencePasaporteS[2]+"/"+VencePasaporteS[1]+"/"+VencePasaporteS[0];
				document.getElementById('num_visa').value=NumVisa;
				var VenceVisaS
				VenceVisaS=VenceVisa.split("-");
				document.getElementById('date_visa').value=VenceVisaS[2]+"/"+VenceVisaS[1]+"/"+VenceVisaS[0];
				document.getElementById('lst_Pais').value=Pais;
				document.getElementById('Judiciales').value=Antecedentes;
				document.getElementById('txt_datacredito').value=Datacredito;
				document.getElementById('txt_clinton').value=Clinton;
				document.getElementById('Ob3').value=ObTab3;
			}
		
			 count++
			 document.getElementById('Contador_documentos').value=count;										
//													
		
				

//						
						
						
						
		
		
				
});
ds_Tab4.on('load', function(store){
		var cantidad = ds_Tab4.getTotalCount();
		var Grid1 = ds_Tab4.getAt(0).data.Grid1;
		var grid2 = ds_Tab4.getAt(0).data.Grid2;
		var grid3 = ds_Tab4.getAt(0).data.Grid3;
		var DocAdult = ds_Tab4.getAt(0).data.DocAdult;
		var DocFalso = ds_Tab4.getAt(0).data.DocFalso;
		var Observaciones = ds_Tab4.getAt(0).data.Observaciones;
		var grid1 = document.getElementById('Send_Grid1').value;
		if (grid1==''){
		document.getElementById('Send_Grid1').value=Grid1;
		var Grid1Split = Grid1.split('-');
		var cont = Grid1Split[0].split('|');		
		var cont = parseInt(cont[0]);
		cont+1
		document.getElementById('Cont').value=cont+1;
		var i = 0;
		while(i <= cont){
		var Grid1Split2 = Grid1Split[i].split('|');		
		var	defaultData = {
		Csc: Grid1Split2[0],
		Nivel:	Grid1Split2[1],
		Titulo: Grid1Split2[2],
		Institucion:  Grid1Split2[3],
		Otra:	Grid1Split2[4],
		Pais: Grid1Split2[5],
		Ingreso: Grid1Split2[6],
		Estado: Grid1Split2[7],
		Finalizacion: Grid1Split2[8]
		};
		var r = new storeEduFormal.recordType(defaultData, ++recId);
				storeEduFormal.insert(0, r);	
		i++;
		}
	}
		var grid2 = ds_Tab4.getAt(0).data.Grid2;
		var Grid2Split = grid2.split("-");	
			var Send_Grid2 =	document.getElementById('Send_Grid2').value;//=Grid2;
				if (Send_Grid2=='')
				{
				for(i=0;i<=6;i++)
						{
							if(Grid2Split[i]!='')
							{
									var contenGrid2 = Grid2Split[i].split("|");
									var defaultData = {
																	Csc: contenGrid2[0],
																	Idioma: contenGrid2[1],
																	Dominio: contenGrid2[2],
																	Donde: contenGrid2[3]
                                                       				}
									 var r = new storeNoFormal.recordType(defaultData, ++recId);
										storeNoFormal.insert(0, r);
										document.getElementById('Cont1').value=i;	
								document.getElementById('Send_Grid2').value=grid2;		
							}else{break}
								
						}
						
				}
		var grid3 = ds_Tab4.getAt(0).data.Grid3;
		if(grid3!=''){
		var Grid3Split1 = grid3.split('-');
		var send_Grid3 = 	document.getElementById('send_Grid3').value;
					if (send_Grid3 == '')
						{
							document.getElementById('send_Grid3').value=grid3;
							for(j=0;j<=10;j++)
								{
								var Grid3Split2 =	Grid3Split1[j].split("|");
									if (Grid3Split2!='')
									{
									 var defaultData = {
													    Csc: Grid3Split2[0],
														Tipo: Grid3Split2[1],
														Otro: Grid3Split2[2],
														Pais: Grid3Split2[3],
														Departamento: Grid3Split2[4],
														Ciudad: Grid3Split2[5],
														Titulo: Grid3Split2[6],
														Institucion: Grid3Split2[7],
														Area: Grid3Split2[8],
														Ingreso: Grid3Split2[9],
														Estado: Grid3Split2[10],
														Final: Grid3Split2[11]

														};
														
                                                        var r = new storeEduNoFormal.recordType(defaultData, ++recId);
															storeEduNoFormal.insert(0, r);
												document.getElementById('Csc_id').value=j;			
									}
									
								}
								
						}
					//alert(DocFalso)	
		}
					document.getElementById('doc_Falso').value=DocFalso;
					
					document.getElementById('doc_Adulterado').value=DocAdult;	
					document.getElementById('Ob4').value=Observaciones;
		
			
		
});
ds_Tab5.on('load', function(store){
		var cantidad = ds_Tab5.getTotalCount();
		var Nombres_Familiares = ds_Tab5.getAt(0).data.Nombres_Familiares;
		var Apellidos_Familiares = ds_Tab5.getAt(0).data.Apellidos_Familiares;
		var Cargo_Familiares = ds_Tab5.getAt(0).data.Cargo_Familiares;
		var Telefono_Familiares = ds_Tab5.getAt(0).data.Telefono_Familiares;
		var Nombre_Amigo = ds_Tab5.getAt(0).data.Nombre_Amigo;
		var Apellido_Amigo = ds_Tab5.getAt(0).data.Apellido_Amigo;
		var Cargo_Amigo = ds_Tab5.getAt(0).data.Cargo_Amigo;
		var Telefono_Amigo = ds_Tab5.getAt(0).data.Telefono_Amigo;
		var Grid_Referencias = ds_Tab5.getAt(0).data.Grid_Referencias;
		var Estado_Civil = ds_Tab5.getAt(0).data.Estado_Civil;
		var Nombre_Conyuge = ds_Tab5.getAt(0).data.Nombre_Conyuge;
		var Apellidos_Conyuge = ds_Tab5.getAt(0).data.Apellidos_Conyuge;
		var Tipo_Identificacion = ds_Tab5.getAt(0).data.Tipo_Identificacion;
		var Numero_Identificacion = ds_Tab5.getAt(0).data.Numero_Identificacion;
		var Telefono_Conyuge = ds_Tab5.getAt(0).data.Telefono_Conyuge;
		var Celular_Conyuge = ds_Tab5.getAt(0).data.Celular_Conyuge;
		var Mail_Conyuge = ds_Tab5.getAt(0).data.Mail_Conyuge;
		var Empresa_Conyuge = ds_Tab5.getAt(0).data.Empresa_Conyuge;
		var Tel_TrabajoConyu = ds_Tab5.getAt(0).data.Tel_TrabajoConyu;
		var Actividad_Conyuge = ds_Tab5.getAt(0).data.Actividad_Conyuge;
		var Grid_Hijos = ds_Tab5.getAt(0).data.Grid_Hijos;
		var Nombre_Padre = ds_Tab5.getAt(0).data.Nombre_Padre;//
		var Apellido_Padre = ds_Tab5.getAt(0).data.Apellido_Padre;
		var Pais_P = ds_Tab5.getAt(0).data.Pais_P;
		var Departamento_Csc = ds_Tab5.getAt(0).data.Departamento_Csc;
		var Ciudad_Csc = ds_Tab5.getAt(0).data.Ciudad_Csc;
		var Telefono_Padre = ds_Tab5.getAt(0).data.Telefono_Padre;
		var Celular_Padre = ds_Tab5.getAt(0).data.Celular_Padre;
		var Actividad = ds_Tab5.getAt(0).data.Actividad;
		var Empresa_Padre = ds_Tab5.getAt(0).data.Empresa_Padre;
		var Cargo_Padre = ds_Tab5.getAt(0).data.Cargo_Padre;
		var Tel_TraPadre = ds_Tab5.getAt(0).data.Tel_TraPadre;
		var Nombre_Madre = ds_Tab5.getAt(0).data.Nombre_Madre;
		var apellidos_Madre = ds_Tab5.getAt(0).data.apellidos_Madre;
		var Pais_M = ds_Tab5.getAt(0).data.Pais_M;
		var apellidos_Madre = ds_Tab5.getAt(0).data.apellidos_Madre;
		var Departamento_CscM = ds_Tab5.getAt(0).data.Departamento_CscM;
		var Ciudad_CscM = ds_Tab5.getAt(0).data.Ciudad_CscM;
		var Tel_Madre = ds_Tab5.getAt(0).data.Tel_Madre;
		var Cel_Madre = ds_Tab5.getAt(0).data.Cel_Madre;
		var Actividad_M = ds_Tab5.getAt(0).data.Actividad_M;
		var Empresa_Madre = ds_Tab5.getAt(0).data.Empresa_Madre;
		var Cargo_Madre = ds_Tab5.getAt(0).data.Cargo_Madre;
		var Tel_TraMadre = ds_Tab5.getAt(0).data.Tel_TraMadre;
		var Grid_Hermanos = ds_Tab5.getAt(0).data.Grid_Hermanos;
		
		document.getElementById('txt_NombresTab5').value=Nombres_Familiares;
		document.getElementById('txt_ApellidosTab5').value=Apellidos_Familiares;
		document.getElementById('txt_CargoTab5').value=Cargo_Familiares;
		document.getElementById('txt_TelTab5').value=Telefono_Familiares;
		document.getElementById('txt_NombresATab5').value=Nombre_Amigo;
		document.getElementById('txt_ApellidosATab5').value=Apellido_Amigo;
		document.getElementById('txt_CargoATab5').value=Cargo_Amigo;
		document.getElementById('txt_TelATab5').value=Telefono_Amigo;
		//grid referencias
			var Grid_ReferenciasS1 = Grid_Referencias.split("-");	//alert(Grid_Referencias)
			var Grid_Ref = document.getElementById('Grid_Ref').value;
			if (Grid_Ref==0){	
				document.getElementById('Grid_Ref').value=Grid_Referencias;
				for (i=0;i<=10;i++)
					{
					var Grid_ReferenciasS2=Grid_ReferenciasS1[i].split("|");
						if(Grid_ReferenciasS2[0]!='')
							{
							var defaultData = 
									{
									Csc: Grid_ReferenciasS2[0],
									Nombres: Grid_ReferenciasS2[1],
									Empresa: Grid_ReferenciasS2[2],
									Cargo: Grid_ReferenciasS2[3],
									Telefonos: Grid_ReferenciasS2[4],
									Parentesco: Grid_ReferenciasS2[5]
									};
									var r = new ds_Referencias.recordType(defaultData, ++recId);
									ds_Referencias.insert(0, r);
						document.getElementById('Csc_Ref').value=i;
							}else{break} 
					}
				
			}
			//fin if
		//fin referencia
		
		document.getElementById('lst_estadocivil').value=Estado_Civil;
			if(Estado_Civil=='Casado' || Estado_Civil=='Unión libre')
				{
					Ext.getCmp('panel12').expand(true);
					document.getElementById('txt_NameConyuge').value=Nombre_Conyuge;
					document.getElementById('txt_ApellidosConyuge').value=Apellidos_Conyuge;
					document.getElementById('txt_TipoIdentificacionConyuge').value=Tipo_Identificacion;
					document.getElementById('txt_NumeroIdentificacionConyuge').value=Numero_Identificacion;
					document.getElementById('txt_TelConyuge').value=Telefono_Conyuge;
					document.getElementById('txt_CelConyuge').value=Celular_Conyuge;
					document.getElementById('txt_MailConyuge').value=Mail_Conyuge;
					document.getElementById('txt_EmpresaConyuge').value=Empresa_Conyuge;
					document.getElementById('txt_TelTrabConyuge').value=Tel_TrabajoConyu;
					document.getElementById('txt_actividadTraConyuge').value=Actividad_Conyuge;
				}
		var Grid_HijosS1 =Grid_Hijos.split("-");
			var send_Hijos = document.getElementById('send_Hijos').value;
			if(send_Hijos==''){
			for(l=0;l<=10;l++)
			{
					var Grid_HijosS2 = Grid_HijosS1[l].split("|");
					document.getElementById('send_Hijos').value=Grid_Hijos;
					if(Grid_HijosS2[0]!='')
					{
						var defaultData = {
							Csc: Grid_HijosS2[0],
							Nombres: Grid_HijosS2[1],
							Apellidos: Grid_HijosS2[2],
							Nacimiento: Grid_HijosS2[3],
							Mayor: Grid_HijosS2[4],//,
							Empresa: Grid_HijosS2[5],
							Celular: Grid_HijosS2[6]
							};
							var r = new ds_Hijos.recordType(defaultData, ++recId);
								ds_Hijos.insert(0, r);
					document.getElementById('Csc_Hijos').value=l;	
					}else{break}
				
			}
		}
		if(Nombre_Padre!='')
		{
		document.getElementById('txt_NombrePadre').value=Nombre_Padre;
		document.getElementById('txt_ApellidosPadre').value=Apellido_Padre;
		document.getElementById('pais_Padre').value=Pais_P;
		document.getElementById('lst_peptoPadre').value=Departamento_Csc;
		document.getElementById('lst_ciudadPadre').value=Ciudad_Csc;
		document.getElementById('txt_ResidenciaPadre').value=Telefono_Padre;
		document.getElementById('txt_CelPadre').value=Celular_Padre;
		document.getElementById('lst_actividadPadre').value=Actividad;
		}
		if(Nombre_Madre!='')
		{
		document.getElementById('nombre_Madre').value=Nombre_Madre;
		document.getElementById('name_Apellidos').value=apellidos_Madre;
		document.getElementById('lst_PaiseMadre').value=Pais_M;
		document.getElementById('lst_deptoMadre').value=Departamento_CscM;
		document.getElementById('lst_ciudadMadre').value=Ciudad_CscM;
		document.getElementById('tel_Madre').value=Tel_Madre;
		document.getElementById('cel_Madre').value=Cel_Madre;
		document.getElementById('lst_acMadre').value=Actividad_M;
		}
		var Grid_Hermanos1 = Grid_Hermanos.split("-");
		var send_Hermanos = document.getElementById('send_Hermanos').value;
		if(send_Hermanos=='' || send_Hermanos==0){	
			document.getElementById('send_Hermanos').value=Grid_Hermanos;
			for(k=0;k<=10;k++)
			{
				var Grid_Hermanos2= Grid_Hermanos1[k].split("|");
					if(Grid_Hermanos2[0]!='')
					{
						var defaultData = {
						Csc: Grid_Hermanos2[0],
						Nombres: Grid_Hermanos2[1],
						Apellidos: Grid_Hermanos2[2],
						Pais: Grid_Hermanos2[3],
						Telefono: Grid_Hermanos2[4],
						Celular: Grid_Hermanos2[5],
						Actividad: Grid_Hermanos2[6],
						Empresa: Grid_Hermanos2[7],
						Cargo: Grid_Hermanos2[8]
						};
						 
						 var r = new ds_Hermanos.recordType(defaultData, ++recId);
						 ds_Hermanos.insert(0, r);
						document.getElementById('Csc_Hermano').value=k; 
					}else{break}	
			}
		}
//Csc_Lab//Sendgrid_Laboral
});



ds_Tab6.on('load', function(store){
		var cantidad = ds_Tab6.getTotalCount();
		var Observaciones = ds_Tab6.getAt(0).data.Observaciones;
		document.getElementById('obTab6').value=Observaciones;
		var Grid_Laboral   = ds_Tab6.getAt(0).data.Grid_Laboral;
		var grid =	document.getElementById('Sendgrid_Laboral').value;
		if(grid=='' || grid==0){
		document.getElementById('Sendgrid_Laboral').value=Grid_Laboral;
		var Grid_LabSplit=Grid_Laboral.split('||');
		var i=0;
		var Grid_Lab2= Grid_LabSplit[0].split('|');
			var csc = parseInt(Grid_Lab2[0])
				csc=csc+1;
			document.getElementById('Csc_Lab').value=csc;
			while(i<csc)
				{
					var Grid_Lab2= Grid_LabSplit[i].split('|');
						var defaultData = {
						Csc: Grid_Lab2[0],
						Empresa: Grid_Lab2[1],
						Departamento: Grid_Lab2[2],
						Ciudad: Grid_Lab2[3],
						Direccion: Grid_Lab2[4],
						Razon_Social: Grid_Lab2[5],
						Telefono: Grid_Lab2[6],
						Cargo: Grid_Lab2[7],
						Anos: Grid_Lab2[8],
						Retiro: Grid_Lab2[9]//Sendgrid_Laboral
						};
					   var r = new ds_Laboral.recordType(defaultData, ++recId);
							ds_Laboral.insert(0, r);
						i++
						}
	}



//Csc_Lab//Sendgrid_Laboral
});


ds_Tab7.on('load', function(store){
		var cantidad = ds_Tab7.getTotalCount();
		var Salario = ds_Tab7.getAt(0).data.Salario;
		var Pension = ds_Tab7.getAt(0).data.Pension;
		var Arriendos = ds_Tab7.getAt(0).data.Arriendos;
		var Honorarios = ds_Tab7.getAt(0).data.Honorarios;
		var Otros = ds_Tab7.getAt(0).data.Otros;
		var EgresoA = ds_Tab7.getAt(0).data.EgresoA;
		var EgresoB = ds_Tab7.getAt(0).data.EgresoB;
		var EgresoC = ds_Tab7.getAt(0).data.EgresoC;
		var EgresoD = ds_Tab7.getAt(0).data.EgresoD;
		var EgresoE = ds_Tab7.getAt(0).data.EgresoE;
		var TotalIngreso = ds_Tab7.getAt(0).data.TotalIngreso;
		var TotalEgreso = ds_Tab7.getAt(0).data.TotalEgreso;
		var RetiroTab7 = ds_Tab7.getAt(0).data.RetiroTab7;
		var ObservacionesTab7 = ds_Tab7.getAt(0).data.ObservacionesTab7;
		 
	document.getElementById('salario').value=Salario;
	document.getElementById('pension').value=Pension;
	document.getElementById('arriendos').value=Arriendos;
	document.getElementById('honorarios').value=Honorarios;
	document.getElementById('otros').value=Otros;
	document.getElementById('egresoa').value=EgresoA;
	document.getElementById('egresob').value=EgresoB;
	document.getElementById('egresoc').value=EgresoC;
	document.getElementById('egresod').value=EgresoD;
 	document.getElementById('egresoe').value=EgresoE;
	document.getElementById('Tingreso').value=TotalIngreso;
	document.getElementById('Tegreso').value=TotalEgreso;
	document.getElementById('RetiroTab7').value=RetiroTab7;
	document.getElementById('ObservacionesTab7').value=ObservacionesTab7;//id: 'ObservacionesTab7',//id:	'RetiroTab7',
	
});
ds_Tab8.on('load', function (store){
	var cantidad = ds_Tab8.getTotalCount();
	var Observaciones = ds_Tab8.getAt(0).data.Observaciones;
		document.getElementById('ObUpload').value=Observaciones;
	
	});
	
ds_Tab9.on('load', function(store){
		var cantidad = ds_Tab9.getTotalCount();
		var Fuma = ds_Tab9.getAt(0).data.Fuma;
		var Medicamentos = ds_Tab9.getAt(0).data.Medicamentos;
		var Actitud = ds_Tab9.getAt(0).data.Actitud;
		var Alimentos = ds_Tab9.getAt(0).data.Alimentos;
		var Analisis = ds_Tab9.getAt(0).data.Analisis;
		var ObActitud = ds_Tab9.getAt(0).data.ObActitud;
		var Concepto = ds_Tab9.getAt(0).data.Concepto;
		var ObConcepto = ds_Tab9.getAt(0).data.ObConcepto;
			document.getElementById('lst_fuma').value=Fuma;
			document.getElementById('Medicamentos_Tab9').value=Medicamentos;
			document.getElementById('Alimentos_tab9').value=Alimentos;
			document.getElementById('AnalisisTab9').value=Analisis;
			document.getElementById('lst_actitud').value=Actitud;
			document.getElementById('ObActitudTab9').value=ObActitud;
			document.getElementById('lst_concepto').value=Concepto;
			document.getElementById('ObConceptoTab9').value=ObConcepto;

	
});


//fin on load Tabs**************
////////////////////////////////

function fn_ReadGrid(Grid){
	if (Grid=='0')
		{
		var cantidad = Ext.getCmp('grid_EduFormal').getStore().getCount();
		var csc=0;
		var Grid1=0;
		for(i=0;i<cantidad; i++)
			{
			record=Ext.getCmp('grid_EduFormal').getStore().getAt(i);
			var Dato = Ext.getCmp('grid_EduFormal').getStore().getAt(i).data;
var Grid1=Grid1+Dato.Csc+"|"+Dato.Nivel+"|"+Dato.Titulo+"|"+Dato.Institucion+"|"+Dato.Otra+"|"+Dato.Pais+"|"+Dato.Ingreso+"|"+Dato.Estado+"|"+Dato.Finalizacion+"-";
			document.getElementById('Send_Grid1').value=Grid1;	
			}
		}
	else if (Grid=='1')
		{
		var cantidad = Ext.getCmp('grid_IdiomasEduNo').getStore().getCount();
		var csc=0;
		var Grid2=0;
		//alert(cantidad)
		for(i=0;i<cantidad; i++)
			{
			record=Ext.getCmp('grid_IdiomasEduNo').getStore().getAt(i);
			var Dato = Ext.getCmp('grid_IdiomasEduNo').getStore().getAt(i).data;
			var Grid2=Grid2+Dato.Csc+"|"+Dato.Idioma+"|"+Dato.Dominio+"|"+Dato.Donde+"-";
			
			document.getElementById('Send_Grid2').value=Grid2;	
			}
		
		}
	else if (Grid=='2')
		{
		var cantidad = Ext.getCmp('grid_EduNoFormal').getStore().getCount();
		var csc=0;
		var Grid3=0;
		
		for(i=0;i<cantidad; i++)
			{
			record=Ext.getCmp('grid_EduNoFormal').getStore().getAt(i);
			var Dato = Ext.getCmp('grid_EduNoFormal').getStore().getAt(i).data;
			var Grid3=Grid3+Dato.Csc+"|"+Dato.Tipo+"|"+Dato.Otro+"|"+Dato.Pais+"|"+Dato.Departamento+"|"+Dato.Ciudad+"|"+Dato.Titulo+"|"+Dato.Institucion+"|"+Dato.Area+"|"+Dato.Ingreso+"|"+Dato.Estado+"|"+Dato.Final+"-";
			document.getElementById('send_Grid3').value=Grid3;
			}
		
		}
	else if (Grid=='3')
		{
		var cantidad = Ext.getCmp('Grid_Referencias').getStore().getCount();
		var csc=0;
		var Grid3=0;
		
		for(i=0;i<cantidad; i++)
			{
			record=Ext.getCmp('Grid_Referencias').getStore().getAt(i);
			var Dato = Ext.getCmp('Grid_Referencias').getStore().getAt(i).data;
			var Grid3=Grid3+Dato.Csc+"|"+Dato.Nombres+"|"+Dato.Empresa+"|"+Dato.Cargo+"|"+Dato.Telefonos+"|"+Dato.Parentesco+"-";
			document.getElementById('Grid_Ref').value=Grid3;
			}
		
		}
	else if (Grid=='4')//grid hijos
		{
		var cantidad = Ext.getCmp('grid_Hijos').getStore().getCount();
		var csc=0;
		var Grid4=0;
		
		for(i=0;i<cantidad; i++)
			{
			record=Ext.getCmp('grid_Hijos').getStore().getAt(i);
			var Dato = Ext.getCmp('grid_Hijos').getStore().getAt(i).data;
			var Grid4=Grid4+Dato.Csc+"|"+Dato.Nombres+"|"+Dato.Apellidos+"|"+Dato.Nacimiento+"|"+Dato.Mayor+"-";
			document.getElementById('send_Hijos').value=Grid4;
			}
		
		}
	else if (Grid=='5')//grid Hermanos
		{
		var cantidad = Ext.getCmp('grid_Hermano').getStore().getCount();
		var csc=0;
		var Grid5=0;
		
		for(i=0;i<cantidad; i++)
			{
			record=Ext.getCmp('grid_Hermano').getStore().getAt(i);
			var Dato = Ext.getCmp('grid_Hermano').getStore().getAt(i).data;
			var Grid5=Grid5+Dato.Csc+"|"+Dato.Nombres+"|"+Dato.Apellidos+"|"+Dato.Pais+"|"+Dato.Telefono+"|"+Dato.Celular+"|"+Dato.Actividad+"|"+Dato.Empresa+"|"+Dato.Cargo+"-";
			document.getElementById('send_Hermanos').value=Grid5;
			}
		
		}
	else if (Grid=='6')//grid Laboral
		{
		var cantidad = Ext.getCmp('grid_Laboral').getStore().getCount();
		var csc=0;
		var Grid6=0;
		
		for(i=0;i<cantidad; i++)
			{
			record=Ext.getCmp('grid_Laboral').getStore().getAt(i);
			var Dato = Ext.getCmp('grid_Laboral').getStore().getAt(i).data;
			var Grid6=Grid6+Dato.Csc+"|"+Dato.Empresa+"|"+Dato.Departamento+"|"+Dato.Ciudad+"|"+Dato.Direccion+"|"+Dato.Razon_Social+"|"+Dato.Telefono+"|"+Dato.Empresa+"|"+Dato.Cargo+"|"+Dato.Anos+"|"+Dato.Retiro+"||";
			document.getElementById('Sendgrid_Laboral').value=Grid6;
			}
		
		}						
	}
		////////////////////////////////////////////////////////////CARGUE DE INFORMACION DE LOS TABS
function fn_Enviarcargue(numero)
	{
		if(numero==3){
			for (i=2; i<=numero; i++)
				{
					var Csc = document.getElementById('Csc').value;
					ds_Tab3.load({waitMsg:'Consultando', params:{Csc:Csc}});
				}
			}
	
	}	
	//-------------------------------------------------------------------------------------------
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
				
				w1.hide();
				
				document.getElementById('txt_DirTab2').value=Direccion;
				getDocFrame('Contenido').getElementById("direccion").value='';
				//	alert(var1.document.getElementById('direccion').value);
				//alert(direccion+'hola')
				}
			}]
			
	});
Ext.getCmp('txt_DirTab2').on('focus', function(){
	//var Nombres = document.getElementById('txt_nombres').value; 
		//document.getElementById('User').innerHTML='Hola a todos';
	w1.show();
	document.getElementById('txt_DirTab2').value='';
	});
	function getDocFrame(idFrame){
	    var myIFrame = document.getElementById(idFrame);
		return  myIFrame.contentWindow.document;
		
  }
	
	
	//-------------------------------------------------------------------------------------------------------------------				
});

</script>
</head>
<body onload="initialize();">
    <div id="div_Contenido">
	    <div id="div_Buscar" style="padding:5px;"></div>
    	 <div style="height:3px;"></div>
    	<div id="tabs" style="padding:5px;"></div>
    </div>    
  
   
   
</body>
</html>