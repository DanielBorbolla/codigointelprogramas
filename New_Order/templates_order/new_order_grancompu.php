<div id="order_style" class="container">
  <div class="panel-body">
    <div class="m-2 p-3">
      <!-- ---------------table head--------------------- -->
      <div class="orden-info">

        <body>
          <table class="table-t">
            <thead class="info_encabezado">
              <th class="bor-jun">
                <div class="d-flex justify-content-center direccion">
                  <h1>
                    INTELPROGRAMAS S.C. DE R.L.<br>
                    DE C.V. SAN ANTONIO ABAD <br>COL.
                    TRANSITO CUAUHTÉMOC CDMX C.P.06820
                    <br>
                    5585969400
                  </h1>
                </div>
              </th>
              <th class="bor-jun">
                <div>
                  <img class="logo_m" src="http://localhost/codigointelprogramas/img/grancompu_logo.jpg" style="max-width:90%; max-height:90%; object-fit: contain;" alt="LOGO">
                </div>
              </th>
              <th class="bor-jun">
                <table class="table-info">
                  <h5>ORDEN DE COMPRA</h5>
                  <tr class="no_compra">
                    <th style="background:#4472C4 ; color:#DEEBF6 " class="orden_tamaño">NO: COMPRA </th>
                    <td><input class="compra_en" type="text" id="nordenc" name="orden" value="<?php echo $no_orden; ?>"></td>
                  </tr>
                  <tr>
                    <th style="background:#4472C4 ; color:#DEEBF6 " class="orden_tamaño">FECHA</th>
                    <td class="td-space"><input class="compra_en" type="date" id="fecha1" name="fecha1" value="<?php echo date('Y-m-d'); ?>"></td>
                  </tr>
                </table>
              </th>
            </thead>
          </table>
          <table class="table-info ">
            <tbody>
              <th scope="column" class="col-md-1-5" style="background:#4472C4 ; color:#DEEBF6 " colspan="2" rowspan="1">ID PROVEEDOR</th>
              <th scope="column" class="col-md-1-5" colspan="2" rowspan="1"><input class="info_pcl" type="text" id="idprov" name="idprov"></th>
              <th scope="column" class="col-md-1-5" style="background:#4472C4 ; color:#DEEBF6 " colspan="2" rowspan="1">ID NOSOTROS CLIENTES</th>
              <th scope="column" class="col-md-1-5" colspan="2" rowspan="1"><input class="info_pcl" type="text" id="idcliente" name="idcliente"></th>
              <tr>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Empresa</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="prov_empresa" name="prov_empresa" value=""></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">Ejecutivo</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="prov_ejecutivo" name="prov_ejecutivo"></td>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Empresa</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="cli_empresa" name="cli_empresa"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">Ejecutivo</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="cli_ejecutivo" name="cli_ejecutivo"></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Calle</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="prov_calle" name="prov_calle"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">Número</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="prov_numero" name="prov_numero"></td>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Calle</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="cli_calle" name="cli_calle"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">Número</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="cli_numero" name="cli_numero"></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Colonia</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="prov_colonia" name="prov_colonia"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">Municipio</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="prov_municipio" name="prov_municipio"></td>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Colonia</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="cli_colonia" name="cli_colonia"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">Municipio</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="cli_municipio" name="cli_municipio"></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Estado</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="prov_estado" name="prov_estado"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">C.P.</th>
                <td class="col-md-4"><input class="info_pcl" type="number" id="prov_cp" name="prov_cp" maxlength="5" minlength="5"></td>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Estado</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="cli_estado" name="cli_estado"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">C.P.</th>
                <td class="col-md-4"><input class="info_pcl" type="number" id="cli_cp" name="cli_cp" maxlength="5" minlength="5"></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Correo</th>
                <td class="col-md-5"><input class="info_pcl" type="email" id="prov_correo" name="prov_correo"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">País</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="prov_pais" name="prov_pais"></td>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Correo</th>
                <td class="col-md-5"><input class="info_pcl" type="email" id="cli_correo" name="cli_correo"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">País</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="cli_pais" name="cli_pais"></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Teléfono</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="prov_telefono" name="prov_telefono"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">Celular</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="prov_celular" name="prov_celular"></td>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Teléfono</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="cli_telefono" name="cli_telefono"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">Celular</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="cli_celular" name="cli_celular"></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Envio</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="envio" name="envio"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">Talon</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="talon" name="talon"></td>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Rotular</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="rotular" name="rotular"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5">Fecha</th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="fecha_envio" name="fecha_envio"></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Pagos</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="pagos" name="pagos"></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5"></th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="" name="" disabled></td>
                <th for="vendorstreet" style="background:#4472C4 ; color:#DEEBF6 " class="col-form-label">Fecha</th>
                <td class="col-md-5"><input class="info_pcl" type="text" id="" name="" disabled></td>
                <th scope="row" style="background:#4472C4 ; color:#DEEBF6 " class=" col-md-1-5"></th>
                <td class="col-md-4"><input class="info_pcl" type="text" id="" name="" disabled></td>
              </tr>
            <tbody>
          </table>
          <table class="table-info t-r tabla-i">
            <thead id="products_head">
              <tr class="info-desc">
                <th scope="column" column-name='no' class="t-1" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">No.</th>
                <th scope="column" column-name='clave' class="" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">
                  CLAVE
                  <br>
                  PRODUCTO
                </th>
                <th scope="column" column-name='marca' class="col-md-1-5 t-1" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">MARCA</th>
                <th scope="column" column-name='modelo' class="col-md-1-5" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">MODELO</th>
                <th scope="column" column-name='gab' class="col-md-1-5" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">GAB</th>

                <!-- ------------Modificado por Daniel Borbolla a petición de Luis------------------------ -->
                <!-- <th scope="column" column-name='procesador' class="col-md-1-5 t-1" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">PROCESADOR</th>
                <th scope="column" column-name='gen' class="col-md-1-5" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">GEN</th> -->


                <th scope="column" column-name='serial' class="col-md-3" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">Serial Number</th>
                <!-- ------------------- -->
                <th scope="column" column-name='ram' class="col-md-1-5" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">RAM</th>
                <th scope="column" column-name='disc' class="col-md-1-5 t-1" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">DISC</th>
                <th scope="column" column-name='tam' class="col-md-1-5" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">TAM</th>
                <th scope="column" column-name='cant' class="col-md-1-5" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">CANT</th>
                <th scope="column" column-name='precio' class="col-md-1-5 t-1" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">PRECIO
                  <br>
                  UNIT.
                </th>
                <th scope="column" column-name='importe' class="col-md-1-5" style="background:#4472C4 ; color:#DEEBF6 " colspan="1" rowspan="1">IMPORTE</th>
              </tr>
            </thead>
            <!- /* modificaciones de Daniel Borbolla: eliminación de nombres porque no van a ser usados por lo que pueden causar confusión: eliminación de id porque interfieren con el código corrección de clases */ ->
              <tbody id="products_body">
                <tr>
                  <th style="background:#DEEBF6 ; color:black " class="row_number"> <span class="numero">1</span>
                    <span class="icono-trash"><i class="fas fa-trash" style="color: red;"></i></span>
                  </th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_clave format_clave" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_marca format_marca" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_modelo format_modelo" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_gab format_gab" type="text"></th>
                  <!-- ------------Modificado por Daniel Borbolla a petición de Luis------------------------ -->

                  <!-- <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_procesador format_proc" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_gen format_gab" type="text"></th> -->
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_serial format_serial" type="text"></th>

                  <!-- ------------------- -->

                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_ram format_ram" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_disc format_disc" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_tam format_tam" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_cant valor-cantidad-input format_cant" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_precio valor-cantidad-input format_precio" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_importe format_importe" type="text"></th>

                </tr>
                <tr>
                  <th class="row_number"> <span class="numero">2</span>
                    <span class="icono-trash"><i class="fas fa-trash" style="color: red;"></i></span>
                  </th>
                  <th><input class="info_clave format_clave" type="text"></th>
                  <th><input class="info_marca format_marca" type="text"></th>
                  <th><input class="info_modelo format_modelo" type="text"></th>
                  <th><input class="info_gab format_gab" type="text"></th>
                  <!-- ------------Modificado por Daniel Borbolla a petición de Luis------------------------ -->

                  <!-- <th><input class="info_procesador format_proc" type="text"></th>
                  <th><input class="info_gen format_gab" type="text"></th> -->
                  <th><input class="info_serial format_serial" type="text"></th>
                  <!-- ------------------- -->

                  <th><input class="info_ram format_ram" type="text"></th>
                  <th><input class="info_disc format_disc" type="text"></th>
                  <th><input class="info_tam format_tam" type="text"></th>
                  <th><input class="info_cant valor-cantidad-input format_cant" type="text"></th>
                  <th><input class="info_precio valor-cantidad-input format_precio" type=" text"></th>
                  <th><input class="info_importe format_importe" type="text"></th>

                </tr>
                <tr>
                  <th style="background:#DEEBF6 ; color:black " class="row_number"> <span class="numero">3</span>
                    <span class="icono-trash"><i class="fas fa-trash" style="color: red;"></i></span>
                  </th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_clave format_clave" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_marca format_marca" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_modelo format_modelo" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_gab format_gab" type="text"></th>
                  <!-- ------------Modificado por Daniel Borbolla a petición de Luis------------------------ -->

                  <!-- <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_procesador format_proc" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_gen format_gab" type="text"></th> -->


                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_serial format_serial" type="text"></th>
                  <!-- ------------------- -->

                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_ram format_gab" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_disc format_gab" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_tam format_gab" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_cant valor-cantidad-input format_gab" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_precio valor-cantidad-input format_precio" type="text"></th>
                  <th style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_importe format_importe" type="text"></th>

                </tr>

              </tbody>
          </table>
          <button style="background:#4472c4; opacity:1;" class="boton_agregar" id="boton_agregar" name="button"><b>+ Agregar</b> </button>
          <br>
          <br>

          <table class="table-info borde45">
            <tbody>
              <th class="borde45">
                <div class="encabezado_cont">
                  <table class="table-info tabla_m tabla-m">
                    <tbody>
                      <tr class="">
                        <th scope="row" rowspan="1" colspan="1" style="background:#4472C4 ; color:#DEEBF6 " class="">NOTAS / OBSERVACIONES</th>
                      </tr>
                      <tr class="aumento">
                        <th scope="row" rowspan="1" colspan="1" style="background:#f7f3f4; color:rgb(5, 5, 5)" class="">
                          <textarea name="observacion" rows="4" cols="45"></textarea>
                        </th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </th>
              <th class="t-r borde45">
                <div class="encabezado_cont">
                  <table class=" tabla_datos t-l"">
                    <tbody>
                      <tr>
                        <th scope=" row" colspan="1" style="background:#DEEBF6 ; color:black " class="">SUBTOTAL
              </th>
              <td style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_imp2" type="text" id="subtotal" name="subtotal"></td>
              </tr>

              <tr>
                <th scope="row" colspan="1" style="background:#DEEBF6 ; color:black " class="">IVA</th>
                <td style="background:#DEEBF6 ; color:#DEEBF6 "><input class="info_imp2" type="text" id="iva" name="iva"></td>
              </tr>

              <tr>
                <th scope="row" colspan="1" style="background:#4472C4 ; color:#DEEBF6 " class="">TOTAL</th>
                <td style="background:#4472C4 ; color:#DEEBF6 "><input class="info_imp2" type="text" id="total" name="total"></td>
              </tr>
            </tbody>
          </table>
      </div>
      </th>
      </tbody>
      </table>
      <br>
      <br>
      <table class="table-info  u_t">
        <tbody>
          <th scope="column" class="col-md-1-5" style="background:#4472C4 ; color:#DEEBF6 " colspan="2" rowspan="1">METODO DE PAGO</th>
          <tr>
            <th style="background:#deebf6 ; color:black ">Banco</th>
            <td style="background:#deebf6 ; color:black "><input class="info_imp20" type="text" id="banco_nombre" name="banco_nombre"></td>
          </tr>
          <tr>
            <th>Cuenta</th>
            <td><input class="info_imp20" type="text" id="banco_cuenta" name="banco_cuenta"></td>
          </tr>
          <tr>
            <th style="background:#deebf6 ; color:black ">Condiciones de pago</th>
            <td style="background:#deebf6 ; color:black "><input class="info_imp20" type="text" id="banco_condiciones_pago" name="banco_condiciones_pago"></td>
          </tr>
        </tbody>
      </table>
      <br>
      <br>
      <hr style=" background:#4472c4; opacity:1; height: 0.2rem;">
      <h3>Manager
        <br>
        JORGE DE LA CRUZ
      </h3>

      </body>
    </div>
  </div>
</div>
<button id="saveOrder" type="button" style="background:#4472c4; opacity:1; height: initial" class="boton_agregar boton-guardar"><b>Guardar Orden</b> </button>
</div>
</div>