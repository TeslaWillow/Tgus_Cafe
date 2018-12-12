<?php require "view.header.php"; ?>
    <main>
      <div class="container">
        <div class="row mt-5">
          <!-- barra de navegacion  -->
          <div class="col-md-3" id="blue">
            <button type="button" name="facturacion" class="btn_active" id="btn_facturacion" onclick="toggle_Facturacion()">
              Facturación
            </button>
          </div>
          <!-- panel -->
          <div class="col-md-9" id="white">
            <!-- PANEL DE FACTURACION -->
            <div class="mt-5" id="div_facturacion">
              <div id="datos_generales">
                <!-- TEXTO FIJO  -->
                <div class="" id="texto">
                  <p>Tgus café</p>
                  <p>Waldina Paz</p>
                  <p>Bulv. Suyapa, Calle principal, fte UNAH, a la par de PACASA</p>
                  <p>teguskfe@gmail.com</p>
                  <p class="mt-5">RTN: 08011966147855</p>
                  <p>CIA: 1A3F6 - 56A10B - BB4684 - A69C4F - FA45E5 -75</p>
                </div>
                <!-- CAMPOS VARIABLES  -->
                <form class="mt-5" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <!-- N° factura y Fecha emision -->
                <div class="d-flex flex-row">
                  <label for="numero_factura" class="col-2 col-form-label">N° de Factura:</label>
                  <div class="col-4">
                    <input class="form-control" type="text" id="numero_factura" disabled>
                  </div>
                  <label for="numero_factura" class="col-2 col-form-label">Fecha de emisión: </label>
                  <div class="col-4">
                    <input class="form-control" type="text" id="numero_factura" disabled>
                  </div>
                </div>
                <!-- Nombre cajero y forma de pago  -->
                <div class="d-flex flex-row">
                  <label for="cajero" class="col-2 col-form-label">Cajero:</label>
                  <div class="col-4">
                    <input class="form-control" type="text" id="cajero" name="cajero" value="Jorge" disabled>
                  </div>
                  <label for="forma_pago" class="col-2 col-form-label">Forma de pago: </label>
                  <select name="forma_pago" id="forma_pago" class="custom-select col-4 mt-2" required>
                    <option value="" disabled selected>Seleccione forma de pago</option>
                    <option value="formal">Efectivo</option>
                    <option value="entrevista">Debito</option>
                    <option value="birthday" selected>Credito</option>
                  </select>
                </div>
                <!-- Producto y Cantidad  -->
                <div class="d-flex flex-row">
                  <label for="slct_producto" class="col-2 col-form-label">Seleccione producto: </label>
                  <select name="slct_producto" id="slct_producto" class="custom-select col-4 mt-2" required>
                    <option value="" disabled selected>Seleccione producto de la lista</option>
                    <?php foreach ($slct_producto as $row): ?>
                      <option value="<?php echo $row["CODIGO_PRODUCTO"]; ?>">
                        <?php echo $row["NOMBRE_PRODUCTO"]; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <label for="cantidad" class="col-2 col-form-label">Cantidad: </label>
                  <input  class="form-control col-4" type="number" name="cantidad" id="cantidad" min="1" max="1000" required>
                </div>
                <!-- Nombre Cliente -->
                <div class="d-flex justify-content-between">
                  <label for="nombre_cliente" class="col-2 col-form-label">Nombre cliente(Opcional):</label>
                  <div class="col-4">
                    <input class="form-control" type="text" id="nombre_cliente" name="nombre_cliente" value="">
                  </div>
                  <button class="btn btn-primary col-5" type="submit" name="agregar">Agregar Producto</button>
                </div>
                <!-- Tabla -->
                <div class="row mt-5">
                  <div class="col-md-12">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Producto</th>
                          <th scope="col">Precio Unitario</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Citrolax</th>
                          <td>algo</td>
                          <td>5</td>
                          <td>100</td>
                        </tr>
                        <tr>
                          <th scope="row">Patate</th>
                          <td>algo</td>
                          <td>3</td>
                          <td>100</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Totales -->
                <div class="row" id="sub_totales">
                  <div class="col-md-12">
                    <p>Sub-Total: <span>000000 L.</span></p>
                    <p>ISV 15%: <span>000000 L.</span></p>
                    <p>Total a pagar: <span>000000 L.</span></p>
                    <!-- Botones -->
                    <button type="submit" name="imprimir">Imprimir</button>
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
