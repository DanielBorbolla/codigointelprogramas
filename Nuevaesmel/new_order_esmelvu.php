
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
  width: 45%;
  height: 11.2rem;
  font-size: 1.8rem;
  margin: 0%;
  border-radius: 10px;
  border: solid black 2px;
  background: white;
  color: black;
}

.imgprin {
  width: 25rem;
}

.def-dir {
  width: 30rem;
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
  color: #5EA7FD;
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
  background-color: #5EA7FD;
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
  background-color: #5EA7FD;
}

.input-tabladatos{
  width: 100%;
  height:2.1rem;
  border: #ffffff;
}

.dat-azul{
  background-color: #5EA7FD;
}

/*tabla producto*/
.vg-cor{
  background: #5EA7FD;
}

.tablenum{
  width: 20%;
  color: white;
}



.tablemarc{
  width: 11%;
}

.tablemod{
  width: 12%;
  color: white;
}

.tablegab{
  width: 10%;
}

.tablepro{
  width: 13%;
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
  background-color: #5EA7FD;
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
                  ESCUELA SUPERIOR<br> MEXICANA DE
                  <br> 
                  ENTRENAMIENTO LABORAL
                  </b></h4>
              </th>
             </table>
            </th>
            <th class="eliwcol">
            <table class="tablerad">
            <th class="def-logo bor-jun esp-2" colspan="2">
                  <img class="imgprin" src="logos/Esmel_logo.jpg" alt="LOGO ESMEL">
              </th>
            </table>
            </th>
            <th class="eliwcol">
            <table class="tablerad">
            <th class="def-logo def-ord">
                <table>
                  <div>
                  <h1 class="capnom">INSCRIPCIÓN</h1>
                  </div>
                   
                    <tr>
                      <th class="def-co def-co1">NO.</th>
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
                  <th class="color-tabla-datos" colspan="4">Alumno</th>
                </tr>
                <tr>
                  <th class="dat-azul"scope="row">Alumno</th>
                  <td><input class="input-tabladatos" value="PN CALIFORNIA"></td>
                  <th class="dat-azul"scope="row">Matricula</th>
                  <td><input class="input-tabladatos" value="PARMOND JAIN"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Nombre</th>
                  <td><input class="input-tabladatos" value="SOMERESE BLD"></td>
                  <th class="dat-azul">Apellido</th>
                  <td><input class="input-tabladatos" value="9016"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Calle</th>
                  <td><input class="input-tabladatos" value="BELLFLOWER"></td>
                  <th class="dat-azul">Número</th>
                  <td><input class="input-tabladatos" value=""></td>
                </tr>
                <tr>
                  <th class="dat-azul">Municipio</th>
                  <td><input class="input-tabladatos" value="CALIFORNIA"></td>
                  <th class="dat-azul">Colonia</th>
                  <td><input class="input-tabladatos" value="90706"></td>
                </tr>
                <tr>
                  <th class="dat-azul">C. Postal</th>
                  <td><input class="input-tabladatos" value="SALES@PNCALIFORNIA"></td>
                  <th class="dat-azul">Estado</th>
                  <td><input class="input-tabladatos" value="USA"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Correo</th>
                  <td><input class="input-tabladatos" value="562 866 8581"></td>
                  <th class="dat-azul">Celular</th>
                  <td><input class="input-tabladatos" value="562 418 5474"></td>
                </tr>
                <tr>
                  <th class="dat-azul">CURP</th>
                  <td></td>
                  <th class="dat-azul">Fecha Nacimiento</th>
                  <td></td>
                </tr>
              </table> 
            </th>
            <th class="fondo-de-tabla">
              <table class="borde-redondeado-tabla">
                <tr>
                  <th class="dat-azul" colspan="4">PADRES/PATROCINADOR</th>
                </tr>
                <tr>
                  <th class="dat-azul" scope="row">Padre</th>
                  <td><input value="PHOTONIC INC" class="input-tabladatos"></td>
                  <th class="dat-azul" scope="row">Matricula</th>
                  <td><input value="JORGE DE LA CRUZ" class="input-tabladatos"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Telefono</th>
                  <td><input value="ADUANALES" class="input-tabladatos"></td>
                  <th class="dat-azul">Apellido</th>
                  <td><input value="1907" class="input-tabladatos"></td>
                </tr>
                <tr></tr>
                  <th class="dat-azul">Madre</th>
                  <td><input value="LAREDO" class="input-tabladatos"></td>
                  <th class="dat-azul">Número</th>
                  <td><input value="WEBB" class="input-tabladatos"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Télefono</th>
                  <td><input value="TEXAS" class="input-tabladatos"></td>
                  <th class="dat-azul">Colonia</th>
                  <td><input value="78041" class="input-tabladatos"></td>
                </tr>
                <tr>
                  <th class="dat-azul">C. Postal</th>
                  <td><input value="JCRUZ@CLUBINTER.NET" class="input-tabladatos"></td>
                  <th class="dat-azul">Estado</th>
                  <td><input value="USA" class="input-tabladatos"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Correo</th>
                  <td><input value="956 722 3326" class="input-tabladatos"></td>
                  <th class="dat-azul">Celular</th>
                  <td><input value="956 693 044" class="input-tabladatos"></td>
                </tr>
                <tr>
                  <th class="dat-azul">Curp</th>
                  <td><input value="" class="input-tabladatos"></td>
                  <th class="dat-azul" >Fecha Nacimiento</th>
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
         <th class="vg-cor tablecod">Clave Producto</th>
         <th class="vg-cor tablemarc">Curso</th>
         <th class="vg-cor tablemod">Duración</th>
         <th class="vg-cor tablegab">Lun</th>
         <th class="vg-cor tablepro">Mar</th>
         <th class="vg-cor tablegen">Mie</th>
         <th class="vg-cor tableram">Jue</th>
         <th class="vg-cor tabledisk">Vie</th>
         <th class="vg-cor tabletam12">Sab</th>
         <th class="vg-cor tablecant">Dom</th>
         <th class="vg-cor tableprec">Número Semanas</th>
         <th class="vg-cor tableimp">Precio Quincenal</th>
        </tr>
        <tr class="item">
         <td class="tablenum">1</td>
         <td class="tablecod"><input value="" class="fontbor input1 item_row" onkeypress="addrow(event)" ></td>
         <td class="tablemarc"><input value='' class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablemod"><input value="" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablegab"><input value="" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablepro"><input value="" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablegen"><input value="" class="fontbor input1 item_row" onkeypress="addrow(event)" ></td>
         <td class="tableram"><input value='' class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tabledisk"><input value='' class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tabletam12"><input value='' class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablecant"><input value="" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tableprec"><input value="" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tableimp"><input value="" class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
        </tr>
        </table>
        <!-- -----tabla PAGOS------ -->  
        <table class="tableartics"> <!--tabla producto-->
        <tr class="colorprod">
         <th class="vg-cor tablenum" colspan="2">Metodo de pago</th>
         <th class="vg-cor tablemarc">Lugar</th>
         <th class="vg-cor tablemod">Número de cuenta</th>
         <th class="vg-cor tablegab">Cobranza</th>
         <th class="vg-cor tablepro"></th>
         <th class="vg-cor tablepro"></th>
         
        </tr>
        <tr class="item">
         <td class="color-tabla-datos tablenum">Cobranza a domicilio</td>
         <td class="tablecod">Banco</td>
         <td class="tablemarc">Administración</td>
         <td class="color-tabla-datos tablemod">Tarjeta bancaria</td>
         <td class="tablegab"><input class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablepro"><input class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablepro"><input class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
        </tr>
        <tr>
        <td class="color-tabla-datos tablenum">Efectivo plantel</td>
         <td class="tablecod"><input class="fontbor input1 item_row" onkeypress="addrow(event)" ></td>
         <td class="tablemarc"><input class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="color-tabla-datos tablemod">Transferencia bancaria</td>
         <td class="tablegab"><input class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablepro"><input class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablepro"><input class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
        </tr>
        <tr>
        <td class="color-tabla-datos tablenum">Efectivo banco</td>
         <td class="tablecod"><input class="fontbor input1 item_row" onkeypress="addrow(event)" ></td>
         <td class="tablemarc"><input class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="color-tabla-datos tablemod">Pago contado</td>
         <td class="tablegab"><input class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablepro"><input class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
         <td class="tablepro"><input class="fontbor input1 item_row" onkeypress="addrow(event)"></td>
        </tr>
        </tr>
        </table>

          
        </body>    
      </div>
    </div>
    </div> 
    <button id="saveOrder" type="button" style="background:#5EA7FD; opacity:1; height: initial" class="boton_agregar boton-guardar"><b>Save Order</b> </button>
  </div>
</div>            
</body>

</html>