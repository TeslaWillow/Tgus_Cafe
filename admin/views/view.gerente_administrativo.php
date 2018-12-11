<?php require "view.header.php"; ?>
    <main>
      <div class="container">
        <div class="row mt-5">
          <!-- barra de navegacion  -->
          <div class="col-md-3" id="blue">
            <button type="button" name="facturacion" class="btn_active" id="btn_validar_reportes" onclick="toggle_Validar_Reportes()">
              Visualizar empleado
            </button>
            <button type="button" name="registro" class="" id="btn_generar_planillas" onclick="toggle_Generar_Planillas()">
              Crear empleado
            </button>
          </div>
          <!-- panel -->
          <div class="col-md-9" id="white">
            <!-- PANEL DE VISUALIZAR PRODUCTOS -->
            <div class="mt-5" id="div_GA_validar_reportes">
              <!-- Filtro  -->
              <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
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
              <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <!-- FORMULARIO -->
                <div class="d-flex flex-column">
                  <!-- Nombre Empleado -->
                  <div class="d-flex flex-row">
                    <label for="nombre_empleado" class="col-2 col-form-label">Nombre empleado:</label>
                    <div class="col-10">
                      <input class="form-control" type="text" id="nombre_empleado" name="nombre_empleado" required>
                    </div>
                  </div>
                  <!-- Nombre Empleado -->
                  <div class="d-flex flex-row">
                    <label for="apellido_empleado" class="col-2 col-form-label">Apellido empleado:</label>
                    <div class="col-10">
                      <input class="form-control" type="text" id="apellido_empleado" name="apellido_empleado" required>
                    </div>
                  </div>
                  <!-- ID Empleado -->
                  <div class="d-flex flex-row">
                    <label for="id_empleado" class="col-2 col-form-label">ID:</label>
                    <div class="col-10">
                      <input class="form-control" type="text" id="id_empleado" name="id_empleado" required>
                    </div>
                  </div>
                  <!-- Dirección -->
                  <div class="d-flex flex-row mt-3">
                    <label for="hora_fin" class="col-2 col-form-label">Dirección: </label>
                    <select name="slct_tipo_evento" id="slct_tipo_evento" class="custom-select col-10 mt-2" required>
                      <option value="" disabled selected>Seleccione la dirección del empleado</option>
                      <option value="formal">Col. tal</option>
                      <option value="entrevista">Aquí</option>
                      <option value="birthday" selected>Acá</option>
                    </select>
                  </div>
                  <!-- Puesto Empleado -->
                  <div class="d-flex flex-row mt-3">
                    <label for="hora_fin" class="col-2 col-form-label">Puesto empleado: </label>
                    <select name="slct_tipo_evento" id="slct_tipo_evento" class="custom-select col-10 mt-2" required>
                      <option value="" disabled selected>¿Qué puesto desempeñara el empleado?</option>
                      <option value="fulano">Destructor</option>
                      <option value="mengano">Suicida</option>
                      <option value="sutano" selected>Mesero... explosivo</option>
                    </select>
                  </div>
                </div>
              <!-- Botones -->
                <div class="botones d-flex justify-content-end">
                  <button type="button" name="limpiar" id="limpiar" class="naranja">Limpiar</button>
                  <button type="submit" name="btn_crear_empleado" id="btn_crear_empleado" class="rojo">Crear empleado</button>
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
