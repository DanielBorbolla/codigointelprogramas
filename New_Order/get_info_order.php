<?php
require_once('../Main_app/conexion.php');
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
header("Content-Type: application/json");

$tipo = (int)$_SESSION['tipo'];
if ($tipo === 1 || $tipo === 2) {
  $id_empresa = $_SESSION['id_empresa'];
  $permiso = 6;
} else {
  $id_empresa = $_SESSION['id_emp'];
}

$searchId = strtoupper($_POST['searchId']);
$column = $_POST['column'];
$prefijo = ($column == 'idprov') ? 'prov' : ( ($column == 'idcliente') ? 'cli' : '' );
$stmt = $conexion->prepare("SELECT 
    ".$prefijo."_empresa empresa, 
    ".$prefijo."_ejecutivo ejecutivo, 
    ".$prefijo."_calle calle, 
    ".$prefijo."_numero numero, 
    ".$prefijo."_colonia colonia, 
    ".$prefijo."_municipio municipio, 
    ".$prefijo."_estado estado, 
    ".$prefijo."_cp cp, 
    ".$prefijo."_correo correo, 
    ".$prefijo."_pais pais, 
    ".$prefijo."_telefono telefono, 
    ".$prefijo."_celular celular 
    FROM orden_compra_documento_v2 WHERE id_bussiness = :id_bussiness and $column = :searchId ORDER BY nordenc desc LIMIT 1");

$stmt->bindParam(':id_bussiness', $id_empresa, PDO::PARAM_INT);
$stmt->bindParam(':searchId', $searchId, PDO::PARAM_STR);
$stmt->execute();

$data = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($data);