<?php

  function conectDb(){

  	$conexion=mysqli_connect("localhost","root","","Frutas");
  	//Validar la conexion
  	if($conexion==NULL){
  		die("Error en la conexión");
  	}
  	$conexion->set_charset("utf8");

  	return $conexion;
  }

  //ciErra la base de datos
  function closeDb ($conexion){
  	mysqli_close($conexion);
  }

  //Obtiene todo los objetos de la base de datos
  function getFruits(){
  	$conn=conectDb();
  	$sql="SELECT name, units, quantity, price, country FROM Frutas";
  	$result = mysqli_query($conn, $sql);
  	closeDb($conn);
  	return $result;
  }

  //Consulta de frutas por su nombre
  function getFruitsByName($fruit_name){
  	$conn=conectDb();
  	$sql="SELECT name, units, quantity, price, country FROM Frutas WHERE name Like '%".$fruit_name."%'";
  	$result=mysqli_query($conn,$sql);
  	
  	if(mysqli_num_rows($result)>0){
      echo '<table><thead><h2>Frutas con ese nombre</h2><tr><th>Nombre</th><th>Unidad(es)</th><th>Cantidad(es)</th><th>Precio</th><th>País</th></tr></thead><tbody>';

    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result)){
      echo '<tr>';
      echo '<td>'.$row["name"].'</td>';
      echo '<td>'.$row["units"].'</td>';
      echo '<td>'.$row["quantity"].'/<td>';
      echo '<td>'.$row["price"].'</td>';
      echo '<td>'.$row["country"].'</td>';
      echo '</tr>';
    }
  }else{
    echo '<p>No existe una fruta con ese nombre</p>';
  }
    echo '</tbody></table>';
    mysqli_free_result($result); //Se libera la variable de memoria

  	closeDb($conn);
  	return $result;
  }

  //Regresa las frutas igual o más baratas del precio dado
  function getCheapestFruits($cheap_price){
  	$conn=conectDb();
  	$sql="SELECT name, units, quantity, price, country FROM Frutas WHERE price <= '".$cheap_price."'";
  	$result=mysqli_query($conn,$sql);
  	
  	if(mysqli_num_rows($result)>0){
      echo '<table><thead><h2>Frutas menor o igual al precio dado</h2><tr><th>Nombre</th><th>Unidad(es)</th><th>Cantidad(es)</th><th>Precio</th><th>País</th></tr></thead><tbody>';

    //Imprimir cada fila
    while($row=mysqli_fetch_assoc($result)){
      echo '<tr>';
      echo '<td>'.$row["name"].'</td>';
      echo '<td>'.$row["units"].'</td>';
      echo '<td>'.$row["quantity"].'</td>';
      echo '<td>'.$row["price"].'</td>';
      echo '<td>'.$row["country"].'</td>';
      echo '</tr>';
    }
  }else{
    echo '<p>No existe una fruta con ese nombre</p>';
  }
    echo '</tbody></table>';
    mysqli_free_result($result); //Se libera la variable de memoria
  	closeDb($conn);
  	return $result;
  }
  
?>
