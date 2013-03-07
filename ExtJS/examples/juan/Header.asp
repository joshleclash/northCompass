<%@LANGUAGE="VBSCRIPT" CODEPAGE="1252" %>
<!-- #INCLUDE FILE="./Conexion.inc" -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="./css/style.css" />
<style>
body { 
	margin:0px;
	font-family:"Segoe UI", Tahoma, Verdana, Arial; 
	font-size:10px;
	background:url(Img/bg.gif) repeat-x;
}

.Estilo12 {
	font-size: 11px;
	color: #000000;
}
.Estilo17 {
	font-size: 20px;
	color: #FFFFFF
}
.Estilo18 {
	color: #333333;
	font-size: 14px;
	font-weight: bold	
}
.Estilo18a {
	font-size: 14px;
	font-weight: bold	
}
.Estilo23 {font-size: 12px}
.select {
	BORDER-RIGHT: #888888 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #888888 1px solid; MARGIN: 0px; VERTICAL-ALIGN: middle; BORDER-LEFT: #888888 1px solid; WIDTH: 70px; COLOR: #000000; PADDING-TOP: 0px; BORDER-BOTTOM: #888888 1px solid; FONT-FAMILY: Segoe UI, Tahoma, Verdana, Arial; height:18px; font-size:12px;
}
.selectform {
	BORDER-RIGHT: #888888 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #888888 1px solid; MARGIN: 0px; VERTICAL-ALIGN: middle; BORDER-LEFT: #888888 1px solid; COLOR: #000000; PADDING-TOP: 0px; BORDER-BOTTOM: #888888 1px solid; FONT-FAMILY: Segoe UI, Tahoma, Verdana, Arial; height:18px; font-size:12px;
}

