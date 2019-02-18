<?php 
	require_once("util.php");
	encabezado(); 
    
titulo("Enlistar en arreglo");

$num=$_POST["potencia"];
$texto= '<tr><th> Número </th><th>Cuadrado</th><th>Cubo</th></tr></tr>';
for ($i = 1; $i <= $num; $i++) {
    $texto .= "<tr><td>" . $i . "</td><td>" . ($i*$i) . "</td><td>" . ($i*$i*$i) . "</td></tr>";
}
echo "<table border=1>" . $texto . "</table>";



regresarPagina();

footer();  

?>
