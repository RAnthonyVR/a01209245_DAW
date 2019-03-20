<?php
/*
require_once("util.php");

$pattern=$_GET['pattern'];
//$words=array();
$words=getCheapestFruits($pattern);
$text="";

if(mysqli_num_rows($words)>0){
    $text.="<table><thead><h2>Frutas menor o igual al precio dado</h2><tr><th>Nombre</th><th>Unidad(es)</th><th>Cantidad(es)</th><th>Precio</th><th>País</th></tr></thead><tbody>";
    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($words)){
      $text.= '<tr>';
      $text.= '<td>'.$row["name"].'</td>';
      $text.= '<td>'.$row["units"].'</td>';
      $text.= '<td>'.$row["quantity"].'</td>';
      $text.= '<td>'.$row["price"].'</td>';
      $text.= '<td>'.$row["country"].'</td>';
      $text.= '</tr>';
    }
}else{
    $text.= '<p>No existe una fruta con ese precio</p>';
}
    $text.= '</tbody></table>';

echo $response;*/

require_once ("util.php");
$pattern=$_GET['pattern'];
$words=getCheapestFruits($pattern);
$text="";
$size=0;
for($i=0; $i<mysqli_num_rows($words); $i++)
{
    $row=mysqli_fetch_assoc($words);
    if($size==0){
        $text.="<div class=container>";
        $text.="<table>";
        $text.= "<tr>";
        $text.="<td>Nombre</td>";
        $text.="<td>Unidades</td>";
        $text.="<td>Cantidad</td>";
        $text.="<td>Precio</td>";
        $text.="<td>Pais</td>";
    }
        $size++;
        $text.="<tr>";
        $text.="<td>".$row["name"]."</td>";
        $text.="<td>".$row["units"]."</td>";
        $text.="<td>".$row["quantity"]."</td>";
        $text.="<td>".$row["price"]."</td>";
        $text.="<td>".$row["country"]."</td>";
        $text.="</tr>";
}

$text.="</table>";
if($size>0){
    echo $text;
}
else{
    $text.="<h6 class=\"center\">No existe fruta que tenga un precio igual o menor</h6>";
    echo $text;
}

?>