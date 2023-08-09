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
    <table class="default d-1">
  <thead d-1>
    <tr>
      <th colspan="2">
      <img class="logo" src="img/grancompu_logo.jpg" alt="LOGO GRANCOMPU">
      </th>

      <th colspan="4" class="direccion-p d-1">
        <div class="">
        <h4><b>
                  INTELPROGRAMAS S.C. DE R.L. DE 
                  <br>
                  C.V. SAN ANTONIO ABAD COL. TRANSITO 
                  <br>
                  CUAUHTÉMOC CDMX C.P.06820
                  <br>
                  5585969400
                  </b></h4>
            </div> 
      </th>
      <th colspan="2" class="default t1-p t2-p">
            <table class="default t1-p">
              <caption>ORDEN DE COMPRA</caption>
              <tr>
                <th style="background:#4472c4; color:#f3f3f3" class="t1-p">NO. COMPRA</th>
                <td class="t2-p"></th>
              </tr>
              <tr>
                <th style="background:#4472c4; color:#f3f3f3" class="t1-p">FECHA</td>
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

      <th colspan="2" style="background:#4472c4; color:#f3f3f3">ID PROVEEDOR</th>

      <td colspan="2"></td>

      <th colspan="2" style="background:#4472c4; color:#f3f3f3">ID NOSOTROS CLIENTE</th>

      <td colspan="2"></td>

    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3" scope="row" class="t3-p">Empresa</th>
      <td class="t4-p"></td>
      <th style="background:#4472c4; color:#f3f3f3" scope="row">Ejecutivo</th>
      <td class="t4-p"></td>
      <th style="background:#4472c4; color:#f3f3f3" scope="row">Empresa</th>
      <td class="t4-p"></td>
      <th style="background:#4472c4; color:#f3f3f3" scope="row">Ejecutivo</th>
      <td class="t4-p"></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Calle</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Número</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Calle</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Número</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Colonia</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Municipio</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Colonia</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Municipio</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Estado</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">C.P.</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Estado</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">C.P.</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Correo</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">País</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Correo</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">País</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Telefono</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Celular</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Telefono</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Celular</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Envío</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Talón</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Rotular</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Fecha</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#4472c4; color:#f3f3f3">Pagos</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3"></th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3">Fecha</th>
      <td></td>
      <th style="background:#4472c4; color:#f3f3f3"></th>
      <td></td>
    </tr>
    </div>
  </table>

<table class="default-1">
<div class="default-1 O-1 O-2 O-5 O-6 O-7">
  <tr>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-1">No.</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-2">CLAVE
    <br>
    Producto</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-5">MARCA</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-6">MODELO</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-7">GAB</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-8">PROCESADOR</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-7">GEN</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-7">RAM</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-7">DISC</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-7">TAM</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-7">CANT</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-5">PRECIO 
    <br>
    UNIT</th>
    <th style="background:#4472c4; color:rgb(250, 247, 247)" class="O-5">IMPORTE</th>
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
<table class="tn-1 colorv">  <!-- -----tabla notas------ -->
  <tr class="colorv">
    <th class="colorv">
      <table class=" tn-1 tn-2" >
          <tr class="tn-1">
            <th style="background:#4472c4; color:white" scope="row" rowspan="1" colspan="1"  class=" tn-1" >NOTAS / OBSERVACIONES</th>
          </tr>
          <tr class=" tn-2">
            <th  class=" tn-2"></th>
          </tr>
      </table>
    </th>
    <th class="tamaño-1 colorv">
      <table class="default tn-3 tamaño-1">
      <tr class="tamaño-1">
        <th style="background:#deebf6; color:rgb(5, 5, 5)" class="tn-3">SUBTOTAL</th>
        <td style="background:#deebf6; color:rgb(5, 5, 5)" class="tn-4"></td>
      </tr>
      <tr>
        <th ></th>
        <td ></td>
      </tr>
      <br>
      <tr>
        <th style="background:#deebf6; color:rgb(5, 5, 5)" class="tn-3">IVA</td>
        <td style="background:#deebf6; color:rgb(5, 5, 5)" class="tn-4"></td>
      </tr>
      <tr>
        <th class=""></th>
        <td ></td>
      </tr>
      <br>
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
      <th style="background:#4472c4; color:white"  colspan="2">METODO DE PAGO</th>
    </tr>
    <tr>
      <th style="background:#deebf6; color:rgb(5, 5, 5)" class="tb-u1">Banco</th>
      <td style="background:#deebf6; color:rgb(5, 5, 5)" class="tb-u2"tb-u2></td>
    </tr>
    <tr>
      <th>Cuenta</th>
      <td></td>
    </tr>
    <tr>
      <th style="background:#deebf6; color:rgb(5, 5, 5)">Condiciones de pago</th>
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


$css = file_get_contents('formato_grancompu.css');
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