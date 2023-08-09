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
    <table>
  <thead>
    <tr class="">
      <th colspan="2" class="logo_m logo-1">
          <img class="logo_m" src="img/Esmel_logo.jpg" style="max-width:28%; max-height:20%; object-fit: contain;" alt="LOGO ESMEL">
      </th>

      <th colspan="4" class="tam-h4">
        <div class=" tam-h4 tam-h4">
        <h4 ><b>
        ESCUELA SUPERIOR MEXICANA DE
                <br>
                ENTRENAMIENTO LABORAL
        </b></h4>
            </div> 
      </th>
      <th colspan="2" class="tam-t2">
            <table class=" tam-t2">
              <caption style="color:#4472c4;">INSCRIPCIÓN</caption>
              <tr>
                <th style="background:#4472c4; color:white" class="inscrip">NO.</th>
                <td class="inscrip-1"></th>
              </tr>
              <tr>
                <th style="background:#4472c4; color:white" class="inscrip">FECHA</td>
                <td class="inscrip-1"></td>
              </tr>
            </table>
       </th>
    </tr>
  </thead>
  </table>
  <table class="tptm">
  <div class="tptm">
  <tr>
    <th colspan="4" style="background:#ffe7e7; color:rgb( 5, 5, 5)" class="inicio-info">ALUMNO</th>
    <th colspan="4" style="background:#ffe7e7; color:rgb( 5, 5, 5)" class="inicio-info">PADRE/MADRE/PATROCINADOR</th>
  </tr>
               <tr class="tptm">
                <th for="vendorstreet" style="background:#4472c4; color:white">ALUMNO</th>
                <td class="tptm"></td>
                <th scope="row" style="background:#4472c4; color:white">MATRICULA</th>
                <td class="tptm"></td>
                <th for="vendorstreet" style="background:#4472c4; color:white"></th>
                <td class="tptm"></td>
                <th scope="row" style="background:#4472c4; color:white"></th>
                <td class="tptm"></td>
              </tr>
              <tr class="tptm">
                <th for="vendorstreet" style="background:#4472c4; color:white">NOMBRE</th>
                <td class="tptm"></td>
                <th scope="row" style="background:#4472c4; color:white">APELLIDO</th>
                <td class="tptm"></td>
                <th for="vendorstreet" style="background:#4472c4; color:white">PADRE</th>
                <td class="tptm"></td>
                <th scope="row" style="background:#4472c4; color:white">APELLIDO</th>
                <td class="tptm"></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472c4; color:white" class="">CALLE</th>
                <td class=""></td>
                <th scope="row" style="background:#4472c4; color:white" class="">NÚMERO</th>
                <td class=""></td>
                <th for="vendorstreet" style="background:#4472c4; color:white" class="">TELEFONO</th>
                <td class=""></td>
                <th scope="row" style="background:#4472c4; color:white" class="">EMAIL</th>
                <td class=""></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472c4; color:white" class="">MUNICIPIO</th>
                <td class=""></td>
                <th scope="row" style="background:#4472c4; color:white" class="">COLONIA</th>
                <td class=""></td>
                <th for="vendorstreet" style="background:#4472c4; color:white" class="">MADRE</th>
                <td class=""></td>
                <th scope="row" style="background:#4472c4; color:white" class="">APELLIDO</th>
                <td class=""></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472c4; color:white" class="">C.P.</th>
                <td class=""></td>
                <th scope="row" style="background:#4472c4; color:white" class="">ESTADO</th>
                <td class=""></td>
                <th for="vendorstreet" style="background:#4472c4; color:white" class="">TELEFONO</th>
                <td class=""></td>
                <th scope="row" style="background:#4472c4; color:white" class="">EMAIL</th>
                <td class=""></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472c4; color:white" class="">EMAIL</th>
                <td class=""></td>
                <th scope="row" style="background:#4472c4; color:white" class="">CELULAR</th>
                <td class=""></td>
                <th for="vendorstreet" style="background:#4472c4; color:white" class="">PAT.</th>
                <td class=""></td>
                <th scope="row" style="background:#4472c4; color:white" class="">CALLE</th>
                <td class=""></td>
              </tr>
              <tr>
                <th for="vendorstreet" style="background:#4472c4; color:white" class="">CURP</th>
                <td class=""></td>
                <th scope="row" style="background:#4472c4; color:white" class="">FECHA
                <br>
                 NACIMIENTO
                </th>
                <td class=""></td>
                <th for="vendorstreet" style="background:#4472c4; color:white" class="">TELEFONO</th>
                <td class=""></td>
                <th scope="row" style="background:#4472c4; color:white" class="">EMAIL</th>
                <td class=""></td>
              </tr>
  </div>
