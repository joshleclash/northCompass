<?php include("Conexion.php"); ?>
<?php
//Response.LCID = 2057
//Perfil = Session("Csc_Perfil")
//FechaS  = cDate(Day(Date)&"/"&Month(Date)&"/"&Year(Date))
	session_start();
//On Error Resume Next
$perfil=$_SESSION["Csc"];
echo $pefil;
?>
[
{
id: 01, text:'Solicitud', iconCls:'Consumos', expanded:false, children:[
{id: 011, text: 'Creación', leaf: true, iconCls:'Matriz', cls:'package', disabled:false, href:'./Aplicacion/Iframe_Tab.php', parametros:'ID_Tab=OK&TipoDoc=A&URL_Tab=./Aplicacion/Solicitud/Form_Creacion.php'},
{id: 012, text: 'Modificación', leaf: true, iconCls:'Matriz', cls:'package', disabled:true, href:'./Aplicacion/Iframe_Tab.php', parametros:'ID_Tab=OK&TipoDoc=A&URL_Tab=./aplicacion/Consumo/Consulta_Usuario_SinConsumo.php'},
{id: 012, text: 'Búsqueda', leaf: true, iconCls:'Matriz', cls:'package', disabled:true, href:'./Aplicacion/Iframe_Tab.php', parametros:'ID_Tab=OK&TipoDoc=A&URL_Tab=./aplicacion/Consumo/Consulta_Usuario_SinConsumo.php'}
]
},{
id: 02, text:'Programación', iconCls:'Modificacion Datos', expanded:false, children:[
{id: 021,text: 'Solicitudes', leaf: true, iconCls:'Matriz', cls:'package', disabled:true, href:'./Aplicacion/Iframe_Tab.php', parametros:'ID_Tab=OK&TipoDoc=A&URL_Tab=./aplicacion/ReportePago/Reporte_Pago_Grid.php'}
]
},{
id: 03, text:'Visita Domiciliaria', iconCls:'Visita Domiciliaria', expanded:false, children:[
{id: 031,text: 'Estado Solicitud', leaf: true, iconCls:'Estado Solicitud', cls:'package', disabled:false, href:'./Aplicacion/Iframe_Tab.php', parametros:'ID_Tab=OK&TipoDoc=A&URL_Tab=./Aplicacion/visita/form_visita.php'}
]
},
{
id: 04, text:'Indicadores', iconCls:'Indicadores', expanded:false, children:[
{id: 041,text: 'Indicadores', leaf: true, iconCls:'Indicadores', cls:'package', disabled:true, href:'./Aplicacion/Iframe_Tab.php',parametros:'ID_Tab=OK&TipoDoc=A&URL_Tab=./aplicacion/Usuario/Creacion_Estudiante.php'}
]
},
{
id: 05, text:'Reportes', iconCls:'Reportes', expanded:false, children:[
{id: 051,text: 'Reportes', leaf: true, iconCls:'Reportes', cls:'package', disabled:true, href:'./Aplicacion/Iframe_Tab.php', parametros:'ID_Tab=OK&TipoDoc=A&URL_Tab=./aplicacion/Usuario/Creacion_Estudiante.php'}

]
},
{
id: 091, text:'Mi Perfil', iconCls:'user', expanded:false, disabled:false, children: 
[ 
{id: 092, text: 'Cambio Contraseña', leaf: true, iconCls:'user-add', cls:'package', disabled:false, href:'./Aplicacion/Iframe_Tab.php', parametros:'ID_Tab=FDisA&TipoDoc=1&URL_Tab=./Aplicacion/Mi_Perfil/ChangePass.php'},
{id: 093, text: 'Creación', leaf: true, iconCls:'Creacion', cls:'package', disabled:true, href:'./Aplicacion/Iframe_Tab.php', parametros:'ID_Tab=OK&TipoDoc=A&URL_Tab=./Aplicacion/Facturacion/Creacion_Factura_temp.asp'}
]
}

]
<?php
//<%
//On Error Goto 0
//%>
?>