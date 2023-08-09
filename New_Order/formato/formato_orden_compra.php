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
          <div id="order-info">
            <table class="table-header">

              <tbody>
                <tr>
                <td id="company_name" class="logo" rowspan="2">
                  <div>
                    <img src="../../Adjuntos/Empresas/'.$nombre_empresa.'/'.$logotipo.'" style="max-width:90%; max-height:90%; object-fit: contain;" alt="INTELPROGRAMAS">


                  </div>
                </td>
                <td rowspan="2" class="company-name">
                  <div class="d-flex justify-content-center">

                                          84                      SAN ANTONIO ABAD                      CUAUHTÉMOC                      <br>
                      CIUDAD DE MÉXICO
                      06820                      <br>
                      Phone
                      5585969400                      <br>
                      http://compusi.net/                      <br>
                      TAX EXEMPT
                      INT0603239I7
                  </div>



                </td>
                <td class="col-md-2" style="text-align: center;">
                  <div>
                    Date
                  </div>
                </td>
                <td class="col-md-2">
                  <div>
                    Purchase <br/> Order
                  </div>

                </td>

              </tr>
              <tr>
                <td align="center">
                  <div>
                  '.$date.'
                  </div>
                </td>
                <td align="center">
                  <div>
                  '.$no_orden.'
                  </div>
                </td>

              </tr>

            </tbody></table>
            <!-- ---------------table head--------------------- -->
            <!-- ---------------table body--------------------- -->

