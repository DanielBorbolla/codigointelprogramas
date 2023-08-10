<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ordenes de Compra</title>
  <!-- $page_title definida en inicio.php -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>

  <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="Styles/main.css">
</head>
<?php
$page_title = 'Ordenes de Compras';
session_start();

require('Main_app/conexion.php');


require_once "librerias/header.php";

?>
<div class="col-md-14">
  <div class="panel panel-default">
    <div class="panel-heading contenedor_titulo_filtro">
      <div>
        <strong>
          <i class="fas fa-th"></i>
          <span>Ordenes de Compra</span>
        </strong>
      </div>

      <div style="display: flex;">
        <div>
          <a type="button" id="ocultar" class="btn"><i class="fas fa-filter"></i></a>
        </div>

        <div>
          <a style="height: fit-content;" href="http://localhost/codigograncompu/new_orden_compra.php" class=" btn btn-info pull-right">+ Nueva Orden de Compra</a>
        </div>
      </div>
    </div>

    <table id="tabla_ven" class="table table-bordered table-striped p-3">
      <thead class="table-mexicomp">
        <tr>
          <th class="text-center" style="width:2%;">No.</th>
          <th class="text-center" style="width:10%;">Proveedor</th>
          <th class="text-center" style="width:6%;">Fecha</th>
          <th class="text-center" style="width:8%;">Método de Envío</th>
          <th class="text-center" style="width:8%;">Código Rastreo</th>
          <th class="text-center" style="width:9%;">Cuenta</th>
          <th class="text-center" style="width:8%;">Método de Pago</th>
          <th class="text-center" style="width:6%;">Fecha Entrega</th>
          <th class="text-center" style="width:5%;">Importe</th>


          <th class="text-center" style="width:6%;">Acciones</th>

        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>

  </div>
</div>





<?php require_once "librerias/footer.php"; ?>