<?php
session_start();
$URL_Tab = $_REQUEST["URL_Tab"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Frame</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.loading-indicator{font-size:8pt;background-image:url('../ExtJS/resources/images/default/grid/loading.gif');background-repeat:no-repeat;background-position:top left;padding-left:20px;height:18px;text-align:left;}
#div1{
position:absolute;
z-index:2;
width: 1090px;
}
#div2{
	position:absolute;
	   
/*	left:50px;*/
	z-index:1;
	top:10px;
 	left: 10px;
	background-color:#CCC;
	border: 3px solid #000;
}

</style>
</head>
<body>

<!--<div id="div1">-->
<iframe name="myIframe_" src="<?php echo $URL_Tab; ?>" width="100%" height="99%" frameborder="0" style="vertical-align:top;" scrolling="yes"></iframe>
<!--</div>-->
<!--<div id="div2">
<img src="../ExtJS/resources/images/default/grid/loading.gif" style="width:16px;height:16px;" align="absmiddle">cargando..
</div>-->
</body>
</html>