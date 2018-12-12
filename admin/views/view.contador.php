<?php require "view.header.php"; ?>
    <main>
      <div class="container">
        <div class="row mt-5">
          <!-- barra de navegacion  -->
          <div class="col-md-3" id="blue">
            <button type="button" name="registro" class="btn_active" id="btn_vizualizar_inventario" onclick="toggle_Vizualizar_Inventario()">
              Visualizar reporte ventas
            </button>
          </div>
          <!-- panel -->
          <div class="col-md-9" id="white">
            <!-- PANEL VISUALIZAR REPORTE VENTAS -->
            <div class="mt-5" id="div_C_vizualizar_inventario">
              <!-- Filtro  -->
              <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <!-- Nombre Evento  -->
                <div class="d-flex flex-row">
                  <label for="nombre_producto" class="col-2 col-form-label">Nombre producto:</label>
                  <div class="col-10">
                    <input class="form-control" type="text" id="nombre_producto" name="nombre_producto">
                  </div>
                </div>
              <!-- Tabla -->
              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">Nombre producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio unitario</th>
                    <th scope="col">Total ventas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($resultado_ventas as $row): ?>
                    <tr>
                      <th><?php ECHO $row["NOMBRE_PRODUCTO"]; ?></th>
                      <td><?php ECHO $row["CANTIDAD"]; ?></td>
                      <td><?php ECHO $row["PRECIO_PRODUCTO"]; ?></td>
                      <td><?php ECHO $row["TOTAL_VENTAS"]; ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <!-- Botones -->
                <div class="botones d-flex justify-content-end">
                  <button type="button" name="nuevo" id="limpiar" class="naranja">Limpiar</button>
                  <button type="submit" name="buscar_reporte" id="buscar_reporte" class="rojo">Buscar reporte</button>
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
