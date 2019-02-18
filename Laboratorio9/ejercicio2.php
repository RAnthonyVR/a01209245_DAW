<?php 
	require_once("util.php");
	encabezado(); 
    

titulo("Mediana de un arreglo");

$arrString=$_POST["arreglo"];
$arr = explode(",", $arrString);
echo '<section><div><h2>Calcular mediana</h2>';
sort($arr);
$tamanio=count($arr);
$mediana=floor($tamanio/2);
echo "La  mediana del arreglo es: ". $arr[$mediana] . "</div></section>";
           
regresarPagina();

footer();  
?>