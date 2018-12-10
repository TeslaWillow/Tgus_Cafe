<?php require "view.header.php"; ?>
    <main>
      <div class="container">
        <div class="row mt-5">
          <!-- barra de navegacion  -->
          <div class="col-md-3" id="blue">
            <button type="button" name="registro" class="btn_active" id="btn_registro" onclick="toggle_Registro()">
              Registro de movimiento de productos
            </button>
            <button type="button" name="facturacion" class="" id="btn_facturacion" onclick="toggle_Facturacion()">
              Facturación
            </button>
          </div>
          <!-- panel -->
          <div class="col-md-9" id="white">
            <!-- REGISTRO DE MOVIMIENTOS  -->
            <div class="mt-5" id="div_registro">
              <!-- Buscador -->
              <form class="" action="" method="post">
                <input type="text" name="" value="" placeholder="Buscar Producto">
              </form>
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
                  <button type="button" name="reiniciar" id="limpiar">Reiniciar</button>
                  <input type="submit" name="generar" value="Generar">
                </div>
              </form>
            </div>
            <!-- PANEL DE FACTURACION -->
            <div class="mt-5" id="div_facturacion">
              <div id="datos_generales">
                <div class="" id="texto">
                  <p>Tgus café</p>
                  <p>Waldina Paz</p>
                  <p>Bulv. Suyapa, Calle principal, fte UNAH, a la par de PACASA</p>
                  <p>teguskfe@gmail.com</p>
                  <p class="mt-5">RTN: 08011966147855</p>
                  <p>CIA: 1A3F6 - 56A10B - BB4684 - A69C4F - FA45E5 -75</p>
                </div>
                <form class="mt-5" action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                      <p>N° de factutra: <span>00045</span></p>
                      <p>Cajero: <span>Fulano de tal</span></p>
                        <label for="cliente">Cliente: </label>
                        <input type="text" name="cliente" id="cliente" value="">
                    </div>
                    <div class="col-md-6">
                      <p>Fecha de emision: <span>DD/MM/YYYY</span></p>
                      <label for="forma_pago">Forma de Pago:</label>
                      <select name="forma_pago" id="forma_pago">
                        <option value="efectivo">Efectivo</option>
                        <option value="credito">Credito</option>
                        <option value="debito" selected>Debito</option>
                      </select>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Codigo</th>
                          <th scope="col">Descripcion</th>
                          <th scope="col">Precio Unitario</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>algo</td>
                          <td>5</td>
                          <td>100</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>algo</td>
                          <td>3</td>
                          <td>100</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Larry</td>
                          <td>algo</td>
                          <td>10</td>
                          <td>100</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row" id="sub_totales">
                  <div class="col-md-12">
                    <p>Sub-Total: <span>000000 L.</span></p>
                    <p>ISV 15%: <span>000000 L.</span></p>
                    <p>Total a pagar: <span>000000 L.</span></p>

                    <button type="button" name="Imprimir">Imprimir</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer></footer>

    <script type="text/javascript" src="<?php echo RUTA; ?>Scripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo RUTA; ?>Scripts/hide.js"></script>
  </body>
</html>
