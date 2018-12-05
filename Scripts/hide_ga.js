var gen_plan = document.getElementById("div_GA_generar_planillas");
var val_rep = document.getElementById("div_GA_validar_reportes");
var rep_admin = document.getElementById("div_GA_reportes_administrativos");

var btn_gen_plan = document.getElementById("btn_generar_planillas");
var btn_val_rep = document.getElementById("btn_validar_reportes");
var btn_rep_admin = document.getElementById("btn_reportes_administrativos");

function toggle_Generar_Planillas() {
    btn_gen_plan.classList.add("btn_active");
    btn_val_rep.classList.remove("btn_active");
    btn_rep_admin.classList.remove("btn_active");

    gen_plan.style.display = "block";
    val_rep.style.display = "none";
    rep_admin.style.display = "none";
}

function toggle_Validar_Reportes() {
  btn_gen_plan.classList.remove("btn_active");
  btn_val_rep.classList.add("btn_active");
  btn_rep_admin.classList.remove("btn_active");

  gen_plan.style.display = "none";
  val_rep.style.display = "block";
  rep_admin.style.display = "none";
}

function toggle_Reportes_Administrativos() {
  btn_gen_plan.classList.remove("btn_active");
  btn_val_rep.classList.remove("btn_active");
  btn_rep_admin.classList.add("btn_active");

  gen_plan.style.display = "none";
  val_rep.style.display = "none";
  rep_admin.style.display = "block";
}
