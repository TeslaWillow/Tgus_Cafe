<?php session_start();
  require "config.php";
  require "../funciones.php";

  if(!$_SESSION["admin"]["ROL"] != "contador"){
    header("Location: ../login.php");
  }
  $conn = conexion($bd_config);
  if(!$conn){
    header("Location: ../404.php");
  }
  $resultado_ventas = get_Reporte_Ventas($conn);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // BTN_BUSCAR_VENTAS
    if(isset($_POST["nombre_producto"])){
      $nombre_producto = limpiar_Datos($_POST["nombre_producto"]);
      $resultado_ventas = get_Reporte_Ventas($conn, $nombre_producto);
    };
  }
  require "views/view.contador.php";
?>
