var val_rep_adm = document.getElementById("div_GG_validar_reportes_administrativos");
var ag_eventos = document.getElementById("div_GG_agendar_eventos");
var info_emp = document.getElementById("div_GG_informacion_empleados");

var btn_val_rep_adm = document.getElementById("btn_validar_reportes_administrativos");
var btn_ag_eventos = document.getElementById("btn_agendar_eventos");
var btn_info_emp = document.getElementById("btn_informacion_empleados");

function toggle_Validar_Reportes_Administrativos() {
    btn_val_rep_adm.classList.add("btn_active");
    btn_ag_eventos.classList.remove("btn_active");
    btn_info_emp.classList.remove("btn_active");

    val_rep_adm.style.display = "block";
    ag_eventos.style.display = "none";
    info_emp.style.display = "none";
}

function toggle_Agendar_Eventos() {
  btn_val_rep_adm.classList.remove("btn_active");
  btn_ag_eventos.classList.add("btn_active");
  btn_info_emp.classList.remove("btn_active");

  val_rep_adm.style.display = "none";
  ag_eventos.style.display = "block";
  info_emp.style.display = "none";
}

function toggle_Informacion_Empleados() {
  btn_val_rep_adm.classList.remove("btn_active");
  btn_ag_eventos.classList.remove("btn_active");
  btn_info_emp.classList.add("btn_active");

  val_rep_adm.style.display = "none";
  ag_eventos.style.display = "none";
  info_emp.style.display = "block";
}
