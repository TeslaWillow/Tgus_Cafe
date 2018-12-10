<?php require "view.header.php"; ?>
    <main>
      <div class="container">
        <div class="row mt-5">
          <!-- barra de navegacion  -->
          <div class="col-md-3" id="blue">
            <button type="button" name="agendar_eventos" class="btn_active" id="btn_agendar_eventos" onclick="toggle_Agendar_Eventos()">
              Agendar Eventos
            </button>
            <button type="button" name="informacion_empleados" class="" id="btn_vizualizar_eventos" onclick="toggle_Vizualizar_Informacion()">
              Vizualizar Eventos
            </button>
          </div>
          <!-- panel -->
          <div class="col-md-9" id="white">
            <!-- AGREGAR EVENTOS -->
            <div class="mt-5" id="div_GG_agendar_eventos">
              <!-- Filtro  -->
              <form class="" action="" method="post">
              <div class="d-flex flex-column">
                <!-- Nombre Evento -->
                <div class="d-flex flex-row">
                  <label for="nombre_evento" class="col-2 col-form-label">Nombre evento:</label>
                  <div class="col-10">
                    <input class="form-control" type="text" id="nombre_evento" required>
                  </div>
                </div>
                <!-- Fecha Evento -->
                <div class="d-flex flex-row">
                  <label for="fecha_evento" class="col-2 col-form-label">Fecha evento: </label>
                  <div class="col-10">
                    <input class="form-control" type="date" value="0000-00-00" id="fecha_evento" name="fecha_evento" required>
                  </div>
                </div>
                <!-- Hora del Evento -->
                <div class="d-flex flex-row mt-3">
                  <label for="hora_inicio" class="col-2 col-form-label">Hora Inicio: </label>
                  <input  class="form-control" type="number" name="hora_inicio" min="0" max="23" required>
                  <label for="minuto_inicio" class="col-2 col-form-label">Minuto Inicio: </label>
                  <input  class="form-control" type="number" name="minuto_inicio" min="0" max="60" required>
                </div>
                <div class="d-flex flex-row mt-3">
                  <label for="hora_fin" class="col-2 col-form-label">Hora fin: </label>
                  <input  class="form-control" type="number" name="hora_fin" min="0" max="23" required>
                  <label for="minuto_fin" class="col-2 col-form-label">Minuto fin: </label>
                  <input  class="form-control" type="number" name="minuto_fin" min="0" max="60" required>
                </div>
                <!-- Tipo de Evento -->
                <div class="d-flex flex-row mt-3">
                  <label for="hora_fin" class="col-2 col-form-label">Tipo de Evento: </label>
                  <select name="slct_tipo_evento" id="slct_tipo_evento" class="custom-select col-10 mt-2" required>
                    <option value="" disabled selected>Seleccione el tipo de evento</option>
                    <option value="formal">Formal</option>
                    <option value="entrevista">Entrevista</option>
                    <option value="birthday" selected>Birthday</option>
                  </select>
                </div>
                <!-- Reservado por -->
                <div class="d-flex flex-row mt-3">
                  <label for="hora_fin" class="col-2 col-form-label">Reservado por: </label>
                  <select name="slct_tipo_evento" id="slct_tipo_evento" class="custom-select col-10 mt-2" required>
                    <option value="" disabled selected>¿Quién reserva el evento?</option>
                    <option value="fulano">Fulano</option>
                    <option value="mengano">Mengano</option>
                    <option value="sutano" selected>Sutano</option>
                  </select>
                </div>
              </div>
              <!-- Botones -->
              <div class="botones d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-danger btn-lg btn-block">Submit</button>
              </div>
              </form>
            </div>
            <!-- VIZUALIZAR EVENTOS  -->
            <div class="mt-5" id="div_GG_vizualizar_eventos">
              <!-- Filtro  -->
              <form class="" action="" method="post">
                <!-- Nombre Evento  -->
                <div class="d-flex flex-row">
                  <label for="nombre_evento" class="col-2 col-form-label">Nombre evento:</label>
                  <div class="col-10">
                    <input class="form-control" type="text" id="nombre_evento" required>
                  </div>
                </div>
                <!-- Fecha Evento -->
                <div class="d-flex flex-row">
                  <label for="fecha_evento" class="col-2 col-form-label">Fecha evento: </label>
                  <div class="col-10">
                    <input class="form-control" type="date" value="0000-00-00" id="fecha_evento" name="fecha_evento" required>
                  </div>
                </div>
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
                  <tr>
                    <th scope="row">1</th>
                    <td>dd/mm/yyyy</td>
                    <td>00:00</td>
                    <td>00:00</td>
                    <td>Fulano</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>dd/mm/yyyy</td>
                    <td>00:00</td>
                    <td>00:00</td>
                    <td>Mengano</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>dd/mm/yyyy</td>
                    <td>00:00</td>
                    <td>00:00</td>
                    <td>Sutano</td>
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
          </div>
        </div>
      </div>
    </main>
    <footer></footer>

    <script type="text/javascript" src="<?php echo RUTA; ?>Scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo RUTA; ?>Scripts/hide_gg.js"></script>
  </body>
</html>
