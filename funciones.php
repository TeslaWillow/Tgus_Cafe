<?php
require "admin/config.php";

function conexion($bd_config){
  try {
    $conn = oci_pconnect($bd_config["usuario"], $bd_config["pass"], $bd_config["basedatos"]);
    return $conn;
  }
  catch (Exception $e) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    return false;
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


?>
