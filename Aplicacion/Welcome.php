<?php
session_start();

$hora=date("H",strtotime("-1 hour"));
$min = date ("i:s",strtotime("-1 hour"));

$Nombre=$_SESSION["Nombres"];
$Apellido=$_SESSION["Apellidos"];
?>

<html lang="en">
<head>
    <title>Aplicaci&oacute;n</title>
	<link rel="stylesheet" type="text/css" href="../ExtJS/resources/css/ext-all.css">    
    <link rel="stylesheet" type="text/css" href="../ExtJS/resources/css/reset-min.css" />
    <link rel="stylesheet" type="text/css" href="../ExtJS/welcome.css"/>
<style type="text/css">
<!--
.Estilo1 {
	font-size: 10px;
	color: #999999;
}
.Estilo2 {
	font-size: 12px;
	font-weight: bold;
}
-->
</style>
<script type="text/javascript" src="../ExtJS/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="../ExtJS/ext-all.js"></script>
<script type="text/javascript" src="../ExtJS/ext-lang-sp.js"></script>    
<script language="javascript">
Ext.onReady(function(){

    var store = new Ext.data.Store({
        url: 'Eltiempo.xml',
        reader: new Ext.data.XmlReader({
               record: 'item',
               id: 'ASIN',
               totalRecords: '@total'
           }, [
               {name: 'title', mapping: 'item > title'},
               'title', 'description', 'link', 'pubDate'
           ])
    });

    var grid = new Ext.grid.GridPanel({
        store: store,
        columns: [           
            {header: "Titulo", width: 180, dataIndex: 'title', id: "titulo", sortable: true},
 			{header: "Fecha", width: 100, dataIndex: 'pubDate', id: "pubDate", sortable: true},			
            {header: "Descripci&oacute;n", width: 115, dataIndex: 'description', id: "description", sortable: true},
            {header: "Vinculo", width: 70, dataIndex: 'link', id: "link", sortable: true}
        ],
		loadMask: true,
        renderTo:'example-grid',
		autoExpandColumn: 'titulo',
        width:'100%',
        height:300
    });

    var storeEstado = new Ext.data.Store({
    proxy: new Ext.data.HttpProxy({url:'Consulta_Estado_SQL.php'}),
     reader: new Ext.data.JsonReader({
       totalProperty: 'totalCount',
         root: 'root'
        }, [
			{name: 'csc', type:'float'},
			{name: 'aspirante', type:'string'},
			{name: 'fecha', type:'string'},
			{name: 'estado', type:'string'}		
		])
    });
	
    var gridestado = new Ext.grid.GridPanel({
        store: storeEstado,
        columns: [           
            {header: "Csc", width: 40, dataIndex: 'csc', sortable: true},
			{header: "Aspirante", width: 180, dataIndex: 'aspirante', id:'aspirante', sortable: true},
 			{header: "Fecha", width: 100, dataIndex: 'fecha', sortable: true},			
            {header: "Estado", width: 100, dataIndex: 'estado', sortable: true}
        ],
		loadMask: true,
        renderTo:'example-gridestado',
        width:'100%',
		autoExpandColumn: 'aspirante',
        height:300
    });
	
    store.load();
	storeEstado.load();
	

	grid.on('cellclick', function(grid, rowIndex, columnIndex, e){
		var record = grid.getStore().getAt(rowIndex);
		var fieldName = grid.getColumnModel().getDataIndex(columnIndex);
		var data = record.get(fieldName);		
		var links = store.getAt(rowIndex).data.link;
		
		var opciones = "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=850, height=410";
		window.open(links,"",opciones);
	});	
	
	
});
</script>  
</head>
<body>
    <div class="col">
        <div class="block">
        <h3 class="block-title">
	       <div class="block-body">
           <img src="../Images/LOGO002.png" border="0">
           <br>
           <br>
<?php		   
 	if ($hora > 6 && $hora < 13) 
 	{
   	     echo  "Buenos Dias,&nbsp;".$Nombre." ".$Apellido;
	} 
	else if ($hora > 12 && $hora < 20) 
	{
	    echo "Buenas Tardes,&nbsp;".$Nombre." ".$Apellido;
   	}
	else if ($hora > 19 && $hora < 24)
	{
   		echo "Buenas Noches,&nbsp;".$Nombre." ".$Apellido;
	}
	else if ($hora >= 0 && $hora < 7) 
	{
   		echo "Buenas Noches,&nbsp;".$Nombre." ".$Apellido;
	}
