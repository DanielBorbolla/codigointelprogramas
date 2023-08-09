<?php
require('../Main_app/conexion.php');
header("Content-Type: application/json");

$companyID = $_POST['companyID'];
$companyID = intval($companyID);
$CNAMEQ = $conexion->prepare("SELECT razon_social FROM empresas WHERE id = :companyID");
$CNAMEQ->bindParam(':companyID', $companyID, PDO::PARAM_STR);
$CNAMEQ->execute();
$CNAMEA = $CNAMEQ->fetch(PDO::FETCH_ASSOC);
$CNAMES = $CNAMEA['razon_social'];
$CINFOQ
    = $conexion->prepare("SELECT * FROM datos_facturacion WHERE id_emp = :companyID  AND razon_social LIKE :CNAMES");
$CINFOQ->bindParam(':companyID', $companyID, PDO::PARAM_INT);
$CINFOQ->bindParam(':CNAMES', $CNAMES, PDO::PARAM_STR);
$CINFOQ->execute();
$DFEXISTS = $CINFOQ->fetch(PDO::FETCH_ASSOC);
if ($DFEXISTS) {
    $opcion = 1;
    $company_data = $DFEXISTS;
} else {
    $stmt = $conexion->prepare("SELECT `razon_social`,CONCAT(`calle_df`,' ',`colonia_df`,' ',`poblacion_df`,' ', `estado_df`) AS direccion,`cp_df` AS cp,`tel1` AS telefono,`email` FROM `empresas` WHERE id = :companyID");
    $stmt->bindParam(':companyID', $companyID, PDO::PARAM_STR);
    $stmt->execute();
    $company_data = $stmt->fetch(PDO::FETCH_ASSOC);
    $opcion = 2;
}
$razon_social = $company_data['razon_social'];
$direccion = $company_data['direccion'];
$cp = $company_data['cp'];
$telefono = $company_data['telefono'];
$email = $company_data['email'];
$json[] = array(
    'razon_social' => $razon_social,
    'direccion' => $direccion,
    'cp' => $cp,
    'telefono' => $telefono,
    'email' => $email,
    'cnames' => $CNAMES,
    'id' => $companyID,
    'opcion' => $opcion
);
echo json_encode($json);
