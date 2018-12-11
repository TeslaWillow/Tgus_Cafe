<?php session_start();
  require "config.php";
  require "../funciones.php";

  $conn = conexion($bd_config);
  if(!$conn){
    header("Location: 404.php");
  }
  $resultado_eventos = get_Eventos($conn);
  $resultado_slct_tipo_evento = get_Tipo_Evento($conn);
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["nombre_evento"])){

      $nombre_evento = limpiar_Datos($_POST["nombre_evento"]);
      $resultado_eventos = get_Eventos($conn, $nombre_evento);

    }
  };

  require "views/view.gerente_general.php";
?>
