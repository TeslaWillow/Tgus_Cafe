<?php
require "admin/config.php";

//ESTABLECE LA CONEXION CON LA BD TRAYENDO LOS DATOS DE EL ARCHIVO DE CONFIGURACION
function conexion($bd_config){
  try {
    $conn = new PDO("mysql:host=localhost;dbname=".$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
    return $conn;
  }
  catch (Exception $e) {
    return false;
  }
}
//VALIDA EN LA BD SI ENCUENTRA LA COINCIDENCIA USUARIO-PASSWORD
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
//SANEA LOS DATOS DE ESPACIOS EN BLANCO, HASHES, Y CARACTERES HTML
function limpiar_Datos($datos){
  $datos = trim($datos);
  $datos = stripslashes($datos);
  $datos = htmlspecialchars($datos);
  return $datos;
}
//OBTINE EL CODIGO DEL USUARIO EN BASE A SU NOMBRE DE USUARIO
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
//OBTIENE EL CODIGO DE LA PERSONA EN BASE A NOMBRE Y APELLIDO
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
//HACE UN ARREGLO DEL FORMATO DE 24 HORAS A 12 HORAS
function sanear_Horas($hora24, $minutos){
  $hora24 = (int)$hora24;
  $minutos = (int)$minutos;
  if($minutos < 10){
    $minutos = "0" . $minutos;
  }
  if($hora24 > 12){
    $hora24 = $hora24 - 12;
    $hora24 = (string)$hora24;
    $hora_final = $hora24.":".$minutos." pm";
  }else{
    $hora_final = $hora24.":".$minutos." am";
  }

  return $hora_final;
}
//DEVUELVE LA FECHA ACTUAL
function get_Date($conn){
  $sent = $conn -> prepare("
  SELECT CURDATE() AS HOY;
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado[0]["HOY"];
  
}
//-----------------------------------------------------------
//FUNCIONES PARA EL MENU DE GERENTE GENERAL
//-----------------------------------------------------------
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
function get_Tipo_Cliente($conn){
  $sent = $conn -> prepare("
  SELECT A.CODIGO_TIPO_CLIENTE, A.TIPO_CLIENTE
  FROM tbl_tipo_cliente A;
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado;
}
function get_Tipo_Producto($conn){
  $sent = $conn -> prepare("
  SELECT A.CODIGO_TIPO_PRODUCTO, A.TIPO_PRODUCTO
  FROM tbl_tipo_producto A;
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
function set_Cliente($conn, $nombre_producto, $precio, $codigo_tipo_producto){
  try {
    $sent_persona = $conn -> prepare("
    INSERT INTO `tbl_personas` (`CODIGO_PERSONA`, `NOMBRE`, `APELLIDO`, `CODIGO_DIRECCION`)
    VALUES (NULL, '$nombre_cliente', '$apellido_cliente', '$codigo_direccion');
    ");
    $sent_persona -> execute();

    $codigo_persona = get_Codigo_Persona($conn, $nombre_cliente, $apellido_cliente);

    $sent_cliente = $conn -> prepare("
    INSERT INTO `tbl_clientes` (`CODIGO_CLIENTE`, `CODIGO_TIPO_CLIENTE`) 
    VALUES ('$codigo_persona', '$codigo_tipo_cliente');
    ");
    $sent_cliente -> execute();
    
  } catch (\Exception $e) {
    echo "Hubo un problema durante la insersion de datos";
  }
}
function set_Producto($conn, $nombre_producto, $precio, $codigo_tipo_producto){
  try {
    $sent_persona = $conn -> prepare("
    INSERT INTO `tbl_productos` (`CODIGO_PRODUCTO`, `NOMBRE_PRODUCTO`, `PRECIO_PRODUCTO`, `CODIGO_TIPO_PRODUCTO`) 
    VALUES (NULL, '$nombre_producto', '$precio', '$codigo_tipo_producto');
    ");
    $sent_persona -> execute();
        
  } catch (\Exception $e) {
    echo "Hubo un problema durante la insersion de datos";
  }
}
//-----------------------------------------------------------
// FUNCIONES PARA EL MENU DE GERENTE ADMINISTRATIVO
//-----------------------------------------------------------
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
// get_Empleado: Devuelve el codigo de los empleados y sys nombres
function get_Empleado($conn){
  $sent = $conn -> prepare("
  SELECT A.CODIGO_EMPLEADO, B.NOMBRE 
  FROM tbl_empleados A, tbl_personas B 
  WHERE A.CODIGO_EMPLEADO = B.CODIGO_PERSONA 
  AND A.CODIGO_EMPLEADO NOT IN ( SELECT C.CODIGO_USUARIO FROM tbl_usuarios C ); 
  ");
  $sent -> execute();
  $resultado = $sent -> fetchAll();

  return $resultado;
}
// get_Tipo_Usuario: Devuelve el codigo y el nombre del tipo de usuario
function get_Tipo_Usuario($conn){
  $sent = $conn -> prepare("
  SELECT A.CODIGO_TIPO_USUARIO, A.TIPO_USUARIO
  FROM tbl_tipo_usuario A; 
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
// Funcion set Usuario
function set_Usuario($conn, $nombre_usuario, $pass, $codigo_empleado, $codigo_tipo_empleado){
  try {
    $sent_persona = $conn -> prepare("
    INSERT INTO `tbl_usuarios` (`CODIGO_USUARIO`, `NOMBRE_USUARIO`, `CONTRASENA`, `CODIGO_TIPO_USUARIO`) 
    VALUES ('$codigo_empleado', '$nombre_usuario', '$pass', '$codigo_tipo_empleado');
    ");
    $sent_persona -> execute();
  } catch (\Exception $e) {
    echo "Ha ocurrido un error durante la ejecucion de la insersion de datos";
  }
}
//-----------------------------------------------------------
//FUNCIONES PARA EL MENU DE CONTADOR
//-----------------------------------------------------------
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
//FUNCIONES PARA CAJERO
//-----------------------------------------------------------
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
