<?php include("head.html"); 
    
?>

<h1>Mediana de un arreglo</h1>
<?php

$arrString=$_POST["arreglo"];
$arr = explode(",", $arrString);
echo '<section><div><h2>Calcular mediana</h2>';
sort($arr);
$tamanio=count($arr);
$mediana=floor($tamanio/2);
echo "La  mediana del arreglo es: ". $arr[$mediana] . "</div></section>";
           
?>
<a href="index.php">Volver al index</a>

<?php include("footer.html"); ?>