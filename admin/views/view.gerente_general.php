<?php require "view.header.php"; ?>
    <main>
      <div class="container">
        <div class="row mt-5">
          <!-- barra de navegacion  -->
          <div class="col-md-3" id="blue">
            <button type="button" name="validar_reportes" class="btn_active" id="btn_validar_reportes_administrativos" onclick="toggle_Validar_Reportes_Administrativos()">
              Validar Reportes Administrativos
            </button>
            <button type="button" name="agendar_eventos" class="" id="btn_agendar_eventos" onclick="toggle_Agendar_Eventos()">
              Agendar Eventos
            </button>
            <button type="button" name="informacion_empleados" class="" id="btn_informacion_empleados" onclick="toggle_Informacion_Empleados()">
              Informacion Empleados
            </button>
          </div>
          <!-- panel -->
          <div class="col-md-9" id="white">
            <!-- VALIDAR REPORTES ADMINISTRATIVOS -->
            <div class="mt-5" id="div_GG_validar_reportes_administrativos">
              <!-- Filtro  -->
              <form class="" action="" method="post">
                <div class="" id="cmb_producto">
                  <select name="slct_tipo_reporte" id="slct_tipo_reporte">
                    <option value="efectivo">Correcto</option>
                    <option value="credito">Pendiente</option>
                    <option value="debito" selected>Incorrecto</option>
                  </select>
                  <select name="slct_ejercicio_contable" id="slct_ejercicio_contable">
                    <option value="efectivo">Balance General</option>
                    <option value="credito">Estados Financieros</option>
                    <option value="debito" selected>Ley oferta demanda</option>
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
                <div class="radio d-flex justify-content-start">
                  <label for="tiempo">Estado: </label>
                  <div class="item_radio ml-3">
                    <input type="radio" name="tiempo" value="Correcto"> Reporte Correcto
                  </div>
                  <div class="item_radio ml-3">
                    <input type="radio" name="tiempo" value="Incorrecto"> Reporte Incorrecto
                  </div>
                </div>
              <!-- Tabla -->
              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Sucursal</th>
                    <th scope="col">Empleado</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>dd/mm/yyyy</td>
                    <td>La de la esquina</td>
                    <td>Mark</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>dd/mm/yyyy</td>
                    <td>La de la otra esquina</td>
                    <td>Jacob</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>dd/mm/yyyy</td>
                    <td>La de aquí</td>
                    <td>Larry</td>
                  </tr>
                </tbody>
              </table>
              <!-- Botones -->
              <div class="botones d-flex justify-content-end">
                <button type="button" name="nuevo" id="limpiar" class="naranja">Limpiar</button>
                <input type="submit" name="filtrar" value="Filtrar Resultados" class="rojo">
                <input type="submit" name="enviar" value="Enviar a Gerencia Admin" class="rojo">
                <input type="submit" name="guardar" value="Guardar" class="rojo">
              </div>
              </form>
            </div>
            <!-- AGENDAR EVENTOS -->
            <div class="mt-5" id="div_GG_agendar_eventos">
              <!-- Filtro  -->
              <form class="" action="" method="post">
                <div class="">
                  <select name="slct_sucursal" id="slct_sucursal" required>
                    <option value="" disabled selected>Seleccione Sucursal</option>
                    <option value="efectivo">La de aquí</option>
                    <option value="credito">La de allá</option>
                    <option value="debito" selected>La que no existe</option>
                  </select>
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
                <button class="naranja" type="button" name="nuevo" id="limpiar">Crear Evento</button>
                <button class="rojo" type="button" name="generar" id="generar">Editar Evento</button>
                <button class="rojo" type="button" name="Imprimir" id="Imprimir">Imprimir</button>
              </div>
              </form>
            </div>
            <!-- INFORMACION/EMPLEADOS  -->
            <div class="mt-5" id="div_GG_informacion_empleados">
              <!-- Filtro  -->
              <form class="" action="" method="post">
                <div class="" id="src_buscar_empleado">
                  <input type="text" name="nombre" value="" placeholder="Buscar Empleado">
                </div>
                <div class="dates">
                  <input id="date" type="date">
                </div>
              <!-- Tabla -->
              <table class="table table-striped mt-3">
                <thead>
                  <tr>
                    <th scope="col">Codigo Empleado</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha Ingreso</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Lucas</td>
                    <td>Perez</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Marcos</td>
                    <td>Soto</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Luis</td>
                    <td>Castellanos</td>
                    <td>dd/mm/yyyy</td>
                  </tr>
                </tbody>
              </table>
              <!-- Botones -->
              <div class="botones d-flex justify-content-end">
                <input class="naranja" type="submit" name="buscar" value="Buscar">
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
