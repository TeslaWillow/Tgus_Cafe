<?php session_start();
  require "config.php";
  require "../funciones.php";
  //VERIFICA SI EL USUARIO ES CAJERO
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

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // BTN_CREA_FACTURA
    if(
      isset($_POST["codigo_cajero_enviar"]) &&
      isset($_POST["fecha_enviar"]) &&
      isset($_POST["sub_total_enviar"]) &&
      isset($_POST["impuesto_enviar"]) &&
      isset($_POST["total_enviar"])  &&
      isset($_POST["productos_enviar"])  &&
      isset($_POST["cantidad_enviar"])  
    ){
      $fecha = $_POST["fecha_enviar"];
      $sub_total = $_POST["sub_total_enviar"];
      $impuesto = $_POST["impuesto_enviar"];
      $total = $_POST["total_enviar"];
      $codigo_usuario = $_POST["codigo_cajero_enviar"];
      set_Factura($conn, $fecha, $sub_total, $impuesto, $total, $codigo_usuario);
      $id_factura = get_Ultima_Factura($conn);
      $cantidades = $_POST["cantidad_enviar"];
      $productos = $_POST["productos_enviar"];
      set_Factura_X_Producto($conn, $productos, $cantidades, $id_factura);
    };
  }

  require "views/view.cajero.php";
?>