?>
<br>
Bienvenido a North Compass (Aplicaci&oacute;n En Desarrollo)<br />
        </div>
      </div>
        <div class="block">
        <h3 class="block-title">Estado solicitudes </h3>
        <div class="block-body">       
        <div id="example-gridestado"></div>
		<p class="Estilo1">&nbsp;</p>
            <p><em>Usted esta conectado(a) desde <?php  echo $_SERVER['REMOTE_ADDR'];?>
             <?php echo $_SERVER['HTTP_CLIENT_IP'];?></em></p>
            <p><em>Aplicaci&oacute;n En Desarrollo 1.0.0</em> </p>
          </div>
        </div>
        <p>&nbsp;</p>       
    </div>
    <div class="col">
        <div class="block">
        <h3 class="block-title">Noticias</h3>
        <div class="block-body">
          <p>&nbsp;</p>
          <ul class="list">
            <li>No Existen noticias.<br />
            <br />
            <em>Ultima actualizaci&oacute;n 19/04/2011</em> </li>
          </ul>
        </div>
        <h3 class="block-title">RSS</h3>
        <div class="block-body">
          <div id="example-grid"></div>
          </p>
		</div>        
      </div>
    </div>
</body>
</html>
<script language="javascript">
function Verificar(){
	var tecla=window.event.keyCode;
	
	cKey = String.fromCharCode(tecla)
	
	if ('<?php echo $_SESSION["Nombres"].$_SESSION["Apellidos"]; ?>'==''){
		alert("ERROR! Su session se a cerrado " ); parent.parent.document.location = "index.html?msm=";
	};
	
	if (cKey=='"') {alert("Error: \nNo es posible utilizar el simbolo (")""); event.keyCode=0;event.returnValue=false;}
	if (cKey=='+') {alert("Error: \nNo es posible utilizar el simbolo (+)" ); event.keyCode=0;event.returnValue=false;}
	if (cKey==',') {alert("Error: \nNo es posible utilizar el simbolo (,)" ); event.keyCode=0;event.returnValue=false;}
	if (cKey=='&') {alert("Error: \nNo es posible utilizar el simbolo (&)" ); event.keyCode=0;event.returnValue=false;}
	if (cKey=='?') {alert("Error: \nNo es posible utilizar el simbolo (?)" ); event.keyCode=0;event.returnValue=false;}
	
	http.open("GET", 'Cons_UsuarioAc.asp?SESSION=<%= Session("Csc_Usuario")%>', true);		 
	http.onreadystatechange = UsuarioLineEstadoHttpResponse;
	http.send(null);	
};

function UsuarioLineEstadoHttpResponse(){
  if (http.readyState == 4){		
	results = http.responseText.split(",");	
	
		if (results[0] == '1'){
			parent.parent.document.getElementById('mask-SITI').style.display=''; 
		 	parent.parent.document.getElementById('loading-SITI').style.display='';
			parent.parent.document.getElementById('loading-SITI-Msm').innerHTML='<B>Su sesi&oacute;n a sido cerrada.</B>';
			parent.parent.document.getElementById('username').focus();
		};
		if (results[0] == '2'){
			parent.parent.document.getElementById('mask-SITI1').style.display=''; 
		 	parent.parent.document.getElementById('loading-SITI1').style.display='';
			parent.parent.document.getElementById('loading-SITI-Msm1').innerHTML=results[1];
		};		
  };
};

function CerrarMsm(){
	parent.parent.document.getElementById('mask-SITI1').style.display='none'; 
	parent.parent.document.getElementById('loading-SITI1').style.display='none';
	parent.parent.document.getElementById('loading-SITI-Msm1').innerHTML='';
	http.open("GET", 'Cons_UsuarioAc.asp?SESSION=<%= Session("Csc_Usuario")%>&EliminarMsm=1', true);		 
	http.send(null);
};

function getHTTPObject() {
  var xmlhttp;
  /*@cc_on
  @if (@_jscript_version >= 5)
    try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (E) {
        xmlhttp = false;
      }
    }
  @else
  xmlhttp = false;
  @end @*/
  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
    try {
      xmlhttp = new XMLHttpRequest();
    } catch (e) {
      xmlhttp = false;
    }
  }
  return xmlhttp;
}
var http = getHTTPObject();

document.onkeypress = Verificar;
document.onkeydown 	= Verificar;
document.onmousedown = Verificar;
</script>