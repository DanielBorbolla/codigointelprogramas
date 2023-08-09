<?php
require('../Main_app/conexion.php');
$vendor = $_POST['vendor'];
header("Content-Type: application/json");
$stmt = $conexion->prepare("SELECT `id`,`razon_social`,`email`,`direccion`, `calle`, `no_ext`,`ciudad`,`no_int`,`pais`, `codigo_postal`, `colonia`, `estado`, `municipio`, `telefono`,`rfc` FROM `proveedor` WHERE `razon_social` = :vendor");
$stmt->bindParam(':vendor', $vendor, PDO::PARAM_STR);
$stmt->execute();
$vendor_data = $stmt->fetch(PDO::FETCH_ASSOC);
$id = $vendor_data['id'];
$razon_social = $vendor_data['razon_social'];
$calle = $vendor_data['calle'];
$direccion = $vendor_data['direccion'];
$ciudad = $vendor_data['ciudad'];
$no_ext = $vendor_data['no_ext'];
$no_int = $vendor_data['no_int'];
$pais = $vendor_data['pais'];
$codigo_postal = $vendor_data['codigo_postal'];
$colonia = $vendor_data['colonia'];
$estado = $vendor_data['estado'];
$municipio = $vendor_data['municipio'];
$telefono = $vendor_data['telefono'];
$email = $vendor_data['email'];
$rfc = $vendor_data['rfc'];
$json[] = array(
    'id' => $id,
    'razon_social' => $razon_social,
    'calle' => $calle,
    'direccion' => $direccion,
    'ciudad' => $ciudad,
    'no_ext' => $no_ext,
    'no_int' => $no_int,
    'pais' => $pais,
    'codigo_postal' => $codigo_postal,
    'colonia' => $colonia,
    'estado' => $estado,
    'municipio' => $municipio,
    'telefono' => $telefono,
    'email' => $email,
    'rfc' => $rfc
);
echo json_encode($json);
