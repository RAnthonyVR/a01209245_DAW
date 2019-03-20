<?php
  include("partials/_head.html");
  require_once("util.php");

  $_POST["precio"] = htmlspecialchars($_POST["precio"]);

  if (isset($_POST["precio"])) {
      getCheapestFruits($_POST["precio"]);
  }else {
      getCheapestFruits();
  }
  include("partials/_footer.html");
?>
