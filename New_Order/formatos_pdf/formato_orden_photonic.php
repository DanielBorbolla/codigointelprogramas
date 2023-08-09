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
      <img class="logo" src="img/photonic_logo.png" alt="LOGO LA MICHOACANA">
      </th>

      <th colspan="4" class="direccion-p">
        <div class="">
        <h4><b>
        PHOTONIC INC. 1907 ADUANALES
        <br>
        LAREDO TEXAS 78041
        <br>
        PHONE (956) 7223326
        </b></h4>
            </div> 
      </th>
      <th colspan="2" class="default t1-p t2-p">
            <table class="default t1-p">
              <caption>PURCHASE ORDER</caption>
              <tr>
                <th style="background:#4472c4; color:#f3f3f3" class="t1-p">NUM. ORDER</th>
                <td class="t2-p"></th>
              </tr>
              <tr>
                <th style="background:#4472c4; color:#f3f3f3" class="t1-p">DATE</td>
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

      <th colspan="2" style="background:#4472c4; color:#f3f3f3">Vendor ID</th>

      <td colspan="2"></td>

      <th colspan="2" style="background:#4472c4; color:#f3f3f3">Customer ID</th>

      <td colspan="2"></td>

    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3" scope="row" class="t3-p">Vendor</th>
      <td class="t4-p"></td>
      <th style="background:#4472c4; color:#f3f3f3" scope="row">Executive</th>
      <td class="t4-p"></td>
      <th style="background:#4472c4; color:#f3f3f3" scope="row">Vendor</th>
      <td class="t4-p"></td>
      <th style="background:#4472c4; color:#f3f3f3" scope="row">Executive</th>
      <td class="t4-p"></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Street</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Number</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Street</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Number</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Cologne</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Municipality</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Cologne</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Municu¿ipality</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">State</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Zip Code</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">State</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Zip Code</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Email</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Country</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Email</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Country</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Phone</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Cell Phone</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Phone</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Cell Phone</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Delivery</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Name</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Payments</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Dates</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Shipment</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Number</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Name</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Date</th>
      <td></td>
    </tr>
    </div>
  </table>

<table class="default-1">
<div class="default-1 O-1 O-2 O-5 O-6 O-7">
<tr>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-1">ITEM</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-2">CODE</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-5">BRAND</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-6">MODEL</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-9">GABINET</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-8">PROCESSOR</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-7">GEN</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-7">RAM</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-7">DISK</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-7">TAM</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-7">QUANT</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-5">UNIT 
<br>
PRICES</th>
<th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-5">AMOUNT</th>
</tr>
<tr>
<td style="background:#deebf6; color:rgb( 5, 5, 5)" class="O-1">1</td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)" class="O-2"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)" class="O-5"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
</tr>
<tr>
<td class="O-1">2</td>
<td class="O-2"></td>
<td class="O-5"></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td style="background:#deebf6; color:rgb( 5, 5, 5)" class="O-1">3</td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)" class="O-2"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)" class="O-5"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
<td style="background:#deebf6; color:rgb( 5, 5, 5)"></td>
</tr>
</div>
</table>
<br>
<table class="tn-1 bordet">  <!-- -----tabla notas------ -->
  <tr class="bordet">
    <th class="bordet">
      <table class=" tn-1 tn-2" >
          <tr class="tn-1">
            <th style="background:#4472c4; color:white" scope="row" rowspan="1" colspan="1"  class=" tn-1" >NOTES / OBSERVATIONS</th>
          </tr>
          <tr class=" tn-2">
            <th  class=" tn-2"></th>
          </tr>
      </table>
    </th>
    <th class="tamaño-1 bordet">
      <table class="default tn-3 tamaño-1">
      <tr class="tamaño-1">
        <th style="background:#deebf6; color:rgb(5, 5, 5)" class="tn-3">SUBTOTAL</th>
        <td style="background:#deebf6; color:rgb(5, 5, 5)" class="tn-4"></td>
      </tr>
      <tr>
        <th style="background:#deebf6; color:rgb(5, 5, 5)" class="tn-3">IVA</td>
        <td style="background:#deebf6; color:rgb(5, 5, 5)" class="tn-4"></td>
      </tr>

      <tr>
        <th style="background:#4472c4; color:white" class="tn-3">TOTAL</td>
        <td style="background:#4472c4; color:white" class="tn-4"></td>
      </tr>
      </table>
    </th>
  </tr>
</table>
<br>

<table class="tb-u">
  <thead class="tb-u tb-u1 tb-u2">
    <tr>
      <th style="background:#4472c4; color:white"  colspan="2">PAYMENT METHOD</th>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3" class="tb-u1">BANK</th>
      <td style="background:#deebf6; color:rgb(5, 5, 5)" class="tb-u2"tb-u2></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">ACCOUNT</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">PAYMENT CONDITIONS</th>
      <td style="background:#deebf6; color:rgb(5, 5, 5)"></td>
    </tr>   
  </thead>
</table>

<div class="tamaño-10">
          <hr class="tamaño-10">
          
</div>
<h3>Manager 
<br>
JORGE DE LA CRUZ
</h3>
</div>                                      
</div>  
</div>
';


$css = file_get_contents('formato_photonic.css');
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