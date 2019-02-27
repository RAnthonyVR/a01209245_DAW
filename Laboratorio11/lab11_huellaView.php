<?php 
    require_once("util.php");
    encabezado(); 
    titulo("Resultados de tu huella de carbono");
?>

//Aquí se previene el XSS

    <body>
        <p>Tus resultados son:</p>
        <p>
<<<<<<< HEAD
            ¡Hola <?php echo htmlspecialchars (htmlentities($_POST["nombre"]), ENT_QUOTES, 'UTF-8') ?>! Tu huella de carbono es de: <strong><?php echo htmlspecialchars ($huella, ENT_QUOTES, 'UTF-8') ?></strong> toneladas de CO2 al año.
=======
            Hola <?php echo htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8') ?> ! Tu huella de carbono es de: <strong><?php echo htmlspecialchars($huella, ENT_QUOTES, 'UTF-8') ?></strong> toneladas de CO2 al año.
>>>>>>> 5d2c69d0489fe4dbba1010dac7ad70d544d44b4a
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


  
