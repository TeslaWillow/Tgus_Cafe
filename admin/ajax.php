<?php
  require "config.php";
  require "../funciones.php";

  error_reporting(0);
  header('Content-type: application/json; charset = utf-8');

  $conn = conexion($bd_config);
  if(!$conn){
    $respuesta = [
        'error' => true
    ];
  }else{
    //Consulta a la bd que retorna los datos de productos para tener los precio
    $sent = $conn -> prepare("
    SELECT * 
    FROM tbl_productos;
    ");
    $sent -> execute();
    $resultado_producto = $sent -> fetchAll();

    $respuesta = [];
    foreach ($resultado_producto as $row){
      $producto = [
        'ID' => $row["CODIGO_PRODUCTO"],
        'NOMBRE' => $row["NOMBRE_PRODUCTO"],
        'PRECIO' => $row["PRECIO_PRODUCTO"],
        'TIPO' => $row["CODIGO_TIPO_PRODUCTO"]
      ];
      array_push($respuesta, $producto);
    }
  }
  echo json_encode($respuesta);
?>

