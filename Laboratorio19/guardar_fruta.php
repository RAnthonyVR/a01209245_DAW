<?php
    require_once("util.php");
    
    $name=htmlspecialchars($_POST["nombre"]);
    $units=htmlspecialchars($_POST["unidades"]);
    $quantity=htmlspecialchars($_POST["cantidad"]);
    $price=htmlspecialchars($_POST["precio"]);
    $country=htmlspecialchars($_POST["pais"]);
    
    //Validación de datos
    if(isset($_POST["nombre"]) && isset($_POST["nombre"]) != "" &&
        isset($_POST["unidades"]) && isset($_POST["unidades"]) != "" &&
        isset($_POST["cantidad"]) && isset($_POST["cantidad"]) != "" &&
        isset($_POST["precio"]) && isset($_POST["precio"]) != "" &&
        isset($_POST["pais"]) && isset($_POST["pais"]) != ""){
      if(is_numeric($quantity)&&is_numeric($price)){
        /*if(*/insertFruit($name,$units,$quantity,$price,$country);//){
          //Se cargaron los datos
          include("index.php");
          header('Location: '.$_SERVER['HTTP_REFERER']); //Regresar a donde fue la petición
        //}else{
          //Error al cargar las datos
        //}
        
      }
    }else{
      //error "Falta llenar todos los campos"
      header("location:agregar_fruta.php");
    }
?>