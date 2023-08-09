<?php
session_start();
require('../Main_app/conexion.php');
require('../Main_app/validaciones.php');
if (isset($_POST['id_bussiness'])) {


  // captura de photonic
  // if()
  echo insert_orden_compra($_POST); //retornar ejecucion de la funcion.


  //captura de michoacana
  //if()


  // $id_bussiness = trim($_POST['id_bussiness']);
  // $vendorname = quitar_tildes(strtoupper(trim($_POST['vendorlist'])));
  // $vendorstreet = quitar_tildes(strtoupper(trim($_POST['vendorstreet'])));
  // $vendoraddress = quitar_tildes(strtoupper(trim($_POST['vendoraddress'])));
  // $vendorcity = quitar_tildes(strtoupper(trim($_POST['vendorcity'])));
  // $vendorzipcode = quitar_tildes(strtoupper(trim($_POST['vendorzipcode'])));
  // $vendorcountry = quitar_tildes(strtoupper(trim($_POST['vendorcountry'])));
  // $vendortelephone = trim($_POST['vendortelephone']);
  // $vendoremail = quitar_tildes((trim($_POST['vendoremail'])));
  // $invoicelist = quitar_tildes(strtoupper(trim($_POST['invoicelist'])));
  // $invoiceaddress = quitar_tildes(strtoupper(trim($_POST['invoiceaddress'])));
  // $invoicezipcode = quitar_tildes(strtoupper(trim($_POST['invoicezipcode'])));
  // $invoicephone = trim($_POST['invoicephone']);
  // $invoiceemail = quitar_tildes((trim($_POST['invoiceemail'])));
  // $order_no = trim($_POST['order_no']);
  // $order_date = trim($_POST['date']);
  // $receive = quitar_tildes(strtoupper(trim($_POST['receive'])));
  // $ship     = quitar_tildes(strtoupper(trim($_POST['ship'])));
  // $pallet            = quitar_tildes(strtoupper(trim($_POST['pallet'])));
  // $bank            = quitar_tildes(strtoupper(trim($_POST['bank'])));
  // $bankaddress            = quitar_tildes(strtoupper(trim($_POST['bankaddress'])));
  // $swift            = quitar_tildes(strtoupper(trim($_POST['swift'])));
  // $account           = strtoupper(trim($_POST['account']));
  // $payment           = strtoupper(trim($_POST['payment']));
  // $customer_number       = trim($_POST['customer_number']);
  // $shipfrom            = quitar_tildes(strtoupper(trim($_POST['shipfrom'])));
  // $delivery           = trim($_POST['delivery']);
  // $tracking               = trim($_POST['tracking']);

  // // -----------------getvendor ID if exist or create new vendor---------------
  // $vendorquery = ("SELECT id from proveedor 
  //   WHERE id_emp_prov = :id_business 
  //   AND razon_social = :vendorname 
  //   AND calle = :vendorstreet 
  //   AND direccion = :vendoraddress 
  //   AND ciudad = :vendorcity
  //   AND codigo_postal = :vendorzipcode 
  //   AND pais = :vendorcountry 
  //   AND telefono = :vendortelephone 
  //   AND email = :vendoremail");
  // $id_vendor_querry = $conexion->prepare($vendorquery);
  // $id_vendor_querry->bindParam(':id_business', $id_bussiness, PDO::PARAM_INT);
  // $id_vendor_querry->bindParam(':vendorname', $vendorname, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendorstreet', $vendorstreet, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendoraddress', $vendoraddress, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendorcity', $vendorcity, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendorzipcode', $vendorzipcode, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendorcountry', $vendorcountry, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendortelephone', $vendortelephone, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendoremail', $vendoremail, PDO::PARAM_STR);
  // $id_vendor_querry->execute();
  // $vendor_exist = $id_vendor_querry->fetchColumn();
  // $vendor_exist = (int)$vendor_exist;
  // if ($vendor_exist > 0) {
  //   $id_vendor_assoc = $id_vendor_querry->fetch(PDO::FETCH_ASSOC);
  //   $id_vendor = $id_vendor_assoc['id'];
  // } else {
  //   $newvendorquery =
  //     "INSERT INTO proveedor(id_emp_prov, nombre_comercial,razon_social,calle,no_ext,no_int,ciudad,estado,codigo_postal,pais,telefono,email) VALUES (:id_emp_prov,:razon_social,:razon_social,:calle,:no_ext,:no_int,:ciudad,:estado,:codigo_postal,:pais,:telefono,:email)";
  //   $newvendorsave = $conexion->prepare($newvendorquery);
  //   $newvendorsave->bindParam(':id_emp_prov', $id_emp_prov, PDO::PARAM_INT);
  //   $newvendorsave->bindParam(':razon_social', $razon_social, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':calle', $calle, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':no_int', $no_int, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':no_ext', $no_ext, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':estado', $estado, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':codigo_postal', $codigo_postal, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':pais', $pais, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':telefono', $telefono, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':email', $email, PDO::PARAM_STR);
  //   $newvendorsave->execute();

  //   $newvendoridquery
  //     = ("SELECT id from proveedor 
  //   WHERE id_emp_prov = :id_business 
  //   AND razon_social = :vendorname 
  //   AND calle = :vendorstreet 
  //   AND direccion = :vendoraddress 
  //   AND ciudad = :vendorcity
  //   AND codigo_postal = :vendorzipcode 
  //   AND pais = :vendorcountry 
  //   AND telefono = :vendortelephone 
  //   AND email = :vendoremail");
  //   $id_vendor_querry = $conexion->prepare($newvendoridquery);
  //   $id_vendor_querry->bindParam(':id_business', $id_bussiness, PDO::PARAM_INT);
  //   $id_vendor_querry->bindParam(':vendorname', $vendorname, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendorstreet', $vendorstreet, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendoraddress', $vendoraddress, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendorcity', $vendorcity, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendorzipcode', $vendorzipcode, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendorcountry', $vendorcountry, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendortelephone', $vendortelephone, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendoremail', $vendoremail, PDO::PARAM_STR);
  //   $id_vendor_querry->execute();
  //   $id_vendor_assoc = $id_vendor_querry->fetch(PDO::FETCH_ASSOC);
  //   $id_vendor = $id_vendor_assoc['id'];
  // }
  // // -------getinvoice info ID if exist or create new invoice info---------------
  // $invoicequery = ("SELECT id from proveedor 
  //   WHERE id_emp_prov = :id_business 
  //   AND razon_social = :vendorname 
  //   AND calle = :vendorstreet 
  //   AND direccion = :vendoraddress 
  //   AND ciudad = :vendorcity
  //   AND codigo_postal = :vendorzipcode 
  //   AND pais = :vendorcountry 
  //   AND telefono = :vendortelephone 
  //   AND email = :vendoremail");
  // $id_vendor_querry = $conexion->prepare($invoicequery);
  // $id_vendor_querry->bindParam(':id_business', $id_bussiness, PDO::PARAM_INT);
  // $id_vendor_querry->bindParam(':vendorname', $vendorname, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendorstreet', $vendorstreet, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendoraddress', $vendoraddress, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendorcity', $vendorcity, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendorzipcode', $vendorzipcode, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendorcountry', $vendorcountry, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendortelephone', $vendortelephone, PDO::PARAM_STR);
  // $id_vendor_querry->bindParam(':vendoremail', $vendoremail, PDO::PARAM_STR);
  // $id_vendor_querry->execute();
  // $vendor_exist = $id_vendor_querry->fetchColumn();
  // $vendor_exist = (int)$vendor_exist;
  // if ($vendor_exist > 0) {
  //   $id_vendor_assoc = $id_vendor_querry->fetch(PDO::FETCH_ASSOC);
  //   $id_vendor = $id_vendor_assoc['id'];
  // } else {
  //   $newvendorquery =
  //     "INSERT INTO proveedor(id_emp_prov, nombre_comercial,razon_social,calle,no_ext,no_int,ciudad,estado,codigo_postal,pais,telefono,email) VALUES (:id_emp_prov,:razon_social,:razon_social,:calle,:no_ext,:no_int,:ciudad,:estado,:codigo_postal,:pais,:telefono,:email)";
  //   $newvendorsave = $conexion->prepare($newvendorquery);
  //   $newvendorsave->bindParam(':id_emp_prov', $id_emp_prov, PDO::PARAM_INT);
  //   $newvendorsave->bindParam(':razon_social', $razon_social, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':calle', $calle, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':no_int', $no_int, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':no_ext', $no_ext, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':estado', $estado, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':codigo_postal', $codigo_postal, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':pais', $pais, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':telefono', $telefono, PDO::PARAM_STR);
  //   $newvendorsave->bindParam(':email', $email, PDO::PARAM_STR);
  //   $newvendorsave->execute();

  //   $newvendoridquery
  //     = ("SELECT id from proveedor 
  //   WHERE id_emp_prov = :id_business 
  //   AND razon_social = :vendorname 
  //   AND calle = :vendorstreet 
  //   AND direccion = :vendoraddress 
  //   AND ciudad = :vendorcity
  //   AND codigo_postal = :vendorzipcode 
  //   AND pais = :vendorcountry 
  //   AND telefono = :vendortelephone 
  //   AND email = :vendoremail");
  //   $id_vendor_querry = $conexion->prepare($newvendoridquery);
  //   $id_vendor_querry->bindParam(':id_business', $id_bussiness, PDO::PARAM_INT);
  //   $id_vendor_querry->bindParam(':vendorname', $vendorname, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendorstreet', $vendorstreet, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendoraddress', $vendoraddress, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendorcity', $vendorcity, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendorzipcode', $vendorzipcode, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendorcountry', $vendorcountry, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendortelephone', $vendortelephone, PDO::PARAM_STR);
  //   $id_vendor_querry->bindParam(':vendoremail', $vendoremail, PDO::PARAM_STR);
  //   $id_vendor_querry->execute();
  //   $id_vendor_assoc = $id_vendor_querry->fetch(PDO::FETCH_ASSOC);
  //   $id_vendor = $id_vendor_assoc['id'];
  // }


  // // -------------Save order---------------

  // $query = "INSERT INTO ordenes_compra (id_empresa, id_proveedor, id_facturacion, no_orden, fecha,recepcion,metodo_envio,codigo_pallet,banco, direccion_bancaria, swift, cuenta,medio_pago,numero_cliente,enviado_de,fecha_entrega,numero_rastreo) VALUES (:id_bussiness,:id_vendor,:invoice_info_id,:order_no,:order_date,:receive,:ship,:pallet,:account,:payment,:customer_number,:delivery,:tracking)";

  // $stmt = $conexion->prepare($query);
  // $stmt->bindParam(':id_bussiness', $id_bussiness, PDO::PARAM_INT);
  // $stmt->bindParam(':id_vendor', $id_vendor, PDO::PARAM_INT);
  // $stmt->bindParam(':order_no', $order_no, PDO::PARAM_INT);
  // $stmt->bindParam(':order_date', $order_date, PDO::PARAM_STR);
  // $stmt->bindParam(':order_date', $order_date, PDO::PARAM_STR);
  // $stmt->bindParam(':receive', $receive, PDO::PARAM_STR);
  // $stmt->bindParam(':ship', $ship, PDO::PARAM_STR);
  // $stmt->bindParam(':pallet', $pallet, PDO::PARAM_STR);
  // $stmt->bindParam(':account', $account, PDO::PARAM_STR);
  // $stmt->bindParam(':payment', $payment, PDO::PARAM_STR);
  // $stmt->bindParam(':customer_number', $customer_number, PDO::PARAM_STR);
  // $stmt->bindParam(':delivery', $delivery, PDO::PARAM_STR);
  // $stmt->bindParam(':tracking', $tracking, PDO::PARAM_STR);

  // $stmt->execute();
}

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
