<?php
// Iniciamos uso de sesiones ...
session_start(); 
// aquí metes tu función genera_password
include ("gen_codigo.php");
// llamas a la función para generar un password.
$pass=genera_password(8);
// lo dejamos en una variable de sesión para poderlo leer de forma segura en otro proceso.php ...
$codigo=$_SESSION['mipass']=$pass;
//recogemos el texto por el URL que enviamos a generar desde el link de imagen del HTML de nuestro formulario


//nombres tipografías a usar (sin extensión .ttf)
$tipografias = array("fuente1","fuente2");

//directorio donde estén las fuentes (ruta absoluta) importante el último /
$tipografias_ruta = "C:\WINDOWS\Fonts\\";
// $tipografias_ruta="/home/sito/public_html/fonts/"; linux

//inicializa eje X desde donde se empezará a dibujar el código (referente al tamaño de la caja)
$espacio = 0;

//tamaño fuente.
$tamano_fuente = 20;

//profundidad caracteres/digitos del código a generar (password).
$profundidad_codigo = 6; // (alfanuméricos)

//cálculo Ancho automático de la caja
$x=150;
$y=40;
$angmax = 20;
$hori = 50;
$verti = 100;
// Iniciar la generación de la imagen. Se define una caja de $x por $y pixels.
$im = imagecreate($x, $y);


//definición Colores. Expresados en valores R G B (respectivamente).
$color_fondo = imagecolorallocate($im, 255, 255, 255); // Blanco
$color_texto = imagecolorallocate($im, 0, 0, 0); // Negro



for($caracter=0; $caracter<$profundidad_codigo; $caracter++){
    $rhori = rand(-$hori, $hori);
    $rverti = rand(-$verti, $verti);
    // intento de lineas
    $lineColor = imagecolorallocate($im, 0, 0, 0);
    $lineColor2 = imagecolorallocate($im, 0, 0, 0);
    imagefill($im, 0, 0, $color_fondo);
    //imageline( imagen, separacion izq, separacion superior, largo, inclinacion)

    //linias horizontales
    imageline($im, 0, $rhori, 200, $rhori, $lineColor);
    imageline($im, 0, $rhori+20, 200, $rhori+20, $lineColor);
    // linias verticales, 
    imageline($im, $rverti, 0, 25, 700, $lineColor);
    imageline($im, $rverti+20, 0, 25, 700, $lineColor);

}


for($caracter=0; $caracter<$profundidad_codigo; $caracter++){
  //seleccion de una tipografía aleatoria.
  $indice_aleatorio=array_rand($tipografias);
  $tipografia=$tipografias_ruta.$tipografias[$indice_aleatorio].'.ttf';

  //separación entre caracteres
  $espacio +=$tamano_fuente;
  $ang = rand(-$angmax, $angmax); 
  //generar el caracter gráfico.
  //imagettftext($im, $tamano_fuente, 0, $espacio, $tamano_fuente, $color_texto, $tipografia , $codigo{$caracter});
 // imagefttext($im, $tamano_fuente, $ang, $espacio, 30, $color_texto, $tipografia, $codigo{$caracter});
  
}

//cabecera HTTP la cual indica al navegador que la imagen que estamos generando es .PNG
header('Content-type: image/png');

//genera un png dinámico
imagepng($im);
//destruye la imagen del servidor
imagedestroy($im);
?>