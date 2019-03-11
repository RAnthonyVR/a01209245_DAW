<?php
    session_start();
    require_once("util.php");
    include("partials/_head.html");
    
    if (isset( $_SESSION["mensaje"])) {
        echo $_SESSION["mensaje"];
        unset($_SESSION["mensaje"]);
    }
    
    $_POST["nombre"] = htmlspecialchars($_POST["nombre"]);
    
    if (isset($_POST["nombre"])) {
        getFruitsByName(isset($_POST["nombre"]));
    } else {
        $result=getFruits();
        include("partials/_preguntas.html");
        echo '<a href="agregar_fruta.php" class="btn btn-primary btn-lg active center" role="button" aria-pressed="true">Agregar Fruta</a>';
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
    }
    include("partials/_footer.html");    
?>