<?php require "view.header.php"; ?>
    <main>
      <div class="container">
        <div class="row mt-5">
          <!-- barra de navegacion  -->
          <div class="col-md-3" id="blue">
            <button type="button" name="registro" class="btn_active" id="btn_vizualizar_inventario" onclick="toggle_Vizualizar_Inventario()">
              Visualizar inventario
            </button>
            <button type="button" name="facturacion" class="" id="btn_vizualizar_ventas" onclick="toggle_Vizualizar_Productos()">
              Visualizar ventas
            </button>
            <button type="button" name="registro" class="" id="btn_reportes_contables" onclick="toggle_Reportes_Contables()">
              Reportes contables
            </button>
            <button type="button" name="facturacion" class="" id="btn_control_reportes" onclick="toggle_Control_Reportes()">
              Control de reportes
            </button>
          </div>
          <!-- panel -->
          <div class="col-md-9" id="white">
            <!-- PANEL VISUALIZAR INVENTARIO -->
            <div class="mt-5" id="div_C_vizualizar_inventario">
              <!-- Filtro  -->
              <form class="" action="" method="post">
                <div class="dates">
                  <input id="date" type="date"><span>-</span>
                  <input id="date" type="date">
                </div>
                <div class="radio d-flex justify-content-around">
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="hoy"> Solo hoy
                  </div>
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="dia_concreto"> Día en concreto
                  </div>
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="rango_fechas"> Rango de fechas
                  </div>
                </div>
              <!-- Tabla -->
              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad Vendidos</th>
                    <th scope="col">Existencias</th>
                    <th scope="col">Fecha</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>40</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>25</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>15</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                </tbody>
              </table>
              <!-- Botones -->
                <div class="botones d-flex justify-content-end">
                  <button type="button" name="nuevo" id="limpiar" class="naranja">Nuevo Reporte</button>
                  <button type="button" name="generar" id="generar" class="rojo">Generar Reporte</button>
                  <input type="submit" name="imprimir" value="imprimir" class="rojo">
                </div>
              </form>
            </div>
            <!-- PANEL DE VISUALIZAR PRODUCTOS -->
            <div class="mt-5" id="div_C_vizualizar_productos">
              <!-- Filtro  -->
              <form class="" action="" method="post">
                <div class="" id="cmb_producto">
                  <select name="slct_producto" id="slct_producto">
                    <option value="efectivo">Cafe</option>
                    <option value="credito">Expresso</option>
                    <option value="debito" selected>Latte</option>
                  </select>
                </div>
                <div class="dates">
                  <input id="date" type="date"><span>-</span>
                  <input id="date" type="date">
                </div>
                <div class="radio d-flex justify-content-around">
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="hoy"> Solo hoy
                  </div>
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="dia_concreto"> Día en concreto
                  </div>
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="rango_fechas"> Rango de fechas
                  </div>
                </div>
              <!-- Tabla -->
              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad Vendidos</th>
                    <th scope="col">Fecha</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                </tbody>
              </table>
              <!-- Botones -->
              <div class="botones d-flex justify-content-end">
                <button type="button" name="nuevo" id="limpiar" class="naranja">Nuevo Reporte</button>
                <button type="button" name="generar" id="generar" class="rojo">Generar Reporte</button>
                <input type="submit" name="imprimir" value="imprimir" class="rojo">
              </div>
              </form>
            </div>
            <!-- PANEL DE REPORTES CONTABLES -->
            <div class="mt-5" id="div_C_reportes_contables">
              <!-- Filtro  -->
              <form class="" action="" method="post">
                <div class="" id="cmb_ejercicio_contable">
                  <select name="slct_ejercicio_contable" id="slct_ejercicio_contable">
                    <option value="efectivo">Balance General</option>
                    <option value="credito">Estado de cuentas</option>
                    <option value="debito" selected>Impuestos</option>
                  </select>
                </div>
                <div class="dates">
                  <input id="date" type="date"><span>-</span>
                  <input id="date" type="date">
                </div>
                <div class="radio d-flex justify-content-around">
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="hoy"> Solo hoy
                  </div>
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="dia_concreto"> Día en concreto
                  </div>
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="rango_fechas"> Rango de fechas
                  </div>
                </div>
              <!-- Tabla -->
              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">ID REPORTE</th>
                    <th scope="col">Ejercicio aplicado</th>
                    <th scope="col">Fecha</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Balance General</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Estado de cuentas</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Impuestos</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                </tbody>
              </table>
              <!-- Botones -->
              <div class="botones d-flex justify-content-end">
                <button class="naranja" type="button" name="nuevo" id="limpiar">Nuevo Reporte</button>
                <button class="rojo" type="button" name="generar" id="generar">Generar Reporte</button>
                <input class="rojo" type="submit" name="Enviar_gg" value="Enviar a Gerencia admin">
                <button class="rojo" type="button" name="Imprimir" id="Imprimir">Imprimir</button>
              </div>
              </form>
            </div>
            <!-- PANEL DE CONTROL REPORTES -->
            <div class="mt-5" id="div_C_control_reportes">
              <!-- Filtro  -->
              <form class="" action="" method="post">
                <div class="" id="cmb_ejercicio_contable">
                  <select name="slct_ejercicio_contable" id="slct_ejercicio_contable">
                    <option value="efectivo">Balance General</option>
                    <option value="credito">Estado de cuentas</option>
                    <option value="debito" selected>Impuestos</option>
                  </select>
                  <select name="slct_tipo_reporte" id="slct_tipo_reporte">
                    <option value="efectivo">Correcto</option>
                    <option value="credito">Pendiente</option>
                    <option value="debito" selected>Incorrecto</option>
                  </select>
                </div>
                <div class="dates">
                  <input id="date" type="date"><span>-</span>
                  <input id="date" type="date">
                </div>
                <div class="radio d-flex justify-content-around">
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="hoy"> Solo hoy
                  </div>
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="dia_concreto"> Día en concreto
                  </div>
                  <div class="item_radio">
                    <input type="radio" name="tiempo" value="rango_fechas"> Rango de fechas
                  </div>
                </div>
              <!-- Tabla -->
              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">ID REPORTE</th>
                    <th scope="col">Ejercicio aplicado</th>
                    <th scope="col">Tipo de reporte</th>
                    <th scope="col">Fecha</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Balance General</td>
                    <td scope="col">Incorrecto</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Estado de cuentas</td>
                    <td scope="col">Pendiente</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Impuestos</td>
                    <td scope="col">Correcto</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                </tbody>
              </table>
              <!-- Botones -->
              <div class="botones d-flex justify-content-end">
                <button class="naranja" type="button" name="nuevo" id="limpiar">Nuevo Reporte</button>
                <input class="rojo" type="submit" name="guardar" value="Guardar Reporte">
                <input class="rojo" type="submit" name="Enviar_validar" value="Enviar Para Validar">
                <button class="rojo" type="button" name="Imprimir" id="Imprimir">Imprimir</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer></footer>

    <script type="text/javascript" src="<?php echo RUTA; ?>Scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo RUTA; ?>Scripts/hide_contador.js"></script>
  </body>
</html>
