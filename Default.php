<?php session_start();?>
<?php include("Conexion.php");
echo $_SESSION["Csc"]; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="it">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta content="Northcompass Colombia">
<meta name="description" content="Aplicacion para northcompass">

<title>North Compass Colombia</title>
<link rel="shortcut icon" href="Images/icono.ico" />

<link rel="stylesheet" type="text/css" href="ExtJS/resources/css/ext-all.css">
<!--<link rel="stylesheet" type="text/css" href="./ExtJS/resources/css/xtheme-gray.css">-->
<!-- GC -->
<!-- LIBS -->
<script type="text/javascript" src="ExtJS/adapter/ext/ext-base.js"></script>
<!-- ENDLIBS -->
<script type="text/javascript" src="ExtJS/ext-all.js"></script>
<script type="text/javascript" src="ExtJs/ext-lang-sp.js"></script>


<style>
html, body {margin:0;padding:0;border:0 none;overflow:hidden;height:100%; background-image:url('/Images/Background.jpg');
background-repeat:no-repeat}
#class .loading-indicator{font-size:12px;height:18px;}
.loading-indicator{font-size:8pt;background-image:url('/ExtJS/resources/images/default/grid/loading.gif');background-repeat:no-repeat;background-position:top left;padding-left:20px;height:18px;text-align:left;}
#loading{position:absolute;left:45%;top:40%;border:1px solid #6593cf;padding:2px;background:#c3daf9;width:150px;text-align:center;z-index:20001;}
#loading .loading-indicator{border:1px solid #a3bad9;background:white url(./ExtJs/docs/resources/block-bg.gif) repeat-x;color:#003366;font:bold 13px tahoma,arial,helvetica;padding:10px;margin:0;}
.icon-login {background-image:url(./images/login.png) !important;}
html, body {
	font:normal 12px verdana;
	margin:0;
	padding:0;
	border:0 none;
	overflow:hidden;
	height:100%;
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

.user-add {
    background-image:url(./ExtJS/examples/shared/icons/fam/user_add.gif) !important;
}

.user-delete {
    background-image:url(./ExtJS/examples/shared/icons/fam/user_delete.gif) !important;
}

.connect {
    background-image:url(./ExtJS/examples/shared/icons/fam/connect.gif) !important;
}

.user-girl {
    background-image:url(./ExtJS/examples/shared/icons/fam/user_female.gif) !important;
}

.user-kid {
    background-image:url(./ExtJS/examples/shared/icons/fam/user_green.gif) !important;
}

.user-suit {
    background-image:url(./ExtJS/examples/shared/icons/fam/user_suit.gif) !important;
}

.Chat {
	background-image:url(./images/iconos/comments.png) !important;
}

.Empresa {
    background-image:url(./Images/Iconos/building.png) !important;
}
.icon-login{
	background-image:url(./Images/Iconos/application_key.png) !important;
}
</style>

</head>
<body>

<div id="mask" style="width:100%;height:100%;background:#E5E5E5;position:absolute;z-index:20000;left:0;top:0;">&#160;</div>
  <div id="loading">
   <div class="loading-indicator"><img src="./ExtJS/resources/images/default/grid/loading.gif" style="width:16px;height:16px;" align="absmiddle">&#160;Cargando...
  </div>
</div>
<script language="JavaScript" type="text/javascript">
	var appsname = 'Ingreso';
</script>

<!--<script type="text/javascript" src="./Js/ext-login.js"></script>-->
<?php 
include("Js/Ext-Login.php");
?> 
<div id="login-dlg"></div>
</body>
</html>

