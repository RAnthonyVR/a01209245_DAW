<?php
  
  function insertFruit($name, $units, $quantity, $price, $country) {
        $bd = conectDb();
        
        // insert command specification 
        $query='INSERT INTO Frutas (name, units, quantity,price,country) VALUES (?,?,?,?,?)';
        // Preparing the statement 
        if (!($statement = $bd->prepare($query))) {
            die("Preparation failed: (" . $bd->errno . ") " . $bd->error);
        }
        
        $name = $bd->real_escape_string($name);
        $units = $bd->real_escape_string($units);
        $quantity = $bd->real_escape_string($quantity);
        $price = $bd->real_escape_string($price);
        $country = $bd->real_escape_string($country);
        
        if (!$statement->bind_param("sssss", $name, $units, $quantity, $price, $country)) {
            die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
        }
         // Executing the statement
         if (!$statement->execute()) {
            die("Execution failed: (" . $statement->errno . ") " . $statement->error);
          } 

        closeDb($bd);
    }
  
  //MODELO Funcion que elimina un registro
  function delete_by_name($fruit_name){
    $conn=conectDb();
    $sql="DELETE FROM Frutas WHERE name='" . $fruit_name . "'";
    $result=mysqli_query($conn,$sql);
    closeDb($conn);
    return $result;
  }
  
  //MODELO Funcion que actualiza un registro
  function update_by_name($name, $units, $quantity, $price, $country){
    $conn=conectDb();
    $sql="UPDATE Frutas SET name='$name', units='$units', quantity='$quantity', price='$price', country='$country' WHERE name LIKE '".$name."'";
    $result=mysqli_query($conn,$sql);
    
    closeDb($conn);
    return $result;
    
  }

  function conectDb(){

  	$conexion=mysqli_connect("localhost","root","","Frutas");
  	//Validar la conexion
  	if($conexion==NULL){
  		die("Error en la conexión");
  	}
  	$conexion->set_charset("utf8");

  	return $conexion;
  }

  //Cierra la base de datos
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

  //Regresa las frutas igual o más baratas del precio dado
  function getCheapestFruits($cheap_price){
    	$con=conectDb();
    	$sql="SELECT name, units, quantity, price, country FROM Frutas WHERE price<='".$cheap_price."'";
    	$result=mysqli_query($con,$sql);
    	closeDb($con);
    	return $result;
    }
    

  
?>