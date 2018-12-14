<?php session_start();
  require "config.php";
  require "../funciones.php";

  if($_SESSION["admin"]["ROL"] != "cajero"){
    header("Location: ../login.php");
  }
  $conn = conexion($bd_config);
  if(!$conn){
    header("Location: ../404.php");
  }

  $slct_producto = get_Producto($conn);
  $fecha = get_Date($conn);
  $nombre_usuario = $_SESSION["admin"]["NOMBRE"];
  $codigo_usuario = get_Codigo_Usuario($conn, $nombre_usuario);
  require "views/view.cajero.php";
?>
