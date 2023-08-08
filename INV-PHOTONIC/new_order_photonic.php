
<?php
$page_title = 'Nueva Orden de Compra';
session_start();
if (!isset($_SESSION['nombre_usuario'])) {

  echo '<script>window.location.href="index.php";</script>';
}

require('Main_app/conexion.php');

$tipo = (int)$_SESSION['tipo'];

if ($tipo === 1 || $tipo === 2) {
  $id_empresa = $_SESSION['id_empresa'];
  $permiso = 6;
} else {
  $id_empresa = $_SESSION['id_emp'];
}
$ordernoquerry = $conexion->prepare("SELECT ifnull(no_orden,0) no_orden from ordenes_compra WHERE id_empresa = :id_empresa ORDER BY no_orden DESC LIMIT 1");
$ordernoquerry->bindParam(':id_empresa', $id_empresa, PDO::PARAM_INT);
$ordernoquerry->execute();
$orderno = $ordernoquerry->fetch(PDO::FETCH_ASSOC);
$neworderno = $orderno['no_orden'] + 1;


require_once "librerias/header_menu.php"; ?>
<style>
/*Encabezado de orden*/ 
.panel-body {
  margin: 0;
  padding: 0;
}
html {
  font-size: 62.5%;
}
table {
  border-spacing: 0;
  width: 100%;
  font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
  margin-top: 1rem;
}

th,
td {
  border: 0.01px solid black;
}

/*ENCABEZADO DE TABLA*/
.def-logo {
  width: 35%;
  height: 11.2rem;
  font-size: 1.8rem;
  margin: 0%;
  border-radius: 10px;
  border: solid black 2px;
  background: white;
  color: black;
}

.imgprin {
  width: 20rem;
}

.def-dir {
  width: 40rem;
  height: 11.2rem;
  border-radius: 10px;
  color: black;
  background: white;
}

.mar-po {
  font-size: 1.7rem;
  margin: 0%;
}

.def-ord {
  width: 25%;
 height: 11.2rem;
}

/*Tabla datos*/


.colla {
  border: black;
}

.capnom {
  color: #3173d6f5;
  font-size: 2.4rem;
  margin: 0;
  padding: 0;
}
.number-or {
  width: 8rem;
  height: 3.2rem;
  font-size: 2.5rem;
  text-align: center;
  border: black;
}
.dateco {
  width: 11rem;
  font-size: 1.5rem;
}
.def-co {
  width: 9rem;
  height: 3.2rem;
  border-spacing: 0;
  font-size: 1.2rem;
}

.def-co1 {
  background-color: #3173d6f5;
  color: white;
}

.tablerad{
  border-collapse: separate;
        border-spacing: 10;
        border: 3px solid black;
        border-radius: 15px;
        -moz-border-radius: 20px;
        padding: 0px;
}

.eliwcol{
  background: white;
  border: white;
  
}
/*TABLA DATOS CLIENTE Y PROVEDOR*/
.fondo-de-tabla{
  background-color: #ffffff;
  border: #000000;
}

.borde-redondeado-tabla{
  background-color: #ffffff;
  border-collapse: separate;
        border-spacing: 10;
        border: 5px solid black;
        border-radius: 15px;
        -moz-border-radius: 20px;
        padding: 0px;
}

.color-tabla-datos{
  background-color: #4472c4;
}

.input-tabladatos{
  width: 100%;
  height:2.1rem;
  border: #ffffff;
}

.dat-azul{
  background-color: #4472c4;
}

/*tabla producto*/
.vg-cor{
  background: #4472c4;
}

.tablenum{
  width: 3%;
}

.tablecod{
  width: 11%;
}

.tablemarc{
  width: 11%;
}

.tablemod{
  width: 12%;
}

.tablegab{
  width: 10%;
}

.tablepro{
  width: 13%;
}

.tablegen{
  width: 5%;
}

.tableram{
  width: 5%;
}

.tabletam12{
  width: 4%;
}
.tabledisk{
  width: 5%;
}



.tablecant{
  width: 7%;
}

.tableprec{
  width: 7%;
}

.tableimp{
  width: 7%;
}

.tableartics{
  border-collapse: separate;
        border-spacing: 10;
        border: 4px solid black;
        border-radius: 15px;
        -moz-border-radius: 20px;
        padding: 0px;
}

.tabletam{
  width: 100%;
}

