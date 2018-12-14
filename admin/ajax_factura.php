<?php
    require "config.php";
    require "../funciones.php";

    error_reporting(0);
    header('Content-type: application/json; charset = utf-8');
    
    $codigo_usuario = $_POST['codigo_usuario'];
    $fecha = $_POST['fecha'];
    $sub_total = $_POST['sub_total'];
    $impuesto = $_POST['impuesto'];
    $total = $_POST['total'];
    //Productos: Un arreglo de el codigo de cada producto que se ingreso a la factura
    $productos = $_POST['productos'];
    $cantidades = $_POST['cantidades'];
    
    function validar_Datos($fecha, $sub_total, $impuesto, $total, $codigo_usuario, $productos){
        if($sub_total <= 0){
            return false;
        }else if($impuesto <= 0){
            return false;
        }else if($total <= 0){
            return false;
        }
        return true;
    };
    
    $respuesta = [];
    if(true){
       $respuesta = [];
       try{
        $conn = conexion($bd_config);
        $sent_factura = $conn -> prepare("
        INSERT INTO `tbl_facturas` (`CODIGO_FACTURA`, `FECHA`, `SUBTOTAL`, `IMPUESTO`, `TOTAL`, `CODIGO_USUARIO`)
        VALUES (NULL, '$fecha', '$sub_total', '$impuesto', '$total', '$codigo_usuario');
        ");
        $sent_factura -> execute();

        $setn_codigo = $conn -> prepare("
        SELECT MAX(id) 
        FROM tbl_facturas;"
        );
        $setn_codigo -> execute();
        $codigo_factura = $setn_codigo -> fetchAll();
    
        $codigo_factura = $codigo_factura[0]["CODIGO_FACTURA"];
    
        for($i = 0; i < count($productos) ; $i++){
            for($j = 0; j < $cantidades[$i]; $j++){
                $producto = $productos[$i];
                $sent_factura_x_producto = $conn -> prepare("
                INSERT INTO `tbl_productos_x_facturas` (`CODIGO_PRODUCTO`, `CODIGO_FACTURA`)
                VALUES ('$producto', '$codigo_factura');
                "
                );
                $sent_factura_x_producto -> execute();
            };
        };
       }catch(\Exception $e){
        $respuesta = ["error" => true];
       }
    }else{
        $respuesta = ["error" => true];
    }; 
    echo json_encode($respuesta);
?>