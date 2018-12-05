var viz_inv = document.getElementById("div_C_vizualizar_inventario");
var viz_pro = document.getElementById("div_C_vizualizar_productos");
var rep_contables = document.getElementById("div_C_reportes_contables");
var control_rep = document.getElementById("div_C_control_reportes");

var btn_viz_inv = document.getElementById("btn_vizualizar_inventario");
var btn_viz_pro = document.getElementById("btn_vizualizar_ventas");
var btn_rep_contables = document.getElementById("btn_reportes_contables");
var btn_control_rep = document.getElementById("btn_control_reportes");

function toggle_Vizualizar_Inventario() {
    btn_viz_inv.classList.add("btn_active");
    btn_viz_pro.classList.remove("btn_active");
    btn_rep_contables.classList.remove("btn_active");
    btn_control_rep.classList.remove("btn_active");

    viz_inv.style.display = "block";
    viz_pro.style.display = "none";
    rep_contables.style.display = "none";
    control_rep.style.display = "none";
}

function toggle_Vizualizar_Productos() {
    btn_viz_inv.classList.remove("btn_active");
    btn_viz_pro.classList.add("btn_active");
    btn_rep_contables.classList.remove("btn_active");
    btn_control_rep.classList.remove("btn_active");

    viz_inv.style.display = "none";
    viz_pro.style.display = "block";
    rep_contables.style.display = "none";
    control_rep.style.display = "none";
}

function toggle_Reportes_Contables() {
  btn_viz_inv.classList.remove("btn_active");
  btn_viz_pro.classList.remove("btn_active");
  btn_rep_contables.classList.add("btn_active");
  btn_control_rep.classList.remove("btn_active");

  viz_inv.style.display = "none";
  viz_pro.style.display = "none";
  rep_contables.style.display = "block";
  control_rep.style.display = "none";
}

function toggle_Control_Reportes() {
  btn_viz_inv.classList.remove("btn_active");
  btn_viz_pro.classList.remove("btn_active");
  btn_rep_contables.classList.remove("btn_active");
  btn_control_rep.classList.add("btn_active");

  viz_inv.style.display = "none";
  viz_pro.style.display = "none";
  rep_contables.style.display = "none";
  control_rep.style.display = "block";
}
