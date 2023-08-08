<?php
include('../Main_app/conexion.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Obtener el nombre de la compañía ingresado en el formulario
    $nombre = $_POST['nombre'];

    // Procesar la imagen y guardarla en la carpeta "img"
    $nombreLogo = $_FILES['logo']['name'];
    $rutaLogo = '../img/' . $nombreLogo;
    move_uploaded_file($_FILES['logo']['tmp_name'], $rutaLogo);


    // Procesar la imagen y guardarla en la carpeta "../img"
    $nombreUsuario = $_FILES['usuario']['name'];
    $rutaUsuario = '../img/' . $nombreUsuario;
    move_uploaded_file($_FILES['usuario']['tmp_name'], $rutaUsuario);

    // Guardar la información en la base de datos (cambia "usuario", "contraseña" y "base_de_datos" por tus datos reales)


    $consulta = "INSERT INTO compania(nombre, logo,usuario) VALUES (:nombre, :logo, :usuario)";
    $stmt = $conexion->prepare($consulta);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':logo', $nombreLogo, PDO::PARAM_STR);
    $stmt->bindParam(':usuario', $nombreUsuario, PDO::PARAM_STR);
    $stmt->execute();


    // Redireccionar a la página principal (o cualquier otra página de éxito)
    header('Location: ../index.php');
    exit();
}
