var btn_agregar = document.getElementById("agregar"),
    tbl_productos = document.getElementById("tbl_lista_productos"),
    slct_productos = document.getElementById("slct_producto"),
    inpt_cantidad = document.getElementById("cantidad"),
    form_facturar = document.getElementById("form_facturar");

var cajero,
    fecha,
    producto,
    cantidad,
    precio_unitario,
    total_compra,
    subtotal,
    impuesto,
    total;

function get_Precio(datos_productos){
  for(var i = 0; i < datos_productos.length; i++){
    if(datos_productos[i].NOMBRE == producto){
      return datos_productos[i].PRECIO;
    }
  }
}
function cargarProductos(){
  var peticion = new XMLHttpRequest();
  peticion.open('GET','../admin/ajax.php');

  peticion.onload = function(){
    var datos_productos = JSON.parse(peticion.responseText);
    if(datos_productos.error){
      console.log("Hubo un problema para traer los datos");
    }
    else{
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
      //Insertar la fila a la tabla 
      tbl_productos.appendChild(table_row);

/*    for(var i = 0; i < datos_productos.length; i++){
        var table_row = document.createElement("tr");
        table_row.innerHTML += ("<td>" + datos_productos[i].ID + "</td>");
        table_row.innerHTML += ("<td>" + datos_productos[i].NOMBRE + "</td>");
        table_row.innerHTML += ("<td>" + datos_productos[i].PRECIO + "</td>");
        table_row.innerHTML += ("<td>" + datos_productos[i].PRECIO*5 + "</td>");
        tbl_productos.appendChild(table_row);
      } 
*/
    } 
 
  };

  peticion.send();
};
btn_agregar.addEventListener('click', function(){
  cargarProductos();
});

function agregarFacturacion(e){
  e.preventDefault();

  var peticion = new XMLHttpRequest();
  peticion.open("POST", '../admin/ajax_factura.php');

  cajero = form_facturar.cajero.value.trim();
  fecha = form_facturar.cajero.value.trim();
  cajero = form_facturar.cajero.value.trim();
  cajero = form_facturar.cajero.value.trim();
  precio_unitario = form_facturar.cajero.value.trim();
  total_compra = form_facturar.cajero.value.trim();
  subtotal = form_facturar.cajero.value.trim();
  impuesto = form_facturar.cajero.value.trim();
  total = form_facturar.cajero.value.trim();
}
form_facturar.addEventListener('submit', function(e){
  agregarFacturacion(e);
});

