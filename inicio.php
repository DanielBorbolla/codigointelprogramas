<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <!-- $page_title definida en inicio.php -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://use.fontawesome.com/releases/v5.11.2/js/all.js" data-auto-replace-svg="nest"></script>

    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="Styles/main.css">
</head>
<?php
$page_title = 'Inicio';
session_start();
require('./Main_app/conexion.php');
if (isset($_GET['id'])) {
    $id_compania = $_GET['id'];
} else {
    header("location: index.php");
}

try {
    $consulta_compania = "Select nombre, logo, usuario FROM compania WHERE id=:id_compania";
    $stmt = $conexion->prepare($consulta_compania);
    $stmt->bindParam(':id_compania', $id_compania, PDO::PARAM_STR);
    $stmt->execute();
    $datos_compania = $stmt->fetch(PDO::FETCH_ASSOC);
    $nombre_compania = $datos_compania['nombre'];
    $logo_compania = $datos_compania['logo'];
    $imagen_usuario = $datos_compania['usuario'];
    $partes_usuario = explode(".", $imagen_usuario);
    $nombre_usuario = $partes_usuario[0];
} catch (PDOException $error) {
    echo $error->getMessage();
}
$_SESSION['nombre_compania'] = $nombre_compania;
$_SESSION['nombre_usuario'] = $nombre_usuario;
$_SESSION['logo_compania'] = $logo_compania;
$_SESSION['imagen_usuario'] = $imagen_usuario;

require_once "librerias/header.php";
require_once "librerias/footer.php";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $(function() {
        $(document).on('click', '.menu_user', function() {
            //let id = $(this).attr('id');
            $('.dropdown-menu').slideToggle('fast');
        });
    });
</script>
</body>

</html>