<?php
    
    function encabezado() {
        include("partials/_head.html");
    }

    function titulo($titulo) {
        echo "<h1>$titulo</h1>";
    }

    function regresarPagina() {
        echo "<a href='index.php'>Volver al index</a>";
    }

    function indice() {
        include("partials/_index.html");
    }
    
     function footer() {
        include("partials/_footer.html");
    }

    

?>