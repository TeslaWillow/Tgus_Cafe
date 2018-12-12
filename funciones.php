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
function get_Codigo_Persona($conn, $nombre, $apellido){
  $sent = $conn -> prepare("
  SELECT A.CODIGO_PERSONA
  FROM tbl_personas A
  WHERE A.NOMBRE LIKE '$nombre'
  AND A.APELLIDO LIKE '$apellido';
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado[0]["CODIGO_PERSONA"];
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
//-----------------------------------------------------------
//-----------------------------------------------------------
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
//-----------------------------------------------------------
//-----------------------------------------------------------
// FUNCIONES PARA EL MENU DE GERENTE ADMINISTRATIVO
function get_Empleados($conn, $nombre_empleado = ""){
  $sent = $conn -> prepare("
  SELECT CONCAT(C.NOMBRE, ' ', C.APELLIDO) AS NOMBRE_COMPLETO, A.IDENTIDAD, B.PUESTO_EMPLEADO, A.FECHA_INGRESO, A.SUELDO
  FROM tbl_empleados A, tbl_puesto_empleado B, tbl_personas C
  WHERE A.CODIGO_PUESTO_EMPLEADO = B.CODIGO_PUESTO_EMPLEADO AND A.CODIGO_EMPLEADO = C.CODIGO_PERSONA
  AND C.NOMBRE LIKE '%$nombre_empleado%';
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado;
}
// Funcion para SELECT
function get_Direccion($conn){
  $sent = $conn -> prepare("
  SELECT A.CODIGO_DIRECCION, B.TIPO_DIRECCION
  FROM tbl_direcciones A, tbl_tipo_direccion B;
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado;
}
function get_Puesto_Empleado($conn){
  $sent = $conn -> prepare("
  SELECT *
  FROM tbl_puesto_empleado;
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado;
}
// Funcion set EMPLEADOS
function set_empleado($conn, $nombre_empleado, $apellido_empleado, $codigo_direccion, $ID_empleado ,$codigo_puesto, $sueldo, $fecha_ingreso){
  try {
    $sent_persona = $conn -> prepare("
    INSERT INTO `tbl_personas` (`CODIGO_PERSONA`, `NOMBRE`, `APELLIDO`, `CODIGO_DIRECCION`)
    VALUES (NULL, '$nombre_empleado', '$apellido_empleado', '$codigo_direccion');
    ");
    $sent_persona -> execute();

    $codigo_persona = get_Codigo_Persona($conn, $nombre_empleado, $apellido_empleado);
    $sent_empleado = $conn -> prepare("
      INSERT INTO `tbl_empleados` (`CODIGO_EMPLEADO`, `CODIGO_PUESTO_EMPLEADO`, `IDENTIDAD`, `SUELDO`, `FECHA_INGRESO`)
      VALUES ('$codigo_persona', '$codigo_puesto', '$ID_empleado', '$sueldo', '$fecha_ingreso')
    ");
    $sent_empleado -> execute();
  } catch (\Exception $e) {
    echo "Ha ocurrido un error durante la ejecucion de la insersion de datos";
  }


}
//-----------------------------------------------------------
//-----------------------------------------------------------
//FUNCIONES PARA EL MENU DE CONTADOR
function get_Reporte_Ventas($conn, $nombre_producto = ""){
  $sent = $conn -> prepare("
  SELECT A.NOMBRE_PRODUCTO, COUNT(B.CODIGO_PRODUCTO) AS CANTIDAD, A.PRECIO_PRODUCTO, SUM(A.PRECIO_PRODUCTO) AS TOTAL_VENTAS
  FROM tbl_productos A, tbl_productos_x_facturas B, tbl_facturas C
  WHERE A.CODIGO_PRODUCTO = B.CODIGO_PRODUCTO
  AND B.CODIGO_FACTURA = C.CODIGO_FACTURA
  AND A.NOMBRE_PRODUCTO LIKE '%$nombre_producto%'
  GROUP BY A.CODIGO_PRODUCTO;
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado;
}
//-----------------------------------------------------------
//-----------------------------------------------------------
//FUNCIONES PARA CAJERO
function set_Factura($conn, $fecha, $sub_total, $impuesto, $total, $codigo_usuario, $codigo_producto, $nueva_factura){
  try {

      $sent_factura = $conn -> prepare("
      INSERT INTO `tbl_facturas` (`CODIGO_FACTURA`, `FECHA`, `SUBTOTAL`, `IMPUESTO`, `TOTAL`, `CODIGO_USUARIO`)
      VALUES (NULL, '2018-12-01', '145', '10', '165', '4');
      ");
      $sent_factura -> execute();
      $codigo_factura = $sent_factura -> fetchAll();

      $codigo_factura = $codigo_factura[0]["CODIGO_FACTURA"];

      $sent_factura_x_producto = $conn -> prepare("
      INSERT INTO `tbl_productos_x_facturas` (`CODIGO_PRODUCTO`, `CODIGO_FACTURA`)
      VALUES ('$codigo_producto', '$codigo_factura');
      "
      );
      $sent_factura_x_producto -> execute();


  } catch (\Exception $e) {
    echo "Hubo un error al ejecutar la insersion";
  }

}
// Funciones para SELECTS
function get_Producto($conn){
  $sent = $conn -> prepare("
  SELECT A.CODIGO_PRODUCTO, A.NOMBRE_PRODUCTO
  FROM tbl_productos A;
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado;
}


?>
