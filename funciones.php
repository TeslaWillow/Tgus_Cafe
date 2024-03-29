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


?>
