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

    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];

    if (isSet($_POST['nombre']) && isSet($_POST['correo'])&& isSet($_POST['elect'])&& isSet($_POST['glp'])&& isSet($_POST['gp'])) {
        $huella = calcularHuella($_POST['elect'], $_POST['glp'],$_POST['gp']);
        $clasificacion = clasificacion ($huella);
        include('lab11_huellaView.php');
    }
        
    if (isSet($_GET['huella'])&&isSet($_POST['nombre']) && isSet($_POST['correo'])&& isSet($_POST['elect'])&& isSet($_POST['glp'])&& isSet($_POST['gp'])) {
        $huella = $_GET['huella'];
        $clasificacion = clasificacion ($huella);
        include('lab11_huellaView.php');
    }
?>