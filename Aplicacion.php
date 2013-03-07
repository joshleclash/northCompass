<?php
session_start();
include('conexion.php');
$_SESSION["Csc"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="it">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>North Compass Colombia</title>
<link rel="shortcut icon" href="./images/icono.ico" />

<link rel="stylesheet" type="text/css" href="./ExtJS/resources/css/ext-all.css">
<link rel="stylesheet" type="text/css" href="./ExtJS/resources/css/xtheme-gray.css">
<!-- GC -->
<!-- LIBS -->
<script type="text/javascript" src="ExtJS/adapter/ext/ext-base.js"></script>
<!-- ENDLIBS -->
<script type="text/javascript" src="ExtJS/ext-all.js"></script>
<script type="text/javascript" src="./ExtJs/ext-lang-sp.js"></script>

<style>
html, body {margin:0;padding:0;border:0 none;overflow:hidden;height:100%; background-image:url(Images/Background.jpg);}
#class .loading-indicator{font-size:12px;height:18px;}
.loading-indicator{font-size:8pt;background-image:url('./ExtJS/resources/images/default/grid/loading.gif');background-repeat:no-repeat;background-position:top left;padding-left:20px;height:18px;text-align:left;}
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
<script type="text/javascript" src="./Js/Ext-Aplicacion.js"></script>
<link href="css-dock-menu/style.css" rel="stylesheet" type="text/css" />
<style>
body{ background: url(Images/Background01.jpg)}
</style>
<div id="west" class="x-hide-display">
    <p>Menu NorthCompas</p>
</div>

<div id="Menu-A" class="x-hide-display">
    <p>Menu A.</p>
</div>

<div id="tree-div" class="x-hide-display"></div>

<div id="north">
<table width="100%" height="40" border="0" cellspacing="0" cellpadding="0" valign="top">
<tr>
<td width="25%" style=" padding-left:10px; padding-top:5px;"><img src="Images/LOGO002.png" border="0"></td>
<td width="50%" ></td>
<td width="25%" style="padding-right:10px; font-size:10px" align="right"><span><a href="./pass.php?acces=0">
<img src="Images/Iconos/lock_open.png" alt="Cerrar sesion." width="16" height="16" border="0"><?php //session_destroy(); ?>
</a></td>
</tr>
</table>		  
</div>

<div id="center2" class="x-hide-display">
    <a id="hideit" href="#">Toggle the west region</a>
    <p>My closable attribute is set to false so you can't close me. The other center panels can be closed.</p>
    <p>The center panel automatically grows to fit the remaining space in the container that isn't taken up by the border regions.</p>
    <hr>
<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed metus nibh, sodales a, porta at, vulputate eget, dui. Pellentesque ut nisl. Maecenas tortor turpis, interdum non, sodales non, iaculis ac, lacus. Vestibulum auctor, tortor quis iaculis malesuada, libero lectus bibendum purus, sit amet tincidunt quam turpis vel lacus. In pellentesque nisl non sem. Suspendisse nunc sem, pretium eget, cursus a, fringilla vel, urna. Aliquam commodo ullamcorper erat. Nullam vel justo in neque porttitor laoreet. Aenean lacus dui, consequat eu, adipiscing eget, nonummy non, nisi. Morbi nunc est, dignissim non, ornare sed, luctus eu, massa. Vivamus eget quam. Vivamus tincidunt diam nec urna. Curabitur velit. Quisque dolor magna, ornare sed, elementum porta, luctus in, leo.</p>
<p>Donec quis dui. Sed imperdiet. Nunc consequat, est eu sollicitudin gravida, mauris ligula lacinia mauris, eu porta dui nisl in velit. Nam congue, odio id auctor nonummy, augue lectus euismod nunc, in tristique turpis dolor sed urna. Donec sit amet quam eget diam fermentum pharetra. Integer tincidunt arcu ut purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla blandit malesuada odio. Nam augue. Aenean molestie sapien in mi. Suspendisse tincidunt. Pellentesque tempus dui vitae sapien. Donec aliquam ipsum sit amet pede. Sed scelerisque mi a erat. Curabitur rutrum ullamcorper risus. Maecenas et lorem ut felis dictum viverra. Fusce sem. Donec pharetra nibh sit amet sapien.</p>
<p>Aenean ut orci sed ligula consectetuer pretium. Aliquam odio. Nam pellentesque enim. Nam tincidunt condimentum nisi. Maecenas convallis luctus ligula. Donec accumsan ornare risus. Vestibulum id magna a nunc posuere laoreet. Integer iaculis leo vitae nibh. Nam vulputate, mauris vitae luctus pharetra, pede neque bibendum tellus, facilisis commodo diam nisi eget lacus. Duis consectetuer pulvinar nisi. Cras interdum ultricies sem. Nullam tristique. Suspendisse elementum purus eu nisl. Nulla facilisi. Phasellus ultricies ullamcorper lorem. Sed euismod ante vitae lacus. Nam nunc leo, congue vehicula, luctus ac, tempus non, ante. Morbi suscipit purus a nulla. Sed eu diam.</p>
<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras imperdiet felis id velit. Ut non quam at sem dictum ullamcorper. Vestibulum pharetra purus sed pede. Aliquam ultrices, nunc in varius mattis, felis justo pretium magna, eget laoreet justo eros id eros. Aliquam elementum diam fringilla nulla. Praesent laoreet sapien vel metus. Cras tempus, sapien condimentum dictum dapibus, lorem augue fringilla orci, ut tincidunt eros nisi eget turpis. Nullam nunc nunc, eleifend et, dictum et, pharetra a, neque. Ut feugiat. Aliquam erat volutpat. Donec pretium odio nec felis. Phasellus sagittis lacus eget sapien. Donec est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
<p>Vestibulum semper. Nullam non odio. Aliquam quam. Mauris eu lectus non nunc auctor ullamcorper. Sed tincidunt molestie enim. Phasellus lobortis justo sit amet quam. Duis nulla erat, varius a, cursus in, tempor sollicitudin, mauris. Aliquam mi velit, consectetuer mattis, consequat tristique, pulvinar ac, nisl. Aliquam mattis vehicula elit. Proin quis leo sed tellus scelerisque molestie. Quisque luctus. Integer mattis. Donec id augue sed leo aliquam egestas. Quisque in sem. Donec dictum enim in dolor. Praesent non erat. Nulla ultrices vestibulum quam.</p>
<p>Duis hendrerit, est vel lobortis sagittis, tortor erat scelerisque tortor, sed pellentesque sem enim id metus. Maecenas at pede. Nulla velit libero, dictum at, mattis quis, sagittis vel, ante. Phasellus faucibus rutrum dui. Cras mauris elit, bibendum at, feugiat non, porta id, neque. Nulla et felis nec odio mollis vehicula. Donec elementum tincidunt mauris. Duis vel dui. Fusce iaculis enim ac nulla. In risus.</p>
<p>Donec gravida. Donec et enim. Morbi sollicitudin, lacus a facilisis pulvinar, odio turpis dapibus elit, in tincidunt turpis felis nec libero. Nam vestibulum tempus ipsum. In hac habitasse platea dictumst. Nulla facilisi. Donec semper ligula. Donec commodo tortor in quam. Etiam massa. Ut tempus ligula eget tellus. Curabitur id velit ut velit varius commodo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla facilisi. Fusce ornare pellentesque libero. Nunc rhoncus. Suspendisse potenti. Ut consequat, leo eu accumsan vehicula, justo sem lobortis elit, ac sollicitudin ipsum neque nec ante.</p>
<p>Aliquam elementum mauris id sem. Vivamus varius, est ut nonummy consectetuer, nulla quam bibendum velit, ac gravida nisi felis sit amet urna. Aliquam nec risus. Maecenas lacinia purus ut velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sit amet dui vitae lacus fermentum sodales. Donec varius dapibus nisl. Praesent at velit id risus convallis bibendum. Aliquam felis nibh, rutrum nec, blandit non, mattis sit amet, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam varius dignissim nibh. Quisque id orci ac ante hendrerit molestie. Aliquam malesuada enim non neque.</p>
</div>

<div id="center1" class="x-hide-display">
<p><b><?php echo "aqui va la variable de ssesion" ?></b></p>
</div>

<div id="props-panel" style="width:200px;height:200px;overflow:hidden;" class="x-hide-display">
</div>

<div id="south" class="x-hide-display">
<p>Inferior</p>
</div>
<!-- #INCLUDE FILE="./Footer.asp" -->