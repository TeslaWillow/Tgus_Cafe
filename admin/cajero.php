<?php session_start();
  require "config.php";
  require "../funciones.php";

  $conn = conexion($bd_config);
  if(!$conn){
    header("Location: ../404.php");
  }

  $slct_producto = get_Producto($conn);
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

  }
  require "views/view.cajero.php";
?>
