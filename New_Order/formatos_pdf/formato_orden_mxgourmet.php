<?php 
require dirname(__DIR__, 3) . '/vendor/autoload.php';

// $html = file_get_contents('order.html');

session_start();
require('../../Main_app/conexion.php'); 
date_default_timezone_set('America/Mexico_City');

$tipo=(int)$_SESSION['tipo'];

if($tipo === 1 || $tipo === 2){
  $id_empresa=$_SESSION['id_empresa'];
}else{
  $id_empresa=$_SESSION['id_emp'];
}

$no_orden = $_GET['no_orden'];

try{
  $stmt=$conexion->prepare("SELECT *
    FROM `orden_compra_documento` where id_empresa = :id_empresa and no_orden = :no_orden");
  $stmt->bindParam(':id_empresa', $id_empresa, PDO::PARAM_INT);
  $stmt->bindParam(':no_orden', $no_orden, PDO::PARAM_INT);
  $stmt->execute();
  $datos_emp=$stmt->fetch(PDO::FETCH_ASSOC);
  extract($datos_emp);
  $date = date('F j, Y', strtotime($date));

  $stmt=$conexion->prepare("SELECT nombre_empresa,razon_social,logotipo,rfc FROM `empresas` where id = :id_empresa");
  $stmt->bindParam(':id_empresa', $id_empresa, PDO::PARAM_INT);
  $stmt->execute();
  $datos_emp=$stmt->fetch(PDO::FETCH_ASSOC);

  $nombre_empresa = trim($datos_emp['nombre_empresa']);
  $razon_social = trim($datos_emp['razon_social']);
  $logotipo = trim($datos_emp['logotipo']);
  $rfc = trim($datos_emp['rfc']);
}catch(PDOException $error){
  echo $error->getMessage();
}

$html = '

<div class="panel-body">
  <div class="m-2 p-3">
          <!-- ---------------table head--------------------- -->
    <div id="order-info" class="orden-info">
    <table class="default">
  <thead>
    <tr>
      <th colspan="2">
      <img class="logo" src="img/mxgourmet_logo.png" alt="LOGO LA MICHOACANA">
      </th>

      <th colspan="4" class="direccion-p">
        <div class="">
          <h4><b>
          ZAPOPÁN JALISCO, MÉXICO
          <br>
          TELEFONO: 332512363
          <br>
          rafael@finoschocolates.com
          <br>
            </b></h4>
            </div> 
      </th>
      <th colspan="2" class="default t1-p t2-p">
            <table class="default t1-p">
              <caption>ORDEN DE COMPRA</caption>
              <tr>
                <th style="background:#c00000; color:#f3f3f3" class="t1-p">NO. COMPRA</th>
                <td class="t2-p"></th>
              </tr>
              <tr>
                <th style="background:#c00000; color:#f3f3f3" class="t1-p">FECHA</td>
                <td class=" t2-p"></td>
              </tr>
            </table>
       </th>

    </tr>

    

  </thead>
  </table>
  

  <table class="t3-p t4-p">
    <div class="t3-p t4-p">
    <tr>

      <th colspan="2" style="background:#fce2e2; color: black">ID Proveedor</th>

      <td colspan="2"></td>

      <th colspan="2" style="background:#fce2e2; color: black">ID Nosotros Cliente</th>

      <td colspan="2"></td>

    </tr>
    <tr>
      <th  scope="row" class="t3-p" style="background:#fce2e2; color: black">Empresa</th>
      <td class="t4-p"></td>
      <th  scope="row" style="background:#fce2e2; color: black">Ejecutivo</th>
      <td class="t4-p"></td>
      <th  scope="row" style="background:#fce2e2; color: black">Empresa</th>
      <td class="t4-p"></td>
      <th  scope="row" style="background:#fce2e2; color: black">Ejecutivo</th>
      <td class="t4-p"></td>
    </tr>
    <tr>
      <th style="background:#fce2e2; color: black">Calle</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Número</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Calle</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Núnero</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#fce2e2; color: black">Colonia</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Municipio</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Colonia</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Municipio</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#fce2e2; color: black">Estado</th>
      <td></td>
      <th style="background:#fce2e2; color: black">C.P.</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Estado</th>
      <td></td>
      <th style="background:#fce2e2; color: black">C.P.</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#fce2e2; color: black">Correo</th>
      <td></td>
      <th style="background:#fce2e2; color: black">País</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Correo</th>
      <td></td>
      <th style="background:#fce2e2; color: black">País</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#fce2e2; color: black">Teléfono</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Celular</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Teléfono</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Celular</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#fce2e2; color: black">Envío</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Talón</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Rotular</th>
      <td></td>
      <th style="background:#fce2e2; color: black">Fecha</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#fce2e2; color: black">Pagos</th>
      <td></td>
      <th style="background:#fce2e2; color: black"></th>
      <td></td>
      <th style="background:#fce2e2; color: black">Fecha</th>
      <td></td>
      <th style="background:#fce2e2; color: black"></th>
      <td></td>
    </tr>
    </div>
  </table>

<table class="default-1">
<div class="default-1 O-1 O-2 O-3 0-4 0-5">
  <tr>
    <th style="background:#c00000; color:rgb(250, 247, 247)" class="O-1">No.</th>
    <th style="background:#c00000; color:rgb(250, 247, 247)" class="O-2">CLAVE 
    <br>
    PRODUCTO</th>
    <th style="background:#c00000; color:rgb(250, 247, 247)" class="O-3">UD</th>
    <th style="background:#c00000; color:rgb(250, 247, 247)" class="O-4">MEDIDA</th>
    <th style="background:#c00000; color:rgb(250, 247, 247)" class="O-5">DESCRIPCION</th>
    <th style="background:#c00000; color:rgb(250, 247, 247)" >CANT.</th>
    <th style="background:#c00000; color:rgb(250, 247, 247)" >PRECIO 
    <br>
    UNIT.</th>
    <th style="background:#c00000; color:rgb(250, 247, 247)" >IMPORTE</th>
  </tr>
  <tr>
    <td  class="O-1">1</td>
    <td  class="O-2"></td>
    <td  class="O-3"></td>
    <td  class="O-4"></td>
    <td  class="O-5"></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>
  <tr>
    <td class="O-1">2</td>
    <td class="O-2"></td>
    <td class="O-3"></td>
    <td class="O-4"></td>
    <td class="O-5"></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td  class="O-1">3</td>
    <td  class="O-2"></td>
    <td  class="O-3"></td>
    <td  class="O-4"></td>
    <td  class="O-5"></td>
    <td ></td>
    <td ></td>
    <td ></td>
  </tr>
</div>
</table>
<br>
<table class="tn-1 color11">  <!-- -----tabla notas------ -->
  <tr class="color11">
    <th class="color11">
      <table class=" tn-1 tn-2" >
          <tr class="tn-1">
            <th style="background:#c00000; color:rgb(250, 247, 247)" scope="row" rowspan="1" colspan="1"  class="class=" tn-1" ">NOTAS / OBSERVACIONES</th>
          </tr>
          <tr class=" tn-2">
            <th  class=" tn-2"></th>
          </tr>
      </table>
    </th>
    <th class="tamaño-1 color11">
      <table class="default tn-3 tamaño-1">
      <tr class="tamaño-1">
        <th  class="tn-3">SUBTOTAL</th>
        <td  class="tn-4"></td>
      </tr>
      
      <br>
      <tr>
        <th  class="tn-3">IVA</td>
        <td  class="tn-4"></td>
      </tr>
      <br>
      
      <tr>
        <th style="background:#c00000; color:rgb(250, 247, 247)" class="tn-3">TOTAL</td>
        <td style="background:#c00000; color:rgb(250, 247, 247)" class="tn-4"></td>
      </tr>
      </table>
    </th>
  </tr>
</table>
<br>

<table class="tb-u">
  <thead class="tb-u tb-u1 tb-u2">
    <tr>
      <th style="background:#c00000; color:rgb(245, 239, 239)"  colspan="2">METODO DE PAGO</th>
    </tr>
    <tr>
      <th  class="tb-u1">Banco</th>
      <td  class="tb-u2"tb-u2></td>
    </tr>
    <tr>
      <th>Cuenta</th>
      <td></td>
    </tr>
    <tr>
      <th >Condiciones de pago</th>
      <td ></td>
    </tr>   
  </thead>
</table>

<div class="tamaño-10">
          <hr class="tamaño-10">
          
</div>
<h3>Autorizado por 
<br>
JAVIER RUIZ
</h3>
</div>                                      
</div>  
</div>
';


$css = file_get_contents('formato_mxgourmet.css');
// $css = file_get_contents('../css/styles.css');
// $css .= file_get_contents('../css/bootstrap.min.css');

$mpdf = new \Mpdf\Mpdf(['setAutoBottomMargin' => 'stretch']);

$mpdf->writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml($html, \Mpdf\HTMLParserMode::HTML_BODY);

// $mpdf->AddPage(); 

// $mpdf->SetHTMLFooter('
// <footer>
// <div class = "avisos" style= "margin-top: -25px;">
//   <header class="clearfix">
  
//       <div id="company" style= "margin-top: -70px;">
//           <img src="../../img/qr_mx.jpeg" width="100" height="100">   
//       </div>
//   </header>
// </div>
// </footer>');

  $mpdf->Output("Orden Compra - MXcomp.pdf", "I");

?>