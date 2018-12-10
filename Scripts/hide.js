var fac = document.getElementById("div_facturacion");
var reg = document.getElementById("div_registro");
var btn_fac = document.getElementById("btn_facturacion");
var btn_reg = document.getElementById("btn_registro");

function toggle_Facturacion() {
    btn_fac.classList.add("btn_active");
    btn_reg.classList.remove("btn_active");
    
    fac.style.display = "block";
    reg.style.display = "none";
}

function toggle_Registro() {
    btn_fac.classList.remove("btn_active");
    btn_reg.classList.add("btn_active");

    reg.style.display = "block";
    fac.style.display = "none";
}
