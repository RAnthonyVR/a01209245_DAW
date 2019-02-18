<?php 
	require_once("util.php");
	encabezado(); 
    
titulo("Promedio de un arreglo");

function promedio($arreglo){
    $suma = 0;
    $promedioArray = 0;
    $tamanio=count($arreglo);
    for($i=0; $i < $tamanio; $i++) { 
        $suma += $arreglo[$i];
    } 
    $promedioArray = $suma/$tamanio;
    return $promedioArray;
}

$arrString=$_POST["arreglo"];
$arr = explode(",", $arrString);
echo '<section> <div> <h2>Calcular Promedio</h2>';
echo 'El promedio del arreglo es: ' . promedio($arr).'</div></section>';

regresarPagina();

require_once("util.php");
footer();  ?>