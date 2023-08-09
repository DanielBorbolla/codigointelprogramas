<?php
session_start();
require('../Main_app/conexion.php'); 
require('../Main_app/validaciones.php'); 

if(isset($_POST['vendor'])){
    $id_emp_prov = trim($_POST['id_emp_prov']);
    $nombre_comercial = quitar_tildes(strtoupper(trim($_POST['vendor'])));
    $razon_social     = quitar_tildes(strtoupper(trim($_POST['vendor'])));
    $calle            = quitar_tildes(strtoupper(trim($_POST['street'])));
    $no_ext           = strtoupper(trim($_POST['extnum']));
    $no_int           = strtoupper(trim($_POST['intnum']));
    $ciudad       = trim($_POST['city']);
    $estado           = trim($_POST['state']);
    $codigo_postal               = trim($_POST['zipcode']);
    $pais            = trim($_POST['country']);
    $telefono           = trim($_POST['telephone']);
    $email            = trim($_POST['email']);
    $query = "INSERT INTO proveedor(id_emp_prov, nombre_comercial,razon_social,calle,no_ext,no_int,ciudad,estado,codigo_postal,pais,telefono,email) VALUES (:id_emp_prov,:nombre_comercial,:razon_social,:calle,:no_ext,:no_int,:ciudad,:estado,:codigo_postal,:pais,:telefono,:email)";

    $stmt=$conexion->prepare($query);
      $stmt->bindParam(':id_emp_prov',$id_emp_prov,PDO::PARAM_INT); 
      $stmt->bindParam(':nombre_comercial',$nombre_comercial,PDO::PARAM_STR);
      $stmt->bindParam(':razon_social',$razon_social,PDO::PARAM_STR); 
      $stmt->bindParam(':calle',$calle,PDO::PARAM_STR);
      $stmt->bindParam(':no_int',$no_int,PDO::PARAM_STR);
      $stmt->bindParam(':no_ext',$no_ext,PDO::PARAM_STR);
      $stmt->bindParam(':ciudad',$ciudad,PDO::PARAM_STR);
      $stmt->bindParam(':estado',$estado,PDO::PARAM_STR);
      $stmt->bindParam(':codigo_postal',$codigo_postal,PDO::PARAM_STR);
      $stmt->bindParam(':pais',$pais,PDO::PARAM_STR);
      $stmt->bindParam(':telefono',$telefono,PDO::PARAM_STR);
      $stmt->bindParam(':email',$email,PDO::PARAM_STR);

      $stmt->execute();
}



?>