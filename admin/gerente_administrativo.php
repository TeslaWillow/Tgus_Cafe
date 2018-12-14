<?php session_start();
  require "config.php";
  require "../funciones.php";
  //VERIFICA SI EL USUARIO ES GERENTE ADMINISTRATIVO
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
  $slct_empleado = get_Empleado($conn);
  $slct_tipo_usuario = get_Tipo_Usuario($conn);
  // Variable para errores
  $err = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // BTN_BUSCAR_EMPLEADOS
    if(isset($_POST["nombre_empleado"])){
      $nombre_empleado = limpiar_Datos($_POST["nombre_empleado"]);
      $resultado_empleados = get_Empleados($conn, $nombre_empleado);
    };
    //Condicional para validar si todos los campos para ingresar empleado estan llenos
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
    //Condicional para validar si todos los campos para ingresar usuario estan llenos
    if(
      isset($_POST["nombre_usuario"]) &&
      isset($_POST["pass"]) &&
      isset($_POST["repeat_password"]) &&
      isset($_POST["slct_empleado"]) &&
      isset($_POST["slct_tipo_usuario"]) 
    ){
      $nombre_usuario = limpiar_Datos($_POST["nombre_usuario"]);
      $pass = limpiar_Datos($_POST["pass"]);
      $repeat_password = limpiar_Datos($_POST["repeat_password"]);
      $codigo_empleado = limpiar_Datos($_POST["slct_empleado"]);
      $codigo_tipo_empleado = limpiar_Datos($_POST["slct_tipo_usuario"]);
      if($pass == $repeat_password){
        $pass = hash("sha512", $pass);
        set_Usuario($conn, $nombre_usuario, $pass, $codigo_empleado, $codigo_tipo_empleado);
        $slct_empleado = get_Empleado($conn);
      }else{
        $err = "Las contraseñas no coinciden";
      }
    };
  }
  require "views/view.gerente_administrativo.php";
?>
