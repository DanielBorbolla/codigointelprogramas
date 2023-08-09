<?php
session_start();
require('../Main_app/conexion.php'); 
require('../Main_app/validaciones.php'); 
if(isset($_POST['id_bussiness'])){
    $orderId = trim($_POST['orderId']);
    $id_bussiness = trim($_POST['id_bussiness']);
    $id_vendor = trim($_POST['id_vendor']);
    $order_date = trim($_POST['date']);
    $receive = quitar_tildes(strtoupper(trim($_POST['receive'])));
    $ship     = quitar_tildes(strtoupper(trim($_POST['ship'])));
    $pallet            = quitar_tildes(strtoupper(trim($_POST['pallet'])));
    $account           = strtoupper(trim($_POST['account']));
    $payment           = strtoupper(trim($_POST['payment']));
    $customer_number       = trim($_POST['customer_number']);
    $delivery           = trim($_POST['delivery']);
    $tracking               = trim($_POST['tracking']);
    $query = "UPDATE ordenes_compra SET id_empresa = :id_bussiness, id_proveedor = :id_vendor,fecha = :order_date ,recepcion = :receive ,metodo_envio= :ship,codigo_pallet= :pallet,cuenta = :account,medio_pago= :payment ,numero_cliente=:customer_number,fecha_entrega=:delivery,numero_rastreo= :tracking WHERE id = :orderId";

    $stmt=$conexion->prepare($query);
      $stmt->bindParam(':id_bussiness',$id_bussiness,PDO::PARAM_INT); 
      $stmt->bindParam(':orderId',$orderId,PDO::PARAM_INT); 
      $stmt->bindParam(':id_vendor',$id_vendor,PDO::PARAM_INT);
      $stmt->bindParam(':order_date',$order_date,PDO::PARAM_STR); 
      $stmt->bindParam(':receive',$receive,PDO::PARAM_STR);
      $stmt->bindParam(':ship',$ship,PDO::PARAM_STR);
      $stmt->bindParam(':pallet',$pallet,PDO::PARAM_STR);
      $stmt->bindParam(':account',$account,PDO::PARAM_STR);
      $stmt->bindParam(':payment',$payment,PDO::PARAM_STR);
      $stmt->bindParam(':customer_number',$customer_number,PDO::PARAM_STR);
      $stmt->bindParam(':delivery',$delivery,PDO::PARAM_STR);
      $stmt->bindParam(':tracking',$tracking,PDO::PARAM_STR);
      
      $stmt->execute();    
}



?>