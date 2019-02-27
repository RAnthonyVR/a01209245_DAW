<?php

function calcularHuella($elect, $gaslp, $gasprop) {
    $huella=($elect*181*0.12283503255128)+($gaslp*2.96)+($gasprop*2.94);
    $huella=$huella/1000; //Toneladas de CO2
    return $huella;
}

function clasificacion($huella) {
    if($huella>4){
        return true;
    }else{
        return false;
    }             
}

if(isSet($_POST['calcular'])){
    $_POST["nombre"] = htmlentities($_POST["nombre"]);
    $_POST["correo"] = htmlentities($_POST["correo"]);
    $_POST["elect"] = htmlentities($_POST["elect"]);
    if (isSet($_POST['nombre']) && isSet($_POST['correo'])&& isSet($_POST['elect'])&& isSet($_POST['glp'])&& isSet($_POST['gp'])  && $_POST["elect"] != "" && $_POST["glp"] != ""
           && $_POST["gp"] != "" ) {
        $huella = calcularHuella($_POST['elect'], $_POST['glp'],$_POST['gp']);
        $clasificacion = clasificacion ($huella);
        include('lab11_huellaView.php');

        if (isSet($_GET['huella'])) {
            $huella = $_GET['huella'];
            $clasificacion = clasificacion ($huella);
            include('lab11_huellaView.php');
        }
    }else{
        include("partials/_head.html");
        $error = "Los datos tienen errores";
        include("partials/_index.html");
        include("partials/_footer.html");
    }
}else{
    include("partials/_head.html");
    include("partials/_index.html");
    include("partials/_footer.html");
}

?>