</table>
<table class="">
          <tr class="t1a t1a2 t1a3">
              <th scope="column" class="t1a"  style="background:#4472c4; color:rgb(250, 247, 247)"  colspan="1" rowspan="1">NO.</th>
              <th scope="column" class="t1a2"  style="background:#4472c4; color:rgb(250, 247, 247)"  colspan="1" rowspan="1">CLAVE 
              <br>
              PRODUCTO
              </th>
              <th scope="column" class="t1a3"  style="background:#4472c4; color:rgb(250, 247, 247)" colspan="1" rowspan="1">
                CURSO
                </th>
                <th scope="column" class=""  style="background:#4472c4; color:rgb(250, 247, 247)" colspan="1" rowspan="1">HORAS 
              <br>
              SEMANA
              </th>
              <th scope="column" class=""  style="background:#4472c4; color:rgb(250, 247, 247)"  colspan="1" rowspan="1">LUN</th>
              <th scope="column" class=""  style="background:#4472c4; color:rgb(250, 247, 247)"  colspan="1" rowspan="1">MAR</th>
              <th scope="column" class=""  style="background:#4472c4; color:rgb(250, 247, 247)"  colspan="1" rowspan="1">MIER</th>
              <th scope="column" class=""  style="background:#4472c4; color:rgb(250, 247, 247)"  colspan="1" rowspan="1">JUE</th>
              <th scope="column" class=""  style="background:#4472c4; color:rgb(250, 247, 247)"  colspan="1" rowspan="1">VIER</th>
              <th scope="column" class=""  style="background:#4472c4; color:rgb(250, 247, 247)"  colspan="1" rowspan="1">SAB</th>
              <th scope="column" class=""  style="background:#4472c4; color:rgb(250, 247, 247)"  colspan="1" rowspan="1">DOM</th>
              <th scope="column" class=""  style="background:#4472c4; color:rgb(250, 247, 247)"  colspan="1" rowspan="1">
                NÚMERO
                <br>
                SEMANAS</th>
              <th scope="column" class=""  style="background:#4472c4; color:rgb(250, 247, 247)" colspan="1" rowspan="1">PRECIO
              <br>
              QUINCENAL
              </th>
            </tr>
            <tr>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)">1</th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th> 
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th> 
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>      
            </tr>
            <tr>
            <tr>
            <th style="background:#deebf6; color:rgb( 5, 5, 5)">2</th>
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th> 
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th> 
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
            <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>      
          </tr>
                                     
            </tr>
            <tr>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)">3</th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th> 
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th> 
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>
              <th style="background:#deebf6; color:rgb( 5, 5, 5)"></th>      
            </tr>
          
            
        </table>

        <table class="table-info">
  <tr class="tamth-1">
    <th colspan="2" style="background:#4472c4; color:#f3f3f3">METODO DE PAGO</th>
    <th class="tamth-1" style="background:#4472c4; color:#f3f3f3">LUGAR</th>
    <th class="tamth-1" style="background:#4472c4; color:#f3f3f3">NÚMERO DE CUENTA</th>
    <th class="tamth-1" style="background:#4472c4; color:#f3f3f3">COBRANZA</th>
    <th class="tamth-1 tcr-1" style="background:#4472c4; color:#f3f3f3"></th>
    <th class="tamth-1 tcr-1" style="background:#4472c4; color:#f3f3f3"></th>
  </tr>
  <tr>
    <th class="tamth-1" style="background:#4472c4; color:#f3f3f3">COBRANZA A DOMICILIO</th>
    <td class="tamth-1"></td>
    <td class="tamth-1"></td>
    <th class="tamth-1" style="background:#4472c4; color:#f3f3f3">TARJETA BANCARIA</th>
    <td class="tamth-1"></td>
    <td class="tamth-1"></td>
    <td class="tamth-1"></td>
  </tr>
  <tr>
    <th class="tamth-1" style="background:#4472c4; color:#f3f3f3">EFECTIVO PLANTEL</th>
    <td class="tamth-1"></td>
    <td class="tamth-1"></td>
    <th class="tamth-1" style="background:#4472c4; color:#f3f3f3">TRANSFERENCIA BANCARIA</th>
    <td class="tamth-1"></td>
    <td class="tamth-1"></td>
    <td class="tamth-1"></td>
  </tr>
  <tr>
    <th class="tamth-1" style="background:#4472c4; color:#f3f3f3">EFECTIVO BANCO</th>
    <td class="tamth-1">BANCO</td>
    <td class="tamth-1">ADMINISTRACIÓN</td>
    <th class="tamth-1" style="background:#4472c4; color:#f3f3f3">PAGO CONTADO</th>
    <td class="tamth-1"></td>
    <td class="tamth-1"></td>
    <td class="tamth-1"></td>
  </tr>
  

</table>
<br>
<br>
<br>
<br>

<table class="color-b tamaño-10">
 <tr class="color-b tamaño-10">
  <th class="color-b tamaño-10">
    <hr style=" background:#4472c4; opacity:1; height: 0.2rem;">
    <h3>FIRMA 
    <br>
    ALUMNO
    </h3>
  </th>
  <th class="color-b tamaño-10">
    <hr style=" background:#4472c4; opacity:1; height: 0.2rem;">
    <h3>FIRMA 
    <br>
    PADRE/MADRE/PATROCINADOR
    </h3>
  </th>
  <th class="color-b tamaño-10">
     <hr style=" background:#4472c4; opacity:1; height: 0.2rem;">
     <h3>FIRMA 
     <br>
     ASESOR
     </h3>
  </th>
  </tr>
</table>
        

<br>
        <table>
          <tr>
            <th class="color-b">
              <div class="encabezado_cont">
                <table class="table-info tabla_m tabla-m">
                  <tbody>
                    <tr class="">
                      <th scope="row" rowspan="1" colspan="1" style="background:#4472c4; color:white" class="tabla_nota">NOTAS/OBSERVACIONES</th>
                    </tr>
                    <tr class="aumento">
                      <th scope="row" rowspan="1" colspan="1" style="background:#f7f3f4; color:rgb(5, 5, 5)" class="aumento">
                      
                      </th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </th>
            <th class="t-r color-b t-m padd756">
            
            
            </th>
          </tr>
        </table>

        <table>
          <tr>
            <th>
              <p>BENEFICIO al alumno(a) Distinguido: Habiendo comprobado un grado de interes y desición inmediata por comenzar,<br>
                 Se le otorga un beneficio adicional concordante con su orientación vocacional. Por lo tanto si culmina antes y/o <br>
                 el ultimo día de su capacitación inicial,obtendra una beca del 80% en <br>
                 de lo contrario, solo logrará un % de deca, igual al presente.</p>
            </th>
          </tr>
        </table>

    



</div>                                      
</div>  
</div>
';


$css = file_get_contents('formato_esmel.css');
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