//PANELES
var ag_eventos = document.getElementById("div_GG_agendar_eventos");
var viz_eventos = document.getElementById("div_GG_vizualizar_eventos");
var agr_clientes = document.getElementById("div_GG_agregar_cliente");
var agr_productos = document.getElementById("div_GG_agregar_producto");
//BOTONES
var btn_ag_eventos = document.getElementById("btn_agendar_eventos");
var btn_viz_eventos = document.getElementById("btn_vizualizar_eventos");
var btn_agr_clientes = document.getElementById("btn_agregar_clientes");
var btn_agr_productos = document.getElementById("btn_agregar_producto");
//CAMPOS
var txt_nombre = document.getElementById("nombre_cliente");
var txt_apellido = document.getElementById("apellido_cliente");
var btn_submit_cliente = document.getElementById("btn_crear_cliente");
//Formularios
var form_cliente =document.getElementById("agregar_cliente");
var form_producto = document.getElementById("agregar_producto");
//TOGGLE: VISUALIZA LA OPCION QUE SE LE DE CLICK OCULTANDO LAS DEMAS
function toggle_Agendar_Eventos() {
  btn_ag_eventos.classList.add("btn_active");
  btn_viz_eventos.classList.remove("btn_active");
  btn_agr_clientes.classList.remove("btn_active");
  btn_agr_productos.classList.remove("btn_active");
  
  ag_eventos.style.display = "block";
  viz_eventos.style.display = "none";
  agr_clientes.style.display = "none";
  agr_productos.style.display = "none";
}

function toggle_Vizualizar_Informacion() {
  btn_ag_eventos.classList.remove("btn_active");
  btn_viz_eventos.classList.add("btn_active");
  btn_agr_clientes.classList.remove("btn_active");
  btn_agr_productos.classList.remove("btn_active");

  ag_eventos.style.display = "none";
  viz_eventos.style.display = "block";
  agr_clientes.style.display = "none";
  agr_productos.style.display = "none";
}

function toggle_Agregar_Clientes() {
  btn_ag_eventos.classList.remove("btn_active");
  btn_viz_eventos.classList.remove("btn_active");
  btn_agr_clientes.classList.add("btn_active");
  btn_agr_productos.classList.remove("btn_active");

  ag_eventos.style.display = "none";
  viz_eventos.style.display = "none";
  agr_clientes.style.display = "block";
  agr_productos.style.display = "none";
}

function toggle_Agregar_Productos() {
  btn_ag_eventos.classList.remove("btn_active");
  btn_viz_eventos.classList.remove("btn_active");
  btn_agr_clientes.classList.remove("btn_active");
  btn_agr_productos.classList.add("btn_active");
  
  ag_eventos.style.display = "none";
  viz_eventos.style.display = "none";
  agr_clientes.style.display = "none";
  agr_productos.style.display = "block";
}

//FUNCIONES QUE VACIAN LOS FORMULARIOS
function limpiar_Formulario_Agregar_Evento(){
  document.getElementById("form_agregar_evento").reset();
}
function limpiar_Formulario_Agregar_Cliente(){
  form_cliente.reset();
}
function limpiar_Formulario_Agregar_Producto(){
  form_producto.reset();
}
//FUNCIONES PARA VALIDAR
function validar_Formulario_Clientes(){
  var letters = /^[A-Za-z]+$/; 
  if(txt_nombre.value.match(letters) && txt_apellido.value.match(letters)){
    btn_submit_cliente.style.display = "block";
  }else{
    btn_submit_cliente.style.display = "none";
  }
}
//Imprimiendo
function imprimir(){
  alert("imprimiendo...");
  setTimeout(function(){
    alert("Todo correcto!");
  }, 1000);
}