<?php
  
  require_once("util.php");

  $_POST["precio"] = htmlspecialchars($_POST["precio"]);

  if (isset($_POST["precio"])) {
      getCheapestFruits($_POST["precio"]);
  }else {
      getCheapestFruits();
  }
  
  
  /*CONTROLADOR*/
  //Funcion para insertar frutas
  function insert_fruit(){
    $name=$_POST['nameFruit'];
    $units=$_POST['unitsFruit'];
    $quantity=$_POST['quantityFruit'];
    $price=$_POST['priceFruit'];
    $country=$_POST['countryFruit'];
    
    //Validación de datos
    if(strlen($name)>0 && strlen($units)>0 && strlen($quantity)>0 && strlen($price)>0&& strlen($country)>0){
      if(is_numeric($quantity)&&is_numeric($price)){
        if(insertFruit($name,$units,$quantity,$price,$country)){
          //Se cargaron los datos
        }else{
          //Error al cargar las datos
        }
        
      }
    }else{
      //error "Falta llenar todos los campos"
    }
  }
  
   /*CONTROLADOR*/
   //Funcion para eliminar un registro
  function delete_fruit(){
    $name=$_POST['nameFruit'];
    
    if(delete_by_name($name)){
      //Se eliminó
    }else{
      //Error
    }
  }
  
  /*CONTROLADOR*/
   //Funcion para actualizar un registro
  function update_fruit(){
    $id=htmlspecialchars($_POST['id']);
    $name=htmlspecialchars($_POST['nombre']);
    $units=htmlspecialchars($_POST['unidades']);
    $quantity=htmlspecialchars($_POST['cantidad']);
    $price=htmlspecialchars($_POST['precio']);
    $country=htmlspecialchars($_POST['pais']);
    
    //Validación de datos
    if(strlen($name)>0 && strlen($units)>0 && strlen($quantity)>0 && strlen($price)>0&& strlen($country)>0){
      if(is_numeric($quantity)&&is_numeric($price)){
        if(update_by_id($id,$name,$units,$quantity,$price,$country)){
          //Se cargaron los datos
        }else{
          //Error al cargar las datos
        }
        
      }
    }else{
      //error "Falta llenar todos los campos"
    }
    
  }
?>
