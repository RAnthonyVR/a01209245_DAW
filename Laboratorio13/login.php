<?php
    session_start();
    if(empty ($_SESSION["username"]))
    {
        if(empty($_POST["username"]))
        {
            header('Location: index.php');
        }
        else
        {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
        }
    }
    if(htmlspecialchars($_POST["username"]) == "Tony" && htmlspecialchars($_POST["password"]) == "1234"){
        if(($_SESSION["username"] == "Tony")&&($_SESSION["password"] == "1234")) {
          include("partials/_head.html");
          include("partials/_subirImagen.html");
	        include("partials/_footer.html");
    	}
    }else if(isset($_POST["usuario"]) || isset($_POST["password"]) ) {
        $error = "Datos incorrectos";
        include("index.php");
    } else {
        include("index.php");
    }
?>
