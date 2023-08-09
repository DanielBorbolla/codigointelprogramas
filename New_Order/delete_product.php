<?php
require('../Main_app/conexion.php');

if (isset($_POST['info_product'])) {
    $info_product = $_POST['info_product'];
    $order_no = $info_product['order_no'];
    $id_empresa = $info_product['id_empresa'];
    $id = $info_product['id'];
    $delete_query = "DELETE FROM carro_orden_compra WHERE id = $id AND id_emp = $id_empresa";
    $result = $conexion->query($delete_query);
    echo $id;
}
