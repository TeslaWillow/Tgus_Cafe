var ag_eventos = document.getElementById("div_GG_agendar_eventos");
var viz_eventos = document.getElementById("div_GG_vizualizar_eventos");

var btn_ag_eventos = document.getElementById("btn_agendar_eventos");
var btn_viz_eventos = document.getElementById("btn_vizualizar_eventos");


function toggle_Agendar_Eventos() {
  btn_ag_eventos.classList.add("btn_active");
  btn_viz_eventos.classList.remove("btn_active");

  ag_eventos.style.display = "block";
  viz_eventos.style.display = "none";
}

function toggle_Vizualizar_Informacion() {
  btn_ag_eventos.classList.remove("btn_active");
  btn_viz_eventos.classList.add("btn_active");

  ag_eventos.style.display = "none";
  viz_eventos.style.display = "block";
}
