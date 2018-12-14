var gen_plan = document.getElementById("div_GA_generar_planillas");
var val_rep = document.getElementById("div_GA_validar_reportes");
var agr_user = document.getElementById("div_GA_agregar_usuario");

var btn_gen_plan = document.getElementById("btn_generar_planillas");
var btn_val_rep = document.getElementById("btn_validar_reportes");
var btn_agr_user = document.getElementById("btn_agregar_usuario");
//TOGGLE: VISUALIZA LA OPCION QUE SE LE DE CLICK OCULTANDO LAS DEMAS
function toggle_Generar_Planillas() {
    btn_gen_plan.classList.add("btn_active");
    btn_val_rep.classList.remove("btn_active");
    btn_agr_user.classList.remove("btn_active");

    gen_plan.style.display = "block";
    val_rep.style.display = "none";
    agr_user.style.display = "none";
}

function toggle_Validar_Reportes() {
  btn_gen_plan.classList.remove("btn_active");
  btn_val_rep.classList.add("btn_active");
  btn_agr_user.classList.remove("btn_active");

  gen_plan.style.display = "none";
  val_rep.style.display = "block";
  agr_user.style.display = "none";
}

function toggle_Agregar_Usuario() {
    btn_gen_plan.classList.remove("btn_active");
    btn_val_rep.classList.remove("btn_active");
    btn_agr_user.classList.add("btn_active");
  
    gen_plan.style.display = "none";
    val_rep.style.display = "none";
    agr_user.style.display = "block";
  }

//FUNCIONES QUE VACIAN LOS FORMULARIOS 
function limpiar_Formulario(){
    document.getElementById("agregar_empleado").reset();
}
function limpiar_Formulario_Usuario(){
    document.getElementById("agregar_usuario").reset();
}
