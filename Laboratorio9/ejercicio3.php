<?php 
	require_once("util.php");
	encabezado(); 
    

titulo("Enlistar en arreglo");

$arrString=$_POST["arreglo"];
$arr = explode(",", $arrString);

echo '<section><div><h2>Enlistar en orden</h2>';
echo "<ul>";
$sum = 0;
$tamanio=count($arr);
for($i = 0;$i < $tamanio;$i++){
    echo "<li>";
    $sum += $arr[$i];
    echo "".$arr[$i]."</li>";
}
echo "</ul>";

echo "El promedio es: ".($sum)/$tamanio;
echo "<br>";
            
$mediana=floor($tamanio/2);
echo "La  mediana del arreglo es: ". $arr[$mediana];
echo "<br>";
echo "Arreglo ordenado de menor a mayor: ";
sort($arr);
for($i=0;$i <$tamanio;$i++){
    echo "$arr[$i]";
}
echo "<br>";
echo "Arreglo ordenado de mayor a menor: ";
rsort($arr);
for($i = 0;$i <$tamanio;$i++){
    echo "$arr[$i] ";
}
echo "<br>";
echo "</div></section>";
  
regresarPagina();

footer();  

?>