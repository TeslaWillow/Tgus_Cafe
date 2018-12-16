<?php require "view.header.php"; ?>
    <main>
      <div class="container">
        <div class="row mt-5">
          <!-- barra de navegacion  -->
          <div class="col-md-3" id="blue">
            <!-- BTN Vizualizar Eventos -->
            <button type="button" name="informacion_empleados" class="btn_active" id="btn_vizualizar_eventos" onclick="toggle_Vizualizar_Informacion()">
              Vizualizar Eventos
            </button>
            <!-- BTN Agendar Eventos -->
            <button type="button" name="agendar_eventos" class="" id="btn_agendar_eventos" onclick="toggle_Agendar_Eventos()">
              Agendar Eventos
            </button>
            <!-- BTN Agregar Clientes -->
            <button type="button" name="agendar_eventos" class="" id="btn_agregar_clientes" onclick="toggle_Agregar_Clientes()">
              Agregar Clientes
            </button>
            <!-- BTN Agregar Producto -->
            <button type="button" name="agendar_eventos" class="" id="btn_agregar_producto" onclick="toggle_Agregar_Productos()">
              Agregar Producto
            </button>
          </div>
          <!-- panel -->
          <div class="col-md-9" id="white">
            <!-- VIZUALIZAR EVENTOS  -->
            <div class="mt-5" id="div_GG_vizualizar_eventos">
              <!-- Filtro  -->
              <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <!-- Nombre Evento  -->
                <div class="d-flex flex-row">
                  <label for="nombre_evento" class="col-2 col-form-label">Nombre evento:</label>
                  <div class="col-10">
                    <input class="form-control" type="text" id="nombre_evento" name="nombre_evento">
                  </div>
                </div>
                <!-- Fecha Evento -->
                <!-- <div class="d-flex flex-row">
                  <label for="fecha_evento" class="col-2 col-form-label">Fecha evento: </label>
                  <div class="col-10">
                    <input class="form-control" type="date" value="0000-00-00" id="fecha_evento" name="fecha_evento">
                  </div>
                </div> -->
              <!-- Tabla -->
              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">Nombre Evento</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora inicio</th>
                    <th scope="col">Hora fin</th>
                    <th scope="col">Reservado por</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Ciclo para llenar la tabla  -->
                  <?php foreach ($resultado_eventos as $row):?>
                    <tr>
                      <th><?php echo  $row["NOMBRE_EVENTO"] ?></th>
                      <td><?php echo  $row["FECHA_EVENTO"] ?></td>
                      <td><?php echo  $row["HORA_INICIO"] ?></td>
                      <td><?php echo  $row["HORA_FIN"] ?></td>
                      <td><?php echo  $row["NOMBRE"] ?></td>
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
            <!-- AGREGAR EVENTOS -->
            <div class="mt-5" id="div_GG_agendar_eventos">
              <!-- Filtro  -->
              <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="form_agregar_evento">
              <div class="d-flex flex-column">
                <!-- Nombre Evento -->
                <div class="d-flex flex-row">
                  <label for="nuevo_nombre_evento" class="col-2 col-form-label">Nombre evento:</label>
                  <div class="col-10">
                    <input class="form-control" type="text" id="nuevo_nombre_evento" name="nuevo_nombre_evento" required>
                  </div>
                </div>
                <!-- Fecha Evento -->
                <div class="d-flex flex-row">
                  <label for="fecha_evento" class="col-2 col-form-label">Fecha evento: </label>
                  <div class="col-10">
                    <input class="form-control" type="date" value="0000-00-00" id="fecha_evento" name="fecha_evento" min="<?php echo $hoy; ?>" required>
                  </div>
                </div>
                <!-- Hora del Evento -->
                <div class="d-flex flex-row mt-3">
                  <label for="hora_inicio" class="col-2 col-form-label">Hora Inicio: </label>
                  <input  class="form-control col-4" type="number" name="hora_inicio" min="0" max="23" required>
                  <label for="minuto_inicio" class="col-2 col-form-label">Minuto Inicio: </label>
                  <input  class="form-control col-4" type="number" name="minuto_inicio" min="0" max="60" required>
                </div>
                <div class="d-flex flex-row mt-3">
                  <label for="hora_fin" class="col-2 col-form-label">Hora fin: </label>
                  <input  class="form-control col-4" type="number" name="hora_fin" min="0" max="23" required>
                  <label for="minuto_fin" class="col-2 col-form-label">Minuto fin: </label>
                  <input  class="form-control col-4" type="number" name="minuto_fin" min="0" max="60" required>
                </div>
                <!-- Tipo de Evento -->
                <div class="d-flex flex-row mt-3">
                  <label for="slct_tipo_evento" class="col-2 col-form-label">Tipo de Evento: </label>
                  <select name="slct_tipo_evento" id="slct_tipo_evento" class="custom-select col-10 mt-2" required>
                    <option value="" disabled selected>Seleccione el tipo de evento</option>
                    <?php foreach ($resultado_slct_tipo_evento as $row): ?>
                      <option value="<?php echo $row["CODIGO_TIPO_EVENTO"] ?>">
                        <?php echo $row["TIPO_EVENTO"] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <!-- Reservado por -->
                <div class="d-flex flex-row mt-3">
                  <label for="slct_reservado_por" class="col-2 col-form-label">Reservado por: </label>
                  <select name="slct_reservado_por" id="slct_reservado_por" class="custom-select col-10 mt-2" required>
                    <option value="" disabled selected>¿Quién reserva el evento?</option>
                    <?php foreach ($resultado_slct_reservado_por as $row): ?>
                      <option value="<?php echo $row["CODIGO_CLIENTE"] ?>">
                        <?php echo $row["NOMBRE_COMPLETO"] ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <!-- Botones -->
              <div class="botones d-flex justify-content-center mt-5 flex-row">
                <button type="submit" class="btn btn-danger btn-lg btn-block col-10" name="btn_insertar_evento" id="btn_insertar_evento" value="1">Agregar Evento</button>
                <button type="button" class="btn btn-warning col-2 ml-2" onclick="limpiar_Formulario_Agregar_Evento()">Limpiar</button>
              </div>
              </form>
            </div>
            <!-- AGREGAR CLIENTE -->
            <div class="mt-5" id="div_GG_agregar_cliente">
              <!-- Filtro  -->
              <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="agregar_cliente">
                <!-- FORMULARIO -->
                <div class="d-flex flex-column">
                  <!-- Nombre Cliente -->
                  <div class="d-flex flex-row">
                    <label for="nombre_cliente" class="col-2 col-form-label">Nombre cliente:</label>
                    <div class="col-10">
                      <input class="form-control" type="text" id="nombre_cliente" name="nombre_cliente" onfocusout="validar_Formulario_Clientes()" required>
                    </div>
                  </div>
                  <!-- Apellido Cliente -->
                  <div class="d-flex flex-row">
                    <label for="apellido_cliente" class="col-2 col-form-label">Apellido cliente:</label>
                    <div class="col-10">
                      <input class="form-control" type="text" id="apellido_cliente" name="apellido_cliente" onfocusout="validar_Formulario_Clientes()" required>
                    </div>
                  </div>
                  <!-- Dirección Cliente -->
                  <div class="d-flex flex-row mt-3">
                    <label for="slct_direccion_cliente" class="col-2 col-form-label">Dirección Cliente: </label>
                    <select name="slct_direccion_cliente" id="slct_direccion_cliente" class="custom-select col-10 mt-2" required>
                      <option value="" disabled selected>Seleccione tipo de dirección del cliente</option>
                      <?php foreach ($slct_direccion as $row): ?>
                        <option value="<?php echo $row["CODIGO_DIRECCION"] ?>"><?php echo $row["TIPO_DIRECCION"]; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <!-- Tipo Cliente -->
                  <div class="d-flex flex-row mt-3">
                    <label for="slct_tipo_cliente" class="col-2 col-form-label">Tipo Cliente: </label>
                    <select name="slct_tipo_cliente" id="slct_tipo_cliente" class="custom-select col-10 mt-2" required>
                      <option value="" disabled selected>¿Qué tipo de cliente es?</option>
                      <?php foreach ($slct_Tipo_Cliente as $row): ?>
                        <option value="<?php echo $row["CODIGO_TIPO_CLIENTE"] ?>"><?php echo $row["TIPO_CLIENTE"]; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              <!-- Botones -->
                <div class="botones d-flex justify-content-end mt-3">
                  <button type="button" name="limpiar" id="limpiar" class="naranja"  onclick="limpiar_Formulario_Agregar_Cliente()">Limpiar</button>
                  <button type="submit" name="btn_crear_cliente" id="btn_crear_cliente" class="rojo" value="1">Crear cliente</button>
                </div>
              </form>
            </div>
            <!-- AGREGAR PRODUCTO -->
            <div class="mt-5" id="div_GG_agregar_producto">
              <!-- Filtro  -->
              <form class="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="agregar_producto">
                <!-- FORMULARIO -->
                <div class="d-flex flex-column">
                  <!-- Nombre Cliente -->
                  <div class="d-flex flex-row">
                    <label for="nombre_producto" class="col-2 col-form-label">Nombre producto:</label>
                    <div class="col-10">
                      <input class="form-control" type="text" id="nombre_producto" name="nombre_producto" required>
                    </div>
                  </div>
                  <!-- Precio Producto -->
                  <div class="d-flex flex-row mt-3">
                    <label for="lempiras" class="col-2 col-form-label">Lempiras: </label>
                    <input  class="form-control col-4" type="number" name="lempiras" min="1" max="9999" required>
                    <label for="centavos" class="col-2 col-form-label">Centavos: </label>
                    <input  class="form-control col-4" type="number" name="centavos" min="0" max="99" required>
                  </div>
                  <!-- Tipo Producto -->
                  <div class="d-flex flex-row mt-3">
                    <label for="slct_tipo_producto" class="col-2 col-form-label">Dirección Cliente: </label>
                    <select name="slct_tipo_producto" id="slct_tipo_producto" class="custom-select col-10 mt-2" required>
                      <option value="" disabled selected>Seleccione el tipo de producto</option>
                      <?php foreach ($slct_Tipo_Producto  as $row): ?>
                        <option value="<?php echo $row["CODIGO_TIPO_PRODUCTO"] ?>"><?php echo $row["TIPO_PRODUCTO"]; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              <!-- Botones -->
                <div class="botones d-flex justify-content-end mt-3">
                  <button type="button" name="limpiar" id="limpiar" class="naranja"  onclick="limpiar_Formulario_Agregar_Cliente()">Limpiar</button>
                  <button type="submit" name="btn_crear_producto" id="btn_crear_producto" class="rojo" value="1">Crear cliente</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer></footer>

    <script type="text/javascript" src="<?php echo RUTA; ?>Scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo RUTA; ?>Scripts/hide_gg.js"></script>
  </body>
</html>
