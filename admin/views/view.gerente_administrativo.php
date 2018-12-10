<?php require "view.header.php"; ?>
    <main>
      <div class="container">
        <div class="row mt-5">
          <!-- barra de navegacion  -->
          <div class="col-md-3" id="blue">
            <button type="button" name="facturacion" class="btn_active" id="btn_validar_reportes" onclick="toggle_Validar_Reportes()">
              Validar Reportes
            </button>
            <button type="button" name="registro" class="" id="btn_generar_planillas" onclick="toggle_Generar_Planillas()">
              Generar Planillas
            </button>
          </div>
          <!-- panel -->
          <div class="col-md-9" id="white">
            <!-- PANEL DE VISUALIZAR PRODUCTOS -->
            <div class="mt-5" id="div_GA_validar_reportes">
              <!-- Filtro  -->
              <form class="" action="" method="post">
                <!-- Ver Empleado  -->
                <div class="d-flex flex-row">
                  <label for="nombre_empleado" class="col-2 col-form-label">Nombre empleado:</label>
                  <div class="col-10">
                    <input class="form-control" type="text" id="nombre_empleado" required>
                  </div>
                </div>
              <!-- Tabla -->
              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">Nombre Empleado</th>
                    <th scope="col">ID</th>
                    <th scope="col">Puesto Empleado</th>
                    <th scope="col">Fecha Ingreso</th>
                    <th scope="col">Sueldo</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Lucas</th>
                    <td>0801199614779</td>
                    <td>Mesero</td>
                    <td>dd/mm/yyyy</td>
                    <td>10000</td>
                  </tr>
                  <tr>
                    <th scope="row">Lucas</th>
                    <td>0801199614779</td>
                    <td>Mesero</td>
                    <td>dd/mm/yyyy</td>
                    <td>10000</td>
                  </tr>
                  <tr>
                    <th scope="row">Lucas</th>
                    <td>0801199614779</td>
                    <td>Mesero</td>
                    <td>dd/mm/yyyy</td>
                    <td>10000</td>
                  </tr>
                </tbody>
              </table>
              <!-- Botones -->
              <div class="botones d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Buscar</button>
                <button class="rojo" type="button" name="Imprimir" id="Imprimir">Imprimir</button>
              </div>
              </form>
            </div>
            <!-- PANEL VISUALIZAR INVENTARIO -->
            <div class="mt-5" id="div_GA_generar_planillas">
              <!-- Filtro  -->
              <form class="" action="" method="post">
                <select name="slct_sucursal" id="slct_sucursal">
                  <option value="efectivo">Principal</option>
                  <option value="credito">Secundaria</option>
                  <option value="debito" selected>Kiosko</option>
                </select>
                <div class="dates">
                  <input id="date" type="date"><span>-</span>
                  <input id="date" type="date">
                </div>
              <!-- Tabla -->
              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Fecha de Ingreso</th>
                    <th scope="col">Empleado</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Mark</th>
                    <td>40</td>
                    <td>dd/mm/yyyy</td>
                    <td>si</td>
                  </tr>
                  <tr>
                    <th scope="row">Jacob</th>
                    <td>25</td>
                    <td>dd/mm/yyyy</td>
                    <td>Si</td>
                  </tr>
                  <tr>
                    <th scope="row">Larry</th>
                    <td>18</td>
                    <td>dd/mm/yyyy</td>
                    <td>No</td>
                  </tr>
                </tbody>
              </table>
              <!-- Botones -->
                <div class="botones d-flex justify-content-end">
                  <button type="button" name="nuevo" id="limpiar" class="naranja">Nuevo Reporte</button>
                  <button type="button" name="generar" id="generar" class="rojo">Generar Reporte</button>
                  <button type="button" name="exportar" id="exportar" class="rojo">Exportar a Excel</button>
                  <input type="submit" name="imprimir" value="imprimir" class="rojo">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer></footer>

    <script type="text/javascript" src="<?php echo RUTA; ?>Scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo RUTA; ?>Scripts/hide_ga.js"></script>
  </body>
</html>