<table class="table-info">
    <tbody>
        <tr>
            <th scope="row" rowspan="1" style="background:#4472C4; color:white" class="">Vendor:</th>
            <td rowspan="1" class="td-space">'.$vendor.'</td>
            <th scope="row" style="background:#4472C4; color:white" class=" ">Receive by:</th>
            <td class="col-md-4">'.$receiveby.'</td>
        </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472C4; color:white" class="col-form-label">Street:</th>
                <td class="col-md-5">
                    
                </td>
                <th scope="row" style="background:#4472C4; color:white" class=" col-md-1-5">Ship via:</th>
                <td class="col-md-4">
                  '.$ship_via.'
                </td>
              </tr>
              <tr>
                <th style="background:#4472C4; color:white">Address:</th>
                <td>

                </td>
                <th scope="row" style="background:#4472C4; color:white" class=" col-md-1-5">Mark Package:</th>
                <td class="col-md-4">
                 '.$mark_package.'
                </td>
              </tr>
              <tr>
                <th style="background:#4472C4; color:white">City:</th>
                <td>
                    '.$v_city.'
                </td>
                <th style="background:#4472C4; color:white">Bank:</th>
                <td>
                    '.$bank.'
                </td>
              </tr>
              <tr>
                <th style="background:#4472C4; color:white">Zip Code:</th>
                <td>
                    '.$v_zipcode.'
                </td>
                <th style="background:#4472C4; color:white">Bank Address:</th>
                <td>
                  '.$bank_address.'
                </td>
              </tr>
              <tr>
                <th style="background:#4472C4; color:white">Country:</th>
                <td>
                  '.$v_country.'
                </td>
                <th style="background:#4472C4; color:white">Swift:</th>
                <td>
                    '.$swift.'
                </td>
              </tr>
              <tr>
                <th style="background:#4472C4; color:white">Phone:</th>
                <td>
                  '.$v_phone.'
                </td>
                <th scope="row" style="background:#4472C4; color:white" class=" col-md-1-5">Account:</th>
                <td class="col-md-4">
                    '.$account.'
                </td>
              </tr>
              <tr>
                <th style="background:#4472C4; color:white">Email:</th>
                <td>
                  '.$v_email.'
                </td>
                <th scope="row" style="background:#4472C4; color:white" class="col-md-1-5">Payment Terms:</th>
                <td class="col-md-4">
                    '.$payment_terms.'
                </td>
              </tr>
              <tr>
                <th style="background:#4472C4; color:white">Invoice to:</th>
                <td>
                 '.$invoiceto.'
                </td>
                <th scope="row" style="background:#4472C4; color:white" class="">Vendor Number:</th>
                <td>
                 '.$vendor_number.'
                </td>
              </tr>
              <tr>
                <th style="background:#4472C4; color:white">Address:</th>
                <td>
                  '.$in_address.'
                </td>
                <th scope="row" style="background:#4472C4; color:white" class="">Customer Number:</th>
                <td>
                  '.$customer_number.'
                </td>
              </tr>
              <tr>
                <th style="background:#4472C4; color:white">Zip Code:</th>
                <td>
                    '.$in_zipcode.'
                </td>
                <th scope="row" style="background:#4472C4; color:white" class="">Ship From:</th>
                <td>
                  '.$ship_from.'
                </td>
              </tr>
              <tr>
                <th style="background:#4472C4; color:white">Phone:</th>
                <td>
                    '.$in_phone.'
                </td>
                <th scope="row" style="background:#4472C4; color:white" class="">Delivery Schedule:</th>
                <td>
                  '.$delivery_schedule.'
                </td>
              </tr>
              <tr>
                <th style="background:#4472C4; color:white">Email:</th>
                <td>
                    '.$in_email.'
                </td>
                <th scope="row" style="background:#4472C4; color:white" class="">Tracking Number:</th>
                <td>
                    '.$tracking_number.'
                </td>

              </tr>
            </tbody>
    </table>
    <table class="table-products">
        <thead>
            <tr>
                <th scope="column" class="col-md-1-5"   colspan="1" rowspan="2">ITEM</th>
                <th scope="column" class="col-md-1-5"   colspan="2" rowspan="1">KEY/CODE</th>
                <th scope="column" class="col-md-7"     colspan="3" rowspan="1">
                    <div>
                        DESCRIPTION
                    </div>
                </th>
                <th scope="column" class="col-md-1"     colspan="1" rowspan="2">QUANTITY</th>
                <th scope="column" class="col-md-1-5"   colspan="1" rowspan="2">UNIT PRICE</th>
                <th scope="column" class="col-md-1"     colspan="1" rowspan="2">AMOUNT</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
    
            </tr>
        </thead>
        <tbody>
                <tr id="characteristics">
                    <td></td>
                    <td class="col-md-1"></td>
                    <td class="col-md-0-5"></td>
                    <td class="col-md-1"></td>
                    <td class="col-md-1" id="model"></td>
                    <td class="col-md-1"></td>
                    <td></td>
                    <td></td>
                    <!-- <td></td> -->
                </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7">MANAGER: JORGE DE LA CRUZ</td>
                <td  align="center" style="background:#4472C4; color:white">SHIPPING</td>
                <td  align="center">'.$shipping.'</td>
            </tr>
            <tr>
                <td colspan="7" rowspan="3">
                    1.- NOT RESPONSIBLE FOR GOODS DELIVERED WITHOUT WRITEN ORDER<br/>		
                    2.- NO CHANGES O SUTITUTION PERMITED						<br/>
                    3.- PACKIN LIST MUST BE INCLUDED WITH EACH SHIPMENT			<br/>	
                    4.- ALL CONDITION, PRICES, AND QUANTITYIES, HERE IN SET FORTH CANNOT BE CHANGED WITHOUT WRITEN APPROVAL BY GENERAL MANAGER	<br/>					
                    5.- IF CONDITIONS NOT ACCEPTABLE, PLEASE ADVICEUPON RECEIPT OF ORDER, BEFORE SHIPMENT <br/>

                </td>
                <td align="center" style="background:#4472C4; color:white">SubTotal</td>
                <td align="center">'.$subtotal.'</td>
            </tr>
            <tr>
                <td  align="center" style="background:#4472C4; color:white">IVA</td>
                <td  align="center">'.$iva.'</td>
            </tr>            
            <tr>
                <td  align="center" style="background:#4472C4; color:white">Total</td>
                <td  align="center">'.$total.'</td>
            </tr>
        </tfoot>
    </table>
</div>
';


$css = file_get_contents('format_order.css');
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