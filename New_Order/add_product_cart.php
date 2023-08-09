<?php
session_start();
require('../Main_app/conexion.php');
require('../Main_app/validaciones.php');
if (isset($_POST['id_bussiness'])) {
    $id_bussiness = trim($_POST['id_bussiness']);
    $order_no = trim($_POST['order_no']);
    $claveprod = trim($_POST['claveprod']);
    $ud = trim($_POST['ud']);
    $medida = trim($_POST['medida']);
    $descripcion = $_POST['descripcion'];
    $cant = trim($_POST['cant']);
    $precio   = trim($_POST['precio']);
    $importe    = trim($_POST['importe']);
    $query = "INSERT INTO carro_orden_compra (id_emp, order_no,claveprod,ud,medida,descripcion,cant,precio,total) VALUES (:id_bussiness,:order_no,:claveprod,:ud,:medida,:descripcion,:cant,:precio,:importe)";

    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':id_bussiness', $id_bussiness, PDO::PARAM_INT);
    $stmt->bindParam(':order_no', $order_no, PDO::PARAM_INT);
    $stmt->bindParam(':claveprod', $claveprod, PDO::PARAM_STR);
    $stmt->bindParam(':ud', $ud, PDO::PARAM_STR);
    $stmt->bindParam(':medida', $medida, PDO::PARAM_STR);
    $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
    $stmt->bindParam(':cant', $cant, PDO::PARAM_STR);
    $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
    $stmt->bindParam(':importe', $importe, PDO::PARAM_STR);

    $stmt->execute();
}
