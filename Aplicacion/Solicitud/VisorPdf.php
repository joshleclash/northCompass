<?php
include("Conexion.php");
$Csc=$_REQUEST['csc'];
$PdfSelect="select * from Pdf where Csc_Pdf='".$Csc."'";
	db('northcompas', $link);
		$PdfResult=mysql_query($PdfSelect);
			$PdfRS=mysql_fetch_array($PdfResult);
			$Csc_Pdf=$PdfRS['Csc_Pdf'];
			$PdfFile=$PdfRS['PdfFile'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<iframe src="UploadPdf/<?php echo $PdfFile;?>" width="90%" height="85%" ></iframe>
<br/>
<p style="font:Verdana, Geneva, sans-serif; size:12px; color:#cc0000">NorthCompass <font size="-2">Todos los derechos reservados</font></p>
</body>
</html>
