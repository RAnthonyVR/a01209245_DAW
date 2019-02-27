<?php 
    require_once("util.php");
    encabezado(); 
    titulo("Resultados de tu huella de carbono");
?>

//Aquí se previene el XSS

    <body>
        <p>Tus resultados son:</p>
        <p>
            Hola <?php echo htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?> ! Tu huella de carbono es de: <strong><?php echo htmlspecialchars($huella, ENT_QUOTES, 'UTF-8') ?></strong> toneladas de CO2 al año.
        </p>
        <p>La huella media por persona en Estados Unidos es de 16.49 toneladas. La huella de carbono media mundial es de unas 4 toneladas.</p>

        <?php 
        if($clasificacion){
            echo "Debido a que tu huella es alta podrias usar focos ahorradores y calentadores solares.";
        }
        
        regresarPagina(); 

        require_once("util.php");
        footer();
        ?>


  
