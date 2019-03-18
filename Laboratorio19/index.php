<?php
  include("partials/_head.html");
  require_once ("util.php");
  $result=getFruits();
  include("partials/_preguntas.html");
  
  echo '<div class="text-center"><a href="agregar_fruta.php" class="btn btn-primary btn-lg active align-middle" role="button" aria-pressed="true">Agregar Fruta</a><div class="text-center">';
  echo '<hr>';
  include("ajaxView.html");
  include("partials/_formEliminar.html");
  include("partials/_formEditar.html");
  
  if(mysqli_num_rows($result)>0){
    echo '<table><thead><h2>Listado de todas las frutas</h2><tr><th>Nombre</th><th>Unidad(es)</th><th>Cantidad(es)</th><th>Precio Por Unidad</th><th>País de origen</th></tr></thead><tbody>';

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
  }
    echo '</tbody></table>';
    
    mysqli_free_result($result); //Se libera la variable de memoria
     echo '<hr>';
    //Forma para buscar por nombre
    echo '<h2>Buscar fruta por nombre: </h2>';
    include("partials/_formNombre.html");
     echo '<hr>';
    //Forma para buscar por precio
    echo '<h2>Buscar fruta igual o menor al precio ingresado: </h2>';
    include("partials/_formPrecio.html");
    echo '<hr>';

    include("partials/_footer.html");
?>
