<?php session_start();
  require "config.php";
  require "../funciones.php";

  if($_SESSION["admin"]["ROL"] != "gerente_general"){
    header("Location: ../login.php");
  }
  $conn = conexion($bd_config);
  $user = $_SESSION["admin"];
  if(!$conn){
    header("Location: ../404.php");
  }
  // VARIABLES PARA: TABLAS
  $resultado_eventos = get_Eventos($conn);
  // VARIABLES PARA: SELECTS
  $resultado_slct_tipo_evento = get_Tipo_Evento($conn);
  $resultado_slct_reservado_por = get_Reservado_Por($conn);
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // BTN_BUSCAR_EVENTO
    if(isset($_POST["nombre_evento"])){
      $nombre_evento = limpiar_Datos($_POST["nombre_evento"]);
      $resultado_eventos = get_Eventos($conn, $nombre_evento);
    };
    // Doble comprobacion si todos los datos son recibidos
    if(
       isset($_POST["btn_insertar_evento"]) &&
       isset($_POST["nuevo_nombre_evento"]) &&
       isset($_POST["fecha_evento"]) &&
       isset($_POST["hora_inicio"]) &&
       isset($_POST["minuto_inicio"]) &&
       isset($_POST["hora_fin"]) &&
       isset($_POST["minuto_fin"]) &&
       isset($_POST["slct_tipo_evento"]) &&
       isset($_POST["slct_reservado_por"])
     ){
       $nombre_evento = limpiar_Datos($_POST["nuevo_nombre_evento"]);
       $fecha_evento = $_POST["fecha_evento"];
       $hora_inicio = sanear_Horas($_POST["hora_inicio"], $_POST["minuto_inicio"]);
       $hora_fin = sanear_Horas($_POST["hora_fin"], $_POST["minuto_fin"]);
       $ID_user = get_Codigo_Usuario($conn,$user);
       $ID_cliente = $_POST["slct_reservado_por"];
       $ID_tipo_evento = $_POST["slct_tipo_evento"];

       set_Evento(
         $conn, $nombre_evento, $fecha_evento,
         $hora_inicio, $hora_fin, $ID_user,
         $ID_cliente, $ID_tipo_evento
       );
     }
  };

  require "views/view.gerente_general.php";
?>