.input1{
  width: 100%;
  border-color: white;
}
/*Tabla número de series*/
.numerodeserie{
  background-color: #4472c4;
  font-size: 1.7rem;
}
.colum_fila{
  width: 100%;
  font-size: 1.7rem;
}
.tablerad2{
  border-collapse: separate;
        border-spacing: 10;
        border: 4px solid black;
        border-radius: 13px;
        -moz-border-radius: 20px;
        padding: 0px;
}
/*tabla notas y total*/
.bordernon {
    border-color: white;
    background-color: white;
    width: 100%;
}
.notas_observaciones{
    font-size: 1.7rem;
}
.paddingT4{
    padding-left: 28rem;
}
textarea {
    width: 50%;
    height: 6rem;
}
.tamanotd{
    width: 10rem;
}
.subtamaño{
    width: 10rem;
    font-size: 1.7rem;
}
.iva{
  font-size: 1.7rem;
}
.subtotal{
    width: 18rem;
    height: 2.6rem;
    font-size: 1.7rem;
}
.total{
  font-size: 1.7rem;
}
/*--Borrar el border de los input--*/
input{
    border: white;
}
</style>

<div class="container">
    <div class="panel-body">
      <div class="m-2 p-3">

          <!-- ---------------TABLA ENCABEZADO--------------------- -->
      <div>
        <body>
        <table>
          <thead>
            
          <tr>
            <th class="eliwcol">
            <table class="tablerad">
             <th class=" def-logo def-dir bor-jun" colspan="4" >
                <h4 class="mar-po"><b>
                  INTELPROGRAMAS S.C DE R.L. DE C.V.
                  <br>
                  SAN ANTONIO ABAD COL. TRÁNSITO
                  <br>
                  CUAUHTÉMOC CDMX C.P. 06820
                  <br>
                  TELEFONO 5585969400
                  </b></h4>
              </th>
             </table>
            </th>
            <th class="eliwcol">
            <table class="tablerad">
            <th class="def-logo bor-jun esp-2" colspan="2">
                  <img class="imgprin" src="img/grancompu_logo.jpg" alt="LOGO GRANCOMPU">
              </th>
            </table>
            </th>
            <th class="eliwcol">
            <table class="tablerad">
            <th class="def-logo def-ord">
                <table>
                  <div>
                  <h1 class="capnom">ORDEN DE COMPRA</h1>
                  </div>
                   
                    <tr>
                      <th class="def-co def-co1">NO. COMPRA</th>
                      <td class="def-co"><input class="number-or" value="1012"></th>
                    </tr>
                    <tr>
                      <th class="def-co def-co1">FECHA</td>
                      <td class="def-co"><input class="dateco" type="date"></td>
                    </tr>
                  </table>
             </th>
            </table>
            </th>
          </tr>
        </thead>
        </table>
        <!---TABLA DE DATOS--->
        <table>
          <tr>
            <th class="fondo-de-tabla">
              <table class="borde-redondeado-tabla">
                <tr>
                  <th class="color-tabla-datos" colspan="2">ID Proveedor</th>
                  <td colspan="2"><input class="input-tabladatos" value="PNC182" ></td>
                </tr>
                <tr>
                  <th class="dat-azul"scope="row">Empresa</th>
                  <td><input class="input-tabladatos" value="PN CALIFORNIA"></td>
                  <th class="dat-azul"scope="row">Ejecutivo</th>
                  <td><input class="input-tabladatos" value="PARMOND JAIN"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Calle</th>
                  <td><input class="input-tabladatos" value="SOMERESE BLD"></td>
                  <th class="dat-azul">Número</th>
                  <td><input class="input-tabladatos" value="9016"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Colonia</th>
                  <td><input class="input-tabladatos" value="BELLFLOWER"></td>
                  <th class="dat-azul">Municipio</th>
                  <td><input class="input-tabladatos" value=""></td>
                </tr>
                <tr>
                  <th class="dat-azul">Estado</th>
                  <td><input class="input-tabladatos" value="CALIFORNIA"></td>
                  <th class="dat-azul">C. postal</th>
                  <td><input class="input-tabladatos" value="90706"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Correo</th>
                  <td><input class="input-tabladatos" value="SALES@PNCALIFORNIA"></td>
                  <th class="dat-azul">País</th>
                  <td><input class="input-tabladatos" value="USA"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Telefono</th>
                  <td><input class="input-tabladatos" value="562 866 8581"></td>
                  <th class="dat-azul">Celular</th>
                  <td><input class="input-tabladatos" value="562 418 5474"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Envio</th>
                  <td></td>
                  <th class="dat-azul">Talon</th>
                  <td></td>
                </tr>
                <tr>
                  <th class="dat-azul">Pagos</th>
                  <td></td>
                  <th class="dat-azul">Número</th>
                  <td></td>
                </tr>
              </table> 
            </th>
            <th class="fondo-de-tabla">
              <table class="borde-redondeado-tabla">
                <tr>
                  <th class="dat-azul" colspan="2">ID Cliente</th>
                  <td colspan="2"><input class="input-tabladatos" value=" " ></td>
                </tr>
                <tr>
                  <th class="dat-azul" scope="row">Empresa</th>
                  <td><input value="PHOTONIC INC" class="input-tabladatos"></td>
                  <th class="dat-azul" scope="row">Ejecutivo</th>
                  <td><input value="JORGE DE LA CRUZ" class="input-tabladatos"></td>
                </tr>
                <tr>
                  <th class="dat-azul"> Calle</th>
                  <td><input value="ADUANALES" class="input-tabladatos"></td>
                  <th class="dat-azul">Número</th>
                  <td><input value="1907" class="input-tabladatos"></td>
                </tr>
                <tr></tr>
                  <th class="dat-azul">Colonia</th>
                  <td><input value="LAREDO" class="input-tabladatos"></td>
                  <th class="dat-azul">Municipio</th>
                  <td><input value="WEBB" class="input-tabladatos"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Estado</th>
                  <td><input value="TEXAS" class="input-tabladatos"></td>
                  <th class="dat-azul">C. postal</th>
                  <td><input value="78041" class="input-tabladatos"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Correo</th>
                  <td><input value="JCRUZ@CLUBINTER.NET" class="input-tabladatos"></td>
                  <th class="dat-azul">País</th>
                  <td><input value="USA" class="input-tabladatos"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Telefono</th>
                  <td><input value="956 722 3326" class="input-tabladatos"></td>
                  <th class="dat-azul">Celular</th>
                  <td><input value="956 693 044" class="input-tabladatos"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Rotular</th>
                  <td><input value="" class="input-tabladatos"></td>
                  <th class="dat-azul" >Fecha</th>
                  <td><input value="" class="input-tabladatos"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Fecha</th>
                  <td><input value="" class="input-tabladatos"></td>
                  <th class="dat-azul">Fecha</th>
                  <td><input value="" class="input-tabladatos"></td>
                </tr>
              </table>
            </th>
          </tr>
        </table>
       
        
      <br>
      <table class="tableartics"> <!--tabla producto-->
        <tr class="colorprod">
         <th class="vg-cor tablenum">No</th>
         <th class="vg-cor tablecod">Codigo</th>
         <th class="vg-cor tablemarc">Marca</th>
         <th class="vg-cor tablemod">Modelo</th>
         <th class="vg-cor tablegab">Gabinete</th>
         <th class="vg-cor tablepro">Procesador</th>
         <th class="vg-cor tablegen">Gen</th>
         <th class="vg-cor tableram">Ram</th>
         <th class="vg-cor tabledisk">Disco</th>
         <th class="vg-cor tabletam12">Tam</th>
         <th class="vg-cor tablecant">Cant.</th>
         <th class="vg-cor tableprec">Precio U.</th>
         <th class="vg-cor tableimp">Importe</th>
        </tr>
        <tr class="item">
         <td class="tablenum">1</td>
         <td class="tablecod"><input value="1CEL8G16X4" class="fontbor input1 item_row" onkeypress="addrow(event)" ></td>
         <td class="tablemarc"><input value='LENOVO' class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablemod"><input value="THINKPAD T620" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablegab"><input value="LAPTOP" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablepro"><input value="CELERON 112548K" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablegen"><input value="11" class="fontbor input1 item_row" onkeypress="addrow(event)" ></td>
         <td class="tableram"><input value='500' class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tabledisk"><input value='16' class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tabletam12"><input value='14"' class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablecant"><input value="300" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tableprec"><input value="25.00" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tableimp"><input value="9500.00" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
        </tr>

        
        </table>
        
        <table class="tablerad2"><!--tabla series-->
          <tr>
            <th colspan="8" class="numerodeserie">NUMERO DE SERIES</th>
          </tr>
          <!--SERIE 1-->
          <tr>
            <td><input value="5CD8245GXY" class="colum_fila"></td>
            <td><input value="5CD83376W3" class="colum_fila"></td>
            <td><input value="5CD83366SQ" class="colum_fila"></td>
            <td><input value="5CD833777S" class="colum_fila"></td>
            <td><input value="5CD86366SJ" class="colum_fila"></td>
            <td><input value="5CD835877F" class="colum_fila"></td>
            <td><input value="5CD821BRQQ" class="colum_fila"></td>
            <td><input value="5CD86366SJ" class="colum_fila"></td>
          </tr>
          <tr>
            <td><input value="5CD8348RM3" class="colum_fila"></td>
            <td><input value="5CD8245GDW" class="colum_fila"></td>
            <td><input value="5CD8213UY4" class="colum_fila"></td>
            <td><input value="5CD8213S4Y" class="colum_fila"></td>
            <td><input value="5CD82IBRYY" class="colum_fila"></td>
            <td><input value="5CD835878B" class="colum_fila"></td>
            <td><input value="5CD821BS1F" class="colum_fila"></td>
            <td><input value="5CD82IBRYY" class="colum_fila"></td>
          </tr>
          <tr>
            <td><input value="5CD833778P" class="colum_fila"></td>
            <td><input value="5CD8213DX7" class="colum_fila"></td>
            <td><input value="5CD8213DYF" class="colum_fila"></td>
            <td><input value="5CD8213S8Q" class="colum_fila"></td>
            <td><input value="5CD821BRY0" class="colum_fila"></td>
            <td><input value="5CD821BRYK" class="colum_fila"></td>
            <td><input value="5CD8358BXZ" class="colum_fila"></td>
            <td><input value="5CD821BRY0" class="colum_fila"></td>
          </tr>
          <tr>
            <td><input value="5CD8348R71" class="colum_fila"></td>
            <td><input value="5CD8213S3Z" class="colum_fila"></td>
            <td><input value="5CD83374M3" class="colum_fila"></td>
            <td><input value="5CD8213S6V" class="colum_fila"></td>
            <td><input value="5CD8356WFD" class="colum_fila"></td>
            <td><input value="5CD83588NC" class="colum_fila"></td>
            <td><input value="5CD83589NT" class="colum_fila"></td>
            <td><input value="5CD8356WFD" class="colum_fila"></td>
          </tr>
          <tr>
            <td><input value="5CD821BVMD" class="colum_fila"></td>
            <td><input value="5CD8213D5Z" class="colum_fila"></td>
            <td><input value="5CD8213DX5" class="colum_fila"></td>
            <td><input value="5CD8213DZ7" class="colum_fila"></td>
            <td><input value="5CD821BRPN" class="colum_fila"></td>
            <td><input value="5CD8358BXG" class="colum_fila"></td>
            <td><input value="5CD83589WC" class="colum_fila"></td>
            <td><input value="5CD821BRPN" class="colum_fila"></td>
          </tr>
        </table>
