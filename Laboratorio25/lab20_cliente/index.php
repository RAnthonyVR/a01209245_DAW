<?php
    $name = "Tony";
    $consulta = "si";
    $precio=40;
    //$url = "https://daw-em19-ejuarezp.c9users.io/lab25servicio/public/index.php/$name"; //Route to the REST web service
    $url = "https://a01209245-tony98.c9users.io/servicio/public/index.php/$name/$consulta/$precio"; //Route to the REST web service
    $c = curl_init($url);
    $response = curl_exec($c);
    curl_close($c);
    //var_dump($response); 
?>