a{text-decoration:none; color:#000}
a:visited{text-decoration:none;}
a:hover{text-decoration:none;}
.tabla-cliente{
	font-size: 11px;
	font-family:"Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
	background-color: #FDFDFD;/*#e0eefb;*/
	padding-left:5px;
	padding-right:5px;
}
.tabla-sharepoint{
	font-size: 12px;
	font-family:"Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
	background-color:#fff;
	padding-left:5px;
	padding-right:5px;
}
.tituloconfiguracion{
	font-size: 12px;
	font-family:"Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
	background-image: url(Img/header-bg.gif);
	padding-left:5px;
	padding-right:5px;
	height: 30px;
	color:#fff;
	/*font-weight: bolder;*/
}
.tabla-descripcion{
	font-size: 11px;
	font-family:"Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
	background-color: #FDFDFD;/*#e0eefb;*/
	padding:5px;
}
.tabla-producto{
	font-size: 11px;
	font-family:"Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
	background-color:#fff;
	padding:5px;
}
.titulo-formulario{
	color:#FFF;
	background-image:none;	background-color:#3c91c7;
	min-height:0;
	height:30px;
	font-family:"Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
}
.info{
	font-size:160%;
	font-family:inherit;
	font-weight:;
	font-style:;
	color:#1c2742;
	padding-left:5px;
}
.infotext{
	font-size:100%;
	font-family:inherit;
	font-weight:;
	font-style:;
	color:#000000;
	font-weight: bold;
}
.sololectura{ 
	background-color: #F5F5F5;
}
.alinearderecha{ 
	direction:rtl;
	background-color:#F9F9F9;
}
</style>
<head>
<script>
function validarfecha(fecha) 
{ 
//alert(fecha);
var long = fecha.length; 
var dia; 
var mes; 
var ano; 
var primerslap;
var segundoslap;

if ((long>=2) && (primerslap==false)) { dia=fecha.substr(0,2); 
if ((IsNumeric(dia)==true) && (dia<=31) && (dia!="00")) { fecha=fecha.substr(0,2)+"/"+fecha.substr(3,7); primerslap=true; } 
else { fecha=""; primerslap=false;} 
} 
else 
{ dia=fecha.substr(0,1); 
if (IsNumeric(dia)==false) 
{fecha="";} 
if ((long<=2) && (primerslap=true)) {fecha=fecha.substr(0,1); primerslap=false; } 
} 
if ((long>=5) && (segundoslap==false)) 
{ mes=fecha.substr(3,2); 
if ((IsNumeric(mes)==true) &&(mes<=12) && (mes!="00")) { fecha=fecha.substr(0,5)+"/"+fecha.substr(6,4); segundoslap=true; } 
else { fecha=fecha.substr(0,3);; segundoslap=false;} 
} 
else { if ((long<=5) && (segundoslap=true)) { fecha=fecha.substr(0,4); segundoslap=false; } } 
if (long>=7) 
{ ano=fecha.substr(6,4); 
if (IsNumeric(ano)==false) { fecha=fecha.substr(0,6); } 
else { if (long==10){ if ((ano==0) || (ano<2008) || (ano>2020)) { fecha=fecha.substr(0,6); } } } 
} 

if (long>=10) 
{ 
fecha=fecha.substr(0,10); 
dia=fecha.substr(0,2); 
mes=fecha.substr(3,2); 
ano=fecha.substr(6,4); 
// Año no viciesto y es febrero y el dia es mayor a 28 
if ( (ano%4 != 0) && (mes ==02) && (dia > 28) ) { fecha=fecha.substr(0,2)+"/"; } 
} 
return (fecha); 
}
</script>
<script type="text/javascript" src="./js/dropdown.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><%=Titulo%></title>
</head>

<div id="Capa" title="Haga clic para cerrar" style="display:none;position:absolute; width:100%; background-color:#FFFFFF;filter: alpha (opacity=60); opacity: .1; cursor:help;" onClick="CerrarVF();"></div>

<div id="VentanaForm" style="display:none; position:absolute; width:100%;" align="center">
    <div style="background-color:#ffffff;border: 4px solid #CCCCCC;height:450px; width:80%">
     <iframe scrolling="auto" id="Formularios" src="Cargando.html" frameborder="0" height="100%" width="100%">
     </iframe>
    </div>
</div>

<%
starttime = Timer() 
Do While tt < 30000 
    tt = tt + 1 
Loop 

Color  = "1E90FF,9370DB,FF8C00,9ACD32,B0C4DE,FF8C00,B22222,1E90FF,228B22,DDA0DD,8BBA00,660000,800000,990000,CC0000,FF0000,FF6666,FF9999,"& _
	     "FFCCCC,3366FF,CC33FF,FF00FF,999999,663300,993300,CC6600,FF6600,FF6666,FF9900,FF9966,FFCC99,0033CC,CC00FF,FF00CC,808080,006600,"& _
         "008000,009900,00CC00,00FF00,66FF66,99FF99,CCFFCC,003399,9900CC,CC0099,666666,003333,006666,008080,009999,00CCCC,66CCCC,66FFCC,"& _
		 "99FFCC,000080,660099,990066,333333,000099,00FF00,0066FF,0099FF,00CCFF,66FFFF,99FFFF,CCFFFF,000066,330066,660033,000000,"& _
		 "1E90FF,9370DB,FF8C00,9ACD32,B0C4DE,FF8C00,B22222,1E90FF,228B22,DDA0DD,8BBA00,660000,800000,990000,CC0000,FF0000,FF6666,FF9999,"& _
	     "FFCCCC,3366FF,CC33FF,FF00FF,999999,663300,993300,CC6600,FF6600,FF6666,FF9900,FF9966,FFCC99,0033CC,CC00FF,FF00CC,808080,006600,"& _
		 "1E90FF,9370DB,FF8C00,9ACD32,B0C4DE,FF8C00,B22222,1E90FF,228B22,DDA0DD,8BBA00,660000,800000,990000,CC0000,FF0000,FF6666,FF9999,"& _
	     "FFCCCC,3366FF,CC33FF,FF00FF,999999,663300,993300,CC6600,FF6600,FF6666,FF9900,FF9966,FFCC99,0033CC,CC00FF,FF00CC,808080,006600,"& _
         "008000,009900,00CC00,00FF00,66FF66,99FF99,CCFFCC,003399,9900CC,CC0099,666666,003333,006666,008080,009999,00CCCC,66CCCC,66FFCC,"& _
		 "99FFCC,000080,660099,990066,333333,000099,00FF00,0066FF,0099FF,00CCFF,66FFFF,99FFFF,CCFFFF,000066,330066,660033,000000,"& _
		 "1E90FF,9370DB,FF8C00,9ACD32,B0C4DE,FF8C00,B22222,1E90FF,228B22,DDA0DD,8BBA00,660000,800000,990000,CC0000,FF0000,FF6666,FF9999"& _
		 "1E90FF,9370DB,FF8C00,9ACD32,B0C4DE,FF8C00,B22222,1E90FF,228B22,DDA0DD,8BBA00,660000,800000,990000,CC0000,FF0000,FF6666,FF9999,"& _
	     "FFCCCC,3366FF,CC33FF,FF00FF,999999,663300,993300,CC6600,FF6600,FF6666,FF9900,FF9966,FFCC99,0033CC,CC00FF,FF00CC,808080,006600,"& _
         "008000,009900,00CC00,00FF00,66FF66,99FF99,CCFFCC,003399,9900CC,CC0099,666666,003333,006666,008080,009999,00CCCC,66CCCC,66FFCC,"& _
		 "99FFCC,000080,660099,990066,333333,000099,00FF00,0066FF,0099FF,00CCFF,66FFFF,99FFFF,CCFFFF,000066,330066,660033,000000,"& _
		 "1E90FF,9370DB,FF8C00,9ACD32,B0C4DE,FF8C00,B22222,1E90FF,228B22,DDA0DD,8BBA00,660000,800000,990000,CC0000,FF0000,FF6666,FF9999,"& _
	     "FFCCCC,3366FF,CC33FF,FF00FF,999999,663300,993300,CC6600,FF6600,FF6666,FF9900,FF9966,FFCC99,0033CC,CC00FF,FF00CC,808080,006600,"& _
		 "1E90FF,9370DB,FF8C00,9ACD32,B0C4DE,FF8C00,B22222,1E90FF,228B22,DDA0DD,8BBA00,660000,800000,990000,CC0000,FF0000,FF6666,FF9999,"& _
	     "FFCCCC,3366FF,CC33FF,FF00FF,999999,663300,993300,CC6600,FF6600,FF6666,FF9900,FF9966,FFCC99,0033CC,CC00FF,FF00CC,808080,006600,"& _
         "008000,009900,00CC00,00FF00,66FF66,99FF99,CCFFCC,003399,9900CC,CC0099,666666,003333,006666,008080,009999,00CCCC,66CCCC,66FFCC,"& _
		 "99FFCC,000080,660099,990066,333333,000099,00FF00,0066FF,0099FF,00CCFF,66FFFF,99FFFF,CCFFFF,000066,330066,660033,000000,"& _
		 "1E90FF,9370DB,FF8C00,9ACD32,B0C4DE,FF8C00,B22222,1E90FF,228B22,DDA0DD,8BBA00,660000,800000,990000,CC0000,FF0000,FF6666,FF9999"
		 
		 
SColor = Split(Color,",")
alpha  = 55

If Request("FechaConsulta")="" Then
	FechaConsulta = Day(fechaS)&"/"&Month(fechaS)&"/"&Year(fechaS)
Else
	FechaConsulta = Request("FechaConsulta")
End If

If Session.SessionID="" Then
Response.Redirect("Pass.asp?acces=0")
Response.End()
Else
Usuario_Csc	= Request("Csc_Usuario")
User_Csc 	= Usuario_Csc

If Session("Csc_Perfil")="" Then
Response.Redirect("Pass.asp?acces=10")
Response.End()
End If

If Usuario_Csc="" Then Response.Redirect("default.asp?error=3") End If
	sqlText="Select * From UsuariosIngresos where Id="&Usuario_Csc&" and Perfil="&Session("Csc_Perfil")&" "
	set userSet = conn.Execute(sqlText)
	
	If userSet.EOF then
	
		sqlOperador="Select * From Conductores where Id="&Usuario_Csc&" "
			set OperadorSet =conn.Execute(sqlOperador)
			If OperadorSet.EOF then
				msm="1"
				Response.Redirect "./default.asp?error="&msm
			Else
				Csc_Usuario = trim(OperadorSet("Id"))
					UserName = trim(OperadorSet("Usuario"))
							Csc_Perfil = 10
						Estado = trim(OperadorSet("Estado"))
					Comentario = ""
				Nombre = trim(OperadorSet("Nombres"))
				ips   = "BHM"
				Observaciones = OperadorSet("Observaciones")
				If Observaciones<>"" Then
					Observaciones = "Sr(a). "&Nombre&", "&Observaciones
				End If
			End If	
		
	Else
		Usuario_Csc = trim(userSet.fields.item(0))
			UserName = trim(userSet.fields.item(1))
					Csc_Perfil = trim(userSet.fields.item(3))
				Estado = trim(userSet.fields.item(4))
			Comentario = trim(userSet.fields.item(5))
		Nombre = trim(userSet.fields.item(6))
		ips   = trim(userSet.fields.item(7))
	End If
	
End If

Dia  =Day(Date)
Mes  =Month(Date)
Ano  =Year(Date)

If 	Dia=1 or Dia=2 or Dia=3 or Dia=4 or Dia=5 or Dia=6 or Dia=7 or Dia=8 or Dia=9 Then
	Dia="0"&Dia
End If

If 	Mes=1 or Mes=2 or Mes=3 or Mes=4 or Mes=5 or Mes=6 or Mes=7 or Mes=8 or Mes=9 Then
	Mes="0"&Mes
End If

%>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="alphacube_content" >
  <tr>
    <td height="3" bgcolor="#E9EEF3"></td>
  </tr>
  <tr>
    <td height="60" style="background:url(Img/Superior.png)">
    <table width="98%" height="60" border="0" align="center" cellpadding="0" cellspacing="0" class="alphacube_content" >
      <tr>
        <td width="19%" height="40" class="Estilo17"><b>BHM T&amp;C</b></td>
        <td width="9%" height="40" class="Estilo17" id="TxtMensajeActualiza">
        <%If Csc_Perfil = 1 or Csc_Perfil = 5 or Csc_Perfil = 3 Then%>
        <div id="sample_attach_menu_parent" class="sample_attach"><img src="Img/page.png" width="16" height="16" align="absmiddle" />
        &nbsp;Solicitudes&nbsp;&nbsp;&nbsp;</div>
        <div id="sample_attach_menu_child">             
            <a class="sample_attach" href="Formulario_Citas.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Crear Servicios">
            <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Crear</a>
            <a class="sample_attach" href="Autorizacion_Listado.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Modificar Servicios">
            <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Modificar</a>
			<a class="sample_attach" href="Autorizaciones_Listado.asp?Csc_Usuario=<%=Usuario_Csc%>">
            <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" />Autorizacion</a>
   			<a class="sample_attach" href="Reporte.asp?Csc_Usuario=<%=Usuario_Csc%>">
            <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" />Reportes</a>                                      
             <form class="forms" id="sample_attach_src_child" action="confirmacion_Listado.asp">
              <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Confirmacion: <br><img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" /><input name="FechaConsulta" type="FechaConsulta" class="sample_attach" size="10" value="<%=FechaConsulta%>" maxlength="10" width="100" />
                <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  /> 
              <input type="hidden" id="Modulo" name="Modulo" value="Confirmacion" />                
                <input type="submit" value="Ir" /> 
            </div>
            </form>
            <form class="forms" id="sample_attach_src_child1" action="Programacion_Listado.asp">
              <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Programacion: <br><img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" /><input name="FechaConsulta" type="text" class="sample_attach" id="FechaConsulta" size="10" value="<%=FechaConsulta%>" maxlength="10" width="100" /> 
                <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  />
              <input type="hidden" id="Modulo" name="Modulo" value="Progracion" />                
                <input type="submit" value="Ir" /> 
            </div>
            </form>            
            <form class="forms" id="sample_attach_src_child2" action="NewCierre_Servicios.asp">
              <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Cierre: <br><img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" /><input name="FechaConsulta" id="FechaConsulta" type="text" class="sample_attach" size="10" maxlength="10" width="100" value="<%=FechaConsulta%>" /> 
              <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  />
              <input type="hidden" id="Modulo" name="Modulo" value="Cierre" />
                <input type="submit" value="Ir" /> 
            </div>
            </form>
            <form class="forms" id="sample_attach_src_child1" action="Programacion_Listado_Anulados.asp">
              <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Listado de Cancelados: <br>
                <img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" />
                <input name="FechaConsulta" type="text" class="sample_attach" id="FechaConsulta" size="10" value="<%=FechaConsulta%>" 
                 maxlength="10" width="100" />
                <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  />
              <input type="hidden" id="Modulo" name="Modulo" value="Cancelados" />
                <input type="submit" value="Ir" /> 
            </div>
        </form> 
			<form class="forms" id="sample_attach_src_child1" action="Creacion_Listado.asp">
              <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Listado de Creacion: <br><img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" />
                <input name="FechaConsulta" type="text" class="sample_attach" id="FechaConsulta2" size="10" value="<%=FechaConsulta%>" 
                 maxlength="10" width="100" />
                <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  />
              <input type="hidden" id="Modulo" name="Modulo" value="Creacion" />
                <input type="submit" value="Ir" /> 
            </div>
        </form>
       </div>
            <%ElseIf Csc_Perfil = 4 Then%>
        <div id="sample_attach_menu_parent" class="sample_attach"><img src="Img/page.png" width="16" height="16" align="absmiddle" /> Solicitudes</div>
        <div id="sample_attach_menu_child">             
            <a class="sample_attach" href="Formulario_Citas.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Crear Servicios">
            <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" />Crear</a>
            <a class="sample_attach" href="Modificar_Servicio.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Modificar Servicios">
            <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" />Modificar</a>              
             <form class="forms" id="sample_attach_src_child" action="confirmacion_Listado.asp">
              <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Confirmacion: <br><img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" /><input name="FechaConsulta" type="FechaConsulta" class="sample_attach" size="10" maxlength="10" width="100" value="<%=FechaConsulta%>"/>
                <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  /> 
              <input type="hidden" id="Modulo" name="Modulo" value="Confirmacion" />                
                <input type="submit" value="Ir" /> 
            </div>
            </form>
        
            <form class="forms" id="sample_attach_src_child2" action="NewCierre_Servicios.asp">
              <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Cierre: <br><img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" /><input name="FechaConsulta" id="FechaConsulta" type="text" class="sample_attach" size="10" maxlength="10" width="100" value="<%=FechaConsulta%>" /> 
              <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  />
              <input type="hidden" id="Modulo" name="Modulo" value="Cierre" />
                <input type="submit" value="Ir" /> 
            </div>
            </form>                         
            </div> 
            <%Elseif Csc_Perfil=2 or Csc_Perfil = 6 or Csc_Perfil = 7 Then%>
        <div id="sample_attach_menu_parent" class="sample_attach"><img src="Img/page.png" width="16" height="16" align="absmiddle" /> Solicitudes</div>
        <div id="sample_attach_menu_child">             
            <a class="sample_attach" href="Formulario_Citas.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Crear Servicios">
            <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" />Crear</a>
	        <a class="sample_attach" href="Autorizacion_Listado.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Modificar Servicios">
            <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" />Modificar</a>
        	<a class="sample_attach" href="Autorizaciones_Listado.asp?Csc_Usuario=<%=Usuario_Csc%>">
            <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" />Autorizacion</a>
            <form class="forms" id="sample_attach_src_child1" action="Programacion_Listado.asp">
              <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Programacion: <br><img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" /><input name="FechaConsulta" type="text" class="sample_attach" id="FechaConsulta" size="10" value="<%=FechaConsulta%>" maxlength="10" width="100" /> 
                <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  />
              <input type="hidden" id="Modulo" name="Modulo" value="Progracion" />                
                <input type="submit" value="Ir" /> 
            </div>
        </form>
<form class="forms" id="sample_attach_src_child2" action="NewCierre_Servicios.asp">
              <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Cierre: <br><img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" /><input name="FechaConsulta" id="FechaConsulta" type="text" class="sample_attach" size="10" maxlength="10" width="100" value="<%=FechaConsulta%>" /> 
              <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  />
              <input type="hidden" id="Modulo" name="Modulo" value="Cierre" />
                <input type="submit" value="Ir" /> 
            </div>
            </form>       
        </div> 
        <%
		ElseIf Csc_Perfil=10 Then
			'FechaConsulta=DateAdd("d",1,FechaConsulta)
		%>
        <div id="sample_attach_menu_parent" class="sample_attach"><img src="Img/page.png" width="16" height="16" align="absmiddle" /> Servicios</div>
        <div id="sample_attach_menu_child">
          <form class="forms" id="sample_attach_src_child2" action="Operador_Listado.asp">
            <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Asignados: <br><img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" />
            <input name="FechaConsulta" id="FechaConsulta" type="text" class="sample_attach" size="10"
             maxlength="10" width="100" value="<%=FechaConsulta%>" /> 
              <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  />
              <input type="hidden" id="Modulo" name="Modulo" value="Servicios Asignados" />
                <input type="submit" value="Ir" /> 
            </div>
          </form>
          <form class="forms" id="sample_attach_src_child3" action="Operador_Historial_Operadores.asp" style="display:none;">
            <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Cierre: <br><img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" />
            <input name="FechaConsulta" id="FechaConsulta" type="text" class="sample_attach" size="10"
             maxlength="10" width="100" value="<%=FechaConsulta%>" /> 
              <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  />
              <input type="hidden" id="Modulo" name="Modulo" value="Servicios Asignados" />
                <input type="submit" value="Ir" /> 
            </div>
          </form>                                   
            </div>               
        <%end if%></td>
        <td width="9%" height="40" class="Estilo17" id="TxtMensajeActualiza">
        <%If Csc_Perfil = 1 or Csc_Perfil = 5 Then%>
        <div id="sample_attach_menu_parent1" class="sample_attach"><img src="Img/user.png" width="16" height="16" align="absmiddle" /> SW Usuario</div>
        <div id="sample_attach_menu_child1">
          
           <a class="sample_attach" href="Creacion_Solicitante.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Crear Solicitante">
           <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" />Crear</a>
          <a class="sample_attach" href="lista_Solicitantes.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Modificar Solicitante">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Modificar</a>          </div>
        
          <% end if%>
          
        
        <%If Csc_Perfil = 6 or Csc_Perfil = 7 Then%>
        <div id="sample_attach_menu_parent1" class="sample_attach"><img src="Img/user.png" width="16" height="16" align="absmiddle" /> SW Usuario</div>
        <div id="sample_attach_menu_child1">
          
           <a class="sample_attach" href="Creacion_Solicitante.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Crear Solicitante">
           <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" />Crear</a>
          <a class="sample_attach" href="lista_Solicitantes.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Modificar Solicitante">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Modificar</a>          </div>
        
          <% end if%>
        
        </td>
        <td width="9%" height="40" class="Estilo17" id="TxtMensajeActualiza">
        <%If Csc_Perfil = 1 Then%>
        <div id="sample_attach_menu_parent2" class="sample_attach"><img src="Img/lorry.png" width="16" height="16" align="absmiddle" /> Operador</div>
        <div id="sample_attach_menu_child2">
          <a class="sample_attach" href="crear_conductor.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Crear Operador">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Crear</a>
          <a class="sample_attach" href="lista_Conductores.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Modifcar Operador">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Modificar</a>
          <a class="sample_attach" href="Historial_Libretas.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Libretas de Operadores">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Libretas</a>          
        <form class="forms" id="sample_attach_src_child2" action="Operador_Listado_Ingreso.asp">
            <div><img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Ingresos: <br>
              <img src="Img/white.gif" width="18" height="18" border="0" align="absmiddle" />
            <input name="FechaConsulta" id="FechaConsulta" type="text" class="sample_attach" size="10"
             maxlength="10" width="100" value="<%=FechaConsulta%>" /> 
              <input type="hidden" id="Csc_Usuario" name="Csc_Usuario" value="<%=User_Csc%>"  />
              <input type="hidden" id="Modulo" name="Modulo" value="Ingresos" />
                <input type="submit" value="Ir" /> 
            </div>
          </form>
        </div> 
 		<%ElseIf Csc_Perfil = 5 Then%>
        <div id="sample_attach_menu_parent2" class="sample_attach"><img src="Img/lorry.png" width="16" height="16" align="absmiddle" /> Operador</div>
        <div id="sample_attach_menu_child2">
          <a class="sample_attach" href="crear_conductor.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Crear Operador">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Crear</a>
          <a class="sample_attach" href="lista_Conductores.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Modifcar Operador">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Modificar</a>        </div> 
         <a class="sample_attach" href="Historial_Libretas.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Libretas de Operadores">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Libretas</a> 
         <% end if%>
         <%If Csc_Perfil = 3 Then%>
        <div id="sample_attach_menu_parent2" class="sample_attach"><img src="Img/lorry.png" width="16" height="16" align="absmiddle" /> Operador</div>
        <div id="sample_attach_menu_child2"> 
         <a class="sample_attach" href="Historial_Libretas.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Libretas de Operadores">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Libretas</a> 
         </div>  
         <% end if%> 
                   <% If Csc_Perfil = 21 or Csc_Perfil = 61 or Csc_Perfil = 71 Then %>
        <div id="sample_attach_menu_parent3" class="sample_attach"><img src="Img/cog.png" width="16" height="16" align="absmiddle" /> Config</div>
        <div id="sample_attach_menu_child3">
        
          <a class="sample_attach" href="Setting_D1.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Configurar Destinos">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Destino</a>        </div>
		<% end if%>                </td>
        <td width="9%" class="Estilo17" id="TxtMensajeActualiza">
       <%If Csc_Perfil = 1 Then%>
       <div id="sample_attach_menu_parent61" class="sample_attach"><img src="Img/money.png" width="16" height="16" align="absmiddle" /> Facturacion</div>
          <div id="sample_attach_menu_child61"><a class="sample_attach" href="Facturacion_Autorizaciones_Listado.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Autorizacion"> <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Autorizaci&oacute;n</a><a class="sample_attach" href="Facturacion_Listado_Usuarios.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Verificacion"> <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Verificaci&oacute;n</a><a class="sample_attach" href="Facturacion_Crear_Factura.asp?Csc_Usuario=<%=Usuario_Csc%>&modulo=Crear Factura" title="Verificacion"> <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Crear</a><a class="sample_attach" href="Facturacion_Listado.asp?Csc_Usuario=<%=Usuario_Csc%>&modulo=Listado Factura" title="Verificacion"> <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Listado</a><a class="sample_attach" href="Facturacion_Verificacion_Operador.asp?Csc_Usuario=<%=Usuario_Csc%>&modulo=Unificado_Operador" title="Unificado Operador"> <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Unificado Op</a><a class="sample_attach" href="Facturacion_Verificacion_Usuario.asp?Csc_Usuario=<%=Usuario_Csc%>&modulo=Unificado_Usuario" title="Unificado Usuario"> <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Unificado Us</a><a class="sample_attach" href="Facturacion_Verificacion_PagoOperador.asp?Csc_Usuario=<%=Usuario_Csc%>&modulo=Pago_Operador" title="Pago Op"> <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Pago Op</a></div>
        <%End If%>  </td>
        <td width="9%" height="40" class="Estilo17" id="TxtMensajeActualiza">

        <% If Csc_Perfil = 1 Then %>
        <div id="sample_attach_menu_parent3" class="sample_attach"><img src="Img/cog.png" width="16" height="16" align="absmiddle" /> Config</div>
        <div id="sample_attach_menu_child3">
        
          <a class="sample_attach" href="Setting_S.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Configurar Servicios">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Servicio</a>
          <a class="sample_attach" href="Setting_D1.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Configurar Destinos">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Destino</a>
          <a class="sample_attach" href="Listado_Usuarios.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Listado de Usuarios">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Usuarios</a>        
          <a class="sample_attach" href="Usuario_Consulta.asp?Csc_Usuario=<%=Usuario_Csc%>&modulo=Usuarios a Encuastar" title="Encuesta a Usuarios">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Encuesta</a>        </div>
        <%ElseIf Csc_Perfil = 5 Then%>
        <div id="sample_attach_menu_parent3" class="sample_attach"><img src="Img/cog.png" width="16" height="16" align="absmiddle" /> Config</div>
        <div id="sample_attach_menu_child3">
        
          <a class="sample_attach" href="Setting_S.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Configurar Servicios">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Servicio</a>
          <a class="sample_attach" href="Setting_D1.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Configurar Destinos">
          <img src="Img/line2.gif" width="18" height="18" border="0" align="absmiddle" /> Destino</a>        </div>        
        <% end if%>        </td>
        <td width="9%" height="40" class="Estilo17" id="TxtMensajeActualiza">
        <% If Csc_Perfil = 1 Then %>
        <div id="sample_attach_menu_parent4" class="sample_attach"><img src="Img/chart_bar.png" width="16" height="16" align="absmiddle" /> Gerencia</div>
        <div id="sample_attach_menu_child4">        
        <a  class="sample_attach" href="Indicador.asp?Csc_Usuario=<%=Usuario_Csc%>" title="Indicadores"><img src="Img/chart_curve.png" width="16" height="16" border="0" align="absmiddle" /> Indicadores</a>       </div> 
       <% end if%>       </td>
    <td width="27%" height="40" class="Estilo17" id="TxtMensajeAyuda">
    </td>
        <td width="9%" height="40">
        <div id="sample_attach_menu_parent5" class="sample_attach"><img src="Img/lock_open.png" width="16" height="16" align="absmiddle" /> Mi Perfil</div>      
        <div id="sample_attach_menu_child5">
	  <%if Csc_Perfil=2 or Csc_Perfil = 6 or Csc_Perfil = 7 Then
		else
	  %>                
       <a class="sample_attach" href="Inicio.asp?Csc_Usuario=<%=Usuario_Csc%>&modulo=Inicio"><img src="Img/house.png" width="16" height="16" border="0" align="absmiddle" /> Ir a Inicio</a>
      <%end if%> 
       <a class="sample_attach" href="Cambio_Clave.asp?Csc_Usuario=<%=Usuario_Csc%>"><img src="Img/login.png" width="16" height="16" border="0" align="absmiddle" /> Cambio Clave</a>
       <a href="Ayuda.asp?Csc_Usuario=<%=Usuario_Csc%>" target="_blank" class="sample_attach">
    	<img src="Img/information.png" width="16" height="16" border="0" align="absmiddle"/> Ayuda</a>
       <a class="sample_attach" href="pass.asp?acces=0"><img src="Img/hmenu-lock.png" width="16" height="16" border="0" align="absmiddle" /> Cerrar Sesion</a>
       </div></td>
      </tr>
      <tr>
        <td height="20" colspan="7" class="Estilo17"><div align="left" class="Estilo17 Estilo23">Bienvenido, <%=Nombre%></div></td>
        <td height="20" colspan="2" class="Estilo17">
        
          <div align="right" class="Estilo17 Estilo23">                    
          <%=Request("Modulo")&" del "&FechaConsulta%>          </div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="3" bgcolor="#E9EFF4"></td>
  </tr>
</table>



<div id="impresionDiv" style="display:none">
<div id="TituloImpresion" style="width:100%; font-family:Segoe UI, Tahoma, Verdana, Arial;font-size:24px;color:#333333;" align="left" >
BHM - <span style="font-family:Segoe UI, Tahoma, Verdana, Arial;font-size:14px;color:#333333;"><b>Transportes &amp; Courier</b>    Impresion <%=Request("Modulo")&" del "&FechaConsulta%></span>
</div>
<table id="FormatoImpresion" style="border: solid 1px #000000;" border="1" >
</table>
<div id="TituloImpresion" style="width:100%;font-family:Segoe UI, Tahoma, Verdana, Arial;font-size:14px;color:#333333;" align="left" >Impreso por <%=Nombre%> </div>
<div id="TituloImpresion" style="width:100%;font-family:Segoe UI, Tahoma, Verdana, Arial;font-size:14px;color:#333333;" align="right" >Desarrollado por Siti Ltda &copy; </div>
</div>
<div id="DivDatosimp"  class="Estilo9" style="position:absolute; width:100%; top: 90px; padding-right:40PX" align="right"  >
<table id="DatosImpresion" class="Estilo12"   bgcolor="#FFFFFF"  >
</table>
</div>



<script type="text/javascript">

//if ('<%=Csc_Perfil%>' == "2" || '<%=Csc_Perfil%>' == "1" || '<%=Csc_Perfil%>' == "5" || '<%=Csc_Perfil%>' == "3"){
	at_attach("sample_attach_menu_parent", "sample_attach_menu_child", "hover", "y", "pointer");
//}

if ('<%=Csc_Perfil%>' == "1" || '<%=Csc_Perfil%>' == "5" || '<%=Csc_Perfil%>' == "6" || '<%=Csc_Perfil%>' == "7" ){
	at_attach("sample_attach_menu_parent1", "sample_attach_menu_child1", "hover", "y", "pointer");
}
 
if ('<%=Csc_Perfil%>' == "1" || '<%=Csc_Perfil%>' == "5"|| '<%=Csc_Perfil%>' == "3"){
	at_attach("sample_attach_menu_parent2", "sample_attach_menu_child2", "hover", "y", "pointer");	
}

if ('<%=Csc_Perfil%>' == "1" || '<%=Csc_Perfil%>' == "5"){
	at_attach("sample_attach_menu_parent3", "sample_attach_menu_child3", "hover", "y", "pointer");	
}

if ('<%=Csc_Perfil%>' == "1"){
	at_attach("sample_attach_menu_parent4", "sample_attach_menu_child4", "hover", "y", "pointer");
}
if ('<%=Csc_Perfil%>' == "1"){
	at_attach("sample_attach_menu_parent61", "sample_attach_menu_child61", "hover", "y", "pointer");
}

at_attach("sample_attach_menu_parent5", "sample_attach_menu_child5", "hover", "y", "pointer");

function showdiv(event,tipo){

	var IE = document.all?true:false;
	if (!IE) document.captureEvents(Event.MOUSEMOVE)

	var tempX = 0;
	var tempY = 0;

	if(IE)
	{ //para IE
		tempX = event.clientX + document.body.scrollLeft;
		tempY = event.clientY + document.body.scrollTop;
	}else{ //para netscape
		tempX = event.pageX;
		tempY = event.pageY;
	}

	document.getElementById(tipo).style.top = (tempY+10);
	document.getElementById(tipo).style.left = (tempX-230);
	document.getElementById(tipo).style.display='block';

};




function DatosImpresion(){

if(document.getElementById('table')==null){
   alert("Actualmente no hay tabla para Impresion!")
   return(true);
}

if( document.getElementById('DivDatosimp').style.display == "none"){
	document.getElementById('DivDatosimp').style.display="";
}else{
    document.getElementById('DivDatosimp').style.display="none";
}

	var TablaImp = document.getElementById('DatosImpresion');
	var Temp =TablaImp.rows.length;
	
		for( var xt = 0; xt < Temp; xt++ ) {
	         TablaImp.deleteRow(Temp-1-xt);	
		}	


var theTable = document.getElementById('table');
var Datos = theTable.tHead.rows[0].getElementsByTagName('H3');
		  
	  for (var x1 = 0; x1 < Datos.length; x1++ ){
		   var TR = document.createElement('TR');		       
		   var TD = document.createElement('td');
		       TR.className="Estilo12"; 
			   TD.innerHTML=Datos[x1].innerHTML;

		   var TD1 = document.createElement('td');				      
		   var input = document.createElement('input');
		  
			  input.size = 20;
			  input.type="checkbox";
			  input.value=x1;		              
			  TD1.appendChild(input);					   
			   
			   TR.appendChild(TD1);
			   TR.appendChild(TD);
			   
			   document.getElementById('DatosImpresion').tBodies[0].appendChild(TR);
	  }
	  
	  
   var TR     = document.createElement('TR');
   var TD1    = document.createElement('td');	  
   var input  = document.createElement('input');
   var TD     = document.createElement('td');   

	  input.type="button";
	  input.value="Imprimir";
	  input.onclick=new Function("ImpresionGrilla()");

	  TD1.align="right";		              
	  TD1.appendChild(input);	  
	  					   
      TR.appendChild(TD);
	  TR.appendChild(TD1);		   
	  document.getElementById('DatosImpresion').tBodies[0].appendChild(TR);
			  
}


function ImpresionGrilla(){	

	var TablaImp = document.getElementById('DivDatosimp');
	    TablaImp.style.display="none";

var Varibles="";
	var tablaIm = document.getElementById("DatosImpresion").tBodies[0]; 	
	var valores = tablaIm.getElementsByTagName('INPUT');
	var Num   = ((valores.length)*1)-1;

for (var x = 0; x < valores.length; x++ ){
     if (valores[Num-x].checked==true){
	  Varibles=valores[Num-x].value+','+Varibles;  
	 }
}

if (Varibles == '' ){alert('Seleccione los Valores a Imprimir !');return(true);};

	var theTable = document.getElementById('table');
	var TablaImp = document.getElementById('FormatoImpresion');	
	results = Varibles.split(",");
	var Temp =TablaImp.rows.length;
	
		for( var xt = 0; xt < Temp; xt++ ) {
	         TablaImp.deleteRow(Temp-1-xt);	
		}	
		
		  var Datos = theTable.tHead.rows[0].getElementsByTagName('H3');
		  var TR = document.createElement('TR');		  	
			  TR.style.font="italic bold 12px arial, sans-serif;";

		      for (var x1 = 0; x1 < (results.length)-1; x1++ ){
				   var TD = document.createElement('td');
				       TD.innerHTML=Datos[results[x1]].innerHTML;
					   TR.appendChild(TD);
			  }
			  TablaImp.tBodies[0].appendChild(TR);
			  
	for( var x = 0; x < theTable.tBodies[0].rows.length; x++ ) {
			  var TR = document.createElement('TR');
			  TR.style.font="italic   11px arial, sans-serif;";
				  for (var x1 = 0; x1 < (results.length)-1; x1++ ){
	
					   var TD = document.createElement('td');
						   TD.innerHTML=theTable.tBodies[0].rows[x].getElementsByTagName('TD')[results[x1]].innerHTML;
						   TR.appendChild(TD);
				  }
				  TablaImp.tBodies[0].appendChild(TR);
	}	
	
  var ficha = document.getElementById('impresionDiv');  
  var ventimp = window.open(' ', 'popimpr');  
  ventimp.document.write( ficha.innerHTML );
  ventimp.document.close();
  ventimp.print( );
//  ventimp.close();			  
}

function ActualizarGrid(valores){
var theTable = document.getElementById('table');

//alert(valores)

	results    = valores.split("^");
//alert(results[0])	
	
	Idconsulta =results[0].split("|");
	datos      =results.length;	
//alert(datos)	
		for( var x = 0; x < theTable.tBodies[0].rows.length; x++ ) {

		
			  var estado=theTable.tBodies[0].rows[x].getElementsByTagName('TD')[9].innerHTML;
			  var idCsc=theTable.tBodies[0].rows[x].getElementsByTagName('TD')[Idconsulta[0]].innerHTML;
			  Aresults = idCsc.split("<B>");
			  Id      = Aresults[1].split("</B>");
			  
			  if (Id[0]== Idconsulta[1] ){
				  for (var x1 = 1; x1 < datos; x1++){				     
					   Valores = results[x1].split("|");
						 if ( Valores[2] != null){
			    			 theTable.tBodies[0].rows[x].getElementsByTagName('TD')[Valores[0]].style.color=Valores[2];						  
						 }
						 if ( Valores[1] != null || Valores[1] != '' ){
			    			  theTable.tBodies[0].rows[x].getElementsByTagName('TD')[Valores[0]].innerHTML=Valores[1];						  
						 }				 
						    				      	  
				  }
				  CerrarVF();
				 return(true);
			  }	
		}
		
		alert('Error No Se Encontro Elemento en tabla!')
}


function ActualizarGrid2(valores){
	var theTable = document.getElementById('table');
	results    = valores.split("^");
	Idconsulta =results[0].split("|");
	datos      =results.length;	

		for( var x = 0; x < theTable.tBodies[0].rows.length; x++ ) {

		
			  var estado=theTable.tBodies[0].rows[x].getElementsByTagName('TD')[9].innerHTML;
			  var idCsc=theTable.tBodies[0].rows[x].getElementsByTagName('TD')[Idconsulta[0]].innerHTML;
			  Aresults = idCsc;
			  Id      = idCsc;
			  
			  if (Id== Idconsulta[1] ){
				  for (var x1 = 1; x1 < datos; x1++){				     
					   Valores = results[x1].split("|");
						 if ( Valores[2] != null){
			    			 theTable.tBodies[0].rows[x].getElementsByTagName('TD')[Valores[0]].style.color=Valores[2];						  
						 }
						 if ( Valores[1] != null || Valores[1] != '' ){
			    			  theTable.tBodies[0].rows[x].getElementsByTagName('TD')[Valores[0]].innerHTML=Valores[1];						  
						 }				 
						    				      	  
				  }
				  CerrarVF();
				 return(true);
			  }	
		}
		
		alert('Error No Se Encontro Elemento en tabla!')
}

</script>