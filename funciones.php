<?php
require "admin/config.php";

function conexion($bd_config){
  try {
    $conn = new PDO("mysql:host=localhost;dbname=".$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
    return $conn;
  }
  catch (Exception $e) {
    return false;
  }
}

function acceso_Usuario($user, $pass, $conn){
  $sent = $conn -> prepare("
  SELECT A.NOMBRE_USUARIO, A.CONTRASENA, B.TIPO_USUARIO
  FROM tbl_usuarios A, tbl_tipo_usuario B
  WHERE A.CODIGO_TIPO_USUARIO = B.CODIGO_TIPO_USUARIO
  AND A.NOMBRE_USUARIO LIKE '$user'
  AND A.CONTRASENA = '$pass';
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  if(!empty($resultado)){
    if($resultado[0]['NOMBRE_USUARIO'] == $user && $resultado[0]['CONTRASENA'] == $pass){
      return $resultado;
    }
  }
}

function limpiar_Datos($datos){
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}

function comprobar_Usuario_Temp($usuario, $pass){
  $gerente_general = [
    "usuario" => 'gerente_general',
    "pass" => '123'
  ];
  $gerente_administrativo = [
    "usuario" => 'gerente_administrativo',
    "pass" => '456'
  ];
  $contador = [
    "usuario" => 'contador',
    "pass" => '789'
  ];
  $cajero = [
    "usuario" => 'cajero',
    "pass" => '101112'
  ];

  $respuesta = false;
  if($gerente_general["usuario"] == $usuario && $gerente_general["pass"] == $pass){
    $respuesta = true;
  } elseif($gerente_administrativo["usuario"] == $usuario && $gerente_administrativo["pass"] == $pass){
    $respuesta = true;
  }elseif($contador["usuario"] == $usuario && $contador["pass"] == $pass){
    $respuesta = true;
  }elseif($cajero["usuario"] == $usuario && $cajero["pass"] == $pass){
    $respuesta = true;
  }
  return $respuesta;
}

function get_Codigo_Usuario($conn, $user){
  $sent = $conn -> prepare("
  SELECT A.CODIGO_USUARIO
  FROM TBL_USUARIOS A
  WHERE A.NOMBRE_USUARIO LIKE '$user';
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado[0]["CODIGO_USUARIO"];
}
function sanear_Horas($hora24, $minutos){
  $hora24 = (int)$hora24;
  if($hora24 > 12){
    $hora24 = $hora24 - 12;
    $hora24 = (string)$hora24;
    $hora_final = $hora24.":".$minutos." pm";
  }else{
    $hora_final = $hora24.":".$minutos." am";
  }

  return $hora_final;
}
//FUNCIONES PARA EL MENU DE GERENTE GENERAL
function get_Eventos($conn, $nombre_evento=""){
  $sent = $conn -> prepare("
  SELECT A.NOMBRE_EVENTO, A.FECHA_EVENTO, A.HORA_INICIO, A.HORA_FIN, C.NOMBRE
  FROM tbl_eventos A, tbl_clientes B, tbl_personas C
  WHERE A.CODIGO_CLIENTE = B.CODIGO_CLIENTE
  AND B.CODIGO_CLIENTE = C.CODIGO_PERSONA
  AND A.NOMBRE_EVENTO LIKE '%$nombre_evento%';
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado;
}
// Funciones para SELECTS
function get_Reservado_Por($conn){
  $sent = $conn -> prepare("
  SELECT A.CODIGO_CLIENTE, CONCAT(B.NOMBRE, ' ', B.APELLIDO) AS NOMBRE_COMPLETO
  FROM tbl_clientes A, tbl_personas B
  WHERE A.CODIGO_CLIENTE = B.CODIGO_PERSONA;
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado;
}
function get_Tipo_Evento($conn){
  $sent = $conn -> prepare("
  SELECT A.CODIGO_TIPO_EVENTO, A.TIPO_EVENTO
  FROM tbl_tipo_evento A;
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado;
}
// Funcion para insertar en la BD
function set_Evento(
  $conn, $nombre_evento, $fecha_evento,
  $hora_inicio, $hora_fin, $ID_user,
  $ID_cliente, $ID_tipo_evento
){
  try {
    $sent = $conn -> prepare("
    INSERT INTO tbl_eventos (`CODIGO_EVENTO`, `NOMBRE_EVENTO`, `FECHA_EVENTO`, `HORA_INICIO`, `HORA_FIN`, `CODIGO_USUARIO`, `CODIGO_CLIENTE`, `CODIGO_TIPO_EVENTO`)
    VALUES (NULL, '$nombre_evento', '$fecha_evento', '$hora_inicio', '$hora_fin', '$ID_user', '$ID_cliente', '$ID_tipo_evento');
    ");
    $sent -> execute();
  } catch (\Exception $e) {
    echo "Hubo un problema durante la insersion de datos";
  }
}
?>
