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
            <!-- PANEL DE VISUALIZAR EMPLEADOS -->
            <div class="mt-5" id="div_GA_validar_reportes">
              <!-- Filtro  -->
              <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <!-- Ver Empleado  -->
                <div class="d-flex flex-row">
                  <label for="nombre_empleado" class="col-2 col-form-label">Nombre empleado:</label>
                  <div class="col-10">
                    <input class="form-control" type="text" id="nombre_empleado" name="nombre_empleado">
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
                  <?php foreach ($resultado_empleados as $row): ?>
                    <tr>
                      <td><?php echo $row["NOMBRE_COMPLETO"]; ?></td>
                      <td><?php echo $row["IDENTIDAD"]; ?></td>
                      <td><?php echo $row["PUESTO_EMPLEADO"]; ?></td>
                      <td><?php echo $row["FECHA_INGRESO"]; ?></td>
                      <td><?php echo $row["SUELDO"]; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <!-- Botones -->
              <div class="botones d-flex justify-content-end">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Buscar</button>
                <button class="rojo" type="button" name="Imprimir" id="Imprimir">Imprimir</button>
              </div>
              </form>
            </div>
            <!-- PANEL AGREGAR EMPLEADO -->
            <div class="mt-5" id="div_GA_generar_planillas">
              <!-- Filtro  -->
              <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="agregar_empleado">
                <!-- FORMULARIO -->
                <div class="d-flex flex-column">
                  <!-- Nombre Empleado -->
                  <div class="d-flex flex-row">
                    <label for="nombre_empleado" class="col-2 col-form-label">Nombre empleado:</label>
                    <div class="col-10">
                      <input class="form-control" type="text" id="nombre_empleado" name="nombre_empleado" required>
                    </div>
                  </div>
                  <!-- Apellido Empleado -->
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
                  <!-- Fecha Ingreso -->
                  <div class="d-flex flex-row">
                    <label for="fecha_ingreso" class="col-2 col-form-label">Fecha ingreso: </label>
                    <div class="col-10">
                      <input class="form-control" type="date" value="0000-00-00" id="fecha_ingreso" name="fecha_ingreso">
                    </div>
                  </div>
                  <!-- Sueldo empleado -->
                  <div class="d-flex flex-row">
                    <label for="sueldo" class="col-2 col-form-label">Sueldo:</label>
                    <div class="col-10">
                      <input class="form-control" type="text" id="sueldo" name="sueldo" required>
                    </div>
                  </div>
                  <!-- Dirección -->
                  <div class="d-flex flex-row mt-3">
                    <label for="hora_fin" class="col-2 col-form-label">Dirección: </label>
                    <select name="slct_direccion" id="slct_direccion" class="custom-select col-10 mt-2" required>
                      <option value="" disabled selected>Seleccione tipo de dirección del empleado</option>
                      <?php foreach ($slct_direccion as $row): ?>
                        <option value="<?php echo $row["CODIGO_DIRECCION"] ?>"><?php echo $row["TIPO_DIRECCION"]; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <!-- Puesto Empleado -->
                  <div class="d-flex flex-row mt-3">
                    <label for="hora_fin" class="col-2 col-form-label">Puesto empleado: </label>
                    <select name="slct_puesto_empleado" id="slct_tipo_evento" class="custom-select col-10 mt-2" required>
                      <option value="" disabled selected>¿Qué puesto desempeñara el empleado?</option>
                      <?php foreach ($slct_puesto as $row): ?>
                        <option value="<?php echo $row["CODIGO_PUESTO_EMPLEADO"] ?>"><?php echo $row["PUESTO_EMPLEADO"]; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              <!-- Botones -->
                <div class="botones d-flex justify-content-end">
                  <button type="button" name="limpiar" id="limpiar" class="naranja"  onclick="limpiar_Formulario()">Limpiar</button>
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
