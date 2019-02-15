<?php include("head.html");

?>

<h1>Cuadrados y cubos del número ingresado</h1>
<?php


$num=$_POST["potencia"];
$texto= '<tr><th> Número </th><th>Cuadrado</th><th>Cubo</th></tr></tr>';
for ($i = 1; $i <= $num; $i++) {
    $texto .= "<tr><td>" . $i . "</td><td>" . ($i*$i) . "</td><td>" . ($i*$i*$i) . "</td></tr>";
}
echo "<table border=1>" . $texto . "</table>";
echo '<br><br><a href="index.html"> Regresar a la página principal</a>';


?>
<a href="index.php">Volver al index</a>

<?php include("footer.html"); ?>