<!-- -----tabla notas y total------ -->  
        <table class="bordernon">
            <tr>
                <th class="bordernon">
                    <table class="tablerad2">
                        <tr> 
                            <th class="notas_observaciones" style="color: white; background: #4472c4;">NOTAS/OBSERVACIONES</th>
                        </tr>
                        <tr>
                            <td> <textarea></textarea></td>
                        </tr>
                    </table>
                </th>

                <th class="bordernon paddingT4" >
                    <table class="tablerad2">
                        <tr>
                            <th class="subtamaño"style="color: black; background: white;">SUBTOTAL</th>
                            <td class="tamanotd"><input type="text" name="subtotal" class="subtotal"></td>
                        </tr>
                        <tr>
                            <th class="iva" style="color: black; background: white;">IVA</th>
                            <td><input type="text" name="iva" class="subtotal"></td>

                        </tr>
                        <tr>
                            <th class="total" style="color: black; background: #4472c4;">TOTAL</th>
                            <td style="background-color: #4472c4;"><input type="text" name="total" class="subtotal"></td>
                        </tr>
                    </table>
                </th>
            </tr>
        </table>
          
        </body>    
      </div>
    </div>
    </div> 
    <button id="saveOrder" type="button" style="background:#4472c4; opacity:1; height: initial" class="boton_agregar boton-guardar"><b>Save Order</b> </button>
  </div>
</div>            
</body>

</html>