var viz_inv = document.getElementById("div_C_vizualizar_inventario");

var btn_viz_inv = document.getElementById("btn_vizualizar_inventario");

function toggle_Vizualizar_Inventario() {
    btn_viz_inv.classList.add("btn_active");

    viz_inv.style.display = "block";
}
