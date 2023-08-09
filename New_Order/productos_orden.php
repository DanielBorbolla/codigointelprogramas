<?php
session_start();
if (!isset($_SESSION['nombre_usuario'])) {

    echo '<script>window.location.href="index.php";</script>';
}

require('../Main_app/conexion.php');

$tipo = (int)$_SESSION['tipo'];

if ($tipo === 1 || $tipo === 2) {
    $id_empresa = $_SESSION['id_empresa'];
    $permiso = 6;
} else {
    $id_empresa = $_SESSION['id_emp'];
}

$claveProducto = $_POST['clave_producto'];
$ud = $_POST['ud'];
$medida = $_POST['medida'];
$descripcion = $_POST['descripcion'];
$cant = $_POST['cant'];
$precio = $_POST['precio'];
$importe = $cant * $precio;

// Generar el código HTML de la nueva fila
$nuevaFila = "
<td>1</td>
<td>$claveProducto</td>
<td>$ud</td>
<td>$medida</td>
<td>$descripcion</td>
<td>$cant</td>
<td>$precio</td>
<td>$importe</td>";

echo $nuevaFila;
