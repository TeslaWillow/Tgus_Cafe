var fac = document.getElementById("div_facturacion");

var btn_fac = document.getElementById("btn_facturacion");

//TOGGLE: VISUALIZA LA OPCION QUE SE LE DE CLICK OCULTANDO LAS DEMAS
function toggle_Facturacion() {
    btn_fac.classList.add("btn_active");

    fac.style.display = "block";
}
