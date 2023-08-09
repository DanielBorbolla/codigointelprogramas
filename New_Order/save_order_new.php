<?php

session_start();
require('../Main_app/conexion.php');
require('../Main_app/validaciones.php');

$_POST['fecha1'] = ($_POST['fecha1']) ? date('Y-m-d', strtotime($_POST['fecha1'])) : date('Y-m-d'); 
$_POST['products'] =  json_encode($_POST['products']); 
$accion = htmlspecialchars($_POST['accion']);
unset($_POST['accion']);
if($accion == 'editar')
    echo update_orden_compra($_POST);
else
    echo insert_orden_compra_M($_POST);

function insert_orden_compra($datos)
{
  global $conexion; //conexion db
  $values = array();

  $datos = array_map(function ($dato) { //funcion para limpiar todos los datos.
    return quitar_tildes(strtoupper(trim(($dato))));
  }, $datos);

  foreach ($datos as $key => $value) { //definir nombre de los valores a preparar.
    $value = (!$value) ? ' ' : $value;
    $values[':' . $key] = $value;
  }

  $values[':date'] = date('Y-m-d', strtotime($datos['date'])); //cambiar a formato de fecha 'yyyy-mm-dd'

  $sql = "CALL insert_ordenCompra (" . implode(",", array_keys($values)) . ")";

  $stmt = $conexion->prepare($sql);
  return $stmt->execute($values);
}

function update_orden_compra($datos)
{
  global $conexion; //conexion db
  $values = array();

  $datos = array_map(function ($dato) { //funcion para limpiar todos los datos.
    return quitar_tildes(strtoupper(trim(($dato))));
  }, $datos);

  $fields_query = " ";
  foreach ($datos as $key => $value) { //definir nombre de los valores a preparar.
    $value = (!$value) ? ' ' : $value;
    $values[':' . $key] = $value;
    if($key != 'id_bussiness' && $key != 'nordenc')
      $fields_query .= "$key = :$key ,";
  }
  $fields_query = substr($fields_query, 0, -1);
  $sql = "UPDATE orden_compra_documento_v2 SET $fields_query WHERE id_bussiness = :id_bussiness AND nordenc = :nordenc ";
  $stmt = $conexion->prepare($sql);
  return $stmt->execute($values);
}

function insert_orden_compra_M($datos)
{
  global $conexion; //conexion db
  $values = array();

  $datos = array_map(function ($dato) { //funcion para limpiar todos los datos.
    return (gettype($dato) == "string") ? quitar_tildes(strtoupper(trim(($dato)))) : $dato;
  }, $datos);

  $sql = "INSERT INTO orden_compra_documento_v2 VALUES (null,'" . implode("','", $datos) . "')";

  $stmt = $conexion->prepare($sql);
  return $stmt->execute($values);
  echo $sql;
}
