//Declaracion de variables del DOM
var btn_agregar = document.getElementById("agregar"),
    tbl_productos = document.getElementById("tbl_lista_productos"),
    slct_productos = document.getElementById("slct_producto"),
    inpt_cantidad = document.getElementById("cantidad"),
    form_facturar = document.getElementById("form_facturar"),
    campo_subtotal =document.getElementById("subtotal"),
    campo_impuesto =document.getElementById("impuesto"),
    campo_total =document.getElementById("total");
//Declaracion de variables 
var cajero,
    fecha,
    producto,
    cantidad,
    arr_productos = [],
    arr_cantidades = [],
    subtotal_factura = 0,
    impuesto_factura = 0,
    total_factura = 0;

//--------------------------------------------------------------------
// FUNCIONES Y EVENTOS PARA ALMACENAR VALORES Y LLENAR LAS TABLAS DE LA GUI
//--------------------------------------------------------------------
//Devuelve el precio del producto 
function get_Precio(datos_productos){
  for(var i = 0; i < datos_productos.length; i++){
    if(datos_productos[i].NOMBRE == producto){
      return datos_productos[i].PRECIO;
    }
  }
}
//Void que se encarga de cargar los datos a la tabla y almacenarlos para podesterioremente ser enviados a PHP
function cargarProductos(){
  var peticion = new XMLHttpRequest();
  peticion.open('GET','../admin/ajax.php');

  console.log("Esperando respuesta...");
  //LA CARGAR LOS DATOS SINO HUBO ERROR INSERTARA EN LA TABLA
  peticion.onload = function(){
    var datos_productos = JSON.parse(peticion.responseText);
    if(datos_productos.error){
      console.log("Hubo un problema para traer los datos");
    }
    else{
      llenarTabla(datos_productos);
      //Modificar los valores a pagar -----------------------------------------------------------------------------------------
      subtotal_factura += Number(total);
      impuesto_factura = subtotal_factura*0.15;
      impuesto_factura = Math.round(impuesto_factura * 100) / 100;
      total_factura = subtotal_factura + impuesto_factura;
      campo_subtotal.innerHTML = subtotal_factura + " L.";
      campo_impuesto.innerHTML = impuesto_factura + " L.";
      campo_total.innerHTML = total_factura + " L.";
    }  
  };

  peticion.onreadystatechange = function(){
    if(peticion.readyState == 4 && peticion.status == 200){
      console.log("Respuesta recibida");
    }
  };

  peticion.send();
};
function llenarTabla(datos_productos){
  // se llenan los datos que iran dentro de la tabla
  producto = slct_productos.options[slct_productos.selectedIndex].text;
  cantidad = inpt_cantidad.value;
  precio = get_Precio(datos_productos);
  total = cantidad * Number(precio);
  //crea una tabla vacia
  var table_row = document.createElement("tr");
  //Ingresa los elementos a la tabla
  table_row.innerHTML += ("<th>" + producto + "</th>");
  table_row.innerHTML += ("<td>" + precio + " L." + "</td>");
  table_row.innerHTML += ("<td>" + cantidad + "</td>");
  table_row.innerHTML += ("<td>" + total + " L." + "</td>");
  //Insertar la fila a la tabla  ------------------------------------------------------------------------------------------
  tbl_productos.appendChild(table_row);
  //Llenar el arreglo para poder ser enviado a PHP--------------
  llenarArregoAjax(slct_productos.options[slct_productos.selectedIndex].value, cantidad);
};
//Se almacenan los datos en un arreglo
function llenarArregoAjax(producto, cantidad){
  arr_productos.push(producto);
  arr_cantidades.push(cantidad);
}
//Evento para agregar productos a la tabla y almacenarlos en un arreglo
btn_agregar.addEventListener('click', function(){
  cargarProductos();
});
//--------------------------------------------------------------------
// FUNCIONES Y EVENTOS PARA INSERTAR EN LA BD LA FACTURA
//--------------------------------------------------------------------
function agregarFacturacion(e){
  e.preventDefault();

  var peticion = new XMLHttpRequest();
  peticion.open("POST", '../admin/ajax_factura.php');

  cajero = form_facturar.id_cajero.value.trim();
  fecha = form_facturar.fecha_emision.value.trim();
  var parametros = 'codigo_usuario=' + cajero + '$fecha=' + fecha + '$sub_total=' + subtotal_factura + '$impuesto=' + impuesto_factura + '$total=' + total_factura + '$productos='+ arr_productos + '$cantidades='+arr_cantidades;
  peticion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  console.log(parametros);

  peticion.send(parametros);
}
//Evento del BTN de imprimir y terminar
form_facturar.addEventListener('submit', function(e){
  agregarFacturacion(e);
});

