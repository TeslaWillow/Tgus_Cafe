<?php session_start();
  require "config.php";
  require "../funciones.php";

  $conn = conexion($bd_config);
  if(!$conn){
    header("Location: 404.php");
  }
  
  require "views/view.gerente_administrativo.php";
?>
