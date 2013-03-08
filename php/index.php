<?php
// inicio uso sesiones.
session_start();
// aquí metes tu función genera_password
include ("gen_codigo.php");
// llamas a la función para generar un password.
$pass=genera_password(8);
// lo dejamos en una variable de sesión para poderlo leer de forma segura en otro proceso.php ...
$_SESSION['mipass']=$pass;
?>
<html>
</head>
</head>
<body>
<!-- .. etc y tu formulario con -->
<form action="procesa.php" method="POST">

<!-- la imagen generada con nuestro password ... -->
<label style="background-image:url(antispam.php)"><?php echo '<font size="9px" face="Georgia, Times New Roman, Times, serif">'.$pass.'</font>'; ?></label>




</form>
</body>
</html>