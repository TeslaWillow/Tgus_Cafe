<?php session_start();
  require "config.php";
  require "../funciones.php";
  if($_SESSION["admin"]["ROL"] != "gerente_administrativo"){
    header("Location: ../login.php");
  }
  $conn = conexion($bd_config);
  if(!$conn){
    header("Location: ../404.php");
  }

  $resultado_empleados = get_Empleados($conn);
  // Variables para Select
  $slct_direccion = get_Direccion($conn);
  $slct_puesto = get_Puesto_Empleado($conn);
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // BTN_BUSCAR_EMPLEADOS
    if(isset($_POST["nombre_empleado"])){
      $nombre_empleado = limpiar_Datos($_POST["nombre_empleado"]);
      $resultado_empleados = get_Empleados($conn, $nombre_empleado);
    };

    if(
      isset($_POST["nombre_empleado"]) &&
      isset($_POST["apellido_empleado"]) &&
      isset($_POST["id_empleado"]) &&
      isset($_POST["fecha_ingreso"]) &&
      isset($_POST["sueldo"]) &&
      isset($_POST["slct_direccion"]) &&
      isset($_POST["slct_puesto_empleado"])
    ){
      $nombre_empleado = limpiar_Datos($_POST["nombre_empleado"]);
      $apellido_empleado = limpiar_Datos($_POST["apellido_empleado"]);
      $ID_empleado = limpiar_Datos($_POST["id_empleado"]);
      $fecha_ingreso = limpiar_Datos($_POST["fecha_ingreso"]);
      $codigo_direccion = limpiar_Datos($_POST["slct_direccion"]);
      $codigo_puesto = limpiar_Datos($_POST["slct_puesto_empleado"]);
      $sueldo = limpiar_Datos($_POST["sueldo"]);
      set_empleado($conn, $nombre_empleado, $apellido_empleado, $codigo_direccion, $ID_empleado ,$codigo_puesto, $sueldo, $fecha_ingreso);
    };
  }
  require "views/view.gerente_administrativo.php";
?>
