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
// -----Obtener Número de orden de la Session-------
$orderno = $_POST['order_no'];

$sql = $conexion->prepare("SELECT id,claveprod,ud,medida, descripcion,cant,precio,total FROM `carro_orden_compra` WHERE id_emp = :id_empresa AND order_no = :orderno");
$sql->bindParam(':id_empresa', $id_empresa, PDO::PARAM_INT);
$sql->bindParam(':orderno', $orderno, PDO::PARAM_INT);
$sql->execute();

$num_producto = 1;
foreach ($sql as $key => $producto) {
?> <tr orderId="<?php echo $producto['id']; ?>">
        <td class="filas_par producto num_producto">
            <div class="number"><?php echo $num_producto++; ?></div><a id="delete_<?php echo $producto['id']; ?>" class="btn btn-xs btn-danger item-delete" data-toggle="tooltip" title="Eliminar Producto">
                <i class="fas fa-trash"></i>
            </a>
        </td>
        <td class="filas_par producto"><input disabled class="info_clave" type="text" value=" <?php echo $producto['claveprod']; ?>"></td>
        <td class="filas_par producto"><input disabled class="info_ud" type="text" value=" <?php echo $producto['ud']; ?>"></td>
        <td class="filas_par producto"><input disabled class="info_medida" type="text" value=" <?php echo $producto['medida']; ?>"></td>
        <td class="filas_par producto"><input disabled class="info_descripcion" type="text" value=" <?php echo $producto['descripcion']; ?>"></td>
        <td class="filas_par producto"><input disabled class="info_cantidad" type="text" value=" <?php echo $producto['cant']; ?>"></td>
        <td class="filas_par producto"><input disabled class="info_precio" type="text" value=" <?php echo $producto['precio']; ?>"></td>
        <td class="filas_par producto"><input disabled class="info_importe" type="text" value=" <?php echo $producto['total']; ?>"></td>
    </tr>
<?php } ?>