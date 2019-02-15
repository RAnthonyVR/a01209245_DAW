<?php include("head.html"); 
    
?>

<h1>Promedio de un arreglo</h1>
<?php

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

?>
<a href="index.php">Volver al index</a>

<?php include("footer.html"); ?>